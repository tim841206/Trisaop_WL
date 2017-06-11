<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'item') {
		if ($_GET['event'] == 'search') {
			$message = search($_GET);
			if (is_array($message)) {
				$queryResultTable = queryResultTable($message['ingredient'], $message['authority']);
				echo json_encode(array('message' => 'Success', 'query' => $queryResultTable));
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
				echo json_encode(array('message' => 'Success', 'sp_1' => $message['sp_1'], 'sp_2' => $message['sp_2'], 'sp_3' => $message['sp_3'], 'ss_1' => $message['ss_1'], 'ss_2' => $message['ss_2'], 'ss_3' => $message['ss_3'], 'ss_4' => $message['ss_4'], 'ss_5' => $message['ss_5'], 'ss_6' => $message['ss_6'], 'package_1' => $message['package_1'], 'package_2' => $message['package_2'], 'package_3' => $message['package_3'], 'package_4' => $message['package_4'], 'package_5' => $message['package_5'], 'package_6' => $message['package_6']));
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
				$queryResultTable = queryResultTable($message['ingredient'], $message['authority']);
				echo json_encode(array('message' => 'Success', 'query' => $queryResultTable));
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
				echo json_encode(array('message' => 'Success', 'sp_1' => $message['sp_1'], 'sp_2' => $message['sp_2'], 'sp_3' => $message['sp_3'], 'ss_1' => $message['ss_1'], 'ss_2' => $message['ss_2'], 'ss_3' => $message['ss_3'], 'ss_4' => $message['ss_4'], 'ss_5' => $message['ss_5'], 'ss_6' => $message['ss_6'], 'package_1' => $message['package_1'], 'package_2' => $message['package_2'], 'package_3' => $message['package_3'], 'package_4' => $message['package_4'], 'package_5' => $message['package_5'], 'package_6' => $message['package_6']));
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
			$ingredient = array('oil_1' => 0, 'oil_2' => 0, 'oil_3' => 0, 'oil_4' => 0, 'oil_5' => 0, 'oil_6' => 0, 'oil_7' => 0, 'oil_8' => 0, 'additive_1' => 0, 'additive_2' => 0, 'additive_3' => 0, 'additive_4' => 0, 'additive_5' => 0, 'additive_6' => 0, 'additive_7' => 0, 'additive_8' => 0, 'additive_9' => 0, 'additive_10' => 0, 'additive_11' => 0, 'NaOH' => 0);
			if (is_nonnegativeInt($content['sp_1'])) {
				$ingredient['oil_1'] += 360 / 0.9 * $content['sp_1'];
				$ingredient['oil_2'] += 160 / 0.9 * $content['sp_1'];
				$ingredient['oil_3'] += 120 / 0.9 * $content['sp_1'];
				$ingredient['oil_4'] += 80 / 0.9 * $content['sp_1'];
				$ingredient['additive_4'] += 5 * $content['sp_1'];
				$ingredient['additive_5'] += 5 * $content['sp_1'];
				$ingredient['additive_6'] += 5 * $content['sp_1'];
				$ingredient['additive_11'] += 80 * $content['sp_1'];
				$ingredient['NaOH'] += 108 * $content['sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_2'])) {
				$ingredient['oil_1'] += 425 / 0.9 * $content['sp_2'];
				$ingredient['oil_2'] += 170 / 0.9 * $content['sp_2'];
				$ingredient['oil_3'] += 170 / 0.9 * $content['sp_2'];
				$ingredient['additive_1'] += 5 * $content['sp_2'];
				$ingredient['additive_11'] += 85 * $content['sp_2'];
				$ingredient['NaOH'] += 118 * $content['sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_3'])) {
				$ingredient['oil_1'] += 280 / 0.9 * $content['sp_3'];
				$ingredient['oil_2'] += 160 / 0.9 * $content['sp_3'];
				$ingredient['oil_3'] += 200 / 0.9 * $content['sp_3'];
				$ingredient['oil_6'] += 80 / 0.9 * $content['sp_3'];
				$ingredient['additive_2'] += 5 * $content['sp_3'];
				$ingredient['additive_3'] += 60 * $content['sp_3'];
				$ingredient['additive_11'] += 80 * $content['sp_3'];
				$ingredient['NaOH'] += 112 * $content['sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (is_nonnegativeInt($content['ss_1'])) {
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['oil_3'] += 225 / 0.9 * $content['ss_1'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['oil_7'] += 75 / 0.9 * $content['ss_1'];
					$ingredient['oil_8'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['additive_10'] += 6 * $content['ss_1'];
					$ingredient['NaOH'] += 107 * $content['ss_1'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_2'])) {
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['oil_3'] += 225 / 0.9 * $content['ss_2'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['oil_7'] += 75 / 0.9 * $content['ss_2'];
					$ingredient['oil_8'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['additive_9'] += 15 * $content['ss_2'];
					$ingredient['NaOH'] += 107 * $content['ss_2'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_3'])) {
					$ingredient['oil_1'] += 337.5 / 0.9 * $content['ss_3'];
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_3'];
					$ingredient['oil_3'] += 187.5 / 0.9 * $content['ss_3'];
					$ingredient['oil_6'] += 75 / 0.9 * $content['ss_3'];
					$ingredient['additive_8'] += 6 * $content['ss_3'];
					$ingredient['NaOH'] += 106 * $content['ss_3'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_4'])) {
					$ingredient['oil_1'] += 300 / 0.9 * $content['ss_4'];
					$ingredient['oil_2'] += 112.5 / 0.9 * $content['ss_4'];
					$ingredient['oil_3'] += 112.5 / 0.9 * $content['ss_4'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_4'];
					$ingredient['additive_7'] += 6 * $content['ss_4'];
					$ingredient['additive_11'] += 75 * $content['ss_4'];
					$ingredient['NaOH'] += 101 * $content['ss_4'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_5'])) {
					$ingredient['oil_1'] += 300 / 0.9 * $content['ss_5'];
					$ingredient['oil_2'] += 112.5 / 0.9 * $content['ss_5'];
					$ingredient['oil_3'] += 112.5 / 0.9 * $content['ss_5'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_5'];
					$ingredient['oil_5'] += 5 / 0.9 * $content['ss_5'];
					$ingredient['additive_7'] += 6 * $content['ss_5'];
					$ingredient['NaOH'] += 101 * $content['ss_5'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_6'])) {
					$ingredient['oil_1'] += 337.5 / 0.9 * $content['ss_6'];
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_6'];
					$ingredient['oil_3'] += 187.5 / 0.9 * $content['ss_6'];
					$ingredient['oil_6'] += 75 / 0.9 * $content['ss_6'];
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
			$ingredient['oil_4'] = ceil($ingredient['oil_4']);
			$ingredient['oil_5'] = ceil($ingredient['oil_5']);
			$ingredient['oil_6'] = ceil($ingredient['oil_6']);
			$ingredient['oil_7'] = ceil($ingredient['oil_7']);
			$ingredient['oil_8'] = ceil($ingredient['oil_8']);
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
		elseif ($fetch1['AUTHORITY'] == 'A' || $fetch1['AUTHORITY'] == 'E') {
			return 'No authority';
		}
		else {
			$ingredient = array('oil_1' => 0, 'oil_2' => 0, 'oil_3' => 0, 'oil_4' => 0, 'oil_5' => 0, 'oil_6' => 0, 'oil_7' => 0, 'oil_8' => 0, 'additive_1' => 0, 'additive_2' => 0, 'additive_3' => 0, 'additive_4' => 0, 'additive_5' => 0, 'additive_6' => 0, 'additive_7' => 0, 'additive_8' => 0, 'additive_9' => 0, 'additive_10' => 0, 'additive_11' => 0, 'NaOH' => 0);
			if (is_nonnegativeInt($content['sp_1'])) {
				$ingredient['oil_1'] += 360 / 0.9 * $content['sp_1'];
				$ingredient['oil_2'] += 160 / 0.9 * $content['sp_1'];
				$ingredient['oil_3'] += 120 / 0.9 * $content['sp_1'];
				$ingredient['oil_4'] += 80 / 0.9 * $content['sp_1'];
				$ingredient['additive_4'] += 5 * $content['sp_1'];
				$ingredient['additive_5'] += 5 * $content['sp_1'];
				$ingredient['additive_6'] += 5 * $content['sp_1'];
				$ingredient['additive_11'] += 80 * $content['sp_1'];
				$ingredient['NaOH'] += 108 * $content['sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_2'])) {
				$ingredient['oil_1'] += 425 / 0.9 * $content['sp_2'];
				$ingredient['oil_2'] += 170 / 0.9 * $content['sp_2'];
				$ingredient['oil_3'] += 170 / 0.9 * $content['sp_2'];
				$ingredient['additive_1'] += 5 * $content['sp_2'];
				$ingredient['additive_11'] += 85 * $content['sp_2'];
				$ingredient['NaOH'] += 118 * $content['sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['sp_3'])) {
				$ingredient['oil_1'] += 280 / 0.9 * $content['sp_3'];
				$ingredient['oil_2'] += 160 / 0.9 * $content['sp_3'];
				$ingredient['oil_3'] += 200 / 0.9 * $content['sp_3'];
				$ingredient['oil_6'] += 80 / 0.9 * $content['sp_3'];
				$ingredient['additive_2'] += 5 * $content['sp_3'];
				$ingredient['additive_3'] += 60 * $content['sp_3'];
				$ingredient['additive_11'] += 80 * $content['sp_3'];
				$ingredient['NaOH'] += 112 * $content['sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (is_nonnegativeInt($content['ss_1'])) {
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['oil_3'] += 225 / 0.9 * $content['ss_1'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['oil_7'] += 75 / 0.9 * $content['ss_1'];
					$ingredient['oil_8'] += 150 / 0.9 * $content['ss_1'];
					$ingredient['additive_10'] += 6 * $content['ss_1'];
					$ingredient['NaOH'] += 107 * $content['ss_1'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_2'])) {
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['oil_3'] += 225 / 0.9 * $content['ss_2'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['oil_7'] += 75 / 0.9 * $content['ss_2'];
					$ingredient['oil_8'] += 150 / 0.9 * $content['ss_2'];
					$ingredient['additive_9'] += 15 * $content['ss_2'];
					$ingredient['NaOH'] += 107 * $content['ss_2'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_3'])) {
					$ingredient['oil_1'] += 337.5 / 0.9 * $content['ss_3'];
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_3'];
					$ingredient['oil_3'] += 187.5 / 0.9 * $content['ss_3'];
					$ingredient['oil_6'] += 75 / 0.9 * $content['ss_3'];
					$ingredient['additive_8'] += 6 * $content['ss_3'];
					$ingredient['NaOH'] += 106 * $content['ss_3'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_4'])) {
					$ingredient['oil_1'] += 300 / 0.9 * $content['ss_4'];
					$ingredient['oil_2'] += 112.5 / 0.9 * $content['ss_4'];
					$ingredient['oil_3'] += 112.5 / 0.9 * $content['ss_4'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_4'];
					$ingredient['additive_7'] += 6 * $content['ss_4'];
					$ingredient['additive_11'] += 75 * $content['ss_4'];
					$ingredient['NaOH'] += 101 * $content['ss_4'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_5'])) {
					$ingredient['oil_1'] += 300 / 0.9 * $content['ss_5'];
					$ingredient['oil_2'] += 112.5 / 0.9 * $content['ss_5'];
					$ingredient['oil_3'] += 112.5 / 0.9 * $content['ss_5'];
					$ingredient['oil_4'] += 150 / 0.9 * $content['ss_5'];
					$ingredient['oil_5'] += 5 / 0.9 * $content['ss_5'];
					$ingredient['additive_7'] += 6 * $content['ss_5'];
					$ingredient['NaOH'] += 101 * $content['ss_5'];
				}
				else {
					return 'Wrong input format';
				}
				if (is_nonnegativeInt($content['ss_6'])) {
					$ingredient['oil_1'] += 337.5 / 0.9 * $content['ss_6'];
					$ingredient['oil_2'] += 150 / 0.9 * $content['ss_6'];
					$ingredient['oil_3'] += 187.5 / 0.9 * $content['ss_6'];
					$ingredient['oil_6'] += 75 / 0.9 * $content['ss_6'];
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
			$ingredient['oil_4'] = ceil($ingredient['oil_4']);
			$ingredient['oil_5'] = ceil($ingredient['oil_5']);
			$ingredient['oil_6'] = ceil($ingredient['oil_6']);
			$ingredient['oil_7'] = ceil($ingredient['oil_7']);
			$ingredient['oil_8'] = ceil($ingredient['oil_8']);
			if ($fetch1['AUTHORITY'] == 'B') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						return 'Not enough' . $ITEMNM;
					}
				}
				ingredient_to_product($ingredient, $content, 'Beitou');
				return 'Success';
			}
			elseif ($fetch1['AUTHORITY'] == 'C') {
				ingredient_to_product($ingredient, $content, 'Houshanpi');
				return 'Success';
			}
			elseif ($fetch1['AUTHORITY'] == 'D') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Taitung' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
				while ($fetch2 = mysql_fetch_array($sql2)) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						return 'Not enough' . $ITEMNM;
					}
				}
				ingredient_to_product($ingredient, $content, 'Taitung');
				return 'Success';
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
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_1' => 0, 'sp_2' => 0, 'sp_3' => 0, 'ss_1' => 0, 'ss_2' => 0, 'ss_3' => 0, 'ss_4' => 0, 'ss_5' => 0, 'ss_6' => 0, 'package_1' => 0, 'package_2' => 0, 'package_3' => 0, 'package_4' => 0, 'package_5' => 0, 'package_6' => 0);
			if (is_nonnegativeInt($content['product_sp_1'])) {
				$ingredient['sp_1'] += $content['product_sp_1'];
				$ingredient['package_6'] += $content['product_sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_2'])) {
				$ingredient['sp_2'] += $content['product_sp_2'];
				$ingredient['package_6'] += $content['product_sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_3'])) {
				$ingredient['sp_3'] += $content['product_sp_3'];
				$ingredient['package_6'] += $content['product_sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$ingredient['sp_1'] += $content['product_sp_box'];
				$ingredient['sp_2'] += $content['product_sp_box'];
				$ingredient['sp_3'] += $content['product_sp_box'];
				$ingredient['package_3'] += $content['product_sp_box'];
				$ingredient['package_5'] += $content['product_sp_box'];
				$ingredient['package_6'] += 3 * $content['product_sp_box'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_1'])) {
				$ingredient['ss_1'] += 10 * $content['product_ss_1'];
				$ingredient['ss_2'] += 10 * $content['product_ss_1'];
				$ingredient['package_1'] += $content['product_ss_1'];
				$ingredient['package_2'] += $content['product_ss_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_2'])) {
				$ingredient['ss_3'] += 10 * $content['product_ss_2'];
				$ingredient['ss_6'] += 10 * $content['product_ss_2'];
				$ingredient['package_1'] += $content['product_ss_2'];
				$ingredient['package_2'] += $content['product_ss_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_3'])) {
				$ingredient['ss_4'] += 10 * $content['product_ss_3'];
				$ingredient['ss_5'] += 10 * $content['product_ss_3'];
				$ingredient['package_1'] += $content['product_ss_3'];
				$ingredient['package_2'] += $content['product_ss_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ingredient['ss_1'] += 20 * $content['product_ss_box'];
				$ingredient['ss_2'] += 20 * $content['product_ss_box'];
				$ingredient['ss_3'] += 20 * $content['product_ss_box'];
				$ingredient['ss_4'] += 20 * $content['product_ss_box'];
				$ingredient['ss_5'] += 20 * $content['product_ss_box'];
				$ingredient['ss_6'] += 20 * $content['product_ss_box'];
				$ingredient['package_1'] += 6 * $content['product_ss_box'];
				$ingredient['package_2'] += 6 * $content['product_ss_box'];
				$ingredient['package_4'] += $content['product_sp_box'];
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
		elseif ($fetch1['AUTHORITY'] != 'B') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_1' => 0, 'sp_2' => 0, 'sp_3' => 0, 'ss_1' => 0, 'ss_2' => 0, 'ss_3' => 0, 'ss_4' => 0, 'ss_5' => 0, 'ss_6' => 0, 'package_1' => 0, 'package_2' => 0, 'package_3' => 0, 'package_4' => 0, 'package_5' => 0, 'package_6' => 0);
			if (is_nonnegativeInt($content['product_sp_1'])) {
				$ingredient['sp_1'] += $content['product_sp_1'];
				$ingredient['package_6'] += $content['product_sp_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_2'])) {
				$ingredient['sp_2'] += $content['product_sp_2'];
				$ingredient['package_6'] += $content['product_sp_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_3'])) {
				$ingredient['sp_3'] += $content['product_sp_3'];
				$ingredient['package_6'] += $content['product_sp_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$ingredient['sp_1'] += $content['product_sp_box'];
				$ingredient['sp_2'] += $content['product_sp_box'];
				$ingredient['sp_3'] += $content['product_sp_box'];
				$ingredient['package_3'] += $content['product_sp_box'];
				$ingredient['package_5'] += $content['product_sp_box'];
				$ingredient['package_6'] += 3 * $content['product_sp_box'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_1'])) {
				$ingredient['ss_1'] += 10 * $content['product_ss_1'];
				$ingredient['ss_2'] += 10 * $content['product_ss_1'];
				$ingredient['package_1'] += $content['product_ss_1'];
				$ingredient['package_2'] += $content['product_ss_1'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_2'])) {
				$ingredient['ss_3'] += 10 * $content['product_ss_2'];
				$ingredient['ss_6'] += 10 * $content['product_ss_2'];
				$ingredient['package_1'] += $content['product_ss_2'];
				$ingredient['package_2'] += $content['product_ss_2'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_3'])) {
				$ingredient['ss_4'] += 10 * $content['product_ss_3'];
				$ingredient['ss_5'] += 10 * $content['product_ss_3'];
				$ingredient['package_1'] += $content['product_ss_3'];
				$ingredient['package_2'] += $content['product_ss_3'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ingredient['ss_1'] += 20 * $content['product_ss_box'];
				$ingredient['ss_2'] += 20 * $content['product_ss_box'];
				$ingredient['ss_3'] += 20 * $content['product_ss_box'];
				$ingredient['ss_4'] += 20 * $content['product_ss_box'];
				$ingredient['ss_5'] += 20 * $content['product_ss_box'];
				$ingredient['ss_6'] += 20 * $content['product_ss_box'];
				$ingredient['package_1'] += 6 * $content['product_ss_box'];
				$ingredient['package_2'] += 6 * $content['product_ss_box'];
				$ingredient['package_4'] += $content['product_sp_box'];
			}
			else {
				return 'Wrong input format';
			}
			$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND (ITEMCLASS='C' OR ITEMCLASS='E') AND ACTCODE='1'");
			while ($fetch2 = mysql_fetch_array($sql2)) {
				$ITEMNO = $fetch2['ITEMNO'];
				$ITEMNM = $fetch2['ITEMNM'];
				$amount = $ingredient[$ITEMNO];
				if ($fetch2['TOTALAMT'] < $amount) {
					return 'Not enough' . $ITEMNM;
				}
			}
			package_to_product($ingredient, $content);
			return 'Success';
		}
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

function queryResultTable($query, $authority) {
	if ($authority == 'A' || $authority == 'E') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量</th><th>北投庫存數量</th><th>台東庫存數量</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Beitou', 'oil_1').'</td><td>'.inventory('TaiTung', 'oil_1').'</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Beitou', 'oil_2').'</td><td>'.inventory('TaiTung', 'oil_2').'</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Beitou', 'oil_3').'</td><td>'.inventory('TaiTung', 'oil_3').'</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Beitou', 'oil_4').'</td><td>'.inventory('TaiTung', 'oil_4').'</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Beitou', 'oil_5').'</td><td>'.inventory('TaiTung', 'oil_5').'</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Beitou', 'oil_6').'</td><td>'.inventory('TaiTung', 'oil_6').'</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Beitou', 'oil_7').'</td><td>'.inventory('TaiTung', 'oil_7').'</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Beitou', 'oil_8').'</td><td>'.inventory('TaiTung', 'oil_8').'</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>NaOH</td><td>'.$query['NaOH'].'</td><td>'.inventory('Beitou', 'NaOH').'</td><td>'.inventory('TaiTung', 'NaOH').'</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Beitou', 'additive_1').'</td><td>'.inventory('TaiTung', 'additive_1').'</td></tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Beitou', 'additive_2').'</td><td>'.inventory('TaiTung', 'additive_2').'</td></tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Beitou', 'additive_3').'</td><td>'.inventory('TaiTung', 'additive_3').'</td></tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Beitou', 'additive_4').'</td><td>'.inventory('TaiTung', 'additive_4').'</td></tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Beitou', 'additive_5').'</td><td>'.inventory('TaiTung', 'additive_5').'</td></tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Beitou', 'additive_6').'</td><td>'.inventory('TaiTung', 'additive_6').'</td></tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Beitou', 'additive_7').'</td><td>'.inventory('TaiTung', 'additive_7').'</td></tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Beitou', 'additive_8').'</td><td>'.inventory('TaiTung', 'additive_8').'</td></tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Beitou', 'additive_9').'</td><td>'.inventory('TaiTung', 'additive_9').'</td></tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Beitou', 'additive_10').'</td><td>'.inventory('TaiTung', 'additive_10').'</td></tr>';
		if ($query['additive_11'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['additive_11'].'</td><td>'.inventory('Beitou', 'additive_11').'</td><td>'.inventory('TaiTung', 'additive_11').'</td></tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'B') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量</th><th>庫存數量</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Beitou', 'oil_1').'</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Beitou', 'oil_2').'</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Beitou', 'oil_3').'</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Beitou', 'oil_4').'</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Beitou', 'oil_5').'</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Beitou', 'oil_6').'</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Beitou', 'oil_7').'</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Beitou', 'oil_8').'</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>NaOH</td><td>'.$query['NaOH'].'</td><td>'.inventory('Beitou', 'NaOH').'</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Beitou', 'additive_1').'</td></tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Beitou', 'additive_2').'</td></tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Beitou', 'additive_3').'</td></tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Beitou', 'additive_4').'</td></tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Beitou', 'additive_5').'</td></tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Beitou', 'additive_6').'</td></tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Beitou', 'additive_7').'</td></tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Beitou', 'additive_8').'</td></tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Beitou', 'additive_9').'</td></tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Beitou', 'additive_10').'</td></tr>';
		if ($query['additive_11'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['additive_11'].'</td><td>'.inventory('Beitou', 'additive_11').'</td></tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'C') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>NaOH</td><td>'.$query['NaOH'].'</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td></tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td></tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td></tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td></tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td></tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td></tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td></tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td></tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td></tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td></tr>';
		if ($query['additive_11'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['additive_11'].'</td></tr>';
		$queryResult .= '</table>';
	}
	elseif ($authority == 'D') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量</th><th>庫存數量</th></tr>';
		if ($query['oil_1'] != 0) $queryResult .= '<tr><td>橄欖油</td><td>'.$query['oil_1'].'</td><td>'.inventory('Taitung', 'oil_1').'</td></tr>';
		if ($query['oil_2'] != 0) $queryResult .= '<tr><td>棕梠油</td><td>'.$query['oil_2'].'</td><td>'.inventory('Taitung', 'oil_2').'</td></tr>';
		if ($query['oil_3'] != 0) $queryResult .= '<tr><td>椰子油</td><td>'.$query['oil_3'].'</td><td>'.inventory('Taitung', 'oil_3').'</td></tr>';
		if ($query['oil_4'] != 0) $queryResult .= '<tr><td>米糠油</td><td>'.$query['oil_4'].'</td><td>'.inventory('Taitung', 'oil_4').'</td></tr>';
		if ($query['oil_5'] != 0) $queryResult .= '<tr><td>紅棕梠油</td><td>'.$query['oil_5'].'</td><td>'.inventory('Taitung', 'oil_5').'</td></tr>';
		if ($query['oil_6'] != 0) $queryResult .= '<tr><td>葡萄籽油</td><td>'.$query['oil_6'].'</td><td>'.inventory('Taitung', 'oil_6').'</td></tr>';
		if ($query['oil_7'] != 0) $queryResult .= '<tr><td>苦茶油</td><td>'.$query['oil_7'].'</td><td>'.inventory('Taitung', 'oil_7').'</td></tr>';
		if ($query['oil_8'] != 0) $queryResult .= '<tr><td>蓖麻油</td><td>'.$query['oil_8'].'</td><td>'.inventory('Taitung', 'oil_8').'</td></tr>';
		if ($query['NaOH'] != 0) $queryResult .= '<tr><td>NaOH</td><td>'.$query['NaOH'].'</td><td>'.inventory('Taitung', 'NaOH').'</td></tr>';
		if ($query['additive_1'] != 0) $queryResult .= '<tr><td>金針花瓣</td><td>'.$query['additive_1'].'</td><td>'.inventory('Taitung', 'additive_1').'</td></tr>';
		if ($query['additive_2'] != 0) $queryResult .= '<tr><td>釋迦果粉</td><td>'.$query['additive_2'].'</td><td>'.inventory('Taitung', 'additive_2').'</td></tr>';
		if ($query['additive_3'] != 0) $queryResult .= '<tr><td>釋迦果泥</td><td>'.$query['additive_3'].'</td><td>'.inventory('Taitung', 'additive_3').'</td></tr>';
		if ($query['additive_4'] != 0) $queryResult .= '<tr><td>米粉</td><td>'.$query['additive_4'].'</td><td>'.inventory('Taitung', 'additive_4').'</td></tr>';
		if ($query['additive_5'] != 0) $queryResult .= '<tr><td>蕁麻葉粉</td><td>'.$query['additive_5'].'</td><td>'.inventory('Taitung', 'additive_5').'</td></tr>';
		if ($query['additive_6'] != 0) $queryResult .= '<tr><td>金盞花粉</td><td>'.$query['additive_6'].'</td><td>'.inventory('Taitung', 'additive_6').'</td></tr>';
		if ($query['additive_7'] != 0) $queryResult .= '<tr><td>金針花粉</td><td>'.$query['additive_7'].'</td><td>'.inventory('Taitung', 'additive_7').'</td></tr>';
		if ($query['additive_8'] != 0) $queryResult .= '<tr><td>薑黃粉</td><td>'.$query['additive_8'].'</td><td>'.inventory('Taitung', 'additive_8').'</td></tr>';
		if ($query['additive_9'] != 0) $queryResult .= '<tr><td>紅麴粉</td><td>'.$query['additive_9'].'</td><td>'.inventory('Taitung', 'additive_9').'</td></tr>';
		if ($query['additive_10'] != 0) $queryResult .= '<tr><td>洛神花粉</td><td>'.$query['additive_10'].'</td><td>'.inventory('Taitung', 'additive_10').'</td></tr>';
		if ($query['additive_11'] != 0) $queryResult .= '<tr><td>乳油木果脂</td><td>'.$query['additive_11'].'</td><td>'.inventory('Taitung', 'additive_11').'</td></tr>';
		$queryResult .= '</table>';
	}
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
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['sp_2'])) {
			$ITEMNO = 'sp_2_' . $today;
			$ITEMNM = $today . '的金針皂';
			$amount = $product['sp_2'] * 10;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['sp_3'])) {
			$ITEMNO = 'sp_3_' . $today;
			$ITEMNM = $today . '的釋迦皂';
			$amount = $product['sp_3'] * 10;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_1'])) {
			$ITEMNO = 'ss_1_' . $today;
			$ITEMNM = $today . '的洛神皂絲';
			$amount = $product['ss_1'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_2'])) {
			$ITEMNO = 'ss_2_' . $today;
			$ITEMNM = $today . '的紅麴皂絲';
			$amount = $product['ss_2'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_3'])) {
			$ITEMNO = 'ss_3_' . $today;
			$ITEMNM = $today . '的薑黃皂絲';
			$amount = $product['ss_3'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_4'])) {
			$ITEMNO = 'ss_4_' . $today;
			$ITEMNM = $today . '的金針皂絲';
			$amount = $product['ss_4'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_5'])) {
			$ITEMNO = 'ss_5_' . $today;
			$ITEMNM = $today . '的紅棕梠皂絲';
			$amount = $product['ss_5'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['ss_6'])) {
			$ITEMNO = 'ss_6_' . $today;
			$ITEMNM = $today . '的蕁麻葉皂絲';
			$amount = $product['ss_6'] * 1000;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
	}
	elseif ($whouse = 'Houshanpi') {
		if (is_positiveInt($product['sp_1'])) {
			$ITEMNO = 'sp_1_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的米皂';
			$amount = $product['sp_1'] * 10;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['sp_2'])) {
			$ITEMNO = 'sp_2_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的金針皂';
			$amount = $product['sp_2'] * 10;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
		if (is_positiveInt($product['sp_3'])) {
			$ITEMNO = 'sp_3_houshanpi_' . $today;
			$ITEMNM = $today . '的後山埤的釋迦皂';
			$amount = $product['sp_3'] * 10;
			mysql_query("INSERT INTO WHOUSEITEMMAS (WHOUSENO, ITEMNO, ITEMNM, ITEMCLASS, TOTALAMT, UPDATEDATE) VALUES ('$whouse', '$ITEMNO', '$ITEMNM', 'F', '$amount', '$date')");
		}
	}
}

function package_to_product($package, $product) {
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	$today = date("Ymd");
	$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND (ITEMCLASS='C' OR ITEMCLASS='E') AND ACTCODE='1'");
	while ($fetch1 = mysql_fetch_array($sql1)) {
		$ITEMNO = $fetch1['ITEMNO'];
		$ITEMNM = $fetch1['ITEMNM'];
		$amount = $package[$ITEMNO];
		if ($amount > 0) {
			mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
		}
	}
	if (is_positiveInt($content['product_sp_1'])) {
		$ITEMNO = 'product_sp_1';
		$amount = $product['product_sp_1'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_sp_2'])) {
		$ITEMNO = 'product_sp_2';
		$amount = $product['product_sp_2'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_sp_3'])) {
		$ITEMNO = 'product_sp_3';
		$amount = $product['product_sp_3'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_sp_box'])) {
		$ITEMNO = 'product_sp_box';
		$amount = $product['product_sp_box'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_ss_1'])) {
		$ITEMNO = 'product_ss_1';
		$amount = $product['product_ss_1'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_ss_2'])) {
		$ITEMNO = 'product_ss_2';
		$amount = $product['product_ss_2'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_ss_3'])) {
		$ITEMNO = 'product_ss_3';
		$amount = $product['product_ss_3'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
	if (is_positiveInt($content['product_ss_box'])) {
		$ITEMNO = 'product_ss_box';
		$amount = $product['product_ss_box'];
		mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='Beitou' AND ITEMNO='$ITEMNO'");
	}
}