jQuery(document).ready(function($) {

    var url = 'http://127.0.0.1:8000/api/';

    addEventListener("keyup", function(event) {
        if (event.keyCode === 13) {
            event.preventDefault();
            document.getElementById("login").click();
        }
    });
    
    $('#login').click(function() {
        var email = $('#emailText').val();
        var password = $('#passwordText').val();
        
        $.ajax({
            url: url + 'auth/login/',
            type: "POST",
            Accept: 'application/json',
            data :  {
                email: email,
                password: password,
            },
            success: function (res) {
                //localStorage.setItem('accessToken', res.access_token);
                
                //window.location.href = './roomList.php';
                alert("hahahaa");
            }, 
            error: function(err) {
                alert('Wrong ID or password');
            },
        });
    });
});