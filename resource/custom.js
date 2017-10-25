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
				if (data.member == 'load') {
					member_notice();
				}
				if (data.mature == 'load') {
					mature_notice();
				}
				if (data.command == 'load') {
					command_notice();
				}
				request_notice();
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
			if (data.message == 'Success') {
				alert("成功更換");
			}
			else {
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

function adjust_whouse() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var whouseno = document.getElementById("adjust_whouse").value;
	var data = "module=whouse&event=adjust_search&whouseno=" + whouseno;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("adjust_content").innerHTML = data.content;
				if (data.content.length == 0) {
					document.getElementById("adjust_area").style.display = 'none';
				}
				else {
					document.getElementById("adjust_area").style.display = null;
				}
			}
			else {
				alert(data.message);
			}
		}
	}
}

function adjust() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var whouseno = document.getElementById("adjust_whouse").value;
	var adjust_A = document.getElementsByClassName("adjust_A");
	var adjust_B = document.getElementsByClassName("adjust_B");
	var adjust_C = document.getElementsByClassName("adjust_C");
	var adjust_D = document.getElementsByClassName("adjust_D");
	var adjust_E = document.getElementsByClassName("adjust_E");
	var adjust_F = document.getElementsByClassName("adjust_F");
	var adjust_H = document.getElementsByClassName("adjust_H");
	var adjust_A_no = [], adjust_A_amt = [];
	var adjust_B_no = [], adjust_B_amt = [];
	var adjust_C_no = [], adjust_C_amt = [];
	var adjust_D_no = [], adjust_D_amt = [];
	var adjust_E_no = [], adjust_E_amt = [];
	var adjust_F_no = [], adjust_F_amt = [];
	var adjust_H_no = [], adjust_H_amt = [];
	for (var i = 0; i < adjust_A.length; i++) {
		adjust_A_no[i] = adjust_A[i].id;
		adjust_A_amt[i] = adjust_A[i].value;
	}
	for (var i = 0; i < adjust_B.length; i++) {
		adjust_B_no[i] = adjust_B[i].id;
		adjust_B_amt[i] = adjust_B[i].value;
	}
	for (var i = 0; i < adjust_C.length; i++) {
		adjust_C_no[i] = adjust_C[i].id;
		adjust_C_amt[i] = adjust_C[i].value;
	}
	for (var i = 0; i < adjust_D.length; i++) {
		adjust_D_no[i] = adjust_D[i].id;
		adjust_D_amt[i] = adjust_D[i].value;
	}
	for (var i = 0; i < adjust_E.length; i++) {
		adjust_E_no[i] = adjust_E[i].id;
		adjust_E_amt[i] = adjust_E[i].value;
	}
	for (var i = 0; i < adjust_F.length; i++) {
		adjust_F_no[i] = adjust_F[i].id;
		adjust_F_amt[i] = adjust_F[i].value;
	}
	for (var i = 0; i < adjust_H.length; i++) {
		adjust_H_no[i] = adjust_H[i].id;
		adjust_H_amt[i] = adjust_H[i].value;
	}
	if (whouseno == 'Beitou') {
		var data = "module=whouse&event=adjust&whouseno=Beitou&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_C_no=" + adjust_C_no + "&adjust_C_amt=" + adjust_C_amt + "&adjust_D_no=" + adjust_D_no + "&adjust_D_amt=" + adjust_D_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt + "&adjust_H_no=" + adjust_H_no + "&adjust_H_amt=" + adjust_H_amt;
	}
	else if (whouseno == 'Houshanpi') {
		var data = "module=whouse&event=adjust&whouseno=Houshanpi&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt + "&adjust_H_no=" + adjust_H_no + "&adjust_H_amt=" + adjust_H_amt;
	}
	else if (whouseno == 'Taitung') {
		var data = "module=whouse&event=adjust&whouseno=Taitung&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt;
	}
	else {
		var data = "module=whouse&event=adjust";
	}
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				if (confirm(data.check) == true) {
					adjust_checked();
				}
				else {
					adjust_whouse();
				}
			}
			else {
				alert(data.message);
			}
		}
	}
}

function adjust_checked() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var whouseno = document.getElementById("adjust_whouse").value;
	var adjust_A = document.getElementsByClassName("adjust_A");
	var adjust_B = document.getElementsByClassName("adjust_B");
	var adjust_C = document.getElementsByClassName("adjust_C");
	var adjust_D = document.getElementsByClassName("adjust_D");
	var adjust_E = document.getElementsByClassName("adjust_E");
	var adjust_F = document.getElementsByClassName("adjust_F");
	var adjust_H = document.getElementsByClassName("adjust_H");
	var adjust_A_no = [], adjust_A_amt = [];
	var adjust_B_no = [], adjust_B_amt = [];
	var adjust_C_no = [], adjust_C_amt = [];
	var adjust_D_no = [], adjust_D_amt = [];
	var adjust_E_no = [], adjust_E_amt = [];
	var adjust_F_no = [], adjust_F_amt = [];
	var adjust_H_no = [], adjust_H_amt = [];
	for (var i = 0; i < adjust_A.length; i++) {
		adjust_A_no[i] = adjust_A[i].id;
		adjust_A_amt[i] = adjust_A[i].value;
	}
	for (var i = 0; i < adjust_B.length; i++) {
		adjust_B_no[i] = adjust_B[i].id;
		adjust_B_amt[i] = adjust_B[i].value;
	}
	for (var i = 0; i < adjust_C.length; i++) {
		adjust_C_no[i] = adjust_C[i].id;
		adjust_C_amt[i] = adjust_C[i].value;
	}
	for (var i = 0; i < adjust_D.length; i++) {
		adjust_D_no[i] = adjust_D[i].id;
		adjust_D_amt[i] = adjust_D[i].value;
	}
	for (var i = 0; i < adjust_E.length; i++) {
		adjust_E_no[i] = adjust_E[i].id;
		adjust_E_amt[i] = adjust_E[i].value;
	}
	for (var i = 0; i < adjust_F.length; i++) {
		adjust_F_no[i] = adjust_F[i].id;
		adjust_F_amt[i] = adjust_F[i].value;
	}
	for (var i = 0; i < adjust_H.length; i++) {
		adjust_H_no[i] = adjust_H[i].id;
		adjust_H_amt[i] = adjust_H[i].value;
	}
	if (whouseno == 'Beitou') {
		var data = "module=whouse&event=adjust_checked&whouseno=Beitou&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_C_no=" + adjust_C_no + "&adjust_C_amt=" + adjust_C_amt + "&adjust_D_no=" + adjust_D_no + "&adjust_D_amt=" + adjust_D_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt + "&adjust_H_no=" + adjust_H_no + "&adjust_H_amt=" + adjust_H_amt;
	}
	else if (whouseno == 'Houshanpi') {
		var data = "module=whouse&event=adjust_checked&whouseno=Houshanpi&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt + "&adjust_H_no=" + adjust_H_no + "&adjust_H_amt=" + adjust_H_amt;
	}
	else if (whouseno == 'Taitung') {
		var data = "module=whouse&event=adjust_checked&whouseno=Taitung&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt;
	}
	else {
		var data = "module=whouse&event=adjust_checked";
	}
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功調整");
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
			else if (data.message == 'No notice') {
				document.getElementById("request_notice_content").innerHTML = '';
				document.getElementById("request_notice").style.display = 'none';
			}
			else {
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
			else if (data.message == 'No notice') {
				document.getElementById("member_notice_content").innerHTML = '';
				document.getElementById("member_notice").style.display = 'none';
			}
			else {
				alert(data.message);
			}
		}
	}
}

