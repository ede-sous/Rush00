<?PHP
session_start();
$id_prod = $_SESSION['id_prod'];
$id_prod[] = $_POST['id'];
$_SESSION['id_prod'] = $id_prod;
?>
<SCRIPT LANGUAGE="JavaScript">
document.location.href="../home/index.php"
</SCRIPT>
