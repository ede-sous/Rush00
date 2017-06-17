<?PHP
function authi($login, $passwd)
{
if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print('<html><body><button><a href="../home/index.php">Connection échoué !</a></button></body></html>'));
mysqli_select_db($sql, "edegsc");

	$pwd = hash("whirlpool", $passwd);
	if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."' and passwd='".$pwd."';")))
		return (false);
	if (!(mysqli_fetch_array($query)))
		return (false);
	mysqli_close($sql);
	return (true);
}
?>