function mature_notice() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=mature";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("mature_notice_content").innerHTML = data.content;
				document.getElementById("mature_notice").style.display = null;
			}
			else if (data.message == 'No notice') {
				document.getElementById("mature_notice_content").innerHTML = '';
				document.getElementById("mature_notice").style.display = 'none';
			}
			else {
				alert(data.message);
			}
		}
	}
}

function command_notice() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=notice";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_notice_content").innerHTML = data.content;
				document.getElementById("command_notice").style.display = null;
			}
			else if (data.message == 'No notice') {
				document.getElementById("command_notice_content").innerHTML = '';
				document.getElementById("command_notice").style.display = 'none';
			}
			else {
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
	if (document.getElementById("calculate_ss_1") != null) {
		var ss_1 = document.getElementById("calculate_ss_1").value;
		var ss_2 = document.getElementById("calculate_ss_2").value;
		var ss_3 = document.getElementById("calculate_ss_3").value;
		var ss_4 = document.getElementById("calculate_ss_4").value;
		var ss_5 = document.getElementById("calculate_ss_5").value;
		var ss_6 = document.getElementById("calculate_ss_6").value;
		var data = "module=item&event=search&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
	}
	else {
		var data = "module=item&event=search&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
	}
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

function calculate_refresh() {
	document.getElementById("calculate_sp_1").value = 0;
	document.getElementById("result_calculate_sp_1").innerHTML = 0;
	document.getElementById("calculate_sp_2").value = 0;
	document.getElementById("result_calculate_sp_2").innerHTML = 0;
	document.getElementById("calculate_sp_3").value = 0;
	document.getElementById("result_calculate_sp_3").innerHTML = 0;
	if (document.getElementById("calculate_ss_1") != null) {
		document.getElementById("calculate_ss_1").value = 0;
		document.getElementById("result_calculate_ss_1").innerHTML = 0;
		document.getElementById("calculate_ss_2").value = 0;
		document.getElementById("result_calculate_ss_2").innerHTML = 0;
		document.getElementById("calculate_ss_3").value = 0;
		document.getElementById("result_calculate_ss_3").innerHTML = 0;
		document.getElementById("calculate_ss_4").value = 0;
		document.getElementById("result_calculate_ss_4").innerHTML = 0;
		document.getElementById("calculate_ss_5").value = 0;
		document.getElementById("result_calculate_ss_5").innerHTML = 0;
		document.getElementById("calculate_ss_6").value = 0;
		document.getElementById("result_calculate_ss_6").innerHTML = 0;
	}
	calculate_search();
}

function produce() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var sp_1 = document.getElementById("calculate_sp_1").value;
	var sp_2 = document.getElementById("calculate_sp_2").value;
	var sp_3 = document.getElementById("calculate_sp_3").value;
	if (document.getElementById("calculate_ss_1") != null) {
		var ss_1 = document.getElementById("calculate_ss_1").value;
		var ss_2 = document.getElementById("calculate_ss_2").value;
		var ss_3 = document.getElementById("calculate_ss_3").value;
		var ss_4 = document.getElementById("calculate_ss_4").value;
		var ss_5 = document.getElementById("calculate_ss_5").value;
		var ss_6 = document.getElementById("calculate_ss_6").value;
		var data = "module=item&event=produce&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
	}
	else {
		var data = "module=item&event=produce&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
	}
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功製作");
				location.reload();
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
		var option2 = document.createElement("option");
		option1.text = '半成品'; option1.value = 'F'; itemclass.add(option1);
		option2.text = '後山埤產品'; option1.value = 'H'; itemclass.add(option2);
	}
	else if (whouse == 'Taitung') {
		var option1 = document.createElement("option");
		var option2 = document.createElement("option");
		var option3 = document.createElement("option");
		var option4 = document.createElement("option");
		option1.text = '油品'; option1.value = 'A'; itemclass.add(option1);
		option2.text = '添加物'; option2.value = 'B'; itemclass.add(option2);
		option3.text = '產品'; option3.value = 'E'; itemclass.add(option3);
		option4.text = '半成品'; option4.value = 'F'; itemclass.add(option4);
	}
	document.getElementById("itemclass").onchange();
}

function command() {
	var command = document.getElementById("command").value;
	if (command == 'A') {
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = null;
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = 'none';
	}
	else if (command == 'B') {
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = null;
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = 'none';
	}
	else if (command == 'C') {
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = null;
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = 'none';
	}
	else if (command == 'D') {
		$(function() { $('.datepicker').datepick(); });
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = null;
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = null;
	}
	else if (command == 'E') {
		$(function() { $('.datepicker').datepick(); });
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = null;
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = null;
	}
	else if (command == 'F') {
		$(function() { $('.datepicker').datepick(); });
		document.getElementById("command_content").style.display = null;
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = null;
		document.getElementById("commandDEF").style.display = null;
	}
	else {
		document.getElementById("command_content").style.display = 'none';
		document.getElementById("commandA").style.display = 'none';
		document.getElementById("commandB").style.display = 'none';
		document.getElementById("commandC").style.display = 'none';
		document.getElementById("commandD").style.display = 'none';
		document.getElementById("commandE").style.display = 'none';
		document.getElementById("commandF").style.display = 'none';
		document.getElementById("commandDEF").style.display = 'none';
	}
}

