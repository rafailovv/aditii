<?php
$data = $_POST;
$to = 'arsraf00@gmail.com';
$subject = $data['subject'];
$message = $data['message'];
$headers = 'From: ' . $data['email'] . "\n" .
    'Reply-To: arsraf00@gmail.com' . "\n" .
    'Content-Type: text/plain' . "\n" .
    'X-Mailer: PHP/' . phpversion();
$result = mail($to, $subject, $message, $headers);

if ($result) {
    echo "<h2>Сообщения доставлены</h2>";
} else {
    echo "<h2>Ошибка</h2>";
}
