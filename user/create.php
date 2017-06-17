<?PHP
$login = $_POST["login"];
$passwd = $_POST["passwd"];

if($_POST['submit'] != "OK" || $login == "" || $passwd == "")
	return (print("ERROR\n"));
if ($login != str_replace(" ", "", $login) || $passwd != str_replace(" ", "", $passwd))
	return (print("Contient des espaces.\n"));
if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error connecting to localhost.\n"));

mysqli_select_db($sql, "edegsc");
if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".mysqli_real_escape_string($sql, $login)."';")))
	return (print("There is no Users table.\n"));
if (mysqli_fetch_array($query))
	return (print("Compte deja existant !\n"));

mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".mysqli_real_escape_string($sql, $login)."', '".mysqli_real_escape_string($sql, hash("whirlpool", $passwd))."', '0')");

mysqli_close($sql);
print("Success\n");
?>