function command_check() {
	var command = document.getElementById("command").value;
	var command_memo = document.getElementById("command_memo").value;
	if (command == 'A') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var oil_1 = document.getElementById("commandA_oil_1").value;
		var oil_2 = document.getElementById("commandA_oil_2").value;
		var oil_3 = document.getElementById("commandA_oil_3").value;
		var oil_4 = document.getElementById("commandA_oil_4").value;
		var oil_5 = document.getElementById("commandA_oil_5").value;
		var oil_6 = document.getElementById("commandA_oil_6").value;
		var oil_7 = document.getElementById("commandA_oil_7").value;
		var oil_8 = document.getElementById("commandA_oil_8").value;
		var oil_9 = document.getElementById("commandA_oil_9").value;
		var NaOH = document.getElementById("commandA_NaOH").value;
		var command_memo = document.getElementById("command_memo").value;
		data = "module=command&event=send&type=A&command_memo=" + command_memo + "&oil_1=" + oil_1 + "&oil_2=" + oil_2 + "&oil_3=" + oil_3 + "&oil_4=" + oil_4 + "&oil_5=" + oil_5 + "&oil_6=" + oil_6 + "&oil_7=" + oil_7 + "&oil_8=" + oil_8 + "&oil_9=" + oil_9 + "&NaOH=" + NaOH;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					alert("成功下單，訂單編號：" + data.index);
					location.reload();
				}
				else {
					alert(data.message);
				}
			}
		}
	}
	else if (command == 'B') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var oil_1 = document.getElementById("commandB_oil_1").value;
		var oil_2 = document.getElementById("commandB_oil_2").value;
		var oil_3 = document.getElementById("commandB_oil_3").value;
		var oil_4 = document.getElementById("commandB_oil_4").value;
		var oil_5 = document.getElementById("commandB_oil_5").value;
		var oil_6 = document.getElementById("commandB_oil_6").value;
		var oil_7 = document.getElementById("commandB_oil_7").value;
		var oil_8 = document.getElementById("commandB_oil_8").value;
		var oil_9 = document.getElementById("commandB_oil_9").value;
		var NaOH = document.getElementById("commandB_NaOH").value;
		var command_memo = document.getElementById("command_memo").value;
		data = "module=command&event=send&type=B&command_memo=" + command_memo + "&oil_1=" + oil_1 + "&oil_2=" + oil_2 + "&oil_3=" + oil_3 + "&oil_4=" + oil_4 + "&oil_5=" + oil_5 + "&oil_6=" + oil_6 + "&oil_7=" + oil_7 + "&oil_8=" + oil_8 + "&oil_9=" + oil_9 + "&NaOH=" + NaOH;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					alert("成功下單，訂單編號：" + data.index);
					location.reload();
				}
				else {
					alert(data.message);
				}
			}
		}
	}
	else if (command == 'C') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var product_sp_1 = document.getElementById("commandC_product_sp_1").value;
		var product_sp_3 = document.getElementById("commandC_product_sp_3").value;
		var product_sp_5 = document.getElementById("commandC_product_sp_5").value;
		var product_sp_box = document.getElementById("commandC_product_sp_box").value;
		var product_ss_1 = document.getElementById("commandC_product_ss_1").value;
		var product_ss_2 = document.getElementById("commandC_product_ss_2").value;
		var product_ss_3 = document.getElementById("commandC_product_ss_3").value;
		var product_ss_box = document.getElementById("commandC_product_ss_box").value;
		var moon_box_1 = document.getElementById("commandC_moon_box_1").value;
		var moon_box_2 = document.getElementById("commandC_moon_box_2").value;
		var moon_box_3 = document.getElementById("commandC_moon_box_3").value;
		var moon_box_4 = document.getElementById("commandC_moon_box_4").value;
		var moon_box_5 = document.getElementById("commandC_moon_box_5").value;
		var moon_box_6 = document.getElementById("commandC_moon_box_6").value;
		var moon_box_7 = document.getElementById("commandC_moon_box_7").value;
		var command_memo = document.getElementById("command_memo").value;
		data = "module=command&event=send&type=C&command_memo=" + command_memo + "&product_sp_1=" + product_sp_1 + "&product_sp_3=" + product_sp_3 + "&product_sp_5=" + product_sp_5 + "&product_sp_box=" + product_sp_box + "&product_ss_1=" + product_ss_1 + "&product_ss_2=" + product_ss_2 + "&product_ss_3=" + product_ss_3 + "&product_ss_box=" + product_ss_box + "&moon_box_1=" + moon_box_1 + "&moon_box_2=" + moon_box_2 + "&moon_box_3=" + moon_box_3 + "&moon_box_4=" + moon_box_4 + "&moon_box_5=" + moon_box_5 + "&moon_box_6=" + moon_box_6 + "&moon_box_7=" + moon_box_7;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					alert("成功下單，訂單編號：" + data.index);
					location.reload();
				}
				else {
					alert(data.message);
				}
			}
		}
	}
	else if (command == 'D') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var sp_1 = document.getElementById("commandD_sp_1").value;
		var sp_2 = document.getElementById("commandD_sp_2").value;
		var sp_3 = document.getElementById("commandD_sp_3").value;
		var ss_1 = document.getElementById("commandD_ss_1").value;
		var ss_2 = document.getElementById("commandD_ss_2").value;
		var ss_3 = document.getElementById("commandD_ss_3").value;
		var ss_4 = document.getElementById("commandD_ss_4").value;
		var ss_5 = document.getElementById("commandD_ss_5").value;
		var ss_6 = document.getElementById("commandD_ss_6").value;
		var command_memo = document.getElementById("command_memo").value;
		var date_start = document.getElementById("date_start").value;
		var date_end = document.getElementById("date_end").value;
		data = "module=command&event=send&type=D&command_memo=" + command_memo + "&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6 + "&date_start=" + date_start + "&date_end=" + date_end;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					command_file();
					alert("成功下單，訂單編號：" + data.index);
				}
				else {
					alert(data.message);
				}
			}
		}
	}
	else if (command == 'E') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var sp_1_houshanpi = document.getElementById("commandE_sp_1").value;
		var sp_2_houshanpi = document.getElementById("commandE_sp_2").value;
		var sp_3_houshanpi = document.getElementById("commandE_sp_3").value;
		var command_memo = document.getElementById("command_memo").value;
		var date_start = document.getElementById("date_start").value;
		var date_end = document.getElementById("date_end").value;
		data = "module=command&event=send&type=E&command_memo=" + command_memo + "&sp_1_houshanpi=" + sp_1_houshanpi + "&sp_2_houshanpi=" + sp_2_houshanpi + "&sp_3_houshanpi=" + sp_3_houshanpi + "&date_start=" + date_start + "&date_end=" + date_end;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					command_file();
					alert("成功下單，訂單編號：" + data.index);
				}
				else {
					alert(data.message);
				}
			}
		}
	}
	else if (command == 'F') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var sp_1 = document.getElementById("commandF_sp_1").value;
		var sp_2 = document.getElementById("commandF_sp_2").value;
		var sp_3 = document.getElementById("commandF_sp_3").value;
		var ss_1 = document.getElementById("commandF_ss_1").value;
		var ss_2 = document.getElementById("commandF_ss_2").value;
		var ss_3 = document.getElementById("commandF_ss_3").value;
		var ss_4 = document.getElementById("commandF_ss_4").value;
		var ss_5 = document.getElementById("commandF_ss_5").value;
		var ss_6 = document.getElementById("commandF_ss_6").value;
		var command_memo = document.getElementById("command_memo").value;
		var date_start = document.getElementById("date_start").value;
		var date_end = document.getElementById("date_end").value;
		data = "module=command&event=send&type=F&command_memo=" + command_memo + "&sp_1=" + sp_1 + "&sp_2=" + sp_2 + "&sp_3=" + sp_3 + "&ss_1=" + ss_1 + "&ss_2=" + ss_2 + "&ss_3=" + ss_3 + "&ss_4=" + ss_4 + "&ss_5=" + ss_5 + "&ss_6=" + ss_6 + "&date_start=" + date_start + "&date_end=" + date_end;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					command_file();
					alert("成功下單，訂單編號：" + data.index);
				}
				else {
					alert(data.message);
				}
			}
		}
	}
}

