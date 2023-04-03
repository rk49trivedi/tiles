$("#btnSingin").click(function(){


	$('#btnSingin').text("Loading...");


	$('#btnSingin').prop('disabled', true);


	$.ajax({


		url: '/admin/signin',


		type:'post',


		cache:false,


		dataType: 'json',


		data:{"uname":$("#txtUname").val(),"pass":$("#txtPass").val(),"tz":$("#tz").val()},


		headers: {'X-CSRF-TOKEN' : $("meta[name='csrf-token']").attr('content')},


		success:function(res) {
            
            $('.loginerror').addClass('hide');

			if(res.login == "false"){


				$("#err").removeClass("hide");


				$('#btnSingin').text("Sign in");


				$('#btnSingin').prop('disabled', false);


			} else if (res.login == "true") {


				document.location.assign('/admin/dashboard');


			}


		},


		beforeSend:function() {


			$(".bubblingG").removeClass("hide");


		},


		complete:function() {


			$(".bubblingG").addClass("hide");


		}


	});


});