$(function(){
   email = storageManager.getEmail();
   console.log(email);
    postData(userDetailsURL, {"email": email}, function(data, status) {
      responseArray = JSON.parse(data);
      document.getElementById("details").innerHTML = JSON.stringify(responseArray.details, null, '\t');
    });
});