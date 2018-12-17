<?php
ob_start();

defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT", __DIR__ . DS . "templates");

$connection = mysqli_connect("localhost", "root", "meek", "iticafrica");

	if (mysqli_connect_errno()) {
		echo "failed to Connect" . mysqli_connect_errno();
	}

 ?>
