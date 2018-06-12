$(document).ready(function(){
	$("#add_err").css('display', 'none', 'important');
	$("#login").click(function(){
		userid=$("#userid").val();
		password=$("#password").val();
		remember_me=$("#remember_me").val();
		$.ajax({
			type: "POST",
			url: "ajax_login.php",
			data: "userid=" + userid + "&password=" + password + "&remember_me=" + remember_me,
			success: function(html){ 
				if(html=='true'){
					window.location="index.php";
				}else if(html=='0'){
					$("#add_err").css('display', 'inline', 'important');
					$("#add_err").html("<img src='img/alert.png' /> This user has pending applications.");
				}else if(html=='false'){
					$("#add_err").css('display', 'inline', 'important');
					$("#add_err").html("<img src='img/alert.png' /> Wrong username or password");
				}
			},
			beforeSend:function(){
				$("#add_err").css('display', 'inline', 'important');
				$("#add_err").html("<img src='img/ajax-loader.gif' /> Loading...");
			}
		});
		return false;
	});
});