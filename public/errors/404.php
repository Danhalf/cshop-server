<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .container {
            max-width: 600px;
            padding: 40px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 3rem;
            color: #333;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.2rem;
            line-height: 1.6;
            color: #666;
            margin-bottom: 10px;
        }

        a {
            color: #f0f0f0;
            display: inline-flex;
            background-color: #007bff;
            padding: 1rem 3rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        a:hover {
            background-color: #2b3e4f;
        }
    </style>
    <title>404 - Page Not Found</title>
</head>
<body>
<div class="container">
    <h1>404</h1>
    <h2>Page Not Found</h2>
    <p>We're sorry, the page you are looking for could not be found.</p>
    <p>Please check the URL <br> or go back to the</p>
    <a href="<?= PUBLIC_PATH; ?>">homepage</a>
</div>
</body>
</html>
