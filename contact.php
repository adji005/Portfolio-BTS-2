<?php
// ============================================================
// contact.php — Envoie le formulaire via PHPMailer + SMTP Gmail
// ============================================================
//
// PRÉ-REQUIS :
// 1. Installer PHPMailer dans /vendor :
//      composer require phpmailer/phpmailer
//    OU télécharger PHPMailer manuellement depuis :
//    https://github.com/PHPMailer/PHPMailer
//    et le placer dans /PHPMailer/src/
//
// 2. Sur ton compte Google :
//    - Activer la validation en 2 étapes
//    - Créer un "mot de passe d'application" :
//      https://myaccount.google.com/apppasswords
//    - Le coller dans la variable $smtp_pass ci-dessous
//
// 3. Remplacer les valeurs $smtp_user, $smtp_pass, $to_email
// ============================================================

header('Content-Type: application/json; charset=utf-8');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['ok' => false, 'error' => 'Méthode non autorisée']);
    exit;
}

// ---------- Récupération + nettoyage ----------
$name    = trim($_POST['name']    ?? '');
$email   = trim($_POST['email']   ?? '');
$subject = trim($_POST['subject'] ?? '');
$message = trim($_POST['message'] ?? '');

// ---------- Validation ----------
$errors = [];
if ($name === '')                              $errors[] = 'Le nom est requis';
if ($email === '')                             $errors[] = "L'email est requis";
elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errors[] = "L'email est invalide";
if ($subject === '')                           $errors[] = 'Le sujet est requis';
if ($message === '')                           $errors[] = 'Le message est requis';
elseif (mb_strlen($message) < 10)              $errors[] = 'Message trop court (10 caractères min.)';

if ($errors) {
    echo json_encode(['ok' => false, 'error' => implode(' · ', $errors)]);
    exit;
}

// Anti-spam basique : honeypot OU vérif user-agent
if (!empty($_POST['website'])) { // champ honeypot caché
    echo json_encode(['ok' => true]); // on fait semblant
    exit;
}

// ============================================================
// CONFIG SMTP — À MODIFIER
// ============================================================
$smtp_host = 'smtp.gmail.com';
$smtp_port = 587;
$smtp_user = 'TON_EMAIL@gmail.com';        // <-- ton email Gmail
$smtp_pass = 'xxxx xxxx xxxx xxxx';         // <-- mot de passe d'application Gmail (16 caractères)
$to_email  = 'adji.niang@example.com';      // <-- où tu reçois les messages
$to_name   = 'Adji Niang';

// ============================================================
// Charger PHPMailer
// Décommente la bonne ligne selon ton install :
// ============================================================

// Option 1 — Composer
// require __DIR__ . '/vendor/autoload.php';

// Option 2 — Manuel (place PHPMailer dans /PHPMailer/src/)
require __DIR__ . '/PHPMailer/src/Exception.php';
require __DIR__ . '/PHPMailer/src/PHPMailer.php';
require __DIR__ . '/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$mail = new PHPMailer(true);

try {
    // SMTP Gmail
    $mail->isSMTP();
    $mail->Host       = $smtp_host;
    $mail->SMTPAuth   = true;
    $mail->Username   = $smtp_user;
    $mail->Password   = $smtp_pass;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = $smtp_port;
    $mail->CharSet    = 'UTF-8';

    // Expéditeur / destinataire
    $mail->setFrom($smtp_user, 'Portfolio — Contact');
    $mail->addAddress($to_email, $to_name);
    $mail->addReplyTo($email, $name);

    // Contenu
    $mail->isHTML(true);
    $mail->Subject = '[Portfolio] ' . $subject;

    $safeName    = htmlspecialchars($name,    ENT_QUOTES, 'UTF-8');
    $safeEmail   = htmlspecialchars($email,   ENT_QUOTES, 'UTF-8');
    $safeSubject = htmlspecialchars($subject, ENT_QUOTES, 'UTF-8');
    $safeMessage = nl2br(htmlspecialchars($message, ENT_QUOTES, 'UTF-8'));

    $mail->Body = "
        <div style='font-family: Arial, sans-serif; max-width: 600px;'>
          <h2 style='color:#0e096b;'>Nouveau message du portfolio</h2>
          <p><strong>Nom :</strong> {$safeName}</p>
          <p><strong>Email :</strong> {$safeEmail}</p>
          <p><strong>Sujet :</strong> {$safeSubject}</p>
          <hr>
          <p>{$safeMessage}</p>
        </div>
    ";
    $mail->AltBody = "Nom : {$name}\nEmail : {$email}\nSujet : {$subject}\n\n{$message}";

    $mail->send();
    echo json_encode(['ok' => true]);

} catch (Exception $e) {
    echo json_encode(['ok' => false, 'error' => "Échec de l'envoi : " . $mail->ErrorInfo]);
}
