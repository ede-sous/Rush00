<?PHP
session_start();
include("../functions/db.php");
$sql = db_ini();
//print_r($_SESSION['id_prod']);
if ($_SESSION['id_prod'])
{
	$tab_id = array_count_values($_SESSION['id_prod']);
	//print_r($tab_id);
	foreach ($tab_id as $i => $elem)
	{
		if (!($qry[] = mysqli_fetch_assoc($query = mysqli_query($sql, 'SELECT * FROM `products` WHERE id="'.$i.'"'))));
	}
}
//print_r($qry);
if ($qry != NULL)
{
	foreach ($qry as $elem)
	{
		if ($elem)
		{
?>
<html>
	<div stylsheet="display:flex">
		<div stylesheet="display:flex" style="width:15%;" >name: <?=$elem['name']?></div>
		<div style="width:15%;">quantite: <?=$tab_id[$elem['id']]?></div>
		<div style="width:15%">degrees: <?=$elem['degree']?></div>
		<div style="width:15%">provenance: <?=$elem['country']?></div>
		<div style="width:15%">price: <?=$elem['price']?></div>
	</div>

<?PHP
		$cout = $cout + ($elem['price'] * $tab_id[$elem['id']]);
		}
	}
?>
	<div>Cout total: <?= $cout;?> euros</div>
</html>
<?PHP
}
?>
