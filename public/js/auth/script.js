document.getElementById('tab-login').onclick = function() {
    document.getElementById('register-id').style.display = 'none';
    document.getElementById('login-id').style.display = 'inline-block';
};

document.getElementById('tab-registration').onclick = function() {
    document.getElementById('login-id').style.display = 'none';
    document.getElementById('register-id').style.display = 'inline-block';
};

