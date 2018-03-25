<?php
 header("Content-type: application/octet-stream");
 header("Content-Disposition: attachment; filename=".$_GET['filename']);
?>