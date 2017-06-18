<?PHP
session_start();
print_r($_POST);
$id_prod = $_SESSION['id_prod'];
$id_prod[] = $_POST['id'];
$_SESSION['id_prod'] = $id_prod;
print_r($_SESSION['id_prod']);//print_r($_SESSION);
?>

<SCRIPT LANGUAGE="JavaScript">
document.location.href="../home/index.php"
</SCRIPT>
