<?PHP
session_start();
include("../functions/db.php");
include("../functions/auth.php");
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
			$cost = $cost + $quanti * $elem['price'];
			$products_count = $products_count.$elem['name']."=".$quanti."/";
			$buy[] = array("id" =>"$elem[id]", "cost" => "$cost", "quantite" => "$quanti");
		}
	}
	if (auth($_SESSION['login'], $_SESSION['passwd'] == false))
	{?>
		<SCRIPT LANGUAGE="JavaScript">
		document.location.href="../user/login_one.php"
		</SCRIPT>
<?PHP
	}
	else
	{
		if(!(mysqli_query($sql, "INSERT INTO `basket` (`id`, `login`, `products_count`,`cost`) VALUES (NULL, '".$_SESSION['login']."','".$products_count."','".$cost."');")));
	}
}
?>
<SCRIPT LANGUAGE="JavaScript">
document.location.href="../user/succes.php"
</SCRIPT>
