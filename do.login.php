<?php

session_start();

if ($_POST['email'] == 'user@user.com' && $_POST['password'] = 'password'){
    $_SESSION['token'] = password_hash(session_id(), PASSWORD_DEFAULT);

    echo json_encode(['token' => "${_SESSION['token']}"]);
} else {
    echo json_encode(['error' => 'Yanlış email adresi veya parola.']);
}