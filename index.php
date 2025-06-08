<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Rasul A. Pundogar">
    <title>Webdev | Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="styles/main.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary"> 

    <main class="form-signin w-100 m-auto">
        <form action="" method="POST" onsubmit="processLogin(event)"> 
            <img class="mb-4" src="assets/images/Picture1.png" alt="" width="300" height="100">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>
            <div class="form-floating"> 
                <input type="text" class="form-control" id="username" placeholder="name@example.com"> 
                <label for="username">Email address</label> 
            </div>
            <div class="form-floating"> 
                <input type="password" class="form-control" id="password" placeholder="Password"> 
                <label for="password">Password</label>
            </div>
            <div class="form-check text-start my-3"> 
                <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> 
                <label class="form-check-label" for="checkDefault">
                    Remember me
                </label> 
            </div> 
            <input class="btn btn-primary w-100 py-2" type="submit" value="Sign in">
            <p class="mt-5 mb-3 text-body-secondary">&copy; Blue Phenix Baguio, 2025</p>
        </form>
    </main>


<!-- This is the location for all javascript files -->
  <!-- <script src="scripts/functions.js"></script> -->
   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>

<script>

function processLogin(e){
    e.preventDefault();
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    fetch('process_login.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
                    username: username,
                    password: password
                })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status == 'success') {
            alert('Login successful!');

            // Redirect based on user role
            if( data.role == 'Administrator') {
                window.location.href = 'admin/dashboard.php';
            } else if(data.role == 'User') {
                window.location.href = 'user/dashboard.php';
            } else {
                alert('Unknown role: ' + data.role);
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
</script>