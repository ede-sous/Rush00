<?PHP
session_start();
include("../functions/db.php");
$sql = db_ini();
if ($_SESSION['id_prod'])
{
	$tab_id = array_count_values($_SESSION['id_prod']);
	foreach ($tab_id as $i => $elem)
	{
		if (!($qry[] = mysqli_fetch_assoc($query = mysqli_query($sql, 'SELECT * FROM `products` WHERE id="'.$i.'"'))));
	}
}
if ($qry != NULL)
{
	foreach ($qry as $elem)
	{
		if ($elem)
		{
			$quanti = $tab_id[$elem['id']];
			$cost = $quanti * $elem['price'];
			$buy[] = array("id" =>"$elem[id]", "cost" => "$cost", "quantite" => "$quanti");
?>
<html>
	<head>
	<title>Inst3grames</title>
	<link rel ="stylesheet" href="../css/panier.css">
	</head>
	<body>
	<div id="conteneur">
		<div class="list"><img src="<?=$elem['img']?>"/></div>
		<div class="list">name: <?=$elem['name']?></div>
		<div class="list">quantite: <?=$tab_id[$elem['id']]?></div>
		<div class ="list">degrees: <?=$elem['degree']?></div>
		<div class="list">provenance: <?=$elem['country']?></div>
		<div class="list">price: <?=$elem['price']?></div>
	</div><br />

<?PHP
		$cout = $cout + ($elem['price'] * $tab_id[$elem['id']]);
		}
	}
?>
	<div>Cout total: <?= $cout;?> euros</div>
	<form method="post" action="./buy.php">
	<input type="submit" value="Acheter"/>
	</form>
	<form action="../home/index.php">
	<input type="submit" value="Acceuil"/>
	</form>
</body>
</html>
<?PHP
}
?>
