function passwordLoginClick() {
    var field2 = document.getElementById("user-input-field2");
    var field3 = document.getElementById("user-input-field3");
    var field4 = document.getElementById("user-input-field4");
    var field5 = document.getElementById("user-input-field5");

    field2.classList.toggle('user-input-field-change');
    field3.className = ("user-input-field");
    field5.className = ("user-input-field");
    field4.className = ("user-input-field");
}
function firstLoginClick() {
    var field3 = document.getElementById("user-input-field3");
    var field2 = document.getElementById("user-input-field2");
    var field4 = document.getElementById("user-input-field4");
    var field5 = document.getElementById("user-input-field5");

    field3.classList.toggle('user-input-field-change');
    field2.className = ("user-input-field");
    field5.className = ("user-input-field");
    field4.className = ("user-input-field");
}

function lastLoginClick() {
    var field4 = document.getElementById("user-input-field4");
    var field2 = document.getElementById("user-input-field2");
    var field3 = document.getElementById("user-input-field3");
    var field5 = document.getElementById("user-input-field5");

    field4.classList.toggle('user-input-field-change');
    field2.className = ("user-input-field");
    field3.className = ("user-input-field");
    field5.className = ("user-input-field");
}


function firsttwoLoginClick() {
    var field5 = document.getElementById("user-input-field5");
    var field2 = document.getElementById("user-input-field2");
    var field3 = document.getElementById("user-input-field3");
    var field4 = document.getElementById("user-input-field4");


    field5.classList.toggle('user-input-field-change');
    field2.className = ("user-input-field");
    field3.className = ("user-input-field");
    field4.className = ("user-input-field");
}