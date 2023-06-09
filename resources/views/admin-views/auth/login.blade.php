<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <!-- Title -->
    <title>{{\App\CPU\translate('admin')}} | {{\App\CPU\translate('login')}}</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="">
    <!-- Font -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/google-fonts.css') }}">
    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/vendor.min.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/vendor/icon-set/style.css') }}">
    <!-- CSS Front Template -->
    <link rel="stylesheet" href="{{asset('assets/admin/css/theme.minc619.css?v=1.0') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/toastr.css') }}">
    <link rel="stylesheet" href="{{asset('assets/admin/css/auth-page.css') }}">
</head>

<body class="bg-one-auth">
<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main" class="main">
    <!-- Content -->
    <div class="container py-5 py-sm-7">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-10">
                <!-- Card -->
                <div class="row">


                    <div class="col-md-12 ">
                        <!-- Form -->
                        <div class="text-center ">
                            <h2 class="h-three-auth">{{\App\CPU\translate('XPLODE GYM')}} </h2>
                            <h4 class="text-capitalize h-four-auth">{{\App\CPU\translate('management_system')}}</h4>

                        </div>

                        <form class="js-validate" action="{{route('admin.auth.login')}}" method="post">
                        @csrf
                        <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <input type="text" class="form-control form-control-lg" name="username" id="signinSrEmail"
                                       tabindex="1" placeholder="{{\App\CPU\translate('enter username')}}" aria-label="{{\App\CPU\translate('email@address.com')}}"
                                       required data-msg="{{\App\CPU\translate('Please_enter_a_valid_email_address.')}}">
                            </div>
                            <!-- End Form Group -->

                            <!-- Form Group -->
                            <div class="js-form-message form-group">
                                <div class="input-group input-group-merge">
                                    <input type="password" class="js-toggle-password form-control form-control-lg"
                                           name="password" id="signupSrPassword" placeholder="{{\App\CPU\translate('8+ characters required')}}"
                                           aria-label="{{\App\CPU\translate('8+ characters required')}}" required
                                           data-msg="{{\App\CPU\translate('Your password is invalid. Please try again.')}}"
                                           data-hs-toggle-password-options='{
                                                     "target": "#changePassTarget",
                                            "defaultClass": "tio-hidden-outlined",
                                            "showClass": "tio-visible-outlined",
                                            "classChangeTarget": "#changePassIcon"
                                            }'>
                                    <div id="changePassTarget" class="input-group-append">
                                        <a class="input-group-text" href="javascript:">
                                            <i id="changePassIcon" class="tio-visible-outlined"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- End Form Group -->

                            <button type="submit"
                                    class="btn btn-lg btn-block btn-primary">{{\App\CPU\translate('sign_in')}}</button>
                        </form>
                        <!-- End Form -->
                    </div>

                    <div class="col-md-6 float-right text-center hide-div-auth">
                  </div>

                    <div class="col-md-6 mt-4">
                        @if(env('APP_MODE')=='demo')
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-8 col-lg-10">
                                        <span>{{\App\CPU\translate('Email')}} : {{\App\CPU\translate('admin@admin.com')}}</span><br>
                                        <span>{{\App\CPU\translate('Password')}} : {{\App\CPU\translate('12345678')}}</span>
                                    </div>
                                    <div class="col-4 col-lg-2">
                                        <button class="btn btn-primary" onclick="copy_cred()"><i
                                                class="tio-copy"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- End Card -->
            </div>
        </div>
    </div>
    <!-- End Content -->
</main>
<!-- ========== END MAIN CONTENT ========== -->


<!-- JS Implementing Plugins -->
<script src="{{asset('assets/admin/js/vendor.min.js') }}"></script>

<!-- JS Front -->
<script src="{{asset('assets/admin/js/theme.min.js') }}"></script>
<script src="{{asset('assets/admin/js/toastr.js') }}"></script>
{!! Toastr::message() !!}

@if ($errors->any())
    <script>
        "use strict";
        @foreach($errors->all() as $error)
        toastr.error('{{$error}}', Error, {
            CloseButton: true,
            ProgressBar: true
        });
        @endforeach
    </script>
@endif

<!-- JS Plugins Init. -->
<script src="{{asset('assets/admin/js/auth-page.js') }}"></script>

<!-- IE Support -->
<script>
    if (/MSIE \d|Trident.*rv:/.test(navigator.userAgent)) document.write('<script src="{{asset('assets/admin/vendor/babel-polyfill/polyfill.min.js') }}"><\/script>');
</script>
</body>
</html>