function command_file() {
	var commandFile = document.getElementById("commandData");
	var dataFile = new FormData(commandFile);
	var request = new XMLHttpRequest();
	request.open("POST", "index.php", true);
	request.send(dataFile);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("檔案附加成功");
				location.reload();
			}
			else {
				alert(data.message);
			}
		}
	}
}

function slice_search() {
	var slice = document.getElementById("slice").value;
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=slice_search&slice=" + slice;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("slice_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function slice() {
	var slice = document.getElementById("slice").value;
	var ingredient = document.getElementById("slice_ingredient").value;
	var result = document.getElementById("slice_result").value;
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=slice&slice=" + slice + "&ingredient=" + ingredient + "&result=" + result;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功切絲");
				slice_search();
			}
			else {
				alert(data.message);
			}
		}
	}
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
			var option9 = document.createElement("option");
			var option10 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '橄欖油'; option1.value = 'oil_1'; item.add(option1);
			option2.text = '棕梠油'; option2.value = 'oil_2'; item.add(option2);
			option3.text = '椰子油'; option3.value = 'oil_3'; item.add(option3);
			option4.text = '米糠油'; option4.value = 'oil_4'; item.add(option4);
			option5.text = '紅棕梠油'; option5.value = 'oil_5'; item.add(option5);
			option6.text = '葡萄籽油'; option6.value = 'oil_6'; item.add(option6);
			option7.text = '苦茶油'; option7.value = 'oil_7'; item.add(option7);
			option8.text = '蓖麻油'; option8.value = 'oil_8'; item.add(option8);
			option9.text = '乳油木果脂'; option9.value = 'oil_9'; item.add(option9);
			option10.text = '鹼'; option10.value = 'NaOH'; item.add(option10);
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
		}
		else if (itemclass == 'C') {
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
			var option13 = document.createElement("option");
			var option14 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '不織布包'; option1.value = 'package_1'; item.add(option1);
			option2.text = '鋁包'; option2.value = 'package_2'; item.add(option2);
			option3.text = '單顆皂禮盒封套'; option3.value = 'package_3'; item.add(option3);
			option4.text = '單顆皂禮盒內盒'; option4.value = 'package_4'; item.add(option4);
			option5.text = '皂絲禮盒'; option5.value = 'package_5'; item.add(option5);
			option6.text = '內襯'; option6.value = 'package_6'; item.add(option6);
			option7.text = '米皂外盒100g'; option7.value = 'package_7a'; item.add(option7);
			option8.text = '金針皂外盒100g'; option8.value = 'package_8a'; item.add(option8);
			option9.text = '釋迦皂外盒100g'; option9.value = 'package_9a'; item.add(option9);
			option10.text = '中秋大禮盒上蓋(兔子)'; option10.value = 'moon_package_1'; item.add(option10);
			option11.text = '中秋大禮盒上蓋(熱氣球)'; option11.value = 'moon_package_2'; item.add(option11);
			option12.text = '中秋小禮盒(米皂)'; option12.value = 'moon_package_3'; item.add(option12);
			option13.text = '中秋小禮盒(金針皂)'; option13.value = 'moon_package_4'; item.add(option13);
			option14.text = '中秋小禮盒(釋迦皂)'; option14.value = 'moon_package_5'; item.add(option14);
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
			var option9 = document.createElement("option");
			var option10 = document.createElement("option");
			var option11 = document.createElement("option");
			var option12 = document.createElement("option");
			var option13 = document.createElement("option");
			var option14 = document.createElement("option");
			var option15 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '田靜山巒禾風皂100g'; option1.value = 'product_sp_1'; item.add(option1);
			option2.text = '金絲森林渲染皂100g'; option2.value = 'product_sp_3'; item.add(option2);
			option3.text = '釋迦手感果力皂100g'; option3.value = 'product_sp_5'; item.add(option3);
			option4.text = '三三台東意象禮盒組'; option4.value = 'product_sp_box'; item.add(option4);
			option5.text = '洛神紅麴旅用皂絲'; option5.value = 'product_ss_1'; item.add(option5);
			option6.text = '暖暖薑黃旅用皂絲'; option6.value = 'product_ss_2'; item.add(option6);
			option7.text = '萱草米黃旅用皂絲'; option7.value = 'product_ss_3'; item.add(option7);
			option8.text = '三三台東意象皂絲旅行組'; option8.value = 'product_ss_box'; item.add(option8);
			option9.text = '中秋禮皂-月兔捉迷藏100g'; option9.value = 'moon_box_1'; item.add(option9);
			option10.text = '中秋禮皂-月兔捉迷藏50g'; option10.value = 'moon_box_2'; item.add(option10);
			option11.text = '中秋禮皂-熱氣球登月100g'; option11.value = 'moon_box_3'; item.add(option11);
			option12.text = '中秋禮皂-熱氣球登月50g'; option12.value = 'moon_box_4'; item.add(option12);
			option13.text = '中秋小禮盒(米皂)'; option13.value = 'moon_box_5'; item.add(option13);
			option14.text = '中秋小禮盒(金針皂)'; option14.value = 'moon_box_6'; item.add(option14);
			option15.text = '中秋小禮盒(釋迦皂)'; option15.value = 'moon_box_7'; item.add(option15);
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
			option1.text = '米皂100g'; option1.value = 'sp_1_100'; item.add(option1);
			option2.text = '金針皂100g'; option2.value = 'sp_2_100'; item.add(option2);
			option3.text = '釋迦皂100g'; option3.value = 'sp_3_100'; item.add(option3);
			option4.text = '洛神皂'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '蕁麻葉皂'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '金針皂'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '紅棕梠皂'; option9.value = 'ss_6'; item.add(option9);
		}
		else if (itemclass == 'F') {
			var option0 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
		}
		else if (itemclass == 'H') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '後山埤的米皂100g'; option1.value = 'sp_1_100_houshanpi'; item.add(option1);
			option2.text = '後山埤的金針皂100g'; option2.value = 'sp_2_100_houshanpi'; item.add(option2);
			option3.text = '後山埤的釋迦皂100g'; option3.value = 'sp_3_100_houshanpi'; item.add(option3);
		}
	}
	else if (whouse == 'Houshanpi') {
		if (itemclass == 'F') {
			var option0 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
		}
		else if (itemclass == 'H') {
			var option0 = document.createElement("option");
			var option1 = document.createElement("option");
			var option2 = document.createElement("option");
			var option3 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '米皂100g'; option1.value = 'sp_1_100_houshanpi'; item.add(option1);
			option2.text = '金針皂100g'; option2.value = 'sp_2_100_houshanpi'; item.add(option2);
			option3.text = '釋迦皂100g'; option3.value = 'sp_3_100_houshanpi'; item.add(option3);
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
			var option9 = document.createElement("option");
			var option10 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
			option1.text = '橄欖油'; option1.value = 'oil_1'; item.add(option1);
			option2.text = '棕梠油'; option2.value = 'oil_2'; item.add(option2);
			option3.text = '椰子油'; option3.value = 'oil_3'; item.add(option3);
			option4.text = '米糠油'; option4.value = 'oil_4'; item.add(option4);
			option5.text = '紅棕梠油'; option5.value = 'oil_5'; item.add(option5);
			option6.text = '葡萄籽油'; option6.value = 'oil_6'; item.add(option6);
			option7.text = '苦茶油'; option7.value = 'oil_7'; item.add(option7);
			option8.text = '蓖麻油'; option8.value = 'oil_8'; item.add(option8);
			option9.text = '乳油木果脂'; option9.value = 'oil_9'; item.add(option9);
			option10.text = '鹼'; option10.value = 'NaOH'; item.add(option10);
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
			option1.text = '米皂100g'; option1.value = 'sp_1_100'; item.add(option1);
			option2.text = '金針皂100g'; option2.value = 'sp_2_100'; item.add(option2);
			option3.text = '釋迦皂100g'; option3.value = 'sp_3_100'; item.add(option3);
			option4.text = '洛神皂'; option4.value = 'ss_1'; item.add(option4);
			option5.text = '紅麴皂'; option5.value = 'ss_2'; item.add(option5);
			option6.text = '薑黃皂'; option6.value = 'ss_3'; item.add(option6);
			option7.text = '蕁麻葉皂'; option7.value = 'ss_4'; item.add(option7);
			option8.text = '金針皂'; option8.value = 'ss_5'; item.add(option8);
			option9.text = '紅棕梠皂'; option9.value = 'ss_6'; item.add(option9);
		}
		else if (itemclass == 'F') {
			var option0 = document.createElement("option");
			option0.text = '全部'; option0.value = 'all'; item.add(option0);
		}
	}
}

