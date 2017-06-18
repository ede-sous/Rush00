<?PHP
session_start();
include("./auth_prod.php");
include("../functions/db.php");

if ($_POST['modifprod'] !== "OK")
    return (header("Location: ./admin.php"));

$sql = db_ini();

$name = mysqli_real_escape_string($sql, $_POST['name']);
$oprice = mysqli_real_escape_string($sql, $_POST['oldprice']);
$nprice = mysqli_real_escape_string($sql, $_POST['newprice']);

if (!$name || !$oprice || !$nprice || !auth_prodprice($name, $oprice, $sql))
    return (header("Location: ./admin.php"));

if (!($info = db_fetch($sql, "SELECT * FROM `products` WHERE name='".$name."' and price='".$oprice."';")))
    return (header("Location: ./admin.php"));
if (!db_query($sql, "DELETE FROM `products` WHERE name='".$name."' and price='".$oprice."';"))
    return (header("Location: ./admin.php"));

foreach($info as $elem)
    if (!$elem || !db_query($sql, "INSERT INTO `products` (`id`, `name`, `color`, `degree`, `price`, `country`) VALUES (NULL, '".$name."','".$elem['color']."','".$elem['degree']."','".$nprice."','".$elem['$country']."');"))
        break;
return (header("Location: ../home/index.php"));
?>
