<?php

$name = $_POST['name'];
$tvrtka = $_POST['tvrtka'];
$adresa = $_POST['adresa'];
$tel = $_POST['tel'];
$email = $_POST['email'];
$potrosnja = $_POST['potrosnja'];

if (isset($_POST['krov'])) {
    $krov = implode(", ", $_POST['krov']);
} else {
    $krov = "";
}

if (isset($_POST['usmjerenje'])) {
    $usmjerenje = implode(", ", $_POST['usmjerenje']);
} else {
    $usmjerenje = "";
}

$duljina = $_POST['duljina'];
$sirina = $_POST['sirina'];
$visina = $_POST['visina'];
$sjena = $_POST['sjena'];
$vlasnik = $_POST['vlasnik'];
$dozvola = $_POST['dozvola'];
$tipPretvaraca = $_POST['tipPretvaraca'];
$mont = $_POST['mont'];
$grom = $_POST['grom'];
$poruka = $_POST['poruka'];
$teren = isset($_POST['teren']) ? $_POST['teren'] : '';

$message = "Ime i prezime: " . $name . "\n\n";
$message .= "Tvrtka: " . $tvrtka . "\n\n";
$message .= "Adresa: " . $adresa . "\n\n";
$message .= "Telefon/mobitel: " . $tel . "\n\n";
$message .= "E-mail: " . $email . "\n\n";
$message .= "Godišnja potrošnja struje (kWh): " . $potrosnja . "\n\n";
$message .= "Informacije o krovu: " . $krov . "\n\n";
$message .= "Usmjerenje krova: " . $usmjerenje . "\n\n";
$message .= "Sjena na krovu: " . $sjena . "\n\n";
$message .= "Dimenzije krova: Duljina(m): " . $duljina . ", Širina(m): " . $sirina . ", Visina(m): " . $visina . "\n\n";
$message .= "Vlasnik: " . $vlasnik . "\n\n";
$message .= "Građevinska dozvola: " . $dozvola . "\n\n";
$message .= "Tip pretvarača: " . $tipPretvaraca . "\n\n";
$message .= "Montaža pretvarača: " . $mont . "\n\n";
$message .= "Gromobranska instalacija: " . $grom . "\n\n";
$message .= "Dodatna poruka: " . $poruka . "\n\n";
$message .= "Izlazak na teren: " . ($teren == 'Da' ? 'Da, želim besplatan izlazak na teren.' : 'Ne, zanima me samo informativna ponuda.') . "\n\n";

$recipient = "da.solarna.elektrana@gmail.com";
$subject = "Nova poruka DA - Solarna upitnik";
$headers = "From: " . $name . " <" . $email . ">\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
mail($recipient, $subject, $message, $headers) or die("Error!");

echo '

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upitnik ispunjen!</title>
    
    <link rel="stylesheet" href="main.css">
</head>
<body style="background-color:#FFF;">
<div class="svc-container-title" style="font-size:1rem;">
<h1 style>Upitnik uspješno ispunjen! Naši stručnjaci javit će Vam se u najbržem mogućem roku.</h1>
<p class="back">Povratak na prethodnu stranicu... <a href="https://www.da-solar.hr/">DA - SOLAR</a></p>

</div>
</body>
</html>

';

?>
