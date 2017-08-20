<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'item') {
		if ($_GET['event'] == 'search') {
			$message = search($_GET);
			if (is_array($message)) {
				$querySearchTable = querySearchTable($message['ingredient'], $message['authority']);
				echo json_encode(array('message' => 'Success', 'query' => $querySearchTable));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'produce') {
			$message = produce($_GET);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_GET['event'] == 'package') {
			$message = package($_GET);
			if (is_array($message)) {
				$queryPackageTable = queryPackageTable($message);
				echo json_encode(array('message' => 'Success', 'query' => $queryPackageTable));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_GET['event'] == 'pack') {
			$message = packing($_GET);
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
	if ($_POST['module'] == 'item') {
		if ($_POST['event'] == 'search') {
			$message = search($_POST);
			if (is_array($message)) {
				$querySearchTable = querySearchTable($message['ingredient'], $message['authority']);
				echo json_encode(array('message' => 'Success', 'query' => $querySearchTable));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'produce') {
			$message = produce($_POST);
			echo json_encode(array('message' => $message));
			return;
		}
		elseif ($_POST['event'] == 'package') {
			$message = package($_POST);
			if (is_array($message)) {
				$queryPackageTable = queryPackageTable($message);
				echo json_encode(array('message' => 'Success', 'query' => $queryPackageTable));
				return;
			}
			else {
				echo json_encode(array('message' => $message));
				return;
			}
		}
		elseif ($_POST['event'] == 'pack') {
			$message = packing($_POST);
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

function search($content) {
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
		else {
			$ingredient = array('oil_1' => 0, 'oil_2' => 0, 'oil_3' => 0, 'oil_4' => 0, 'oil_5' => 0, 'oil_6' => 0, 'oil_7' => 0, 'oil_8' => 0, 'oil_9' => 0, 'additive_1' => 0, 'additive_2' => 0, 'additive_3' => 0, 'additive_4' => 0, 'additive_5' => 0, 'additive_6' => 0, 'additive_7' => 0, 'additive_8' => 0, 'additive_9' => 0, 'additive_10' => 0, 'NaOH' => 0);
			if (is_nonnegativeInt($content['sp_1'])) {
				$ingredient['oil_1'] += 360 * $content['sp_1'];
				$ingredient['oil_2'] += 160 * $content['sp_1'];
				$ingredient['oil_3'] += 120 * $content['sp_1'];
				$ingredient['oil_4'] += 80 * $content['sp_1'];
				$ingredient['oil_9'] += 80 * $content['sp_1'];
				$ingredient['additive_4'] += 5 * $content['sp_1'];
				$ingredient['additive_5'] += 5 * $content['sp_1'];
				$ingredient['additive_6'] += 5 * $content['sp_1'];
				$ingredient['NaOH'] += 108 * $content['sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_2'])) {
				$ingredient['oil_1'] += 425 * $content['sp_2'];
				$ingredient['oil_2'] += 170 * $content['sp_2'];
				$ingredient['oil_3'] += 170 * $content['sp_2'];
				$ingredient['oil_9'] += 85 * $content['sp_2'];
				$ingredient['additive_1'] += 5 * $content['sp_2'];
				$ingredient['NaOH'] += 118 * $content['sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_3'])) {
				$ingredient['oil_1'] += 280 * $content['sp_3'];
				$ingredient['oil_2'] += 160 * $content['sp_3'];
				$ingredient['oil_3'] += 200 * $content['sp_3'];
				$ingredient['oil_6'] += 80 * $content['sp_3'];
				$ingredient['oil_9'] += 80 * $content['sp_3'];
				$ingredient['additive_2'] += 5 * $content['sp_3'];
				$ingredient['additive_3'] += 60 * $content['sp_3'];
				$ingredient['NaOH'] += 112 * $content['sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (is_nonnegativeInt($content['ss_1'])) {
					$ingredient['oil_2'] += 150 * $content['ss_1'];
					$ingredient['oil_3'] += 225 * $content['ss_1'];
					$ingredient['oil_4'] += 150 * $content['ss_1'];
					$ingredient['oil_7'] += 75 * $content['ss_1'];
					$ingredient['oil_8'] += 150 * $content['ss_1'];
					$ingredient['additive_10'] += 6 * $content['ss_1'];
					$ingredient['NaOH'] += 107 * $content['ss_1'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_2'])) {
					$ingredient['oil_2'] += 150 * $content['ss_2'];
					$ingredient['oil_3'] += 225 * $content['ss_2'];
					$ingredient['oil_4'] += 150 * $content['ss_2'];
					$ingredient['oil_7'] += 75 * $content['ss_2'];
					$ingredient['oil_8'] += 150 * $content['ss_2'];
					$ingredient['additive_9'] += 15 * $content['ss_2'];
					$ingredient['NaOH'] += 107 * $content['ss_2'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_3'])) {
					$ingredient['oil_1'] += 337.5 * $content['ss_3'];
					$ingredient['oil_2'] += 150 * $content['ss_3'];
					$ingredient['oil_3'] += 187.5 * $content['ss_3'];
					$ingredient['oil_6'] += 75 * $content['ss_3'];
					$ingredient['additive_8'] += 6 * $content['ss_3'];
					$ingredient['NaOH'] += 106 * $content['ss_3'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_4'])) {
					$ingredient['oil_1'] += 300 * $content['ss_4'];
					$ingredient['oil_2'] += 112.5 * $content['ss_4'];
					$ingredient['oil_3'] += 112.5 * $content['ss_4'];
					$ingredient['oil_4'] += 150 * $content['ss_4'];
					$ingredient['oil_9'] += 75 * $content['ss_4'];
					$ingredient['additive_7'] += 6 * $content['ss_4'];
					$ingredient['NaOH'] += 101 * $content['ss_4'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_5'])) {
					$ingredient['oil_1'] += 300 * $content['ss_5'];
					$ingredient['oil_2'] += 112.5 * $content['ss_5'];
					$ingredient['oil_3'] += 112.5 * $content['ss_5'];
					$ingredient['oil_4'] += 150 * $content['ss_5'];
					$ingredient['oil_5'] += 5 * $content['ss_5'];
					$ingredient['additive_7'] += 6 * $content['ss_5'];
					$ingredient['NaOH'] += 101 * $content['ss_5'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_6'])) {
					$ingredient['oil_1'] += 337.5 * $content['ss_6'];
					$ingredient['oil_2'] += 150 * $content['ss_6'];
					$ingredient['oil_3'] += 187.5 * $content['ss_6'];
					$ingredient['oil_6'] += 75 * $content['ss_6'];
					$ingredient['additive_5'] += 5 * $content['ss_6'];
					$ingredient['NaOH'] += 106 * $content['ss_6'];
				}
				else {
					return 'Wrong input format';
				}
			}
			$ingredient['oil_1'] = ceil($ingredient['oil_1']);
			$ingredient['oil_2'] = ceil($ingredient['oil_2']);
			$ingredient['oil_3'] = ceil($ingredient['oil_3']);
			return array('ingredient' => $ingredient, 'authority' => $fetch1['AUTHORITY']);
		}
	}
}

function produce($content) {
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
		elseif ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
			return 'No authority';
		}
		else {
			$ingredient = array('oil_1' => 0, 'oil_2' => 0, 'oil_3' => 0, 'oil_4' => 0, 'oil_5' => 0, 'oil_6' => 0, 'oil_7' => 0, 'oil_8' => 0, 'oil_9' => 0, 'additive_1' => 0, 'additive_2' => 0, 'additive_3' => 0, 'additive_4' => 0, 'additive_5' => 0, 'additive_6' => 0, 'additive_7' => 0, 'additive_8' => 0, 'additive_9' => 0, 'additive_10' => 0, 'NaOH' => 0);
			if (is_nonnegativeInt($content['sp_1'])) {
				$ingredient['oil_1'] += 360 * $content['sp_1'];
				$ingredient['oil_2'] += 160 * $content['sp_1'];
				$ingredient['oil_3'] += 120 * $content['sp_1'];
				$ingredient['oil_4'] += 80 * $content['sp_1'];
				$ingredient['oil_9'] += 80 * $content['sp_1'];
				$ingredient['additive_4'] += 5 * $content['sp_1'];
				$ingredient['additive_5'] += 5 * $content['sp_1'];
				$ingredient['additive_6'] += 5 * $content['sp_1'];
				$ingredient['NaOH'] += 108 * $content['sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_2'])) {
				$ingredient['oil_1'] += 425 * $content['sp_2'];
				$ingredient['oil_2'] += 170 * $content['sp_2'];
				$ingredient['oil_3'] += 170 * $content['sp_2'];
				$ingredient['oil_9'] += 85 * $content['sp_2'];
				$ingredient['additive_1'] += 5 * $content['sp_2'];
				$ingredient['NaOH'] += 118 * $content['sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_3'])) {
				$ingredient['oil_1'] += 280 * $content['sp_3'];
				$ingredient['oil_2'] += 160 * $content['sp_3'];
				$ingredient['oil_3'] += 200 * $content['sp_3'];
				$ingredient['oil_6'] += 80 * $content['sp_3'];
				$ingredient['oil_9'] += 80 * $content['sp_3'];
				$ingredient['additive_2'] += 5 * $content['sp_3'];
				$ingredient['additive_3'] += 60 * $content['sp_3'];
				$ingredient['NaOH'] += 112 * $content['sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (is_nonnegativeInt($content['ss_1'])) {
					$ingredient['oil_2'] += 150 * $content['ss_1'];
					$ingredient['oil_3'] += 225 * $content['ss_1'];
					$ingredient['oil_4'] += 150 * $content['ss_1'];
					$ingredient['oil_7'] += 75 * $content['ss_1'];
					$ingredient['oil_8'] += 150 * $content['ss_1'];
					$ingredient['additive_10'] += 6 * $content['ss_1'];
					$ingredient['NaOH'] += 107 * $content['ss_1'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_2'])) {
					$ingredient['oil_2'] += 150 * $content['ss_2'];
					$ingredient['oil_3'] += 225 * $content['ss_2'];
					$ingredient['oil_4'] += 150 * $content['ss_2'];
					$ingredient['oil_7'] += 75 * $content['ss_2'];
					$ingredient['oil_8'] += 150 * $content['ss_2'];
					$ingredient['additive_9'] += 15 * $content['ss_2'];
					$ingredient['NaOH'] += 107 * $content['ss_2'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_3'])) {
					$ingredient['oil_1'] += 337.5 * $content['ss_3'];
					$ingredient['oil_2'] += 150 * $content['ss_3'];
					$ingredient['oil_3'] += 187.5 * $content['ss_3'];
					$ingredient['oil_6'] += 75 * $content['ss_3'];
					$ingredient['additive_8'] += 6 * $content['ss_3'];
					$ingredient['NaOH'] += 106 * $content['ss_3'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_4'])) {
					$ingredient['oil_1'] += 300 * $content['ss_4'];
					$ingredient['oil_2'] += 112.5 * $content['ss_4'];
					$ingredient['oil_3'] += 112.5 * $content['ss_4'];
					$ingredient['oil_4'] += 150 * $content['ss_4'];
					$ingredient['oil_9'] += 75 * $content['ss_4'];
					$ingredient['additive_7'] += 6 * $content['ss_4'];
					$ingredient['NaOH'] += 101 * $content['ss_4'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_5'])) {
					$ingredient['oil_1'] += 300 * $content['ss_5'];
					$ingredient['oil_2'] += 112.5 * $content['ss_5'];
					$ingredient['oil_3'] += 112.5 * $content['ss_5'];
					$ingredient['oil_4'] += 150 * $content['ss_5'];
					$ingredient['oil_5'] += 5 * $content['ss_5'];
					$ingredient['additive_7'] += 6 * $content['ss_5'];
					$ingredient['NaOH'] += 101 * $content['ss_5'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_6'])) {
					$ingredient['oil_1'] += 337.5 * $content['ss_6'];
					$ingredient['oil_2'] += 150 * $content['ss_6'];
					$ingredient['oil_3'] += 187.5 * $content['ss_6'];
					$ingredient['oil_6'] += 75 * $content['ss_6'];
					$ingredient['additive_5'] += 5 * $content['ss_6'];
					$ingredient['NaOH'] += 106 * $content['ss_6'];
				}
				else {
					return 'Wrong input format';
				}
			}
			$ingredient['oil_1'] = ceil($ingredient['oil_1']);
			$ingredient['oil_2'] = ceil($ingredient['oil_2']);
			$ingredient['oil_3'] = ceil($ingredient['oil_3']);
			if ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
				$message = '';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						$message .= $ITEMNM . "存量不足\n";
					}
				}
				if (empty($message)) {
					ingredient_to_product($ingredient, $content, 'Beitou');
					return 'Success';
				}
				else {
					return $message;
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Houshanpi' AND ITEMCLASS='B' AND ACTCODE='1'");
				$message = '';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						$message .= $ITEMNM . "存量不足\n";
					}
				}
				if (empty($message)) {
					ingredient_to_product($ingredient, $content, 'Houshanpi');
					return 'Success';
				}
				else {
					return $message;
				}
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
				$message = '';
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						$message .= $ITEMNM . "存量不足\n";
					}
				}
				if (empty($message)) {
					ingredient_to_product($ingredient, $content, 'Taitung');
					return 'Success';
				}
				else {
					return $message;
				}
			}
		}
	}
}

function package($content) {
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
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_1' => 0, 'sp_2' => 0, 'sp_3' => 0, 'ss_1' => 0, 'ss_2' => 0, 'ss_3' => 0, 'ss_4' => 0, 'ss_5' => 0, 'ss_6' => 0, 'package_1' => 0, 'package_2' => 0, 'package_3' => 0, 'package_4' => 0, 'package_5' => 0, 'package_6' => 0, 'package_7' => 0, 'package_8' => 0, 'package_9' => 0, 'moon_package_1' => 0, 'moon_package_2' => 0, 'moon_package_3' => 0, 'moon_package_4' => 0, 'moon_package_5' => 0, 'product_sp_1' => 0, 'product_sp_2' => 0, 'product_sp_3' => 0, 'product_ss_1' => 0, 'product_ss_2' => 0, 'product_ss_3' => 0);
			if (is_nonnegativeInt($content['product_sp_1'])) {
				$ingredient['sp_1'] += $content['product_sp_1'];
				$ingredient['package_6'] += $content['product_sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_2'])) {
				$ingredient['sp_2'] += $content['product_sp_2'];
				$ingredient['package_7'] += $content['product_sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_3'])) {
				$ingredient['sp_3'] += $content['product_sp_3'];
				$ingredient['package_8'] += $content['product_sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$sp_1_type1 = $content['sp_1_type1'];
				$sp_2_type1 = $content['sp_2_type1'];
				$sp_3_type1 = $content['sp_3_type1'];
				$sp_1_type2 = $content['sp_1_type2'];
				$sp_2_type2 = $content['sp_2_type2'];
				$sp_3_type2 = $content['sp_3_type2'];
				if (!is_nonnegativeInt($sp_1_type1) || !is_nonnegativeInt($sp_2_type1) || !is_nonnegativeInt($sp_3_type1) || !is_nonnegativeInt($sp_1_type2) || !is_nonnegativeInt($sp_2_type2) || !is_nonnegativeInt($sp_3_type2)) {
					return 'Wrong input format';
				}
				elseif ($sp_1_type1 + $sp_1_type2 != $content['product_sp_box']){
					return 'Wrong sp_1 series amount';
				}
				elseif ($sp_2_type1 + $sp_2_type2 != $content['product_sp_box']){
					return 'Wrong sp_2 series amount';
				}
				elseif ($sp_3_type1 + $sp_3_type2 != $content['product_sp_box']){
					return 'Wrong sp_3 series amount';
				}
				else {
					$ingredient['sp_1'] += $sp_1_type1;
					$ingredient['sp_2'] += $sp_2_type1;
					$ingredient['sp_3'] += $sp_3_type1;
					$ingredient['package_6'] += $sp_1_type1;
					$ingredient['package_7'] += $sp_2_type1;
					$ingredient['package_8'] += $sp_3_type1;
					$ingredient['product_sp_1'] += $sp_1_type2;
					$ingredient['product_sp_2'] += $sp_2_type2;
					$ingredient['product_sp_3'] += $sp_3_type2;
					$ingredient['package_3'] += $content['product_sp_box'];
					$ingredient['package_5'] += $content['product_sp_box'];
					$ingredient['package_9'] += $content['product_sp_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_1'])) {
				$ingredient['ss_1'] += 5 * $content['product_ss_1'];
				$ingredient['ss_2'] += 5 * $content['product_ss_1'];
				$ingredient['package_1'] += $content['product_ss_1'];
				$ingredient['package_2'] += $content['product_ss_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_2'])) {
				$ingredient['ss_3'] += 5 * $content['product_ss_2'];
				$ingredient['ss_6'] += 5 * $content['product_ss_2'];
				$ingredient['package_1'] += $content['product_ss_2'];
				$ingredient['package_2'] += $content['product_ss_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_3'])) {
				$ingredient['ss_4'] += 5 * $content['product_ss_3'];
				$ingredient['ss_5'] += 5 * $content['product_ss_3'];
				$ingredient['package_1'] += $content['product_ss_3'];
				$ingredient['package_2'] += $content['product_ss_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ss_1_type1 = $content['ss_1_type1'];
				$ss_2_type1 = $content['ss_2_type1'];
				$ss_3_type1 = $content['ss_3_type1'];
				if (!is_nonnegativeInt($ss_1_type1) || !is_nonnegativeInt($ss_2_type1) || !is_nonnegativeInt($ss_3_type1)) {
					return 'Wrong input format';
				}
				elseif ($ss_1_type1 + $ss_2_type1 + $ss_3_type1 != $content['product_ss_box'] * 6){
					return 'Wrong ss series amount';
				}
				else {
					$ingredient['product_ss_1'] += $ss_1_type1;
					$ingredient['product_ss_2'] += $ss_2_type1;
					$ingredient['product_ss_3'] += $ss_3_type1;
					$ingredient['package_4'] += $content['product_ss_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_1'])) {
				$ingredient['sp_1'] += $content['moon_box_1'];
				$ingredient['sp_2'] += $content['moon_box_1'];
				$ingredient['sp_3'] += $content['moon_box_1'];
				$ingredient['package_6'] += 2 * $content['moon_box_1'];
				$ingredient['package_7'] += 2 * $content['moon_box_1'];
				$ingredient['package_8'] += 2 * $content['moon_box_1'];
				$ingredient['moon_package_1'] += $content['moon_box_1'];
				$ingredient['moon_package_3'] += $content['moon_box_1'];
				$ingredient['moon_package_4'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_1'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_2'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_3'] += 2 * $content['moon_box_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_2'])) {
				$ingredient['sp_1'] += $content['moon_box_2'];
				$ingredient['sp_2'] += $content['moon_box_2'];
				$ingredient['sp_3'] += $content['moon_box_2'];
				$ingredient['package_6'] += 2 * $content['moon_box_2'];
				$ingredient['package_7'] += 2 * $content['moon_box_2'];
				$ingredient['package_8'] += 2 * $content['moon_box_2'];
				$ingredient['moon_package_2'] += $content['moon_box_2'];
				$ingredient['moon_package_3'] += $content['moon_box_2'];
				$ingredient['moon_package_4'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_1'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_2'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_3'] += 2 * $content['moon_box_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_3'])) {
				$ingredient['product_sp_1'] += $content['moon_box_3'];
				$ingredient['package_5'] += $content['moon_box_3'];
				$ingredient['package_9'] += $content['moon_box_3'];
				$ingredient['moon_package_5'] += $content['moon_box_3'];
				$ingredient['product_ss_1'] += $content['moon_box_3'];
				$ingredient['product_ss_2'] += $content['moon_box_3'];
				$ingredient['product_ss_3'] += $content['moon_box_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_4'])) {
				$ingredient['product_sp_2'] += $content['moon_box_4'];
				$ingredient['package_5'] += $content['moon_box_4'];
				$ingredient['package_9'] += $content['moon_box_4'];
				$ingredient['moon_package_5'] += $content['moon_box_4'];
				$ingredient['product_ss_1'] += $content['moon_box_4'];
				$ingredient['product_ss_2'] += $content['moon_box_4'];
				$ingredient['product_ss_3'] += $content['moon_box_4'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_5'])) {
				$ingredient['product_sp_3'] += $content['moon_box_5'];
				$ingredient['package_5'] += $content['moon_box_5'];
				$ingredient['package_9'] += $content['moon_box_5'];
				$ingredient['moon_package_5'] += $content['moon_box_5'];
				$ingredient['product_ss_1'] += $content['moon_box_5'];
				$ingredient['product_ss_2'] += $content['moon_box_5'];
				$ingredient['product_ss_3'] += $content['moon_box_5'];
			}
			else {
				return 'Wrong input format';
			}
			return $ingredient;
		}
	}
}

function packing($content) {
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
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_1' => 0, 'sp_2' => 0, 'sp_3' => 0, 'ss_1' => 0, 'ss_2' => 0, 'ss_3' => 0, 'ss_4' => 0, 'ss_5' => 0, 'ss_6' => 0, 'package_1' => 0, 'package_2' => 0, 'package_3' => 0, 'package_4' => 0, 'package_5' => 0, 'package_6' => 0, 'package_7' => 0, 'package_8' => 0, 'package_9' => 0, 'moon_package_1' => 0, 'moon_package_2' => 0, 'moon_package_3' => 0, 'moon_package_4' => 0, 'moon_package_5' => 0, 'product_sp_1' => 0, 'product_sp_2' => 0, 'product_sp_3' => 0, 'product_ss_1' => 0, 'product_ss_2' => 0, 'product_ss_3' => 0);
			if (is_nonnegativeInt($content['product_sp_1'])) {
				$ingredient['sp_1'] += $content['product_sp_1'];
				$ingredient['package_6'] += $content['product_sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_2'])) {
				$ingredient['sp_2'] += $content['product_sp_2'];
				$ingredient['package_7'] += $content['product_sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_3'])) {
				$ingredient['sp_3'] += $content['product_sp_3'];
				$ingredient['package_8'] += $content['product_sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$sp_1_type1 = $content['sp_1_type1'];
				$sp_2_type1 = $content['sp_2_type1'];
				$sp_3_type1 = $content['sp_3_type1'];
				$sp_1_type2 = $content['sp_1_type2'];
				$sp_2_type2 = $content['sp_2_type2'];
				$sp_3_type2 = $content['sp_3_type2'];
				if (!is_nonnegativeInt($sp_1_type1) || !is_nonnegativeInt($sp_2_type1) || !is_nonnegativeInt($sp_3_type1) || !is_nonnegativeInt($sp_1_type2) || !is_nonnegativeInt($sp_2_type2) || !is_nonnegativeInt($sp_3_type2)) {
					return 'Wrong input format';
				}
				elseif ($sp_1_type1 + $sp_1_type2 != $content['product_sp_box']){
					return 'Wrong sp_1 series amount';
				}
				elseif ($sp_2_type1 + $sp_2_type2 != $content['product_sp_box']){
					return 'Wrong sp_2 series amount';
				}
				elseif ($sp_3_type1 + $sp_3_type2 != $content['product_sp_box']){
					return 'Wrong sp_3 series amount';
				}
				else {
					$ingredient['sp_1'] += $sp_1_type1;
					$ingredient['sp_2'] += $sp_2_type1;
					$ingredient['sp_3'] += $sp_3_type1;
					$ingredient['package_6'] += $sp_1_type1;
					$ingredient['package_7'] += $sp_2_type1;
					$ingredient['package_8'] += $sp_3_type1;
					$ingredient['product_sp_1'] += $sp_1_type2;
					$ingredient['product_sp_2'] += $sp_2_type2;
					$ingredient['product_sp_3'] += $sp_3_type2;
					$ingredient['package_3'] += $content['product_sp_box'];
					$ingredient['package_5'] += $content['product_sp_box'];
					$ingredient['package_9'] += $content['product_sp_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_1'])) {
				$ingredient['ss_1'] += 5 * $content['product_ss_1'];
				$ingredient['ss_2'] += 5 * $content['product_ss_1'];
				$ingredient['package_1'] += $content['product_ss_1'];
				$ingredient['package_2'] += $content['product_ss_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_2'])) {
				$ingredient['ss_3'] += 5 * $content['product_ss_2'];
				$ingredient['ss_6'] += 5 * $content['product_ss_2'];
				$ingredient['package_1'] += $content['product_ss_2'];
				$ingredient['package_2'] += $content['product_ss_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_3'])) {
				$ingredient['ss_4'] += 5 * $content['product_ss_3'];
				$ingredient['ss_5'] += 5 * $content['product_ss_3'];
				$ingredient['package_1'] += $content['product_ss_3'];
				$ingredient['package_2'] += $content['product_ss_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ss_1_type1 = $content['ss_1_type1'];
				$ss_2_type1 = $content['ss_2_type1'];
				$ss_3_type1 = $content['ss_3_type1'];
				if (!is_nonnegativeInt($ss_1_type1) || !is_nonnegativeInt($ss_2_type1) || !is_nonnegativeInt($ss_3_type1)) {
					return 'Wrong input format';
				}
				elseif ($ss_1_type1 + $ss_2_type1 + $ss_3_type1 != $content['product_ss_box'] * 6){
					return 'Wrong ss series amount';
				}
				else {
					$ingredient['product_ss_1'] += $ss_1_type1;
					$ingredient['product_ss_2'] += $ss_2_type1;
					$ingredient['product_ss_3'] += $ss_3_type1;
					$ingredient['package_4'] += $content['product_ss_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_1'])) {
				$ingredient['sp_1'] += $content['moon_box_1'];
				$ingredient['sp_2'] += $content['moon_box_1'];
				$ingredient['sp_3'] += $content['moon_box_1'];
				$ingredient['package_6'] += 2 * $content['moon_box_1'];
				$ingredient['package_7'] += 2 * $content['moon_box_1'];
				$ingredient['package_8'] += 2 * $content['moon_box_1'];
				$ingredient['moon_package_1'] += $content['moon_box_1'];
				$ingredient['moon_package_3'] += $content['moon_box_1'];
				$ingredient['moon_package_4'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_1'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_2'] += 2 * $content['moon_box_1'];
				$ingredient['product_ss_3'] += 2 * $content['moon_box_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_2'])) {
				$ingredient['sp_1'] += $content['moon_box_2'];
				$ingredient['sp_2'] += $content['moon_box_2'];
				$ingredient['sp_3'] += $content['moon_box_2'];
				$ingredient['package_6'] += 2 * $content['moon_box_2'];
				$ingredient['package_7'] += 2 * $content['moon_box_2'];
				$ingredient['package_8'] += 2 * $content['moon_box_2'];
				$ingredient['moon_package_2'] += $content['moon_box_2'];
				$ingredient['moon_package_3'] += $content['moon_box_2'];
				$ingredient['moon_package_4'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_1'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_2'] += 2 * $content['moon_box_2'];
				$ingredient['product_ss_3'] += 2 * $content['moon_box_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_3'])) {
				$ingredient['product_sp_1'] += $content['moon_box_3'];
				$ingredient['package_5'] += $content['moon_box_3'];
				$ingredient['package_9'] += $content['moon_box_3'];
				$ingredient['moon_package_5'] += $content['moon_box_3'];
				$ingredient['product_ss_1'] += $content['moon_box_3'];
				$ingredient['product_ss_2'] += $content['moon_box_3'];
				$ingredient['product_ss_3'] += $content['moon_box_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_4'])) {
				$ingredient['product_sp_2'] += $content['moon_box_4'];
				$ingredient['package_5'] += $content['moon_box_4'];
				$ingredient['package_9'] += $content['moon_box_4'];
				$ingredient['moon_package_5'] += $content['moon_box_4'];
				$ingredient['product_ss_1'] += $content['moon_box_4'];
				$ingredient['product_ss_2'] += $content['moon_box_4'];
				$ingredient['product_ss_3'] += $content['moon_box_4'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['moon_box_5'])) {
				$ingredient['product_sp_3'] += $content['moon_box_5'];
				$ingredient['package_5'] += $content['moon_box_5'];
				$ingredient['package_9'] += $content['moon_box_5'];
				$ingredient['moon_package_5'] += $content['moon_box_5'];
				$ingredient['product_ss_1'] += $content['moon_box_5'];
				$ingredient['product_ss_2'] += $content['moon_box_5'];
				$ingredient['product_ss_3'] += $content['moon_box_5'];
			}
			else {
				return 'Wrong input format';
			}
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ACTCODE='1'");
			$message = '';
			while ($fetch2 = mysql_fetch_array($sql2)) {
				if (in_array($fetch2['ITEMNO'], array('sp_1', 'sp_2', 'sp_3', 'ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6', 'package_1', 'package_2', 'package_3', 'package_4', 'package_5', 'package_6', 'package_7', 'package_8', 'package_9', 'moon_package_1', 'moon_package_2', 'moon_package_3', 'moon_package_4', 'moon_package_5', 'product_sp_1', 'product_sp_2', 'product_sp_3', 'product_ss_1', 'product_ss_2', 'product_ss_3'))) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						$message .= $ITEMNM . "存量不足\n";
					}
				}
			}
			if (empty($message)) {
				package_to_product($ingredient, $content);
				return 'Success';
			}
			else {
				return $message;
			}
		}
	}
}

