<?PHP
if (file_exists("./private") == false)
	mkdir("./private", 0700, true);
if (file_exists("./private/passwd") == true)
{
	$tab = unserialize(file_get_contents("./private/passwd"));
	foreach($tab as $elem)
	{
		if ($_POST['login'] == $elem['login'])
		{
			echo "ERROR\n";
			return;
		}
	}
}
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "")
{
	echo "ERROR\n";
	return ;
}
$tab[] = array("login" => $_POST['login'] , "passwd" => hash(whirlpool, $_POST['passwd']));
$data = serialize($tab);
if (file_exists("./private") == false)
{
	echo "ERROR\n";
	return ;
}
if(@file_put_contents("./private/passwd", $data))
	echo "OK\n";
else
{
	echo "ERROR\n";
	return ;
}
?>
