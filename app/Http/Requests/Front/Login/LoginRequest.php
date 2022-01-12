<?php

namespace App\Http\Requests\Front\Login;

use App\Classes\Reply;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Lang;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use App\Models\Setting;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = Reply::failedOnly($validator);
        throw new HttpResponseException(response()->json($response, 200));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'email' => 'required|email',
            'password' => 'required'
        ];
        $setting = Setting::first();
        if ($setting->google_recaptcha_status == 1) {
            $rules['g-recaptcha-response'] = 'required';
        }
        return $rules;
    }

}
