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
	$phr2 = "Mot de passe";
}
?>
<html>
<div style="background-image:url(http://newvaudevillebrewco.com/wp-content/uploads/2014/09/31.jpg); width:100%; height:100%;">
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
            <form> <select name="type">
                <option>Toutes</option>
				<option>Blonde</option>
				<option>Brune</option>
				<option>Ambree</option>
				<option>Fortes</option>
				<option>Légères</option>
            </select>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="sent" value="OK"></input>
        </form>
        </li>
		<li>
			<a href="../user/panier.php">Panier</a>
		</li>
		<li>
		<a href="<?PHP echo $link1;?>"><?= $phr1; ?></a>
		</li>
		<li>
		<a href="<?PHP echo $link2; ?>"><?PHP echo $phr2; ?></a>
		</li>
<?PHP
    if ($info = db_fetch($sql, "SELECT `admin` FROM `Users` WHERE login='".$_SESSION['login']."';"))
        if ($info[0]['admin'] == 1)
        {
?>
        <li>
        <a href="../admin/admin.php">ADMIN</a>
        </li>
<?PHP
        }
        else if (auth($_SESSION['login'], $_SESSION['passwd'], $sql))
        {
?>
        <li>
        <a href="../user/deluser_.php">Effacer compte</a>
        </li>
<?PHP
        }
?>
		</ul>
	</header><br/><br/>
    <body>
<div style="position: absolute; float: left; align:center;">
<?PHP
        if ($_GET['type'] === "Fortes")
            $info = db_fetch($sql, "SELECT * FROM products WHERE degree>='7';");
        else if ($_GET['type'] === "Légères")
            $info = db_fetch($sql, "SELECT * FROM products WHERE degree<'7';");
        else if ($_GET['type'] !== "Toutes" && $_GET['type'])
            $info = db_fetch($sql, "SELECT * FROM products WHERE color='".mysqli_real_escape_string($sql, $_GET['type'])."'");
        else
            $info = db_fetch($sql, "SELECT * FROM products;");
foreach($info as $elem)
{
    if ($elem)
	{
?>
		<div style="height:200px; width:140px; align:center; background-color:black; float:left; text-align:center; position:relative; border: 1px solid white; border-radius: 10px;"><br/>
			<img style="width:85%; height:65%; top:18%;" src=<?PHP $elem['img'] ? print('"'.$elem['img'].'"') : print('"../img/as_no.png"')?>><br/>
			<form action="../user/basket.php" method="post">
			<a style="color:white;"><?PHP echo $elem['name'] ?> : <?PHP echo $elem['price'] ?>€</a>
			<input type ="text" name="id" value="<?=$elem['id']?>" hidden/><br/>
			<input style="position:relative; width:85%; text-align:center;" type="submit" name="addppanier" value="Ajouter au Panier"></input>
			</form>
		</div>
<?PHP
    }
}
?>
    </body>
</html>