function whouse_view() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=view";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
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
				document.getElementById("whouse_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function sp_box_change() {
	var sp_box_num = document.getElementById("package_sp_box").value;
	document.getElementById("sp_1_type1").value = 0;
	document.getElementById("sp_2_type1").value = 0;
	document.getElementById("sp_3_type1").value = 0;
	document.getElementById("sp_1_type2").value = sp_box_num;
	document.getElementById("sp_2_type2").value = sp_box_num;
	document.getElementById("sp_3_type2").value = sp_box_num;
}

function ss_box_change() {
	var ss_box_num = document.getElementById("package_ss_box").value;
	document.getElementById("ss_1_type1").value = ss_box_num * 2;
	document.getElementById("ss_2_type1").value = ss_box_num * 2;
	document.getElementById("ss_3_type1").value = ss_box_num * 2;
}

function package() {
	var product_sp_1 = document.getElementById("package_sp_1").value;
	var product_sp_3 = document.getElementById("package_sp_3").value;
	var product_sp_5 = document.getElementById("package_sp_5").value;
	var product_sp_box = document.getElementById("package_sp_box").value;
	var product_ss_1 = document.getElementById("package_ss_1").value;
	var product_ss_2 = document.getElementById("package_ss_2").value;
	var product_ss_3 = document.getElementById("package_ss_3").value;
	var product_ss_box = document.getElementById("package_ss_box").value;
	var moon_box_1 = document.getElementById("moon_box_1").value;
	var moon_box_2 = document.getElementById("moon_box_2").value;
	var moon_box_3 = document.getElementById("moon_box_3").value;
	var moon_box_4 = document.getElementById("moon_box_4").value;
	var moon_box_5 = document.getElementById("moon_box_5").value;
	var moon_box_6 = document.getElementById("moon_box_6").value;
	var moon_box_7 = document.getElementById("moon_box_7").value;
	var sp_1_type1 = Number(document.getElementById("sp_1_type1").value);
	var sp_2_type1 = Number(document.getElementById("sp_2_type1").value);
	var sp_3_type1 = Number(document.getElementById("sp_3_type1").value);
	var sp_1_type2 = Number(document.getElementById("sp_1_type2").value);
	var sp_2_type2 = Number(document.getElementById("sp_2_type2").value);
	var sp_3_type2 = Number(document.getElementById("sp_3_type2").value);
	var ss_1_type1 = Number(document.getElementById("ss_1_type1").value);
	var ss_2_type1 = Number(document.getElementById("ss_2_type1").value);
	var ss_3_type1 = Number(document.getElementById("ss_3_type1").value);
	if (sp_1_type1 + sp_1_type2 != product_sp_box) {
		alert("米皂包裝原料與禮盒數量不符");
	}
	else if (sp_2_type1 + sp_2_type2 != product_sp_box) {
		alert("金針皂包裝原料與禮盒數量不符");
	}
	else if (sp_3_type1 + sp_3_type2 != product_sp_box) {
		alert("釋迦皂包裝原料與禮盒數量不符");
	}
	else if (ss_1_type1 + ss_2_type1 + ss_3_type1 != product_ss_box * 6) {
		alert("皂絲包裝原料與禮盒數量不符");
	}
	else {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var data = "module=item&event=package&product_sp_1=" + product_sp_1 + "&product_sp_3=" + product_sp_3 + "&product_sp_5=" + product_sp_5 + "&product_sp_box=" + product_sp_box + "&product_ss_1=" + product_ss_1 + "&product_ss_2=" + product_ss_2 + "&product_ss_3=" + product_ss_3 + "&product_ss_box=" + product_ss_box + "&moon_box_1=" + moon_box_1 + "&moon_box_2=" + moon_box_2 + "&moon_box_3=" + moon_box_3 + "&moon_box_4=" + moon_box_4 + "&moon_box_5=" + moon_box_5 + "&moon_box_6=" + moon_box_6 + "&moon_box_7=" + moon_box_7 + "&sp_1_type1=" + sp_1_type1 + "&sp_2_type1=" + sp_2_type1 + "&sp_3_type1=" + sp_3_type1 + "&sp_1_type2=" + sp_1_type2 + "&sp_2_type2=" + sp_2_type2 + "&sp_3_type2=" + sp_3_type2 + "&ss_1_type1=" + ss_1_type1 + "&ss_2_type1=" + ss_2_type1 + "&ss_3_type1=" + ss_3_type1;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				alert(request.responseText);
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					document.getElementById("packageQueryResult").innerHTML = data.query;
					document.getElementById("packageQuery").style.display = null;
					document.getElementById("pack").style.display = null;
				}
				else {
					alert(data.message);
				}
			}
		}
	}
}

