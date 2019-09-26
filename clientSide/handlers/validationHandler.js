

class Validator {

    validate(...formFields) {
        formFields.forEach(formField => {
            switch($(formField).prop('name')) {
                case 'userName': this.emptyValidation(formField); break;
                case 'email': this.emailValidation(formField); break;
                case 'mobileNumber': this.phoneNumberValidation(formField); break;
                case 'age': this.ageValidation(formField); break;
                case 'password': this.passwordValidation(formField); break;
                case 'repeatPassword': this.repeatPasswordValidation(formField); break;
                case 'gender': this.functionalState(formField); break;
                case 'loginPassword': this.emptyValidation(formField); break;
                default: break;
            }
        });
    }

    phoneNumberValidation(element) {
        var pho = $(element).val();
        if(pho==''){
           this.errorState(element,"* You have to enter your Phone Number!");
        } else if(!$.isNumeric(pho))  { //through jquery
            this.errorState(element,"* Phone Number Should Be Numeric");
        } else if (pho.length!=10) {   
            this.errorState(element,"* Lenght of Phone Number Should Be Ten");
        } else{
            this.functionalState(element);
        }
    }

    ageValidation(element) {
        age = $(element).val();
        if (age==''){
            this.errorState(element, this.emptyErrorMessageForElement(element))
        } else if (isNaN(age)) { // through javascript
            this.errorState(element, "* Should be numbers");
        } else if (parseInt(age, 10) > 80) {
            this.errorState(element, '* Age should be bellow 80');
        } else {
            this.functionalState(element);
        }
    }

    emailValidation(element) {
        email = $(element).val();
        if (!this.isEmail(email)) {
            this.errorState($(element), '* You have to enter valid email');
        } else {
            this.functionalState(element);
        }
    }

    isEmail(email) {
        var emailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return emailRegex.test(email);
      }

    isValidPassword(str) {
      // at least one number, one lowercase and one uppercase letter
      // at least six characters that are letters, numbers or the underscore

    //   If you want to restrict the password to ONLY letters and numbers (no spaces or other characters) then only a slight change is required. Instead of using . (the wildcard) we use \w:

      var passwordRegex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w{6,}$/;
      return passwordRegex.test(str);
    }

    passwordValidation(element) {
        password = $(element).val();
        if (!this.isValidPassword(password)) {
            this.errorState(element, "* You have to enter valid password (at least one number, one lowercase and one uppercase letter)")
        } else {
            this.functionalState(element);
        }
    }

    repeatPasswordValidation(element) {
        password = $("#password").val();
        repeatPassword = $(element).val();
         if (repeatPassword == '') {
            this.errorState(element, this.emptyErrorMessageForElement(element));
         } else if (repeatPassword != password) {
            this.errorState(element, "* Your password should match")
         } else {
             this.functionalState(element);
         }
    }

    emptyValidation(element) {
        if($(element).val()==''){
            this.errorState(element, this.emptyErrorMessageForElement(element));
        }
        else
        {
            this.functionalState(element);
        }
    } 

    emptyErrorMessageForElement(element) {
        return `* You have to enter your ${element.name}`;
    }

    errorState(element, errorMessage) {
        $(element).css("border-color", "#FF0000");
        var submitButton = $(":submit");
        submitButton.attr('disabled',true);
        $(element).next().text(errorMessage);
    }

    functionalState(element) {
        $(element).css({"border-color":"#2eb82e"});
        var submitButton = $(":submit");
        submitButton.attr('disabled',false);
        $(element).next().text("");
    }

}