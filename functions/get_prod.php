<?PHP
function get_products()
{
$file = array_filter(explode("\n", file_get_contents("./.products.txt")));
foreach($file as $elem)
	$info[] = explode("/", $elem);
}
return ($info);
?>