function pack() {
	var product_sp_1 = document.getElementById("package_sp_1").value;
	var product_sp_3 = document.getElementById("package_sp_3").value;
	var product_sp_5 = document.getElementById("package_sp_5").value;
	var product_sp_box = document.getElementById("package_sp_box").value;
	var product_ss_1 = document.getElementById("package_ss_1").value;
	var product_ss_2 = document.getElementById("package_ss_2").value;
	var product_ss_3 = document.getElementById("package_ss_3").value;
	var moon_box_1 = document.getElementById("moon_box_1").value;
	var moon_box_2 = document.getElementById("moon_box_2").value;
	var moon_box_3 = document.getElementById("moon_box_3").value;
	var moon_box_4 = document.getElementById("moon_box_4").value;
	var moon_box_5 = document.getElementById("moon_box_5").value;
	var moon_box_6 = document.getElementById("moon_box_6").value;
	var moon_box_7 = document.getElementById("moon_box_7").value;
	var product_ss_box = document.getElementById("package_ss_box").value;
	var sp_1_type1 = Number(document.getElementById("sp_1_type1").value);
	var sp_2_type1 = Number(document.getElementById("sp_2_type1").value);
	var sp_3_type1 = Number(document.getElementById("sp_3_type1").value);
	var sp_1_type2 = Number(document.getElementById("sp_1_type2").value);
	var sp_2_type2 = Number(document.getElementById("sp_2_type2").value);
	var sp_3_type2 = Number(document.getElementById("sp_3_type2").value);
	var ss_1_type1 = Number(document.getElementById("ss_1_type1").value);
	var ss_2_type1 = Number(document.getElementById("ss_2_type1").value);
	var ss_3_type1 = Number(document.getElementById("ss_3_type1").value);
	if (sp_1_type1 + sp_1_type2 != product_sp_box) {
		alert("米皂包裝原料與禮盒數量不符");
	}
	else if (sp_2_type1 + sp_2_type2 != product_sp_box) {
		alert("金針皂包裝原料與禮盒數量不符");
	}
	else if (sp_3_type1 + sp_3_type2 != product_sp_box) {
		alert("釋迦皂包裝原料與禮盒數量不符");
	}
	else if (ss_1_type1 + ss_2_type1 + ss_3_type1 != product_ss_box * 6) {
		alert("皂絲包裝原料與禮盒數量不符");
	}
	else {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		var data = "module=item&event=pack&product_sp_1=" + product_sp_1 + "&product_sp_3=" + product_sp_3 + "&product_sp_5=" + product_sp_5 + "&product_sp_box=" + product_sp_box + "&product_ss_1=" + product_ss_1 + "&product_ss_2=" + product_ss_2 + "&product_ss_3=" + product_ss_3 + "&product_ss_box=" + product_ss_box + "&moon_box_1=" + moon_box_1 + "&moon_box_2=" + moon_box_2 + "&moon_box_3=" + moon_box_3 + "&moon_box_4=" + moon_box_4 + "&moon_box_5=" + moon_box_5 + "&moon_box_6=" + moon_box_6 + "&moon_box_7=" + moon_box_7 + "&sp_1_type1=" + sp_1_type1 + "&sp_2_type1=" + sp_2_type1 + "&sp_3_type1=" + sp_3_type1 + "&sp_1_type2=" + sp_1_type2 + "&sp_2_type2=" + sp_2_type2 + "&sp_3_type2=" + sp_3_type2 + "&ss_1_type1=" + ss_1_type1 + "&ss_2_type1=" + ss_2_type1 + "&ss_3_type1=" + ss_3_type1;
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
				alert(request.responseText);
				var data = JSON.parse(request.responseText);
				if (data.message == 'Success') {
					alert("成功包裝");
					location.reload();
				}
				else {
					alert(data.message);
				}
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

function command_view() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=view";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_view_content").innerHTML = data.content;
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
				document.getElementById("request_search_content").innerHTML = null;
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
				document.getElementById("request_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function search_date() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var year = document.getElementById("year").value;
	var month = document.getElementById("month").value;
	var day = document.getElementById("day").value;
	var data = "module=request&event=search_date&year=" + year + "&month=" + month + "&day=" + day;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_search_content").innerHTML = data.content;
			}
			else {
				document.getElementById("request_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function command_search_index() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var index = document.getElementById("command_index").value;
	var data = "module=command&event=search_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_search_content").innerHTML = data.content;
			}
			else {
				document.getElementById("command_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function command_search_type() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var type = document.getElementById("command_type").value;
	var data = "module=command&event=search_type&type=" + type;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_search_content").innerHTML = data.content;
			}
			else {
				document.getElementById("command_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function command_search_date() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var year = document.getElementById("command_year").value;
	var month = document.getElementById("command_month").value;
	var day = document.getElementById("command_day").value;
	var data = "module=command&event=search_date&year=" + year + "&month=" + month + "&day=" + day;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_search_content").innerHTML = data.content;
			}
			else {
				document.getElementById("command_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function view_index_notice(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_notice_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("request_notice_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function view_index_view(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_view_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("request_view_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function view_index_search(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_search_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("request_search_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function view_index_search(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("request_search_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("request_search_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function command_view_index_search(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_search_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("command_search_detail").innerHTML = null;
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
		var option4 = document.createElement("option");
		option1.text = '請選擇'; option1.value = ''; receiver.add(option1);
		option2.text = '北投'; option2.value = 'Beitou'; receiver.add(option2);
		option3.text = '後山埤'; option3.value = 'Houshanpi'; receiver.add(option3);
		option4.text = '台東'; option4.value = 'Taitung'; receiver.add(option4);
	}
	else if (sender == 'Houshanpi') {
		var option1 = document.createElement("option");
		option1.text = '北投'; option1.value = 'Beitou'; receiver.add(option1);
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
		if (receiver == 'Beitou') {
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = null;
			document.getElementsByClassName("material_C")[1].style.display = null;
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else if (receiver == 'Houshanpi') {
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else if (receiver == 'Taitung') {
			document.getElementsByClassName("material_B")[0].style.display = null;
			document.getElementsByClassName("material_B")[1].style.display = null;
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else if (sender == 'Houshanpi') {
		if (receiver == 'Beitou') {
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = null;
			document.getElementsByClassName("material_H")[1].style.display = null;
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else if (sender == 'Taitung') {
		if (receiver == 'Beitou') {
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = null;
			document.getElementsByClassName("material_E")[1].style.display = null;
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = null;
			document.getElementById("content").style.display = null;
		}
		else {
			document.getElementsByClassName("material_B")[0].style.display = 'none';
			document.getElementsByClassName("material_B")[1].style.display = 'none';
			document.getElementsByClassName("material_C")[0].style.display = 'none';
			document.getElementsByClassName("material_C")[1].style.display = 'none';
			document.getElementsByClassName("material_E")[0].style.display = 'none';
			document.getElementsByClassName("material_E")[1].style.display = 'none';
			document.getElementsByClassName("material_H")[0].style.display = 'none';
			document.getElementsByClassName("material_H")[1].style.display = 'none';
			document.getElementById("ship").style.display = 'none';
			document.getElementById("content").style.display = 'none';
		}
	}
	else {
		document.getElementsByClassName("material_B")[0].style.display = 'none';
		document.getElementsByClassName("material_B")[1].style.display = 'none';
		document.getElementsByClassName("material_C")[0].style.display = 'none';
		document.getElementsByClassName("material_C")[1].style.display = 'none';
		document.getElementsByClassName("material_E")[0].style.display = 'none';
		document.getElementsByClassName("material_E")[1].style.display = 'none';
		document.getElementsByClassName("material_H")[0].style.display = 'none';
		document.getElementsByClassName("material_H")[1].style.display = 'none';
		document.getElementById("ship").style.display = 'none';
		document.getElementById("content").style.display = 'none';
	}
}

function send() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var memo = document.getElementById("memo").value;
	var sender = document.getElementById("sender").value;
	var receiver = document.getElementById("receiver").value;
	var shipfee;
	if (document.getElementById("shipfee") != null) {
		shipfee = document.getElementById("shipfee").value;
	}
	else {
		shipfee = 0;
	}
	var data = "module=request&event=send&memo=" + memo + "&sender=" + sender + "&receiver=" + receiver + "&shipfee=" + shipfee;
	if (sender == 'Trisoap') {
		var additive_1 = document.getElementById("send_additive_1").value;
		if (additive_1 != null && additive_1 != 0) data = data + "&additive_1=" + additive_1;
		var additive_2 = document.getElementById("send_additive_2").value;
		if (additive_2 != null && additive_2 != 0) data = data + "&additive_2=" + additive_2;
		var additive_3 = document.getElementById("send_additive_3").value;
		if (additive_3 != null && additive_3 != 0) data = data + "&additive_3=" + additive_3;
		var additive_4 = document.getElementById("send_additive_4").value;
		if (additive_4 != null && additive_4 != 0) data = data + "&additive_4=" + additive_4;
		var additive_5 = document.getElementById("send_additive_5").value;
		if (additive_5 != null && additive_5 != 0) data = data + "&additive_5=" + additive_5;
		var additive_6 = document.getElementById("send_additive_6").value;
		if (additive_6 != null && additive_6 != 0) data = data + "&additive_6=" + additive_6;
		var additive_7 = document.getElementById("send_additive_7").value;
		if (additive_7 != null && additive_7 != 0) data = data + "&additive_7=" + additive_7;
		var additive_8 = document.getElementById("send_additive_8").value;
		if (additive_8 != null && additive_8 != 0) data = data + "&additive_8=" + additive_8;
		var additive_9 = document.getElementById("send_additive_9").value;
		if (additive_9 != null && additive_9 != 0) data = data + "&additive_9=" + additive_9;
		var additive_10 = document.getElementById("send_additive_10").value;
		if (additive_10 != null && additive_10 != 0) data = data + "&additive_10=" + additive_10;
	}
	if (sender == 'Trisoap') {
		var package_1 = document.getElementById("send_package_1").value;
		if (package_1 != null && package_1 != 0) data = data + "&package_1=" + package_1;
		var package_2 = document.getElementById("send_package_2").value;
		if (package_2 != null && package_2 != 0) data = data + "&package_2=" + package_2;
		var package_3 = document.getElementById("send_package_3").value;
		if (package_3 != null && package_3 != 0) data = data + "&package_3=" + package_3;
		var package_4 = document.getElementById("send_package_4").value;
		if (package_4 != null && package_4 != 0) data = data + "&package_4=" + package_4;
		var package_5 = document.getElementById("send_package_5").value;
		if (package_5 != null && package_5 != 0) data = data + "&package_5=" + package_5;
		var package_6 = document.getElementById("send_package_6").value;
		if (package_6 != null && package_6 != 0) data = data + "&package_6=" + package_6;
		var package_7a = document.getElementById("send_package_7a").value;
		if (package_7a != null && package_7a != 0) data = data + "&package_7a=" + package_7a;
		var package_8a = document.getElementById("send_package_8a").value;
		if (package_8a != null && package_8a != 0) data = data + "&package_8a=" + package_8a;
		var package_9a = document.getElementById("send_package_9a").value;
		if (package_9a != null && package_9a != 0) data = data + "&package_9a=" + package_9a;
		var moon_package_1 = document.getElementById("send_moon_package_1").value;
		if (moon_package_1 != null && moon_package_1 != 0) data = data + "&moon_package_1=" + moon_package_1;
		var moon_package_2 = document.getElementById("send_moon_package_2").value;
		if (moon_package_2 != null && moon_package_2 != 0) data = data + "&moon_package_2=" + moon_package_2;
		var moon_package_3 = document.getElementById("send_moon_package_3").value;
		if (moon_package_3 != null && moon_package_3 != 0) data = data + "&moon_package_3=" + moon_package_3;
		var moon_package_4 = document.getElementById("send_moon_package_4").value;
		if (moon_package_4 != null && moon_package_4 != 0) data = data + "&moon_package_4=" + moon_package_4;
		var moon_package_5 = document.getElementById("send_moon_package_5").value;
		if (moon_package_5 != null && moon_package_5 != 0) data = data + "&moon_package_5=" + moon_package_5;
	}
	if (sender == 'Taitung') {
		var sp_1_100 = document.getElementById("send_sp_1_100").value;
		if (sp_1_100 != null && sp_1_100 != 0) data = data + "&sp_1_100=" + sp_1_100;
		var sp_2_100 = document.getElementById("send_sp_2_100").value;
		if (sp_2_100 != null && sp_2_100 != 0) data = data + "&sp_2_100=" + sp_2_100;
		var sp_3_100 = document.getElementById("send_sp_3_100").value;
		if (sp_3_100 != null && sp_3_100 != 0) data = data + "&sp_3_100=" + sp_3_100;
		var ss_1 = document.getElementById("send_ss_1").value;
		if (ss_1 != null && ss_1 != 0) data = data + "&ss_1=" + ss_1;
		var ss_2 = document.getElementById("send_ss_2").value;
		if (ss_2 != null && ss_2 != 0) data = data + "&ss_2=" + ss_2;
		var ss_3 = document.getElementById("send_ss_3").value;
		if (ss_3 != null && ss_3 != 0) data = data + "&ss_3=" + ss_3;
		var ss_4 = document.getElementById("send_ss_4").value;
		if (ss_4 != null && ss_4 != 0) data = data + "&ss_4=" + ss_4;
		var ss_5 = document.getElementById("send_ss_5").value;
		if (ss_5 != null && ss_5 != 0) data = data + "&ss_5=" + ss_5;
		var ss_6 = document.getElementById("send_ss_6").value;
		if (ss_6 != null && ss_6 != 0) data = data + "&ss_6=" + ss_6;
	}
	if (sender == 'Houshanpi') {
		var sp_1_100_houshanpi = document.getElementById("send_sp_1_100_houshanpi").value;
		if (sp_1_100_houshanpi != null && sp_1_100_houshanpi != 0) data = data + "&sp_1_100_houshanpi=" + sp_1_100_houshanpi;
		var sp_2_100_houshanpi = document.getElementById("send_sp_2_100_houshanpi").value;
		if (sp_2_100_houshanpi != null && sp_2_100_houshanpi != 0) data = data + "&sp_2_100_houshanpi=" + sp_2_100_houshanpi;
		var sp_3_100_houshanpi = document.getElementById("send_sp_3_100_houshanpi").value;
		if (sp_3_100_houshanpi != null && sp_3_100_houshanpi != 0) data = data + "&sp_3_100_houshanpi=" + sp_3_100_houshanpi;
	}
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功送出，物流編號：" + data.index);
				location.reload();
			}
			else {
				alert(data.message);
			}
		}
	}
}

function send_refresh() {
	if (document.getElementById("send_additive_1") != null) document.getElementById("send_additive_1").value = 0;
	if (document.getElementById("send_additive_2") != null) document.getElementById("send_additive_2").value = 0;
	if (document.getElementById("send_additive_3") != null) document.getElementById("send_additive_3").value = 0;
	if (document.getElementById("send_additive_4") != null) document.getElementById("send_additive_4").value = 0;
	if (document.getElementById("send_additive_5") != null) document.getElementById("send_additive_5").value = 0;
	if (document.getElementById("send_additive_6") != null) document.getElementById("send_additive_6").value = 0;
	if (document.getElementById("send_additive_7") != null) document.getElementById("send_additive_7").value = 0;
	if (document.getElementById("send_additive_8") != null) document.getElementById("send_additive_8").value = 0;
	if (document.getElementById("send_additive_9") != null) document.getElementById("send_additive_9").value = 0;
	if (document.getElementById("send_additive_10") != null) document.getElementById("send_additive_10").value = 0;
	if (document.getElementById("send_package_1") != null) document.getElementById("send_package_1").value = 0;
	if (document.getElementById("send_package_2") != null) document.getElementById("send_package_2").value = 0;
	if (document.getElementById("send_package_3") != null) document.getElementById("send_package_3").value = 0;
	if (document.getElementById("send_package_4") != null) document.getElementById("send_package_4").value = 0;
	if (document.getElementById("send_package_5") != null) document.getElementById("send_package_5").value = 0;
	if (document.getElementById("send_package_6") != null) document.getElementById("send_package_6").value = 0;
	if (document.getElementById("send_package_7a") != null) document.getElementById("send_package_7a").value = 0;
	if (document.getElementById("send_package_8a") != null) document.getElementById("send_package_8a").value = 0;
	if (document.getElementById("send_package_9a") != null) document.getElementById("send_package_9a").value = 0;
	if (document.getElementById("send_moon_package_1") != null) document.getElementById("send_moon_package_1").value = 0;
	if (document.getElementById("send_moon_package_2") != null) document.getElementById("send_moon_package_2").value = 0;
	if (document.getElementById("send_moon_package_3") != null) document.getElementById("send_moon_package_3").value = 0;
	if (document.getElementById("send_moon_package_4") != null) document.getElementById("send_moon_package_4").value = 0;
	if (document.getElementById("send_moon_package_5") != null) document.getElementById("send_moon_package_5").value = 0;
	if (document.getElementById("send_sp_1_100") != null) document.getElementById("send_sp_1_100").value = 0;
	if (document.getElementById("send_sp_2_100") != null) document.getElementById("send_sp_2_100").value = 0;
	if (document.getElementById("send_sp_3_100") != null) document.getElementById("send_sp_3_100").value = 0;
	if (document.getElementById("send_ss_1") != null) document.getElementById("send_ss_1").value = 0;
	if (document.getElementById("send_ss_2") != null) document.getElementById("send_ss_2").value = 0;
	if (document.getElementById("send_ss_3") != null) document.getElementById("send_ss_3").value = 0;
	if (document.getElementById("send_ss_4") != null) document.getElementById("send_ss_4").value = 0;
	if (document.getElementById("send_ss_5") != null) document.getElementById("send_ss_5").value = 0;
	if (document.getElementById("send_ss_6") != null) document.getElementById("send_ss_6").value = 0;
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
				document.getElementById("member_view_content").innerHTML = data.content;
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
				document.getElementById("member_search_content").innerHTML = null;
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
				document.getElementById("member_search_content").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function auth(account) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=member&event=auth&index=" + account;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功授權");
				member_notice();
			}
			else {
				alert(data.message);
			}
		}
	}
}

function release(account) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=member&event=release&index=" + account;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功拒絕");
				member_notice();
			}
			else {
				alert(data.message);
			}
		}
	}
}

function accept(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=accept&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功確認");
				request_notice();
				request_view();
				document.getElementById("request_notice_detail").innerHTML = null;
				document.getElementById("request_view_detail").innerHTML = null;
				document.getElementById("request_search_detail").innerHTML = null;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function reject(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=reject&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功拒絕");
				request_notice();
				request_view();
				document.getElementById("request_notice_detail").innerHTML = null;
				document.getElementById("request_view_detail").innerHTML = null;
				document.getElementById("request_search_detail").innerHTML = null;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function deliver(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=deliver&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功送出，物流編號：" + data.index);
				command_notice();
				command_view();
				document.getElementById("command_notice_detail").innerHTML = null;
				document.getElementById("command_view_detail").innerHTML = null;
				document.getElementById("command_search_detail").innerHTML = null;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function refuse(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=refuse&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功拒絕");
				command_notice();
				command_view();
				document.getElementById("command_notice_detail").innerHTML = null;
				document.getElementById("command_view_detail").innerHTML = null;
				document.getElementById("command_search_detail").innerHTML = null;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function set_shipfee(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var shipfee = document.getElementById("set_shipfee").value;
	var data = "module=request&event=set_shipfee&index=" + index + "&shipfee=" + shipfee;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功設定");
				request_view();
				view_index_view(index);
			}
			else {
				alert(data.message);
			}
		}
	}
}

function view_command(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_view_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("command_view_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function view_command_notice(index) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=view_index&index=" + index;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("command_notice_detail").innerHTML = data.content;
			}
			else {
				document.getElementById("command_notice_detail").innerHTML = null;
				alert(data.message);
			}
		}
	}
}

