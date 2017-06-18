<?PHP
session_start();
include("../functions/auth.php");

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (print('<html><body><button><a href="../home/index.php">Connection échoué !</a></button></body></html>'));
mysqli_select_db($sql, "edegsc");

if ($_POST['login'] == "" || $_POST['passwd'] == "")
	return (print('<html><body><button><a href="../home/index.php">Connection échoué  !</a></button></body></html>'));

$_SESSION['login'] = mysqli_real_escape_string($sql, $_POST['login']);
$_SESSION['passwd'] = mysqli_real_escape_string($sql, $_POST['passwd']);

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

if (auth($login, $passwd, $sql) == true)
{
	$_SESSION['logged_on_user'] = $_GET['login'];
	echo '<html><body><button><a href="../home/index.php">Vous êtes connecté</a></button></body></html>';
}
else
{
	//$_SESSION['logged_on_user'] = "";
	//session_destroy();
	echo '<html><body><button><a href="../user/login_one.php">Connection échoué !</a></button></body></html>';
}
	mysqli_close($sql);
?>
