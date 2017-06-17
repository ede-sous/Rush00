<?PHP
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
	return (print("ERROR\n"));
if ($_POST['login'] != str_replace(" ", "", $_POST['login']) || $_POST['passwd'] != str_replace(" ", "", $_POST['passwd']))
	return (print("Contient des espaces.\n"));
if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print("Error connecting to localhost.\n"));

mysqli_select_db($sql, "edegcs");

if (mysqli_fetch_array(mysqli_query($sql, "SELECT * FROM Users WHERE login='".mysqli_real_escape_string($sql, $_POST["login"])."';")))
	return (print("Compte deja existant !\n"));

mysqli_query($sql , "INSERT INTO `Users` (`id`, `login`, `passwd`, `admin`) VALUES (NULL, '".mysqli_real_escape_string($sql, $_POST["login"])."', '".mysqli_real_escape_string($sql, hash("whirlpool", $_POST["passwd"]))."', '0')");

mysqli_close($sql);
print("Success\n");
?>
