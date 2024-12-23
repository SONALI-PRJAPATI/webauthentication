<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .navbar{
            display:flex;
            justify-content:space-between;
            margin-top:30px;
            
            
        }
        
        .navbar a {
            color: black;
            text-decoration: none;
            padding: 10px;
            margin: 0 10px;
        }

        .navbar a:hover {
            background-color: #0056b3;
            border-radius: 4px;
        }

        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .container h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .content {
            display: flex;
            justify-content: space-around;
        }
        .section {
            width: 45%;
            padding: 10px;
            background-color: #f1f1f1;
            border-radius: 8px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
<div class="navbar">
        <div class="logo">
            <a href="/">Optimus Prime</a>
        </div>
        <div class="nav-links">
            <a href="/dashboard">Dashboard</a>
            <a href="/profile">Profile</a>
            <a href="/">Logout</a>
        </div>
    </div>

    <div class="container">
        <h1>Welcome to your Dashboard</h1>
        @foreach($user as $users)
        
            <div class="content">
                <div class="section">
                    <h2>Account Information</h2>
                    <p>Name: {{ Auth::user()->name }}</p>
                    <p>Email: {{ Auth::user()->email }}</p>
                </div>
                <div class="section">
                    <h2>Other Details</h2>
                    <p>Some content can go here...</p>
                </div>
            </div>
    @endforeach

    </div>
</body>
</html>
