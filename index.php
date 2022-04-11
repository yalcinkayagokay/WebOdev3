<?php

session_start();

if (!isset($_SESSION['token'])) 
    header('Location: login.php')

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş yap</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
</head>
<body>
    <div class="w-50 p-3 mx-auto">
        <h3>This is your dashboard. Click the topics to show content.</h3>
            <div class="container">
                <div class="row">
                    <div class="col-3">
                        <div class="list-group">
                            <a href="#" data-item="stuff" class="list-group-item list-group-item-action" aria-current="true">
                                Stuff
                            </a>
                            <a href="#" data-item="things" class="list-group-item list-group-item-action">
                                Things
                            </a>
                            <a href="#" data-item="content" class="list-group-item list-group-item-action">
                                Content
                            </a>
                        </div>
                    </div>
                        <div class="col" id="content">
                        </div>
                </div>
            </div>
    </div>
    <script>
        $(function() {
            function getDashboardItem(name) {
                $.ajax({
                    type: 'GET',
                    url: 'get.dashboard.php',
                    data: {
                        token: localStorage.getItem('token'),
                        item: name
                    }
                }).then(function(res) {
                    let data = JSON.parse(res);

                    if (!data.auth) {
                        location.href='login.php';
                    }

                    $('#content').html(data.content);
                });
            }
            $('a[data-item]').on('click', function(e) {
                e.preventDefault();

                let dataItem = $(this).attr('data-item');

                getDashboardItem(dataItem);
            })
        });
    </script>
</body>
</html>