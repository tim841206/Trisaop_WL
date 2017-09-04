<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'request') {
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
		elseif ($_GET['event'] == 'search_state') {
			$message = search_state($_GET['account'], $_GET['token'], $_GET['state']);
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
		elseif ($_GET['event'] == 'accept') {
			$message = accept($_GET['account'], $_GET['token'], $_GET['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'reject') {
			$message = reject($_GET['account'], $_GET['token'], $_GET['index']);
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
		elseif ($_GET['event'] == 'set_shipfee') {
			$message = set_shipfee($_GET['account'], $_GET['token'], $_GET['index'], $_GET['shipfee']);
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
	if ($_POST['module'] == 'request') {
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
		elseif ($_POST['event'] == 'search_state') {
			$message = search_state($_POST['account'], $_POST['token'], $_POST['state']);
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
		elseif ($_POST['event'] == 'accept') {
			$message = accept($_POST['account'], $_POST['token'], $_POST['index']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'reject') {
			$message = reject($_POST['account'], $_POST['token'], $_POST['index']);
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
		elseif ($_POST['event'] == 'set_shipfee') {
			$message = set_shipfee($_POST['account'], $_POST['token'], $_POST['index'], $_POST['shipfee']);
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
			if ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE (SENDER='Beitou' OR RECEIVER='Beitou') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE (SENDER='Taitung' OR RECEIVER='Taitung') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			$content = '';
			if (mysql_num_rows($sql2) == 0) {
				$content = '查無資料';
			}
			else {
				if ($fetch1['AUTHORITY'] == 'C') {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td><button onclick="view_index_view('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
				}
				else {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td><td><button onclick="view_index_view('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search_index($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
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
		return 'Unregistered logistic';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		$fetch2 = mysql_fetch_array($sql2);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] == 'B' && $fetch2['SENDER'] != 'Beitou' && $fetch2['RECEIVER'] != 'Beitou') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'C' && $fetch2['SENDER'] != 'Houshanpi' && $fetch2['RECEIVER'] != 'Houshanpi') {
			return 'No authority';
		}
		elseif ($fetch1['AUTHORITY'] == 'D' && $fetch2['SENDER'] != 'Taitung' && $fetch2['RECEIVER'] != 'Taitung') {
			return 'No authority';
		}
		else {
			if ($fetch1['AUTHORITY'] == 'C') {
				$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
			else {
				$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function search_state($account, $token, $state) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (empty($state)) {
		return 'Empty state';
	}
	elseif (!in_array($state, array('A', 'B', 'C', 'D'))) {
		return 'Wrong state format';
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
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTSTAT='$state' AND ACTCODE='1'");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTSTAT='$state' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTSTAT='$state' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTSTAT='$state' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND ACTCODE='1' ORDER BY UPDATEDATE DESC");
			}
			$content = '';
			if ($sql2 == false) {
				$content = '查無資料';
			}
			else {
				if ($fetch1['AUTHORITY'] == 'C') {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
				}
				else {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
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
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou')");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Beitou' OR RECEIVER='Beitou') AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi')");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Houshanpi' OR RECEIVER='Houshanpi') AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				if (empty($year)) {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung')");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%d')='$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%m')='$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%m-%d')='$month-$day'");
						}
					}
				}
				else {
					if (empty($month)) {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%Y')='$year'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%Y-%d')='$year-$day'");
						}
					}
					else {
						if (empty($day)) {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%Y-%m')='$year-$month'");
						}
						else {
							$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE ACTCODE='1' AND (SENDER='Taitung' OR RECEIVER='Taitung') AND DATE_FORMAT(CREATEDATE,'%Y-%m-%d')='$year-$month-$day'");
						}
					}
				}
			}
			$content = '';
			if ($sql2 == false) {
				$content = '查無資料';
			}
			else {
				if ($fetch1['AUTHORITY'] == 'C') {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
				}
				else {
					$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr>';
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$content .= '<tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td><td><button onclick="view_index_search('.$fetch2['RQSTNO'].')">查看</button></td></tr>';
					}
				}
				$content .= '</table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function view_index($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
	$sql3 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
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
				$sql4 = '';
				if ($fetch1['AUTHORITY'] == 'A') {
					if ($fetch2['SENDER'] == 'Trisoap') {
						$sql4 = "UPDATE RQSTMAS SET SENDERDATE='$date' WHERE RQSTNO='$index'";
					}
					elseif ($fetch2['RECEIVER'] == 'Trisoap') {
						if ($fetch2['RQSTSTAT'] == 'A') {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date', RQSTSTAT='B', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						}
						else {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date' WHERE RQSTNO='$index'";
						}
					}
				}
				elseif ($fetch1['AUTHORITY'] == 'B') {
					if ($fetch2['SENDER'] == 'Beitou') {
						$sql4 = "UPDATE RQSTMAS SET SENDERDATE='$date' WHERE RQSTNO='$index'";
					}
					elseif ($fetch2['RECEIVER'] == 'Beitou') {
						if ($fetch2['RQSTSTAT'] == 'A') {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date', RQSTSTAT='B', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						}
						else {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date' WHERE RQSTNO='$index'";
						}
					}
				}
				elseif ($fetch1['AUTHORITY'] == 'C') {
					if ($fetch2['SENDER'] == 'Houshanpi') {
						$sql4 = "UPDATE RQSTMAS SET SENDERDATE='$date' WHERE RQSTNO='$index'";
					}
					elseif ($fetch2['RECEIVER'] == 'Houshanpi') {
						if ($fetch2['RQSTSTAT'] == 'A') {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date', RQSTSTAT='B', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						}
						else {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date' WHERE RQSTNO='$index'";
						}
					}
				}
				elseif ($fetch1['AUTHORITY'] == 'D') {
					if ($fetch2['SENDER'] == 'Taitung') {
						$sql4 = "UPDATE RQSTMAS SET SENDERDATE='$date' WHERE RQSTNO='$index'";
					}
					elseif ($fetch2['RECEIVER'] == 'Taitung') {
						if ($fetch2['RQSTSTAT'] == 'A') {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date', RQSTSTAT='B', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						}
						else {
							$sql4 = "UPDATE RQSTMAS SET RECEIVERDATE='$date' WHERE RQSTNO='$index'";
						}
					}
				}
				if (!empty($sql4)) {
					if (!mysql_query($sql4)) {
						return 'Unable to update review date';
					}
				}
				if ($fetch2['SENDER'] == 'Trisoap' && $fetch2['RECEIVER'] == 'Beitou') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B', 'E'))) {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['RQSTSTAT'] == 'A' || $fetch5['RQSTSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="accept('.$index.')">確認</button> <button onclick="reject('.$index.')">拒絕</button></td></tr></table>';
						}
						return array('message' => 'Success', 'content' => $content);
					}
					else {
						return 'No authority';
					}
				}
				elseif ($fetch2['SENDER'] == 'Taitung' && $fetch2['RECEIVER'] == 'Beitou') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B', 'E'))) {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['RQSTSTAT'] == 'A' || $fetch5['RQSTSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="accept('.$index.')">確認</button> <button onclick="reject('.$index.')">拒絕</button></td></tr></table>';
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif ($fetch1['AUTHORITY'] == 'D') {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						return array('message' => 'Success', 'content' => $content);
					}
					else {
						return 'No authority';
					}
				}
				elseif ($fetch2['SENDER'] == 'Houshanpi' && $fetch2['RECEIVER'] == 'Beitou') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B'))) {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['RQSTSTAT'] == 'A' || $fetch5['RQSTSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="accept('.$index.')">確認</button> <button onclick="reject('.$index.')">拒絕</button></td></tr></table>';
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif ($fetch1['AUTHORITY'] == 'C') {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif ($fetch1['AUTHORITY'] == 'E') {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							if (substr($fetch3['ITEMNO'], -9) != 'houshanpi') {
								$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
							}
						}
						return array('message' => 'Success', 'content' => $content);
					}
					else {
						return 'No authority';
					}
				}
				elseif ($fetch2['SENDER'] == 'Beitou' && $fetch2['RECEIVER'] == 'Trisoap') {
					if ($fetch1['AUTHORITY'] == 'A') {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['RQSTSTAT'] == 'A' || $fetch5['RQSTSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="accept('.$index.')">確認</button> <button onclick="reject('.$index.')">拒絕</button></td></tr></table>';
							$content .= '<table><tr><td>設定運費</td><td><input type="text" id="set_shipfee" value="'.$fetch2['SHIPFEE'].'"></td><td><button onclick="set_shipfee('.$index.')">設定</button></td></tr></table>';
						}
						elseif ($fetch5['RQSTSTAT'] == 'C' || $fetch5['RQSTSTAT'] == 'E') {
							$content .= '<table><tr><td>設定運費</td><td><input type="text" id="set_shipfee" value="'.$fetch2['SHIPFEE'].'"></td><td><button onclick="set_shipfee('.$index.')">設定</button></td></tr></table>';
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif (in_array($fetch1['AUTHORITY'], array('B', 'E'))) {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						return array('message' => 'Success', 'content' => $content);
					}
					else {
						return 'No authority';
					}
				}
				else {
					if ($fetch2['SENDER'] == authorityToName($fetch1['AUTHORITY'])) {
						if ($fetch1['AUTHORITY'] == 'C') {
							$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td></tr>';
							if ($fetch2['NOTICE'] != null) {
								$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
							}
							$content .= '</table>';
						}
						else {
							$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
							if ($fetch2['NOTICE'] != null) {
								$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
							}
							$content .= '</table>';
						}
						$content .= '<table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif ($fetch2['RECEIVER'] == authorityToName($fetch1['AUTHORITY'])) {
						if ($fetch1['AUTHORITY'] == 'C') {
							$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td></tr>';
							if ($fetch2['NOTICE'] != null) {
								$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
							}
							$content .= '</table>';
						}
						else {
							$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
							if ($fetch2['NOTICE'] != null) {
								$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
							}
							$content .= '</table>';
						}
						$content .= '<table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
						}
						$sql5 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
						$fetch5 = mysql_fetch_array($sql5);
						if ($fetch5['RQSTSTAT'] == 'B') {
							$content .= '<tr><td colspan="2"><button onclick="accept('.$index.')">確認</button> <button onclick="reject('.$index.')">拒絕</button></td></tr></table>';
						}
						return array('message' => 'Success', 'content' => $content);
					}
					elseif ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
						$content = '<table><tr><th>物流編號</th><th>建立時間</th><th>運送方</th><th>接收方</th><th>物流狀態</th><th>運費</th></tr><tr><td>'.$fetch2['RQSTNO'].'</td><td>'.$fetch2['CREATEDATE'].'</td><td>'.translate($fetch2['SENDER']).'</td><td>'.translate($fetch2['RECEIVER']).'</td><td>'.transfer_state($fetch2['RQSTSTAT']).'</td><td>'.number_format($fetch2['SHIPFEE']).'</td></tr>';
						if ($fetch2['NOTICE'] != null) {
							$content .= '<tr><td colspan="10">'.$fetch2['NOTICE'].'</td></tr>';
						}
						$content .= '</table><table><tr><th>名稱</th><th>數量</th></tr>';
						while ($fetch3 = mysql_fetch_array($sql3)) {
							$content .= ('<tr><td>'.$fetch3['ITEMNM'].'</td><td>'.number_format($fetch3['ITEMAMT']).'</td></tr>');
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
			if ($fetch1['AUTHORITY'] == 'A') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE SENDER='Trisoap' AND SENDERDATE<UPDATEDATE AND ACTCODE='1'");
				$sql3 = mysql_query("SELECT * FROM RQSTMAS WHERE RECEIVER='Trisoap' AND (RQSTSTAT='A' OR RQSTSTAT='B') AND ACTCODE='1'");
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE SENDER='Beitou' AND SENDERDATE<UPDATEDATE AND ACTCODE='1'");
				$sql3 = mysql_query("SELECT * FROM RQSTMAS WHERE RECEIVER='Beitou' AND (RQSTSTAT='A' OR RQSTSTAT='B') AND ACTCODE='1'");
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE SENDER='Houshanpi' AND SENDERDATE<UPDATEDATE AND ACTCODE='1'");
				$sql3 = mysql_query("SELECT * FROM RQSTMAS WHERE RECEIVER='Houshanpi' AND (RQSTSTAT='A' OR RQSTSTAT='B') AND ACTCODE='1'");
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE SENDER='Taitung' AND SENDERDATE<UPDATEDATE AND ACTCODE='1'");
				$sql3 = mysql_query("SELECT * FROM RQSTMAS WHERE RECEIVER='Taitung' AND (RQSTSTAT='A' OR RQSTSTAT='B') AND ACTCODE='1'");
			}
			else {
				return 'No notice';
			}
			if (mysql_num_rows($sql2) + mysql_num_rows($sql3) == 0) {
				return 'No notice';
			}
			else {
				$content = '';
				if (mysql_num_rows($sql2) != 0) {
					date_default_timezone_set('Asia/Taipei');
					$date = date("Y-m-d H:i:s");
					while ($fetch2 = mysql_fetch_array($sql2)) {
						$RQSTNO = $fetch2['RQSTNO'];
						$content .= translate($fetch2['RECEIVER']) . ' 方已經 ' . translate_state($fetch2['RQSTSTAT']) .' 編號為 ' . $RQSTNO . ' 的物流。<br>';
						mysql_query("UPDATE RQSTMAS SET SENDERDATE='$date' WHERE RQSTNO='$RQSTNO'");
					}
				}
				if (mysql_num_rows($sql3) != 0) {
					while ($fetch3 = mysql_fetch_array($sql3)) {
						if ($fetch3['RQSTSTAT'] == 'A') {
							$content .= '<span style="color: red;">您有一個來自 ' . translate($fetch3['SENDER']) . ' 的物流，物流編號 ' . $fetch3['RQSTNO'] . ' 。</span><button onclick="view_index_notice('.$fetch3['RQSTNO'].')">查看</button><br>';
						}
						else {
							$content .= '<span style="color: red;">您有一個待確認的物流，物流編號 ' . $fetch3['RQSTNO'] . ' 。</span><button onclick="view_index_notice('.$fetch3['RQSTNO'].')">查看</button><br>';
						}
					}
				}
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function accept($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
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
			if ($fetch2['RECEIVER'] == 'Trisoap' && $fetch1['AUTHORITY'] == 'A') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='C', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			elseif ($fetch2['RECEIVER'] == 'Beitou') {
				if ($fetch2['SENDER'] == 'Trisoap' || $fetch2['SENDER'] == 'Taitung') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B', 'E'))) {
						$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='C', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						if (mysql_query($sql3)) {
							$RECEIVER = $fetch2['RECEIVER'];
							$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
							while ($fetch4 = mysql_fetch_array($sql4)) {
								$ITEMNO = $fetch4['ITEMNO'];
								$ITEMAMT = $fetch4['ITEMAMT'];
								if (in_array($ITEMNO, array('oil_1', 'oil_2', 'oil_3', 'oil_4', 'oil_5', 'oil_6', 'oil_7', 'oil_8'))) {
									$ITEMAMT = ceil($ITEMAMT * 0.9);
								}
								mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$RECEIVER' AND ITEMNO='$ITEMNO'");
							}
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
				elseif ($fetch2['SENDER'] == 'Houshanpi') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B'))) {
						$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='C', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						if (mysql_query($sql3)) {
							$RECEIVER = $fetch2['RECEIVER'];
							$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
							while ($fetch4 = mysql_fetch_array($sql4)) {
								$ITEMNO = $fetch4['ITEMNO'];
								$ITEMAMT = $fetch4['ITEMAMT'];
								if (in_array($ITEMNO, array('oil_1', 'oil_2', 'oil_3', 'oil_4', 'oil_5', 'oil_6', 'oil_7', 'oil_8'))) {
									$ITEMAMT = ceil($ITEMAMT * 0.9);
								}
								mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$RECEIVER' AND ITEMNO='$ITEMNO'");
							}
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
			elseif ($fetch2['RECEIVER'] == 'Houshanpi' && $fetch1['AUTHORITY'] == 'C') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='C', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					$RECEIVER = $fetch2['RECEIVER'];
					$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$ITEMNO = $fetch4['ITEMNO'];
						$ITEMAMT = $fetch4['ITEMAMT'];
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$RECEIVER' AND ITEMNO='$ITEMNO'");
					}
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			elseif ($fetch2['RECEIVER'] == 'Taitung' && $fetch1['AUTHORITY'] == 'D') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='C', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					$RECEIVER = $fetch2['RECEIVER'];
					$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$ITEMNO = $fetch4['ITEMNO'];
						$ITEMAMT = $fetch4['ITEMAMT'];
						if (in_array($ITEMNO, array('oil_1', 'oil_2', 'oil_3', 'oil_4', 'oil_5', 'oil_6', 'oil_7', 'oil_8'))) {
							$ITEMAMT = ceil($ITEMAMT * 0.9);
						}
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$RECEIVER' AND ITEMNO='$ITEMNO'");
					}
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

function reject($account, $token, $index) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
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
			if ($fetch2['RECEIVER'] == 'Trisoap' && $fetch1['AUTHORITY'] == 'A') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='D', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					$SENDER = $fetch2['SENDER'];
					$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$ITEMNO = $fetch4['ITEMNO'];
						$ITEMAMT = $fetch4['ITEMAMT'];
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$SENDER' AND ITEMNO='$ITEMNO'");
					}
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			elseif ($fetch2['RECEIVER'] == 'Beitou') { 
				if ($fetch2['SENDER'] == 'Trisoap' || $fetch2['SENDER'] == 'Taitung') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B', 'E'))) {
						$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='D', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						if (mysql_query($sql3)) {
							$SENDER = $fetch2['SENDER'];
							$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
							while ($fetch4 = mysql_fetch_array($sql4)) {
								$ITEMNO = $fetch4['ITEMNO'];
								$ITEMAMT = $fetch4['ITEMAMT'];
								mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$SENDER' AND ITEMNO='$ITEMNO'");
							}
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
				elseif ($fetch2['SENDER'] == 'Houshanpi') {
					if (in_array($fetch1['AUTHORITY'], array('A', 'B'))) {
						$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='D', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
						if (mysql_query($sql3)) {
							$SENDER = $fetch2['SENDER'];
							$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
							while ($fetch4 = mysql_fetch_array($sql4)) {
								$ITEMNO = $fetch4['ITEMNO'];
								$ITEMAMT = $fetch4['ITEMAMT'];
								mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$SENDER' AND ITEMNO='$ITEMNO'");
							}
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
			elseif ($fetch2['RECEIVER'] == 'Houshanpi' && $fetch1['AUTHORITY'] == 'C') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='D', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					$SENDER = $fetch2['SENDER'];
					$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$ITEMNO = $fetch4['ITEMNO'];
						$ITEMAMT = $fetch4['ITEMAMT'];
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$SENDER' AND ITEMNO='$ITEMNO'");
					}
					return 'Success';
				}
				else {
					return 'Database operation error';
				}
			}
			elseif ($fetch2['RECEIVER'] == 'Taitung' && $fetch1['AUTHORITY'] == 'D') {
				$sql3 = "UPDATE RQSTMAS SET RQSTSTAT='D', RECEIVERDATE='$date', UPDATEDATE='$date' WHERE RQSTNO='$index'";
				if (mysql_query($sql3)) {
					$SENDER = $fetch2['SENDER'];
					$sql4 = mysql_query("SELECT * FROM RQSTDTLMAS WHERE RQSTNO='$index'");
					while ($fetch4 = mysql_fetch_array($sql4)) {
						$ITEMNO = $fetch4['ITEMNO'];
						$ITEMAMT = $fetch4['ITEMAMT'];
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$ITEMAMT', UPDATEDATE='$date' WHERE WHOUSENO='$SENDER' AND ITEMNO='$ITEMNO'");
					}
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
	$sender = $content['sender'];
	$receiver = $content['receiver'];
	$shipfee = $content['shipfee'];
	$memo = $content['memo'];
	$itemno = array();
	$itemamt = array();
	$key = array_keys($content);
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif (!in_array($sender, array('Trisoap', 'Houshanpi', 'Taitung'))) {
		return 'Unregistered sender';
	}
	elseif (!in_array($receiver, array('Trisoap', 'Beitou', 'Houshanpi', 'Taitung'))) {
		return 'Unregistered receiver';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif (!is_nonnegativeInt($shipfee)) {
		return 'Wrong shipfee format';
	}
	elseif (strlen($memo) > 200) {
		return 'Memo exceed length limit';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		else {
			if ($fetch1['AUTHORITY'] == 'A') {
				if ($sender == 'Trisoap' && $receiver == 'Beitou') {
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('additive_1', 'additive_2', 'additive_3', 'additive_4', 'additive_5', 'additive_6', 'additive_7', 'additive_8', 'additive_9', 'additive_10', 'package_1', 'package_2', 'package_3', 'package_4', 'package_5', 'package_6', 'package_7a', 'package_7b', 'package_8a', 'package_8b', 'package_9a', 'package_9b', 'moon_package_1', 'moon_package_2', 'moon_package_3', 'moon_package_4', 'moon_package_5'))) {
							array_push($itemno, $key[$i]);
							array_push($itemamt, $content[$key[$i]]);
						}
					}
				}
				elseif ($sender == 'Trisoap' && $receiver == 'Houshanpi') {
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('additive_1', 'additive_2', 'additive_3', 'additive_4', 'additive_5', 'additive_6', 'additive_7', 'additive_8', 'additive_9', 'additive_10'))) {
							array_push($itemno, $key[$i]);
							array_push($itemamt, $content[$key[$i]]);
						}
					}
				}
				elseif ($sender == 'Trisoap' && $receiver == 'Taitung') {
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('additive_1', 'additive_2', 'additive_3', 'additive_4', 'additive_5', 'additive_6', 'additive_7', 'additive_8', 'additive_9', 'additive_10'))) {
							array_push($itemno, $key[$i]);
							array_push($itemamt, $content[$key[$i]]);
						}
					}
				}
				elseif ($sender == 'Houshanpi' && $receiver == 'Beitou') {
					$message = '';
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('sp_1_100_houshanpi', 'sp_1_50_houshanpi', 'sp_2_100_houshanpi', 'sp_2_50_houshanpi', 'sp_3_100_houshanpi', 'sp_3_50_houshanpi'))) {
							if (inventory('Houshanpi', $key[$i]) < $content[$key[$i]]) {
								$message .= query_name($key[$i]) . "存量不足\n";
							}
							else {
								array_push($itemno, $key[$i]);
								array_push($itemamt, $content[$key[$i]]);
							}
						}
					}
					if (!empty($message)) {
						return $message;
					}
				}
				elseif ($sender == 'Taitung' && $receiver == 'Beitou') {
					$message = '';
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('sp_1_100', 'sp_1_50', 'sp_2_100', 'sp_2_50', 'sp_3_100', 'sp_3_50', 'ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6'))) {
							if (inventory('Taitung', $key[$i]) < $content[$key[$i]]) {
								$message .= query_name($key[$i]) . "存量不足\n";
							}
							else {
								array_push($itemno, $key[$i]);
								array_push($itemamt, $content[$key[$i]]);
							}
						}
					}
					if (!empty($message)) {
						return $message;
					}
				}
				else {
					return 'No authority';
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				if ($sender == 'Houshanpi' && $receiver == 'Beitou') {
					$message = '';
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('sp_1_100_houshanpi', 'sp_1_50_houshanpi', 'sp_2_100_houshanpi', 'sp_2_50_houshanpi', 'sp_3_100_houshanpi', 'sp_3_50_houshanpi'))) {
							if (inventory('Houshanpi', $key[$i]) < $content[$key[$i]]) {
								$processedName = explode('的', query_name($key[$i]));
								$message .= $processedName[1] . "存量不足\n";
							}
							else {
								array_push($itemno, $key[$i]);
								array_push($itemamt, $content[$key[$i]]);
							}
						}
					}
					if (!empty($message)) {
						return $message;
					}
				}
				else {
					return 'No authority';
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				if ($sender == 'Taitung' && $receiver == 'Beitou') {
					$message = '';
					for ($i = 0; $i < count($content); $i++) {
						if (in_array($key[$i], array('sp_1_100', 'sp_1_50', 'sp_2_100', 'sp_2_50', 'sp_3_100', 'sp_3_50', 'ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6'))) {
							if (inventory('Taitung', $key[$i]) < $content[$key[$i]]) {
								$message .= query_name($key[$i]) . "存量不足\n";
							}
							else {
								array_push($itemno, $key[$i]);
								array_push($itemamt, $content[$key[$i]]);
							}
						}
					}
					if (!empty($message)) {
						return $message;
					}
				}
				else {
					return 'No authority';
				}
			}
			else {
				return 'No authority';
			}
			if (count($itemno) == 0) {
				return 'Empty request';
			}
			else {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$rqstno = get_no();
				$sql2 = "INSERT INTO RQSTMAS (RQSTNO, SENDER, RECEIVER, SENDERDATE, RQSTSTAT, SHIPFEE, NOTICE, CREATEDATE, UPDATEDATE) VALUES ('$rqstno', '$sender', '$receiver', '$date', 'A', '$shipfee', '$memo', '$date', '$date')";
				if (mysql_query($sql2)) {
					if (update_no()) {
						for ($i = 0; $i < count($itemno); $i++) {
							$no = $itemno[$i];
							$nm = query_name($no);
							$amt = $itemamt[$i];
							mysql_query("INSERT INTO RQSTDTLMAS (RQSTNO, ITEMNO, ITEMNM, ITEMAMT) VALUES ('$rqstno', '$no', '$nm', '$amt')");
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amt' WHERE WHOUSENO='$sender' AND ITEMNO='$no'");
						}
						return array('message' => 'Success', 'index' => $rqstno);
					}
					else {
						return 'Unable to update request number';
					}
				}
				else {
					return 'Unable to create request';
				}
			}
		}
	}
}

