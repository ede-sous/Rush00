<?PHP
if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error connecting to localhost.\n"));
mysqli_select_db($sql, "edegsc");

function err($sql)
{
	mysqli_close($sql);
	echo '<html><body><button><a href="../home/index.html">La création de votre compte a échoué.</a></button></body></html>';
}

$login = mysqli_real_escape_string($sql, $_POST["login"]);
$passwd = mysqli_real_escape_string($sql, $_POST["passwd"]);

if($_POST['submit'] != "OK" || $login == "" || $passwd == "")
	return (err($sql));
if ($login != str_replace(" ", "", $login) || $passwd != str_replace(" ", "", $passwd))
	return (err($sql));

if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."';")))
	return (err($sql));
if (mysqli_fetch_array($query))
	return (err($sql));

mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".$login."', '".hash("whirlpool", $passwd)."', '0')");

mysqli_close($sql);
echo '<html><body><button><a href="../home/index.html">Votre compte a été crée.</a></button></body></html>';
?>
