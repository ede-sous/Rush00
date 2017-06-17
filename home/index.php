<?PHP
session_start();
include("../functions/db.php");
include("../functions/auth.php");
$sql = db_ini();
if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
{
	$link1 = "../user/creation.php";
	$link2 = "../user/login_one.php";
	$phr1 = "Creer compte";
	$phr2 = "Se connecter";
}
else
{
	$link1 = "../user/logout.php";
	$link2 = "../user/modificate.php";
	$phr1 = "Se deconnecter";
	$phr2 = "Modifier le mot de passe";
}
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Inst3grames</title>
		<link rel="stylesheet" href="../css/index.css"/>
	</head>
	<header>
		<ul id="menu">
		<li>
		<a href="../home/index.php">accueil</a>
		</li>
		<li>
			<a href="#">nos bieres</a>
			<ul>
				<li><a href="#">blondes</a></li>
				<li><a href="#">brunes</a></li>
				<li><a href="#">ambrees</a></li>
				<li><a href="#">fortes</a></li>
				<li><a href="#">legeres</a></li>
				<li><a href="#">classique</a></li>
			</ul>
		</li>
		<li>
			<a href="#">panier</a>
		</li>
		<li>
		<a href="<?PHP echo $link1;?>"><?PHP echo $phr1; ?></a>
		</li>
		<li>
		<a href="<?PHP echo $link2; ?>"><?PHP echo $phr2; ?></a>
		</li>
		</ul>
	</header>
</html>
