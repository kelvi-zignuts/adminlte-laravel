<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Log in</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminlte/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminlte/dist/css/adminlte.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

</head>

<body class="hold-transition login-page">
  <div id="error" style="color: red; display:none;"></div>
        <div id="sentMessage" style="color: green; display:none;"></div>
    <div class="login-box">
        <div class="login-logo">
            <h1>Expence Manager</h1>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                {{-- @if ($errors->has('email'))
            <div class="alert alert-danger">
                {{$errors->first('email')}}
            </div>
        @endif --}}
        
                <form action="{{ route('admin.verifyOtp') }}" method="POST">
                  @csrf
                    <div class="input-group mb-3">
                      {{-- <label for="number">Enter Phone Number</label> --}}
                      {{-- <input type="text" id="number"  > --}}
                        <input type="text" id="number" class="form-control" placeholder="+91 **********">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div id="recaptcha-container"></div>
                        {{-- <input type="password" name="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div> --}}
                    </div>
                    <div class="row">
                        {{-- <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div> --}}
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block" onclick="sendCode()">Send</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

                {{-- <div class="social-auth-links text-center mb-3">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-primary">
                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                    </a>
                    <a href="#" class="btn btn-block btn-danger">
                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                    </a>
                </div> --}}
                <!-- /.social-auth-links -->

                {{-- <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p> --}}
                {{-- <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p> --}}
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="/adminlte/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminlte/dist/js/adminlte.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyBdYCoRIzAkPY-esPRGd4dTbQm4mvnr808",
            authDomain: "expense-manager-4ab42.firebaseapp.com",
            databaseURL: "https://expense-manager-4ab42-default-rtdb.firebaseio.com",
            projectId: "expense-manager-4ab42",
            storageBucket: "expense-manager-4ab42.appspot.com",
            messagingSenderId: "564988849593",
            appId: "1:564988849593:web:a47c2a48066bb2a6dc5a68",
            measurementId: "G-XDS48F701R"
        };

        firebase.initializeApp(firebaseConfig);

        window.onload = function() {
            render();
        }

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        function sendCode() {
            var number = $('#number').val();

            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult) {
                window.confirmationResult = confirmationResult;
                // coconfirmationResult;

                $('#sentMessage').text('Message sent successfully!');
                $('#sentMessage').show();

                setTimeout(function() {
                    window.location.href = "{{ route('admin.verifyOtp') }}";
                }, 2000);
            }).catch(function(error) {
                $('#error').text(error.message);
                $('#error').show();
            });
        }

        // function verifyCode(){
        //     var code = $('#verificationCode').val();
        //     confirmationResult.confirm(code).then(function(result){
        //         var user = result.user;

        //         $('#success').text('OTP successfully!');
        //         $('#success').show();


        //     }).catch(function(error){
        //         $('#error').text(error.message);
        //         $('#error').show();
        //     })
        // }
    </script>
</body>

</html>
