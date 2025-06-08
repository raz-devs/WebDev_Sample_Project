
function processLogin(e){
    console.log('Processing login...');
    e.preventDefault(); // Prevent the default form submission
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('../login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: JSON.stringify({
                username: username,
                password: password
            })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Login successful!');
            if(data.role == "administrator"){
                window.location.href = "admin/dashboard.php";
            }
            else if(data.role == "student"){
                window.location.href = "student/dashboard.php";
            }
        } else {
            alert('Invalid username or password.');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred during login.');
    });
    
}