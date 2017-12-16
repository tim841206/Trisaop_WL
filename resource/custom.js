function enable_datepick() {
	$("#date_start").datepick();
	$("#date_end").datepick();
}

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
					enable_datepick();
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
	else if (whouseno == 'Yilan') {
		var data = "module=whouse&event=adjust&whouseno=Yilan&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_C_no=" + adjust_C_no + "&adjust_C_amt=" + adjust_C_amt + "&adjust_D_no=" + adjust_D_no + "&adjust_D_amt=" + adjust_D_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt;
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
	else if (whouseno == 'Yilan') {
		var data = "module=whouse&event=adjust_checked&whouseno=Yilan&adjust_A_no=" + adjust_A_no + "&adjust_A_amt=" + adjust_A_amt + "&adjust_B_no=" + adjust_B_no + "&adjust_B_amt=" + adjust_B_amt + "&adjust_C_no=" + adjust_C_no + "&adjust_C_amt=" + adjust_C_amt + "&adjust_D_no=" + adjust_D_no + "&adjust_D_amt=" + adjust_D_amt + "&adjust_E_no=" + adjust_E_no + "&adjust_E_amt=" + adjust_E_amt + "&adjust_F_no=" + adjust_F_no + "&adjust_F_amt=" + adjust_F_amt;
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
	var data = "module=item&event=search";
	var sp_001 = document.getElementById("calculate_sp_001");
	if (sp_001 != null) data = data + "&sp_001=" + sp_001.value;
	var sp_002 = document.getElementById("calculate_sp_002");
	if (sp_002 != null) data = data + "&sp_002=" + sp_002.value;
	var sp_003 = document.getElementById("calculate_sp_003");
	if (sp_003 != null) data = data + "&sp_003=" + sp_003.value;
	var sp_004 = document.getElementById("calculate_sp_004");
	if (sp_004 != null) data = data + "&sp_004=" + sp_004.value;
	var sp_005 = document.getElementById("calculate_sp_005");
	if (sp_005 != null) data = data + "&sp_005=" + sp_005.value;
	var sp_006 = document.getElementById("calculate_sp_006");
	if (sp_006 != null) data = data + "&sp_006=" + sp_006.value;
	var ss_001 = document.getElementById("calculate_ss_001");
	if (ss_001 != null) data = data + "&ss_001=" + ss_001.value;
	var ss_002 = document.getElementById("calculate_ss_002");
	if (ss_002 != null) data = data + "&ss_002=" + ss_002.value;
	var ss_003 = document.getElementById("calculate_ss_003");
	if (ss_003 != null) data = data + "&ss_003=" + ss_003.value;
	var ss_004 = document.getElementById("calculate_ss_004");
	if (ss_004 != null) data = data + "&ss_004=" + ss_004.value;
	var ss_005 = document.getElementById("calculate_ss_005");
	if (ss_005 != null) data = data + "&ss_005=" + ss_005.value;
	var ss_006 = document.getElementById("calculate_ss_006");
	if (ss_006 != null) data = data + "&ss_006=" + ss_006.value;
	var ss_007 = document.getElementById("calculate_ss_007");
	if (ss_007 != null) data = data + "&ss_007=" + ss_007.value;
	var ss_008 = document.getElementById("calculate_ss_008");
	if (ss_008 != null) data = data + "&ss_008=" + ss_008.value;
	var ss_009 = document.getElementById("calculate_ss_009");
	if (ss_009 != null) data = data + "&ss_009=" + ss_009.value;
	var ss_010 = document.getElementById("calculate_ss_010");
	if (ss_010 != null) data = data + "&ss_010=" + ss_010.value;
	var ss_011 = document.getElementById("calculate_ss_011");
	if (ss_011 != null) data = data + "&ss_011=" + ss_011.value;
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

function calculate_refresh() {
	if (document.getElementById("calculate_sp_001") != null) document.getElementById("calculate_sp_001").value = 0;
	if (document.getElementById("calculate_sp_002") != null) document.getElementById("calculate_sp_002").value = 0;
	if (document.getElementById("calculate_sp_003") != null) document.getElementById("calculate_sp_003").value = 0;
	if (document.getElementById("calculate_sp_004") != null) document.getElementById("calculate_sp_004").value = 0;
	if (document.getElementById("calculate_sp_005") != null) document.getElementById("calculate_sp_005").value = 0;
	if (document.getElementById("calculate_sp_006") != null) document.getElementById("calculate_sp_006").value = 0;
	if (document.getElementById("calculate_ss_001") != null) document.getElementById("calculate_ss_001").value = 0;
	if (document.getElementById("calculate_ss_002") != null) document.getElementById("calculate_ss_002").value = 0;
	if (document.getElementById("calculate_ss_003") != null) document.getElementById("calculate_ss_003").value = 0;
	if (document.getElementById("calculate_ss_004") != null) document.getElementById("calculate_ss_004").value = 0;
	if (document.getElementById("calculate_ss_005") != null) document.getElementById("calculate_ss_005").value = 0;
	if (document.getElementById("calculate_ss_006") != null) document.getElementById("calculate_ss_006").value = 0;
	if (document.getElementById("calculate_ss_007") != null) document.getElementById("calculate_ss_007").value = 0;
	if (document.getElementById("calculate_ss_008") != null) document.getElementById("calculate_ss_008").value = 0;
	if (document.getElementById("calculate_ss_009") != null) document.getElementById("calculate_ss_009").value = 0;
	if (document.getElementById("calculate_ss_010") != null) document.getElementById("calculate_ss_010").value = 0;
	if (document.getElementById("calculate_ss_011") != null) document.getElementById("calculate_ss_011").value = 0;
	document.getElementById("result_calculate_sp_001").innerHTML = 0;
	document.getElementById("result_calculate_sp_002").innerHTML = 0;
	document.getElementById("result_calculate_sp_003").innerHTML = 0;
	document.getElementById("result_calculate_sp_004").innerHTML = 0;
	document.getElementById("result_calculate_sp_005").innerHTML = 0;
	document.getElementById("result_calculate_sp_006").innerHTML = 0;
	document.getElementById("result_calculate_ss_001").innerHTML = 0;
	document.getElementById("result_calculate_ss_002").innerHTML = 0;
	document.getElementById("result_calculate_ss_003").innerHTML = 0;
	document.getElementById("result_calculate_ss_004").innerHTML = 0;
	document.getElementById("result_calculate_ss_005").innerHTML = 0;
	document.getElementById("result_calculate_ss_006").innerHTML = 0;
	document.getElementById("result_calculate_ss_007").innerHTML = 0;
	document.getElementById("result_calculate_ss_008").innerHTML = 0;
	document.getElementById("result_calculate_ss_009").innerHTML = 0;
	document.getElementById("result_calculate_ss_010").innerHTML = 0;
	document.getElementById("result_calculate_ss_011").innerHTML = 0;
	calculate_search();
}

function produce() {
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=item&event=produce";
	var sp_001 = document.getElementById("calculate_sp_001");
	if (sp_001 != null) data = data + "&sp_001=" + sp_001.value;
	var sp_002 = document.getElementById("calculate_sp_002");
	if (sp_002 != null) data = data + "&sp_002=" + sp_002.value;
	var sp_003 = document.getElementById("calculate_sp_003");
	if (sp_003 != null) data = data + "&sp_003=" + sp_003.value;
	var sp_004 = document.getElementById("calculate_sp_004");
	if (sp_004 != null) data = data + "&sp_004=" + sp_004.value;
	var sp_005 = document.getElementById("calculate_sp_005");
	if (sp_005 != null) data = data + "&sp_005=" + sp_005.value;
	var sp_006 = document.getElementById("calculate_sp_006");
	if (sp_006 != null) data = data + "&sp_006=" + sp_006.value;
	var ss_001 = document.getElementById("calculate_ss_001");
	if (ss_001 != null) data = data + "&ss_001=" + ss_001.value;
	var ss_002 = document.getElementById("calculate_ss_002");
	if (ss_002 != null) data = data + "&ss_002=" + ss_002.value;
	var ss_003 = document.getElementById("calculate_ss_003");
	if (ss_003 != null) data = data + "&ss_003=" + ss_003.value;
	var ss_004 = document.getElementById("calculate_ss_004");
	if (ss_004 != null) data = data + "&ss_004=" + ss_004.value;
	var ss_005 = document.getElementById("calculate_ss_005");
	if (ss_005 != null) data = data + "&ss_005=" + ss_005.value;
	var ss_006 = document.getElementById("calculate_ss_006");
	if (ss_006 != null) data = data + "&ss_006=" + ss_006.value;
	var ss_007 = document.getElementById("calculate_ss_007");
	if (ss_007 != null) data = data + "&ss_007=" + ss_007.value;
	var ss_008 = document.getElementById("calculate_ss_008");
	if (ss_008 != null) data = data + "&ss_008=" + ss_008.value;
	var ss_009 = document.getElementById("calculate_ss_009");
	if (ss_009 != null) data = data + "&ss_009=" + ss_009.value;
	var ss_010 = document.getElementById("calculate_ss_010");
	if (ss_010 != null) data = data + "&ss_010=" + ss_010.value;
	var ss_011 = document.getElementById("calculate_ss_011");
	if (ss_011 != null) data = data + "&ss_011=" + ss_011.value;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
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
	else if (whouse == 'Yilan') {
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
	var option0 = document.createElement("option"); option0.text = '全部'; option0.value = 'all';
	var option_NaOH = document.createElement("option"); option_NaOH.text = '鹼'; option_NaOH.value = 'NaOH';
	var option_oil_001 = document.createElement("option"); option_oil_001.text = '橄欖油'; option_oil_001.value = 'oil_001';
	var option_oil_002 = document.createElement("option"); option_oil_002.text = '棕梠油'; option_oil_002.value = 'oil_002';
	var option_oil_003 = document.createElement("option"); option_oil_003.text = '椰子油'; option_oil_003.value = 'oil_003';
	var option_oil_004 = document.createElement("option"); option_oil_004.text = '米糠油'; option_oil_004.value = 'oil_004';
	var option_oil_005 = document.createElement("option"); option_oil_005.text = '紅棕梠油'; option_oil_005.value = 'oil_005';
	var option_oil_006 = document.createElement("option"); option_oil_006.text = '葡萄籽油'; option_oil_006.value = 'oil_006';
	var option_oil_007 = document.createElement("option"); option_oil_007.text = '苦茶油'; option_oil_007.value = 'oil_007';
	var option_oil_008 = document.createElement("option"); option_oil_008.text = '蓖麻油'; option_oil_008.value = 'oil_008';
	var option_oil_009 = document.createElement("option"); option_oil_009.text = '乳油木果脂'; option_oil_009.value = 'oil_009';
	var option_oil_010 = document.createElement("option"); option_oil_010.text = '榛果油'; option_oil_010.value = 'oil_010';
	var option_oil_011 = document.createElement("option"); option_oil_011.text = '芥花油'; option_oil_011.value = 'oil_011';
	var option_oil_012 = document.createElement("option"); option_oil_012.text = '酪梨油'; option_oil_012.value = 'oil_012';
	var option_oil_013 = document.createElement("option"); option_oil_013.text = '甜杏仁油'; option_oil_013.value = 'oil_013';
	var option_oil_014 = document.createElement("option"); option_oil_014.text = '山茶花油'; option_oil_014.value = 'oil_014';
	var option_additive_001 = document.createElement("option"); option_additive_001.text = '金針花瓣'; option_additive_001.value = 'additive_001';
	var option_additive_002 = document.createElement("option"); option_additive_002.text = '釋迦果粉'; option_additive_002.value = 'additive_002';
	var option_additive_003 = document.createElement("option"); option_additive_003.text = '釋迦果泥'; option_additive_003.value = 'additive_003';
	var option_additive_004 = document.createElement("option"); option_additive_004.text = '米粉'; option_additive_004.value = 'additive_004';
	var option_additive_005 = document.createElement("option"); option_additive_005.text = '蕁麻葉粉'; option_additive_005.value = 'additive_005';
	var option_additive_006 = document.createElement("option"); option_additive_006.text = '金盞花粉'; option_additive_006.value = 'additive_006';
	var option_additive_007 = document.createElement("option"); option_additive_007.text = '金針花粉'; option_additive_007.value = 'additive_007';
	var option_additive_008 = document.createElement("option"); option_additive_008.text = '薑黃粉'; option_additive_008.value = 'additive_008';
	var option_additive_009 = document.createElement("option"); option_additive_009.text = '紅麴粉'; option_additive_009.value = 'additive_009';
	var option_additive_010 = document.createElement("option"); option_additive_010.text = '洛神花粉'; option_additive_010.value = 'additive_010';
	var option_additive_011 = document.createElement("option"); option_additive_011.text = '蜜蠟'; option_additive_011.value = 'additive_011';
	var option_additive_012 = document.createElement("option"); option_additive_012.text = '黑豆粉'; option_additive_012.value = 'additive_012';
	var option_additive_013 = document.createElement("option"); option_additive_013.text = '蜂蜜'; option_additive_013.value = 'additive_013';
	var option_additive_014 = document.createElement("option"); option_additive_014.text = '地瓜'; option_additive_014.value = 'additive_014';
	var option_additive_015 = document.createElement("option"); option_additive_015.text = '金棗'; option_additive_015.value = 'additive_015';
	var option_additive_016 = document.createElement("option"); option_additive_016.text = '海藻乾燥'; option_additive_016.value = 'additive_016';
	var option_additive_017 = document.createElement("option"); option_additive_017.text = '竹炭粉'; option_additive_017.value = 'additive_017';
	var option_package_001 = document.createElement("option"); option_package_001.text = '不織布包'; option_package_001.value = 'package_001';
	var option_package_002a = document.createElement("option"); option_package_002a.text = '洛神紅麴皂絲鋁包'; option_package_002a.value = 'package_002a';
	var option_package_002b = document.createElement("option"); option_package_002b.text = '暖暖薑黃皂絲鋁包'; option_package_002b.value = 'package_002b';
	var option_package_002c = document.createElement("option"); option_package_002c.text = '萱草米黃皂絲鋁包'; option_package_002c.value = 'package_002c';
	var option_package_002d = document.createElement("option"); option_package_002d.text = '黑豆清爽皂絲鋁包'; option_package_002d.value = 'package_002d';
	var option_package_002e = document.createElement("option"); option_package_002e.text = '米糠馬賽皂絲鋁包'; option_package_002e.value = 'package_002e';
	var option_package_002f = document.createElement("option"); option_package_002f.text = '蜂蜜甜心皂絲鋁包'; option_package_002f.value = 'package_002f';
	var option_package_003 = document.createElement("option"); option_package_003.text = '單顆皂禮盒封套'; option_package_003.value = 'package_003';
	var option_package_004 = document.createElement("option"); option_package_004.text = '單顆皂禮盒內盒'; option_package_004.value = 'package_004';
	var option_package_005 = document.createElement("option"); option_package_005.text = '皂絲禮盒'; option_package_005.value = 'package_005';
	var option_package_006 = document.createElement("option"); option_package_006.text = '內襯'; option_package_006.value = 'package_006';
	var option_package_007a = document.createElement("option"); option_package_007a.text = '米皂外盒100g'; option_package_007a.value = 'package_007a';
	var option_package_008a = document.createElement("option"); option_package_008a.text = '金針皂外盒100g'; option_package_008a.value = 'package_008a';
	var option_package_009a = document.createElement("option"); option_package_009a.text = '釋迦皂外盒100g'; option_package_009a.value = 'package_009a';
	var option_package_010a = document.createElement("option"); option_package_010a.text = '地瓜皂外盒100g'; option_package_010a.value = 'package_010a';
	var option_package_011a = document.createElement("option"); option_package_011a.text = '金棗皂外盒100g'; option_package_011a.value = 'package_011a';
	var option_package_012a = document.createElement("option"); option_package_012a.text = '海藻皂外盒100g'; option_package_012a.value = 'package_012a';
	var option_newyear_package_1 = document.createElement("option"); option_newyear_package_1.text = '宜蘭媽祖保庇禮盒上蓋'; option_newyear_package_1.value = 'newyear_package_1';
	var option_newyear_package_2 = document.createElement("option"); option_newyear_package_2.text = '宜蘭媽祖保庇禮盒外盒'; option_newyear_package_2.value = 'newyear_package_2';
	var option_newyear_package_3 = document.createElement("option"); option_newyear_package_3.text = '台東新春嘉年禮盒上蓋'; option_newyear_package_3.value = 'newyear_package_3';
	var option_newyear_package_4 = document.createElement("option"); option_newyear_package_4.text = '台東新春嘉年禮盒外盒'; option_newyear_package_4.value = 'newyear_package_4';
	var option_product_sp_001a = document.createElement("option"); option_product_sp_001a.text = '田靜山巒禾風皂100g'; option_product_sp_001a.value = 'product_sp_001a';
	var option_product_sp_002a = document.createElement("option"); option_product_sp_002a.text = '金絲森林渲染皂100g'; option_product_sp_002a.value = 'product_sp_002a';
	var option_product_sp_003a = document.createElement("option"); option_product_sp_003a.text = '釋迦手感果力皂100g'; option_product_sp_003a.value = 'product_sp_003a';
	var option_product_sp_004a = document.createElement("option"); option_product_sp_004a.text = '紅瓜天然家事皂100g'; option_product_sp_004a.value = 'product_sp_004a';
	var option_product_sp_005a = document.createElement("option"); option_product_sp_005a.text = '金柑苦茶洗髮皂100g'; option_product_sp_005a.value = 'product_sp_005a';
	var option_product_sp_006a = document.createElement("option"); option_product_sp_006a.text = '石花淨白洗面皂100g'; option_product_sp_006a.value = 'product_sp_006a';
	var option_product_sp_box_001 = document.createElement("option"); option_product_sp_box_001.text = '三三台東意象禮盒組'; option_product_sp_box_001.value = 'product_sp_box_001';
	var option_product_sp_box_002 = document.createElement("option"); option_product_sp_box_002.text = '三三宜蘭經典禮盒組'; option_product_sp_box_002.value = 'product_sp_box_002';
	var option_product_ss_001 = document.createElement("option"); option_product_ss_001.text = '洛神紅麴旅用皂絲'; option_product_ss_001.value = 'product_ss_001';
	var option_product_ss_002 = document.createElement("option"); option_product_ss_002.text = '暖暖薑黃旅用皂絲'; option_product_ss_002.value = 'product_ss_002';
	var option_product_ss_003 = document.createElement("option"); option_product_ss_003.text = '萱草米黃旅用皂絲'; option_product_ss_003.value = 'product_ss_003';
	var option_product_ss_004 = document.createElement("option"); option_product_ss_004.text = '黑豆清爽旅用皂絲'; option_product_ss_004.value = 'product_ss_004';
	var option_product_ss_005 = document.createElement("option"); option_product_ss_005.text = '米糠馬賽旅用皂絲'; option_product_ss_005.value = 'product_ss_005';
	var option_product_ss_006 = document.createElement("option"); option_product_ss_006.text = '蜂蜜甜心旅用皂絲'; option_product_ss_006.value = 'product_ss_006';
	var option_product_ss_box_001 = document.createElement("option"); option_product_ss_box_001.text = '三三台東意象皂絲旅行組'; option_product_ss_box_001.value = 'product_ss_box_001';
	var option_product_ss_box_002 = document.createElement("option"); option_product_ss_box_002.text = '三三宜蘭經典皂絲旅行組'; option_product_ss_box_002.value = 'product_ss_box_002';
	var option_newyear_box_1 = document.createElement("option"); option_newyear_box_1.text = '宜蘭媽祖保庇禮盒'; option_newyear_box_1.value = 'newyear_box_1';
	var option_newyear_box_2 = document.createElement("option"); option_newyear_box_2.text = '台東新春嘉年禮盒'; option_newyear_box_2.value = 'newyear_box_2';
	var option_sp_001_100 = document.createElement("option"); option_sp_001_100.text = '米皂100g'; option_sp_001_100.value = 'sp_001_100';
	var option_sp_002_100 = document.createElement("option"); option_sp_002_100.text = '金針皂100g'; option_sp_002_100.value = 'sp_002_100';
	var option_sp_003_100 = document.createElement("option"); option_sp_003_100.text = '釋迦皂100g'; option_sp_003_100.value = 'sp_003_100';
	var option_sp_004_100 = document.createElement("option"); option_sp_004_100.text = '地瓜皂100g'; option_sp_004_100.value = 'sp_004_100';
	var option_sp_005_100 = document.createElement("option"); option_sp_005_100.text = '金棗皂100g'; option_sp_005_100.value = 'sp_005_100';
	var option_sp_006_100 = document.createElement("option"); option_sp_006_100.text = '海藻皂100g'; option_sp_006_100.value = 'sp_006_100';
	var option_ss_001 = document.createElement("option"); option_ss_001.text = '洛神皂'; option_ss_001.value = 'ss_001';
	var option_ss_002 = document.createElement("option"); option_ss_002.text = '紅麴皂'; option_ss_002.value = 'ss_002';
	var option_ss_003 = document.createElement("option"); option_ss_003.text = '薑黃皂'; option_ss_003.value = 'ss_003';
	var option_ss_004 = document.createElement("option"); option_ss_004.text = '蕁麻葉皂'; option_ss_004.value = 'ss_004';
	var option_ss_005 = document.createElement("option"); option_ss_005.text = '金針皂'; option_ss_005.value = 'ss_005';
	var option_ss_006 = document.createElement("option"); option_ss_006.text = '紅棕梠皂'; option_ss_006.value = 'ss_006';
	var option_ss_007 = document.createElement("option"); option_ss_007.text = '黑豆皂'; option_ss_007.value = 'ss_007';
	var option_ss_008 = document.createElement("option"); option_ss_008.text = '竹炭皂'; option_ss_008.value = 'ss_008';
	var option_ss_009 = document.createElement("option"); option_ss_009.text = '米粉皂'; option_ss_009.value = 'ss_009';
	var option_ss_010 = document.createElement("option"); option_ss_010.text = '蕁麻葉皂'; option_ss_010.value = 'ss_010';
	var option_ss_011 = document.createElement("option"); option_ss_011.text = '蜂蜜皂'; option_ss_011.value = 'ss_011';
	var option_sp_001_100_houshanpi = document.createElement("option"); option_sp_001_100_houshanpi.text = '後山埤的米皂100g'; option_sp_001_100_houshanpi.value = 'sp_001_100_houshanpi';
	var option_sp_002_100_houshanpi = document.createElement("option"); option_sp_002_100_houshanpi.text = '後山埤的金針皂100g'; option_sp_002_100_houshanpi.value = 'sp_002_100_houshanpi';
	var option_sp_003_100_houshanpi = document.createElement("option"); option_sp_003_100_houshanpi.text = '後山埤的釋迦皂100g'; option_sp_003_100_houshanpi.value = 'sp_003_100_houshanpi';
	if (whouse == 'all') {
		if (itemclass == 'A') {
			item.add(option0);				item.add(option_NaOH);
			item.add(option_oil_001);		item.add(option_oil_002);
			item.add(option_oil_003);		item.add(option_oil_004);
			item.add(option_oil_005);		item.add(option_oil_006);
			item.add(option_oil_007);		item.add(option_oil_008);
			item.add(option_oil_009);		item.add(option_oil_010);
			item.add(option_oil_011);		item.add(option_oil_012);
			item.add(option_oil_013);		item.add(option_oil_014);
		}
		else if (itemclass == 'B') {
			item.add(option0);				item.add(option_additive_001);
			item.add(option_additive_002);	item.add(option_additive_003);
			item.add(option_additive_004);	item.add(option_additive_005);
			item.add(option_additive_006);	item.add(option_additive_007);
			item.add(option_additive_008);	item.add(option_additive_009);
			item.add(option_additive_010);	item.add(option_additive_011);
			item.add(option_additive_012);	item.add(option_additive_013);
			item.add(option_additive_014);	item.add(option_additive_015);
			item.add(option_additive_016);	item.add(option_additive_017);
		}
		else if (itemclass == 'C') {
			item.add(option0);				item.add(option_package_001);
			item.add(option_package_002a);	item.add(option_package_002b);
			item.add(option_package_002c);	item.add(option_package_002d);
			item.add(option_package_002e);	item.add(option_package_002f);
			item.add(option_package_003);	item.add(option_package_004);
			item.add(option_package_005);	item.add(option_package_006);
			item.add(option_package_007a);	item.add(option_package_008a);
			item.add(option_package_009a);	item.add(option_package_010a);
			item.add(option_package_011a);	item.add(option_package_012a);
			item.add(option_newyear_package_1);	item.add(option_newyear_package_2);
			item.add(option_newyear_package_3);	item.add(option_newyear_package_4);
		}
		else if (itemclass == 'D') {
			item.add(option0);
			item.add(option_product_sp_001a);
			item.add(option_product_sp_002a);
			item.add(option_product_sp_003a);
			item.add(option_product_sp_004a);
			item.add(option_product_sp_005a);
			item.add(option_product_sp_006a);
			item.add(option_product_sp_box_001);
			item.add(option_product_sp_box_002);
			item.add(option_product_ss_001);
			item.add(option_product_ss_002);
			item.add(option_product_ss_003);
			item.add(option_product_ss_004);
			item.add(option_product_ss_005);
			item.add(option_product_ss_006);
			item.add(option_product_ss_box_001);
			item.add(option_product_ss_box_002);
			item.add(option_newyear_box_1);
			item.add(option_newyear_box_2);
		}
		else if (itemclass == 'E') {
			item.add(option0);				item.add(option_sp_001_100);
			item.add(option_sp_002_100);	item.add(option_sp_003_100);
			item.add(option_sp_004_100);	item.add(option_sp_005_100);
			item.add(option_sp_006_100);	item.add(option_ss_001);
			item.add(option_ss_002);		item.add(option_ss_003);
			item.add(option_ss_004);		item.add(option_ss_005);
			item.add(option_ss_006);		item.add(option_ss_007);
			item.add(option_ss_008);		item.add(option_ss_009);
			item.add(option_ss_010);		item.add(option_ss_011);
		}
		else if (itemclass == 'F') {
			item.add(option0);
		}
		else if (itemclass == 'H') {
			item.add(option0);
			item.add(option_sp_001_100_houshanpi);
			item.add(option_sp_002_100_houshanpi);
			item.add(option_sp_003_100_houshanpi);
		}
	}
	else if (whouse == 'Beitou') {
		if (itemclass == 'A') {
			item.add(option0);				item.add(option_NaOH);
			item.add(option_oil_001);		item.add(option_oil_002);
			item.add(option_oil_003);		item.add(option_oil_004);
			item.add(option_oil_005);		item.add(option_oil_006);
			item.add(option_oil_007);		item.add(option_oil_008);
			item.add(option_oil_009);
		}
		else if (itemclass == 'B') {
			item.add(option0);				item.add(option_additive_001);
			item.add(option_additive_002);	item.add(option_additive_003);
			item.add(option_additive_004);	item.add(option_additive_005);
			item.add(option_additive_006);	item.add(option_additive_007);
			item.add(option_additive_008);	item.add(option_additive_009);
			item.add(option_additive_010);
		}
		else if (itemclass == 'C') {
			item.add(option0);				item.add(option_package_001);
			item.add(option_package_002a);	item.add(option_package_002b);
			item.add(option_package_002c);	item.add(option_package_002d);
			item.add(option_package_002e);	item.add(option_package_002f);
			item.add(option_package_003);	item.add(option_package_004);
			item.add(option_package_005);	item.add(option_package_006);
			item.add(option_package_007a);	item.add(option_package_008a);
			item.add(option_package_009a);	item.add(option_package_010a);
			item.add(option_package_011a);	item.add(option_package_012a);
			item.add(option_newyear_package_1);	item.add(option_newyear_package_2);
			item.add(option_newyear_package_3);	item.add(option_newyear_package_4);
		}
		else if (itemclass == 'D') {
			item.add(option0);
			item.add(option_product_sp_001a);
			item.add(option_product_sp_002a);
			item.add(option_product_sp_003a);
			item.add(option_product_sp_004a);
			item.add(option_product_sp_005a);
			item.add(option_product_sp_006a);
			item.add(option_product_sp_box_001);
			item.add(option_product_sp_box_002);
			item.add(option_product_ss_001);
			item.add(option_product_ss_002);
			item.add(option_product_ss_003);
			item.add(option_product_ss_004);
			item.add(option_product_ss_005);
			item.add(option_product_ss_006);
			item.add(option_product_ss_box_001);
			item.add(option_product_ss_box_002);
			item.add(option_newyear_box_1);
			item.add(option_newyear_box_2);
		}
		else if (itemclass == 'E') {
			item.add(option0);				item.add(option_sp_001_100);
			item.add(option_sp_002_100);	item.add(option_sp_003_100);
			item.add(option_sp_004_100);	item.add(option_sp_005_100);
			item.add(option_sp_006_100);	item.add(option_ss_001);
			item.add(option_ss_002);		item.add(option_ss_003);
			item.add(option_ss_004);		item.add(option_ss_005);
			item.add(option_ss_006);		item.add(option_ss_007);
			item.add(option_ss_008);		item.add(option_ss_009);
			item.add(option_ss_010);		item.add(option_ss_011);
		}
		else if (itemclass == 'F') {
			item.add(option0);
		}
		else if (itemclass == 'H') {
			item.add(option0);
			item.add(option_sp_001_100_houshanpi);
			item.add(option_sp_002_100_houshanpi);
			item.add(option_sp_003_100_houshanpi);
		}
	}
	else if (whouse == 'Houshanpi') {
		if (itemclass == 'F') {
			item.add(option0);
		}
		else if (itemclass == 'H') {
			item.add(option0);
			item.add(option_sp_001_100_houshanpi);
			item.add(option_sp_002_100_houshanpi);
			item.add(option_sp_003_100_houshanpi);
		}
	}
	else if (whouse == 'Taitung') {
		if (itemclass == 'A') {
			item.add(option0);				item.add(option_NaOH);
			item.add(option_oil_001);		item.add(option_oil_002);
			item.add(option_oil_003);		item.add(option_oil_004);
			item.add(option_oil_005);		item.add(option_oil_006);
			item.add(option_oil_007);		item.add(option_oil_008);
			item.add(option_oil_009);
		}
		else if (itemclass == 'B') {
			item.add(option0);				item.add(option_additive_001);
			item.add(option_additive_002);	item.add(option_additive_003);
			item.add(option_additive_004);	item.add(option_additive_005);
			item.add(option_additive_006);	item.add(option_additive_007);
			item.add(option_additive_008);	item.add(option_additive_009);
			item.add(option_additive_010);
		}
		else if (itemclass == 'E') {
			item.add(option0);				item.add(option_sp_001_100);
			item.add(option_sp_002_100);	item.add(option_sp_003_100);
			item.add(option_ss_001);		item.add(option_ss_002);
			item.add(option_ss_003);		item.add(option_ss_004);
			item.add(option_ss_005);		item.add(option_ss_006);
		}
		else if (itemclass == 'F') {
			item.add(option0);
		}
	}
	else if (whouse == 'Yilan') {
		if (itemclass == 'A') {
			item.add(option0);				item.add(option_NaOH);
			item.add(option_oil_001);		item.add(option_oil_002);
			item.add(option_oil_003);		item.add(option_oil_004);
			item.add(option_oil_005);		item.add(option_oil_008);
			item.add(option_oil_009);		item.add(option_oil_010);
			item.add(option_oil_011);		item.add(option_oil_012);
			item.add(option_oil_013);		item.add(option_oil_014);
		}
		else if (itemclass == 'B') {
			item.add(option0);				item.add(option_additive_004);
			item.add(option_additive_005);	item.add(option_additive_011);
			item.add(option_additive_012);	item.add(option_additive_013);
			item.add(option_additive_014);	item.add(option_additive_015);
			item.add(option_additive_016);	item.add(option_additive_017);
		}
		else if (itemclass == 'C') {
			item.add(option0);				item.add(option_package_001);
			item.add(option_package_002d);	item.add(option_package_002e);
			item.add(option_package_002f);	item.add(option_package_003);
			item.add(option_package_004);	item.add(option_package_005);
			item.add(option_package_006);	item.add(option_package_010a);
			item.add(option_package_011a);	item.add(option_package_012a);
			item.add(option_newyear_package_1);	item.add(option_newyear_package_2);
		}
		else if (itemclass == 'D') {
			item.add(option0);
			item.add(option_product_sp_004a);
			item.add(option_product_sp_005a);
			item.add(option_product_sp_006a);
			item.add(option_product_sp_box_002);
			item.add(option_product_ss_004);
			item.add(option_product_ss_005);
			item.add(option_product_ss_006);
			item.add(option_product_ss_box_002);
			item.add(option_newyear_box_1);
		}
		else if (itemclass == 'E') {
			item.add(option0);				
			item.add(option_sp_004_100);	item.add(option_sp_005_100);
			item.add(option_sp_006_100);	item.add(option_ss_007);
			item.add(option_ss_008);		item.add(option_ss_009);
			item.add(option_ss_010);		item.add(option_ss_011);
		}
		else if (itemclass == 'F') {
			item.add(option0);
		}
	}
}

function command() {
	var command = document.getElementById("command").value;
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=command&event=command_search&command=" + command;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementsByClassName("command_content")[0].innerHTML = data.command;
				document.getElementsByClassName("command_content")[0].style.display = '';
				document.getElementsByClassName("command_content")[1].style.display = '';
				if (command == 'C1' || command == 'C2' || command == 'C3' || command == 'C4') {
					document.getElementById("command_date").style.display = '';
				}
				else {
					document.getElementById("command_date").style.display = 'none';
				}
			}
			else {
				document.getElementsByClassName("command_content")[0].innerHTML = '';
				document.getElementsByClassName("command_content")[0].style.display = 'none';
				document.getElementsByClassName("command_content")[1].style.display = 'none';
				document.getElementById("command_date").style.display = 'none';
			}
		}
	}
}

