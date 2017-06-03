<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'member') {
		if ($_GET['event'] == 'login') {
			$message = login($_GET['account'], $_GET['password']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'token' => $message['token'], 'authority' => $message['AUTHORITY']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'logout') {
			$message = logout($_GET['account']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'logon') {
			$message = logon($_GET['account'], $_GET['name'], $_GET['password1'], $_GET['password2'], $_GET['authority']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'change_password') {
			$message = change_password($_GET['account'], $_GET['token'], $_GET['ori_password'], $_GET['new_password1'], $_GET['new_password2']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'search_account') {
			$message = search_account($_GET['account'], $_GET['token'], $_GET['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'search_auth') {
			$message = search_auth($_GET['account'], $_GET['token'], $_GET['auth']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'view') {
			$message = view($_GET['account'], $_GET['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'notice') {
			$message = notice($_GET['account'], $_GET['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'auth') {
			$message = auth($_GET['account'], $_GET['token'], $_GET['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'reject') {
			$message = reject($_GET['account'], $_GET['token'], $_GET['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'get_auth') {
			$message = get_auth($_GET['account'], $_GET['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'authority' => $message['authority']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		else {
			echo json_encode(array('message' => 'Invalid event called'));
    		return;
		}
	}
	else {
		echo json_encode(array('message' => 'Invalid module called'));
    	return;
	}
}

elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
	if ($_POST['module'] == 'member') {
		if ($_POST['event'] == 'login') {
			$message = login($_POST['account'], $_POST['password']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'token' => $message['token'], 'authority' => $message['authority']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'logout') {
			$message = logout($_POST['account']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'logon') {
			$message = logon($_POST['account'], $_POST['name'], $_POST['password1'], $_POST['password2'], $_POST['authority']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'change_password') {
			$message = change_password($_POST['account'], $_POST['token'], $_POST['ori_password'], $_POST['new_password1'], $_POST['new_password2']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'search_account') {
			$message = search_account($_POST['account'], $_POST['token'], $_POST['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'search_auth') {
			$message = search_auth($_POST['account'], $_POST['token'], $_POST['auth']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'view') {
			$message = view($_POST['account'], $_POST['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'notice') {
			$message = notice($_POST['account'], $_POST['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'auth') {
			$message = auth($_POST['account'], $_POST['token'], $_POST['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'reject') {
			$message = reject($_POST['account'], $_POST['token'], $_POST['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'get_auth') {
			$message = get_auth($_POST['account'], $_POST['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'authority' => $message['authority']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		else {
			echo json_encode(array('message' => 'Invalid event called'));
			return;
		}
	}
	else {
		echo json_encode(array('message' => 'Invalid module called'));
		return;
	}
}

else {
	echo json_encode(array('message' => 'Invalid request method'));
	return;
}

function login($account, $password) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($password)) {
		return 'Empty password';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($password != $fetch1['PASSWORD']) {
			return 'Wrong password';
		}
		else {
			$token = get_token();
			$encrypted_token = md5($account.$token);
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			$sql2 = "UPDATE MEMBERMAS SET TOKEN='$encrypted_token', ONLINEDATE='$date' WHERE ACCOUNT='$account'";
			if (mysql_query($sql2)) {
				return array('message' => 'Success', 'token' => $token, 'authority' => $fetch1['AUTHORITY']);
			}
			else {
				return 'Database operation error';
			}
		}
	}
}

function logout($account) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$sql2 = "UPDATE MEMBERMAS SET TOKEN='' WHERE ACCOUNT='$account'";
		if (mysql_query($sql2)) {
			return 'Success';
		}
		else {
			return 'Database operation error';
		}
	}
}

function logon($account, $name, $password1, $password2, $authority) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($name)) {
		return 'Empty name';
	}
	elseif (empty($password1)) {
		return 'Empty password';
	}
	elseif (empty($password2)) {
		return 'Empty verify password';
	}
	elseif (mysql_num_rows($sql1) > 0) {
		return 'Registered account';
	}
	elseif ($password1 != $password2) {
		return 'Unequal password';
	}
	elseif ((strlen($password1) > 15) || (strlen($password2) > 15)) {
		return 'Password exceed length limit';
	}
	elseif (!ctype_alnum($password1) || !ctype_alnum($password2)) {
		return 'Wrong password format';
	}
	elseif (!in_array($authority, array('A', 'B', 'C', 'D', 'E'))) {
		return 'Wrong authority format';
	}
	else {
		date_default_timezone_set('Asia/Taipei');
		$date = date("Y-m-d H:i:s");
		$sql2 = "INSERT INTO MEMBERMAS (ACCOUNT, NAME, PASSWORD, AUTHORITY, CREATEDATE, ONLINEDATE, ACTCODE) VALUES ('$account', '$name', '$password1', '$authority', '$date', '$date', 2)";
		if (mysql_query($sql2)) {
			return 'Success';
		}
		else {
			return 'Database operation error';
		}
	}
}

function change_password($account, $token, $ori_password, $new_password1, $new_password2) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	$fetch = mysql_fetch_array($sql1);
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Not logged in';
	}
	elseif (empty($ori_password)) {
		return 'Empty original password';
	}
	elseif (empty($new_password1)) {
		return 'Empty password';
	}
	elseif (empty($new_password2)) {
		return 'Empty verify password';
	}
	elseif ($new_password1 != $new_password2) {
		return 'Unequal password';
	}
	elseif ((strlen($new_password1) > 15) || (strlen($new_password2) > 15)) {
		return 'Password exceed length limit';
	}
	elseif (!ctype_alnum($new_password1) || !ctype_alnum($new_password2)) {
		return 'Wrong password format';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['PASSWORD'] != $ori_password) {
			return 'Wrong password';
		}
		else {
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			$sql2 = "UPDATE MEMBERMAS SET PASSWORD='$new_password1' WHERE ACCOUNT='$account'";
			if (mysql_query($sql2)) {
				return 'Success';
			}
			else {
				return 'Database operation error';
			}
		}
	}
}

function search_account($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	$sql2 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$index'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Not logged in';
	}
	elseif (empty($index)) {
		return 'Empty target';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered target';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			$fetch2 = mysql_fetch_array($sql2);
			if ($fetch1['AUTHORITY'] == 'B' && $fetch2['AUTHORITY'] != 'B') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['AUTHORITY'] != 'C') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'D' && $fetch2['AUTHORITY'] != 'D') {
				return 'No authority';
			}
			else { 
				$content = '<table><tr><th>使用者帳號</th><th>使用者名稱</th><th>帳號建立日期</th><th>帳號最後登入日期</th><th>權限</th></tr><tr><td>'.$fetch2['ACCOUNT'].'</td><td>'.$fetch2['NAME'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.$fetch2['ONLINEDATE'].'</td><td>'.transfer($fetch2['AUTHORITY']).'</td></tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function search_auth($account, $token, $auth) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($auth)) {
		return 'Empty auth';
	}
	elseif (!in_array($auth, array('A', 'B', 'C', 'D', 'E'))) {
		return 'Wrong auth format';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] == 'B' && $auth != 'B') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'C' && $auth != 'C') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'D' && $auth != 'D') {
			return 'No authority';
		}
		else {
			$sql2 = mysql_query("SELECT * FROM MEMBERMAS WHERE AUTHORITY='$auth'");
			if ($sql2 == false) {
				$content = '查無資料';
			}
			else {
				$content = '<table><tr><th>使用者帳號</th><th>使用者名稱</th><th>帳號建立日期</th><th>帳號最後登入日期</th><th>權限</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ACCOUNT'].'</td><td>'.$fetch2['NAME'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.$fetch2['ONLINEDATE'].'</td><td>'.transfer($fetch2['AUTHORITY']).'</td></tr>';
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function view($account, $token) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else {
			if ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS ORDER BY ONLINEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE AUTHORITY='B' ORDER BY ONLINEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE AUTHORITY='C' ORDER BY ONLINEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE AUTHORITY='D' ORDER BY ONLINEDATE DESC");
			}
			if (mysql_num_rows($sql2) == 0) {
				$content = '查無資料';
			}
			else {
				$content = '<table><tr><th>使用者帳號</th><th>使用者名稱</th><th>帳號建立日期</th><th>帳號最後登入日期</th><th>權限</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ACCOUNT'].'</td><td>'.$fetch2['NAME'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.$fetch2['ONLINEDATE'].'</td><td>'.$fetch2['AUTHORITY'].'</td></tr>';
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function notice($account, $token) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Not logged in';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'A' || $account != 'trisoap') {
			return 'No notice';
		}
		else {
			$sql2 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACTCODE='2' ORDER BY ONLINEDATE ASC");
			if ($sql2 == false) {
				return 'No notice';
			}
			else {
				$content = '<table><tr><th>使用者帳號</th><th>使用者名稱</th><th>帳號建立日期</th><th>帳號最後登入日期</th><th>申請權限</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ACCOUNT'].'</td><td>'.$fetch2['NAME'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.$fetch2['ONLINEDATE'].'</td><td>'.transfer($fetch2['AUTHORITY']).'</td><td><button onclick="auth('.$fetch2['ACCOUNT'].')">授權</button></td><button onclick="reject('.$fetch2['ACCOUNT'].')">拒絕</button></td></tr>';
				}
				$content .= '</table>';
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function auth($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	$sql2 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$index'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($index)) {
		return 'Empty target';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered target';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'A' || $account != 'trisoap') {
			return 'No authority';
		}
		else {
			$fetch2 = mysql_fetch_array($sql2);
			if ($fetch2['ACTCODE'] == 1) {
				return 'Authed target';
			}
			else {
				$sql3 = "UPDATE MEMBERMAS SET ACTCODE='1' WHERE ACCOUNT='$index'";
				if (mysql_query($sql3)) {
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
		}
	}
}

function reject($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	$sql2 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$index'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($index)) {
		return 'Empty target';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered target';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'A' || $account != 'trisoap') {
			return 'No authority';
		}
		else {
			$fetch2 = mysql_fetch_array($sql2);
			if ($fetch2['ACTCODE'] == 1) {
				return 'Authed target';
			}
			else {
				$sql3 = "DELETE FROM MEMBERMAS WHERE ACCOUNT='$index'";
				if (mysql_query($sql3)) {
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
		}
	}
}

function get_auth($account, $token) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else {
			return array('message' => 'Success', 'authority' => $fetch1['AUTHORITY']);
		}
	}
}

function get_code() {
	$str = "23456789abcdefghjkmnpqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ";
	$code = '';
	for ($i = 0; $i < 6; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	}
	return $code;
}

function get_token() {
	$str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$code = '';
	for ($i = 0; $i < 12; $i++) {
		$code .= $str[mt_rand(0, strlen($str)-1)];
	}
	return $code;
}

function transfer($authority) {
	if ($authority == 'A') return '總部';
	elseif ($authority == 'B') return '北投';
	elseif ($authority == 'C') return '後山埤';
	elseif ($authority == 'D') return '台東';
	elseif ($authority == 'E') return '實習';
	else return 'Unknown';
}