function querySearchTable($query, $authority) {
	if ($authority == 'A' || $authority == 'E') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>北投庫存數量(g)</th><th>台東庫存數量(g)</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Beitou', 'oil_1').'</td><td>'.inventory('Taitung', 'oil_1').'</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Beitou', 'oil_2').'</td><td>'.inventory('Taitung', 'oil_2').'</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Beitou', 'oil_3').'</td><td>'.inventory('Taitung', 'oil_3').'</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Beitou', 'oil_4').'</td><td>'.inventory('Taitung', 'oil_4').'</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Beitou', 'oil_5').'</td><td>'.inventory('Taitung', 'oil_5').'</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Beitou', 'oil_6').'</td><td>'.inventory('Taitung', 'oil_6').'</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Beitou', 'oil_7').'</td><td>'.inventory('Taitung', 'oil_7').'</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Beitou', 'oil_8').'</td><td>'.inventory('Taitung', 'oil_8').'</td></tr>';
		if ($query['oil_9'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['oil_9'].'</td><td>'.inventory('Beitou', 'oil_9').'</td><td>'.inventory('Taitung', 'oil_9').'</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>鹼</td><td>'.$query['NaOH'].'</td><td>'.inventory('Beitou', 'NaOH').'</td><td>'.inventory('Taitung', 'NaOH').'</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Beitou', 'additive_1').'</td><td>'.inventory('Taitung', 'additive_1').'</td></tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Beitou', 'additive_2').'</td><td>'.inventory('Taitung', 'additive_2').'</td></tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Beitou', 'additive_3').'</td><td>'.inventory('Taitung', 'additive_3').'</td></tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Beitou', 'additive_4').'</td><td>'.inventory('Taitung', 'additive_4').'</td></tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Beitou', 'additive_5').'</td><td>'.inventory('Taitung', 'additive_5').'</td></tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Beitou', 'additive_6').'</td><td>'.inventory('Taitung', 'additive_6').'</td></tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Beitou', 'additive_7').'</td><td>'.inventory('Taitung', 'additive_7').'</td></tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Beitou', 'additive_8').'</td><td>'.inventory('Taitung', 'additive_8').'</td></tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Beitou', 'additive_9').'</td><td>'.inventory('Taitung', 'additive_9').'</td></tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Beitou', 'additive_10').'</td><td>'.inventory('Taitung', 'additive_10').'</td></tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'B') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Beitou', 'oil_1').'</td>'.compare($query['oil_1'], inventory('Beitou', 'oil_1')).'</tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Beitou', 'oil_2').'</td>'.compare($query['oil_2'], inventory('Beitou', 'oil_2')).'</tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Beitou', 'oil_3').'</td>'.compare($query['oil_3'], inventory('Beitou', 'oil_3')).'</tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Beitou', 'oil_4').'</td>'.compare($query['oil_4'], inventory('Beitou', 'oil_4')).'</tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Beitou', 'oil_5').'</td>'.compare($query['oil_5'], inventory('Beitou', 'oil_5')).'</tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Beitou', 'oil_6').'</td>'.compare($query['oil_6'], inventory('Beitou', 'oil_6')).'</tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Beitou', 'oil_7').'</td>'.compare($query['oil_7'], inventory('Beitou', 'oil_7')).'</tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Beitou', 'oil_8').'</td>'.compare($query['oil_8'], inventory('Beitou', 'oil_8')).'</tr>';
		if ($query['oil_9'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['oil_9'].'</td><td>'.inventory('Beitou', 'oil_9').'</td>'.compare($query['oil_9'], inventory('Beitou', 'oil_9')).'</tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>鹼</td><td>'.$query['NaOH'].'</td><td>'.inventory('Beitou', 'NaOH').'</td>'.compare($query['NaOH'], inventory('Beitou', 'NaOH')).'</tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Beitou', 'additive_1').'</td>'.compare($query['additive_1'], inventory('Beitou', 'additive_1')).'</tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Beitou', 'additive_2').'</td>'.compare($query['additive_2'], inventory('Beitou', 'additive_2')).'</tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Beitou', 'additive_3').'</td>'.compare($query['additive_3'], inventory('Beitou', 'additive_3')).'</tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Beitou', 'additive_4').'</td>'.compare($query['additive_4'], inventory('Beitou', 'additive_4')).'</tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Beitou', 'additive_5').'</td>'.compare($query['additive_5'], inventory('Beitou', 'additive_5')).'</tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Beitou', 'additive_6').'</td>'.compare($query['additive_6'], inventory('Beitou', 'additive_6')).'</tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Beitou', 'additive_7').'</td>'.compare($query['additive_7'], inventory('Beitou', 'additive_7')).'</tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Beitou', 'additive_8').'</td>'.compare($query['additive_8'], inventory('Beitou', 'additive_8')).'</tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Beitou', 'additive_9').'</td>'.compare($query['additive_9'], inventory('Beitou', 'additive_9')).'</tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Beitou', 'additive_10').'</td>'.compare($query['additive_10'], inventory('Beitou', 'additive_10')).'</tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'C') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>Infinite</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>Infinite</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>Infinite</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>Infinite</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>Infinite</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>Infinite</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>Infinite</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>Infinite</td></tr>';
		if ($query['oil_9'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['oil_9'].'</td><td>Infinite</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>鹼</td><td>'.$query['NaOH'].'</td><td>Infinite</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Houshanpi', 'additive_1').'</td>'.compare($query['additive_1'], inventory('Houshanpi', 'additive_1')).'</tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Houshanpi', 'additive_2').'</td>'.compare($query['additive_2'], inventory('Houshanpi', 'additive_2')).'</tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Houshanpi', 'additive_3').'</td>'.compare($query['additive_3'], inventory('Houshanpi', 'additive_3')).'</tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Houshanpi', 'additive_4').'</td>'.compare($query['additive_4'], inventory('Houshanpi', 'additive_4')).'</tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Houshanpi', 'additive_5').'</td>'.compare($query['additive_5'], inventory('Houshanpi', 'additive_5')).'</tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Houshanpi', 'additive_6').'</td>'.compare($query['additive_6'], inventory('Houshanpi', 'additive_6')).'</tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Houshanpi', 'additive_7').'</td>'.compare($query['additive_7'], inventory('Houshanpi', 'additive_7')).'</tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Houshanpi', 'additive_8').'</td>'.compare($query['additive_8'], inventory('Houshanpi', 'additive_8')).'</tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Houshanpi', 'additive_9').'</td>'.compare($query['additive_9'], inventory('Houshanpi', 'additive_9')).'</tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Houshanpi', 'additive_10').'</td>'.compare($query['additive_10'], inventory('Houshanpi', 'additive_10')).'</tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'D') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Taitung', 'oil_1').'</td>'.compare($query['oil_1'], inventory('Taitung', 'oil_1')).'</tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Taitung', 'oil_2').'</td>'.compare($query['oil_2'], inventory('Taitung', 'oil_2')).'</tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Taitung', 'oil_3').'</td>'.compare($query['oil_3'], inventory('Taitung', 'oil_3')).'</tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Taitung', 'oil_4').'</td>'.compare($query['oil_4'], inventory('Taitung', 'oil_4')).'</tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Taitung', 'oil_5').'</td>'.compare($query['oil_5'], inventory('Taitung', 'oil_5')).'</tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Taitung', 'oil_6').'</td>'.compare($query['oil_6'], inventory('Taitung', 'oil_6')).'</tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Taitung', 'oil_7').'</td>'.compare($query['oil_7'], inventory('Taitung', 'oil_7')).'</tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Taitung', 'oil_8').'</td>'.compare($query['oil_8'], inventory('Taitung', 'oil_8')).'</tr>';
		if ($query['oil_9'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['oil_9'].'</td><td>'.inventory('Taitung', 'oil_9').'</td>'.compare($query['oil_9'], inventory('Taitung', 'oil_9')).'</tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>鹼</td><td>'.$query['NaOH'].'</td><td>'.inventory('Taitung', 'NaOH').'</td>'.compare($query['NaOH'], inventory('Taitung', 'NaOH')).'</tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Taitung', 'additive_1').'</td>'.compare($query['additive_1'], inventory('Taitung', 'additive_1')).'</tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Taitung', 'additive_2').'</td>'.compare($query['additive_2'], inventory('Taitung', 'additive_2')).'</tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Taitung', 'additive_3').'</td>'.compare($query['additive_3'], inventory('Taitung', 'additive_3')).'</tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Taitung', 'additive_4').'</td>'.compare($query['additive_4'], inventory('Taitung', 'additive_4')).'</tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Taitung', 'additive_5').'</td>'.compare($query['additive_5'], inventory('Taitung', 'additive_5')).'</tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Taitung', 'additive_6').'</td>'.compare($query['additive_6'], inventory('Taitung', 'additive_6')).'</tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Taitung', 'additive_7').'</td>'.compare($query['additive_7'], inventory('Taitung', 'additive_7')).'</tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Taitung', 'additive_8').'</td>'.compare($query['additive_8'], inventory('Taitung', 'additive_8')).'</tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Taitung', 'additive_9').'</td>'.compare($query['additive_9'], inventory('Taitung', 'additive_9')).'</tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Taitung', 'additive_10').'</td>'.compare($query['additive_10'], inventory('Taitung', 'additive_10')).'</tr>';
		$queryResult .= '</table>';
	}
	return $queryResult;
}

