<?php
include_once("../resource/database.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	if ($_GET['module'] == 'item') {
		if ($_GET['event'] == 'search') {
			$message = search($_GET);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'query' => $message['query']));
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
	if ($_POST['module'] == 'item') {
		if ($_POST['event'] == 'search') {
			$message = search($_POST);
			if (is_array($message)) {
				echo json_encode(array('message' => $message['message'], 'query' => $message['query']));
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

function search($content) {
	$account = $content['account'];
	$token = $content['token'];
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
			$product = array();
			$amount = array();
			for ($i = 1; $i < 10; $i++) {
				if (isset($content['product'.$i]) && is_positiveInt($content['amount'.$i])) {
					array_push($product, $content['product'.$i]);
					array_push($amount, $content['amount'.$i]);
				}
			}
			$query = query($product, $amount);
			$queryResultTable = queryResultTable($query);
			return array('message' => 'Success', 'query' => $queryResultTable);
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

function query($product, $amount) {
	$ingredient = array('oil_1' => 0, 'oil_2' => 0, 'oil_3' => 0, 'oil_4' => 0, 'oil_5' => 0, 'oil_6' => 0, 'oil_7' => 0, 'oil_8' => 0, 'additive_1' => 0, 'additive_2' => 0, 'additive_3' => 0, 'additive_4' => 0, 'additive_5' => 0, 'additive_6' => 0, 'additive_7' => 0, 'additive_8' => 0, 'additive_9' => 0, 'additive_10' => 0, 'additive_11' => 0, 'NaOH' => 0);
	for ($i = 0; $i < count($product); $i++) {
		if ($product[$i] == 'sp_1') {
			$ingredient['oil_1'] += 360 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 160 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 120 / 0.9 * $amount[$i];
			$ingredient['oil_4'] += 80 / 0.9 * $amount[$i];
			$ingredient['additive_4'] += 5 * $amount[$i];
			$ingredient['additive_5'] += 5 * $amount[$i];
			$ingredient['additive_6'] += 5 * $amount[$i];
			$ingredient['additive_11'] += 80 * $amount[$i];
			$ingredient['NaOH'] += 108 * $amount[$i];
		}
		elseif ($product[$i] == 'sp_2') {
			$ingredient['oil_1'] += 425 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 170 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 170 / 0.9 * $amount[$i];
			$ingredient['additive_1'] += 5 * $amount[$i];
			$ingredient['additive_11'] += 85 * $amount[$i];
			$ingredient['NaOH'] += 118 * $amount[$i];
		}
		elseif ($product[$i] == 'sp_3') {
			$ingredient['oil_1'] += 280 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 160 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 200 / 0.9 * $amount[$i];
			$ingredient['oil_6'] += 80 / 0.9 * $amount[$i];
			$ingredient['additive_2'] += 5 * $amount[$i];
			$ingredient['additive_3'] += 60 * $amount[$i];
			$ingredient['additive_11'] += 80 * $amount[$i];
			$ingredient['NaOH'] += 112 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_1') {
			$ingredient['oil_2'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 225 / 0.9 * $amount[$i];
			$ingredient['oil_4'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_7'] += 75 / 0.9 * $amount[$i];
			$ingredient['oil_8'] += 150 / 0.9 * $amount[$i];
			$ingredient['additive_10'] += 6 * $amount[$i];
			$ingredient['NaOH'] += 107 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_2') {
			$ingredient['oil_2'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 225 / 0.9 * $amount[$i];
			$ingredient['oil_4'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_7'] += 75 / 0.9 * $amount[$i];
			$ingredient['oil_8'] += 150 / 0.9 * $amount[$i];
			$ingredient['additive_9'] += 15 * $amount[$i];
			$ingredient['NaOH'] += 107 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_3') {
			$ingredient['oil_1'] += 337.5 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 187.5 / 0.9 * $amount[$i];
			$ingredient['oil_6'] += 75 / 0.9 * $amount[$i];
			$ingredient['additive_8'] += 6 * $amount[$i];
			$ingredient['NaOH'] += 106 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_4') {
			$ingredient['oil_1'] += 300 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 112.5 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 112.5 / 0.9 * $amount[$i];
			$ingredient['oil_4'] += 150 / 0.9 * $amount[$i];
			$ingredient['additive_7'] += 6 * $amount[$i];
			$ingredient['additive_11'] += 75 * $amount[$i];
			$ingredient['NaOH'] += 101 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_5') {
			$ingredient['oil_1'] += 300 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 112.5 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 112.5 / 0.9 * $amount[$i];
			$ingredient['oil_4'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_5'] += 5 / 0.9 * $amount[$i];
			$ingredient['additive_7'] += 6 * $amount[$i];
			$ingredient['NaOH'] += 101 * $amount[$i];
		}
		elseif ($product[$i] == 'ss_6') {
			$ingredient['oil_1'] += 337.5 / 0.9 * $amount[$i];
			$ingredient['oil_2'] += 150 / 0.9 * $amount[$i];
			$ingredient['oil_3'] += 187.5 / 0.9 * $amount[$i];
			$ingredient['oil_6'] += 75 / 0.9 * $amount[$i];
			$ingredient['additive_5'] += 5 * $amount[$i];
			$ingredient['NaOH'] += 106 * $amount[$i];
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
	return $ingredient;
}

function inventory($whouse, $item) {
	$sqlQuery = mysql_query("SELECT TOTALAMT FROM WHOUSEITEMMAS WHERE WHOUSENO='$whouse' AND ITEMNO='$item'");
	if ($sqlQuery == false) {
		return 0;
	}
	else {
		$sqlFetch = mysql_fetch_row($sqlQuery);
		return $sqlFetch[0];
	}
}

function queryResultTable($query) {
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
	return $queryResult;
}