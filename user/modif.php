<?PHP

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error a se connecter.\n"));
mysqli_select_db($sql, "edegsc");

function err($sql, $err)
{
	echo $err."\n";
	mysqli_close($sql);
}

$login = mysqli_real_escape_string($sql, $_POST["login"]);
$oldpwd = mysqli_real_escape_string($sql, $_POST["oldpwd"]);
$newpwd = mysqli_real_escape_string($sql, $_POST["newpwd"]);

if($_POST['submit'] !== "OK" || $login === ""|| $oldpwd === ""|| $newpwd === "")
	return (err($sql, "ERROR\n"));
if ($oldpwd === $newpwd)
	return (err($sql, "Le nouveau mot de passe est identique au ancien.|$newpwd||$oldpwd|\n"));
if ($login != str_replace(" ", "", $login) || $oldpwd != str_replace(" ", "", $oldpwd) || $newpwd != str_replace(" ", "", $newpwd))
	return (err($sql, "Contient des Espaces.\n"));

if (!mysqli_fetch_array(mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
		return (err($sql, "Compte Inexistant.\n"));

$oldpwd = hash("whirlpool", $oldpwd);
if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
	return (err($sql, "Compte Inexistant\n"));

if (!($res = mysqli_fetch_array($query)))
	return (err($sql, "Compte Inexistant\n"));
if ($res["passwd"] !== $oldpwd)
	return (err($sql, "L'Ancien mot de passe est faux.\n"));

mysqli_query($sql, "DELETE FROM Users WHERE login='".$login."';");
mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".$login."', '".hash("whirlpool", $newpwd)."', '0')");

mysqli_close($sql);

echo "Success\n";
?>
