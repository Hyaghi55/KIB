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
        	if (sub_service[i].type=='dropdown') {

                sub_services+='<div class="form-group col-6"><label for="pwd">'+sub_service[i].title+'</label><select class="form-control" id="'+sub_service[i].title+'" name="'+sub_service[i].attr+'"><option selected disabled>Select '+sub_service[i].title+'</option>';
                var str=sub_service[i].value;

                if (str.indexOf('@') == -1) {
                    var res=str;
                    sub_services+= '<option value="'+res+'">'+res+'</option>';
                }
                else
                {
                var res = str.split("@");    
                
                
                for (var i = res.length - 1; i >= 0; i--) {
                    sub_services+= '<option value="'+res[i]+'">'+res[i]+'</option>';
                }
            }
                sub_services+= '</select></div>';
                JSON.stringify(sub_services);
        	}
        	else
        	{
                var required=sub_service[i].required == "yes" ? "Required" :"";
                sub_services+='<div class="form-group col-6"><label for="email">'+sub_service[i].title+'</label><input type="text" class="form-control" id="'+sub_service[i].title+'" name="'+sub_service[i].attr+'></div>';

        	}
        }

         $("#options").append(sub_services);
     }
});
}