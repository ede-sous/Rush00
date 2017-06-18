<?PHP
session_start();
include("../functions/auth.php");

if (!($sql = mysqli_connect("localhost", "root", "superpass")))
	return (header("Location: ./login_one.php") && print("Connection Failed\n"));
mysqli_select_db($sql, "edegsc");

if ($_POST['login'] == "" || $_POST['passwd'] == "")
	return (header("Location: ./login_one.php") && print("Connection Failed\n"));

$_SESSION['login'] = mysqli_real_escape_string($sql, $_POST['login']);
$_SESSION['passwd'] = mysqli_real_escape_string($sql, $_POST['passwd']);

$login = $_SESSION['login'];
$passwd = $_SESSION['passwd'];

if (auth($login, $passwd, $sql) == true)
	$_SESSION['logged_on_user'] = $_GET['login'];
else
{
	$_SESSION['logged_on_user'] = "";
	session_destroy();
}
	mysqli_close($sql);
    header("Location: ../home/index.php");
?>
