<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\newsletter\vendor\phpmailer\phpmailer\src\Exception.php';
require 'C:\xampp\htdocs\newsletter\vendor\phpmailer\phpmailer\src\PHPMailer.php';
require 'C:\xampp\htdocs\newsletter\vendor\phpmailer\phpmailer\src\SMTP.php';
require_once 'connection.php';
//Create an instance; passing `true` enables exceptions


if (isset($_POST['envoi']))
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->CharSet = "UTF-8";
    $mail->Host = 'sandbox.smtp.mailtrap.io';
    $mail->SMTPAuth = true;
    $mail->Port = 2525;
    $mail->Username = 'de577f5ad02888';
    $mail->Password = '3f04438ccd780e';
    //Enable implicit TLS encryption
    $mail->setFrom("no-reply@newsletter.com");
    $sqlVerif="SELECT mail FROM user";
    $rs = $db->query($sqlVerif);
    while ($rows = $rs->fetch())
    {
        $mail->addAddress($rows['mail']);
    }
    $mail->isHTML(true);
    $mail->Subject = $_POST['sujet'];
    $mail->Body    = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>06</title>
</head>

<body>

<table cellpadding="0" cellspacing="0" width="600" align="center" style="font-size:13px; color:black; font-family:Arial, Helvetica, sans-serif;">
	<tr>
		<td><img src="https://direction-x.com/kitmail/src/rencontre/18/images/01.jpg" /></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td rowspan="2"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/02.jpg" /></td>
					<td rowspan="2" width="130" valign="top" align="left"><a href="https://direction-x.com/kitmail/proxy.php?data=eyJpZCI6IjMxNTQ3IiwidXJsIjoiaHR0cDpcL1wvbWVkaWEudGh1bWJzLXNoYXJlLmNvbVwvdGh1bWJzXC9kXC9BXC9CXC9kQUJjQTMzQ3owUC5qcGciLCJyYW5kb20iOjEsIm5pY2hlcyI6WyIxNTEiXSwibWFpbl9uaWNoZSI6IjE1MSJ9&parameters=eyJjb3VudCI6NCwibmljaGVzIjpbMTUxXSwiY2F0ZWdvcmllcyI6WzFdLCJmb3JtYXQiOiIxMjB4MTIwIiwiY29udGV4dCI6InBkdiIsImJlaGF2aW91ciI6MTMsInRpdGxlcyI6MSwibWV0YWRhdGEiOjEsImV4Y2x1ZGVkX2lkcyI6W119&ids=WyIzMTU0NyIsIjMxMjc5IiwiMzE0NDgiLCIzMTQ4NCJd&target_url=aHR0cHM6Ly9kaXJlY3Rpb24teC5jb20vYS5waHA/dD0yOSZwZ19mb3JjZV9kaXNjbD0xJnBnaWQ9MTE4NTcmcmViaWxsPTAmbz1pZiZuPTE1MSZtb2RlPTE=" target="_blank"><img src="http://media.thumbs-share.com/thumbs/d/A/B/dABcA33Cz0P.jpg" /></a></td>
					<td width="459" height="93" background="https://direction-x.com/kitmail/src/rencontre/18/images/03.jpg" valign="top">
						<a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank" style="text-decoration: none; color: black; display: block; height: 100%;">
							Pseudo : <span style="color:#ff0066; font-weight:bold">malia</span><br />
							Age : <strong>19 ans</strong><br />
							Localisation : <strong>à moins de 24 km</strong><br />
							Actuellement : <span style="color:#009904; font-weight:bold">En ligne</span>
						</a>
					</td>
				</tr>
				<tr>
					<td><a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/04.jpg" /></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><img src="https://direction-x.com/kitmail/src/rencontre/18/images/05.jpg" /></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td rowspan="2"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/02.jpg" /></td>
					<td rowspan="2" width="130" valign="top" align="left"><a href="https://direction-x.com/kitmail/proxy.php?data=eyJpZCI6IjMxMjc5IiwidXJsIjoiaHR0cDpcL1wvbWVkaWEudGh1bWJzLXNoYXJlLmNvbVwvdGh1bWJzXC90XC8xXC9VXC90MVU3SnlydWJuWC5qcGciLCJyYW5kb20iOjEsIm5pY2hlcyI6WyIxMjYiLCIxNTEiXSwibWFpbl9uaWNoZSI6IjEyNiJ9&parameters=eyJjb3VudCI6NCwibmljaGVzIjpbMTUxXSwiY2F0ZWdvcmllcyI6WzFdLCJmb3JtYXQiOiIxMjB4MTIwIiwiY29udGV4dCI6InBkdiIsImJlaGF2aW91ciI6MTMsInRpdGxlcyI6MSwibWV0YWRhdGEiOjEsImV4Y2x1ZGVkX2lkcyI6W119&ids=WyIzMTU0NyIsIjMxMjc5IiwiMzE0NDgiLCIzMTQ4NCJd&target_url=aHR0cHM6Ly9kaXJlY3Rpb24teC5jb20vYS5waHA/dD0yOSZwZ19mb3JjZV9kaXNjbD0xJnBnaWQ9MTE4NTcmcmViaWxsPTAmbz1pZiZuPTE1MSZtb2RlPTE=" target="_blank"><img src="http://media.thumbs-share.com/thumbs/t/1/U/t1U7JyrubnX.jpg" /></a></td>
					<td width="459" height="93" background="https://direction-x.com/kitmail/src/rencontre/18/images/07.jpg" valign="top">
						<a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank" style="text-decoration: none; color: black; display: block; height: 100%;">
							Pseudo : <span style="color:#ff0066; font-weight:bold">zoe</span><br />
							Age : <strong>26 ans</strong><br />
							Localisation : <strong>à moins de 24 km</strong><br />
							Actuellement : <span style="color:#009904; font-weight:bold">En ligne</span>
						</a>
					</td>
				</tr>
				<tr>
					<td><a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/04.jpg" /></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><img src="https://direction-x.com/kitmail/src/rencontre/18/images/05.jpg" /></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td rowspan="2"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/02.jpg" /></td>
					<td rowspan="2" width="130" valign="top" align="left"><a href="https://direction-x.com/kitmail/proxy.php?data=eyJpZCI6IjMxNDQ4IiwidXJsIjoiaHR0cDpcL1wvbWVkaWEudGh1bWJzLXNoYXJlLmNvbVwvdGh1bWJzXC9XXC9hXC9SXC9XYVJOUTFnWkpmSi5qcGciLCJyYW5kb20iOjEsIm5pY2hlcyI6WyIxNTEiLCIxNzIiXSwibWFpbl9uaWNoZSI6IjE1MSJ9&parameters=eyJjb3VudCI6NCwibmljaGVzIjpbMTUxXSwiY2F0ZWdvcmllcyI6WzFdLCJmb3JtYXQiOiIxMjB4MTIwIiwiY29udGV4dCI6InBkdiIsImJlaGF2aW91ciI6MTMsInRpdGxlcyI6MSwibWV0YWRhdGEiOjEsImV4Y2x1ZGVkX2lkcyI6W119&ids=WyIzMTU0NyIsIjMxMjc5IiwiMzE0NDgiLCIzMTQ4NCJd&target_url=aHR0cHM6Ly9kaXJlY3Rpb24teC5jb20vYS5waHA/dD0yOSZwZ19mb3JjZV9kaXNjbD0xJnBnaWQ9MTE4NTcmcmViaWxsPTAmbz1pZiZuPTE1MSZtb2RlPTE=" target="_blank"><img src="http://media.thumbs-share.com/thumbs/W/a/R/WaRNQ1gZJfJ.jpg" /></a></td>
					<td width="459" height="93" background="https://direction-x.com/kitmail/src/rencontre/18/images/08.jpg" valign="top">
						<a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank" style="text-decoration: none; color: black; display: block; height: 100%;">
							Pseudo : <span style="color:#ff0066; font-weight:bold">ana</span><br />
							Age : <strong>18 ans</strong><br />
							Localisation : <strong>à moins de 24 km</strong><br />
							Actuellement : <span style="color:#009904; font-weight:bold">En ligne</span>
						</a>
					</td>
				</tr>
				<tr>
					<td><a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/04.jpg" /></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><img src="https://direction-x.com/kitmail/src/rencontre/18/images/05.jpg" /></td>
	</tr>
	<tr>
		<td>
			<table cellpadding="0" cellspacing="0" width="600">
				<tr>
					<td rowspan="2"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/02.jpg" /></td>
					<td rowspan="2" width="130" valign="top" align="left"><a href="https://direction-x.com/kitmail/proxy.php?data=eyJpZCI6IjMxNDg0IiwidXJsIjoiaHR0cDpcL1wvbWVkaWEudGh1bWJzLXNoYXJlLmNvbVwvdGh1bWJzXC9xXC82XC96XC9xNno2VVNyaEgzdy5qcGciLCJyYW5kb20iOjEsIm5pY2hlcyI6WyIxNTEiLCIxODIiXSwibWFpbl9uaWNoZSI6IjE1MSJ9&parameters=eyJjb3VudCI6NCwibmljaGVzIjpbMTUxXSwiY2F0ZWdvcmllcyI6WzFdLCJmb3JtYXQiOiIxMjB4MTIwIiwiY29udGV4dCI6InBkdiIsImJlaGF2aW91ciI6MTMsInRpdGxlcyI6MSwibWV0YWRhdGEiOjEsImV4Y2x1ZGVkX2lkcyI6W119&ids=WyIzMTU0NyIsIjMxMjc5IiwiMzE0NDgiLCIzMTQ4NCJd&target_url=aHR0cHM6Ly9kaXJlY3Rpb24teC5jb20vYS5waHA/dD0yOSZwZ19mb3JjZV9kaXNjbD0xJnBnaWQ9MTE4NTcmcmViaWxsPTAmbz1pZiZuPTE1MSZtb2RlPTE=" target="_blank"><img src="http://media.thumbs-share.com/thumbs/q/6/z/q6z6USrhH3w.jpg" /></a></td>
					<td width="459" height="93" background="https://direction-x.com/kitmail/src/rencontre/18/images/09.jpg" valign="top">
						<a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank" style="text-decoration: none; color: black; display: block; height: 100%;">
							Pseudo : <span style="color:#ff0066; font-weight:bold">charlotte</span><br />
							Age : <strong>22 ans</strong><br />
							Localisation : <strong>à moins de 24 km</strong><br />
							Actuellement : <span style="color:#009904; font-weight:bold">En ligne</span>
						</a>
					</td>
				</tr>
				<tr>
					<td><a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/04.jpg" /></a></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td><a href="https://direction-x.com/a.php?t=29&pg_force_discl=1&pgid=11857&rebill=0&o=if&n=151&mode=1" target="_blank"><img src="https://direction-x.com/kitmail/src/rencontre/18/images/06.jpg" /></a></td>
	</tr>
</table>
<a style="margin-left:500px ; margin-top: 20px" href="http://localhost/newsletter/out.php">Si tu souhaite te désabonner alors clique ici</a>
</body>
</html>

';
    if (!$mail->Send()) {
        echo "Echec de l'envoi";
        return false;

    }
    else {
        echo "Le mail a été envoyé";
        return true;

    }
    ?>
    <meta http-equiv="refresh" content="3;url=http://localhost/newsletter/message.php" />
<?php
}




