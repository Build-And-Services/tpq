<?php
$title = 'Kegiatan';
ob_start();
?>


<?php
$content = ob_get_clean();
include __DIR__ . '/../../../layouts/index.php';
?>