<?php
/**
 * MMY US — contact form handler
 * Sends website enquiries to the address below using the server's mail().
 * Returns JSON: {"ok":true} or {"ok":false,"error":"..."}.
 */

$TO        = 'hello@mmyus.com';
$FROM      = 'website@mmyus.com';   // sender shown on the notification email
$SUBJECT   = 'New website enquiry — mmyus.com';

header('Content-Type: application/json; charset=utf-8');
header('X-Content-Type-Options: nosniff');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['ok' => false, 'error' => 'Method not allowed']);
    exit;
}

// Honeypot: real visitors never fill this hidden field.
if (!empty($_POST['website'])) {
    echo json_encode(['ok' => true]);
    exit;
}

function clean($v, $max = 2000) {
    $v = trim((string)$v);
    $v = str_replace(["\r", "\0"], '', $v);
    return mb_substr($v, 0, $max);
}
function one_line($v, $max = 200) {
    return preg_replace('/[\n\t]+/', ' ', clean($v, $max));
}

$name    = one_line($_POST['name'] ?? '');
$company = one_line($_POST['company'] ?? '');
$email   = one_line($_POST['email'] ?? '', 254);
$type    = one_line($_POST['project_type'] ?? '');
$message = clean($_POST['message'] ?? '', 5000);

if ($name === '' || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    http_response_code(422);
    echo json_encode(['ok' => false, 'error' => 'Please add your name and a valid email address.']);
    exit;
}

$body  = "New enquiry from the MMY US website\n";
$body .= "------------------------------------\n\n";
$body .= "Name:          {$name}\n";
$body .= "Company:       " . ($company !== '' ? $company : '—') . "\n";
$body .= "Email:         {$email}\n";
$body .= "Project type:  " . ($type !== '' ? $type : '—') . "\n\n";
$body .= "Message:\n" . ($message !== '' ? $message : '—') . "\n\n";
$body .= "------------------------------------\n";
$body .= "Sent " . gmdate('Y-m-d H:i') . " UTC from " . ($_SERVER['HTTP_REFERER'] ?? 'mmyus.com') . "\n";

$headers  = "From: MMY US Website <{$FROM}>\r\n";
$headers .= "Reply-To: {$name} <{$email}>\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

$sent = mail($TO, '=?UTF-8?B?' . base64_encode($SUBJECT) . '?=', $body, $headers, '-f' . $FROM);

if ($sent) {
    echo json_encode(['ok' => true]);
} else {
    http_response_code(500);
    echo json_encode(['ok' => false, 'error' => 'Your message could not be sent. Please email hello@mmyus.com directly.']);
}