function queryPackageTable($query) {
	$queryResult = '<table><tr><th>原料</th><th>所需數量</th><th>庫存數量</th></tr>';
	if ($query['sp_1'] != 0) $queryResult .= '<tr><td>米皂</td><td>'.$query['sp_1'].'</td><td>'.inventory('Beitou', 'sp_1').'</td>'.compare($query['sp_1'], inventory('Beitou', 'sp_1')).'</tr>';
	if ($query['sp_2'] != 0) $queryResult .= '<tr><td>金針皂</td><td>'.$query['sp_2'].'</td><td>'.inventory('Beitou', 'sp_2').'</td>'.compare($query['sp_2'], inventory('Beitou', 'sp_2')).'</tr>';
	if ($query['sp_3'] != 0) $queryResult .= '<tr><td>釋迦皂</td><td>'.$query['sp_3'].'</td><td>'.inventory('Beitou', 'sp_3').'</td>'.compare($query['sp_3'], inventory('Beitou', 'sp_3')).'</tr>';
	if ($query['ss_1'] != 0) $queryResult .= '<tr><td>洛神皂絲</td><td>'.$query['ss_1'].'</td><td>'.inventory('Beitou', 'ss_1').'</td>'.compare($query['ss_1'], inventory('Beitou', 'ss_1')).'</tr>';
	if ($query['ss_2'] != 0) $queryResult .= '<tr><td>紅麴皂絲</td><td>'.$query['ss_2'].'</td><td>'.inventory('Beitou', 'ss_2').'</td>'.compare($query['ss_2'], inventory('Beitou', 'ss_2')).'</tr>';
	if ($query['ss_3'] != 0) $queryResult .= '<tr><td>薑黃皂絲</td><td>'.$query['ss_3'].'</td><td>'.inventory('Beitou', 'ss_3').'</td>'.compare($query['ss_3'], inventory('Beitou', 'ss_3')).'</tr>';
	if ($query['ss_4'] != 0) $queryResult .= '<tr><td>金針皂絲</td><td>'.$query['ss_4'].'</td><td>'.inventory('Beitou', 'ss_4').'</td>'.compare($query['ss_4'], inventory('Beitou', 'ss_4')).'</tr>';
	if ($query['ss_5'] != 0) $queryResult .= '<tr><td>紅棕梠皂絲</td><td>'.$query['ss_5'].'</td><td>'.inventory('Beitou', 'ss_5').'</td>'.compare($query['ss_5'], inventory('Beitou', 'ss_5')).'</tr>';
	if ($query['ss_6'] != 0) $queryResult .= '<tr><td>蕁麻葉皂絲</td><td>'.$query['ss_6'].'</td><td>'.inventory('Beitou', 'ss_6').'</td>'.compare($query['ss_6'], inventory('Beitou', 'ss_6')).'</tr>';
	if ($query['package_1'] != 0) $queryResult .= '<tr><td>不織布包</td><td>'.$query['package_1'].'</td><td>'.inventory('Beitou', 'package_1').'</td>'.compare($query['package_1'], inventory('Beitou', 'package_1')).'</tr>';
	if ($query['package_2'] != 0) $queryResult .= '<tr><td>鋁包</td><td>'.$query['package_2'].'</td><td>'.inventory('Beitou', 'package_2').'</td>'.compare($query['package_2'], inventory('Beitou', 'package_2')).'</tr>';
	if ($query['package_3'] != 0) $queryResult .= '<tr><td>大禮盒封套</td><td>'.$query['package_3'].'</td><td>'.inventory('Beitou', 'package_3').'</td>'.compare($query['package_3'], inventory('Beitou', 'package_3')).'</tr>';
	if ($query['package_4'] != 0) $queryResult .= '<tr><td>小禮盒</td><td>'.$query['package_4'].'</td><td>'.inventory('Beitou', 'package_4').'</td>'.compare($query['package_4'], inventory('Beitou', 'package_4')).'</tr>';
	if ($query['package_5'] != 0) $queryResult .= '<tr><td>內襯</td><td>'.$query['package_5'].'</td><td>'.inventory('Beitou', 'package_5').'</td>'.compare($query['package_5'], inventory('Beitou', 'package_5')).'</tr>';
	if ($query['package_6'] != 0) $queryResult .= '<tr><td>米皂外盒</td><td>'.$query['package_6'].'</td><td>'.inventory('Beitou', 'package_6').'</td>'.compare($query['package_6'], inventory('Beitou', 'package_6')).'</tr>';
	if ($query['package_7'] != 0) $queryResult .= '<tr><td>金針皂外盒</td><td>'.$query['package_7'].'</td><td>'.inventory('Beitou', 'package_7').'</td>'.compare($query['package_7'], inventory('Beitou', 'package_7')).'</tr>';
	if ($query['package_8'] != 0) $queryResult .= '<tr><td>釋迦皂外盒</td><td>'.$query['package_8'].'</td><td>'.inventory('Beitou', 'package_8').'</td>'.compare($query['package_8'], inventory('Beitou', 'package_8')).'</tr>';
	if ($query['package_9'] != 0) $queryResult .= '<tr><td>大禮盒內盒</td><td>'.$query['package_9'].'</td><td>'.inventory('Beitou', 'package_9').'</td>'.compare($query['package_9'], inventory('Beitou', 'package_9')).'</tr>';
	if ($query['moon_package_1'] != 0) $queryResult .= '<tr><td>中秋大禮盒上蓋(兔子)</td><td>'.$query['moon_package_1'].'</td><td>'.inventory('Beitou', 'moon_package_1').'</td>'.compare($query['moon_package_1'], inventory('Beitou', 'moon_package_1')).'</tr>';
	if ($query['moon_package_2'] != 0) $queryResult .= '<tr><td>中秋大禮盒上蓋(熱氣球)</td><td>'.$query['moon_package_2'].'</td><td>'.inventory('Beitou', 'moon_package_2').'</td>'.compare($query['moon_package_2'], inventory('Beitou', 'moon_package_2')).'</tr>';
	if ($query['moon_package_3'] != 0) $queryResult .= '<tr><td>中秋大禮盒底座</td><td>'.$query['moon_package_3'].'</td><td>'.inventory('Beitou', 'moon_package_3').'</td>'.compare($query['moon_package_3'], inventory('Beitou', 'moon_package_3')).'</tr>';
	if ($query['moon_package_4'] != 0) $queryResult .= '<tr><td>中秋大禮盒內襯</td><td>'.$query['moon_package_4'].'</td><td>'.inventory('Beitou', 'moon_package_4').'</td>'.compare($query['moon_package_4'], inventory('Beitou', 'moon_package_4')).'</tr>';
	if ($query['moon_package_5'] != 0) $queryResult .= '<tr><td>中秋小禮盒封套</td><td>'.$query['moon_package_5'].'</td><td>'.inventory('Beitou', 'moon_package_5').'</td>'.compare($query['moon_package_5'], inventory('Beitou', 'moon_package_5')).'</tr>';
	if ($query['product_sp_1'] != 0) $queryResult .= '<tr><td>田靜山巒禾風皂</td><td>'.$query['product_sp_1'].'</td><td>'.inventory('Beitou', 'product_sp_1').'</td>'.compare($query['product_sp_1'], inventory('Beitou', 'product_sp_1')).'</tr>';
	if ($query['product_sp_2'] != 0) $queryResult .= '<tr><td>金絲森林渲染皂</td><td>'.$query['product_sp_2'].'</td><td>'.inventory('Beitou', 'product_sp_2').'</td>'.compare($query['product_sp_2'], inventory('Beitou', 'product_sp_2')).'</tr>';
	if ($query['product_sp_3'] != 0) $queryResult .= '<tr><td>釋迦手感果力皂</td><td>'.$query['product_sp_3'].'</td><td>'.inventory('Beitou', 'product_sp_3').'</td>'.compare($query['product_sp_3'], inventory('Beitou', 'product_sp_3')).'</tr>';
	if ($query['product_ss_1'] != 0) $queryResult .= '<tr><td>洛神紅麴旅用皂絲</td><td>'.$query['product_ss_1'].'</td><td>'.inventory('Beitou', 'product_ss_1').'</td>'.compare($query['product_ss_1'], inventory('Beitou', 'product_ss_1')).'</tr>';
	if ($query['product_ss_2'] != 0) $queryResult .= '<tr><td>暖暖薑黃旅用皂絲</td><td>'.$query['product_ss_2'].'</td><td>'.inventory('Beitou', 'product_ss_2').'</td>'.compare($query['product_ss_2'], inventory('Beitou', 'product_ss_2')).'</tr>';
	if ($query['product_ss_3'] != 0) $queryResult .= '<tr><td>萱草米黃旅用皂絲</td><td>'.$query['product_ss_3'].'</td><td>'.inventory('Beitou', 'product_ss_3').'</td>'.compare($query['product_ss_3'], inventory('Beitou', 'product_ss_3')).'</tr>';
	$queryResult .= '</table>';
	return $queryResult;
}

