<?PHP
    session_start();
    include("../functions/db.php");
    include("../functions/auth.php");
    include("../functions/get_prod.php");
    include("./auth_prod.php");
    $sql = db_ini();
    if (auth($_SESSION['login'], $_SESSION['passwd'], $sql) == false)
    	header('location: ../home/index.php');
    if (!$info = db_fetch($sql, "SELECT `admin` FROM `Users` WHERE login='".$_SESSION['login']."';"))
        header("Location: ../home/index.php");
    if ($_POST['BACK'] == "Go Back")
		header("Location: ../home/index.php");
	$query =  mysqli_query($sql, "SELECT * FROM `basket`");
	while ($tab[] = mysqli_fetch_assoc($query));
	//print_r($tab);
?>

<html>
	<head>
        <title>Inst3grames</title>
		<style>
			.t1 {
                text-align: left;
                position: relative;
                background-color:black;
                height:300px;
                width:250px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .t2 {
                text-align: center;
                position: relative;
                background-color:black;
                height:150px;
                width:250px;
                font-size: 18px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .t3 {
                text-align: center;
                position: relative;
                background-color:black;
                height:300px;
                width:250px;
                font-size: 18px;
                color:white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .t4 {
    text-align: center;
    position: relative;
    background-color:black;
    height:174px;
    width:250px;
    font-size: 18px;
    color:white;
    border: 3px solid brown;
    border-radius: 5px;
}
            .i {
                position: absolute;
                left: 25%;
                width: 72%;
            }
            .i2 {
                position: relative;
                width: 72%;
            }
            h1{
                text-align: center;
                position:relative;
                color:white;
            }
            header {
                width:100%;
                height:10%;
                background-color:black;
                position:relative;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .m {
                position: absolute;
                left: 2%;
                width: 75px;
                background-color: white;
                border: 3px solid brown;
                border-radius: 5px;
            }
            .i3 {
                position:relative;
                text-align:center;
                background-color:brown;
                color:white;
                border-radius:5px;
                width: 75px;
            }
		</style>
        <header>
            <br/><h1><u>Hello You Mighty One !</u></1>
            <form class="m" method="post" action="admin.php">
                <input class="i3" type="submit" name="BACK" value="Go Back"></input>
            </form>
        </header><br/>
	</head>
	<body>
        <div>
		<form class="t1" action="addprod.php" method="post">
            <h3 align="center";><u>Ajouter un nouveau produit.</u></h3>
            Name :<input class="i" type="text" name="name" value=""></input><br/><br/>
            Color:<input class="i" type="text" name="color" value=""></input><br/><br/>
            Degree:<input class="i" type="float" name="degree" value=""></input><br/><br/>
            Price :<input class="i" type="float" name="price" value=""></input><br/><br/>
            Country:<input class="i" type="text" name="country" value=""></input><br/><br/>
            Image :<input class="i" type="text" name="img" value=""></input><br/><br/>
            <input style="position:relative; left:5%; width:90%; height: 50%;" type="submit" name="addprod" value="OK"></input>
        </form>
        <form class="t2" action="delprod.php" method="post">
            <h3 align="center";><u>Effacer un produit.</u></h3>
            Name :<br/><input class="i2" type="text" name="name" value=""></input><br/><br/>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="delprod" value="OK"></input>
        </form>
        <form class="t3" action="modifprod.php" method="post">
            <h3 align="center";><u>Modifier le prix d'un produit.</u></h3>
            Name :<br/><input class="i2" type="text" name="name" value=""></input><br/><br/>
            Old Price :<br/><input class="i2" type="text" name="oldprice" value=""></input><br/><br/>
            New Price :<br/><input class="i2" type="text" name="newprice" value=""></input><br/><br/>
            <input style="position:relative; width:90%; height: 50%;" type="submit" name="modifprod" value="OK"></input>
        </form>
        <form class="t4">
           <h3 align="center";><u>Show products based on types.</u></h3>
           type :<br/><SELECT name="type" size="1" width="40">
           <OPTION>ALL</OPTION>
           <?PHP $str = get_products_types(); foreach($str as $value=>$key) {
           foreach($key as $key =>$type) if ($key === 'color')echo("<OPTION>".$type."</OPTION>"); }?>
           </SELECT>
           <input style="position:relative; width:90%; height: 50%;" type="submit" name="sent" value="OK"></input>
       </form>
       </div>
       <div style="position: absolute; float: right; top: 12.25%;left: 265;">
<?PHP 			if ($_GET['sent'] === "OK");
               {
               if ($_GET['type'] !== "ALL")
                   $info = db_fetch($sql, "SELECT * FROM `products` WHERE color='".mysqli_real_escape_string($sql, $_GET['type'])."'");
               else if (isset($_GET['type']))
                   $info = db_fetch($sql, "SELECT * FROM `products`");

               foreach($info as $elem)
               {
                   if ($elem)
                   {?>
       <div id="debug" style="height:200px; width:140px; align:center; background-color:black; float: right;float:right; text-align:center; border: 1px solid white; border-radius: 10px;top: 10;"><br/>
           <img style="width:85%; height:65%; top:18%;" src=<?PHP $elem['img'] ? print('"'.$elem['img'].'"') : print('"../img/as_no.png"')?>><br/>
           <form action="../user/basket.php" method="post">
           <a style="color:white;"><?PHP echo $elem['name'] ?> <br \> <?PHP echo $elem['price'] ?>€</a>
           </form>
       </div>
<?PHP
                       }
}
           };?>
   </div>
	</body>
</html>
<?PHP
	$i = 0;
	foreach ($tab as $elem)
	{
		if ($elem)
		{
			$tab_qt_cnt = explode("/", $elem['products_count']);
			$qt_cnt = str_replace("=", " x ", $tab_qt_cnt);
			foreach($qt_cnt as $elements)
			{
				if ($elements)
					$product[$i++] = $elements;
			}

?>
<html>
	<head>
	<title>Inst3grames</title>
	<link rel ="stylesheet" href="../css/admin_panier.css">
	</head>
	<body>
	<div id="conteneur">
		<div class="list">login: <?=$elem['login']?></div>
		<div class="product_case">products:<??></div>
<?PHP
		foreach($product as $elems)
		{?>
		<div class="product"><?= $elems;?></div>
		<?PHP
		}?>
		<br />
		<br />
		<br />
		<div class="product">price: <?=$elem['cost']?></div>
	</div><br />
	</body>
	</html><?PHP
		}
	$product = "";
	}
?>
