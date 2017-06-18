<?PHP
session_start();

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error a se connecter.\n"));
mysqli_select_db($sql, "edegsc");

function err($sql)
{
	mysqli_close($sql);
	echo '<html><body><button><a href="../home/index.php">La modification du mot de passe a échoué.</a></button></body></html>';
}

$login = mysqli_real_escape_string($sql, $_POST["login"]);
$oldpwd = mysqli_real_escape_string($sql, $_POST["oldpwd"]);
$newpwd = mysqli_real_escape_string($sql, $_POST["newpwd"]);

if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
	header('location: ../home/index.php');
if($_POST['submit'] !== "OK" || $login === ""|| $oldpwd === ""|| $newpwd === "")
	return (err($sql));
if ($oldpwd === $newpwd)
	return (err($sql, "Le nouveau mot de passe est identique au ancien.|$newpwd||$oldpwd|\n"));
if ($login != str_replace(" ", "", $login) || $oldpwd != str_replace(" ", "", $oldpwd) || $newpwd != str_replace(" ", "", $newpwd))
	return (err($sql));

if (!mysqli_fetch_array(mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
		return (err($sql));

$oldpwd = hash("whirlpool", $oldpwd);
if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
	return (err($sql));

if (!($res = mysqli_fetch_array($query)))
	return (err($sql));
if ($res["passwd"] !== $oldpwd)
	return (err($sql));

mysqli_query($sql, "DELETE FROM Users WHERE login='".$login."';");
mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".$login."', '".hash("whirlpool", $newpwd)."', '0')");
$_SESSION['passwd'] = $newpwd;
mysqli_close($sql);

echo '<html><body><button><a href="../home/index.php">Mot de passe modifié avec succès.</a></button></body></html>';
?>
