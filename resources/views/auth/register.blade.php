<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SIM DMCH | Register</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">DMCH</h3>

            </div>
            <h3>Registrasi User SIM DMCH</h3>
            <p>Buatlah Akun untuk mengaksses SIM DMCH</p>
            <form class="m-t" role="form" method="POST" action="{{ url('/register') }}">
                {{ csrf_field() }}
                
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <input id="name" type="text" class="form-control" name="name" placeholder="Nama Lengkap" value="{{ old('name') }}" required autofocus>
                    @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input id="password" type="password" class="form-control" placeholder="Password" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password-confirm" type="password" placeholder="Konfirm Password" class="form-control" name="password_confirmation" required>
                </div>
                    
                
                <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Agree the terms and policy </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Register</button>

            </form>
            <p class="m-t"> <small>Donat Madu Cihanjuang Cabang Garut &copy; {{date('Y')}}</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>


