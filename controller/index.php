<?php

if (strtolower(filter_input(INPUT_SERVER, 'HTTP_X_REQUESTED_WITH')) === 'xmlhttprequest') {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if ($_GET['module'] == 'item') {
			if ($_GET['event'] == 'search') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_GET['module'] == 'member') {
			if ($_GET['event'] == 'login') {

			}
			elseif ($_GET['event'] == 'logout') {

			}
			elseif ($_GET['event'] == 'logon') {

			}
			elseif ($_GET['event'] == 'change_password') {

			}
			elseif ($_GET['event'] == 'reset_password') {

			}
			elseif ($_GET['event'] == 'search') {

			}
			elseif ($_GET['event'] == 'view') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_GET['module'] == 'request') {
			if ($_GET['event'] == 'view') {

			}
			elseif ($_GET['event'] == 'search_index') {

			}
			elseif ($_GET['event'] == 'search_state') {

			}
			elseif ($_GET['event'] == 'view_index') {

			}
			elseif ($_GET['event'] == 'notice') {

			}
			elseif ($_GET['event'] == 'accept') {

			}
			elseif ($_GET['event'] == 'reject') {

			}
			elseif ($_GET['event'] == 'send') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_GET['module'] == 'whouse') {
			if ($_GET['event'] == 'view') {

			}
			elseif ($_GET['event'] == 'search') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		else {
			echo 'Invalid module called';
		}
	}

	elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['module'] == 'item') {
			if ($_POST['event'] == 'search') {
				
			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_POST['module'] == 'member') {
			if ($_POST['event'] == 'login') {

			}
			elseif ($_POST['event'] == 'logout') {

			}
			elseif ($_POST['event'] == 'logon') {

			}
			elseif ($_POST['event'] == 'change_password') {

			}
			elseif ($_POST['event'] == 'reset_password') {

			}
			elseif ($_POST['event'] == 'search') {

			}
			elseif ($_POST['event'] == 'view') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_POST['module'] == 'request') {
			if ($_POST['event'] == 'view') {

			}
			elseif ($_POST['event'] == 'search_index') {

			}
			elseif ($_POST['event'] == 'search_state') {

			}
			elseif ($_POST['event'] == 'view_index') {

			}
			elseif ($_POST['event'] == 'notice') {

			}
			elseif ($_POST['event'] == 'accept') {

			}
			elseif ($_POST['event'] == 'reject') {

			}
			elseif ($_POST['event'] == 'send') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		elseif ($_POST['module'] == 'whouse') {
			if ($_POST['event'] == 'view') {

			}
			elseif ($_POST['event'] == 'search') {

			}
			else {
				echo 'Invalid event called';
			}
		}
		else {
			echo 'Invalid module called';
		}
	}

	else {
		echo 'Invalid request method';
	}
}
else {
	include_once("../view/index.html");
}