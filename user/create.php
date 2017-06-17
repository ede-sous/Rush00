<?PHP

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error connecting to localhost.\n"));
mysqli_select_db($sql, "edegsc");

function err($sql, $err)
{
	echo $err."\n";
	mysqli_close($sql);
}

$login = mysqli_real_escape_string($sql, $_POST["login"]);
$passwd = mysqli_real_escape_string($sql, $_POST["passwd"]);

if($_POST['submit'] != "OK" || $login == "" || $passwd == "")
	return (err($sql, "ERROR\n"));
if ($login != str_replace(" ", "", $login) || $passwd != str_replace(" ", "", $passwd))
	return (err($sql, "Contient des espaces.\n"));

if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
	return (err($sql, "There is no Users table.\n"));
if (mysqli_fetch_array($query))
	return (err($sql, "Compte deja existant !\n"));

mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".$login."', '".hash("whirlpool", $passwd)."', '0')");

mysqli_close($sql);
echo '<html><body><button><a href="../home/index.html">Votre compte a été crée.</a></button></body></html>';
?>
