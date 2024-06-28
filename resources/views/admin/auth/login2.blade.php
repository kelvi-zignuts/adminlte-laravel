<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Phone Authentication with Firebase and reCAPTCHA</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

  {{-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script --}}
</head>
<body>
  <form action="{{route('admin.otp')}}" method="POST">
    @csrf
    <label for="number">Enter Phone Number</label>
    <input type="text" id="number" placeholder="+91 **********">
    <br>
    <div id="recaptcha-container"></div>
    <br>
    <button type="button" onclick="sendCode()">Send Code</button>
  </form>

  <div id="error" style="color: red; display:none;"></div>
  <div id="sentMessage" style="color: green; display:none;"></div>

  {{-- <script src="https://www.gstatic.com/firebasejs/10.12.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/9.6.0/firebase-auth.js"></script> --}}
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

    window.onload = function(){
      render();
    }

    function render(){
      window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
      recaptchaVerifier.render();
    }

    function sendCode(){
      var number = $('#number').val();

      firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function(confirmationResult){
        window.confirmationResult = confirmationResult;

        $('#sentMessage').text('Message sent successfully!');
        $('#sentMessage').show();

      }).catch(function(error){
        $('#error').text(error.message);
        $('#error').show();
      });
    }
  </script>
</body>
</html>
