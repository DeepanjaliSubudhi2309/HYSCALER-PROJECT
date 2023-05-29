var form1 = document.getElementById("form1");
var form2 = document.getElementById("form2");
var form3 = document.getElementById("form3"); 

var next1 = document.getElementById("next1");
var next2 = document.getElementById("next2");
var back1 = document.getElementById("back1");
var back2 = document.getElementById("back2");

next1.onclick = function() {
    form1.style.left = "-680px";
    form2.style.left = "40px";
};

back1.onclick = function() {
    form1.style.left = "50px";
    form2.style.left = "680px";
};

next2.onclick = function() {
    form2.style.left = "-680px";
    form3.style.left = "40px";
};

back2.onclick = function() {
    form2.style.left = "40px";
    form3.style.left = "680px";
};

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



         