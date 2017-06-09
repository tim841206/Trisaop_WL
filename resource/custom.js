function login() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var account = document.getElementById("account").value;
	var password = document.getElementById("password").value;
	var data = "module=member&event=login&account=" + account + "&password=" + password;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				var html = document.getElementsByTagName('html')[0];
				html.innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function login_clear() {
	document.getElementById("account").value = null;
	document.getElementById("password").value = null;
}

function logon() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var account = document.getElementById("new_account").value;
	var name = document.getElementById("name").value;
	var password1 = document.getElementById("password1").value;
	var password2 = document.getElementById("password2").value;
	var authority = document.getElementById("authority").value;
	var data = "module=member&event=logon&account=" + account + "&name=" + name + "&password1=" + password1 + "&password2=" + password2 + "&authority=" + authority;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("註冊成功，請通知管理員授權");
			}
			else {
				alert(data.message);
			}
		}
	}
}

function logon_clear() {
	document.getElementById("new_account").value = null;
	document.getElementById("name").value = null;
	document.getElementById("password1").value = null;
	document.getElementById("password2").value = null;
	document.getElementById("authority").value = null;
}

function change_password() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var ori_password = document.getElementById("ori_password").value;
	var new_password1 = document.getElementById("new_password1").value;
	var new_password2 = document.getElementById("new_password2").value;
	var data = "module=member&event=change_password&ori_password=" + ori_password + "&new_password1=" + new_password1 + "&new_password2=" + new_password2;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message != 'Success') {
				alert(data.message);
			}
		}
	}
}

function change_password_clear() {
	document.getElementById("ori_password").value = null;
	document.getElementById("new_password1").value = null;
	document.getElementById("new_password2").value = null;
}

function logout() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=member&event=logout";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				var html = document.getElementsByTagName('html')[0];
				html.innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function request_notice() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=notice";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_notice_content").innerHTML = data.content;
				document.getElementById("request_notice").style.display = null;
			}
			else if (data.message != 'No data'){
				alert(data.message);
			}
		}
	}
}

function member_notice() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=member&event=notice";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("member_notice_content").innerHTML = data.content;
				document.getElementById("member_notice").style.display = null;
			}
			else if (data.message != 'No data'){
				alert(data.message);
			}
		}
	}
}

function calculate_search() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var sp_1 = document.getElementById("calculate_sp_1").value;
	var sp_2 = document.getElementById("calculate_sp_2").value;
	var sp_3 = document.getElementById("calculate_sp_3").value;
	var ss_1 = document.getElementById("calculate_ss_1").value;
	var ss_2 = document.getElementById("calculate_ss_2").value;
	var ss_3 = document.getElementById("calculate_ss_3").value;
	var ss_4 = document.getElementById("calculate_ss_4").value;
	var ss_5 = document.getElementById("calculate_ss_5").value;
	var ss_6 = document.getElementById("calculate_ss_6").value;
	var data = "module=item&event=search&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("queryResult").innerHTML = data.query;
				document.getElementById("query").style.display = null;
				var produce = document.getElementById("produce");
				if (produce != null) {
					produce.style.display = null;
				}
			}
			else {
				alert(data.message);
			}
		}
	}
}

function produce() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var sp_1 = document.getElementById("calculate_sp_1").value;
	var sp_2 = document.getElementById("calculate_sp_2").value;
	var sp_3 = document.getElementById("calculate_sp_3").value;
	var ss_1 = document.getElementById("calculate_ss_1").value;
	var ss_2 = document.getElementById("calculate_ss_2").value;
	var ss_3 = document.getElementById("calculate_ss_3").value;
	var ss_4 = document.getElementById("calculate_ss_4").value;
	var ss_5 = document.getElementById("calculate_ss_5").value;
	var ss_6 = document.getElementById("calculate_ss_6").value;
	var data = "module=item&event=produce&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("queryResult").innerHTML = data.query;
				document.getElementById("query").style.display = null;
				var produce = document.getElementById("produce");
				if (produce != null) {
					produce.style.display = null;
				}
			}
			else {
				alert(data.message);
			}
		}
	}
}

