<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #0056b3;
        }
        .form-group .error {
            color: red;
            font-size: 0.875em;
        }
        .form-group p {
            text-align: center;
        }
        .form-group p a {
            color: #007bff;
            text-decoration: none;
        }
        .form-group p a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <form action="{{ route('register.submit') }}" class="form" method="post">
            @csrf
            <h2>Register</h2>

            <div class="form-group">
                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}">
                @error("name")
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                @error("email")
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
               <input type="tel" name="phone" id="phone" placeholder="Phone" value="{{ old('phone') }}">
                @error("phone")
               <div class="error">{{ $message }}</div>
                @enderror
             </div>


            <div class="form-group">
                <input type="password" name="password" id="password" placeholder="Password">
                @error("password")
                <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <button type="submit">Register</button>
            </div>

            <div class="form-group">
                <p>Already have an account? <a href="/">Login</a></p>
            </div>
        </form>
    </div>
</body>
</html>
