function get_sub_service() {
	var service_id = $('#main_service').find(":selected").val();
	$('#sub_service').empty();
	var sub_services="";
	    $.ajax({
     type: "GET",
     url: '/api/product/sub/'+service_id,
     data: "check",
     success: function(response){
     	console.log(service_id);
        var sub_service=response.data;
        console.log(sub_service);
        sub_services+=' <option selected disabled value="0">Select Your Main Service</option>';
        for (var i = sub_service.length - 1; i >= 0; i--) {
        	sub_services+='<option value="'+sub_service[i].id+'">'+sub_service[i].en_title+'</option>';
        }

         $("#sub_service").append(sub_services);
     }
});
}



function get_options() {
	var service_id = $('#main_service').find(":selected").val();
	$('#options').empty();
	var sub_services="";
	    $.ajax({
     type: "GET",
     url: '/api/options/'+service_id,
     data: "check",
     success: function(response){
     	console.log(service_id);
        var sub_service=response.data;
        console.log(sub_service);
        for (var i = sub_service.length - 1; i >= 0; i--) {
        	if (sub_service[i].type=='input') {
                var required=sub_service[i].required == "yes" ? "Required" :"";
        		sub_services+='<div class="form-group col-6"><label for="email">'+sub_service[i].title+'</label><input type="text" class="form-control" id="'+sub_service[i].title+'" name="'+sub_service[i].attr+'"'+required+'></div>';
        	}
        	else
        	{
        		sub_services+='<div class="form-group col-6"><label for="pwd">'+sub_service[i].title+'</label><select class="form-control" id="'+sub_service[i].title+'" name="'+sub_service[i].attr+'"><option selected disabled>Select '+sub_service[i].title+'</option>';
        		var str=sub_service[i].value;

                if (str.indexOf('@') == -1) {
                    var res=str;
                    sub_services+= '<option value="'+res+'">'+res+'</option>';
                }
                else
                {
                var res = str.split("@");
        		for (var j = res.length - 1; j >= 0; j--) {
        			sub_services+= '<option value="'+res[j]+'">'+res[j]+'</option>';
        		}
            }
        		sub_services+= '</select></div>';
        	}
        }

         $("#options").append(sub_services);
     }
});
}








function show_the_num() {
    console.log('begin the show num function');
	 $("#family").empty();
    var sub_service = $('#sub_service').find(":selected").text();
    if (sub_service=='Family Insurance' || sub_service=='Family insurance  My family insurance' || sub_service=='Family insurance  Super insurance'  ) {
			 $('#family_div').removeAttr('hidden');
    }
    else
        {
            $('#family_div').hide();
        }
}


function get_family_members() {
console.log('begin the get_family_members function');
 $("#birthdates").empty();
    var family_members =parseInt($('#family_members').find(":selected").val());
		console.log(family_members);
var html="";
html+="<div class='form-group'>";
		for (var i = 1; i < family_members+1; i++) {
			html+="<div class='form-group'>";
			html+="<label for='sel1'>Member "+i+" Birthdate</label>"
		html+="<input name='birthdate"+i+"'  class='form-control' id='birthdate"+i+"' type='date'>";
		html+="</div>";
		}
html+="</div>";
		 $("#birthdates").append(html);
}
