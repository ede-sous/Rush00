<?PHP
if (auth($_SESSION['login'], $_SESSION['passwd']) == false)
{
	echo ("ERROR\n");
	return ;
}
echo "passe\n";

?>