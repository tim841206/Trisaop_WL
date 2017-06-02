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
			if (data.message != 'Success') {
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