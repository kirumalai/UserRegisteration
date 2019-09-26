

const baseURL = "http://localhost/guviTest/serverSide/user/"
const signupURL = baseURL + "signup"
const loginURL = baseURL + "login"
const userDetailsURL = baseURL + "userDetails"

// in future if we want to handle any status code specific and common things we can handle it here
function postData(url, bodyParams, callBack) {
   $.post(url, JSON.stringify(bodyParams), callBack);
}

