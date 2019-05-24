<?php
	$shop = getshop($_GET['shopid']);
	$item = getitem($_GET['shopid'], $_GET['itemid']);
	require('vues/vueEdititem.php');
?>
