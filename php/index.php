<?php

use MYTHEME\Greeting;
use MYTHEME\Login;


session_start();

require_once 'functions.php';

$Greetings = new Greeting();
$Login = new Login();

if (isset($_GET['logout']) && $_GET['logout'] === '1') {
	$Login->logout();
}

if ($Login->checkLogin()) {
	echo '<p><a href="?logout=1">Logout</a></p>';
	$Greetings->displayForm();
	$Greetings->displayGreetings();
} else {
	$Login->displayLoginForm();
}

