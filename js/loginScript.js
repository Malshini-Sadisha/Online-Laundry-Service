function validateForm() {
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("pass").value;
    var confirmPassword = document.getElementById("re_pass").value;
    var contact = document.getElementById("contact").value;
    var agreeTerms = document.getElementById("agree-term").checked;

    var errors = [];

    if (name.trim() === "") {
        errors.push("Name is required");
    }

    if (email.trim() === "") {
        errors.push("Email is required");
    } else if (!validateEmail(email)) {
        errors.push("Invalid email format");
    }

    if (password.trim() === "") {
        errors.push("Password is required");
    }

    if (password !== confirmPassword) {
        errors.push("Passwords do not match");
    }

    if (contact.trim() === "") {
        errors.push("Contact number is required");
    }

    if (!agreeTerms) {
        errors.push("You must agree to the terms of service");
    }

    if (errors.length > 0) {
        alert(errors.join("\n"));
        return false;
    }

    return true;
}

function validateEmail(email) {
    // Email validation logic
    return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}
