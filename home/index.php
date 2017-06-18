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
		<a href="<?PHP echo $link1;?>"><?= $phr1; ?></a>
		</li>
		<li>
		<a href="<?PHP echo $link2; ?>"><?PHP echo $phr2; ?></a>
		</li>
		</ul>
	</header>
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
	echo '
    <body>
        <div style="height:21%; width:14.5%; background-color:black; position:absolute; top:4%;">
			<img style="width:85%; height:65%; position:relative; left:7.5%; top:5%;" src="../imgs/superbock.jpeg">
			<form action="basket.php" method="post>
			<a style="color:white; position:relative; top:11%; left:10%;">'.$elem['name'].' : '.$elem['price'].'€</a>
			<input type ="text" name="product" value="'.$elem['id'].'" hidden/>
            <input style="position:relative; top:15%; left:7.5%; width:85%; text-align:center;" type="submit" name="addppanier" value="Ajouter au Panier"></input>
        </div>
	</body>';
}?>
</html>
