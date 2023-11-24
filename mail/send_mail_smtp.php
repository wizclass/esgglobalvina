<!-- vqztizorialwegyh -->

<?php

$to = 'canoa0327@wizclass.kr';
$user_email = htmlspecialchars($_POST['user_email']);
$user_name = htmlspecialchars($_POST['user_name']);
$user_phone = htmlspecialchars($_POST['user_phone']);
$textarea = (nl2br(htmlspecialchars($_POST['textarea'])));

if ($user_email == '') {
    echo "잘못된 접근입니다.";
    return false;
} else {
}


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

define('CONFIG_MAIL_ACCOUNT','cs.wizclass');
define('CONFIG_MAIL_PW','hrcbcxjgtbluixek');
define('CONFIG_MAIL_ADDR','cs.wizclass@gmail.com');

require "./PHPMailer.php";
require "./SMTP.php";
require "./Exception.php";

$mail = new PHPMailer(true);

try {

    // 서버세팅
    $mail->SMTPDebug = 2;    // 디버깅 설정
    $mail->isSMTP();        // SMTP 사용 설정

    $mail->Host = "smtp.gmail.com";                // email 보낼때 사용할 서버를 지정
    $mail->SMTPAuth = true;                        // SMTP 인증을 사용함
    $mail->Username = CONFIG_MAIL_ACCOUNT;    // 메일 계정
    $mail->Password = CONFIG_MAIL_PW;                // 메일 비밀번호

    $mail->SMTPSecure = "tls";                    // TLS을 사용함
    $mail->Port = 587;                            // email 보낼때 사용할 포트를 지정
    $mail->CharSet = "utf-8";                        // 문자셋 인코딩

    // 보내는 메일
    $mail->setFrom(CONFIG_MAIL_ADDR, "");

    // 받는 메일
    $mail->addAddress($to, $to_id);


    // 메일 내용
    $mail->isHTML(true);                                               // HTML 태그 사용 여부
    $mail->Subject = "ESG GLOBAL VINA에서 메일이 도착했습니다.";              // 메일 제목

    $hostname = $_SERVER["HTTP_HOST"];

    $mail->MsgHTML("<div><p>이름 : $user_name</p><p>휴대폰 : $user_phone</p><p>이메일 : $user_email</p><br><br></div>$textarea");

    // 메일 전송
    $mail->send();
} catch (Exception $e) {
    echo $e;
}

?>