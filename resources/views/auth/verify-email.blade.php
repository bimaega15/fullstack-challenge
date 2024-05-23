<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333;
        }

        p {
            font-size: 1em;
        }

        .verify-button {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            font-size: 1em;
            color: #fff !important;
            /* Ensure link color is white */
            background-color: #28a745;
            border-radius: 5px;
            text-decoration: none;
        }

        .verify-button:hover {
            background-color: #218838;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hello, {{ $user->name }}</h1>
        <p>Silahkan klik tombol dibawah ini, untuk verifikasi email kamu:</p>
        <p><a href="{{ route('verification.verify', ['token' => $user->email_verification_token]) }}"
                class="verify-button">Verifikasi Email</a></p>
    </div>
</body>

</html>
