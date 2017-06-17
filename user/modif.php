<?PHP
$login = $_POST['login'];
$oldpwd = $_POST['oldpw'];
$newpwd = $_POST['newpw'];

if($_POST['submit'] !== "OK" || $login != ""|| $oldpwd != ""|| $newpwd != "")
	return (print("ERROR\n"));
if ($oldpwd === $newpwd)
	return (print("Le nouveau mot de passe est identique au ancien.\n"));
if ($login != str_replace($login) || $oldpwd != str_replace($oldpwd) || $newpwd != str_replace($newpwd))
	return (print("Contient des Espaces.\n"));

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error a se connecter.\n"));

mysqli_select_db($sql, "edegsc");
if (!mysqli_fetch_array(mysqli_query($sql, "SELECT * FROM Users WHERE login='".mysqli_real_escape_string($sql, $login)."';")))
		return (print("Compte Inexistant.\n"));

$oldpwd = hash("whirlpool", $oldpwd);
if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".mysqli_real_escape_string($sql, $login)."';")))
	return (print("Compte Inexistant\n"));

if (!($res = mysqli_fetch_array($query)))
	return (print("Compte Inexistant\n"));
if ($res["passwd"] !== $oldpwd)
	return (print("L'Ancien mot de passe est faux.\n"));

mysqli_query($sql, "DELETE FROM Users WHERE login='".mysqli_real_escape_string($sql, $login)."';");
mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".mysqli_real_escape_string($sql, $login)."', '".mysqli_real_escape_string($sql, hash("whirlpool", $newpwd))."', '0')");

mysqli_close($sql);

echo "Success\n";
?>
