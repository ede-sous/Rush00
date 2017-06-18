<?PHP
session_start();
include("../functions/db.php");
include("../functions/auth.php");
$sql = db_ini();
if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
	header('location: ../home/index.php');
$login = $_SESSION['login'];
$passwd = mysqli_real_escape_string($sql, $_POST['passwd']);
if ($_POST['deluser'] != "EFFACER" || !$login || !$passwd || $passwd != $_SESSION['passwd'] || $passwd != str_replace(" ", "", $passwd) || !auth($login, $passwd, $sql))
    return (header("Location: ./deluser_.php"));
if (!db_query($sql, "DELETE FROM `Users` WHERE login='".$login."';"))
    return (header("Location: ./deluser_.php"));
return (header("Location: ./logout.php"));
?>