function check(index, itemno) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=check&index=" + index + "&itemno=" + itemno;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				if (confirm(data.check) == true) {
					check_checked(index, itemno);
				}
			}
			else {
				alert(data.message);
			}
		}
	}
}

function check_checked(index, itemno) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=check_checked&index=" + index + "&itemno=" + itemno;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				command_view();
				view_command(index);
				view_command_notice(index);
			}
			else {
				alert(data.message);
			}
		}
	}
}

function ask_adjust(itemno, itemnm) {
	if (confirm('確定要更改 ' + itemnm + ' 之存量？') != true) {
		document.getElementById(itemno).blur();
	}
}

function mature_search() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=mature_search";
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementById("mature_search_content").innerHTML = data.content;
			}
			else {
				alert(data.message);
			}
		}
	}
}

function cut(itemno, amt) {
	var _100g = document.getElementById(itemno + "_100g").value;
	var totalAmount = Number(_100g) * 100;
	if (totalAmount > amt) {
		alert("產品總量超過原料總量");
	}
	else {
		var waste = amt - totalAmount;
		if (confirm("將產生" + waste + "克耗損，是否繼續？") == true) {
			cut_checked(itemno, _100g);
		}
	}
}

function cut_checked(itemno, _100g) {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=whouse&event=cut&itemno=" + itemno + "&_100g=" + _100g;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				alert("成功切皂");
				mature_notice();
				mature_search();
			}
			else {
				alert(data.message);
			}
		}
	}
}