<?PHP
function get_products()
{
	if (!($file = file_get_contents(".products.txt")))
	{
		print("Not opening products.txt\n");
		return (FALSE);
	}
$array = array_filter(explode("\n", $file));
foreach($array as $elem)
	$info[] = explode("|", $elem);
return ($info);
}

function get_products_types()
{
	$sql = mysqli_connect("localhost", "a", "a", "edegsc");
	$str = mysqli_query($sql, "SELECT color FROM products;");
	if ($str == false)
		return (NULL);
	$result = Array();
	$i = 0;
	while ($row = mysqli_fetch_array($str)) {
		foreach($result as $type)
		{
			if ($type === $row)
				$i = 1;
		}
		if ($i == 0)
			$result[] =  $row;
		$i =0;
	}
	if (isset($result))
		return ($result);
	else
		return(NULL);
}
?>
