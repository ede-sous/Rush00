<?PHP
if (auth($_SESSION['login'], $_SESSION['passwd']) == false)
{
	echo ("ERROR\n");
	return ;
}
echo "passe\n";
?>
<html>
<meta charset="utf-8"/>
	<body>
		<button ><a href="../user/logout.php">se déconecter</a></button>
		<button ><a href="../user/modificate.php">modifier mot de passe</a></button>
	</body>
</html>
