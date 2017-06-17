<?PHP
session_start();
include("./auth.php");
if ($_GET['login'] == "" || $_GET['passwd'] == "")
{
	echo "ERROR\n";
	return;
}
$_SESSION['login'] = $_GET['login'];
$_SESSION['passwd'] = $_GET['passwd'];

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

if (auth($login, $passwd) == true)
{
	$_SESSION['logged_on_user'] = $_GET['login'];
	//header('Location: ../home/acceuil.html');
	echo '<html><body><button><a href="../home/index.html">vous êtes connecté</a></button></body></html>';
}
else
{
	$_SESSION['logged_on_user'] = "";
	echo "ERROR\n";
}
?>
