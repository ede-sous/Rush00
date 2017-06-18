<?PHP
session_start();
$_SESSION['logged_on_user'] = NULL;
session_destroy();
header("Location: ../home/index.php")
?>
