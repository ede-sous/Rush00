<?PHP
session_start();
include("../user/db.php");
include("../user/auth.php");
$sql = db_ini();
if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
{
	echo '<html>
<meta charset="utf-8"/>
	<body>
		<button ><a href="../user/creation.php">Créer un compte.</a></button><br />
		<button ><a href="../user/login_one.php">Se connecter.</a></button><br />
	</body>
</html>';
}
else
{
	echo '<html>
	<meta charset="utf-8"/>
	<body>
		<button ><a href="../user/logout.php">Se Déconecter.</a></button>
		<button ><a href="../user/modificate.php">Modifier le mot de passe.</a></button>
	</body>
</html>';
}
?>

