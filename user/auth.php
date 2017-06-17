<?PHP
function auth($login, $passwd)
{
	$pwd = hash("whirlpool", $passwd);
	$file = "./private/passwd";
	$tab = unserialize(file_get_contents($file));
	foreach ($tab as $case)
	{
		if ($login == $case['login'] && $pwd == $case['passwd'])
			return (true);
	}
	return (false);
}
?>
