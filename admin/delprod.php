<?PHP
session_start();
include("../functions/db.php");
include("./auth_prod.php");

if ($_POST["delprod"] !== "OK")
 return (header("Location: ./admin.php"));
$sql = db_ini();
$name = mysqli_real_escape_string($sql, $_POST["name"]);

if (!$name || !auth_prod($name, $sql))
	return (header("Location: ./admin.php"));
if (!db_query($sql, "DELETE FROM `products` WHERE name='".$name."';"))
	return (header("Location: ./admin.php"));
mysqli_close($sql);
return (header("Location: ../home/index.php"));
?>
