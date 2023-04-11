  function social() {
    $("#twitter1").html("");
    $("#instagram").html("");
    $("#facebook").html("");
    // $("#address").html("");
    $("#email").html("");
    $("#phone").html("");
    $("#phone1").html("");
    $("#email1").html("");
    // $("#address1").html("");
      $.ajax({
     type: "GET",
     url: '/api/contacts',
     data: "check",
     success: function(response){
        var contacts=response.data;
        console.log(contacts);
        var facebook= contacts.facebook;
        var phones= contacts.phones;
        var twitter= contacts.twitter;
        var email= contacts.email;
        var phone_value="";
        var facebook_value="";
        var email_value="";



for (var i = facebook.length - 1; i >= 0; i--) {
   facebook_value+=facebook[i].data;

  }
for (var i = phones.length - 1; i >= 0; i--) {
   phone_value+=phones[i].data;

  }
  for (var i = email.length - 1; i >= 0; i--) {
   email_value+=email[i].data;

  }

  console.log(facebook_value);
    console.log(phone_value);
      console.log(email_value);

    $("#facebook").html(facebook_value);
    $("#email1").html(email_value);
    $("#email1").attr("href",'mailto:'+email_value);
    $("#phone1").html(phone_value);
    $("#email").html(email_value);
    $("#email").attr("href",'mailto:'+email_value);
    $("#email").css("color", "black");
    $("#phone").html(phone_value);

     }
});
  }