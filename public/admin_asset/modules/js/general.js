//constants







var CLIENT_URL = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: ''); 



var ADMIN_URL = window.location.protocol + "//" + window.location.hostname + (window.location.port ? ':' + window.location.port: '') +"/admin/";



var AJAX_URL = ADMIN_URL + 'modules/ajax/';











/*--- Find and replace in address bar url without page reloading---*/



function rmUrl(f,r){



	if(history.pushState){



		var newurl =  window.location.protocol + "//" + window.location.host + window.location.pathname;



		//alert(newurl.replace('/success',''));



		window.history.pushState({path:newurl},'',newurl.replace(f,r));



	}



}



/*--- END Find and replace in address bar url without page reloading---*/







function pressEnt(foc, tar){



	



	$(foc).keyup(function(event) {



		if (event.keyCode === 13) {



			$(tar).click();



		}



	});



}


function erf(pid,elem,msg){

    var valid;

    if(msg){

        $(pid+" small").remove();

        $(pid).append('<small class="text-danger error ml-1">'+msg+'</small>');

        $(pid+" "+elem).addClass("has-error");

        return false;

    } else {

        $(pid+" small").remove();

        $(pid+" "+elem).removeClass("has-error");

        return true;

    }

}