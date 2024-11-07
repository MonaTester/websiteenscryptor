document.getElementById('registration-form').addEventListener('submit', function(e) {
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirm_password').value;
    const passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/;

    
    if (!passwordPattern.test(password)) {
        e.preventDefault();
        alert('Password must be at least 8 characters long, contain 1 uppercase letter, and 1 special character.');
        return;
    }

    
    if (password !== confirmPassword) {
        e.preventDefault();
        alert('Passwords do not match.');
    }
});
