<?PHP
session_start();
$_SESSION['logged_on_user'] = NULL;
session_destroy();

echo '<html><body><button><a href="../home/index.php">Déconnecté.</a></button></body></html>';
?>
