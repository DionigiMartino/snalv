<?php
$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$tel = $_POST['tel-cel'];
$email = $_POST['mail'];

$numero_casuale = md5(time());
$cod_delimitatore = "--=NextPart_$numero_casuale";

$tipo_email = "MIME-Version: 1.0\nContent-type: multipart/mixed;\n boundary=\"$cod_delimitatore\"\n\n";
$mittente = "From: $nome <$email>\n$tipo_email";
$destinatario = "deleghe@snalv.it";
$oggetto = "Modulo Contatto - Informazioni";
$test_mail = "Messaggio inviato da $nome - $cognome , email: $email, telefono: $tel, ";

$messaggio_a = "This is a multi-part message in MINE format.\n\n" . "--$cod_delimitatore\n" . "Content-Type:text/plain;charset=\"iso-8859-1\"\n" . "Content-Transfer-Encoding:7bit\n\n" . "$test_mail\n\n";

$messaggio = "$messaggio_a";

if (mail($destinatario, $oggetto, $messaggio, $mittente)) {
    echo "Messaggio inviato con successo";
} else {
    echo "Errore. Nessun messaggio inviato.";
}
