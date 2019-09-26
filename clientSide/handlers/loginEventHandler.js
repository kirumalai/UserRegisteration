
$(document).ready(function() {

    validator = new Validator();

    $("#registerationLink").click(function(event){
        event.preventDefault();
        navigateToRegisteration();
    });

    $(":input").focusout(function(){
       validator.validate(this);
    });
    
    $("#loginButton").click(function(event) {
        event.preventDefault();
        $("input.form-control").each(function() { validator.emptyValidation(this); });
        var disabled =  $('#loginButton').is(":disabled");
        if (!disabled) {
            var formdata = helper.serializeObjectsFrom($("#loginForm"));
            postData(loginURL, formdata, function(data, status) {

                if(status) {
                    response = JSON.parse(data);
                    storageManager.storeEmail(response.email)
                    naivgateToDashboard();
                } else {
                    alert(data);
                }
            
            });
        }
   });



})

