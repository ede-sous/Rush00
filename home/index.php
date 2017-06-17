<?PHP
session_start();
include("../functions/db.php");
include("../functions/auth.php");
$sql = db_ini();
if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
{
	echo '<html>
			<head>
				<meta charset="utf-8"/>
				<title>Inst3grames</title>
				<link rel="stylesheet" href="../css/index.css"/>
			</head>
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
				<a href="../user/creation.php">Creer un compte</a>
			</li>
			<li>
				<a href="../user/login_one.php">Se connecter</a>
			</li>
		</ul>';

		//'<html>
	//	<meta charset="utf-8"/>
	//	<body>
	//	<button ><a href="../user/creation.php">Créer un compte.</a></button><br />
	//	<button ><a href="../user/login_one.php">Se connecter.</a></button><br />
	//	</body>
	//	</html>';
}
else
{
	echo '<html>
			<head>
				<meta charset="utf-8"/>
				<title>inst3grames</title>
				<link rel="stylesheet" href="../css/index.css"/>
			</head>
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
				<a href="../user/logout.php">Deconnecter</a>
			</li>
			<li>
				<a href="../user/modificate.php">Modifer le mot de passe</a>
			</li>
		</ul>';
		
		
		//'<html>
		//<meta charset="utf-8"/>
		//<body>
		//<button ><a href="../user/logout.php">Se Déconecter.</a></button>
		//<button ><a href="../user/modificate.php">Modifier le mot de passe.</a></button>
		//</body>
		//</html>';
}
?>

