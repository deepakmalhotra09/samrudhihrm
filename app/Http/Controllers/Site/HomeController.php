<?php

namespace App\Http\Controllers\Site;


use App\Classes\Reply;
use App\Events\CompanyCreated;
use App\Http\Controllers\SiteBaseController;
use App\Http\Requests\Site\ContactSubmitRequest;
use App\Http\Requests\Site\SignupRequest;
use App\Mail\CompanySignedUp;
use App\Mail\SupportReceived;
use App\Mail\SupportSent;
use App\Mail\VerifyEmail;
use App\Models\Admin;
use App\Models\Company;
use App\Models\ContactRequest;
use App\Models\Country;
use App\Models\FaqCategory;
use App\Models\Feature;
use App\Models\Pages;
use App\Models\Plan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Illuminate\Validation\ValidationException;

class HomeController extends SiteBaseController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view("site.home", $this->data);
    }

    public function features()
    {
        $this->features =  Feature::all();
        return view("site.features", $this->data);
    }

    public function pricing()
    {
        $this->data["plans"] = Plan::where('status',1)->get();
        $this->data["max_users"] = Plan::max('end_user_count');

        return view("site.pricing", $this->data);
    }

    public function support()
    {
        $this->faqCategories = FaqCategory::with('faq')->where('status', 'active')->get();
        return view("site.support", $this->data);
    }

    public function termsOfService()
    {
        return view("site.termsofservice", $this->data);
    }

    public function privacyPolicy()
    {
        return view("site.privacypolicy", $this->data);
    }
    public function page($slug)
    {
        $this->page = Pages::where('slug',$slug)->first();
        return view("site.page", $this->data);
    }


    public function signup()
    {
        $this->countries = Country::where('currency_symbol', '!=', 'null')->groupBy('currency_code')->get();
        $this->countrieslist = Country::all();

        $email = request()->get("email");
        $plan = request()->get("plan");

        $this->data["email"] = $email;
        $this->data["plan"] = $plan;

        return view("site.signup", $this->data);
    }

    public function submitSignup(SignupRequest $request)
    {
        \DB::beginTransaction();

        $company = Company::create($request->all());

        if (module_enabled('Subdomain')) {
            $company->sub_domain = $request->sub_domain;
            $company->save();
        }

        $code = Str::random(60);
        if ($this->setting->google_recaptcha ) {
            // Checking is google recaptcha is valid
            $gRecaptchaResponseInput = 'g-recaptcha-response';
            $gRecaptchaResponse = $request->{$gRecaptchaResponseInput};
            $validateRecaptcha = $this->validateGoogleRecaptcha($gRecaptchaResponse);
            if (!$validateRecaptcha) {
                return $this->googleRecaptchaMessage();
            }
        }
        $admin = $this->createAdmin($request,$company,$code);


        \DB::commit();

        $inputs = $request->all();
        $inputs["name"] = $admin->name;
        $inputs["email"] = $admin->email;
        $inputs["login_url"] = route('login');
        $inputs["email_token"] = $code;
        $inputs["verify_link"] = route('admin.verify_email', $code);
        $inputs['fromEmail'] = $this->setting->email;
        $inputs['fromName'] = $this->setting->main_name;

        // Send email of account creation
        Mail::to($admin->email)->queue(new CompanySignedUp($inputs));

        // Send verification email
        Mail::to($admin->email)->queue(new VerifyEmail($inputs));

        $url = env('APP_ADDRESS');

        return Reply::success('Company registered successfully', ['url' => $url]);

    }
    public function validateGoogleRecaptcha($googleRecaptchaResponse)
    {

        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => $this->global->google_recaptcha_secret,
                    'response' => $googleRecaptchaResponse,
                    'remoteip' => $_SERVER['REMOTE_ADDR']
                ]
            ]
        );

        $body = json_decode((string) $response->getBody());

        return $body->success;
    }
    public function googleRecaptchaMessage()
    {
        throw ValidationException::withMessages([
            'g-recaptcha-response' => [trans('auth.recaptchaFailed')],
        ]);
    }
    public function contactSubmit(ContactSubmitRequest $request)
    {
        $inputs = $request->all();
        $inputs['fromEmail'] = $this->setting->email;
        $inputs['fromName'] = $this->setting->main_name;

        $contact = new ContactRequest();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->category = $request->category;
        $contact->details = $request->details;
        $contact->status = "Pending";
        $contact->save();

        Mail::to($inputs["email"])->send(new SupportReceived($inputs));

        Mail::to($inputs['fromEmail'])->send(new SupportSent($inputs));

        return Reply::redirect(route('thank.you'), 'Thank you for contacting us');
    }

    public function thankYou()
    {
        return view('site.thankyou', $this->data);
    }

    private function createAdmin($request, $company,$code)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->company_id = $company->id;

        $admin->email_token = $code;
        $admin->save();

        return $admin;

    }
}
