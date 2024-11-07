const form = document.getElementById('login-form');
const usernameInput = document.getElementById('username');
const passwordInput = document.getElementById('password');
const termsInput = document.getElementById('terms');

form.addEventListener('submit', (e) => {
    const username = usernameInput.value;
    const password = passwordInput.value;
    const termsChecked = termsInput.checked;

    
    if (username === '' || password === '' || !termsChecked) {
        e.preventDefault();
        alert('Please fill in all fields and accept the terms.');
    }
});
