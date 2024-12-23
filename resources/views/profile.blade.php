<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f9; padding: 0; margin: 0; }
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
        .container { background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); max-width: 400px; margin: 50px auto; }
        .profile-header { text-align: center; margin-bottom: 20px; }
        .profile-header h2 { margin: 0; }
        .profile-info { margin-bottom: 20px; }
        .btn { display: inline-block; background-color: #007bff; color: #fff; padding: 10px 20px; text-decoration: none; border-radius: 4px; text-align: center; }
        .btn:hover { background-color: #0056b3; }
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
        @if(Auth::check())
        <div class="profile-header">
            <h2>Welcome, {{ $user->name }}!</h2>
            <p>Your Profile</p>
        </div>
        <div class="profile-info">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Phone:</strong> {{ $user->phone }}</p>
        </div>
        @endif
    </div>
</body>
</html>