function ingredient_to_product($ingredient, $product, $whouse) {
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	$today = date("Ymd");
	if ($whouse == 'Beitou' || $whouse == 'Taitung') {
		$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
		while ($fetch1 = mysql_fetch_array($sql1)) {
			$ITEMNO = $fetch1['ITEMNO'];
			$ITEMNM = $fetch1['ITEMNM'];
			$amount = $ingredient[$ITEMNO];
			if ($amount > 0) {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_1'])) {
			$ITEMNO = 'sp_1_' . $today;
			$ITEMNM = $today . '的米皂';
			$amount = $product['sp_1'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_2'])) {
			$ITEMNO = 'sp_2_' . $today;
			$ITEMNM = $today . '的金針皂';
			$amount = $product['sp_2'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_3'])) {
			$ITEMNO = 'sp_3_' . $today;
			$ITEMNM = $today . '的釋迦皂';
			$amount = $product['sp_3'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_1'])) {
			$ITEMNO = 'ss_1_' . $today;
			$ITEMNM = $today . '的洛神皂絲';
			$amount = $product['ss_1'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_2'])) {
			$ITEMNO = 'ss_2_' . $today;
			$ITEMNM = $today . '的紅麴皂絲';
			$amount = $product['ss_2'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_3'])) {
			$ITEMNO = 'ss_3_' . $today;
			$ITEMNM = $today . '的薑黃皂絲';
			$amount = $product['ss_3'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_4'])) {
			$ITEMNO = 'ss_4_' . $today;
			$ITEMNM = $today . '的蕁麻葉皂絲';
			$amount = $product['ss_4'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_5'])) {
			$ITEMNO = 'ss_5_' . $today;
			$ITEMNM = $today . '的金針皂絲';
			$amount = $product['ss_5'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['ss_6'])) {
			$ITEMNO = 'ss_6_' . $today;
			$ITEMNM = $today . '的紅棕梠皂絲';
			$amount = $product['ss_6'] * 1000;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
	}
	elseif ($whouse = 'Houshanpi') {
		$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMCLASS='B' AND ACTCODE='1'");
		while ($fetch1 = mysql_fetch_array($sql1)) {
			$ITEMNO = $fetch1['ITEMNO'];
			$ITEMNM = $fetch1['ITEMNM'];
			$amount = $ingredient[$ITEMNO];
			if ($amount > 0) {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_1'])) {
			$ITEMNO = 'sp_1_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的米皂';
			$amount = $product['sp_1'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_2'])) {
			$ITEMNO = 'sp_2_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的金針皂';
			$amount = $product['sp_2'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		if (is_positiveInt($product['sp_3'])) {
			$ITEMNO = 'sp_3_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的釋迦皂';
			$amount = $product['sp_3'] * 10;
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			if (mysql_num_rows($sql2) == 0) {
				mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
			}
			else {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
	}
}

function package_to_product($package, $product) {
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	$today = date("Ymd");
	$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ACTCODE='1'");
	while ($fetch1 = mysql_fetch_array($sql1)) {
		if (in_array($fetch1['ITEMNO'], array('sp_1', 'sp_2', 'sp_3', 'ss_1', 'ss_2', 'ss_3', 'ss_4', 'ss_5', 'ss_6', 'package_1', 'package_2', 'package_3', 'package_4', 'package_5', 'package_6', 'package_7', 'package_8', 'package_9', 'moon_package_1', 'moon_package_2', 'moon_package_3', 'moon_package_4', 'moon_package_5', 'product_sp_1', 'product_sp_2', 'product_sp_3', 'product_ss_1', 'product_ss_2', 'product_ss_3'))) {
			$ITEMNO = $fetch1['ITEMNO'];
			$ITEMNM = $fetch1['ITEMNM'];
			$amount = $package[$ITEMNO];
			if ($amount > 0) {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
			}
		}
	}
	if (is_positiveInt($product['product_sp_1'])) {
		$ITEMNO = 'product_sp_1';
		$amount = $product['product_sp_1'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_sp_2'])) {
		$ITEMNO = 'product_sp_2';
		$amount = $product['product_sp_2'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_sp_3'])) {
		$ITEMNO = 'product_sp_3';
		$amount = $product['product_sp_3'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_sp_box'])) {
		$ITEMNO = 'product_sp_box';
		$amount = $product['product_sp_box'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_ss_1'])) {
		$ITEMNO = 'product_ss_1';
		$amount = $product['product_ss_1'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_ss_2'])) {
		$ITEMNO = 'product_ss_2';
		$amount = $product['product_ss_2'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_ss_3'])) {
		$ITEMNO = 'product_ss_3';
		$amount = $product['product_ss_3'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['product_ss_box'])) {
		$ITEMNO = 'product_ss_box';
		$amount = $product['product_ss_box'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['moon_box_1'])) {
		$ITEMNO = 'moon_box_1';
		$amount = $product['moon_box_1'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['moon_box_2'])) {
		$ITEMNO = 'moon_box_2';
		$amount = $product['moon_box_2'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['moon_box_3'])) {
		$ITEMNO = 'moon_box_3';
		$amount = $product['moon_box_3'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['moon_box_4'])) {
		$ITEMNO = 'moon_box_4';
		$amount = $product['moon_box_4'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($product['moon_box_5'])) {
		$ITEMNO = 'moon_box_5';
		$amount = $product['moon_box_5'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
}

function compare($need, $inventory) {
	if ($inventory < $need) {
		return '<td style="color: red; font-weight: bold;">存量不足！</td>';
	}
	else {
		return '';
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

function is_nonnegativeInt($value) {
	if ((ceil($value) == floor($value)) && $value >= 0) {
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