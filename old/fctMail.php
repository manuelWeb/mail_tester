<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<title>Moteur d'envoi vers mdevries@domoti.fr</title>
</head>

<body>
<label for="retour">Changer votre code source</label>
<input type="button" name="retour" value="retour" onclick="javascript:history.back();"/>

      <!-- début formulaire de contact -->
 <?php
 
$mail =   $HTTP_POST_VARS['adMail'];//Déclaration de l'adresse de livraison.
$depuis = $HTTP_POST_VARS['deMail'];//déclaration de l'adresse d'envoi

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
{
	$passage_ligne = "\r\n";
}
else
{
	$passage_ligne = "\n";
}
//=====Déclaration des messages au format texte et au format HTML.
$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
$message_html = $HTTP_POST_VARS['message'];
//==========
if(isset($_POST['message'])) $message=$_POST['message'];
if(isset($_POST['adMail'])) $mail=$_POST['adMail'];
if(isset($_POST['deMail'])) $depuis=$_POST['deMail'];
//=====Création de la boundary
$boundary = "-----=".md5(rand());
//==========
 
//=====Définition du sujet.
$sujet = "le sujet : important !";
//=========
 
//=====Création du header de l'e-mail.
$header = "From: ".$depuis.$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
//==========
 
//=====Création du message.
$message = $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format texte.
$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.$message_txt.$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary.$passage_ligne;
//=====Ajout du message au format HTML
$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
$message.= $passage_ligne.stripslashes($message_html).$passage_ligne;
//==========
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
//==========
 
//=====Envoi de l'e-mail.
mail($mail,$sujet,$message,$header);
//==========
?>
  
</body>
</html>
