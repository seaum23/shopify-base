<?php

$servername = "nvd-main-db-backup.c6wrrkxme5av.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "NVD129##hyi";

// Create connection
$conn = new mysqli($servername, $username, $password, "ecomnvd_navidium");

$result = $conn->query("select * from `nvd_merchants` where `shop_url` = 'final-navidium.myshopify.com' and `nvd_merchants`.`deleted_at` is null");
// exit(var_dump(serialize(mysqli_real_escape_string($conn, ($request->email)))));
// $email = ($request->email);
// $email = ($request->email);
// $encoded = json_encode(['email' => $email]);
// $encoded = json_encode($email);
// $escaped = mysqli_real_escape_string($conn, $encoded);
// var_dump($escaped);
var_dump($request);
exit();