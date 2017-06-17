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
	$info[] = explode("/", $elem);
return ($info);
}
?>
