<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = file_get_contents('data.json'); // get data from file convert it to array
    $data = json_decode($data, true);
    $password = $_POST['password'];
    $comPassword = $_POST['comPassword'];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $comHashedPassword = password_hash($comPassword, PASSWORD_DEFAULT);
    $_POST['password'] = $hashedPassword;
    $_POST['comPassword'] = $comHashedPassword;
    $data[] = $_POST; // push new $_POST into old $data[] array
    $data = json_encode($data, JSON_PRETTY_PRINT); //store data in encoding
    file_put_contents('data.json', $data);
}

header('Location: login.html');
exit(); // Always exit after a header redirect
?>