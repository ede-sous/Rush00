<?PHP
session_start();
include("../functions/db.php");
$sql = db_ini();
//print_r($_SESSION['id_prod']);
if ($_SESSION['id_prod'])
{
	foreach ($_SESSION['id_prod'] as $elem)
		if (!($qry[] = mysqli_fetch_assoc(mysqli_query($sql, 'SELECT * FROM `products` WHERE id="'.$elem.'"'))));
}
//print_r($qry);
if ($qry != NULL)
{
	foreach ($qry as $elem)
	{
		if ($elem)
		{
			echo '
		<html>
			<div>
				<div>name:'.$elem['name'].'</div>
				<div>degrees:'.$elem['degree'].'</div>
				<div>provenance:'.$elem['country'].'</div>
				<div>price:'.$elem['price'].'</div>
			</div>
		</html>';
		}
	}
}
?>
