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
			$message = search($_GET['account'], $_GET['token'], $_GET['whouseno'], $_GET['itemclass'], $_GET['itemno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'adjust_search') {
			$message = adjust_search($_GET['account'], $_GET['token'], $_GET['whouseno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'adjust') {
			$message = adjust($_GET);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'check' => $message['check']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'adjust_checked') {
			$message = adjust_checked($_GET);
			echo json_encode($message);
			return;
		}
		elseif ($_GET['event'] == 'mature') {
			$message = mature($_GET['account'], $_GET['token']);
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
		elseif ($_POST['event'] == 'search') {
			$message = search($_POST['account'], $_POST['token'], $_POST['whouseno'], $_POST['itemclass'], $_POST['itemno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'adjust_search') {
			$message = adjust_search($_POST['account'], $_POST['token'], $_POST['whouseno']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'adjust') {
			$message = adjust($_POST);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'check' => $message['check']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'adjust_checked') {
			$message = adjust_checked($_POST);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'mature') {
			$message = mature($_POST['account'], $_POST['token']);
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
				$content = '<table><tr><th>油品</th><th>添加物</th><th>包裝</th><th>商品</th><th>產品</th><th>半成品</th><th>後山埤的產品</th></tr><tr>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='C' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='D' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table class="table_content"><tr><th>名稱</th><th>製作地點</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE ITEMCLASS='F' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.transfer($fetch2['WHOUSENO']).'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>後山埤存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td></tr></table>';
			}
			elseif ($fetch1['AUTHORITY'] == 'B') {
				$content = '<table><tr><th>油品</th><th>添加物</th><th>包裝</th><th>商品</th><th>產品</th><th>半成品</th><th>後山埤的產品</th></tr><tr>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='C' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='D' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table class="table_content"><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='F' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td></tr></table>';
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$content = '<table><tr><th>產品</th><th>半成品</th></tr><tr>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.str_replace('後山埤的', '', $fetch2['ITEMNM']).'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table class="table_content"><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='F' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.str_replace('後山埤的', '', $fetch2['ITEMNM']).'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td></tr></table>';
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$content = '<table><tr><th>油品</th><th>添加物</th><th>產品</th><th>半成品</th></tr><tr>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table class="table_content"><tr><th>名稱</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='F' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td></tr></table>';
			}
			elseif ($fetch1['AUTHORITY'] == 'E') {
				$content = '<table><tr><th>油品</th><th>添加物</th><th>包裝</th><th>商品</th><th>產品</th><th>半成品</th></tr><tr>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='C' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='D' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th>名稱</th><th>北投存量</th><th>台東存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				$sql3 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$fetch3 = mysql_fetch_array($sql3);
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td><td>'.number_format($fetch3['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table class="table_content"><tr><th>名稱</th><th>製作地點</th><th>存量</th></tr>';
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE (WHOUSENO='Beitou' OR WHOUSENO='Taitung') AND ITEMCLASS='F' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$content .= '<tr><td>'.$fetch2['ITEMNM'].'</td><td>'.transfer($fetch2['WHOUSENO']).'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>';
				}
				$content .= '</table></td></tr></table>';
			}
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function search($account, $token, $whouseno, $itemclass, $itemno) {
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
			if ($fetch1['AUTHORITY'] == 'B' && $whouseno != 'Beitou') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'C' && $whouseno != 'Houshanpi') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'D' && $whouseno != 'Taitung') {
				return 'No authority';
			}
			elseif ($fetch1['AUTHORITY'] == 'E' && ($whouseno == 'Houshanpi' || $itemclass == 'H' || in_array($itemno, array('sp_1_houshanpi', 'sp_2_houshanpi', 'sp_3_houshanpi')))) {
				return 'No authority';
			}
			else {
				if ($whouseno == 'all' && $itemno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE ITEMCLASS='$itemclass' AND ACTCODE='1'");
				}
				elseif ($whouseno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE ITEMCLASS='$itemclass' AND ITEMNO='$itemno' AND ACTCODE='1'");
				}
				elseif ($itemno == 'all') {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouseno' AND ITEMCLASS='$itemclass' AND ACTCODE='1'");
				}
				else {
					$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouseno' AND ITEMCLASS='$itemclass' AND ITEMNO='$itemno' AND ACTCODE='1'");
				}
				if (mysql_num_rows($sql2) == 0) {
					return 'No data';
				}
				else {
					$content = '<table><tr><th>倉庫</th><th>名稱</th><th>數量</th></tr>';
					if ($fetch1['AUTHORITY'] == 'C') {
						while ($fetch2 = mysql_fetch_array($sql2)) {
							$content .= ('<tr><td>'.transfer($fetch2['WHOUSENO']).'</td><td>'.str_replace('後山埤的', '', $fetch2['ITEMNM']).'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>');
						}
					}
					else {
						while ($fetch2 = mysql_fetch_array($sql2)) {
							$content .= ('<tr><td>'.transfer($fetch2['WHOUSENO']).'</td><td>'.$fetch2['ITEMNM'].'</td><td>'.number_format($fetch2['TOTALAMT']).'</td></tr>');
						}
					}
					$content .= '</table>';
					return array('message' => 'Success', 'content' => $content);
				}
			}
		}
	}
}

function adjust_search($account, $token, $whouseno) {
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
		elseif ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			$inventory = array();
			$f_class_no = array();
			$f_class_nm = array();
			if ($whouseno == 'Beitou') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					if ($fetch2['ITEMCLASS'] == 'F') {
						$f_class_no[$ITEMNO] = $fetch2['TOTALAMT'];
						$f_class_nm[$ITEMNO] = $fetch2['ITEMNM'];
					}
					else {
						$inventory[$ITEMNO] = $fetch2['TOTALAMT'];
					}
				}
				$content = '<table><tr>
							<td><table>
								<tr><th colspan="2">油品</th></tr>
								<tr><td>橄欖油</td><td><input type="text" class="adjust_A" id="adjust_oil_1" value="'.$inventory['oil_1'].'" onclick="ask_adjust(\'adjust_oil_1\', \''.query_name('oil_1').'\')"></td></tr>
								<tr><td>棕梠油</td><td><input type="text" class="adjust_A" id="adjust_oil_2" value="'.$inventory['oil_2'].'" onclick="ask_adjust(\'adjust_oil_2\', \''.query_name('oil_2').'\')"></td></tr>
								<tr><td>椰子油</td><td><input type="text" class="adjust_A" id="adjust_oil_3" value="'.$inventory['oil_3'].'" onclick="ask_adjust(\'adjust_oil_3\', \''.query_name('oil_3').'\')"></td></tr>
								<tr><td>米糠油</td><td><input type="text" class="adjust_A" id="adjust_oil_4" value="'.$inventory['oil_4'].'" onclick="ask_adjust(\'adjust_oil_4\', \''.query_name('oil_4').'\')"></td></tr>
								<tr><td>紅棕梠油</td><td><input type="text" class="adjust_A" id="adjust_oil_5" value="'.$inventory['oil_5'].'" onclick="ask_adjust(\'adjust_oil_5\', \''.query_name('oil_5').'\')"></td></tr>
								<tr><td>葡萄籽油</td><td><input type="text" class="adjust_A" id="adjust_oil_6" value="'.$inventory['oil_6'].'" onclick="ask_adjust(\'adjust_oil_6\', \''.query_name('oil_6').'\')"></td></tr>
								<tr><td>苦茶油</td><td><input type="text" class="adjust_A" id="adjust_oil_7" value="'.$inventory['oil_7'].'" onclick="ask_adjust(\'adjust_oil_7\', \''.query_name('oil_7').'\')"></td></tr>
								<tr><td>蓖麻油</td><td><input type="text" class="adjust_A" id="adjust_oil_8" value="'.$inventory['oil_8'].'" onclick="ask_adjust(\'adjust_oil_8\', \''.query_name('oil_8').'\')"></td></tr>
								<tr><td>乳油木果脂</td><td><input type="text" class="adjust_A" id="adjust_oil_9" value="'.$inventory['oil_9'].'" onclick="ask_adjust(\'adjust_oil_9\', \''.query_name('oil_9').'\')"></td></tr>
								<tr><td>鹼</td><td><input type="text" class="adjust_A" id="adjust_NaOH" value="'.$inventory['NaOH'].'" onclick="ask_adjust(\'adjust_NaOH\', \''.query_name('NaOH').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">添加物</th></tr>
								<tr><td>金針花瓣</td><td><input type="text" class="adjust_B" id="adjust_additive_1" value="'.$inventory['additive_1'].'" onclick="ask_adjust(\'adjust_additive_1\', \''.query_name('additive_1').'\')"></td></tr>
								<tr><td>釋迦果粉</td><td><input type="text" class="adjust_B" id="adjust_additive_2" value="'.$inventory['additive_2'].'" onclick="ask_adjust(\'adjust_additive_2\', \''.query_name('additive_2').'\')"></td></tr>
								<tr><td>釋迦果泥</td><td><input type="text" class="adjust_B" id="adjust_additive_3" value="'.$inventory['additive_3'].'" onclick="ask_adjust(\'adjust_additive_3\', \''.query_name('additive_3').'\')"></td></tr>
								<tr><td>米粉</td><td><input type="text" class="adjust_B" id="adjust_additive_4" value="'.$inventory['additive_4'].'" onclick="ask_adjust(\'adjust_additive_4\', \''.query_name('additive_4').'\')"></td></tr>
								<tr><td>蕁麻葉粉</td><td><input type="text" class="adjust_B" id="adjust_additive_5" value="'.$inventory['additive_5'].'" onclick="ask_adjust(\'adjust_additive_5\', \''.query_name('additive_5').'\')"></td></tr>
								<tr><td>金盞花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_6" value="'.$inventory['additive_6'].'" onclick="ask_adjust(\'adjust_additive_6\', \''.query_name('additive_6').'\')"></td></tr>
								<tr><td>金針花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_7" value="'.$inventory['additive_7'].'" onclick="ask_adjust(\'adjust_additive_7\', \''.query_name('additive_7').'\')"></td></tr>
								<tr><td>薑黃粉</td><td><input type="text" class="adjust_B" id="adjust_additive_8" value="'.$inventory['additive_8'].'" onclick="ask_adjust(\'adjust_additive_8\', \''.query_name('additive_8').'\')"></td></tr>
								<tr><td>紅麴粉</td><td><input type="text" class="adjust_B" id="adjust_additive_9" value="'.$inventory['additive_9'].'" onclick="ask_adjust(\'adjust_additive_9\', \''.query_name('additive_9').'\')"></td></tr>
								<tr><td>洛神花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_10" value="'.$inventory['additive_10'].'" onclick="ask_adjust(\'adjust_additive_10\', \''.query_name('additive_10').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">包裝</th></tr>
								<tr><td>不織布包</td><td><input type="text" class="adjust_C" id="adjust_package_1" value="'.$inventory['package_1'].'" onclick="ask_adjust(\'adjust_package_1\', \''.query_name('package_1').'\')"></td></tr>
								<tr><td>鋁包</td><td><input type="text" class="adjust_C" id="adjust_package_2" value="'.$inventory['package_2'].'" onclick="ask_adjust(\'adjust_package_2\', \''.query_name('package_2').'\')"></td></tr>
								<tr><td>大禮盒封套</td><td><input type="text" class="adjust_C" id="adjust_package_3" value="'.$inventory['package_3'].'" onclick="ask_adjust(\'adjust_package_3\', \''.query_name('package_3').'\')"></td></tr>
								<tr><td>小禮盒</td><td><input type="text" class="adjust_C" id="adjust_package_4" value="'.$inventory['package_4'].'" onclick="ask_adjust(\'adjust_package_4\', \''.query_name('package_4').'\')"></td></tr>
								<tr><td>內襯</td><td><input type="text" class="adjust_C" id="adjust_package_5" value="'.$inventory['package_5'].'" onclick="ask_adjust(\'adjust_package_5\', \''.query_name('package_5').'\')"></td></tr>
								<tr><td>米皂外盒</td><td><input type="text" class="adjust_C" id="adjust_package_6" value="'.$inventory['package_6'].'" onclick="ask_adjust(\'adjust_package_6\', \''.query_name('package_6').'\')"></td></tr>
								<tr><td>金針皂外盒</td><td><input type="text" class="adjust_C" id="adjust_package_7" value="'.$inventory['package_7'].'" onclick="ask_adjust(\'adjust_package_7\', \''.query_name('package_7').'\')"></td></tr>
								<tr><td>釋迦皂外盒</td><td><input type="text" class="adjust_C" id="adjust_package_8" value="'.$inventory['package_8'].'" onclick="ask_adjust(\'adjust_package_8\', \''.query_name('package_8').'\')"></td></tr>
								<tr><td>大禮盒內盒</td><td><input type="text" class="adjust_C" id="adjust_package_9" value="'.$inventory['package_9'].'" onclick="ask_adjust(\'adjust_package_9\', \''.query_name('package_9').'\')"></td></tr>
								<tr><td>中秋大禮盒上蓋(兔子)</td><td><input type="text" class="adjust_C" id="adjust_moon_package_1" value="'.$inventory['moon_package_1'].'" onclick="ask_adjust(\'adjust_moon_package_1\', \''.query_name('moon_package_1').'\')"></td></tr>
								<tr><td>中秋大禮盒上蓋(熱氣球)</td><td><input type="text" class="adjust_C" id="adjust_moon_package_2" value="'.$inventory['moon_package_2'].'" onclick="ask_adjust(\'adjust_moon_package_2\', \''.query_name('moon_package_2').'\')"></td></tr>
								<tr><td>中秋大禮盒底座</td><td><input type="text" class="adjust_C" id="adjust_moon_package_3" value="'.$inventory['moon_package_3'].'" onclick="ask_adjust(\'adjust_moon_package_3\', \''.query_name('moon_package_3').'\')"></td></tr>
								<tr><td>中秋大禮盒內襯</td><td><input type="text" class="adjust_C" id="adjust_moon_package_4" value="'.$inventory['moon_package_4'].'" onclick="ask_adjust(\'adjust_moon_package_4\', \''.query_name('moon_package_4').'\')"></td></tr>
								<tr><td>中秋小禮盒封套</td><td><input type="text" class="adjust_C" id="adjust_moon_package_5" value="'.$inventory['moon_package_5'].'" onclick="ask_adjust(\'adjust_moon_package_5\', \''.query_name('moon_package_5').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">商品</th></tr>
								<tr><td>田靜山巒禾風皂</td><td><input type="text" class="adjust_D" id="adjust_product_sp_1" value="'.$inventory['product_sp_1'].'" onclick="ask_adjust(\'adjust_product_sp_1\', \''.query_name('product_sp_1').'\')"></td></tr>
								<tr><td>金絲森林渲染皂</td><td><input type="text" class="adjust_D" id="adjust_product_sp_2" value="'.$inventory['product_sp_2'].'" onclick="ask_adjust(\'adjust_product_sp_2\', \''.query_name('product_sp_2').'\')"></td></tr>
								<tr><td>釋迦手感果力皂</td><td><input type="text" class="adjust_D" id="adjust_product_sp_3" value="'.$inventory['product_sp_3'].'" onclick="ask_adjust(\'adjust_product_sp_3\', \''.query_name('product_sp_3').'\')"></td></tr>
								<tr><td>三三台東意象禮盒組</td><td><input type="text" class="adjust_D" id="adjust_product_sp_box" value="'.$inventory['product_sp_box'].'" onclick="ask_adjust(\'adjust_product_sp_box\', \''.query_name('product_sp_box').'\')"></td></tr>
								<tr><td>洛神紅麴旅用皂絲</td><td><input type="text" class="adjust_D" id="adjust_product_ss_1" value="'.$inventory['product_ss_1'].'" onclick="ask_adjust(\'adjust_product_ss_1\', \''.query_name('product_ss_1').'\')"></td></tr>
								<tr><td>暖暖薑黃旅用皂絲</td><td><input type="text" class="adjust_D" id="adjust_product_ss_2" value="'.$inventory['product_ss_2'].'" onclick="ask_adjust(\'adjust_product_ss_2\', \''.query_name('product_ss_2').'\')"></td></tr>
								<tr><td>萱草米黃旅用皂絲</td><td><input type="text" class="adjust_D" id="adjust_product_ss_3" value="'.$inventory['product_ss_3'].'" onclick="ask_adjust(\'adjust_product_ss_3\', \''.query_name('product_ss_3').'\')"></td></tr>
								<tr><td>三三台東意象皂絲旅行組</td><td><input type="text" class="adjust_D" id="adjust_product_ss_box" value="'.$inventory['product_ss_box'].'" onclick="ask_adjust(\'adjust_product_ss_box\', \''.query_name('product_ss_box').'\')"></td></tr>
								<tr><td>中秋禮皂-月兔捉迷藏</td><td><input type="text" class="adjust_D" id="adjust_moon_box_1" value="'.$inventory['moon_box_1'].'" onclick="ask_adjust(\'adjust_moon_box_1\', \''.query_name('moon_box_1').'\')"></td></tr>
								<tr><td>中秋禮皂-熱氣球登月</td><td><input type="text" class="adjust_D" id="adjust_moon_box_2" value="'.$inventory['moon_box_2'].'" onclick="ask_adjust(\'adjust_moon_box_2\', \''.query_name('moon_box_2').'\')"></td></tr>
								<tr><td>中秋小禮盒(米皂)</td><td><input type="text" class="adjust_D" id="adjust_moon_box_3" value="'.$inventory['moon_box_3'].'" onclick="ask_adjust(\'adjust_moon_box_3\', \''.query_name('moon_box_3').'\')"></td></tr>
								<tr><td>中秋小禮盒(金針皂)</td><td><input type="text" class="adjust_D" id="adjust_moon_box_4" value="'.$inventory['moon_box_4'].'" onclick="ask_adjust(\'adjust_moon_box_4\', \''.query_name('moon_box_4').'\')"></td></tr>
								<tr><td>中秋小禮盒(釋迦皂)</td><td><input type="text" class="adjust_D" id="adjust_moon_box_5" value="'.$inventory['moon_box_5'].'" onclick="ask_adjust(\'adjust_moon_box_5\', \''.query_name('moon_box_5').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">產品</th></tr>
								<tr><td>米皂</td><td><input type="text" class="adjust_E" id="adjust_sp_1" value="'.$inventory['sp_1'].'" onclick="ask_adjust(\'adjust_sp_1\', \''.query_name('sp_1').'\')"></td></tr>
								<tr><td>金針皂</td><td><input type="text" class="adjust_E" id="adjust_sp_2" value="'.$inventory['sp_2'].'" onclick="ask_adjust(\'adjust_sp_2\', \''.query_name('sp_2').'\')"></td></tr>
								<tr><td>釋迦皂</td><td><input type="text" class="adjust_E" id="adjust_sp_3" value="'.$inventory['sp_3'].'" onclick="ask_adjust(\'adjust_sp_3\', \''.query_name('sp_3').'\')"></td></tr>
								<tr><td>洛神皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_1" value="'.$inventory['ss_1'].'" onclick="ask_adjust(\'adjust_ss_1\', \''.query_name('ss_1').'\')"></td></tr>
								<tr><td>紅麴皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_2" value="'.$inventory['ss_2'].'" onclick="ask_adjust(\'adjust_ss_2\', \''.query_name('ss_2').'\')"></td></tr>
								<tr><td>薑黃皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_3" value="'.$inventory['ss_3'].'" onclick="ask_adjust(\'adjust_ss_3\', \''.query_name('ss_3').'\')"></td></tr>
								<tr><td>金針皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_4" value="'.$inventory['ss_4'].'" onclick="ask_adjust(\'adjust_ss_4\', \''.query_name('ss_4').'\')"></td></tr>
								<tr><td>紅棕梠皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_5" value="'.$inventory['ss_5'].'" onclick="ask_adjust(\'adjust_ss_5\', \''.query_name('ss_5').'\')"></td></tr>
								<tr><td>蕁麻葉皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_6" value="'.$inventory['ss_6'].'" onclick="ask_adjust(\'adjust_ss_6\', \''.query_name('ss_6').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>
							<td><table>
								<tr><th colspan="2">後山埤的產品</th></tr>
								<tr><td>後山埤的米皂</td><td><input type="text" class="adjust_H" id="adjust_sp_1_houshanpi" value="'.$inventory['sp_1_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_1_houshanpi\', \''.query_name('sp_1_houshanpi').'\')"></td></tr>
								<tr><td>後山埤的金針皂</td><td><input type="text" class="adjust_H" id="adjust_sp_2_houshanpi" value="'.$inventory['sp_2_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_2_houshanpi\', \''.query_name('sp_2_houshanpi').'\')"></td></tr>
								<tr><td>後山埤的釋迦皂</td><td><input type="text" class="adjust_H" id="adjust_sp_3_houshanpi" value="'.$inventory['sp_3_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_3_houshanpi\', \''.query_name('sp_3_houshanpi').'\')"></td></tr>
							</table></td>
							</tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
			elseif ($whouseno == 'Houshanpi') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					if ($fetch2['ITEMCLASS'] == 'F') {
						$f_class_no[$ITEMNO] = $fetch2['TOTALAMT'];
						$f_class_nm[$ITEMNO] = $fetch2['ITEMNM'];
					}
					else {
						$inventory[$ITEMNO] = $fetch2['TOTALAMT'];
					}
				}
				$content = '<table><tr>
							<td><table>
								<tr><th colspan="2">添加物</th></tr>
								<tr><td>金針花瓣</td><td><input type="text" class="adjust_B" id="adjust_additive_1" value="'.$inventory['additive_1'].'" onclick="ask_adjust(\'adjust_additive_1\', \''.query_name('additive_1').'\')"></td></tr>
								<tr><td>釋迦果粉</td><td><input type="text" class="adjust_B" id="adjust_additive_2" value="'.$inventory['additive_2'].'" onclick="ask_adjust(\'adjust_additive_2\', \''.query_name('additive_2').'\')"></td></tr>
								<tr><td>釋迦果泥</td><td><input type="text" class="adjust_B" id="adjust_additive_3" value="'.$inventory['additive_3'].'" onclick="ask_adjust(\'adjust_additive_3\', \''.query_name('additive_3').'\')"></td></tr>
								<tr><td>米粉</td><td><input type="text" class="adjust_B" id="adjust_additive_4" value="'.$inventory['additive_4'].'" onclick="ask_adjust(\'adjust_additive_4\', \''.query_name('additive_4').'\')"></td></tr>
								<tr><td>蕁麻葉粉</td><td><input type="text" class="adjust_B" id="adjust_additive_5" value="'.$inventory['additive_5'].'" onclick="ask_adjust(\'adjust_additive_5\', \''.query_name('additive_5').'\')"></td></tr>
								<tr><td>金盞花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_6" value="'.$inventory['additive_6'].'" onclick="ask_adjust(\'adjust_additive_6\', \''.query_name('additive_6').'\')"></td></tr>
								<tr><td>金針花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_7" value="'.$inventory['additive_7'].'" onclick="ask_adjust(\'adjust_additive_7\', \''.query_name('additive_7').'\')"></td></tr>
								<tr><td>薑黃粉</td><td><input type="text" class="adjust_B" id="adjust_additive_8" value="'.$inventory['additive_8'].'" onclick="ask_adjust(\'adjust_additive_8\', \''.query_name('additive_8').'\')"></td></tr>
								<tr><td>紅麴粉</td><td><input type="text" class="adjust_B" id="adjust_additive_9" value="'.$inventory['additive_9'].'" onclick="ask_adjust(\'adjust_additive_9\', \''.query_name('additive_9').'\')"></td></tr>
								<tr><td>洛神花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_10" value="'.$inventory['additive_10'].'" onclick="ask_adjust(\'adjust_additive_10\', \''.query_name('additive_10').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>
							<td><table>
								<tr><th colspan="2">後山埤的產品</th></tr>
								<tr><td>後山埤的米皂</td><td><input type="text" class="adjust_H" id="adjust_sp_1_houshanpi" value="'.$inventory['sp_1_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_1_houshanpi\', \''.query_name('sp_1_houshanpi').'\')"></td></tr>
								<tr><td>後山埤的金針皂</td><td><input type="text" class="adjust_H" id="adjust_sp_2_houshanpi" value="'.$inventory['sp_2_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_2_houshanpi\', \''.query_name('sp_2_houshanpi').'\')"></td></tr>
								<tr><td>後山埤的釋迦皂</td><td><input type="text" class="adjust_H" id="adjust_sp_3_houshanpi" value="'.$inventory['sp_3_houshanpi'].'" onclick="ask_adjust(\'adjust_sp_3_houshanpi\', \''.query_name('sp_3_houshanpi').'\')"></td></tr>
							</table></td>
							</tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
			elseif ($whouseno == 'Taitung') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					if ($fetch2['ITEMCLASS'] == 'F') {
						$f_class_no[$ITEMNO] = $fetch2['TOTALAMT'];
						$f_class_nm[$ITEMNO] = $fetch2['ITEMNM'];
					}
					else {
						$inventory[$ITEMNO] = $fetch2['TOTALAMT'];
					}
				}
				$content = '<table><tr>
							<td><table>
								<tr><th colspan="2">油品</th></tr>
								<tr><td>橄欖油</td><td><input type="text" class="adjust_A" id="adjust_oil_1" value="'.$inventory['oil_1'].'" onclick="ask_adjust(\'adjust_oil_1\', \''.query_name('oil_1').'\')"></td></tr>
								<tr><td>棕梠油</td><td><input type="text" class="adjust_A" id="adjust_oil_2" value="'.$inventory['oil_2'].'" onclick="ask_adjust(\'adjust_oil_2\', \''.query_name('oil_2').'\')"></td></tr>
								<tr><td>椰子油</td><td><input type="text" class="adjust_A" id="adjust_oil_3" value="'.$inventory['oil_3'].'" onclick="ask_adjust(\'adjust_oil_3\', \''.query_name('oil_3').'\')"></td></tr>
								<tr><td>米糠油</td><td><input type="text" class="adjust_A" id="adjust_oil_4" value="'.$inventory['oil_4'].'" onclick="ask_adjust(\'adjust_oil_4\', \''.query_name('oil_4').'\')"></td></tr>
								<tr><td>紅棕梠油</td><td><input type="text" class="adjust_A" id="adjust_oil_5" value="'.$inventory['oil_5'].'" onclick="ask_adjust(\'adjust_oil_5\', \''.query_name('oil_5').'\')"></td></tr>
								<tr><td>葡萄籽油</td><td><input type="text" class="adjust_A" id="adjust_oil_6" value="'.$inventory['oil_6'].'" onclick="ask_adjust(\'adjust_oil_6\', \''.query_name('oil_6').'\')"></td></tr>
								<tr><td>苦茶油</td><td><input type="text" class="adjust_A" id="adjust_oil_7" value="'.$inventory['oil_7'].'" onclick="ask_adjust(\'adjust_oil_7\', \''.query_name('oil_7').'\')"></td></tr>
								<tr><td>蓖麻油</td><td><input type="text" class="adjust_A" id="adjust_oil_8" value="'.$inventory['oil_8'].'" onclick="ask_adjust(\'adjust_oil_8\', \''.query_name('oil_8').'\')"></td></tr>
								<tr><td>乳油木果脂</td><td><input type="text" class="adjust_A" id="adjust_oil_9" value="'.$inventory['oil_9'].'" onclick="ask_adjust(\'adjust_oil_9\', \''.query_name('oil_9').'\')"></td></tr>
								<tr><td>鹼</td><td><input type="text" class="adjust_A" id="adjust_NaOH" value="'.$inventory['NaOH'].'" onclick="ask_adjust(\'adjust_NaOH\', \''.query_name('NaOH').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">添加物</th></tr>
								<tr><td>金針花瓣</td><td><input type="text" class="adjust_B" id="adjust_additive_1" value="'.$inventory['additive_1'].'" onclick="ask_adjust(\'adjust_additive_1\', \''.query_name('additive_1').'\')"></td></tr>
								<tr><td>釋迦果粉</td><td><input type="text" class="adjust_B" id="adjust_additive_2" value="'.$inventory['additive_2'].'" onclick="ask_adjust(\'adjust_additive_2\', \''.query_name('additive_2').'\')"></td></tr>
								<tr><td>釋迦果泥</td><td><input type="text" class="adjust_B" id="adjust_additive_3" value="'.$inventory['additive_3'].'" onclick="ask_adjust(\'adjust_additive_3\', \''.query_name('additive_3').'\')"></td></tr>
								<tr><td>米粉</td><td><input type="text" class="adjust_B" id="adjust_additive_4" value="'.$inventory['additive_4'].'" onclick="ask_adjust(\'adjust_additive_4\', \''.query_name('additive_4').'\')"></td></tr>
								<tr><td>蕁麻葉粉</td><td><input type="text" class="adjust_B" id="adjust_additive_5" value="'.$inventory['additive_5'].'" onclick="ask_adjust(\'adjust_additive_5\', \''.query_name('additive_5').'\')"></td></tr>
								<tr><td>金盞花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_6" value="'.$inventory['additive_6'].'" onclick="ask_adjust(\'adjust_additive_6\', \''.query_name('additive_6').'\')"></td></tr>
								<tr><td>金針花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_7" value="'.$inventory['additive_7'].'" onclick="ask_adjust(\'adjust_additive_7\', \''.query_name('additive_7').'\')"></td></tr>
								<tr><td>薑黃粉</td><td><input type="text" class="adjust_B" id="adjust_additive_8" value="'.$inventory['additive_8'].'" onclick="ask_adjust(\'adjust_additive_8\', \''.query_name('additive_8').'\')"></td></tr>
								<tr><td>紅麴粉</td><td><input type="text" class="adjust_B" id="adjust_additive_9" value="'.$inventory['additive_9'].'" onclick="ask_adjust(\'adjust_additive_9\', \''.query_name('additive_9').'\')"></td></tr>
								<tr><td>洛神花粉</td><td><input type="text" class="adjust_B" id="adjust_additive_10" value="'.$inventory['additive_10'].'" onclick="ask_adjust(\'adjust_additive_10\', \''.query_name('additive_10').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">產品</th></tr>
								<tr><td>米皂</td><td><input type="text" class="adjust_E" id="adjust_sp_1" value="'.$inventory['sp_1'].'" onclick="ask_adjust(\'adjust_sp_1\', \''.query_name('sp_1').'\')"></td></tr>
								<tr><td>金針皂</td><td><input type="text" class="adjust_E" id="adjust_sp_2" value="'.$inventory['sp_2'].'" onclick="ask_adjust(\'adjust_sp_2\', \''.query_name('sp_2').'\')"></td></tr>
								<tr><td>釋迦皂</td><td><input type="text" class="adjust_E" id="adjust_sp_3" value="'.$inventory['sp_3'].'" onclick="ask_adjust(\'adjust_sp_3\', \''.query_name('sp_3').'\')"></td></tr>
								<tr><td>洛神皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_1" value="'.$inventory['ss_1'].'" onclick="ask_adjust(\'adjust_ss_1\', \''.query_name('ss_1').'\')"></td></tr>
								<tr><td>紅麴皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_2" value="'.$inventory['ss_2'].'" onclick="ask_adjust(\'adjust_ss_2\', \''.query_name('ss_2').'\')"></td></tr>
								<tr><td>薑黃皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_3" value="'.$inventory['ss_3'].'" onclick="ask_adjust(\'adjust_ss_3\', \''.query_name('ss_3').'\')"></td></tr>
								<tr><td>金針皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_4" value="'.$inventory['ss_4'].'" onclick="ask_adjust(\'adjust_ss_4\', \''.query_name('ss_4').'\')"></td></tr>
								<tr><td>紅棕梠皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_5" value="'.$inventory['ss_5'].'" onclick="ask_adjust(\'adjust_ss_5\', \''.query_name('ss_5').'\')"></td></tr>
								<tr><td>蕁麻葉皂絲</td><td><input type="text" class="adjust_E" id="adjust_ss_6" value="'.$inventory['ss_6'].'" onclick="ask_adjust(\'adjust_ss_6\', \''.query_name('ss_6').'\')"></td></tr>
							</table></td>
							<td><table>
								<tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>
							</tr></table>';
				return array('message' => 'Success', 'content' => $content);
			}
			else {
				return array('message' => 'Success', 'content' => '');
			}
		}
	}
}

function adjust($content) {
	$account = $content['account'];
	$token = $content['token'];
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
		elseif ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			$message = '';
			if ($content['whouseno'] == 'Beitou') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_C_no']);
				$TOTALAMT = explode(',', $content['adjust_C_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_D_no']);
				$TOTALAMT = explode(',', $content['adjust_D_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$queryNO = substr(substr($ITEMNO[$i], 7), 0, -9);
					$TIME = substr($ITEMNO[$i], -8);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = $TIME . query_name($queryNO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return array('message' => 'Success', 'check' => $message);
			}
			elseif ($content['whouseno'] == 'Houshanpi') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$queryNO = substr(substr($ITEMNO[$i], 7), 0, -9);
					$TIME = substr($ITEMNO[$i], -8);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = $TIME . query_name($queryNO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return array('message' => 'Success', 'check' => $message);
			}
			elseif ($content['whouseno'] == 'Taitung') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$queryNO = substr(substr($ITEMNO[$i], 7), 0, -9);
					$TIME = substr($ITEMNO[$i], -8);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = $TIME . query_name($queryNO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return array('message' => 'Success', 'check' => $message);
			}
			else {
				return 'Wrong warehouse number';
			}
		}
	}
}

function adjust_checked($content) {
	$account = $content['account'];
	$token = $content['token'];
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
		elseif ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			$message = '';
			if ($content['whouseno'] == 'Beitou') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_C_no']);
				$TOTALAMT = explode(',', $content['adjust_C_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_D_no']);
				$TOTALAMT = explode(',', $content['adjust_D_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_positiveInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					elseif ($AMT == 0) {
						$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date', ACTCODE='0' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
						if (!mysql_query($sql2)) {
							return 'Wrong index';
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Beitou', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return 'Success';
			}
			elseif ($content['whouseno'] == 'Houshanpi') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_positiveInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					elseif ($AMT == 0) {
						$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date', ACTCODE='0' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$NO'";
						if (!mysql_query($sql2)) {
							return 'Wrong index';
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Houshanpi', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return 'Success';
			}
			elseif ($content['whouseno'] == 'Taitung') {
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_positiveInt($AMT)) {
						$ORIGINAMT = inventory('Taitung', $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					elseif ($AMT == 0) {
						$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date', ACTCODE='0' WHERE WHOUSENO='Taitung' AND ITEMNO='$NO'";
						if (!mysql_query($sql2)) {
							return 'Wrong index';
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
				return 'Success';
			}
			else {
				return 'Wrong warehouse number';
			}
		}
	}
}

function mature($account, $token) {
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
		elseif ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
			return 'No authority';
		}
		else {
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			$content = '';
			if ($fetch1['AUTHORITY'] == 'B') {
				$matureDay = 33;
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='F' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$processedITEMNO = substr($ITEMNO, 0, -9);
					$TOTALAMT = $fetch2['TOTALAMT'];
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT='0', ACTCODE='0', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$TOTALAMT', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$processedITEMNO'");
						$content .= $fetch2['TOTALAMT'] . ' 個 ' . $fetch2['ITEMNM'] . ' 已熟成。<br>';
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$matureDay = 14;
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='F' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$processedITEMNO = substr($ITEMNO, 0, -9);
					$TOTALAMT = $fetch2['TOTALAMT'];
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT='0', ACTCODE='0', UPDATEDATE='$date' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$ITEMNO'");
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$TOTALAMT', UPDATEDATE='$date' WHERE WHOUSENO='Houshanpi' AND ITEMNO='$processedITEMNO'");
						$content .= $fetch2['TOTALAMT'] . ' 個 ' . $fetch2['ITEMNM'] . ' 已熟成。<br>';
					}
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$matureDay = 33;
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='F' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$processedITEMNO = substr($ITEMNO, 0, -9);
					$TOTALAMT = $fetch2['TOTALAMT'];
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT='0', ACTCODE='0', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$ITEMNO'");
						mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$TOTALAMT', UPDATEDATE='$date' WHERE WHOUSENO='Taitung' AND ITEMNO='$processedITEMNO'");
						$content .= $fetch2['TOTALAMT'] . ' 個 ' . $fetch2['ITEMNM'] . ' 已熟成。<br>';
					}
				}
			}
			if (empty($content)) {
				return 'No notice';
			}
			else {
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function transfer($whouseno) {
	if ($whouseno == 'Beitou') return '北投';
	elseif ($whouseno == 'Houshanpi') return '後山埤';
	elseif ($whouseno == 'Taitung') return '台東';
	else return 'Unknown';
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

function query_name($itemno) {
	$sql = mysql_query("SELECT ITEMNM FROM ITEMMAS WHERE ITEMNO='$itemno'");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}