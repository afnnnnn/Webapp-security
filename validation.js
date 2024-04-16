// validation.js
var validationRules = {
    name: /^[A-Za-z\s]+$/,
    studentId: /^\d{5,10}$/,
    email: /^.+@gmail.com$/,
    phoneNo: /^\d{10,15}$/
};

function validateForm() {
    var name = document.getElementById('name').value;
    if (!validationRules.name.test(name)) {
        alert('Invalid name');
        return false;
    }

    var studentId = document.getElementById('studentId').value;
    if (!validationRules.studentId.test(studentId)) {
        alert('Invalid matric number');
        return false;
    }

    var email = document.getElementById('email').value;
    if (!validationRules.email.test(email)) {
        alert('Invalid email');
        return false;
    }

    var mobilePhone = document.getElementById('mobilePhone').value;
    if (!validationRules.phoneNo.test(mobilePhone)) {
        alert('Invalid mobile phone number');
        return false;
    }

    var homePhone = document.getElementById('homePhone').value;
    if (!validationRules.phoneNo.test(homePhone)) {
        alert('Invalid home phone number');
        return false;
    }

    // If all validations pass
    return true;
}