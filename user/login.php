<?PHP
session_start();
include("./auth.php");

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (false);
mysqli_select_db($sql, "edegsc");

if ($_GET['login'] == "" || $_GET['passwd'] == "")
{
	echo "ERROR\n";
	return;
}
$_SESSION['login'] = mysqli_real_escape_string($sql, $_GET['login']);
$_SESSION['passwd'] = mysqli_real_escape_string($sql, $_GET['passwd']);

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

if (auth($login, $passwd, $sql) == true)
{
	$_SESSION['logged_on_user'] = $_GET['login'];
	echo '<html><body><button><a href="../home/index_co.html">vous êtes connecté</a></button></body></html>';
}
else
{
	$_SESSION['logged_on_user'] = "";
	session_destroy();
	echo '<html><body><button><a href="../home/index.html">Connection Echoué !</a></button></body></html>';
}
	mysqli_close($sql);
?>
