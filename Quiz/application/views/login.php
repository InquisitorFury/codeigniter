<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            height: 100vh;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background: url('https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExOGphc2Y5cW84MTB6a2J3ZDdvdnIxZGpubXk0am1hMzFiZmlma2Z6NiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9Zw/MAwmBljNatG3bgs7Jl/giphy.gif') no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }

        .water-mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(120deg, #3498db, #8e44ad, #3498db);
            background-size: 300% 300%;
            animation: changeColor 10s infinite alternate;
            opacity: 0.75;
            z-index: 0; /* Ensure it's below the login container */
        }

        @keyframes changeColor {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 1; /* Ensure it's above the water mask */
        }

        .login-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .login-form input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .login-form button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .login-form button:hover {
            background-color: #0056b3;
        }

        .error-message {
            color: red;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="water-mask"></div>
    <div class="login-container">
        <h2>Login</h2>
        <form class="login-form" action="<?= site_url('login/login') ?>" method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <button type="submit">Login</button>
        </form>
        <?php if(isset($error)) { ?>
            <p class="error-message"><?= $error ?></p>
        <?php } ?>
    </div>
</body>
</html>
