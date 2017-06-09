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
						$content .= ('<tr><td>'.transfer($fetch2['WHOUSENO']).'</td><td>'.$fetch2['ITEMNM'].'</td><td>'.$fetch2['TOTALAMT'].'</td></tr>');
					}
					$content .= '</table>';
					return array('message' => 'Success', 'content' => $content);
				}
			}
		}
	}
}

function adjust_search($account, $token, $whouseno) {
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
		elseif ($fetch1['AUTHORITY'] != 'A') {
			return 'No authority';
		}
		else {
			if ($whouseno = 'Beitou') {
				$content = ?>
				<table>
					<tr>
						<td>
							<table>
								<tr><th colspan="2">油品</th></tr>
								<tr><td>橄欖油</td><td><input type="text" id="adjust_oil_1" value=""></td></tr>
								<tr><td>棕梠油</td><td><input type="text" id="adjust_oil_2" value=""></td></tr>
								<tr><td>椰子油</td><td><input type="text" id="adjust_oil_3" value=""></td></tr>
								<tr><td>米糠油</td><td><input type="text" id="adjust_oil_4" value=""></td></tr>
								<tr><td>紅棕梠油</td><td><input type="text" id="adjust_oil_5" value=""></td></tr>
								<tr><td>葡萄籽油</td><td><input type="text" id="adjust_oil_6" value=""></td></tr>
								<tr><td>苦茶油</td><td><input type="text" id="adjust_oil_7" value=""></td></tr>
								<tr><td>蓖麻油</td><td><input type="text" id="adjust_oil_8" value=""></td></tr>
								<tr><td>鹼</td><td><input type="text" id="adjust_NaOH" value=""></td></tr>
							</table>
						</td>
						<td>
							<table>
								<tr><th colspan="2">添加物</th></tr>
								<tr><td>金針花瓣</td><td><input type="text" id="adjust_additive_1" value=""></td></tr>
								<tr><td>釋迦果粉</td><td><input type="text" id="adjust_additive_2" value=""></td></tr>
								<tr><td>釋迦果泥</td><td><input type="text" id="adjust_additive_3" value=""></td></tr>
								<tr><td>米粉</td><td><input type="text" id="adjust_additive_4" value=""></td></tr>
								<tr><td>蕁麻葉粉</td><td><input type="text" id="adjust_additive_5" value=""></td></tr>
								<tr><td>金盞花粉</td><td><input type="text" id="adjust_additive_6" value=""></td></tr>
								<tr><td>金針花粉</td><td><input type="text" id="adjust_additive_7" value=""></td></tr>
								<tr><td>薑黃粉</td><td><input type="text" id="adjust_additive_8" value=""></td></tr>
								<tr><td>紅麴粉</td><td><input type="text" id="adjust_additive_9" value=""></td></tr>
								<tr><td>洛神花粉</td><td><input type="text" id="adjust_additive_10" value=""></td></tr>
								<tr><td>乳油木果脂</td><td><input type="text" id="adjust_additive_11" value=""></td></tr>
							</table>
						</td>
						<td>
							<table>
								<th colspan="2">包裝</th>
								<tr><td>不織布包</td><td><input type="text" id="adjust_package_1" value=""></td></tr>
								<tr><td>鋁包</td><td><input type="text" id="adjust_package_2" value=""></td></tr>
								<tr><td>大禮盒</td><td><input type="text" id="adjust_package_3" value=""></td></tr>
								<tr><td>小禮盒</td><td><input type="text" id="adjust_package_4" value=""></td></tr>
								<tr><td>內襯</td><td><input type="text" id="adjust_package_5" value=""></td></tr>
								<tr><td>單顆皂外盒</td><td><input type="text" id="adjust_package_6" value=""></td></tr>
							</table>
						</td>
						<td>
							<table>
								<th colspan="2">商品</th>
								<tr><td>田靜山巒禾風皂</td><td><input type="text" id="adjust_product_sp_1" value=""></td></tr>
								<tr><td>金絲森林渲染皂</td><td><input type="text" id="adjust_product_sp_2" value=""></td></tr>
								<tr><td>釋迦手感果力皂</td><td><input type="text" id="adjust_product_sp_3" value=""></td></tr>
								<tr><td>三三台東意象禮盒組</td><td><input type="text" id="adjust_product_sp_box" value=""></td></tr>
								<tr><td>洛神紅麴旅用皂絲</td><td><input type="text" id="adjust_product_ss_1" value=""></td></tr>
								<tr><td>暖暖薑黃旅用皂絲</td><td><input type="text" id="adjust_product_ss_2" value=""></td></tr>
								<tr><td>萱草米黃旅用皂絲</td><td><input type="text" id="adjust_product_ss_3" value=""></td></tr>
								<tr><td>三三台東意象皂絲旅行組</td><td><input type="text" id="adjust_product_ss_box" value=""></td></tr>
							</table>
						</td>
						<td>
							<table>
								<th colspan="2">產品</th>
								<tr><td>米皂</td><td><input type="text" id="adjust_sp_1" value=""></td></tr>
								<tr><td>金針皂</td><td><input type="text" id="adjust_sp_2" value=""></td></tr>
								<tr><td>釋迦皂</td><td><input type="text" id="adjust_sp_3" value=""></td></tr>
								<tr><td>洛神皂絲</td><td><input type="text" id="adjust_ss_1" value=""></td></tr>
								<tr><td>紅麴皂絲</td><td><input type="text" id="adjust_ss_2" value=""></td></tr>
								<tr><td>薑黃皂絲</td><td><input type="text" id="adjust_ss_3" value=""></td></tr>
								<tr><td>金針皂絲</td><td><input type="text" id="adjust_ss_4" value=""></td></tr>
								<tr><td>紅棕梠皂絲</td><td><input type="text" id="adjust_ss_5" value=""></td></tr>
								<tr><td>蕁麻葉皂絲</td><td><input type="text" id="adjust_ss_6" value=""></td></tr>
							</table>
						</td>
						<td>
							<table>
								<th colspan="2">半成品</th>
							</table>
						</td>
						<td>
							<table>
								<th colspan="2">後山埤的產品</th>
								<tr><td>後山埤的米皂</td><td><input type="text" id="adjust_houshanpi_sp_1" value=""></td></tr>
								<tr><td>後山埤的金針皂</td><td><input type="text" id="adjust_houshanpi_sp_2" value=""></td></tr>
								<tr><td>後山埤的釋迦皂</td><td><input type="text" id="adjust_houshanpi_sp_3" value=""></td></tr>
							</table>
						</td>
					</tr>
				</table>
			}
			elseif ($whouseno = 'Houshanpi') {

			}
			elseif ($whouseno = 'Taitung') {

			}
			else {
				return 'Wrong warehouse number';
			}
		}
}

function transfer($whouseno) {
	if ($whouseno == 'Beitou') return '北投';
	elseif ($whouseno == 'Houshanpi') return '後山埤';
	elseif ($whouseno == 'Taitung') return '台東';
	else return 'Unknown';
}