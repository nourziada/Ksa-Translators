<!DOCTYPE html>
<html lang="ar"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>لوحو التحكم | تسجيل الدخول</title>
    <link href="{{asset('admin_files/login_files/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/login_files/icon.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/login_files/style.css')}}" rel="stylesheet">
    <link href="{{asset('admin_files/login_files/ar.css')}}" rel="stylesheet" class="lang_css arabic">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body style="background-color: #252830;">

    <div class="login_container">
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <h1 class="heading_title">تسجيل الدخول للنظام</h1>

            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input class="form-control" id="exampleInputEmail1" placeholder="البريد الالكتروني" type="email" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif

            </div>
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                <input class="form-control" id="exampleInputPassword1" placeholder="كلمة المرور" type="password" name="password" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="checkbox">
                <label>
                   
                </label>
            </div>
            <button type="submit" class="btn btn-primary">دخول</button>
        </form>
    </div>

    <h3 class="text-center" style="color: #337ab7;">دخول لوحة التحكم</h3>



</body>
</html>