<?PHP
session_start();
include("../functions/db.php");
include("../functions/auth.php");
$sql = db_ini();
if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
	header('location: ../user/login_one.php');
else
{?>
<html>
	<head>
	</head>
	<body>
	<form action="../home/index.php">
	<button type="submit" action="../home/index.php" value="OK">Achat pris en compte</button>
	</form>
	</body>
</html>
<?PHP
}
?>
