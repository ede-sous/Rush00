<?PHP
session_start();
$id_prod = $_SESSION['id_prod'];
$id_prod[] = $_POST['id'];
$_SESSION['id_prod'] = $id_prod;
header('location: ../home/index.php');
?>
