<?PHP
session_start();
include("../functions/db.php");
include("./auth_prod.php");

if ($_POST["addprod"] !== "OK")
 return (header("Location: ./admin.php"));
$sql = db_ini();

$name = mysqli_real_escape_string($sql, $_POST["name"]);
$color = mysqli_real_escape_string($sql, $_POST["color"]);
$degree = mysqli_real_escape_string($sql, $_POST["degree"]);
$price = mysqli_real_escape_string($sql, $_POST["price"]);
$country = mysqli_real_escape_string($sql, $_POST["country"]);
$img = mysqli_real_escape_string($sql, $_POST["img"]);
if (!$img || $img != str_replace(" ", "", $img))
    $img = "../img/as_no.png";
if (!$name || !$color || !$degree || !$price || !$country || auth_prod($name, $sql))
	return (header("Location: ./admin.php"));
if (trim($name) === "" || trim($color) === ""|| trim($degree) === ""|| trim($price) === ""|| trim($country) === "")
	return (header("Location: ./admin.php"));

if (!db_query($sql, "INSERT INTO `products` (`id`, `name`, `color`, `degree`, `price`, `country`, `img`) VALUES (NULL, '".$name."','".$color."','".$degree."','".$price."','".$country."', '".$img."');"))
	return (header("Location: ./admin.php"));

mysqli_close($sql);
return (header("Location: ../home/index.php"));
?>
