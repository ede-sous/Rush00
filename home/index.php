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
		<a href="../home/index.php">Accueil</a>
		</li>
		<li>
			<a href="#">Nos bières</a>
			<ul>
				<li><a href="#">Blondes</a></li>
				<li><a href="#">Brunes</a></li>
				<li><a href="#">Ambrées</a></li>
				<li><a href="#">Fortes</a></li>
				<li><a href="#">Légères</a></li>
				<li><a href="#">Classique</a></li>
			</ul>
		</li>
		<li>
			<a href="#">Panier</a>
		</li>
		<li>
		<a href="<?PHP echo $link1;?>"><?= $phr1; ?></a>
		</li>
		<li>
		<a href="<?PHP echo $link2; ?>"><?PHP echo $phr2; ?></a>
		</li>
		</ul>
	</header><br/><br/>
<?
//$tab = db_fetch($sql, "SELECT * FROM `products`");
if (!($qry = mysqli_query($sql, "SELECT * FROM `products`")))
	return (false);
//print_r($qry);
while ($info[] = mysqli_fetch_assoc($qry));
//print_r($info);
foreach($info as $elem)
{
	//print_r($elem);
    if ($elem)
	echo '
	<body>
		<div style="height:200px; width:200px; align:center; background-color:black; float:left; text-align:center; position:relative; border: 1px solid white; border-radius: 10px;"><br/>
			<img style="width:85%; height:65%; top:18%;" src="../imgs/superbock.jpeg"><br/>
			<form action="../user/basket.php" method="post">
			<a style="color:white;">'.$elem['name'].' : '.$elem['price'].'€</a>
			<input type ="text" name="id" value="'.$elem['id'].'" hidden/><br/>
			<input style="position:relative; width:85%; text-align:center;" type="submit" name="addppanier" value="Ajouter au Panier"></input>
			</form>
		</div>
	</body>';
}?>
</html>
