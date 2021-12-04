<!DOCTYPE html>

<head>

    <!-- Basic Page Needs
================================================== -->
    <title>Listeo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
================================================== -->
    <link rel="stylesheet" href="{{ asset('fronts/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('fronts/css/main-color.css') }}" id="colors">
    <link rel="stylesheet" href="{{ asset('fronts/my-css.css') }}">
    
    <style>
        #wrapper{
            width: 100%;
            height: 100vh;
            background-image: url('{{asset('images/bcglogin.jpg')}}');
        
            background-color: #cccccc;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }
        .login{
            background-color: #fff;
            width: 40%;
            margin: 0 auto;
            padding: 25px;
            top: 23vh;
            position: relative;
        }

        .invalid-feedback{
            color: rgb(231, 18, 18);
            font-size: 0.89em;
        }

        .is-invalid{
            border-color: rgb(231, 18, 18) !important;
        }
    </style>
</head>

<body>

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Header Container
================================================== -->


        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <div class="container">
            <div class="row login">
                <div class="col-md-12">
                    <h3 class="headline centered margin-bottom-25">
                        <strong>{{ __('auth.register') }}</strong>
                    </h3>
                </div>

                <div class="col-md-12">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <p class="form-row form-row-wide">
                            <label for="username2">{{ __('auth.name') }}:
                                <i class="im im-icon-Male"></i>
                                <input id="name" type="text" class="input-text @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus />

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </p>
                            
                        <p class="form-row form-row-wide">
                            <label for="email2">{{ __('auth.e_mail_address') }}:
                                <i class="im im-icon-Mail"></i>
                                <input id="email" type="email" class="input-text @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password1">{{ __('auth.password') }}:
                                <i class="im im-icon-Lock-2"></i>
                                <input id="password" type="password" class="input-text @error('password') is-invalid @enderror"  name="password" required autocomplete="new-password" />

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </label>
                        </p>

                        <p class="form-row form-row-wide">
                            <label for="password2">{{ __('auth.confirm_password') }}:
                                <i class="im im-icon-Lock-2"></i>
                                <input id="password-confirm" type="password" class="input-text" name="password_confirmation" required autocomplete="new-password" />
                            </label>
                        </p>

                        <input type="submit" class="button border fw margin-top-10" name="register" value="{{ __('auth.register') }}" />

                    </form>
                </div>
            </div>
        </div>
    
        <!-- Back To Top Button -->
        <div id="backtotop"><a href="#"></a></div>


    </div>
    <!-- Wrapper / End -->



    <!-- Scripts
================================================== -->
    <script type="text/javascript" src="{{ asset('fronts/scripts/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/jquery-migrate-3.1.0.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/mmenu.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/chosen.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/rangeslider.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/magnific-popup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/waypoints.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/counterup.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/tooltips.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('fronts/scripts/custom.js') }}"></script>
    <!-- MY-JS -->
    <script type="text/javascript" src="{{ asset('fronts/my-js.js') }}"></script>

</body>

</html>