function whouse() {
	var whouse = document.getElementById("whouse").value;
	var itemclass = document.getElementById("itemclass");
	while (itemclass.options.length) {
		itemclass.options.remove(0);
	}
	if (whouse == 'all' || whouse == 'Beitou') {
		var option1 = document.createElement("option");
		var option2 = document.createElement("option");
		var option3 = document.createElement("option");
		var option4 = document.createElement("option");
		var option5 = document.createElement("option");
		var option6 = document.createElement("option");
		var option7 = document.createElement("option");
		option1.text = '油品'; option1.value = 'A'; itemclass.add(option1);
		option2.text = '添加物'; option2.value = 'B'; itemclass.add(option2);
		option3.text = '包裝'; option3.value = 'C'; itemclass.add(option3);
		option4.text = '商品'; option4.value = 'D'; itemclass.add(option4);
		option5.text = '產品'; option5.value = 'E'; itemclass.add(option5);
		option6.text = '半成品'; option6.value = 'F'; itemclass.add(option6);
		option7.text = '後山埤產品'; option6.value = 'H'; itemclass.add(option7);
	}
	else if (whouse == 'Houshanpi') {
		var option1 = document.createElement("option");
		option1.text = '後山埤產品'; option1.value = 'H'; itemclass.add(option1);
	}
	else if (whouse == 'Taitung') {
		var option1 = document.createElement("option");
		var option2 = document.createElement("option");
		var option3 = document.createElement("option");
		var option4 = document.createElement("option");
		var option5 = document.createElement("option");
		var option6 = document.createElement("option");
		option1.text = '油品'; option1.value = 'A'; itemclass.add(option1);
		option2.text = '添加物'; option2.value = 'B'; itemclass.add(option2);
		option3.text = '包裝'; option3.value = 'C'; itemclass.add(option3);
		option4.text = '商品'; option4.value = 'D'; itemclass.add(option4);
		option5.text = '產品'; option5.value = 'E'; itemclass.add(option5);
		option6.text = '半成品'; option6.value = 'F'; itemclass.add(option6);
	}
	document.getElementById("itemclass").onchange();
}

