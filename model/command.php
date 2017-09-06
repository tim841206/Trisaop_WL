<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'command') {
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
		elseif ($_GET['event'] == 'view_index') {
			$message = view_index($_GET['account'], $_GET['token'], $_GET['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'search_index') {
			$message = search_index($_GET['account'], $_GET['token'], $_GET['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'search_type') {
			$message = search_type($_GET['account'], $_GET['token'], $_GET['type']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'search_date') {
			$message = search_date($_GET['account'], $_GET['token'], $_GET['year'], $_GET['month'], $_GET['day']);
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
		elseif ($_GET['event'] == 'deliver') {
			$message = deliver($_GET['account'], $_GET['token'], $_GET['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'index' => $message['index']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'refuse') {
			$message = refuse($_GET['account'], $_GET['token'], $_GET['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'send') {
			$message = send($_GET);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'index' => $message['index']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'check') {
			$message = check($_GET['account'], $_GET['token'], $_GET['index'], $_GET['itemno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'check' => $message['check']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'check_checked') {
			$message = check_checked($_GET['account'], $_GET['token'], $_GET['index'], $_GET['itemno']);
			echo json_encode(array('message' => $message));
			return;
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
	if ($_POST['module'] == 'command') {
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
		elseif ($_POST['event'] == 'search_index') {
			$message = search_index($_POST['account'], $_POST['token'], $_POST['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'search_type') {
			$message = search_type($_POST['account'], $_POST['token'], $_POST['type']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'search_date') {
			$message = search_date($_POST['account'], $_POST['token'], $_POST['year'], $_POST['month'], $_POST['day']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'view_index') {
			$message = view_index($_POST['account'], $_POST['token'], $_POST['index']);
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
		elseif ($_POST['event'] == 'deliver') {
			$message = deliver($_POST['account'], $_POST['token'], $_POST['index']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'index' => $message['index']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'refuse') {
			$message = refuse($_POST['account'], $_POST['token'], $_POST['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'send') {
			$message = send($_POST);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'index' => $message['index']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'check') {
			$message = check($_POST['account'], $_POST['token'], $_POST['index'], $_POST['itemno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'check' => $message['check']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'check_checked') {
			$message = check_checked($_POST['account'], $_POST['token'], $_POST['index'], $_POST['itemno']);
			echo json_encode(array('message' => $message));
			return;
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
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
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
			if ($fetch1['AUTHORITY'] == 'A') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Beitou' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Houshanpi' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Taitung' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'E') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND (TARGET!='Houshanpi' OR CMDTYPE!='C') ORDER BY UPDATEDATE DESC");
			}
			$content = '';
			if (mysql_num_rows($sql2) == 0) {
				$content = '查無資料';
			}
			else {
				$content = '<table><tr><th>訂單編號</th><th>建立時間</th><td>下單對象</td><th>類別</th><th>訂單狀態</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.LocationToName($fetch2['TARGET']).'</td><td>'.translate($fetch2['CMDTYPE']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td><td><button onclick="view_command('.$fetch2['CMDNO'].')">查看</button></td></tr>';
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search_index($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($index)) {
		return 'Empty index';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered command';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		$fetch2 = mysql_fetch_array($sql2);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] != 'Beitou') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] != 'Houshanpi') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'D' && $fetch2['TARGET'] != 'Taitung') {
			return 'No authority';
		}
		else {
			$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>下單對象</th><th>類別</th><th>訂單狀態</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.LocationToName($fetch2['TARGET']).'</td><td>'.translate($fetch2['CMDTYPE']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td><td><button onclick="command_view_index_search('.$fetch2['CMDNO'].')">查看</button></td></tr></table>';
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search_type($account, $token, $type) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($type)) {
		return 'Empty type';
	}
	elseif (!in_array($type, array('A', 'B', 'C'))) {
		return 'Wrong type format';
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
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDTYPE='$type' AND ACTCODE='1'");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDTYPE='$type' AND TARGET='Beitou' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDTYPE='$type' AND TARGET='Houshanpi' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDTYPE='$type' AND TARGET='Taitung' AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			$content = '';
			if ($sql2 == false) {
				$content = '查無資料';
			}
			else {
				$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>下單對象</th><th>類別</th><th>訂單狀態</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.LocationToName($fetch2['TARGET']).'</td><td>'.translate($fetch2['CMDTYPE']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td><td><button onclick="command_view_index_search('.$fetch2['CMDNO'].')">查看</button></td></tr>';
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search_date($account, $token, $year, $month, $day) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
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
			$month = process_date($month);
			$day = process_date($day);
			if ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Beitou' AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Houshanpi' AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE ACTCODE='1' AND TARGET='Taitung' AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			$content = '';
			if ($sql2 == false) {
				$content = '查無資料';
			}
			else {
				$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>下單對象</th><th>類別</th><th>訂單狀態</th></tr>';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.LocationToName($fetch2['TARGET']).'</td><td>'.translate($fetch2['CMDTYPE']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td><td><button onclick="command_view_index_search('.$fetch2['CMDNO'].')">查看</button></td></tr>';
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function view_index($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
	$sql3 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($index)) {
		return 'Empty index';
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
			if ($sql3 == false) {
				return 'No data';
			}
			else {
				$fetch2 = mysql_fetch_array($sql2);
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				if ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
					if ($fetch1['AUTHORITY'] == 'A') {
						$sql4 = "UPDATE CMDMAS SET REVIEWDATE='$date' WHERE CMDNO='$index'";
						if (!mysql_query($sql4)) {
							return 'Unable to update review date';
						}
					}
					if ($fetch2['CMDTYPE'] == 'A') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>運送地</th><th>訂單狀態</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>油品</td><td>'.LocationToName($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).unit($fetch3['ITEMNO']).'</td></tr>');
						}
						$content .= '</table>';
					}
					elseif ($fetch2['CMDTYPE'] == 'B') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>訂單狀態</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>出貨</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).unit($fetch3['ITEMNO']).'</td></tr>');
						}
						$content .= '</table>';
					}
					elseif ($fetch2['CMDTYPE'] == 'C') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>開始日期</th><th>結束日期</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>製皂</td><td>'.$fetch2['STARTDATE'].'</td><td>'.$fetch2['ENDDATE'].'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						if ($fetch2['FILESTAT'] == 1) {
							$content .= '<tr><td colspan="10"><a href="../resource/download.php?cmdno='.$fetch2['CMDNO'].'">下載檔案</a></td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th><th>完成狀態</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td><td>'.translate_checkState($fetch3['CHECKSTAT']).'</td></tr>');
						}
						$content .= '</table>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
				elseif ($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] == 'Beitou') {
					if ($fetch2['CMDSTAT'] == 'A') {
						$sql4 = "UPDATE CMDMAS SET CMDSTAT='B', UPDATEDATE='$date' WHERE CMDNO='$index'";
						if (!mysql_query($sql4)) {
							return 'Unable to update review date';
						}
					}
					if ($fetch2['CMDTYPE'] == 'B') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>訂單狀態</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>出貨</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).unit($fetch3['ITEMNO']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['CMDSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="deliver('.$index.')">送出</button> <button onclick="refuse('.$index.')">拒絕</button></td></tr></table>';
						}
						else {
							$content .= '</table>';
						}
					}
					elseif ($fetch2['CMDTYPE'] == 'C') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>開始日期</th><th>結束日期</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>製皂</td><td>'.$fetch2['STARTDATE'].'</td><td>'.$fetch2['ENDDATE'].'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						if ($fetch2['FILESTAT'] == 1) {
							$content .= '<tr><td colspan="10"><a href="../resource/download.php?cmdno='.$fetch2['CMDNO'].'">下載檔案</a></td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th><th>完成狀態</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td><td>'.translate_check($fetch3['CHECKSTAT'], $index, $fetch3['ITEMNO']).'</td></tr>');
						}
						$content .= '</table>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
				elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] == 'Houshanpi') {
					if ($fetch2['CMDSTAT'] == 'A') {
						$sql4 = "UPDATE CMDMAS SET CMDSTAT='B', UPDATEDATE='$date' WHERE CMDNO='$index'";
						if (!mysql_query($sql4)) {
							return 'Unable to update review date';
						}
					}
					if ($fetch2['CMDTYPE'] == 'A') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>運送地</th><th>訂單狀態</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>油品</td><td>'.LocationToName($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['CMDSTAT'], $fetch2['CMDTYPE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).unit($fetch3['ITEMNO']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['CMDSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="deliver('.$index.')">送出</button> <button onclick="refuse('.$index.')">拒絕</button></td></tr></table>';
						}
						else {
							$content .= '</table>';
						}
					}
					elseif ($fetch2['CMDTYPE'] == 'C') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>開始日期</th><th>結束日期</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>製皂</td><td>'.$fetch2['STARTDATE'].'</td><td>'.$fetch2['ENDDATE'].'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						if ($fetch2['FILESTAT'] == 1) {
							$content .= '<tr><td colspan="10"><a href="../resource/download.php?cmdno='.$fetch2['CMDNO'].'">下載檔案</a></td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th><th>完成狀態</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= '<tr><td>'.substr($fetch3['ITEMNM'], 12).'</td><td>'.number_format($fetch3['ITEMAMT']).'</td><td>'.translate_check($fetch3['CHECKSTAT'], $index, $fetch3['ITEMNO']).'</td></tr>';
						}
						$content .= '</table>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
				elseif ($fetch1['AUTHORITY'] == 'D' && $fetch2['TARGET'] == 'Taitung') {
					if ($fetch2['CMDSTAT'] == 'A') {
						$sql4 = "UPDATE CMDMAS SET CMDSTAT='B', UPDATEDATE='$date' WHERE CMDNO='$index'";
						if (!mysql_query($sql4)) {
							return 'Unable to update review date';
						}
					}
					if ($fetch2['CMDTYPE'] == 'C') {
						$content = '<table><tr><th>訂單編號</th><th>建立時間</th><th>類別</th><th>開始日期</th><th>結束日期</th></tr><tr><td>'.$fetch2['CMDNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>製皂</td><td>'.$fetch2['STARTDATE'].'</td><td>'.$fetch2['ENDDATE'].'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						if ($fetch2['FILESTAT'] == 1) {
							$content .= '<tr><td colspan="10"><a href="../resource/download.php?cmdno='.$fetch2['CMDNO'].'">下載檔案</a></td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th><th>完成狀態</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td><td>'.translate_check($fetch3['CHECKSTAT'], $index, $fetch3['ITEMNO']).'</td></tr>');
						}
						$content .= '</table>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
				else {
					return 'No authority';
				}
			}
		}
	}
}

function notice($account, $token) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
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
			$content = '';
			if ($fetch1['AUTHORITY'] == 'A') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE REVIEWDATE<UPDATEDATE AND ACTCODE='1'");
				if (mysql_num_rows($sql2) == 0) {
					return 'No notice';
				}
				else {
					date_default_timezone_set('Asia/Taipei');
					$date = date("Y-m-d H:i:s");
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$CMDNO = $fetch2['CMDNO'];
						$content .= LocationToName($fetch2['TARGET']) . ' 方已經 ' . translate_state($fetch2['CMDSTAT']) .' 編號為 ' . $CMDNO . ' 的訂單。<br>';
						mysql_query("UPDATE CMDMAS SET REVIEWDATE='$date' WHERE CMDNO='$CMDNO'");
					}
					return array('message' => 'Success', 'content' => $content);
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Beitou' AND (CMDSTAT='A' OR CMDSTAT='B') AND ACTCODE='1'");
				if (mysql_num_rows($sql2) == 0) {
					return 'No notice';
				}
				else {
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<span style="color: red;">您有一個' . translate($fetch2['CMDTYPE']) . '訂單，訂單編號 ' . $fetch2['CMDNO'] . ' 。</span><button onclick="view_command_notice('.$fetch2['CMDNO'].')">查看</button><br>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Houshanpi' AND (CMDSTAT='A' OR CMDSTAT='B') AND ACTCODE='1'");
				if (mysql_num_rows($sql2) == 0) {
					return 'No notice';
				}
				else {
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<span style="color: red;">您有一個' . translate($fetch2['CMDTYPE']) . '訂單，訂單編號 ' . $fetch2['CMDNO'] . ' 。</span><button onclick="view_command_notice('.$fetch2['CMDNO'].')">查看</button><br>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE TARGET='Taitung' AND (CMDSTAT='A' OR CMDSTAT='B') AND ACTCODE='1'");
				if (mysql_num_rows($sql2) == 0) {
					return 'No notice';
				}
				else {
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<span style="color: red;">您有一個' . translate($fetch2['CMDTYPE']) . '訂單，訂單編號 ' . $fetch2['CMDNO'] . ' 。</span><button onclick="view_command_notice('.$fetch2['CMDNO'].')">查看</button><br>';
					}
					return array('message' => 'Success', 'content' => $content);
				}
			}
			else {
				return 'No notice';
			}
		}
	}
}

function deliver($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
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
			$fetch2 = mysql_fetch_array($sql2);
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			if ($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] == 'Beitou' && $fetch2['CMDTYPE'] == 'B') {
				$content = '';
				$itemno = array();
				$itemamt = array();
				$sql3 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index'");
				while ($fetch3 = mysql_fetch_array($sql3)) {
					if ($fetch3['ITEMAMT'] > inventory('Beitou', $fetch3['ITEMNO'])) {
						$content .= $fetch3['ITEMNM'] . "存量不足\n";
					}
					else {
						array_push($itemno, $fetch3['ITEMNO']);
						array_push($itemamt, $fetch3['ITEMAMT']);
					}
				}
				if (!empty($content)) {
					return $content;
				}
				else {
					$sql4 = "INSERT INTO RQSTMAS (RQSTNO, SENDER, RECEIVER, SENDERDATE, RQSTSTAT, CREATEDATE, UPDATEDATE) VALUES ('$index', 'Beitou', 'Trisoap', '$date', 'A', '$date', '$date')";
					if (mysql_query($sql4)) {
						for ($i = 0; $i < count($itemno); $i++) {
							$no = $itemno[$i];
							$nm = query_name($no);
							$amt = $itemamt[$i];
							mysql_query("INSERT INTO RQSTDTLMAS (RQSTNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$index', '$no', '$nm', '$amt')");
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amt' WHERE WHOUSENO='Beitou' AND ITEMNO='$no'");
						}
						$sql5 = "UPDATE CMDMAS SET CMDSTAT='C', UPDATEDATE='$date' WHERE CMDNO='$index'";
						if (mysql_query($sql5)) {
							return array('message' => 'Success', 'index' => $index);
						}
						else {
							return 'Database operation error';
						}
					}
					else {
						return 'Unable to create request';
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] == 'Houshanpi' && $fetch2['CMDTYPE'] == 'A') {
				$receiver = $fetch2['RECEIVER'];
				$sql3 = "INSERT INTO RQSTMAS (RQSTNO, SENDER, RECEIVER, SENDERDATE, RQSTSTAT, CREATEDATE, UPDATEDATE) VALUES ('$index', 'Houshanpi', '$receiver', '$date', 'A', '$date', '$date')";
				if (mysql_query($sql3)) {
					$sql4 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$no = $fetch4['ITEMNO'];
						$nm = $fetch4['ITEMNM'];
						$amt = $fetch4['ITEMAMT'];
						mysql_query("INSERT INTO RQSTDTLMAS (RQSTNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$index', '$no', '$nm', '$amt')");
					}
					$sql5 = "UPDATE CMDMAS SET CMDSTAT='C', UPDATEDATE='$date' WHERE CMDNO='$index'";
					if (mysql_query($sql5)) {
						return array('message' => 'Success', 'index' => $index);
					}
					else {
						return 'Database operation error';
					}
				}
				else {
					return 'Unable to create request';
				}
			}
			else {
				return 'No authority';
			}
		}
	}
}

function refuse($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
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
			$fetch2 = mysql_fetch_array($sql2);
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			if ($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] == 'Beitou' && $fetch2['CMDTYPE'] == 'B') {
				$sql3 = "UPDATE CMDMAS SET CMDSTAT='D', UPDATEDATE='$date' WHERE CMDNO='$index'";
				if (mysql_query($sql3)) {
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] == 'Houshanpi' && $fetch2['CMDTYPE'] == 'A') { 
				$sql3 = "UPDATE CMDMAS SET CMDSTAT='D', UPDATEDATE='$date' WHERE CMDNO='$index'";
				if (mysql_query($sql3)) {
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			else {
				return 'No authority';
			}
		}
	}
}

function send($content) {
	$account = $content['account'];
	$token = $content['token'];
	$type = $content['type'];
	$memo = $content['command_memo'];
	$startdate = $content['date_start'];
	$enddate = $content['date_end'];
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif (strlen($memo) > 200) {
		return 'Memo exceed length limit';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else if ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			if ($type == 'A' || $type == 'B') {
				$itemno = array();
				$itemamt = array();
				if (is_positiveInt($content['oil_1'])) {
					array_push($itemno, 'oil_1');
					array_push($itemamt, $content['oil_1']);
				}
				elseif (!is_nonnegativeInt($content['oil_1'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_2'])) {
					array_push($itemno, 'oil_2');
					array_push($itemamt, $content['oil_2']);
				}
				elseif (!is_nonnegativeInt($content['oil_2'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_3'])) {
					array_push($itemno, 'oil_3');
					array_push($itemamt, $content['oil_3']);
				}
				elseif (!is_nonnegativeInt($content['oil_3'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_4'])) {
					array_push($itemno, 'oil_4');
					array_push($itemamt, $content['oil_4']);
				}
				elseif (!is_nonnegativeInt($content['oil_4'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_5'])) {
					array_push($itemno, 'oil_5');
					array_push($itemamt, $content['oil_5']);
				}
				elseif (!is_nonnegativeInt($content['oil_5'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_6'])) {
					array_push($itemno, 'oil_6');
					array_push($itemamt, $content['oil_6']);
				}
				elseif (!is_nonnegativeInt($content['oil_6'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_7'])) {
					array_push($itemno, 'oil_7');
					array_push($itemamt, $content['oil_7']);
				}
				elseif (!is_nonnegativeInt($content['oil_7'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_8'])) {
					array_push($itemno, 'oil_8');
					array_push($itemamt, $content['oil_8']);
				}
				elseif (!is_nonnegativeInt($content['oil_8'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['oil_9'])) {
					array_push($itemno, 'oil_9');
					array_push($itemamt, $content['oil_9']);
				}
				elseif (!is_nonnegativeInt($content['oil_9'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['NaOH'])) {
					array_push($itemno, 'NaOH');
					array_push($itemamt, $content['NaOH']);
				}
				elseif (!is_nonnegativeInt($content['NaOH'])) {
					return 'Wrong amount format';
				}
				if (count($itemno) == 0) {
					return 'Empty command';
				}
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$cmdno = get_no();
				$sql2 = ($type == 'A') ? "INSERT INTO CMDMAS (CMDNO, TARGET, SENDER, RECEIVER, CMDSTAT, CMDTYPE, NOTICE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Houshanpi', 'Houshanpi', 'Beitou', 'A', 'A', '$memo', '$date', '$date', '$date')" : "INSERT INTO CMDMAS (CMDNO, TARGET, SENDER, RECEIVER, CMDSTAT, CMDTYPE, NOTICE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Houshanpi', 'Houshanpi', 'Taitung', 'A', 'A', '$memo', '$date', '$date', '$date')";
				if (mysql_query($sql2)) {
					if (update_no()) {
						for ($i = 0; $i < count($itemno); $i++) {
							$no = $itemno[$i];
							$nm = query_name($no);
							$amt = $itemamt[$i];
							mysql_query("INSERT INTO CMDDTLMAS (CMDNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$cmdno', '$no', '$nm', '$amt')");
						}
						return array('message' => 'Success', 'index' => $cmdno);
					}
					else {
						return 'Unable to update request number';
					}
				}
				else {
					return 'Unable to create command';
				}
			}
			elseif ($type == 'C') {
				$itemno = array();
				$itemamt = array();
				if (is_positiveInt($content['product_sp_1'])) {
					array_push($itemno, 'product_sp_1');
					array_push($itemamt, $content['product_sp_1']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_1'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_2'])) {
					array_push($itemno, 'product_sp_2');
					array_push($itemamt, $content['product_sp_2']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_2'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_3'])) {
					array_push($itemno, 'product_sp_3');
					array_push($itemamt, $content['product_sp_3']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_3'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_4'])) {
					array_push($itemno, 'product_sp_4');
					array_push($itemamt, $content['product_sp_4']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_4'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_5'])) {
					array_push($itemno, 'product_sp_5');
					array_push($itemamt, $content['product_sp_5']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_5'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_6'])) {
					array_push($itemno, 'product_sp_6');
					array_push($itemamt, $content['product_sp_6']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_6'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_sp_box'])) {
					array_push($itemno, 'product_sp_box');
					array_push($itemamt, $content['product_sp_box']);
				}
				elseif (!is_nonnegativeInt($content['product_sp_box'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_ss_1'])) {
					array_push($itemno, 'product_ss_1');
					array_push($itemamt, $content['product_ss_1']);
				}
				elseif (!is_nonnegativeInt($content['product_ss_1'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_ss_2'])) {
					array_push($itemno, 'product_ss_2');
					array_push($itemamt, $content['product_ss_2']);
				}
				elseif (!is_nonnegativeInt($content['product_ss_2'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_ss_3'])) {
					array_push($itemno, 'product_ss_3');
					array_push($itemamt, $content['product_ss_3']);
				}
				elseif (!is_nonnegativeInt($content['product_ss_3'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['product_ss_box'])) {
					array_push($itemno, 'product_ss_box');
					array_push($itemamt, $content['product_ss_box']);
				}
				elseif (!is_nonnegativeInt($content['product_ss_box'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_1'])) {
					array_push($itemno, 'moon_box_1');
					array_push($itemamt, $content['moon_box_1']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_1'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_2'])) {
					array_push($itemno, 'moon_box_2');
					array_push($itemamt, $content['moon_box_2']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_2'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_3'])) {
					array_push($itemno, 'moon_box_3');
					array_push($itemamt, $content['moon_box_3']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_3'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_4'])) {
					array_push($itemno, 'moon_box_4');
					array_push($itemamt, $content['moon_box_4']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_4'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_5'])) {
					array_push($itemno, 'moon_box_5');
					array_push($itemamt, $content['moon_box_5']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_5'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_6'])) {
					array_push($itemno, 'moon_box_6');
					array_push($itemamt, $content['moon_box_6']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_6'])) {
					return 'Wrong amount format';
				}
				if (is_positiveInt($content['moon_box_7'])) {
					array_push($itemno, 'moon_box_7');
					array_push($itemamt, $content['moon_box_7']);
				}
				elseif (!is_nonnegativeInt($content['moon_box_7'])) {
					return 'Wrong amount format';
				}
				if (count($itemno) == 0) {
					return 'Empty command';
				}
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$cmdno = get_no();
				$sql2 = "INSERT INTO CMDMAS (CMDNO, TARGET, SENDER, RECEIVER, CMDSTAT, CMDTYPE, NOTICE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Beitou', 'Beitou', 'Trisoap', 'A', 'B', '$memo', '$date', '$date', '$date')";
				if (mysql_query($sql2)) {
					if (update_no()) {
						for ($i = 0; $i < count($itemno); $i++) {
							$no = $itemno[$i];
							$nm = query_name($no);
							$amt = $itemamt[$i];
							mysql_query("INSERT INTO CMDDTLMAS (CMDNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$cmdno', '$no', '$nm', '$amt')");
						}
						return array('message' => 'Success', 'index' => $cmdno);
					}
					else {
						return 'Unable to update request number';
					}
				}
				else {
					return 'Unable to create command';
				}
			}
			elseif ($type == 'D' || $type == 'F') {
				if (is_validDate($startdate) && is_validDate($enddate)) {
					$itemno = array();
					$itemamt = array();
					if (is_positiveInt($content['sp_1'])) {
						array_push($itemno, 'sp_1');
						array_push($itemamt, $content['sp_1']);
					}
					elseif (!is_nonnegativeInt($content['sp_1'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['sp_2'])) {
						array_push($itemno, 'sp_2');
						array_push($itemamt, $content['sp_2']);
					}
					elseif (!is_nonnegativeInt($content['sp_2'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['sp_3'])) {
						array_push($itemno, 'sp_3');
						array_push($itemamt, $content['sp_3']);
					}
					elseif (!is_nonnegativeInt($content['sp_3'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_1'])) {
						array_push($itemno, 'ss_1');
						array_push($itemamt, $content['ss_1']);
					}
					elseif (!is_nonnegativeInt($content['ss_1'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_2'])) {
						array_push($itemno, 'ss_2');
						array_push($itemamt, $content['ss_2']);
					}
					elseif (!is_nonnegativeInt($content['ss_2'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_3'])) {
						array_push($itemno, 'ss_3');
						array_push($itemamt, $content['ss_3']);
					}
					elseif (!is_nonnegativeInt($content['ss_3'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_4'])) {
						array_push($itemno, 'ss_4');
						array_push($itemamt, $content['ss_4']);
					}
					elseif (!is_nonnegativeInt($content['ss_4'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_5'])) {
						array_push($itemno, 'ss_5');
						array_push($itemamt, $content['ss_5']);
					}
					elseif (!is_nonnegativeInt($content['ss_5'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['ss_6'])) {
						array_push($itemno, 'ss_6');
						array_push($itemamt, $content['ss_6']);
					}
					elseif (!is_nonnegativeInt($content['ss_6'])) {
						return 'Wrong amount format';
					}
					if (count($itemno) == 0) {
						return 'Empty command';
					}
					date_default_timezone_set('Asia/Taipei');
					$date = date("Y-m-d H:i:s");
					$cmdno = get_no();
					$sql2 = ($type == 'D') ? "INSERT INTO CMDMAS (CMDNO, TARGET, CMDSTAT, CMDTYPE, NOTICE, STARTDATE, ENDDATE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Beitou', 'A', 'C', '$memo', '$startdate', '$enddate', '$date', '$date', '$date')" : "INSERT INTO CMDMAS (CMDNO, TARGET, CMDSTAT, CMDTYPE, NOTICE, STARTDATE, ENDDATE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Taitung', 'A', 'C', '$memo', '$startdate', '$enddate', '$date', '$date', '$date')";
					if (mysql_query($sql2)) {
						if (update_no()) {
							for ($i = 0; $i < count($itemno); $i++) {
								$no = $itemno[$i];
								$nm = query_name($no);
								$amt = $itemamt[$i];
								mysql_query("INSERT INTO CMDDTLMAS (CMDNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$cmdno', '$no', '$nm', '$amt')");
							}
							return array('message' => 'Success', 'index' => $cmdno);
						}
						else {
							return 'Unable to update request number';
						}
					}
					else {
						return 'Unable to create command';
					}
				}
				else {
					return 'Wrong date format';
				}
			}
			elseif ($type == 'E') {
				if (is_validDate($startdate) && is_validDate($enddate)) {
					$itemno = array();
					$itemamt = array();
					if (is_positiveInt($content['sp_1_houshanpi'])) {
						array_push($itemno, 'sp_1_houshanpi');
						array_push($itemamt, $content['sp_1_houshanpi']);
					}
					elseif (!is_nonnegativeInt($content['sp_1_houshanpi'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['sp_2_houshanpi'])) {
						array_push($itemno, 'sp_2_houshanpi');
						array_push($itemamt, $content['sp_2_houshanpi']);
					}
					elseif (!is_nonnegativeInt($content['sp_2_houshanpi'])) {
						return 'Wrong amount format';
					}
					if (is_positiveInt($content['sp_3_houshanpi'])) {
						array_push($itemno, 'sp_3_houshanpi');
						array_push($itemamt, $content['sp_3_houshanpi']);
					}
					elseif (!is_nonnegativeInt($content['sp_3_houshanpi'])) {
						return 'Wrong amount format';
					}
					if (count($itemno) == 0) {
						return 'Empty command';
					}
					date_default_timezone_set('Asia/Taipei');
					$date = date("Y-m-d H:i:s");
					$cmdno = get_no();
					$sql2 = "INSERT INTO CMDMAS (CMDNO, TARGET, CMDSTAT, CMDTYPE, NOTICE, STARTDATE, ENDDATE, REVIEWDATE, CREATEDATE, UPDATEDATE) VALUES ('$cmdno', 'Houshanpi', 'A', 'C', '$memo', '$startdate', '$enddate', '$date', '$date', '$date')";
					if (mysql_query($sql2)) {
						if (update_no()) {
							for ($i = 0; $i < count($itemno); $i++) {
								$no = $itemno[$i];
								$nm = query_name($no);
								$amt = $itemamt[$i];
								mysql_query("INSERT INTO CMDDTLMAS (CMDNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$cmdno', '$no', '$nm', '$amt')");
							}
							return array('message' => 'Success', 'index' => $cmdno);
						}
						else {
							return 'Unable to update request number';
						}
					}
					else {
						return 'Unable to create command';
					}
				}
				else {
					return 'Wrong date format';
				}
			}
			else {
				return 'Wrong command type';
			}
		}
	}
}

function check($account, $token, $index, $itemno) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
	$sql3 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index' AND ITEMNO='$itemno'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered command';
	}
	elseif ($sql3 == false) {
		return 'Invalid request item';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else {
			$fetch2 = mysql_fetch_array($sql2);
			if (($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] == 'Beitou') || ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] == 'Houshanpi') || ($fetch1['AUTHORITY'] == 'D' && $fetch2['TARGET'] == 'Taitung')) {
				if ($fetch2['CMDTYPE'] != 'C') {
					return 'Wrong command type';
				}
				elseif ($fetch2['CMDSTAT'] != 'B') {
					return 'Wrong command state';
				}
				else {
					$fetch3 = mysql_fetch_array($sql3);
					if ($fetch3['CHECKSTAT'] == 1) {
						return 'Checked item';
					}
					else {
						$content = '確定已完成 ' . $fetch3['ITEMAMT'] . ' 克 ' . $fetch3['ITEMNM'] . ' 的製作？';
						return array('message' => 'Success', 'check' => $content);
					}
				}
			}
			else {
				return 'No authority';
			}
		}
	}
}

function check_checked($account, $token, $index, $itemno) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM CMDMAS WHERE CMDNO='$index' AND ACTCODE='1'");
	$sql3 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index' AND ITEMNO='$itemno'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif ($sql2 == false) {
		return 'Unregistered command';
	}
	elseif ($sql3 == false) {
		return 'Invalid request item';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else {
			$fetch2 = mysql_fetch_array($sql2);
			if (($fetch1['AUTHORITY'] == 'B' && $fetch2['TARGET'] == 'Beitou') || ($fetch1['AUTHORITY'] == 'C' && $fetch2['TARGET'] == 'Houshanpi') || ($fetch1['AUTHORITY'] == 'D' && $fetch2['TARGET'] == 'Taitung')) {
				if ($fetch2['CMDTYPE'] != 'C') {
					return 'Wrong command type';
				}
				elseif ($fetch2['CMDSTAT'] != 'B') {
					return 'Wrong command state';
				}
				else {
					$fetch3 = mysql_fetch_array($sql3);
					if ($fetch3['CHECKSTAT'] == 1) {
						return 'Checked item';
					}
					else {
						$sql4 = "UPDATE CMDDTLMAS SET CHECKSTAT='1' WHERE CMDNO='$index' AND ITEMNO='$itemno'";
						if (mysql_query($sql4)) {
							$sql5 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index'");
							$sql6 = mysql_query("SELECT * FROM CMDDTLMAS WHERE CMDNO='$index' AND CHECKSTAT='1'");
							if (mysql_num_rows($sql5) == mysql_num_rows($sql6)) {
								mysql_query("UPDATE CMDMAS SET CMDSTAT='C' WHERE CMDNO='$index'");
							}
							return 'Success';
						}
						else {
							return 'Unable to update check state';
						}
					}
				}
			}
			else {
				return 'No authority';
			}
		}
	}
}

function get_no() {
	$sql = mysql_query("SELECT NEXT_NO FROM CONTROLMAS");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}

function update_no() {
	$sql = "UPDATE CONTROLMAS SET NEXT_NO=NEXT_NO+1";
	if (mysql_query($sql)) {
		return true;
	}
	else {
		return false;
	}
}

function query_name($itemno) {
	$sql = mysql_query("SELECT ITEMNM FROM ITEMMAS WHERE ITEMNO='$itemno'");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}

function translate_state($state) {
	if ($state == 'B') return '查看';
	elseif ($state == 'C') return '接受';
	elseif ($state == 'D') return '拒絕';
}

function transfer_state($state, $type) {
	if ($state == 'A') return '已傳送';
	elseif ($state == 'B') {
		if ($type == 'C') {
			return '執行中';
		}
		else {
			return '待確認';
		}
	}
	elseif ($state == 'C') return '已確認';
	elseif ($state == 'D') return '已拒絕';
	else return 'Unknown';
}

function translate($cmdtype) {
	if ($cmdtype == 'A') return '油品';
	elseif ($cmdtype == 'B') return '出貨';
	elseif ($cmdtype == 'C') return '製皂';
	else return 'Unknown';
}

function inventory($whouse, $item) {
	$sqlQuery = mysql_query("SELECT TOTALAMT FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$item' AND ACTCODE='1'");
	if ($sqlQuery == false) {
		return 0;
	}
	else {
		$sqlFetch = mysql_fetch_row($sqlQuery);
		return $sqlFetch[0];
	}
}

function is_nonnegativeInt($value) {
	if ((ceil($value) == floor($value)) && $value >= 0) {
		return true;
	}
	else {
		return false;
	}
}

function is_positiveInt($value) {
	if ((ceil($value) == floor($value)) && $value > 0) {
		return true;
	}
	else {
		return false;
	}
}

function is_validDate($date) {
	$split = explode('-', $date);
	if (!empty($split[0]) && !empty($split[1]) && !empty($split[2])) {
		return checkdate($split[1], $split[2], $split[0]);
	}
	else {
		return false;
	}
}

function LocationToName($location) {
	if ($location == 'Beitou') return '北投';
	elseif ($location == 'Houshanpi') return '後山埤';
	elseif ($location == 'Taitung') return '台東';
	else return 'Unknown';
}

function translate_checkState($checkstat) {
	if ($checkstat == 0) {
		return '未完成';
	}
	else {
		return '已完成';
	}
}

function translate_check($checkstat, $cmdno, $itemno) {
	if ($checkstat == 0) {
		return '<input type="checkbox" onclick="check(\''.$cmdno.'\', \''.$itemno.'\')">';
	}
	else {
		return '已完成';
	}
}

function process_date($value) {
	if ($value < 10) {
		return '0'.$value;
	}
	else {
		return $value;
	}
}

function unit($itemno) {
	if (in_array($itemno, array('oil_1', 'oil_2', 'oil_3', 'oil_4', 'oil_5', 'oil_6', 'oil_7', 'oil_8'))) {
		return 'c.c.';
	}
	elseif (in_array($itemno, array('oil_9', 'NaOH'))) {
		return 'g';
	}
}