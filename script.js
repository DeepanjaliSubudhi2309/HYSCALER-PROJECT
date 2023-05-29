
var thInput = document.getElementById("th");
    thInput.onblur = function() {
        var phoneNumber = thInput.value;
        if (phoneNumber.length !== 10) {
            alert("Please enter a valid 10-digit phone number.");
            thInput.focus();
        }
    };

var tmInput = document.getElementById("tm");
    tmInput.onblur = function() {
        var phoneNumber = tmInput.value;
        if (phoneNumber.length !== 10) {
            alert("Please enter a valid 10-digit phone number.");
            tmInput.focus();
        }
    };

var emailInput = document.getElementById("em");
    emailInput.onblur = function() {
    var email = emailInput.value;
    if (!isValidEmail(email)) {
        alert("Please enter a valid email address.");
        emailInput.focus();
    }
    };

function isValidEmail(email) {
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
    }



         