function itemclass() {
	var whouse = document.getElementById("whouse").value;
	var itemclass = document.getElementById("itemclass").value;
	var item = document.getElementById("itemno");
	while (item.options.length) {
		item.options.remove(0);
	}
	if (whouse == 'all' || whouse == 'Beitou') {
		if (itemclass == 'A') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '橄欖油'; option1.value = 'oil_1'; item.add(option1);
			option2.text = '棕梠油'; option2.value = 'oil_2'; item.add(option2);
			option3.text = '椰子油'; option3.value = 'oil_3'; item.add(option3);
			option4.text = '米糠油'; option4.value = 'oil_4'; item.add(option4);
			option5.text = '紅棕梠油'; option5.value = 'oil_5'; item.add(option5);
			option6.text = '葡萄籽油'; option6.value = 'oil_6'; item.add(option6);
			option7.text = '苦茶油'; option7.value = 'oil_7'; item.add(option7);
			option8.text = '蓖麻油'; option8.value = 'oil_8'; item.add(option8);
		}
		else if (itemclass == 'B') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			var option10 = document.createElement("option");
			var option11 = document.createElement("option");
			var option12 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '金針花瓣'; option1.value = 'additive_1'; item.add(option1);
			option2.text = '釋迦果粉'; option2.value = 'additive_2'; item.add(option2);
			option3.text = '釋迦果泥'; option3.value = 'additive_3'; item.add(option3);
			option4.text = '米粉'; option4.value = 'additive_4'; item.add(option4);
			option5.text = '蕁麻葉粉'; option5.value = 'additive_5'; item.add(option5);
			option6.text = '金盞花粉'; option6.value = 'additive_6'; item.add(option6);
			option7.text = '金針花粉'; option7.value = 'additive_7'; item.add(option7);
			option8.text = '薑黃粉'; option8.value = 'additive_8'; item.add(option8);
			option9.text = '紅麴粉'; option9.value = 'additive_9'; item.add(option9);
			option10.text = '洛神花粉'; option10.value = 'additive_10'; item.add(option10);
			option11.text = '乳油木果脂'; option11.value = 'additive_11'; item.add(option11);
			option12.text = '鹼'; option12.value = 'NaOH'; item.add(option12);
		}
		else if (itemclass == 'C') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '不織布包'; option1.value = 'package_1'; item.add(option1);
			option2.text = '鋁包'; option2.value = 'package_2'; item.add(option2);
			option3.text = '大禮盒'; option3.value = 'package_3'; item.add(option3);
			option4.text = '小禮盒'; option4.value = 'package_1'; item.add(option4);
			option5.text = '內襯'; option5.value = 'package_2'; item.add(option5);
			option6.text = '單顆皂外盒'; option6.value = 'package_3'; item.add(option6);
		}
		else if (itemclass == 'D') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '田靜山巒禾風皂'; option1.value = 'product_sp_1'; item.add(option1);
			option2.text = '金絲森林渲染皂'; option2.value = 'product_sp_2'; item.add(option2);
			option3.text = '釋迦手感果力皂'; option3.value = 'product_sp_3'; item.add(option3);
			option4.text = '三三台東意象禮盒組'; option4.value = 'product_sp_box'; item.add(option4);
			option5.text = '洛神紅麴旅用皂絲'; option5.value = 'product_ss_1'; item.add(option5);
			option6.text = '暖暖薑黃旅用皂絲'; option6.value = 'product_ss_2'; item.add(option6);
			option7.text = '萱草米黃旅用皂絲'; option7.value = 'product_ss_3'; item.add(option7);
			option8.text = '三三台東意象皂絲旅行組'; option8.value = 'product_ss_box'; item.add(option8);
		}
		else if (itemclass == 'E') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '米皂'; option1.value = 'sp_1'; item.add(option1);
			option2.text = '金針皂'; option2.value = 'sp_2'; item.add(option2);
			option3.text = '釋迦皂'; option3.value = 'sp_3'; item.add(option3);
			option4.text = '洛神皂絲'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂絲'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂絲'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '金針皂絲'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '紅棕梠皂絲'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '蕁麻葉皂絲'; option9.value = 'ss_6'; item.add(option9);
		}
		else if (itemclass == 'F') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '米皂'; option1.value = 'sp_1'; item.add(option1);
			option2.text = '金針皂'; option2.value = 'sp_2'; item.add(option2);
			option3.text = '釋迦皂'; option3.value = 'sp_3'; item.add(option3);
			option4.text = '洛神皂絲'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂絲'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂絲'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '金針皂絲'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '紅棕梠皂絲'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '蕁麻葉皂絲'; option9.value = 'ss_6'; item.add(option9);
		}
		else if (itemclass == 'H') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '後山埤的米皂'; option1.value = 'sp_1_houshanpi'; item.add(option1);
			option2.text = '後山埤的金針皂'; option2.value = 'sp_2_houshanpi'; item.add(option2);
			option3.text = '後山埤的釋迦皂'; option3.value = 'sp_3_houshanpi'; item.add(option3);
		}
	}
	else if (whouse == 'Houshanpi') {
		if (itemclass == 'H') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '後山埤的米皂'; option1.value = 'sp_1_houshanpi'; item.add(option1);
			option2.text = '後山埤的金針皂'; option2.value = 'sp_2_houshanpi'; item.add(option2);
			option3.text = '後山埤的釋迦皂'; option3.value = 'sp_3_houshanpi'; item.add(option3);
		}
	}
	else if (whouse == 'Taitung') {
		if (itemclass == 'A') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '橄欖油'; option1.value = 'oil_1'; item.add(option1);
			option2.text = '棕梠油'; option2.value = 'oil_2'; item.add(option2);
			option3.text = '椰子油'; option3.value = 'oil_3'; item.add(option3);
			option4.text = '米糠油'; option4.value = 'oil_4'; item.add(option4);
			option5.text = '紅棕梠油'; option5.value = 'oil_5'; item.add(option5);
			option6.text = '葡萄籽油'; option6.value = 'oil_6'; item.add(option6);
			option7.text = '苦茶油'; option7.value = 'oil_7'; item.add(option7);
			option8.text = '蓖麻油'; option8.value = 'oil_8'; item.add(option8);
		}
		else if (itemclass == 'B') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			var option10 = document.createElement("option");
			var option11 = document.createElement("option");
			var option12 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '金針花瓣'; option1.value = 'additive_1'; item.add(option1);
			option2.text = '釋迦果粉'; option2.value = 'additive_2'; item.add(option2);
			option3.text = '釋迦果泥'; option3.value = 'additive_3'; item.add(option3);
			option4.text = '米粉'; option4.value = 'additive_4'; item.add(option4);
			option5.text = '蕁麻葉粉'; option5.value = 'additive_5'; item.add(option5);
			option6.text = '金盞花粉'; option6.value = 'additive_6'; item.add(option6);
			option7.text = '金針花粉'; option7.value = 'additive_7'; item.add(option7);
			option8.text = '薑黃粉'; option8.value = 'additive_8'; item.add(option8);
			option9.text = '紅麴粉'; option9.value = 'additive_9'; item.add(option9);
			option10.text = '洛神花粉'; option10.value = 'additive_10'; item.add(option10);
			option11.text = '乳油木果脂'; option11.value = 'additive_11'; item.add(option11);
			option12.text = '鹼'; option12.value = 'NaOH'; item.add(option12);
		}
		else if (itemclass == 'C') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '不織布包'; option1.value = 'package_1'; item.add(option1);
			option2.text = '鋁包'; option2.value = 'package_2'; item.add(option2);
			option3.text = '大禮盒'; option3.value = 'package_3'; item.add(option3);
			option4.text = '小禮盒'; option4.value = 'package_1'; item.add(option4);
			option5.text = '內襯'; option5.value = 'package_2'; item.add(option5);
			option6.text = '單顆皂外盒'; option6.value = 'package_3'; item.add(option6);
		}
		else if (itemclass == 'D') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '田靜山巒禾風皂'; option1.value = 'product_sp_1'; item.add(option1);
			option2.text = '金絲森林渲染皂'; option2.value = 'product_sp_2'; item.add(option2);
			option3.text = '釋迦手感果力皂'; option3.value = 'product_sp_3'; item.add(option3);
			option4.text = '三三台東意象禮盒組'; option4.value = 'product_sp_box'; item.add(option4);
			option5.text = '洛神紅麴旅用皂絲'; option5.value = 'product_ss_1'; item.add(option5);
			option6.text = '暖暖薑黃旅用皂絲'; option6.value = 'product_ss_2'; item.add(option6);
			option7.text = '萱草米黃旅用皂絲'; option7.value = 'product_ss_3'; item.add(option7);
			option8.text = '三三台東意象皂絲旅行組'; option8.value = 'product_ss_box'; item.add(option8);
		}
		else if (itemclass == 'E') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '米皂'; option1.value = 'sp_1'; item.add(option1);
			option2.text = '金針皂'; option2.value = 'sp_2'; item.add(option2);
			option3.text = '釋迦皂'; option3.value = 'sp_3'; item.add(option3);
			option4.text = '洛神皂絲'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂絲'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂絲'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '金針皂絲'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '紅棕梠皂絲'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '蕁麻葉皂絲'; option9.value = 'ss_6'; item.add(option9);
		}
		else if (itemclass == 'F') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			var option4 = document.createElement("option");
			var option5 = document.createElement("option");
			var option6 = document.createElement("option");
			var option7 = document.createElement("option");
			var option8 = document.createElement("option");
			var option9 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '米皂'; option1.value = 'sp_1'; item.add(option1);
			option2.text = '金針皂'; option2.value = 'sp_2'; item.add(option2);
			option3.text = '釋迦皂'; option3.value = 'sp_3'; item.add(option3);
			option4.text = '洛神皂絲'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂絲'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂絲'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '金針皂絲'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '紅棕梠皂絲'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '蕁麻葉皂絲'; option9.value = 'ss_6'; item.add(option9);
		}
	}
}

