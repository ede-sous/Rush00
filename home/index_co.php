<?PHP/*
include("../user/authi.php");
if (authi($_SESSION['login'], $_SESSION['passwd']) == false)
{
	echo ("ERROR\n");
	return ;
}
echo "passe\n";
 */?>
<html>
<meta charset="utf-8"/>
	<body>
		<button ><a href="../user/logout.php">Se Déconecter.</a></button>
		<button ><a href="../user/modificate.php">Modifier le mot de passe.</a></button>
	</body>
</html>
