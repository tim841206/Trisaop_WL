<?php
if (isset($_GET['module']) || isset($_POST['module'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'GET') {
		if ($_GET['module'] == 'item') {
			if ($_GET['event'] == 'search') {
				
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
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
			elseif ($_GET['event'] == 'search_account') {

			}
			elseif ($_GET['event'] == 'search_auth') {

			}
			elseif ($_GET['event'] == 'view') {

			}
			elseif ($_GET['event'] == 'notice') {

			}
			elseif ($_GET['event'] == 'auth') {

			}
			elseif ($_GET['event'] == 'reject') {

			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
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
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_GET['module'] == 'whouse') {
			if ($_GET['event'] == 'view') {

			}
			elseif ($_GET['event'] == 'search') {

			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		else {
			echo json_encode(array('message' => 'Invalid module called'));
		}
	}

	elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['module'] == 'item') {
			if ($_POST['event'] == 'search') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'produce') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'package') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'pack') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'member') {
			if ($_POST['event'] == 'login') {
				$return = json_decode(curl_post($_POST, $_POST['module']), true);
				if ($return['message'] == 'Success') {
					setcookie('account', $_POST['account']);
					setcookie('token', $return['token']);
					if ($return['authority'] == 'A') {
						$content = file_get_contents("../view/index_A.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content, 'member' => 'load'));
					}
					elseif ($return['authority'] == 'B') {
						$content = file_get_contents("../view/index_B.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content));
					}
					elseif ($return['authority'] == 'C') {
						$content = file_get_contents("../view/index_C.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content));
					}
					elseif ($return['authority'] == 'D') {
						$content = file_get_contents("../view/index_D.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content));
					}
					elseif ($return['authority'] == 'E') {
						$content = file_get_contents("../view/index_E.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content));
					}
				}
				else {
					echo json_encode(array('message' => $return['message']));
				}
			}
			elseif ($_POST['event'] == 'logout') {
				$id = array('account' => $_COOKIE['account']);
				$post = array_merge($id, $_POST);
				$return = json_decode(curl_post($post, $_POST['module']), true);
				if ($return['message'] == 'Success') {
					unset($_COOKIE['account']);
					unset($_COOKIE['token']);
					$content = file_get_contents("../view/index.html");
					echo json_encode(array('message' => $return['message'], 'content' => $content));
				}
				else {
					echo json_encode(array('message' => $return['message']));
				}
			}
			elseif ($_POST['event'] == 'logon') {
				echo curl_post($_POST, $_POST['module']);
			}
			elseif ($_POST['event'] == 'change_password') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'search_account') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'search_auth') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'view') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'notice') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'auth') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'delete') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'request') {
			if ($_POST['event'] == 'view') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'search_index') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'search_state') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'view_index') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'notice') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'accept') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'reject') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'send') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'whouse') {
			if ($_POST['event'] == 'view') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'search') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'adjust_search') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			elseif ($_POST['event'] == 'adjust') {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		else {
			echo json_encode(array('message' => 'Invalid module called'));
		}
	}
	else {
		return 'Invalid request method';
	}
}
elseif (isset($_COOKIE['account']) && isset($_COOKIE['token'])) {
	$return = json_decode(curl_post(array('module' => 'member', 'event' => 'get_auth', 'account' => $_COOKIE['account'], 'token' => $_COOKIE['token']), 'member'), true);
	if ($return['message'] == 'Success') {
		if ($return['authority'] == 'A') {
			include_once("../view/index_A.html");
		}
		elseif ($return['authority'] == 'B') {
			include_once("../view/index_B.html");
		}
		elseif ($return['authority'] == 'C') {
			include_once("../view/index_C.html");
		}
		elseif ($return['authority'] == 'D') {
			include_once("../view/index_D.html");
		}
		elseif ($return['authority'] == 'E') {
			include_once("../view/index_E.html");
		}
	}
	else {
		unset($_COOKIE['account']);
		unset($_COOKIE['token']);
		include_once("../view/index.html");
	}
}
else {
	include_once("../view/index.html");
}

function curl_post($post, $module) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'http://localhost/Trisoap_WL/model/'. $module .'.php');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}