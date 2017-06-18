<?PHP
function auth_prodprice($name, $price, $sql)
{
	if (!($query = mysqli_query($sql, "SELECT * FROM `products` WHERE name='".$name."' and price='".$price."';")))
		return (false);
	if (!(mysqli_fetch_array($query)))
		return (false);
	return (true);
}

function auth_prod($name, $sql)
{
	if (!($query = mysqli_query($sql, "SELECT * FROM `products` WHERE name='".$name."';")))
		return (false);
	if (!(mysqli_fetch_array($query)))
		return (false);
	return (true);
}
?>
