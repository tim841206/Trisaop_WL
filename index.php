<?php
include_once("resource/database.php");

if (isset($_GET['module']) || isset($_POST['module'])) {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if ($_POST['module'] == 'item') {
			if (in_array($_POST['event'], array('search', 'produce', 'package', 'pack'))) {
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
						$content = file_get_contents("view/index_A.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content, 'member' => 'load', 'command' => 'load'));
					}
					elseif ($return['authority'] == 'B') {
						$content = file_get_contents("view/index_B.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content, 'mature' => 'load', 'command' => 'load'));
					}
					elseif ($return['authority'] == 'C') {
						$content = file_get_contents("view/index_C.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content, 'mature' => 'load', 'command' => 'load'));
					}
					elseif ($return['authority'] == 'D') {
						$content = file_get_contents("view/index_D.html");
						echo json_encode(array('message' => $return['message'], 'content' => $content, 'mature' => 'load', 'command' => 'load'));
					}
					elseif ($return['authority'] == 'E') {
						$content = file_get_contents("view/index_E.html");
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
					$content = file_get_contents("view/index.html");
					echo json_encode(array('message' => $return['message'], 'content' => $content));
				}
				else {
					echo json_encode(array('message' => $return['message']));
				}
			}
			elseif ($_POST['event'] == 'logon') {
				echo curl_post($_POST, $_POST['module']);
			}
			elseif (in_array($_POST['event'], array('change_password', 'search_account', 'search_auth', 'view', 'notice', 'auth', 'release'))) {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'request') {
			if (in_array($_POST['event'], array('view', 'search_index', 'search_state', 'search_date', 'view_index', 'notice', 'accept', 'reject', 'send', 'set_shipfee'))) {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'whouse') {
			if (in_array($_POST['event'], array('view', 'search', 'adjust_search', 'adjust', 'adjust_checked', 'mature', 'mature_search', 'cut'))) {
				$id = array('account' => $_COOKIE['account'], 'token' => $_COOKIE['token']);
				$post = array_merge($id, $_POST);
				echo curl_post($post, $_POST['module']);
			}
			else {
				echo json_encode(array('message' => 'Invalid event called'));
			}
		}
		elseif ($_POST['module'] == 'command') {
			if (in_array($_POST['event'], array('view', 'search_index', 'search_type', 'search_date', 'view_index', 'notice', 'deliver', 'refuse', 'send', 'check', 'check_checked'))) {
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
	if (isset($_FILES['fileData'])) {
		if ($_FILES['fileData']['type'] == 'application/pdf') {
			if ($_FILES['fileData']['size'] <= 5000000) {
				$cmdno = get_no() - 1;
				$upload = move_uploaded_file($_FILES['fileData']['tmp_name'], 'resource/commandFile/' . $cmdno . '.pdf');
				if ($upload) {
					mysql_query("UPDATE CMDMAS SET FILESTAT='1' WHERE CMDNO='$cmdno' AND ACTCODE='1'");
					echo json_encode(array('message' => 'Success'));
				}
				else {
					echo json_encode(array('message' => 'Unable to attach file'));	
				}
			}
			else {
				echo json_encode(array('message' => 'File exceed size limit'));
			}
		}
		else {
			echo json_encode(array('message' => 'Wrong file format'));
		}
	}
	else {
		$return = json_decode(curl_post(array('module' => 'member', 'event' => 'get_auth', 'account' => $_COOKIE['account'], 'token' => $_COOKIE['token']), 'member'), true);
		if ($return['message'] == 'Success') {
			if ($return['authority'] == 'A') {
				include_once("view/index_A.html");
			}
			elseif ($return['authority'] == 'B') {
				include_once("view/index_B.html");
			}
			elseif ($return['authority'] == 'C') {
				include_once("view/index_C.html");
			}
			elseif ($return['authority'] == 'D') {
				include_once("view/index_D.html");
			}
			elseif ($return['authority'] == 'E') {
				include_once("view/index_E.html");
			}
		}
		else {
			unset($_COOKIE['account']);
			unset($_COOKIE['token']);
			include_once("view/index.html");
		}
	}
}
else {
	include_once("view/index.html");
}

function curl_post($post, $module) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://'$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME']).'/model/'.$module.'.php');
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
	curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function get_no() {
	$sql = mysql_query("SELECT NEXT_NO FROM CONTROLMAS");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}