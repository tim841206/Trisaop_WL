<?php
header('Content-Type: application/pdf');

header('Content-Disposition: attachment; filename="commandFile/'.$_GET['cmdno'].'.pdf"');

readfile('commandFile/'.$_GET['cmdno'].'.pdf');
?>