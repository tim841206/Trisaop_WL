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
		elseif ($_GET['event'] == 'mature_search') {
			$message = mature_search($_GET['account'], $_GET['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'cut') {
			$message = cut($_GET['account'], $_GET['token'], $_GET['itemno'], $_GET['_100g']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'slice_search') {
			$message = slice_search($_GET['account'], $_GET['token'], $_GET['slice']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'slice') {
			$message = slice($_GET['account'], $_GET['token'], $_GET['slice'], $_GET['ingredient'], $_GET['result']);
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
		elseif ($_POST['event'] == 'mature_search') {
			$message = mature_search($_POST['account'], $_POST['token']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'cut') {
			$message = cut($_POST['account'], $_POST['token'], $_POST['itemno'], $_POST['_100g']);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'slice_search') {
			$message = slice_search($_POST['account'], $_POST['token'], $_POST['slice']);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'content' => $message['content']));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'slice') {
			$message = slice($_POST['account'], $_POST['token'], $_POST['slice'], $_POST['ingredient'], $_POST['result']);
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
			elseif ($fetch1['AUTHORITY'] == 'E' && ($whouseno == 'Houshanpi' || $itemclass == 'H' || in_array($itemno, array('sp_1_100_houshanpi', 'sp_2_100_houshanpi', 'sp_3_100_houshanpi')))) {
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
				$content = '<table><tr>';
				$content .= '<td><table><tr><th colspan="2">油品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_A" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">添加物</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_B" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">包裝</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='C' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_C" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">商品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='D' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_D" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">產品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_E" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">後山埤的產品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_H" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '</tr></table>';
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
				$content = '<table><tr>';
				$content .= '<td><table><tr><th colspan="2">添加物</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_B" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">後山埤的產品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='H' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_H" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '</tr></table>';
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
				$content = '<table><tr>';
				$content .= '<td><table><tr><th colspan="2">油品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='A' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_A" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">添加物</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='B' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_B" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">產品</th></tr>';
				$sql = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND ITEMCLASS='E' AND ACTCODE='1' ORDER BY ITEMNO ASC");
				while ($fetch = mysql_fetch_array($sql)) {
					$content .= '<tr><td>'.query_name($fetch['ITEMNO']).'</td><td><input type="text" class="adjust_E" id="adjust_'.$fetch['ITEMNO'].'" value="'.$inventory[$fetch['ITEMNO']].'" onclick="ask_adjust(\'adjust_'.$fetch['ITEMNO'].'\', \''.query_name($fetch['ITEMNO']).'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '<td><table><tr><th colspan="2">半成品</th></tr>';
				$NO = array_keys($f_class_no);
				$itr_time = count($f_class_no);
				for ($i = 0; $i < $itr_time; $i++) {
					$ITEMNO = array_pop($NO);
					$ITEMNM = array_pop($f_class_nm);
					$ITEMAMT = array_pop($f_class_no);
					$content .= '<tr><td>'.$ITEMNM.'</td><td><input type="text" class="adjust_F" id="adjust_'.$ITEMNO.'" value="'.$ITEMAMT.'" onclick="ask_adjust(\'adjust_'.$ITEMNO.'\', \''.$ITEMNM.'\')"></td></tr>';
				}
				$content .= '</table></td>';
				$content .= '</tr></table>';
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
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			if (in_array($content['whouseno'], array('Beitou', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou'))) {
				$ITEMNO = explode(',', $content['adjust_C_no']);
				$TOTALAMT = explode(',', $content['adjust_C_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou'))) {
				$ITEMNO = explode(',', $content['adjust_D_no']);
				$TOTALAMT = explode(',', $content['adjust_D_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$queryNO = substr(substr($ITEMNO[$i], 7), 0, -9);
					$TIME = substr($ITEMNO[$i], -8);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = $TIME . query_name($queryNO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi'))) {
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$NAME = query_name($NO);
							$message .= '將把' . $NAME . '的存量由' . $ORIGINAMT . '更改為' . $AMT . "\n";
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			return array('message' => 'Success', 'check' => $message);
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
			date_default_timezone_set('Asia/Taipei');
			$date = date("Y-m-d H:i:s");
			if (in_array($content['whouseno'], array('Beitou', 'Taitung'))) {
				$location = $content['whouseno'];
				$ITEMNO = explode(',', $content['adjust_A_no']);
				$TOTALAMT = explode(',', $content['adjust_A_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_B_no']);
				$TOTALAMT = explode(',', $content['adjust_B_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou'))) {
				$ITEMNO = explode(',', $content['adjust_C_no']);
				$TOTALAMT = explode(',', $content['adjust_C_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou'))) {
				$ITEMNO = explode(',', $content['adjust_D_no']);
				$TOTALAMT = explode(',', $content['adjust_D_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_E_no']);
				$TOTALAMT = explode(',', $content['adjust_E_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi', 'Taitung'))) {
				$ITEMNO = explode(',', $content['adjust_F_no']);
				$TOTALAMT = explode(',', $content['adjust_F_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_positiveInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					elseif ($AMT == 0) {
						$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date', ACTCODE='0' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
						if (!mysql_query($sql2)) {
							return 'Wrong index';
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			if (in_array($content['whouseno'], array('Beitou', 'Houshanpi'))) {
				$ITEMNO = explode(',', $content['adjust_H_no']);
				$TOTALAMT = explode(',', $content['adjust_H_amt']);
				for ($i = 0; $i < count($ITEMNO); $i++) {
					$NO = substr($ITEMNO[$i], 7);
					$AMT = $TOTALAMT[$i];
					if (is_nonnegativeInt($AMT)) {
						$ORIGINAMT = inventory($content['whouseno'], $NO);
						if ($AMT != $ORIGINAMT) {
							$sql2 = "UPDATE WHOUSEITEMMAS SET TOTALAMT='$AMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$NO'";
							if (!mysql_query($sql2)) {
								return 'Wrong index';
							}
						}
					}
					else {
						return 'Wrong amount format';
					}
				}
			}
			return 'Success';
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
			if (in_array($fetch1['AUTHORITY'], array('B', 'C', 'D'))) {
				$matureDay = ($fetch1['AUTHORITY'] == 'C') ? 14 : 33;
				$location = AuthToLocation($fetch1['AUTHORITY']);
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$location' AND ITEMCLASS='F' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$processedITEMNO = substr($ITEMNO, 0, -9);
					$TOTALAMT = $fetch2['TOTALAMT'];
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						if (substr($processedITEMNO, 0, 2) == 'ss') {
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT='0', ACTCODE='0', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$ITEMNO'");
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$TOTALAMT', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$processedITEMNO'");
							$content .= $TOTALAMT . ' 克 ' . $fetch2['ITEMNM'] . ' 已熟成。<br>';
						}
						else {
							$content .= $TOTALAMT . ' 克 ' . $fetch2['ITEMNM'] . ' 已熟成，請至產品切皂/切絲頁面進行切皂。<br>';
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
			else {
				return 'No notice';
			}
		}
	}
}

function mature_search($account, $token) {
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
			if (in_array($fetch1['AUTHORITY'], array('B', 'C', 'D'))) {
				$matureDay = ($fetch1['AUTHORITY'] == 'C') ? 14 : 33;
				$location = AuthToLocation($fetch1['AUTHORITY']);
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$location' AND ITEMCLASS='F' AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$processedITEMNO = substr($fetch2['ITEMNO'], 0, -9);
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						if (substr($processedITEMNO, 0, 2) == 'sp') {
							$content .= '<table><tr><th colspan="5">'.$fetch2['ITEMNM'].' '.$fetch2['TOTALAMT'].' g</th></tr><tr><td>100g</td><td><input type="number" min="0" value="'.($fetch2['TOTALAMT']/100).'" id="'.$fetch2['ITEMNO'].'_100g">個</td><td><button onclick="cut(\''.$fetch2['ITEMNO'].'\', '.$fetch2['TOTALAMT'].')">確定</button></td></tr></table>';
						}
					}
				}
			}
			if (empty($content)) {
				return array('message' => 'Success', 'content' => '沒有待切割的皂');
			}
			else {
				return array('message' => 'Success', 'content' => $content);
			}
		}
	}
}

function cut($account, $token, $itemno, $_100g) {
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
			if (in_array($fetch1['AUTHORITY'], array('B', 'C', 'D'))) {
				$matureDay = ($fetch1['AUTHORITY'] == 'C') ? 14 : 33;
				$location = AuthToLocation($fetch1['AUTHORITY']);
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$location' AND ITEMNO='$itemno' AND ITEMCLASS='F' AND ACTCODE='1'");
				if ($sql2 == false) {
					return 'Unregistered item';
				}
				else {
					$fetch2 = mysql_fetch_array($sql2);
					$processedITEMNO = substr($itemno, 0, -9);
					$difference = (strtotime($date) - strtotime($fetch2['UPDATEDATE'])) / (60 * 60 * 24);
					if ($difference >= $matureDay) {
						if ($_100g * 100 > $fetch2['TOTALAMT']) {
							return 'Output enceed ingredient';
						}
						else {
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT='0', ACTCODE='0', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$itemno'");
							$item_100 = $processedITEMNO . '_100';
							mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$_100g', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$item_100'");
							return 'Success';
						}
					}
					else {
						return 'Unmatured item';
					}
				}
			}
		}
	}
}

function slice_search($account, $token, $slice) {
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
	elseif (!in_array($slice, array('ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6'))) {
		return 'Unregistered item';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMNO='$slice'");
			$fetch2 = mysql_fetch_array($sql2);
			$content = '<table><tr><td>切絲品項</td><td>現有存量</td><td>原料重量</td><td>產品重量</td></tr><tr><td>'.query_name($slice).'</td><td>'.$fetch2['TOTALAMT'].'</td><td><input type="text" id="slice_ingredient"></td><td><input type="text" id="slice_result"></td></tr></table><button onclick="slice()">確定切絲</button>';
			return array('message' => 'Success', 'content' => $content);
		}
	}
}

function slice($account, $token, $slice, $ingredient, $result) {
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
	elseif (!in_array($slice, array('ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6'))) {
		return 'Unregistered item';
	}
	else {
		$fetch1 = mysql_fetch_array($sql1);
		if ($fetch1['TOKEN'] != md5($account.$token)) {
			return 'Wrong token';
		}
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ITEMNO='$slice'");
			$fetch2 = mysql_fetch_array($sql2);
			if ($ingredient > $fetch2['TOTALAMT']) {
				return 'Ingredient enceed inventory';
			}
			elseif ($result > $ingredient) {
				return 'Output enceed ingredient';
			}
			elseif (!is_positiveInt($ingredient) || !is_positiveInt($result)) {
				return 'Wrong amount format';
			}
			else {
				if (in_array($slice, array('ss_1', 'ss_2'))) {
					$id = 'slice_ss_1';
				}
				elseif (in_array($slice, array('ss_3', 'ss_4'))) {
					$id = 'slice_ss_2';
				}
				elseif (in_array($slice, array('ss_5', 'ss_6'))) {
					$id = 'slice_ss_3';
				}
				date_default_timezone_set('Asia/Taipei');
				$date = date("Y-m-d H:i:s");
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$ingredient', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$slice'");
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$result', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$id'");
				return 'Success';
			}
		}
	}
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
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
	$query = mysql_query("SELECT TOTALAMT FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$item' AND ACTCODE='1'");
	if ($query == false) {
		return 0;
	}
	else {
		$fetch = mysql_fetch_row($query);
		return $fetch[0];
	}
}

function query_name($itemno) {
	$sql = mysql_query("SELECT ITEMNM FROM ITEMMAS WHERE ITEMNO='$itemno'");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}

function AuthToLocation($auth) {
	if ($auth == 'A') return 'Trisoap';
	elseif ($auth == 'B') return 'Beitou';
	elseif ($auth == 'C') return 'Houshanpi';
	elseif ($auth == 'D') return 'Taitung';
	elseif ($auth == 'E') return 'Intern';
}