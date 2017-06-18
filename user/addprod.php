<?PHP
session_start();
include("../functions/db.php");

if ($_POST["addprod"] !== "OK")
 return (header("Refresh"));
$sql = db_ini();

$name = mysqli_real_escape_string($sql, $_POST["name"]);
$color = mysqli_real_escape_string($sql, $_POST["color"]);
$degree = mysqli_real_escape_string($sql, $_POST["degree"]);
$price = mysqli_real_escape_string($sql, $_POST["price"]);
$country = mysqli_real_escape_string($sql, $_POST["country"]);

if (!$name || !$color || !$degree || !$price || !$country)
	return (header("Refresh"));
if (trim($name) === "" || trim($color) === ""|| trim($degree) === ""|| trim($price) === ""|| trim($country) === "")
	return (print("Data Missing\n"));

if (!db_query($sql, "INSERT INTO `products` (`id`, `name`, `color`, `degree`, `price`, `country`) VALUES (NULL, '".$name."','".$color."','".$degree."','".$price."','".$country."');"))
	return (print("booo"));

mysqli_close($sql);
?>
