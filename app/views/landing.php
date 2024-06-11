<?php
$title = 'Welcome';
ob_start();
?>

<?php include 'components/section.php' ?>

<?php
$content = ob_get_clean();
include 'layouts/index.php';
?>