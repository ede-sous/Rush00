<?PHP
function auth($login, $passwd, $sql)
{
	$pwd = hash("whirlpool", $passwd);
	if (!($query = mysqli_query($sql, "SELECT * FROM Users WHERE login='".$login."' and passwd='".$pwd."';")))
		return (false);
	if (!(mysqli_fetch_array($query)))
		return (false);
	return (true);
}
?>
