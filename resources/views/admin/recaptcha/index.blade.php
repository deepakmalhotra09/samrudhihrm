@extends('admin.adminlayouts.adminlayout')

@section('mainarea')
<style>
.captchaenable{
    margin-left: -9px;
}
    </style>
    <!-- BEGIN PAGE HEADER-->
    <div class="page-head">
        <div class="page-title">
            <h1>
                {{ $pageTitle }}
            </h1>
        </div>
    </div>
    <div class="page-bar">
        <ul class="page-breadcrumb breadcrumb">
            <li>
                <a onclick="loadView('{{ route('admin.dashboard.index') }}')">{{ trans('core.home') }}</a>
                <i class="fa fa-circle"></i>
            </li>

            <li>
                <span class="active"> {{ trans('core.settings') }}</span>
            </li>
        </ul>
    </div>
    <!-- END PAGE HEADER-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->

            <div id="load">
                {{-- INLCUDE ERROR MESSAGE BOX --}}
                {{-- END ERROR MESSAGE BOX --}}
            </div>
            <div class="portlet light bordered">



                <div class="portlet-body form">

                    <h3>@lang('core.recaptchaSettings') </h3>
                    <hr>
                        <div class="alert alert-danger" id="error_message" style="display: none">{{__('messages.errorCaptcha')}}</div>
                    <!------------------------ BEGIN FORM---------------------->
                    {!! Form::model($setting, ['method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'captchaSettings']) !!}
                    <div class="form-body">
                        <div class="form-group">
                            <label class="col-md-2 control-label">@lang('core.enableCaptcha')
                            </label>
                            <div class="btn-group captchaenable col-md-10">
                                <input type="checkbox" id="statusCheck" class="make-switch"
                                    name="google_recaptcha_status" @if ($captchaSetting->google_recaptcha_status == 1)checked
                                @endif data-on-color="success"
                                data-on-text="{{ trans('core.btnYes') }}"
                                data-off-text="{{ trans('core.btnNo') }}" data-off-color="danger">
                                <br>
                                <br>
                                <small>Visit <a href="https://www.google.com/recaptcha/admin" target="_blank">https://www.google.com/recaptcha/admin</a></small>
                            </div>

                        </div>
                        <div class="captcha-form" style="display:none;">
                            <div class="form-group">

                                <div class="form-group">
                                    <label class="col-md-2 control-label">@lang('core.siteKey') :
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="google_recaptcha_key" id="google_recaptcha_key"
                                            placeholder="Site Key" value="{{ $captchaSetting->google_recaptcha_key }}" required>
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-2 control-label">{{ trans('core.secretKey') }}:
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" id="google_recaptcha_secret" name="google_recaptcha_secret"
                                            placeholder="Secret Key"
                                               required
                                            value="{{ $captchaSetting->google_recaptcha_secret }}">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-2 col-md-9">
                                <button type="button" id="update-captcha" onclick="updateStatus();return false;" class="btn btn-info"><i
                                        ></i> {{ trans('core.btnUpdate') }} </button>
                                 <button type="button" id="show-status-modal" style="display:none;" class="btn btn-info"><i
                                            ></i> {{ trans('core.verify') }} </button>

                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
                <!-- END EXAMPLE TABLE PORTLET-->

            </div>

        </div>
    </div>
    <div id="status-modal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">{{ trans('core.verifyCaptcha') }}</h4>
                </div>
                <div class="modal-body" id="add_edit_body">
                    <div
                        class="form-group captcha-response {{ $errors->has('g-recaptcha-response') ? 'has-error' : '' }}">
                        <div class="col-xs-12">
                            <div id="g-recaptcha" class="g-recaptcha gCaptchaDiv" style="margin-left: 123px;"
                            data-sitekey=""
                                data-callback="recaptchaCallback">
                            </div>
                            @if ($errors->has('g-recaptcha-response'))
                                <div class="help-block with-errors">{{ $errors->first('g-recaptcha-response') }}
                                </div>
                            @endif

                        </div>

                    </div>
                    <button type="button" onClick="window.location.reload();" class="btn btn-info cancel-button "><i
                        ></i> {{ trans('core.btnCancel') }} </button>

                </div>
            </div>
        </div>
    </div>
    <div id="deleteModal" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">{{ trans('core.confirmation') }}</h4>
                </div>
                <div class="modal-body" id="info">
                    <p>
                        {{-- Confirm Message Here from Javascript --}}
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" data-dismiss="modal"
                        class="btn dark btn-outline">{{ trans('core.btnCancel') }}</button>

                </div>
            </div>
        </div>
    {{-- </div> --}}
    <!-- /.modal-dialog -->
    </div>
    <!-- END PAGE CONTENT-->
@stop

@section('footerjs')

    {!! HTML::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}

    <script src='https://www.google.com/recaptcha/api.js?
onload=onloadCallback
&render=explicit
&hl=en' async defer>
</script>
    <script>
        $('#statusCheck').on('switchChange.bootstrapSwitch', function(event, state) {
            Status(state)
        });


        function Status(val) {
            if (val == true) {
                $('#show-status-modal').show();
                $('.captcha-form').show();
                $('#update-captcha').hide();
            } else {
                $('#update-captcha').show();
                $('#show-status-modal').hide();

                $('.captcha-form').hide();
            }
        }
        $('#error-message').hide();
        $('#show-status-modal').click(function() {
            var key = $('#google_recaptcha_key').val();
            var secret = $('#google_recaptcha_secret').val();
            if(key === '' || secret ==='') {
                $('#error_message').show();
                setTimeout(() => {
                    $('#error_message').hide();
                }, 2000);
                return false;

            }else{
            $('#status-modal').modal('show');
                captchaContainer = grecaptcha.render('g-recaptcha', {
                'sitekey' : key,
                'callback' : function(response) {
                    if(response) {
                      $('.cancel-button').prop('disabled', true);
                         captchaSetting();
                    }
                },
                'error-callback': function() {
                   $('.cancel-button').show();
                }
            });
          }

        })

        @if ($captchaSetting->google_recaptcha_status == 0)
             $('.captcha-form').hide();
             $('#update-captcha').show();
             $('#show-status-modal').hide();
        @else
            $('.captcha-form').show();
            $('#update-captcha').hide();
            $('#show-status-modal').show();
        @endif
        function captchaSetting() {
            var url = "{{ route('admin.google-captcha.update', $captchaSetting->id) }}";
            $.easyAjax({
                type: 'POST',
                url: url,
                container: '#captchaSettings',
                data: $('#captchaSettings').serialize(),
                success: function(response) {
                    if (response.status == 'success') {
                        window.location.reload();

                    }
                }
            });
        }
        function updateStatus(){
            var form = $('#captchaSettings');
            google_recaptcha_status = $('#statusCheck').is(':checked');
            if (google_recaptcha_status == false) {
                var url = "{{ route('admin.google-captcha.update', $captchaSetting->id) }}";
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    container: '#captchaSettings',
                    data: $('#captchaSettings').serialize(),
                    success: function(response) {
                        if (response.status == 'success') {

                        }
                    }
                });
            }
        }
    </script>
    <!-- END PAGE LEVEL PLUGINS -->
@stop
