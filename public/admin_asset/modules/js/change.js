$("#cpw").click(function(){
	if($("#txtNewpass").val() == $("#txtNewpass2").val()){
		$("#cperr").text("");
		$('#cpw').text("Loading...");
		$('#cpw').prop('disabled', true);
		if($("#txtCpass").val() == '' || $("#txtNewpass").val() == '' || $("#txtNewpass2").val() == ''){
			
			$("#cperr").addClass("text-red");
			$("#cperr").text("Please enter all required filed");
			$('#cpw').text("Save changes");
			$('#cpw').prop('disabled', false);
			return false;
		}
		$.ajax({
			url: '/admin/change',
			type:'post',
			cache:false,
			dataType: 'json',
			data:{"cpw":$("#txtCpass").val(), "cpwn":$("#txtNewpass").val(), "cpwn2":$("#txtNewpass2").val()},
			headers: {
		  	  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success:function(res) {
				$("#cperr").removeClass("hide");
				if(res.msg == "update") {
					$("#cperr").removeClass("text-red");
					$("#cperr").addClass("text-green");
					$("#cperr").text("Password updated successfully.");
					$("#txtCpass").val("");
					$("#txtNewpass").val("");
					$("#txtNewpass2").val("");
				} else if(res.msg == "cerror") {
					$("#cperr").removeClass("text-green");
					$("#cperr").addClass("text-red");
					$("#cperr").text("Incorrect current password.");
				} else if(res.msg == "already") { 
					$("#cperr").removeClass("text-red");
					$("#cperr").addClass("text-green");
					$("#cperr").text("Password updated successfully.");
				} 
				else {
					$("#cperr").addClass("text-red");
					$("#cperr").text("Error! Please try after some time");
				}
				$('#cpw').text("Save changes");
				$('#cpw').prop('disabled', false);
			},
			beforeSend:function() {
				$(".bubblingG").removeClass("hide");
			},
			complete:function() {
				$(".bubblingG").addClass("hide");
			}
		});
	} else {
		$("#cperr").removeClass("text-green");
		$("#cperr").addClass("text-red");
		$("#cperr").text("New passwords do not match!");
	}
});
$("#myModal").on("hidden.bs.modal",function(){
	$("#cperr").text("");
	frmCpw.reset();
});