function whouse_view() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var queryString = "index.php?module=whouse&event=view";
	request.open("GET", queryString);
	request.send();
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("whouse_view_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function whouse_search() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var whouse = document.getElementById("whouse").value;
	var itemclass = document.getElementById("itemclass").value;
	var itemno = document.getElementById("itemno").value;
	var data = "module=whouse&event=search&whouseno=" + whouse + "&itemclass=" + itemclass + "&itemno=" + itemno;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("whouse_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function package() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var product_sp_1 = document.getElementById("package_sp_1").value;
	var product_sp_2 = document.getElementById("package_sp_2").value;
	var product_sp_3 = document.getElementById("package_sp_3").value;
	var product_sp_box = document.getElementById("package_sp_box").value;
	var product_ss_1 = document.getElementById("package_ss_1").value;
	var product_ss_2 = document.getElementById("package_ss_2").value;
	var product_ss_3 = document.getElementById("package_ss_3").value;
	var product_ss_box = document.getElementById("package_ss_box").value;
	var data = "module=item&event=package&product_sp_1=" + product_sp_1 + "&product_sp_2=" + product_sp_2 + "&product_sp_3=" + product_sp_3 + "&product_sp_box=" + product_sp_box + "&product_ss_1=" + product_ss_1 + "&product_ss_2=" + product_ss_2 + "&product_ss_3=" + product_ss_3 + "&product_ss_box=" + product_ss_box;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("result_package_sp_1").innerHTML = data.sp_1;
				document.getElementById("result_package_sp_2").innerHTML = data.sp_2;
				document.getElementById("result_package_sp_3").innerHTML = data.sp_3;
				document.getElementById("result_package_ss_1").innerHTML = data.ss_1;
				document.getElementById("result_package_ss_2").innerHTML = data.ss_2;
				document.getElementById("result_package_ss_3").innerHTML = data.ss_3;
				document.getElementById("result_package_ss_4").innerHTML = data.ss_4;
				document.getElementById("result_package_ss_5").innerHTML = data.ss_5;
				document.getElementById("result_package_ss_6").innerHTML = data.ss_6;
				document.getElementById("result_package_package_1").innerHTML = data.package_1;
				document.getElementById("result_package_package_2").innerHTML = data.package_2;
				document.getElementById("result_package_package_3").innerHTML = data.package_3;
				document.getElementById("result_package_package_4").innerHTML = data.package_4;
				document.getElementById("result_package_package_5").innerHTML = data.package_5;
				document.getElementById("result_package_package_6").innerHTML = data.package_6;
			}
			else {
				alert(data.message);
			}
		}
	}
	
}

