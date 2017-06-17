<?PHP
if($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['oldpw'] == "" || $_POST['newpw'] == "")
{

	echo "ERROR\n";
	return ;
}
$tab = unserialize(file_get_contents("../private/passwd"));
foreach($tab as $i => $elem)
{
	$old = hash(whirlpool, $_POST['oldpw']);
	if ($_POST['login'] != $elem['login'] || $old != $elem['passwd'] || $_POST['newpw'] == $elem['passwd'])
	{
	}
	else
	{
		$tab[$i]['passwd'] = array("login" => $_POST['login'] , "passwd" => hash(whirlpool, $_POST['newpw']));
		$data = serialize($tab);
		if(@file_put_contents("../private/passwd", $data))
		{
			echo "OK\n";
			return ;
		}
		else
		{
		echo "ERROR\n";
		return ;
		}
	}
}
echo "ERROR\n";
?>
