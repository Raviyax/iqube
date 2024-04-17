<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification Success</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            padding: 50px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
        }
        p {
            color: #333;
            font-size: 18px;
        }
        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
        }
        .loader {
            border: 8px solid #f3f3f3;
            border-top: 8px solid #3498db;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
            margin: 20px auto;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="loader"></div>
        <h1>Paper <?php echo $data['model_paper']->name;?> Completed Successfully!</h1>
        <p>You will be redirected to the results shortly. If not you can close this window and check results manually</p>
    </div>

    <script>
        setTimeout(() => {
            // Send message to parent window
            window.opener.postMessage({ type: 'redirect' }, '*');
            // Close this window
            window.close();
        }, 3000); // 3 seconds
    </script>
</body>
</html>
