<?php

namespace App\Http\Controllers\Admin;

use App\Classes\Reply as ClassesReply;
use App\Helpers\Reply;
use App\Http\Controllers\AdminBaseController;
use App\Traits\ModuleVerify;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class RecaptchaModuleController extends AdminBaseController
{
    use ModuleVerify;

    public function __construct()
    {
        parent::__construct();
        $this->pageTitle = __('core.recaptchaSettings');
        $this->pageIcon = 'icon-settings';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->captchaSetting = Setting::first();
        return view('admin.recaptcha.index', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Exception
     */
    public function store(Request $request)
    {
       //
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $setting = Setting::findOrFail($id);
        $setting->google_recaptcha_status = $request->google_recaptcha_status == 'on' ? 1:0;
        $setting->google_recaptcha_key = $request->google_recaptcha_key ?? '';
        $setting->google_recaptcha_secret = $request->google_recaptcha_secret ?? '';
        $setting->save();
        return Reply::success('messages.updateSuccess');
    }

}
