<?php if(isset($_SESSION['Auth']) & $utilisateurs->membre_rang == 'Administrateur'): ?>
<?php else : header('location: index.php'); ?>
<?php endif; ?>


<?php
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);
?>