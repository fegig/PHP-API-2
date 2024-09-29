<?php
// declare(strict_types=1);

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\SMTP;
// use PHPMailer\PHPMailer\Exception;

// class Mailer
// {
//     private PHPMailer $mailer;

//     public function __construct()
//     {
//         $this->mailer = new PHPMailer(true);

//         // Server settings
//         $this->mailer->SMTPDebug = SMTP::DEBUG_OFF;
//         $this->mailer->isSMTP();
//         $this->mailer->Host       = 'smtp.example.com';
//         $this->mailer->SMTPAuth   = true;
//         $this->mailer->Username   = 'your_username';
//         $this->mailer->Password   = 'your_password';
//         $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
//         $this->mailer->Port       = 587;
//     }

//     public function sendMail(string $to, string $subject, string $body): bool
//     {
//         try {
//             // Recipients
//             $this->mailer->setFrom('from@example.com', 'Mailer');
//             $this->mailer->addAddress($to);

//             // Content
//             $this->mailer->isHTML(true);
//             $this->mailer->Subject = $subject;
//             $this->mailer->Body    = $body;

//             $this->mailer->send();
//             return true;
//         } catch (Exception $e) {
//             error_log("Message could not be sent. Mailer Error: {$this->mailer->ErrorInfo}");
//             return false;
//         }
//     }
// }