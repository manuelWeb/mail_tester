<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html" charset="UTF-8" />
<meta http-equiv="pragma" content="no-cache" />
<title>form01_page de contact</title>
</head>

<body>
<input type="button" value="retour"/>

      <!-- début formulaire de contact -->
      <?php
//declaration de variables
$nom=$HTTP_POST_VARS['nom']; 
$mail=$HTTP_POST_VARS['mail']; 
$objet=$HTTP_POST_VARS['objet']; 
$message=$HTTP_POST_VARS['message'];

$separateur="&nbsp;";
$retour="<br />";
$merci="<h1 style='color:#383C40'>Merci pour votre message</h1> ";
$lobjet="<h3 style='color:#383C40'>Votre requête:</h3>";
$VotreMessage="<h3 style='color:#383C40'>Votre message:</h3>";




if(isset($_POST['message'])) $message=$_POST['message'];
else $pref="";
//testMail
/////voici la version Mime 
$headers = "MIME-Version: 1.0\r\n"; 
//////ici on détermine le mail en format text 
$headers .= "Content-Type: multipart/alternative; charset=iso-8859-1\r\n"; 
////ici on détermine l'expediteur et l'adresse de réponse 
$headers .= "From: $nom <$mail>\r\nReply-to : $nom <$mail>\nX-Mailer:PHP"; 
$subject="$objet"; 
$destinataire="manou3d@free.fr"; //remplacez "webmaster@votre-site.com" par votre adresse e-mail
$body="$message"; 


if (mail($destinataire,$subject,$body,$headers))
	{
	//manipulation de chaines alphanumeriques
	$nom=strtoupper($nom);
	// affichage des infos à l'écran
echo $merci, $retour, $lobjet, $objet, $retour, $VotreMessage, $message, $retour;

	}

?>      <!-- fin formulaire de contact --> 
   
</body>
</html>
