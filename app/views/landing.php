<?php
$title = 'Welcome';
ob_start();
?>

<?php include __DIR__ . '/components/section.php' ?>

<?php
$content = ob_get_clean();
include __DIR__ . '/layouts/index.php';
?>