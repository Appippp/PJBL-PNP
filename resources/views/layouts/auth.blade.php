<!DOCTYPE html>
<html>

<head>

    @include('includes.auth.meta')

    <title>SIM PBL | Login</title>

    @include('includes.auth.style')

</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>SIM PBL</b></a>
        </div><!-- /.login-logo -->
        <div class="login-box-body">

            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login-proses') }}" method="post" enctype="multipartform-data">
                @csrf

                <!-- no bp -->
                <div class="form-group has-feedback">
                    <label for="username">USERNAME <span class="text-danger">*</span></label>
                    <input type="text" name="username" class="form-control @error('username') is-invalid @enderror"
                        placeholder="NO BP">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @error('username')
                        <span class="invalid-feedback" role="alert">
                            <small class="text-danger">{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <!-- password -->
                <div class="form-group has-feedback">
                    <label for="password">PASSWORD <span class="text-danger">*</span></label>
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                        placeholder="******">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <small class="text-danger">{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <div class="form-group has-feedback">
                    <label for="Verification">VERIFIKASI KODE <span class="text-danger">*</span></label>
                    <div class="captcha mb-2">
                        <span>{!! captcha_img('math') !!}</span>
                        <button class="btn btn-danger btn-refresh" type="button" id="refresh"><i
                                class="fa fa-refresh"></i></button>

                    </div>
                </div>

                <div class="form-group has-feedback">
                    <input type="text" name="captcha" class="form-control" placeholder="MASUKKAN KODE">
                    @error('captcha')
                        <span class="invalid-feedback" role="alert">
                            <small class="text-danger">{{ $message }}</small>
                        </span>
                    @enderror
                </div>

                <!-- button -->
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">LOGIN</button>
                    </div>
                </div>
                <!-- /button -->
            </form>

        </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    @include('includes.auth.script')

    <script>
        $('#refresh').on('click', function() {
            $.ajax({
                type: 'GET',
                url: 'refresh-captcha',
                success: function(data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
</body>

</html>
