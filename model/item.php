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
			$ingredient = array('oil_001' => 0, 'oil_002' => 0, 'oil_003' => 0, 'oil_004' => 0, 'oil_005' => 0, 'oil_006' => 0, 'oil_007' => 0, 'oil_008' => 0, 'oil_009' => 0, 'oil_010' => 0, 'oil_011' => 0, 'oil_012' => 0, 'oil_013' => 0, 'oil_014' => 0, 'additive_001' => 0, 'additive_002' => 0, 'additive_003' => 0, 'additive_004' => 0, 'additive_005' => 0, 'additive_006' => 0, 'additive_007' => 0, 'additive_008' => 0, 'additive_009' => 0, 'additive_010' => 0, 'additive_011' => 0, 'additive_012' => 0, 'additive_013' => 0, 'additive_014' => 0, 'additive_015' => 0, 'additive_016' => 0, 'additive_017' => 0, 'NaOH' => 0);
			if (isset($content['sp_001'])) {
				if (is_nonnegativeInt($content['sp_001'])) {
					$ingredient['oil_001'] += 360 * $content['sp_001'];
					$ingredient['oil_002'] += 160 * $content['sp_001'];
					$ingredient['oil_003'] += 120 * $content['sp_001'];
					$ingredient['oil_004'] += 80 * $content['sp_001'];
					$ingredient['oil_009'] += 80 * $content['sp_001'];
					$ingredient['additive_004'] += 5 * $content['sp_001'];
					$ingredient['additive_005'] += 5 * $content['sp_001'];
					$ingredient['additive_006'] += 5 * $content['sp_001'];
					$ingredient['NaOH'] += 108 * $content['sp_001'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_002'])) {
				if (is_nonnegativeInt($content['sp_002'])) {
					$ingredient['oil_001'] += 425 * $content['sp_002'];
					$ingredient['oil_002'] += 170 * $content['sp_002'];
					$ingredient['oil_003'] += 170 * $content['sp_002'];
					$ingredient['oil_009'] += 85 * $content['sp_002'];
					$ingredient['additive_001'] += 5 * $content['sp_002'];
					$ingredient['NaOH'] += 118 * $content['sp_002'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_003'])) {
				if (is_nonnegativeInt($content['sp_003'])) {
					$ingredient['oil_001'] += 280 * $content['sp_003'];
					$ingredient['oil_002'] += 160 * $content['sp_003'];
					$ingredient['oil_003'] += 200 * $content['sp_003'];
					$ingredient['oil_006'] += 80 * $content['sp_003'];
					$ingredient['oil_009'] += 80 * $content['sp_003'];
					$ingredient['additive_002'] += 5 * $content['sp_003'];
					$ingredient['additive_003'] += 60 * $content['sp_003'];
					$ingredient['NaOH'] += 112 * $content['sp_003'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_004'])) {
				if (is_nonnegativeInt($content['sp_004'])) {
					$ingredient['oil_003'] += 640 * $content['sp_004'];
					$ingredient['oil_004'] += 40 * $content['sp_004'];
					$ingredient['oil_011'] += 120 * $content['sp_004'];
					$ingredient['additive_014'] += 50 * $content['sp_004'];
					$ingredient['NaOH'] += 135 * $content['sp_004'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_005'])) {
				if (is_nonnegativeInt($content['sp_005'])) {
					$ingredient['oil_001'] += 240 * $content['sp_005'];
					$ingredient['oil_002'] += 120 * $content['sp_005'];
					$ingredient['oil_003'] += 120 * $content['sp_005'];
					$ingredient['oil_014'] += 320 * $content['sp_005'];
					$ingredient['additive_015'] += 50 * $content['sp_005'];
					$ingredient['NaOH'] += 111 * $content['sp_005'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_006'])) {
				if (is_nonnegativeInt($content['sp_006'])) {
					$ingredient['oil_001'] += 160 * $content['sp_006'];
					$ingredient['oil_002'] += 80 * $content['sp_006'];
					$ingredient['oil_003'] += 80 * $content['sp_006'];
					$ingredient['oil_009'] += 80 * $content['sp_006'];
					$ingredient['oil_010'] += 160 * $content['sp_006'];
					$ingredient['oil_012'] += 240 * $content['sp_006'];
					$ingredient['additive_016'] += 6 * $content['sp_006'];
					$ingredient['NaOH'] += 107 * $content['sp_006'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (isset($content['ss_001'])) {
					if (is_nonnegativeInt($content['ss_001'])) {
						$ingredient['oil_002'] += 150 * $content['ss_001'];
						$ingredient['oil_003'] += 225 * $content['ss_001'];
						$ingredient['oil_004'] += 150 * $content['ss_001'];
						$ingredient['oil_007'] += 75 * $content['ss_001'];
						$ingredient['oil_008'] += 150 * $content['ss_001'];
						$ingredient['additive_010'] += 6 * $content['ss_001'];
						$ingredient['NaOH'] += 107 * $content['ss_001'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_002'])) {
					if (is_nonnegativeInt($content['ss_002'])) {
						$ingredient['oil_002'] += 150 * $content['ss_002'];
						$ingredient['oil_003'] += 225 * $content['ss_002'];
						$ingredient['oil_004'] += 150 * $content['ss_002'];
						$ingredient['oil_007'] += 75 * $content['ss_002'];
						$ingredient['oil_008'] += 150 * $content['ss_002'];
						$ingredient['additive_009'] += 15 * $content['ss_002'];
						$ingredient['NaOH'] += 107 * $content['ss_002'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_003'])) {
					if (is_nonnegativeInt($content['ss_003'])) {
						$ingredient['oil_001'] += 337.5 * $content['ss_003'];
						$ingredient['oil_002'] += 150 * $content['ss_003'];
						$ingredient['oil_003'] += 187.5 * $content['ss_003'];
						$ingredient['oil_006'] += 75 * $content['ss_003'];
						$ingredient['additive_008'] += 6 * $content['ss_003'];
						$ingredient['NaOH'] += 106 * $content['ss_003'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_004'])) {
					if (is_nonnegativeInt($content['ss_004'])) {
						$ingredient['oil_001'] += 300 * $content['ss_004'];
						$ingredient['oil_002'] += 112.5 * $content['ss_004'];
						$ingredient['oil_003'] += 112.5 * $content['ss_004'];
						$ingredient['oil_004'] += 150 * $content['ss_004'];
						$ingredient['oil_009'] += 75 * $content['ss_004'];
						$ingredient['additive_007'] += 6 * $content['ss_004'];
						$ingredient['NaOH'] += 101 * $content['ss_004'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_005'])) {
					if (is_nonnegativeInt($content['ss_005'])) {
						$ingredient['oil_001'] += 300 * $content['ss_005'];
						$ingredient['oil_002'] += 112.5 * $content['ss_005'];
						$ingredient['oil_003'] += 112.5 * $content['ss_005'];
						$ingredient['oil_004'] += 150 * $content['ss_005'];
						$ingredient['oil_005'] += 5 * $content['ss_005'];
						$ingredient['additive_007'] += 6 * $content['ss_005'];
						$ingredient['NaOH'] += 101 * $content['ss_005'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_006'])) {
					if (is_nonnegativeInt($content['ss_006'])) {
						$ingredient['oil_001'] += 337.5 * $content['ss_006'];
						$ingredient['oil_002'] += 150 * $content['ss_006'];
						$ingredient['oil_003'] += 187.5 * $content['ss_006'];
						$ingredient['oil_006'] += 75 * $content['ss_006'];
						$ingredient['additive_005'] += 5 * $content['ss_006'];
						$ingredient['NaOH'] += 106 * $content['ss_006'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_007'])) {
					if (is_nonnegativeInt($content['ss_007'])) {
						$ingredient['oil_002'] += 176 * $content['ss_007'];
						$ingredient['oil_003'] += 184 * $content['ss_007'];
						$ingredient['oil_004'] += 40 * $content['ss_007'];
						$ingredient['oil_008'] += 120 * $content['ss_007'];
						$ingredient['oil_011'] += 80 * $content['ss_007'];
						$ingredient['oil_013'] += 200 * $content['ss_007'];
						$ingredient['additive_012'] += 8 * $content['ss_007'];
						$ingredient['NaOH'] += 112 * $content['ss_007'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_008'])) {
					if (is_nonnegativeInt($content['ss_008'])) {
						$ingredient['oil_002'] += 176 * $content['ss_008'];
						$ingredient['oil_003'] += 184 * $content['ss_008'];
						$ingredient['oil_004'] += 40 * $content['ss_008'];
						$ingredient['oil_008'] += 120 * $content['ss_008'];
						$ingredient['oil_011'] += 80 * $content['ss_008'];
						$ingredient['oil_013'] += 200 * $content['ss_008'];
						$ingredient['additive_017'] += 5 * $content['ss_008'];
						$ingredient['NaOH'] += 112 * $content['ss_008'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_009'])) {
					if (is_nonnegativeInt($content['ss_009'])) {
						$ingredient['oil_001'] += 572 * $content['ss_009'];
						$ingredient['oil_002'] += 80 * $content['ss_009'];
						$ingredient['oil_003'] += 80 * $content['ss_009'];
						$ingredient['oil_004'] += 64 * $content['ss_009'];
						$ingredient['additive_004'] += 8 * $content['ss_009'];
						$ingredient['NaOH'] += 106 * $content['ss_009'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_010'])) {
					if (is_nonnegativeInt($content['ss_010'])) {
						$ingredient['oil_001'] += 572 * $content['ss_010'];
						$ingredient['oil_002'] += 80 * $content['ss_010'];
						$ingredient['oil_003'] += 80 * $content['ss_010'];
						$ingredient['oil_004'] += 64 * $content['ss_010'];
						$ingredient['additive_005'] += 8 * $content['ss_010'];
						$ingredient['NaOH'] += 106 * $content['ss_010'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_011'])) {
					if (is_nonnegativeInt($content['ss_011'])) {
						$ingredient['oil_001'] += 320 * $content['ss_011'];
						$ingredient['oil_003'] += 80 * $content['ss_011'];
						$ingredient['oil_005'] += 200 * $content['ss_011'];
						$ingredient['oil_009'] += 120 * $content['ss_011'];
						$ingredient['oil_010'] += 64 * $content['ss_011'];
						$ingredient['additive_011'] += 16 * $content['ss_011'];
						$ingredient['additive_013'] += 8 * $content['ss_011'];
						$ingredient['NaOH'] += 106 * $content['ss_011'];
					}
					else {
						return 'Wrong input format';
					}
				}
			}
			$ingredient['oil_001'] = ceil($ingredient['oil_001']);
			$ingredient['oil_002'] = ceil($ingredient['oil_002']);
			$ingredient['oil_003'] = ceil($ingredient['oil_003']);
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
			$ingredient = array('oil_001' => 0, 'oil_002' => 0, 'oil_003' => 0, 'oil_004' => 0, 'oil_005' => 0, 'oil_006' => 0, 'oil_007' => 0, 'oil_008' => 0, 'oil_009' => 0, 'oil_010' => 0, 'oil_011' => 0, 'oil_012' => 0, 'oil_013' => 0, 'oil_014' => 0, 'additive_001' => 0, 'additive_002' => 0, 'additive_003' => 0, 'additive_004' => 0, 'additive_005' => 0, 'additive_006' => 0, 'additive_007' => 0, 'additive_008' => 0, 'additive_009' => 0, 'additive_010' => 0, 'additive_011' => 0, 'additive_012' => 0, 'additive_013' => 0, 'additive_014' => 0, 'additive_015' => 0, 'additive_016' => 0, 'additive_017' => 0, 'NaOH' => 0);
			if (isset($content['sp_001'])) {
				if (is_nonnegativeInt($content['sp_001'])) {
					$ingredient['oil_001'] += 360 * $content['sp_001'];
					$ingredient['oil_002'] += 160 * $content['sp_001'];
					$ingredient['oil_003'] += 120 * $content['sp_001'];
					$ingredient['oil_004'] += 80 * $content['sp_001'];
					$ingredient['oil_009'] += 80 * $content['sp_001'];
					$ingredient['additive_004'] += 5 * $content['sp_001'];
					$ingredient['additive_005'] += 5 * $content['sp_001'];
					$ingredient['additive_006'] += 5 * $content['sp_001'];
					$ingredient['NaOH'] += 108 * $content['sp_001'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_002'])) {
				if (is_nonnegativeInt($content['sp_002'])) {
					$ingredient['oil_001'] += 425 * $content['sp_002'];
					$ingredient['oil_002'] += 170 * $content['sp_002'];
					$ingredient['oil_003'] += 170 * $content['sp_002'];
					$ingredient['oil_009'] += 85 * $content['sp_002'];
					$ingredient['additive_001'] += 5 * $content['sp_002'];
					$ingredient['NaOH'] += 118 * $content['sp_002'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_003'])) {
				if (is_nonnegativeInt($content['sp_003'])) {
					$ingredient['oil_001'] += 280 * $content['sp_003'];
					$ingredient['oil_002'] += 160 * $content['sp_003'];
					$ingredient['oil_003'] += 200 * $content['sp_003'];
					$ingredient['oil_006'] += 80 * $content['sp_003'];
					$ingredient['oil_009'] += 80 * $content['sp_003'];
					$ingredient['additive_002'] += 5 * $content['sp_003'];
					$ingredient['additive_003'] += 60 * $content['sp_003'];
					$ingredient['NaOH'] += 112 * $content['sp_003'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_004'])) {
				if (is_nonnegativeInt($content['sp_004'])) {
					$ingredient['oil_003'] += 640 * $content['sp_004'];
					$ingredient['oil_004'] += 40 * $content['sp_004'];
					$ingredient['oil_011'] += 120 * $content['sp_004'];
					$ingredient['additive_014'] += 50 * $content['sp_004'];
					$ingredient['NaOH'] += 135 * $content['sp_004'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_005'])) {
				if (is_nonnegativeInt($content['sp_005'])) {
					$ingredient['oil_001'] += 240 * $content['sp_005'];
					$ingredient['oil_002'] += 120 * $content['sp_005'];
					$ingredient['oil_003'] += 120 * $content['sp_005'];
					$ingredient['oil_014'] += 320 * $content['sp_005'];
					$ingredient['additive_015'] += 50 * $content['sp_005'];
					$ingredient['NaOH'] += 111 * $content['sp_005'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if (isset($content['sp_006'])) {
				if (is_nonnegativeInt($content['sp_006'])) {
					$ingredient['oil_001'] += 160 * $content['sp_006'];
					$ingredient['oil_002'] += 80 * $content['sp_006'];
					$ingredient['oil_003'] += 80 * $content['sp_006'];
					$ingredient['oil_009'] += 80 * $content['sp_006'];
					$ingredient['oil_010'] += 160 * $content['sp_006'];
					$ingredient['oil_012'] += 240 * $content['sp_006'];
					$ingredient['additive_016'] += 6 * $content['sp_006'];
					$ingredient['NaOH'] += 107 * $content['sp_006'];
				}
				else {
					return 'Wrong input format';
				}
			}
			if ($fetch1['AUTHORITY'] != 'C') {
				if (isset($content['ss_001'])) {
					if (is_nonnegativeInt($content['ss_001'])) {
						$ingredient['oil_002'] += 150 * $content['ss_001'];
						$ingredient['oil_003'] += 225 * $content['ss_001'];
						$ingredient['oil_004'] += 150 * $content['ss_001'];
						$ingredient['oil_007'] += 75 * $content['ss_001'];
						$ingredient['oil_008'] += 150 * $content['ss_001'];
						$ingredient['additive_010'] += 6 * $content['ss_001'];
						$ingredient['NaOH'] += 107 * $content['ss_001'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_002'])) {
					if (is_nonnegativeInt($content['ss_002'])) {
						$ingredient['oil_002'] += 150 * $content['ss_002'];
						$ingredient['oil_003'] += 225 * $content['ss_002'];
						$ingredient['oil_004'] += 150 * $content['ss_002'];
						$ingredient['oil_007'] += 75 * $content['ss_002'];
						$ingredient['oil_008'] += 150 * $content['ss_002'];
						$ingredient['additive_009'] += 15 * $content['ss_002'];
						$ingredient['NaOH'] += 107 * $content['ss_002'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_003'])) {
					if (is_nonnegativeInt($content['ss_003'])) {
						$ingredient['oil_001'] += 337.5 * $content['ss_003'];
						$ingredient['oil_002'] += 150 * $content['ss_003'];
						$ingredient['oil_003'] += 187.5 * $content['ss_003'];
						$ingredient['oil_006'] += 75 * $content['ss_003'];
						$ingredient['additive_008'] += 6 * $content['ss_003'];
						$ingredient['NaOH'] += 106 * $content['ss_003'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_004'])) {
					if (is_nonnegativeInt($content['ss_004'])) {
						$ingredient['oil_001'] += 300 * $content['ss_004'];
						$ingredient['oil_002'] += 112.5 * $content['ss_004'];
						$ingredient['oil_003'] += 112.5 * $content['ss_004'];
						$ingredient['oil_004'] += 150 * $content['ss_004'];
						$ingredient['oil_009'] += 75 * $content['ss_004'];
						$ingredient['additive_007'] += 6 * $content['ss_004'];
						$ingredient['NaOH'] += 101 * $content['ss_004'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_005'])) {
					if (is_nonnegativeInt($content['ss_005'])) {
						$ingredient['oil_001'] += 300 * $content['ss_005'];
						$ingredient['oil_002'] += 112.5 * $content['ss_005'];
						$ingredient['oil_003'] += 112.5 * $content['ss_005'];
						$ingredient['oil_004'] += 150 * $content['ss_005'];
						$ingredient['oil_005'] += 5 * $content['ss_005'];
						$ingredient['additive_007'] += 6 * $content['ss_005'];
						$ingredient['NaOH'] += 101 * $content['ss_005'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_006'])) {
					if (is_nonnegativeInt($content['ss_006'])) {
						$ingredient['oil_001'] += 337.5 * $content['ss_006'];
						$ingredient['oil_002'] += 150 * $content['ss_006'];
						$ingredient['oil_003'] += 187.5 * $content['ss_006'];
						$ingredient['oil_006'] += 75 * $content['ss_006'];
						$ingredient['additive_005'] += 5 * $content['ss_006'];
						$ingredient['NaOH'] += 106 * $content['ss_006'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_007'])) {
					if (is_nonnegativeInt($content['ss_007'])) {
						$ingredient['oil_002'] += 176 * $content['ss_007'];
						$ingredient['oil_003'] += 184 * $content['ss_007'];
						$ingredient['oil_004'] += 40 * $content['ss_007'];
						$ingredient['oil_008'] += 120 * $content['ss_007'];
						$ingredient['oil_011'] += 80 * $content['ss_007'];
						$ingredient['oil_013'] += 200 * $content['ss_007'];
						$ingredient['additive_012'] += 8 * $content['ss_007'];
						$ingredient['NaOH'] += 112 * $content['ss_007'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_008'])) {
					if (is_nonnegativeInt($content['ss_008'])) {
						$ingredient['oil_002'] += 176 * $content['ss_008'];
						$ingredient['oil_003'] += 184 * $content['ss_008'];
						$ingredient['oil_004'] += 40 * $content['ss_008'];
						$ingredient['oil_008'] += 120 * $content['ss_008'];
						$ingredient['oil_011'] += 80 * $content['ss_008'];
						$ingredient['oil_013'] += 200 * $content['ss_008'];
						$ingredient['additive_017'] += 5 * $content['ss_008'];
						$ingredient['NaOH'] += 112 * $content['ss_008'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_009'])) {
					if (is_nonnegativeInt($content['ss_009'])) {
						$ingredient['oil_001'] += 572 * $content['ss_009'];
						$ingredient['oil_002'] += 80 * $content['ss_009'];
						$ingredient['oil_003'] += 80 * $content['ss_009'];
						$ingredient['oil_004'] += 64 * $content['ss_009'];
						$ingredient['additive_004'] += 8 * $content['ss_009'];
						$ingredient['NaOH'] += 106 * $content['ss_009'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_010'])) {
					if (is_nonnegativeInt($content['ss_010'])) {
						$ingredient['oil_001'] += 572 * $content['ss_010'];
						$ingredient['oil_002'] += 80 * $content['ss_010'];
						$ingredient['oil_003'] += 80 * $content['ss_010'];
						$ingredient['oil_004'] += 64 * $content['ss_010'];
						$ingredient['additive_005'] += 8 * $content['ss_010'];
						$ingredient['NaOH'] += 106 * $content['ss_010'];
					}
					else {
						return 'Wrong input format';
					}
				}
				if (isset($content['ss_011'])) {
					if (is_nonnegativeInt($content['ss_011'])) {
						$ingredient['oil_001'] += 320 * $content['ss_011'];
						$ingredient['oil_003'] += 80 * $content['ss_011'];
						$ingredient['oil_005'] += 200 * $content['ss_011'];
						$ingredient['oil_009'] += 120 * $content['ss_011'];
						$ingredient['oil_010'] += 64 * $content['ss_011'];
						$ingredient['additive_011'] += 16 * $content['ss_011'];
						$ingredient['additive_013'] += 8 * $content['ss_011'];
						$ingredient['NaOH'] += 106 * $content['ss_011'];
					}
					else {
						return 'Wrong input format';
					}
				}
			}
			$ingredient['oil_001'] = ceil($ingredient['oil_001']);
			$ingredient['oil_002'] = ceil($ingredient['oil_002']);
			$ingredient['oil_003'] = ceil($ingredient['oil_003']);
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
			elseif ($fetch1['AUTHORITY'] == 'I') {
				$sql2 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Yilan' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
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
					ingredient_to_product($ingredient, $content, 'Yilan');
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
		elseif ($fetch1['AUTHORITY'] != 'B' && $fetch1['AUTHORITY'] != 'I') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_001_100' => 0, 'sp_002_100' => 0, 'sp_003_100' => 0, 'sp_004_100' => 0, 'sp_005_100' => 0, 'sp_006_100' => 0, 'slice_ss_001' => 0, 'slice_ss_002' => 0, 'slice_ss_003' => 0, 'slice_ss_004' => 0, 'slice_ss_005' => 0, 'slice_ss_006' => 0, 'package_001' => 0, 'package_002a' => 0, 'package_002b' => 0, 'package_002c' => 0, 'package_003' => 0, 'package_004' => 0, 'package_005' => 0, 'package_006' => 0, 'package_007a' => 0, 'package_008a' => 0, 'package_009a' => 0, 'product_sp_001a' => 0, 'product_sp_002a' => 0, 'product_sp_003a' => 0, 'product_ss_001' => 0, 'product_ss_002' => 0, 'product_ss_003' => 0);
			if (is_nonnegativeInt($content['product_sp_001a'])) {
				$ingredient['sp_001_100'] += $content['product_sp_001a'];
				$ingredient['package_007a'] += $content['product_sp_001a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_002a'])) {
				$ingredient['sp_002_100'] += $content['product_sp_002a'];
				$ingredient['package_008a'] += $content['product_sp_002a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_003a'])) {
				$ingredient['sp_003_100'] += $content['product_sp_003a'];
				$ingredient['package_009a'] += $content['product_sp_003a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$sp_001_type1 = $content['sp_001_type1'];
				$sp_002_type1 = $content['sp_002_type1'];
				$sp_003_type1 = $content['sp_003_type1'];
				$sp_001_type2 = $content['sp_001_type2'];
				$sp_002_type2 = $content['sp_002_type2'];
				$sp_003_type2 = $content['sp_003_type2'];
				if (!is_nonnegativeInt($sp_001_type1) || !is_nonnegativeInt($sp_002_type1) || !is_nonnegativeInt($sp_003_type1) || !is_nonnegativeInt($sp_001_type2) || !is_nonnegativeInt($sp_002_type2) || !is_nonnegativeInt($sp_003_type2)) {
					return 'Wrong input format';
				}
				elseif ($sp_001_type1 + $sp_001_type2 != $content['product_sp_box']){
					return 'Wrong sp_001 series amount';
				}
				elseif ($sp_002_type1 + $sp_002_type2 != $content['product_sp_box']){
					return 'Wrong sp_002 series amount';
				}
				elseif ($sp_003_type1 + $sp_003_type2 != $content['product_sp_box']){
					return 'Wrong sp_003 series amount';
				}
				else {
					$ingredient['sp_001_100'] += $sp_001_type1;
					$ingredient['sp_002_100'] += $sp_002_type1;
					$ingredient['sp_003_100'] += $sp_003_type1;
					$ingredient['package_007a'] += $sp_001_type1;
					$ingredient['package_008a'] += $sp_002_type1;
					$ingredient['package_009a'] += $sp_003_type1;
					$ingredient['product_sp_001a'] += $sp_001_type2;
					$ingredient['product_sp_002a'] += $sp_002_type2;
					$ingredient['product_sp_003a'] += $sp_003_type2;
					$ingredient['package_003'] += $content['product_sp_box'];
					$ingredient['package_004'] += $content['product_sp_box'];
					$ingredient['package_006'] += $content['product_sp_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_001'])) {
				$ingredient['slice_ss_001'] += 10 * $content['product_ss_001'];
				$ingredient['package_001'] += $content['product_ss_001'];
				$ingredient['package_002a'] += $content['product_ss_001'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_002'])) {
				$ingredient['slice_ss_002'] += 10 * $content['product_ss_002'];
				$ingredient['package_001'] += $content['product_ss_002'];
				$ingredient['package_002b'] += $content['product_ss_002'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_003'])) {
				$ingredient['slice_ss_003'] += 10 * $content['product_ss_003'];
				$ingredient['package_001'] += $content['product_ss_003'];
				$ingredient['package_002c'] += $content['product_ss_003'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ss_001_type1 = $content['ss_001_type1'];
				$ss_002_type1 = $content['ss_002_type1'];
				$ss_003_type1 = $content['ss_003_type1'];
				if (!is_nonnegativeInt($ss_001_type1) || !is_nonnegativeInt($ss_002_type1) || !is_nonnegativeInt($ss_003_type1)) {
					return 'Wrong input format';
				}
				elseif ($ss_001_type1 + $ss_002_type1 + $ss_003_type1 != $content['product_ss_box'] * 6){
					return 'Wrong ss series amount';
				}
				else {
					$ingredient['product_ss_001'] += $ss_001_type1;
					$ingredient['product_ss_002'] += $ss_002_type1;
					$ingredient['product_ss_003'] += $ss_003_type1;
					$ingredient['package_005'] += $content['product_ss_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			return array('ingredient' => $ingredient, 'authority' => $fetch1['AUTHORITY']);
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
		elseif ($fetch1['AUTHORITY'] != 'B' && $fetch1['AUTHORITY'] != 'I') {
			return 'No authority';
		}
		else {
			$ingredient = array('sp_001_100' => 0, 'sp_002_100' => 0, 'sp_003_100' => 0, 'sp_004_100' => 0, 'sp_005_100' => 0, 'sp_006_100' => 0, 'slice_ss_001' => 0, 'slice_ss_002' => 0, 'slice_ss_003' => 0, 'slice_ss_004' => 0, 'slice_ss_005' => 0, 'slice_ss_006' => 0, 'package_001' => 0, 'package_002a' => 0, 'package_002b' => 0, 'package_002c' => 0, 'package_003' => 0, 'package_004' => 0, 'package_005' => 0, 'package_006' => 0, 'package_007a' => 0, 'package_008a' => 0, 'package_009a' => 0, 'product_sp_001a' => 0, 'product_sp_002a' => 0, 'product_sp_003a' => 0, 'product_ss_001' => 0, 'product_ss_002' => 0, 'product_ss_003' => 0);
			if (is_nonnegativeInt($content['product_sp_001a'])) {
				$ingredient['sp_001_100'] += $content['product_sp_001a'];
				$ingredient['package_007a'] += $content['product_sp_001a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_002a'])) {
				$ingredient['sp_002_100'] += $content['product_sp_002a'];
				$ingredient['package_008a'] += $content['product_sp_002a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_003a'])) {
				$ingredient['sp_003_100'] += $content['product_sp_003a'];
				$ingredient['package_009a'] += $content['product_sp_003a'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_sp_box'])) {
				$sp_001_type1 = $content['sp_001_type1'];
				$sp_002_type1 = $content['sp_002_type1'];
				$sp_003_type1 = $content['sp_003_type1'];
				$sp_001_type2 = $content['sp_001_type2'];
				$sp_002_type2 = $content['sp_002_type2'];
				$sp_003_type2 = $content['sp_003_type2'];
				if (!is_nonnegativeInt($sp_001_type1) || !is_nonnegativeInt($sp_002_type1) || !is_nonnegativeInt($sp_003_type1) || !is_nonnegativeInt($sp_001_type2) || !is_nonnegativeInt($sp_002_type2) || !is_nonnegativeInt($sp_003_type2)) {
					return 'Wrong input format';
				}
				elseif ($sp_001_type1 + $sp_001_type2 != $content['product_sp_box']){
					return 'Wrong sp_001 series amount';
				}
				elseif ($sp_002_type1 + $sp_002_type2 != $content['product_sp_box']){
					return 'Wrong sp_002 series amount';
				}
				elseif ($sp_003_type1 + $sp_003_type2 != $content['product_sp_box']){
					return 'Wrong sp_003 series amount';
				}
				else {
					$ingredient['sp_001_100'] += $sp_001_type1;
					$ingredient['sp_002_100'] += $sp_002_type1;
					$ingredient['sp_003_100'] += $sp_003_type1;
					$ingredient['package_007a'] += $sp_001_type1;
					$ingredient['package_008a'] += $sp_002_type1;
					$ingredient['package_009a'] += $sp_003_type1;
					$ingredient['product_sp_001a'] += $sp_001_type2;
					$ingredient['product_sp_002a'] += $sp_002_type2;
					$ingredient['product_sp_003a'] += $sp_003_type2;
					$ingredient['package_003'] += $content['product_sp_box'];
					$ingredient['package_004'] += $content['product_sp_box'];
					$ingredient['package_006'] += $content['product_sp_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_001'])) {
				$ingredient['slice_ss_001'] += 10 * $content['product_ss_001'];
				$ingredient['package_001'] += $content['product_ss_001'];
				$ingredient['package_002a'] += $content['product_ss_001'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_002'])) {
				$ingredient['slice_ss_002'] += 10 * $content['product_ss_002'];
				$ingredient['package_001'] += $content['product_ss_002'];
				$ingredient['package_002b'] += $content['product_ss_002'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_003'])) {
				$ingredient['slice_ss_003'] += 10 * $content['product_ss_003'];
				$ingredient['package_001'] += $content['product_ss_003'];
				$ingredient['package_002c'] += $content['product_ss_003'];
			}
			else {
				return 'Wrong input format';
			}
			if (is_nonnegativeInt($content['product_ss_box'])) {
				$ss_001_type1 = $content['ss_001_type1'];
				$ss_002_type1 = $content['ss_002_type1'];
				$ss_003_type1 = $content['ss_003_type1'];
				if (!is_nonnegativeInt($ss_001_type1) || !is_nonnegativeInt($ss_002_type1) || !is_nonnegativeInt($ss_003_type1)) {
					return 'Wrong input format';
				}
				elseif ($ss_001_type1 + $ss_002_type1 + $ss_003_type1 != $content['product_ss_box'] * 6){
					return 'Wrong ss series amount';
				}
				else {
					$ingredient['product_ss_001'] += $ss_001_type1;
					$ingredient['product_ss_002'] += $ss_002_type1;
					$ingredient['product_ss_003'] += $ss_003_type1;
					$ingredient['package_005'] += $content['product_ss_box'];
				}
			}
			else {
				return 'Wrong input format';
			}
			$sql2 = ($fetch1['AUTHORITY'] == 'B') ? mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Beitou' AND ACTCODE='1'") : mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='Yilan' AND ACTCODE='1'");
			$message = '';
			while ($fetch2 = mysql_fetch_array($sql2)) {
				if (in_array($fetch2['ITEMNO'], array('sp_001_100', 'sp_002_100', 'sp_003_100', 'sp_004_100', 'sp_005_100', 'sp_006_100', 'slice_ss_001', 'slice_ss_002', 'slice_ss_003', 'slice_ss_004', 'slice_ss_005', 'slice_ss_006', 'package_001', 'package_002a', 'package_002b', 'package_002c', 'package_003', 'package_004', 'package_005', 'package_006', 'package_007a', 'package_008a', 'package_009a', 'product_sp_001a', 'product_sp_002a', 'product_sp_003a', 'product_ss_001', 'product_ss_002', 'product_ss_003'))) {
					$ITEMNO = $fetch2['ITEMNO'];
					$ITEMNM = $fetch2['ITEMNM'];
					$amount = $ingredient[$ITEMNO];
					if ($fetch2['TOTALAMT'] < $amount) {
						$message .= $ITEMNM . "存量不足\n";
					}
				}
			}
			if (empty($message)) {
				package_to_product($ingredient, $content, $fetch1['AUTHORITY']);
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
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>北投庫存數量(g)</th><th>台東庫存數量(g)</th><th>宜蘭庫存數量(g)</th></tr>';
		$content = array('oil_001', 'oil_002', 'oil_003', 'oil_004', 'oil_005', 'oil_006', 'oil_007', 'oil_008', 'oil_009', 'oil_010', 'oil_011', 'oil_012', 'oil_013', 'oil_014', 'NaOH', 'additive_001', 'additive_002', 'additive_003', 'additive_004', 'additive_005', 'additive_006', 'additive_007', 'additive_008', 'additive_009', 'additive_010', 'additive_011', 'additive_012', 'additive_013', 'additive_014', 'additive_015', 'additive_016', 'additive_017');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Beitou', $item).'</td><td>'.inventory('Taitung', $item).'</td><td>'.inventory('Yilan', $item).'</td></tr>';
		}
		$queryResult .= '</table>';
	}
	elseif ($authority == 'B') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		$content = array('oil_001', 'oil_002', 'oil_003', 'oil_004', 'oil_005', 'oil_006', 'oil_007', 'oil_008', 'oil_009', 'oil_010', 'oil_011', 'oil_012', 'oil_013', 'oil_014', 'NaOH', 'additive_001', 'additive_002', 'additive_003', 'additive_004', 'additive_005', 'additive_006', 'additive_007', 'additive_008', 'additive_009', 'additive_010', 'additive_011', 'additive_012', 'additive_013', 'additive_014', 'additive_015', 'additive_016', 'additive_017');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Beitou', $item).'</td>'.compare($query[$item], inventory('Beitou', $item)).'</tr>';
		}
		$queryResult .= '</table>';
	}
	elseif ($authority == 'C') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		$content = array('oil_001', 'oil_002', 'oil_003', 'oil_004', 'oil_005', 'oil_006', 'oil_007', 'oil_008', 'oil_009', 'oil_010', 'oil_011', 'oil_012', 'oil_013', 'oil_014');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>Infinite</td></tr>';
		}
		$content = array('additive_001', 'additive_002', 'additive_003', 'additive_004', 'additive_005', 'additive_006', 'additive_007', 'additive_008', 'additive_009', 'additive_010', 'additive_011', 'additive_012', 'additive_013', 'additive_014', 'additive_015', 'additive_016', 'additive_017');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Houshanpi', $item).'</td>'.compare($query[$item], inventory('Houshanpi', $item)).'</tr>';
		}
		$queryResult .= '</table>';
	}
	elseif ($authority == 'D') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		$content = array('oil_001', 'oil_002', 'oil_003', 'oil_004', 'oil_005', 'oil_006', 'oil_007', 'oil_008', 'oil_009', 'oil_010', 'oil_011', 'oil_012', 'oil_013', 'oil_014', 'NaOH', 'additive_001', 'additive_002', 'additive_003', 'additive_004', 'additive_005', 'additive_006', 'additive_007', 'additive_008', 'additive_009', 'additive_010', 'additive_011', 'additive_012', 'additive_013', 'additive_014', 'additive_015', 'additive_016', 'additive_017');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Taitung', $item).'</td>'.compare($query[$item], inventory('Taitung', $item)).'</tr>';
		}
		$queryResult .= '</table>';
	}
	elseif ($authority == 'I') {
		$queryResult = '<table><tr><th>原料</th><th>所需數量(g)</th><th>庫存數量(g)</th></tr>';
		$content = array('oil_001', 'oil_002', 'oil_003', 'oil_004', 'oil_005', 'oil_006', 'oil_007', 'oil_008', 'oil_009', 'oil_010', 'oil_011', 'oil_012', 'oil_013', 'oil_014', 'NaOH', 'additive_001', 'additive_002', 'additive_003', 'additive_004', 'additive_005', 'additive_006', 'additive_007', 'additive_008', 'additive_009', 'additive_010', 'additive_011', 'additive_012', 'additive_013', 'additive_014', 'additive_015', 'additive_016', 'additive_017');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Yilan', $item).'</td>'.compare($query[$item], inventory('Yilan', $item)).'</tr>';
		}
		$queryResult .= '</table>';
	}
	return $queryResult;
}

function queryPackageTable($message) {
	$authority = $message['authority'];
	$query = $message['ingredient'];
	$queryResult = '<table><tr><th>原料</th><th>所需數量</th><th>庫存數量</th></tr>';
	if ($authority == 'B') {
		$content = array('sp_001_100', 'sp_002_100', 'sp_003_100', 'sp_004_100', 'sp_005_100', 'sp_006_100', 'slice_ss_001', 'slice_ss_002', 'slice_ss_003', 'slice_ss_004', 'slice_ss_005', 'slice_ss_006', 'package_001', 'package_002a', 'package_002b', 'package_002c', 'package_003', 'package_004', 'package_005', 'package_006', 'package_007a', 'package_008a', 'package_009a', 'product_sp_001a', 'product_sp_002a', 'product_sp_003a', 'product_ss_001', 'product_ss_002', 'product_ss_003');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Beitou', $item).'</td>'.compare($query[$item], inventory('Beitou', $item)).'</tr>';
		}
	}
	elseif ($authority == 'I') {
		$content = array('sp_001_100', 'sp_002_100', 'sp_003_100', 'sp_004_100', 'sp_005_100', 'sp_006_100', 'slice_ss_001', 'slice_ss_002', 'slice_ss_003', 'slice_ss_004', 'slice_ss_005', 'slice_ss_006', 'package_001', 'package_002a', 'package_002b', 'package_002c', 'package_003', 'package_004', 'package_005', 'package_006', 'package_007a', 'package_008a', 'package_009a', 'product_sp_001a', 'product_sp_002a', 'product_sp_003a', 'product_ss_001', 'product_ss_002', 'product_ss_003');
		while ($item = array_shift($content)) {
			if ($query[$item] != 0) $queryResult .= '<tr><td>'.query_name($item).'</td><td>'.$query[$item].'</td><td>'.inventory('Yilan', $item).'</td>'.compare($query[$item], inventory('Yilan', $item)).'</tr>';
		}
	}	
	$queryResult .= '</table>';
	return $queryResult;
}

function ingredient_to_product($ingredient, $product, $whouse) {
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	$today = date("Ymd");
	if (in_array($whouse, array('Beitou', 'Taitung', 'Yilan'))) {
		$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND (ITEMCLASS='A' OR ITEMCLASS='B') AND ACTCODE='1'");
		while ($fetch1 = mysql_fetch_array($sql1)) {
			$ITEMNO = $fetch1['ITEMNO'];
			$ITEMNM = $fetch1['ITEMNM'];
			$amount = $ingredient[$ITEMNO];
			if ($amount > 0) {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$whouse' AND ITEMNO='$ITEMNO'");
			}
		}
		$content = array('sp_001', 'sp_002', 'sp_003', 'sp_004', 'sp_005', 'sp_006', 'ss_001', 'ss_002', 'ss_003', 'ss_004', 'ss_005', 'ss_006', 'ss_007', 'ss_008', 'ss_009', 'ss_010', 'ss_011');
		while ($item = array_pop($content)) {
			if (is_positiveInt($product[$item])) {
				$ITEMNO = $item . '_' . $today;
				$ITEMNM = $today . '的' . query_name($item);
				$amount = $product[$item] * 1000;
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
		$content = array('sp_001', 'sp_002', 'sp_003');
		while ($item = array_pop($content)) {
			if (is_positiveInt($product[$item])) {
				$ITEMNO = $item . '_houshanpi_' . $today;
				$ITEMNM = $today . '的後山埤的' . query_name($item);
				$amount = $product[$item] * 1000;
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
}

function package_to_product($package, $product, $authority) {
	date_default_timezone_set('Asia/Taipei');
	$date = date("Y-m-d H:i:s");
	$today = date("Ymd");
	$location = ($authority == 'B') ? 'Beitou' : 'Yilan';
	$sql1 = mysql_query("SELECT * FROM WHOUSEITEMMAS WHERE WHOUSENO='$location' AND ACTCODE='1'");
	while ($fetch1 = mysql_fetch_array($sql1)) {
		if (in_array($fetch1['ITEMNO'], array('sp_001_100', 'sp_002_100', 'sp_003_100', 'sp_004_100', 'sp_005_100', 'sp_006_100', 'slice_ss_001', 'slice_ss_002', 'slice_ss_003', 'slice_ss_004', 'slice_ss_005', 'slice_ss_006', 'package_001', 'package_002a', 'package_002b', 'package_002c', 'package_003', 'package_004', 'package_005', 'package_006', 'package_007a', 'package_008a', 'package_009a', 'product_sp_001a', 'product_sp_002a', 'product_sp_003a', 'product_ss_001', 'product_ss_002', 'product_ss_003'))) {
			$ITEMNO = $fetch1['ITEMNO'];
			$ITEMNM = $fetch1['ITEMNM'];
			$amount = $package[$ITEMNO];
			if ($amount > 0) {
				mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT-'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$ITEMNO'");
			}
		}
	}
	$content = array('product_sp_001a', 'product_sp_002a', 'product_sp_003a', 'product_sp_box', 'product_ss_001', 'product_ss_002', 'product_ss_003', 'product_ss_box');
	while ($item = array_pop($content)) {
		if (is_positiveInt($product[$item])) {
			$ITEMNO = $item;
			$amount = $product[$item];
			mysql_query("UPDATE WHOUSEITEMMAS SET TOTALAMT=TOTALAMT+'$amount', UPDATEDATE='$date' WHERE WHOUSENO='$location' AND ITEMNO='$ITEMNO'");
		}
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

function query_name($itemno) {
	$sql = mysql_query("SELECT ITEMNM FROM ITEMMAS WHERE ITEMNO='$itemno'");
	$fetch = mysql_fetch_row($sql);
	return $fetch[0];
}