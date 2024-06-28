<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src='https://cdn.firebase.com/js/client/2.2.1/firebase.js'></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>

<body>
    {{-- <h1>Hello, verify your OTP here!</h1> --}}
    <form action="">
        <label for="">Enter verification Code</label>
        <input type="text" id="verificationCode" placeholder="Enter Verification Code"><br>
        <button type="button" onclick="verifyCode()">Verify Code</button>
    </form>

    <div id="success" style="color: green; display:none;"></div>
    <div id="error" style="color: red; display:none;"></div>


    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.14.0/firebase-auth.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        var confirmationResult;

        function verifyCode() {
            var code = $('#verificationCode').val();

            if (!confirmationResult) {
                $('#error').text('No verification in progress.');
                $('#error').show();
                return;
            }

            confirmationResult.confirm(code).then(function(result) {
                var user = result.user;

                $('#success').text('OTP verified successfully!');
                $('#success').show();

            }).catch(function(error) {
                $('#error').text(error.message);
                $('#error').show();
            });
        }

        // var confirmationResult = window.confirmationResult;

        //     function verifyCode() {
        //         var otp = document.getElementById('otp').value;
        //         confirmationResult.confirm(otp).then(function (result) {
        //             // OTP is confirmed, handle success (e.g., redirect or show success message)
        //             $('#success').text('OTP verified successfully!');
        //             $('#success').show();
        //             setTimeout(function () {
        //                 window.location.href = "{{ route('admin.dashboard') }}"; // Redirect to dashboard or desired page
        //             }, 2000);
        //         }).catch(function (error) {
        //             // Handle error (e.g., display error message)
        //             $('#error').text(error.message);
        //             $('#error').show();
        //         });
        //     }
    </script>
</body>

</html>
