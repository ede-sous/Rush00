<?PHP

function db_ini()
{
	$sql = mysqli_connect("localhost", "root", "superpass");
	mysqli_select_db($sql, "edegsc");
	return ($sql);
}

function db_query($sql, $cmd)
{
	if (!($query = mysqli_query($sql, $cmd)))
		return (FALSE);
	return (TRUE);
}

function db_fetch($sql, $cmd)
{
	if (!($query = mysqli_query($sql, $cmd)))
		return (FALSE);
    $info = array();
	while ($res = mysqli_fetch_array($query))
        if ($res)
            $info[] = $res;
    print_r($info);
	return ($info);
}

?>