function set_shipfee($account, $token, $index, $shipfee) {
	$sql1 = mysql_query("SELECT * FROM MEMBERMAS WHERE ACCOUNT='$account' AND ACTCODE='1'");
	$sql2 = mysql_query("SELECT * FROM RQSTMAS WHERE RQSTNO='$index' AND ACTCODE='1'");
	if (empty($account)) {
		return 'Empty account';
	}
	elseif (empty($token)) {
		return 'Empty token';
	}
	elseif ($sql1 == false) {
		return 'Unregistered account';
	}
	elseif (!is_nonnegativeInt($shipfee)) {
		return 'Wrong shipfee format';
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
			if ($fetch2['SENDER'] != 'Beitou' || $fetch2['RECEIVER'] != 'Trisoap') {
				return 'No authority';
			}
			else {
				$sql3 = "UPDATE RQSTMAS SET SHIPFEE='$shipfee' WHERE RQSTNO='$index' AND ACTCODE='1'";
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

function transfer_state($state) {
	if ($state == 'A') return '已傳送';
	elseif ($state == 'B') return '待確認';
	elseif ($state == 'C') return '已確認';
	elseif ($state == 'D') return '已拒絕';
	else return 'Unknown';
}

function translate($whouseno) {
	if ($whouseno == 'Trisoap') return '總部';
	elseif ($whouseno == 'Beitou') return '北投';
	elseif ($whouseno == 'Houshanpi') return '後山埤';
	elseif ($whouseno == 'Taitung') return '台東';
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

function authorityToName($authority) {
	if ($authority == 'A') return 'Trisoap';
	elseif ($authority == 'B') return 'Beitou';
	elseif ($authority == 'C') return 'Houshanpi';
	elseif ($authority == 'D') return 'Taitung';
	elseif ($authority == 'E') return 'Intern';
	else return 'Unknown';
}

function process_date($value) {
	if ($value < 10) {
		return '0'.$value;
	}
	else {
		return $value;
	}
}