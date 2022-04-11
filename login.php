<!doctype html>
<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
<div class="w-50 p-3 mx-auto">
    <form id="loginform">
        <div id="error" class="alert alert-danger d-none"></div>

        <div class="mb-3">
            <label for="email" class="form-label">Email Adresi</label>
            <input  class="form-control"
                    type="email"
                    id="email"
                    name="email"
            >
        </div>

        <div class="mb-3">
        <label for="password" class="form-label">Parola</label>
            <input  class="form-control"
                    type="password"
                    id="password"
                    name="password"
            >
        </div>
        <div>
            <button class="btn btn-primary" type="submit">
                Giriş yap
            </button>
        </div>
    </form>
</div>
<script>
$(document).ready(function() {  
    $('#loginform').on('submit', function(e) {
        e.preventDefault();

        let $error = $('#error');

        $.ajax({
            type: 'POST',
            url: 'do.login.php',
            data: $(this).serialize()
        }).then(function(res) {
            let data = JSON.parse(res);

            if(data.error) {
                $error.removeClass('d-none').html(data.error);
                return
            }
            
            localStorage.setItem('token', data.token);
            location.href = 'index.php'
        }).fail(function(res) {
            $error.removeClass('d-none').html('Giriş yaparken hata!');
        })
      
    });
});
</script>
</body>
</html>
