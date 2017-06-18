<?PHP
session_start();
include("../functions/db.php");
$sql = db_ini();
print_r($_POST);
print_r($_SESSION);
?>
