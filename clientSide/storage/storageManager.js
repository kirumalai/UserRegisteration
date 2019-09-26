
var storageManager = {
    storeEmail : function ($email) {
        if (typeof(Storage) !== "undefined") {
            window.localStorage.clear();
            window.localStorage.setItem('email', $email);
        } else {
            console.log("No web storage Support");
        }
    },

    getEmail : function () {
        if (typeof(Storage) !== "undefined") {
            return window.localStorage.getItem('email');
        } else {
            return ""
            console.log("No web storage Support");
        }
    }

   
}