function request_view() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=view";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_view_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function search_index() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var index = document.getElementById("index").value;
	var data = "module=request&event=search_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function search_state() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var state = document.getElementById("state").value;
	var data = "module=request&event=search_state&state=" + state;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function view_index(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var index = document.getElementById("index").value;
	var data = "module=request&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("view_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function sender() {
	var sender = document.getElementById("sender").value;
	var receiver = document.getElementById("receiver");
	while (receiver.options.length) {
		receiver.options.remove(0);
	}
	if (sender == 'Trisoap') {
		var option1 = document.createElement("option");
		var option2 = document.createElement("option");
		var option3 = document.createElement("option");
		option1.text = '請選擇'; option1.value = ''; receiver.add(option1);
		option2.text = '北投'; option2.value = 'Beitou'; receiver.add(option2);
		option3.text = '台東'; option3.value = 'Taitung'; receiver.add(option3);
	}
	else if (sender == 'Beitou') {
		var option1 = document.createElement("option");
		option1.text = '出貨'; option1.value = 'Trisoap'; receiver.add(option1);
	}
	else if (sender == 'Houshanpi') {
		var option1 = document.createElement("option");
		var option2 = document.createElement("option");
		var option3 = document.createElement("option");
		option1.text = '請選擇'; option1.value = ''; receiver.add(option1);
		option2.text = '北投'; option2.value = 'Beitou'; receiver.add(option2);
		option3.text = '台東'; option3.value = 'Taitung'; receiver.add(option3);
	}
	else if (sender == 'Taitung') {
		var option1 = document.createElement("option");
		option1.text = '北投'; option1.value = 'Beitou'; receiver.add(option1);
	}
	document.getElementById("receiver").onchange();
}

function receiver() {
	var sender = document.getElementById("sender").value;
	var receiver = document.getElementById("receiver").value;
	if (sender == 'Trisoap') {
		if (receiver == 'Beitou' || receiver == 'Taitung') {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = null;
			document.getElementsByClassName("material_C")[1].style.display = null;
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else if (sender == 'Beitou') {
		if (receiver == 'Trisoap') {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = null;
			document.getElementsByClassName("material_D")[1].style.display = null;
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else if (sender == 'Houshanpi') {
		if (receiver == 'Beitou') {
			document.getElementsByClassName("material_A")[0].style.display = null;
			document.getElementsByClassName("material_A")[1].style.display = null;
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = null;
			document.getElementsByClassName("material_H")[1].style.display = null;
			document.getElementById("content").style.display = null;
		}
		else if (receiver == 'Taitung') {
			document.getElementsByClassName("material_A")[0].style.display = null;
			document.getElementsByClassName("material_A")[1].style.display = null;
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else if (sender == 'Taitung') {
		if (receiver == 'Beitou') {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = null;
			document.getElementsByClassName("material_E")[1].style.display = null;
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_A")[0].style.display = 'none';
			document.getElementsByClassName("material_A")[1].style.display = 'none';
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_D")[0].style.display = 'none';
			document.getElementsByClassName("material_D")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
}

function send() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var sender = document.getElementById("sender").value;
	var receiver = document.getElementById("receiver").value;
	var data = "module=request&event=send&sender=" + sender + "&receiver=" + receiver;

	var oil_1 = document.getElementById("oil_1").value;
	if (oil_1 != null && oil_1 != 0) queryString = queryString + "&oil_1=" + oil_1;
	var oil_2 = document.getElementById("oil_2").value;
	if (oil_2 != null && oil_2 != 0) queryString = queryString + "&oil_2=" + oil_2;
	var oil_3 = document.getElementById("oil_3").value;
	if (oil_3 != null && oil_3 != 0) queryString = queryString + "&oil_3=" + oil_3;
	var oil_4 = document.getElementById("oil_4").value;
	if (oil_4 != null && oil_4 != 0) queryString = queryString + "&oil_4=" + oil_4;
	var oil_5 = document.getElementById("oil_5").value;
	if (oil_5 != null && oil_5 != 0) queryString = queryString + "&oil_5=" + oil_5;
	var oil_6 = document.getElementById("oil_6").value;
	if (oil_6 != null && oil_6 != 0) queryString = queryString + "&oil_6=" + oil_6;
	var oil_7 = document.getElementById("oil_7").value;
	if (oil_7 != null && oil_7 != 0) queryString = queryString + "&oil_7=" + oil_7;
	var oil_8 = document.getElementById("oil_8").value;
	if (oil_8 != null && oil_8 != 0) queryString = queryString + "&oil_8=" + oil_8;

	var additive_1 = document.getElementById("additive_1").value;
	if (additive_1 != null && additive_1 != 0) queryString = queryString + "&additive_1=" + additive_1;
	var additive_2 = document.getElementById("additive_2").value;
	if (additive_2 != null && additive_2 != 0) queryString = queryString + "&additive_2=" + additive_2;
	var additive_3 = document.getElementById("additive_3").value;
	if (additive_3 != null && additive_3 != 0) queryString = queryString + "&additive_3=" + additive_3;
	var additive_4 = document.getElementById("additive_4").value;
	if (additive_4 != null && additive_4 != 0) queryString = queryString + "&additive_4=" + additive_4;
	var additive_5 = document.getElementById("additive_5").value;
	if (additive_5 != null && additive_5 != 0) queryString = queryString + "&additive_5=" + additive_5;
	var additive_6 = document.getElementById("additive_6").value;
	if (additive_6 != null && additive_6 != 0) queryString = queryString + "&additive_6=" + additive_6;
	var additive_7 = document.getElementById("additive_7").value;
	if (additive_7 != null && additive_7 != 0) queryString = queryString + "&additive_7=" + additive_7;
	var additive_8 = document.getElementById("additive_8").value;
	if (additive_8 != null && additive_8 != 0) queryString = queryString + "&additive_8=" + additive_8;
	var additive_9 = document.getElementById("additive_9").value;
	if (additive_9 != null && additive_9 != 0) queryString = queryString + "&additive_9=" + additive_9;
	var additive_10 = document.getElementById("additive_10").value;
	if (additive_10 != null && additive_10 != 0) queryString = queryString + "&additive_10=" + additive_10;
	var additive_11 = document.getElementById("additive_11").value;
	if (additive_11 != null && additive_11 != 0) queryString = queryString + "&additive_11=" + additive_11;
	var additive_12 = document.getElementById("additive_12").value;
	if (additive_12 != null && additive_12 != 0) queryString = queryString + "&additive_12=" + additive_12;

	var package_1 = document.getElementById("package_1").value;
	if (package_1 != null && package_1 != 0) queryString = queryString + "&package_1=" + package_1;
	var package_2 = document.getElementById("package_2").value;
	if (package_2 != null && package_2 != 0) queryString = queryString + "&package_2=" + package_2;
	var package_3 = document.getElementById("package_3").value;
	if (package_3 != null && package_3 != 0) queryString = queryString + "&package_3=" + package_3;
	var package_4 = document.getElementById("package_4").value;
	if (package_4 != null && package_4 != 0) queryString = queryString + "&package_4=" + package_4;
	var package_5 = document.getElementById("package_5").value;
	if (package_5 != null && package_5 != 0) queryString = queryString + "&package_5=" + package_5;
	var package_6 = document.getElementById("package_6").value;
	if (package_6 != null && package_6 != 0) queryString = queryString + "&package_6=" + package_6;

	var product_sp_1 = document.getElementById("product_sp_1").value;
	if (product_sp_1 != null && product_sp_1 != 0) queryString = queryString + "&product_sp_1=" + product_sp_1;
	var product_sp_2 = document.getElementById("product_sp_2").value;
	if (product_sp_2 != null && product_sp_2 != 0) queryString = queryString + "&product_sp_2=" + product_sp_2;
	var product_sp_3 = document.getElementById("product_sp_3").value;
	if (product_sp_3 != null && product_sp_3 != 0) queryString = queryString + "&product_sp_3=" + product_sp_3;
	var product_ss_1 = document.getElementById("product_ss_1").value;
	if (product_ss_1 != null && product_ss_1 != 0) queryString = queryString + "&product_ss_1=" + product_ss_1;
	var product_ss_2 = document.getElementById("product_ss_2").value;
	if (product_ss_2 != null && product_ss_2 != 0) queryString = queryString + "&product_ss_2=" + product_ss_2;
	var product_ss_3 = document.getElementById("product_ss_3").value;
	if (product_ss_3 != null && product_ss_3 != 0) queryString = queryString + "&product_ss_3=" + product_ss_3;

	var sp_1 = document.getElementById("sp_1").value;
	if (sp_1 != null && sp_1 != 0) queryString = queryString + "&sp_1=" + sp_1;
	var sp_2 = document.getElementById("sp_2").value;
	if (sp_2 != null && sp_2 != 0) queryString = queryString + "&sp_2=" + sp_2;
	var sp_3 = document.getElementById("sp_3").value;
	if (sp_3 != null && sp_3 != 0) queryString = queryString + "&sp_3=" + sp_3;
	var ss_1 = document.getElementById("ss_1").value;
	if (ss_1 != null && ss_1 != 0) queryString = queryString + "&ss_1=" + ss_1;
	var ss_2 = document.getElementById("ss_2").value;
	if (ss_2 != null && ss_2 != 0) queryString = queryString + "&ss_2=" + ss_2;
	var ss_3 = document.getElementById("ss_3").value;
	if (ss_3 != null && ss_3 != 0) queryString = queryString + "&ss_3=" + ss_3;
	var ss_4 = document.getElementById("ss_4").value;
	if (ss_4 != null && ss_4 != 0) queryString = queryString + "&ss_4=" + ss_4;
	var ss_5 = document.getElementById("ss_5").value;
	if (ss_5 != null && ss_5 != 0) queryString = queryString + "&ss_5=" + ss_5;
	var ss_6 = document.getElementById("ss_6").value;
	if (ss_6 != null && ss_6 != 0) queryString = queryString + "&ss_6=" + ss_6;

	var sp_1_houshanpi = document.getElementById("sp_1_houshanpi").value;
	if (sp_1_houshanpi != null && sp_1_houshanpi != 0) queryString = queryString + "&sp_1_houshanpi=" + sp_1_houshanpi;
	var sp_2_houshanpi = document.getElementById("sp_2_houshanpi").value;
	if (sp_2_houshanpi != null && sp_2_houshanpi != 0) queryString = queryString + "&sp_2_houshanpi=" + sp_2_houshanpi;
	var sp_3_houshanpi = document.getElementById("sp_3_houshanpi").value;
	if (sp_3_houshanpi != null && sp_3_houshanpi != 0) queryString = queryString + "&sp_3_houshanpi=" + sp_3_houshanpi;

	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功送出");
			}
			else {
				alert(data.message);
			}
		}
	}
}

function member_view() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=member&event=view";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("view_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function search_account() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var index = document.getElementById("account").value;
	var data = "module=member&event=search_account&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("member_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function search_auth() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var auth = document.getElementById("auth").value;
	var data = "module=member&event=search_auth&auth=" + auth;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("member_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}