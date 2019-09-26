
$(document).ready(function() {
   validator = new Validator();

   $(":input").focusout(function(){
    validator.validate(this);
   });

   $("#loginLink").click(function(event){
    event.preventDefault();
    navigateToLogin();
   })

   $("#signupButton").click(function(event){
        event.preventDefault();
        $("input.form-control").each(function() { validator.emptyValidation(this); });
        var disabled =  $('#signupButton').is(":disabled");
        if (!disabled) {
            var formdata = helper.serializeObjectsFrom($("#registerationForm"));
            postData(signupURL, formdata, function(data, status) {
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
});