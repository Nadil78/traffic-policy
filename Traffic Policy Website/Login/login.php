<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Role Selection</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: url('https://via.placeholder.com/1920x1080') no-repeat center center/cover;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #fff;
        }
        .login-container {
            background: rgba(0, 0, 0, 0.8);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
            max-width: 400px;
            width: 100%;
        }
        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffbb33;
        }
        .login-container .form-field {
            margin-bottom: 20px;
        }
        .login-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #ffbb33;
        }
        .login-container input, .login-container select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 1rem;
            background-color: #333;
            color: #fff;
            outline: none;
            transition: border-color 0.3s ease;
        }
        .login-container input:focus, .login-container select:focus {
            border-color: #ffbb33;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            font-size: 1.1rem;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
            background: linear-gradient(135deg, #ffbb33, #ff8800);
            color: white;
            border: none;
            transition: background 0.3s ease, transform 0.2s;
        }
        .login-container button:hover {
            background: linear-gradient(135deg, #ff8800, #ffbb33);
            transform: scale(1.05);
        }
        .login-container .message {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            display: none;
        }
        .login-container .message.success {
            color: #28a745;
        }
        .login-container .message.error {
            color: #dc3545;
        }
    </style>
</head>
<body>

<div class="login-container">
    <h2>Login</h2>
    <div class="form-field">
        <label for="username">Username</label>
        <input type="text" id="username" placeholder="Enter your username" required>
    </div>
    <div class="form-field">
        <label for="password">Password</label>
        <input type="password" id="password" placeholder="Enter your password" required>
    </div>
    <div class="form-field">
        <label for="role">Select Role</label>
        <select id="role">
            <option value="traffic_officer">Traffic Officer</option>
            <option value="supervisor">Supervisor</option>
        </select>
    </div>
    <button id="loginButton">Login</button>
    <p class="message" id="message"></p>
</div>

<script>
    document.getElementById('loginButton').addEventListener('click', function() {
        const username = document.getElementById('username').value;
        const password = document.getElementById('password').value;
        const role = document.getElementById('role').value;
        const message = document.getElementById('message');

        // Dummy validation for demonstration purposes
        if((username === 'supervisor' && password === 'password' && role === 'supervisor') || 
           (username === 'traffic_officer' && password === 'password' && role === 'traffic_officer')) {
            message.textContent = 'Login successful! Redirecting...';
            message.className = 'message success';
            message.style.display = 'block';

            // Redirect based on role
            setTimeout(() => {
                if (role === 'supervisor') {
                    window.location.href = 'supervisor_dashboard.php';
                } else if (role === 'traffic_officer') {
                    window.location.href = 'traffic_officer_dashboard.php';
                }
            }, 1000); // Simulate a delay for user feedback
        } else {
            message.textContent = 'Invalid username, password, or role';
            message.className = 'message error';
            message.style.display = 'block';
        }
    });
</script>

</body>
</html>
