@extends("site.app")
@section("title")
    Sign Up - {{ $setting->main_name }}
@endsection
@section('css')
    <link href="{{ asset('assets/plugins/froiden-helper/helper.css') }}" rel="stylesheet">
    <style>
        
    .mt-2{
        margin-top: 20px;
    }

    </style>

@endsection
@section("content")
    <section id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2" id="sign-up-form">
                    <h2 id="heading">Sign Up for {{ $setting->main_name }}</h2>

                    <div class="row">
                        <div class="col-md-12">

                            <form class="hosted-form" method="post" action="" role="form" id="signUpForm">
                                <div class="row">
                                    <div id="alert"></div>

                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                                    <div class="form-group col-md-12">
                                        <label for="name">Company Name</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name" placeholder="">
                                    </div>

                                    @if(module_enabled('Subdomain'))
                                        <div class="form-group col-md-12">
                                            <label for="company_name" class="required">SubDomain</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" placeholder="subdomain" name="sub_domain" id="sub_domain">
                                                <span class = "input-group-addon">.{{ get_domain() }}</span>
                                            </div>
                                        </div>
                                    @endif
                                    <div class="form-group col-md-12">
                                        <label for="email">Contact Number</label>
                                        <input type="number" class="form-control" id="contact" name="contact" placeholder="" value="">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="company">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" placeholder="">
                                    </div>

                                    <h2 style="margin-left: 14px;">Login Details</h2>
                                    <div class="form-group col-md-12" id="domainContainer">
                                        <label for="company">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12" id="passwordContainer">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="" required="">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12" id="passwordContainer">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="" required="">
                                    </div>
                                    <div class="form-group col-md-12 col-xs-12" id="confirmPasswordContainer">
                                        <label for="confirm_password">Confirm Password</label>
                                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="" required="">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">By signing up or purchasing, you agree to our <a href="{{ route("termsOfService") }}">Terms of Service</a> and <a href="{{ route("privacyPolicy") }}">Privacy Policy</a>.<br/><br/></div>

                                </div>
                                @if ($setting->google_recaptcha_status == 1)
                                    <div class="row">
                                        <div class="form-group col-md-12 col-xs-12 {{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                                                <div class="g-recaptcha" id="g-recaptcha"
                                                    data-sitekey="{{ $setting->google_recaptcha_key }}">
                                                </div>
                                                @if ($errors->has('g-recaptcha-response'))
                                                    <div class="help-block with-errors">
                                                        {{ $errors->first('g-recaptcha-response') }}</div>
                                                @endif
                                        </div>
                                    </div>
                                 @endif
                            <input type='hidden' name='g-recaptcha' id='g-recaptcha'>
                                <div class="row">
                                    <div class="col-md-12 mt-2">
                                        <button type="button" class="btn btn-primary btn-lg" onclick="newSignUpAdmin();" id="submitButton">Sign Up</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2" id="sign-up-success" style="display: none; margin-top: 50px;">
                    <div class="alert alert-success">
                        Registration successful. Please check your email and verify your email address.
                    </div>
                </div>
            </div>

        </div>

        <div class="clearfix"></div>
    </section>
@endsection
@section("javascript")
    <script src="{{asset('assets/site/plugins/froiden-helper/helper.js')}}"></script>


    @if ($setting->google_recaptcha_status == 1)
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    <script>
        var onloadCallback = function() {
            // Renders the HTML element with id 'example1' as a reCAPTCHA widget.
            // The id of the reCAPTCHA widget is assigned to 'widgetId1'.
            widgetId1 = grecaptcha.render('g-recaptcha', {
                'sitekey': '{{ $setting->google_recaptcha_key }}',
                'theme': 'light',
                'callback': function(response) {
                    if (response) {
                        $('#g-recaptcha').val(response);
                    }
                },
            });

        }
        </script>
        @endif

<script type="text/javascript">
    function newSignUpAdmin() {
        $.easyAjax({
            url: "{!! route('signup.submit') !!}",
            type: "POST",
            data: $("#signUpForm").serialize(),
            container: "#signUpForm",
            messagePosition: "inline",
            removeElements: true,
            success: function (response) {
                if (response.status != "fail") {
                    $('#sign-up-form').fadeOut(100);
                    $('#sign-up-success').fadeIn();
                }
            }
        });
    }


</script>

@endsection
