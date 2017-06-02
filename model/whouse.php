<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'whouse') {
		if ($_GET['event'] == 'view') {
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
		elseif ($_GET['event'] == 'search') {
			$message = search($_GET['account'], $_GET['token'], $_GET['whouseno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
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
	if ($_POST['module'] == 'whouse') {
		if ($_POST['event'] == 'view') {
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
		if ($_POST['event'] == 'search') {
			$message = search($_POST['account'], $_POST['token'], $_POST['whouseno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
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

function view($account, $token) {
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
		else {
			if ($fetch1['AUTHORITY'] == 'A') {
				$content = '<table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th><th>後山埤存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' ORDER BY ITEMCLASS, ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' ORDER BY ITEMCLASS, ITEMNO ASC");
				$sql4 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' ORDER BY ITEMCLASS, ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$fetch4 = mysql_fetch_array($sql4);
					$content .= ('<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td><td>'.$fetch3['TOTALAMT'].'</td><td>'.$fetch4['TOTALAMT'].'</td></tr>');
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'E') {
				$content = '<table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' ORDER BY ITEMCLASS, ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' ORDER BY ITEMCLASS, ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= ('<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td><td>'.$fetch3['TOTALAMT'].'</td></tr>');
				}
			}
			else {
				$content = '<table><tr><th>名稱</th><th>存量/th></tr>';
				if ($fetch1['AUTHORITY'] == 'B') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' ORDER BY ITEMNO ASC");
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= ('<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td></tr>');
					}
				}
				elseif ($fetch1['AUTHORITY'] == 'C') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' ORDER BY ITEMNO ASC");
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= ('<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td></tr>');
					}
				}
				elseif ($fetch1['AUTHORITY'] == 'D') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' ORDER BY ITEMNO ASC");
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= ('<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td></tr>');
					}
				}
				$content = '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search($account, $token, $whouseno, $itemclass, $itemno) {
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
		else {
			if ($fetch1['AUTHORITY'] == 'B' && $whouseno != 'B') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'C' && $whouseno != 'C') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'D' && $whouseno != 'D') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'E' && ($whouseno == 'C' || $itemclass == 'H' || in_array($itemno, array('sp_1_houshanpi', 'sp_2_houshanpi', 'sp_3_houshanpi')))) {
				return 'No authority';
			}
			else {
				if ($whouseno == 'all' && $itemno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE ITEMCLASS='$itemclass'");
				}
				elseif ($whouseno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE ITEMCLASS='$itemclass' AND ITEMNO='$itemno'");
				}
				elseif ($itemno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouseno' AND ITEMCLASS='$itemclass'");
				}
				else {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouseno' AND ITEMCLASS='$itemclass' AND ITEMNO='$itemno'");
				}
				if (mysql_num_rows($sql2) == 0) {
					return 'No data';
				}
				else {
					$content = '<table><tr><th>倉庫</th><th>名稱</th><th>數量</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= ('<tr><td>'.$fetch2['WHOUSENO'].'</td><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td></tr>');
					}
					$content .= '</table>';
					return array('message' => 'Success', 'content' => $content);
				}
			}
		}
	}
}