function command_check() {
	var command = document.getElementById("command").value;
	var command_memo = document.getElementById("command_memo").value;
	if (command == 'A1' || command == 'A2' || command == 'A3') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		data = "module=command&event=send&type=" + command + "&command_memo=" + command_memo;
		if (document.getElementById("command_oil_001") != null) data = data + "&oil_001=" + document.getElementById("command_oil_001").value;
		if (document.getElementById("command_oil_002") != null) data = data + "&oil_002=" + document.getElementById("command_oil_002").value;
		if (document.getElementById("command_oil_003") != null) data = data + "&oil_003=" + document.getElementById("command_oil_003").value;
		if (document.getElementById("command_oil_004") != null) data = data + "&oil_004=" + document.getElementById("command_oil_004").value;
		if (document.getElementById("command_oil_005") != null) data = data + "&oil_005=" + document.getElementById("command_oil_005").value;
		if (document.getElementById("command_oil_006") != null) data = data + "&oil_006=" + document.getElementById("command_oil_006").value;
		if (document.getElementById("command_oil_007") != null) data = data + "&oil_007=" + document.getElementById("command_oil_007").value;
		if (document.getElementById("command_oil_008") != null) data = data + "&oil_008=" + document.getElementById("command_oil_008").value;
		if (document.getElementById("command_oil_009") != null) data = data + "&oil_009=" + document.getElementById("command_oil_009").value;
		if (document.getElementById("command_oil_010") != null) data = data + "&oil_010=" + document.getElementById("command_oil_010").value;
		if (document.getElementById("command_oil_011") != null) data = data + "&oil_011=" + document.getElementById("command_oil_011").value;
		if (document.getElementById("command_oil_012") != null) data = data + "&oil_012=" + document.getElementById("command_oil_012").value;
		if (document.getElementById("command_oil_013") != null) data = data + "&oil_013=" + document.getElementById("command_oil_013").value;
		if (document.getElementById("command_oil_014") != null) data = data + "&oil_014=" + document.getElementById("command_oil_014").value;
		if (document.getElementById("command_NaOH") != null) data = data + "&NaOH=" + document.getElementById("command_NaOH").value;
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
	else if (command == 'B1' || command == 'B2') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		data = "module=command&event=send&type=" + command + "&command_memo=" + command_memo;
		if (document.getElementById("command_product_sp_001a") != null) data = data + "&product_sp_001a=" + document.getElementById("command_product_sp_001a").value;
		if (document.getElementById("command_product_sp_002a") != null) data = data + "&product_sp_002a=" + document.getElementById("command_product_sp_002a").value;
		if (document.getElementById("command_product_sp_003a") != null) data = data + "&product_sp_003a=" + document.getElementById("command_product_sp_003a").value;
		if (document.getElementById("command_product_sp_004a") != null) data = data + "&product_sp_004a=" + document.getElementById("command_product_sp_004a").value;
		if (document.getElementById("command_product_sp_005a") != null) data = data + "&product_sp_005a=" + document.getElementById("command_product_sp_005a").value;
		if (document.getElementById("command_product_sp_006a") != null) data = data + "&product_sp_006a=" + document.getElementById("command_product_sp_006a").value;
		if (document.getElementById("command_product_sp_box_001") != null) data = data + "&product_sp_box_001=" + document.getElementById("command_product_sp_box_001").value;
		if (document.getElementById("command_product_sp_box_002") != null) data = data + "&product_sp_box_002=" + document.getElementById("command_product_sp_box_002").value;
		if (document.getElementById("command_product_ss_001") != null) data = data + "&product_ss_001=" + document.getElementById("command_product_ss_001").value;
		if (document.getElementById("command_product_ss_002") != null) data = data + "&product_ss_002=" + document.getElementById("command_product_ss_002").value;
		if (document.getElementById("command_product_ss_003") != null) data = data + "&product_ss_003=" + document.getElementById("command_product_ss_003").value;
		if (document.getElementById("command_product_ss_004") != null) data = data + "&product_ss_004=" + document.getElementById("command_product_ss_004").value;
		if (document.getElementById("command_product_ss_005") != null) data = data + "&product_ss_005=" + document.getElementById("command_product_ss_005").value;
		if (document.getElementById("command_product_ss_006") != null) data = data + "&product_ss_006=" + document.getElementById("command_product_ss_006").value;
		if (document.getElementById("command_product_ss_box_001") != null) data = data + "&product_ss_box_001=" + document.getElementById("command_product_ss_box_001").value;
		if (document.getElementById("command_product_ss_box_002") != null) data = data + "&product_ss_box_002=" + document.getElementById("command_product_ss_box_002").value;
		if (document.getElementById("command_newyear_box_1") != null) data = data + "&newyear_box_1=" + document.getElementById("command_newyear_box_1").value;
		if (document.getElementById("command_newyear_box_2") != null) data = data + "&newyear_box_2=" + document.getElementById("command_newyear_box_2").value;
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
	else if (command == 'C1' || command == 'C2' || command == 'C3' || command == 'C4') {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		data = "module=command&event=send&type=" + command + "&command_memo=" + command_memo;
		if (document.getElementById("command_sp_001") != null) data = data + "&sp_001=" + document.getElementById("command_sp_001").value;
		if (document.getElementById("command_sp_002") != null) data = data + "&sp_002=" + document.getElementById("command_sp_002").value;
		if (document.getElementById("command_sp_003") != null) data = data + "&sp_003=" + document.getElementById("command_sp_003").value;
		if (document.getElementById("command_sp_004") != null) data = data + "&sp_004=" + document.getElementById("command_sp_004").value;
		if (document.getElementById("command_sp_005") != null) data = data + "&sp_005=" + document.getElementById("command_sp_005").value;
		if (document.getElementById("command_sp_006") != null) data = data + "&sp_006=" + document.getElementById("command_sp_006").value;
		if (document.getElementById("command_ss_001") != null) data = data + "&ss_001=" + document.getElementById("command_ss_001").value;
		if (document.getElementById("command_ss_002") != null) data = data + "&ss_002=" + document.getElementById("command_ss_002").value;
		if (document.getElementById("command_ss_003") != null) data = data + "&ss_003=" + document.getElementById("command_ss_003").value;
		if (document.getElementById("command_ss_004") != null) data = data + "&ss_004=" + document.getElementById("command_ss_004").value;
		if (document.getElementById("command_ss_005") != null) data = data + "&ss_005=" + document.getElementById("command_ss_005").value;
		if (document.getElementById("command_ss_006") != null) data = data + "&ss_006=" + document.getElementById("command_ss_006").value;
		if (document.getElementById("command_ss_007") != null) data = data + "&ss_007=" + document.getElementById("command_ss_007").value;
		if (document.getElementById("command_ss_008") != null) data = data + "&ss_008=" + document.getElementById("command_ss_008").value;
		if (document.getElementById("command_ss_009") != null) data = data + "&ss_009=" + document.getElementById("command_ss_009").value;
		if (document.getElementById("command_ss_010") != null) data = data + "&ss_010=" + document.getElementById("command_ss_010").value;
		if (document.getElementById("command_ss_011") != null) data = data + "&ss_011=" + document.getElementById("command_ss_011").value;
		data = data + "&date_start=" + document.getElementById("date_start").value;
		data = data + "&date_end=" + document.getElementById("date_end").value;
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

function sp_box_001_change() {
	var sp_box_num = document.getElementById("package_sp_box_001").value;
	document.getElementById("sp_001_type1").value = 0;
	document.getElementById("sp_002_type1").value = 0;
	document.getElementById("sp_003_type1").value = 0;
	document.getElementById("sp_001_type2").value = sp_box_num;
	document.getElementById("sp_002_type2").value = sp_box_num;
	document.getElementById("sp_003_type2").value = sp_box_num;
}

function sp_box_002_change() {
	var sp_box_num = document.getElementById("package_sp_box_002").value;
	document.getElementById("sp_004_type1").value = 0;
	document.getElementById("sp_005_type1").value = 0;
	document.getElementById("sp_006_type1").value = 0;
	document.getElementById("sp_004_type2").value = sp_box_num;
	document.getElementById("sp_005_type2").value = sp_box_num;
	document.getElementById("sp_006_type2").value = sp_box_num;
}

function ss_box_001_change() {
	var ss_box_num = document.getElementById("package_ss_box_001").value;
	document.getElementById("ss_001_type1").value = ss_box_num * 2;
	document.getElementById("ss_002_type1").value = ss_box_num * 2;
	document.getElementById("ss_003_type1").value = ss_box_num * 2;
}

function ss_box_002_change() {
	var ss_box_num = document.getElementById("package_ss_box_002").value;
	document.getElementById("ss_004_type1").value = ss_box_num * 2;
	document.getElementById("ss_005_type1").value = ss_box_num * 2;
	document.getElementById("ss_006_type1").value = ss_box_num * 2;
}

function package() {
	var data = "module=item&event=package";
	if (document.getElementById("product_sp_001a") != null) { data = data + "&product_sp_001a=" + document.getElementById("product_sp_001a").value; }
	if (document.getElementById("product_sp_002a") != null) { data = data + "&product_sp_002a=" + document.getElementById("product_sp_002a").value; }
	if (document.getElementById("product_sp_003a") != null) { data = data + "&product_sp_003a=" + document.getElementById("product_sp_003a").value; }
	data = data + "&product_sp_004a=" + document.getElementById("product_sp_004a").value;
	data = data + "&product_sp_005a=" + document.getElementById("product_sp_005a").value;
	data = data + "&product_sp_006a=" + document.getElementById("product_sp_006a").value;
	if (document.getElementById("product_sp_box_001") != null) { data = data + "&product_sp_box_001=" + document.getElementById("product_sp_box_001").value; }
	data = data + "&product_sp_box_002=" + document.getElementById("product_sp_box_002").value;
	if (document.getElementById("product_ss_001") != null) { data = data + "&product_ss_001=" + document.getElementById("product_ss_001").value; }
	if (document.getElementById("product_ss_002") != null) { data = data + "&product_ss_002=" + document.getElementById("product_ss_002").value; }
	if (document.getElementById("product_ss_003") != null) { data = data + "&product_ss_003=" + document.getElementById("product_ss_003").value; }
	data = data + "&product_ss_004=" + document.getElementById("product_ss_004").value;
	data = data + "&product_ss_005=" + document.getElementById("product_ss_005").value;
	data = data + "&product_ss_006=" + document.getElementById("product_ss_006").value;
	if (document.getElementById("product_ss_box_001") != null) { data = data + "&product_ss_box_001=" + document.getElementById("product_ss_box_001").value; }
	data = data + "&product_ss_box_002=" + document.getElementById("product_ss_box_002").value;
	data = data + "&product_newyear_box_1=" + document.getElementById("product_newyear_box_1").value;
	if (document.getElementById("product_newyear_box_2") != null) { data = data + "&product_newyear_box_2=" + document.getElementById("product_newyear_box_2").value; }
	if (document.getElementById("sp_001_type1") != null) { data = data + "&sp_001_type1=" + document.getElementById("sp_001_type1").value; }
	if (document.getElementById("sp_002_type1") != null) { data = data + "&sp_002_type1=" + document.getElementById("sp_002_type1").value; }
	if (document.getElementById("sp_003_type1") != null) { data = data + "&sp_003_type1=" + document.getElementById("sp_003_type1").value; }
	if (document.getElementById("sp_001_type2") != null) { data = data + "&sp_001_type2=" + document.getElementById("sp_001_type2").value; }
	if (document.getElementById("sp_002_type2") != null) { data = data + "&sp_002_type2=" + document.getElementById("sp_002_type2").value; }
	if (document.getElementById("sp_003_type2") != null) { data = data + "&sp_003_type2=" + document.getElementById("sp_003_type2").value; }
	if (document.getElementById("ss_001_type1") != null) { data = data + "&ss_001_type1=" + document.getElementById("ss_001_type1").value; }
	if (document.getElementById("ss_002_type1") != null) { data = data + "&ss_002_type1=" + document.getElementById("ss_002_type1").value; }
	if (document.getElementById("ss_003_type1") != null) { data = data + "&ss_003_type1=" + document.getElementById("ss_003_type1").value; }
	data = data + "&sp_004_type1=" + document.getElementById("sp_004_type1").value;
	data = data + "&sp_005_type1=" + document.getElementById("sp_005_type1").value;
	data = data + "&sp_006_type1=" + document.getElementById("sp_006_type1").value;
	data = data + "&sp_004_type2=" + document.getElementById("sp_004_type2").value;
	data = data + "&sp_005_type2=" + document.getElementById("sp_005_type2").value;
	data = data + "&sp_006_type2=" + document.getElementById("sp_006_type2").value;
	data = data + "&ss_004_type1=" + document.getElementById("ss_004_type1").value;
	data = data + "&ss_005_type1=" + document.getElementById("ss_005_type1").value;
	data = data + "&ss_006_type1=" + document.getElementById("ss_006_type1").value;
	if (document.getElementById("package_sp_box_001") != null) {
		if (Number(document.getElementById("sp_001_type1").value) + Number(document.getElementById("sp_001_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("米皂包裝原料與禮盒數量不符");
		}
		else if (Number(document.getElementById("sp_002_type1").value) + Number(document.getElementById("sp_002_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("金針皂包裝原料與禮盒數量不符");
		}
		else if (Number(document.getElementById("sp_003_type1").value) + Number(document.getElementById("sp_003_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("釋迦皂包裝原料與禮盒數量不符");
		}
	}
	if (document.getElementById("package_ss_box_001") != null) {
		if (Number(document.getElementById("ss_001_type1").value) + Number(document.getElementById("ss_002_type1").value) + Number(document.getElementById("ss_003_type1").value) != Number(document.getElementById("product_ss_box_001").value * 6)) {
			alert("台東皂絲包裝原料與禮盒數量不符");
		}
	}
	if (Number(document.getElementById("sp_004_type1").value) + Number(document.getElementById("sp_004_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("地瓜皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("sp_005_type1").value) + Number(document.getElementById("sp_005_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("金棗皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("sp_006_type1").value) + Number(document.getElementById("sp_006_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("海藻皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("ss_004_type1").value) + Number(document.getElementById("ss_005_type1").value) + Number(document.getElementById("ss_006_type1").value) != Number(document.getElementById("product_ss_box_002").value * 6)) {
		alert("宜蘭皂絲包裝原料與禮盒數量不符");
	}
	else {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
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
	var data = "module=item&event=pack";
	if (document.getElementById("product_sp_001a") != null) { data = data + "&product_sp_001a=" + document.getElementById("product_sp_001a").value; }
	if (document.getElementById("product_sp_002a") != null) { data = data + "&product_sp_002a=" + document.getElementById("product_sp_002a").value; }
	if (document.getElementById("product_sp_003a") != null) { data = data + "&product_sp_003a=" + document.getElementById("product_sp_003a").value; }
	data = data + "&product_sp_004a=" + document.getElementById("product_sp_004a").value;
	data = data + "&product_sp_005a=" + document.getElementById("product_sp_005a").value;
	data = data + "&product_sp_006a=" + document.getElementById("product_sp_006a").value;
	if (document.getElementById("product_sp_box_001") != null) { data = data + "&product_sp_box_001=" + document.getElementById("product_sp_box_001").value; }
	data = data + "&product_sp_box_002=" + document.getElementById("product_sp_box_002").value;
	if (document.getElementById("product_ss_001") != null) { data = data + "&product_ss_001=" + document.getElementById("product_ss_001").value; }
	if (document.getElementById("product_ss_002") != null) { data = data + "&product_ss_002=" + document.getElementById("product_ss_002").value; }
	if (document.getElementById("product_ss_003") != null) { data = data + "&product_ss_003=" + document.getElementById("product_ss_003").value; }
	data = data + "&product_ss_004=" + document.getElementById("product_ss_004").value;
	data = data + "&product_ss_005=" + document.getElementById("product_ss_005").value;
	data = data + "&product_ss_006=" + document.getElementById("product_ss_006").value;
	if (document.getElementById("product_ss_box_001") != null) { data = data + "&product_ss_box_001=" + document.getElementById("product_ss_box_001").value; }
	data = data + "&product_ss_box_002=" + document.getElementById("product_ss_box_002").value;
	data = data + "&product_newyear_box_1=" + document.getElementById("product_newyear_box_1").value;
	if (document.getElementById("product_newyear_box_2") != null) { data = data + "&product_newyear_box_2=" + document.getElementById("product_newyear_box_2").value; }
	if (document.getElementById("sp_001_type1") != null) { data = data + "&sp_001_type1=" + document.getElementById("sp_001_type1").value; }
	if (document.getElementById("sp_002_type1") != null) { data = data + "&sp_002_type1=" + document.getElementById("sp_002_type1").value; }
	if (document.getElementById("sp_003_type1") != null) { data = data + "&sp_003_type1=" + document.getElementById("sp_003_type1").value; }
	if (document.getElementById("sp_001_type2") != null) { data = data + "&sp_001_type2=" + document.getElementById("sp_001_type2").value; }
	if (document.getElementById("sp_002_type2") != null) { data = data + "&sp_002_type2=" + document.getElementById("sp_002_type2").value; }
	if (document.getElementById("sp_003_type2") != null) { data = data + "&sp_003_type2=" + document.getElementById("sp_003_type2").value; }
	if (document.getElementById("ss_001_type1") != null) { data = data + "&ss_001_type1=" + document.getElementById("ss_001_type1").value; }
	if (document.getElementById("ss_002_type1") != null) { data = data + "&ss_002_type1=" + document.getElementById("ss_002_type1").value; }
	if (document.getElementById("ss_003_type1") != null) { data = data + "&ss_003_type1=" + document.getElementById("ss_003_type1").value; }
	data = data + "&sp_004_type1=" + document.getElementById("sp_004_type1").value;
	data = data + "&sp_005_type1=" + document.getElementById("sp_005_type1").value;
	data = data + "&sp_006_type1=" + document.getElementById("sp_006_type1").value;
	data = data + "&sp_004_type2=" + document.getElementById("sp_004_type2").value;
	data = data + "&sp_005_type2=" + document.getElementById("sp_005_type2").value;
	data = data + "&sp_006_type2=" + document.getElementById("sp_006_type2").value;
	data = data + "&ss_004_type1=" + document.getElementById("ss_004_type1").value;
	data = data + "&ss_005_type1=" + document.getElementById("ss_005_type1").value;
	data = data + "&ss_006_type1=" + document.getElementById("ss_006_type1").value;
	if (document.getElementById("package_sp_box_001") != null) {
		if (Number(document.getElementById("sp_001_type1").value) + Number(document.getElementById("sp_001_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("米皂包裝原料與禮盒數量不符");
		}
		else if (Number(document.getElementById("sp_002_type1").value) + Number(document.getElementById("sp_002_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("金針皂包裝原料與禮盒數量不符");
		}
		else if (Number(document.getElementById("sp_003_type1").value) + Number(document.getElementById("sp_003_type2").value) != Number(document.getElementById("product_sp_box_001").value)) {
			alert("釋迦皂包裝原料與禮盒數量不符");
		}
	}
	if (document.getElementById("package_ss_box_001") != null) {
		if (Number(document.getElementById("ss_001_type1").value) + Number(document.getElementById("ss_002_type1").value) + Number(document.getElementById("ss_003_type1").value) != Number(document.getElementById("product_ss_box_001").value * 6)) {
			alert("台東皂絲包裝原料與禮盒數量不符");
		}
	}
	if (Number(document.getElementById("sp_004_type1").value) + Number(document.getElementById("sp_004_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("地瓜皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("sp_005_type1").value) + Number(document.getElementById("sp_005_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("金棗皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("sp_006_type1").value) + Number(document.getElementById("sp_006_type2").value) != Number(document.getElementById("product_sp_box_002").value)) {
		alert("海藻皂包裝原料與禮盒數量不符");
	}
	else if (Number(document.getElementById("ss_004_type1").value) + Number(document.getElementById("ss_005_type1").value) + Number(document.getElementById("ss_006_type1").value) != Number(document.getElementById("product_ss_box_002").value * 6)) {
		alert("宜蘭皂絲包裝原料與禮盒數量不符");
	}
	else {
		var request = new XMLHttpRequest();
		request.open("POST", "index.php");
		request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
		request.send(data);
		request.onreadystatechange = function() {
			if (request.readyState === 4 && request.status === 200) {
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
		var option5 = document.createElement("option");
		option1.text = '請選擇'; option1.value = ''; receiver.add(option1);
		option2.text = '北投'; option2.value = 'Beitou'; receiver.add(option2);
		option3.text = '後山埤'; option3.value = 'Houshanpi'; receiver.add(option3);
		option4.text = '台東'; option4.value = 'Taitung'; receiver.add(option4);
		option5.text = '宜蘭'; option5.value = 'Yilan'; receiver.add(option5);
	}
	else if (sender == 'Houshanpi') {
		var option1 = document.createElement("option");
		option1.text = '北投'; option1.value = 'Beitou'; receiver.add(option1);
	}
	else if (sender == 'Taitung') {
		var option1 = document.createElement("option");
		option1.text = '北投'; option1.value = 'Beitou'; receiver.add(option1);
	}
	else if (sender == 'Yilan') {
		var option1 = document.createElement("option");
		option1.text = '北投'; option1.value = 'Beitou'; receiver.add(option1);
	}
	document.getElementById("receiver").onchange();
}

function receiver() {
	var sender = document.getElementById("sender").value;
	var receiver = document.getElementById("receiver").value;
	var request = new XMLHttpRequest();
	request.open("POST", "index.php");
	var data = "module=request&event=request_search&sender=" + sender + "&receiver=" + receiver;
	request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	request.send(data);
	request.onreadystatechange = function() {
		if (request.readyState === 4 && request.status === 200) {
			var data = JSON.parse(request.responseText);
			if (data.message == 'Success') {
				document.getElementsByClassName("material_B")[1].innerHTML = data.material_B;
				document.getElementsByClassName("material_C")[1].innerHTML = data.material_C;
				document.getElementsByClassName("material_E")[1].innerHTML = data.material_E;
				document.getElementsByClassName("material_H")[1].innerHTML = data.material_H;
			}
			else {
				document.getElementsByClassName("material_B")[1].innerHTML = '';
				document.getElementsByClassName("material_C")[1].innerHTML = '';
				document.getElementsByClassName("material_E")[1].innerHTML = '';
				document.getElementsByClassName("material_H")[1].innerHTML = '';
			}
		}
	}
	if (sender == 'Trisoap') {
		if (receiver == 'Beitou' || receiver == 'Yilan') {
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
		else if (receiver == 'Houshanpi' || receiver == 'Taitung') {
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
	else if (sender == 'Yilan') {
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
		var additive_001 = document.getElementById("send_additive_001");
		if (additive_001 != null && additive_001.value != 0) data = data + "&additive_001=" + additive_001.value;
		var additive_002 = document.getElementById("send_additive_002");
		if (additive_002 != null && additive_002.value != 0) data = data + "&additive_002=" + additive_002.value;
		var additive_003 = document.getElementById("send_additive_003");
		if (additive_003 != null && additive_003.value != 0) data = data + "&additive_003=" + additive_003.value;
		var additive_004 = document.getElementById("send_additive_004");
		if (additive_004 != null && additive_004.value != 0) data = data + "&additive_004=" + additive_004.value;
		var additive_005 = document.getElementById("send_additive_005");
		if (additive_005 != null && additive_005.value != 0) data = data + "&additive_005=" + additive_005.value;
		var additive_006 = document.getElementById("send_additive_006");
		if (additive_006 != null && additive_006.value != 0) data = data + "&additive_006=" + additive_006.value;
		var additive_007 = document.getElementById("send_additive_007");
		if (additive_007 != null && additive_007.value != 0) data = data + "&additive_007=" + additive_007.value;
		var additive_008 = document.getElementById("send_additive_008");
		if (additive_008 != null && additive_008.value != 0) data = data + "&additive_008=" + additive_008.value;
		var additive_009 = document.getElementById("send_additive_009");
		if (additive_009 != null && additive_009.value != 0) data = data + "&additive_009=" + additive_009.value;
		var additive_010 = document.getElementById("send_additive_010");
		if (additive_010 != null && additive_010.value != 0) data = data + "&additive_010=" + additive_010.value;
		var additive_011 = document.getElementById("send_additive_011");
		if (additive_011 != null && additive_011.value != 0) data = data + "&additive_011=" + additive_011.value;
		var additive_012 = document.getElementById("send_additive_012");
		if (additive_012 != null && additive_012.value != 0) data = data + "&additive_012=" + additive_012.value;
		var additive_013 = document.getElementById("send_additive_013");
		if (additive_013 != null && additive_013.value != 0) data = data + "&additive_013=" + additive_013.value;
		var additive_014 = document.getElementById("send_additive_014");
		if (additive_014 != null && additive_014.value != 0) data = data + "&additive_014=" + additive_014.value;
		var additive_015 = document.getElementById("send_additive_015");
		if (additive_015 != null && additive_015.value != 0) data = data + "&additive_015=" + additive_015.value;
		var additive_016 = document.getElementById("send_additive_016");
		if (additive_016 != null && additive_016.value != 0) data = data + "&additive_016=" + additive_016.value;
		var additive_017 = document.getElementById("send_additive_017");
		if (additive_017 != null && additive_017.value != 0) data = data + "&additive_017=" + additive_017.value;
	}
	if (sender == 'Trisoap') {
		var package_001 = document.getElementById("send_package_001");
		if (package_001 != null && package_001.value != 0) data = data + "&package_001=" + package_001.value;
		var package_002a = document.getElementById("send_package_002a");
		if (package_002a != null && package_002a.value != 0) data = data + "&package_002a=" + package_002a.value;
		var package_002b = document.getElementById("send_package_002b");
		if (package_002b != null && package_002b.value != 0) data = data + "&package_002b=" + package_002b.value;
		var package_002c = document.getElementById("send_package_002c");
		if (package_002c != null && package_002c.value != 0) data = data + "&package_002c=" + package_002c.value;
		var package_002d = document.getElementById("send_package_002d");
		if (package_002d != null && package_002d.value != 0) data = data + "&package_002d=" + package_002d.value;
		var package_002e = document.getElementById("send_package_002e");
		if (package_002e != null && package_002e.value != 0) data = data + "&package_002e=" + package_002e.value;
		var package_002f = document.getElementById("send_package_002f");
		if (package_002f != null && package_002f.value != 0) data = data + "&package_002f=" + package_002f.value;
		var package_003 = document.getElementById("send_package_003");
		if (package_003 != null && package_003.value != 0) data = data + "&package_003=" + package_003.value;
		var package_004 = document.getElementById("send_package_004");
		if (package_004 != null && package_004.value != 0) data = data + "&package_004=" + package_004.value;
		var package_005 = document.getElementById("send_package_005");
		if (package_005 != null && package_005.value != 0) data = data + "&package_005=" + package_005.value;
		var package_006 = document.getElementById("send_package_006");
		if (package_006 != null && package_006.value != 0) data = data + "&package_006=" + package_006.value;
		var package_007a = document.getElementById("send_package_007a");
		if (package_007a != null && package_007a.value != 0) data = data + "&package_007a=" + package_007a.value;
		var package_008a = document.getElementById("send_package_008a");
		if (package_008a != null && package_008a.value != 0) data = data + "&package_008a=" + package_008a.value;
		var package_009a = document.getElementById("send_package_009a");
		if (package_009a != null && package_009a.value != 0) data = data + "&package_009a=" + package_009a.value;
		var package_010a = document.getElementById("send_package_010a");
		if (package_010a != null && package_010a.value != 0) data = data + "&package_010a=" + package_010a.value;
		var package_011a = document.getElementById("send_package_011a");
		if (package_011a != null && package_011a.value != 0) data = data + "&package_011a=" + package_011a.value;
		var package_012a = document.getElementById("send_package_012a");
		if (package_012a != null && package_012a.value != 0) data = data + "&package_012a=" + package_012a.value;
		var newyear_package_1 = document.getElementById("send_newyear_package_1");
		if (newyear_package_1 != null && newyear_package_1.value != 0) data = data + "&newyear_package_1=" + newyear_package_1.value;
		var newyear_package_2 = document.getElementById("send_newyear_package_2");
		if (newyear_package_2 != null && newyear_package_2.value != 0) data = data + "&newyear_package_2=" + newyear_package_2.value;
		var newyear_package_3 = document.getElementById("send_newyear_package_3");
		if (newyear_package_3 != null && newyear_package_3.value != 0) data = data + "&newyear_package_3=" + newyear_package_3.value;
		var newyear_package_4 = document.getElementById("send_newyear_package_4");
		if (newyear_package_4 != null && newyear_package_4.value != 0) data = data + "&newyear_package_4=" + newyear_package_4.value;
	}
	if (sender == 'Houshanpi') {
		var sp_001_100_houshanpi = document.getElementById("send_sp_001_100_houshanpi");
		if (sp_001_100_houshanpi != null && sp_001_100_houshanpi.value != 0) data = data + "&sp_001_100_houshanpi=" + sp_001_100_houshanpi.value;
		var sp_002_100_houshanpi = document.getElementById("send_sp_002_100_houshanpi");
		if (sp_002_100_houshanpi != null && sp_002_100_houshanpi.value != 0) data = data + "&sp_002_100_houshanpi=" + sp_002_100_houshanpi.value;
		var sp_003_100_houshanpi = document.getElementById("send_sp_003_100_houshanpi");
		if (sp_003_100_houshanpi != null && sp_003_100_houshanpi.value != 0) data = data + "&sp_003_100_houshanpi=" + sp_003_100_houshanpi.value;
	}
	if (sender == 'Taitung') {
		var sp_001_100 = document.getElementById("send_sp_001_100");
		if (sp_001_100 != null && sp_001_100.value != 0) data = data + "&sp_001_100=" + sp_001_100.value;
		var sp_002_100 = document.getElementById("send_sp_002_100");
		if (sp_002_100 != null && sp_002_100.value != 0) data = data + "&sp_002_100=" + sp_002_100.value;
		var sp_003_100 = document.getElementById("send_sp_003_100");
		if (sp_003_100 != null && sp_003_100.value != 0) data = data + "&sp_003_100=" + sp_003_100.value;
		var sp_004_100 = document.getElementById("send_sp_004_100");
		if (sp_004_100 != null && sp_004_100.value != 0) data = data + "&sp_004_100=" + sp_004_100.value;
		var sp_005_100 = document.getElementById("send_sp_005_100");
		if (sp_005_100 != null && sp_005_100.value != 0) data = data + "&sp_005_100=" + sp_005_100.value;
		var sp_006_100 = document.getElementById("send_sp_006_100");
		if (sp_006_100 != null && sp_006_100.value != 0) data = data + "&sp_006_100=" + sp_006_100.value;
		var ss_001 = document.getElementById("send_ss_001");
		if (ss_001 != null && ss_001.value != 0) data = data + "&ss_001=" + ss_001.value;
		var ss_002 = document.getElementById("send_ss_002");
		if (ss_002 != null && ss_002.value != 0) data = data + "&ss_002=" + ss_002.value;
		var ss_003 = document.getElementById("send_ss_003");
		if (ss_003 != null && ss_003.value != 0) data = data + "&ss_003=" + ss_003.value;
		var ss_004 = document.getElementById("send_ss_004");
		if (ss_004 != null && ss_004.value != 0) data = data + "&ss_004=" + ss_004.value;
		var ss_005 = document.getElementById("send_ss_005");
		if (ss_005 != null && ss_005.value != 0) data = data + "&ss_005=" + ss_005.value;
		var ss_006 = document.getElementById("send_ss_006");
		if (ss_006 != null && ss_006.value != 0) data = data + "&ss_006=" + ss_006.value;
		var ss_007 = document.getElementById("send_ss_007");
		if (ss_007 != null && ss_007.value != 0) data = data + "&ss_007=" + ss_007.value;
		var ss_008 = document.getElementById("send_ss_008");
		if (ss_008 != null && ss_008.value != 0) data = data + "&ss_008=" + ss_008.value;
		var ss_009 = document.getElementById("send_ss_009");
		if (ss_009 != null && ss_009.value != 0) data = data + "&ss_009=" + ss_009.value;
		var ss_010 = document.getElementById("send_ss_010");
		if (ss_010 != null && ss_010.value != 0) data = data + "&ss_010=" + ss_010.value;
		var ss_011 = document.getElementById("send_ss_011");
		if (ss_011 != null && ss_011.value != 0) data = data + "&ss_011=" + ss_011.value;
	}
	if (sender == 'Yilan') {
		var sp_004_100 = document.getElementById("send_sp_004_100");
		if (sp_004_100 != null && sp_004_100.value != 0) data = data + "&sp_004_100=" + sp_004_100.value;
		var sp_005_100 = document.getElementById("send_sp_005_100");
		if (sp_005_100 != null && sp_005_100.value != 0) data = data + "&sp_005_100=" + sp_005_100.value;
		var sp_006_100 = document.getElementById("send_sp_006_100");
		if (sp_006_100 != null && sp_006_100.value != 0) data = data + "&sp_006_100=" + sp_006_100.value;
		var ss_007 = document.getElementById("send_ss_007");
		if (ss_007 != null && ss_007.value != 0) data = data + "&ss_007=" + ss_007.value;
		var ss_008 = document.getElementById("send_ss_008");
		if (ss_008 != null && ss_008.value != 0) data = data + "&ss_008=" + ss_008.value;
		var ss_009 = document.getElementById("send_ss_009");
		if (ss_009 != null && ss_009.value != 0) data = data + "&ss_009=" + ss_009.value;
		var ss_010 = document.getElementById("send_ss_010");
		if (ss_010 != null && ss_010.value != 0) data = data + "&ss_010=" + ss_010.value;
		var ss_011 = document.getElementById("send_ss_011");
		if (ss_011 != null && ss_011.value != 0) data = data + "&ss_011=" + ss_011.value;
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
	if (document.getElementById("send_additive_001") != null) document.getElementById("send_additive_001").value = 0;
	if (document.getElementById("send_additive_002") != null) document.getElementById("send_additive_002").value = 0;
	if (document.getElementById("send_additive_003") != null) document.getElementById("send_additive_003").value = 0;
	if (document.getElementById("send_additive_004") != null) document.getElementById("send_additive_004").value = 0;
	if (document.getElementById("send_additive_005") != null) document.getElementById("send_additive_005").value = 0;
	if (document.getElementById("send_additive_006") != null) document.getElementById("send_additive_006").value = 0;
	if (document.getElementById("send_additive_007") != null) document.getElementById("send_additive_007").value = 0;
	if (document.getElementById("send_additive_008") != null) document.getElementById("send_additive_008").value = 0;
	if (document.getElementById("send_additive_009") != null) document.getElementById("send_additive_009").value = 0;
	if (document.getElementById("send_additive_010") != null) document.getElementById("send_additive_010").value = 0;
	if (document.getElementById("send_additive_011") != null) document.getElementById("send_additive_011").value = 0;
	if (document.getElementById("send_additive_012") != null) document.getElementById("send_additive_012").value = 0;
	if (document.getElementById("send_additive_013") != null) document.getElementById("send_additive_013").value = 0;
	if (document.getElementById("send_additive_014") != null) document.getElementById("send_additive_014").value = 0;
	if (document.getElementById("send_additive_015") != null) document.getElementById("send_additive_015").value = 0;
	if (document.getElementById("send_additive_016") != null) document.getElementById("send_additive_016").value = 0;
	if (document.getElementById("send_additive_017") != null) document.getElementById("send_additive_017").value = 0;
	if (document.getElementById("send_package_001") != null) document.getElementById("send_package_001").value = 0;
	if (document.getElementById("send_package_002a") != null) document.getElementById("send_package_002a").value = 0;
	if (document.getElementById("send_package_002b") != null) document.getElementById("send_package_002b").value = 0;
	if (document.getElementById("send_package_002c") != null) document.getElementById("send_package_002c").value = 0;
	if (document.getElementById("send_package_002d") != null) document.getElementById("send_package_002d").value = 0;
	if (document.getElementById("send_package_002e") != null) document.getElementById("send_package_002e").value = 0;
	if (document.getElementById("send_package_002f") != null) document.getElementById("send_package_002f").value = 0;
	if (document.getElementById("send_package_003") != null) document.getElementById("send_package_003").value = 0;
	if (document.getElementById("send_package_004") != null) document.getElementById("send_package_004").value = 0;
	if (document.getElementById("send_package_005") != null) document.getElementById("send_package_005").value = 0;
	if (document.getElementById("send_package_006") != null) document.getElementById("send_package_006").value = 0;
	if (document.getElementById("send_package_007a") != null) document.getElementById("send_package_007a").value = 0;
	if (document.getElementById("send_package_008a") != null) document.getElementById("send_package_008a").value = 0;
	if (document.getElementById("send_package_009a") != null) document.getElementById("send_package_009a").value = 0;
	if (document.getElementById("send_package_010a") != null) document.getElementById("send_package_010a").value = 0;
	if (document.getElementById("send_package_011a") != null) document.getElementById("send_package_011a").value = 0;
	if (document.getElementById("send_package_012a") != null) document.getElementById("send_package_012a").value = 0;
	if (document.getElementById("send_newyear_package_1") != null) document.getElementById("send_newyear_package_1").value = 0;
	if (document.getElementById("send_newyear_package_2") != null) document.getElementById("send_newyear_package_2").value = 0;
	if (document.getElementById("send_newyear_package_3") != null) document.getElementById("send_newyear_package_3").value = 0;
	if (document.getElementById("send_newyear_package_4") != null) document.getElementById("send_newyear_package_4").value = 0;
	if (document.getElementById("send_sp_001_100") != null) document.getElementById("send_sp_001_100").value = 0;
	if (document.getElementById("send_sp_002_100") != null) document.getElementById("send_sp_002_100").value = 0;
	if (document.getElementById("send_sp_003_100") != null) document.getElementById("send_sp_003_100").value = 0;
	if (document.getElementById("send_sp_004_100") != null) document.getElementById("send_sp_004_100").value = 0;
	if (document.getElementById("send_sp_005_100") != null) document.getElementById("send_sp_005_100").value = 0;
	if (document.getElementById("send_sp_006_100") != null) document.getElementById("send_sp_006_100").value = 0;
	if (document.getElementById("send_ss_001") != null) document.getElementById("send_ss_001").value = 0;
	if (document.getElementById("send_ss_002") != null) document.getElementById("send_ss_002").value = 0;
	if (document.getElementById("send_ss_003") != null) document.getElementById("send_ss_003").value = 0;
	if (document.getElementById("send_ss_004") != null) document.getElementById("send_ss_004").value = 0;
	if (document.getElementById("send_ss_005") != null) document.getElementById("send_ss_005").value = 0;
	if (document.getElementById("send_ss_006") != null) document.getElementById("send_ss_006").value = 0;
	if (document.getElementById("send_ss_007") != null) document.getElementById("send_ss_007").value = 0;
	if (document.getElementById("send_ss_008") != null) document.getElementById("send_ss_008").value = 0;
	if (document.getElementById("send_ss_009") != null) document.getElementById("send_ss_009").value = 0;
	if (document.getElementById("send_ss_010") != null) document.getElementById("send_ss_010").value = 0;
	if (document.getElementById("send_ss_011") != null) document.getElementById("send_ss_011").value = 0;
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