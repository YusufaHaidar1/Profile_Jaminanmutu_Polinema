<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f4f4f4;
            background-image: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('assets/img/signin/image.png');
            background-size: cover;
            background-position: center;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            padding: 30px;
            border-radius: 20px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            width: 350px;

        }

        h1 {
            text-align: center;
            margin-bottom: 16px;
        }

        h2 {
            color: #9B9B9B;
            text-align: center;
            margin-bottom: 40px;
            font-size: 16px;
            font-weight: normal;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        .remember {
            text-align: end;
            color: #F5C149;
            padding: 2%
        }

        .signup {
            text-align: center;
            padding: 5%
        }

        .signup span {
            color: black;
        }

        .signup a {
            color: #F5C149;
        }

        input[type="email"],
        input[type="password"] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .button-container {
            text-align: center;
        }

        /* button {
            background-color: #CECECE;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: 50%;
        } */
        .button {
            background-color: #CECECE;
            border: none;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border-radius: 8px;
            display: inline-block;
            font-size: 16px;
            width: 50%;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button:hover {
            background-color: #F5C149;
            color: #fff;
        }

        a {
            color: #007bff;
            text-decoration: none;
        }

        .footer,
        .header {
            background-color: #1B2A4E;
            color: #fff;
            padding: 20px;
            text-align: center;
            width: 100%;
            position: fixed;
            left: 0;
        }

        .footer {
            bottom: 0;
        }

        .header {
            top: 0;
        }
    </style>
</head>

<body>

    <header class="header">

    </header>
    <div class="container">
        <h1>Masuk</h1>
        <h2>Silahkan masuk terlebih dahulu!</h2>
        <!-- Display Login Failed Message -->
        @error('login_gagal')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-inner--text"><strong>Warning!</strong> {{ $message }}</span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @enderror

        <!-- Login Form -->
        <form action="{{ url('proses_login') }}" method="POST">
        @csrf

        <!-- Email Field -->
        <div class="mb-5">
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
            <input type="email" name="email" id="email"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('email') is-invalid @enderror"
                value="{{ old('email') }}" placeholder="Masukkan email" required autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Password Field -->
        <div class="mb-5">
            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kata Sandi</label>
            <input type="password" name="password" id="password"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 @error('password') is-invalid @enderror"
                placeholder="Masukkan kata sandi" required>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <!-- Remember Me Checkbox -->
        <div class="remember mb-5">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Ingat Saya</label>
        </div>

        <!-- Login Button -->
        <div class="button-container">
            <button class="button" type="submit">Masuk</button>
        </div>
        </form>
    </div>

    <footer class="footer">
        ©Copyright P2MPP Polinema 2024
    </footer>

</body>

</html>
