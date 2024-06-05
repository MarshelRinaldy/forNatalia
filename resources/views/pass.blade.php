@extends('dashboard')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
</head>
<body>
    <h1>Change Password</h1>
    @if(Session::has('success'))
        <div style="background-color: #4CAF50; color: white; padding: 10px; text-align: center;">
            {{ Session::get('success') }}
        </div>
    @endif
    @if(Session::has('error'))
        <div style="background-color: #f44336; color: white; padding: 10px; text-align: center;">
            {{ Session::get('error') }}
        </div>
    @endif
    <form method="POST" action="{{ route('change-password') }}">
        @csrf

        <label for="current_password">Current Password:</label><br>
        <input type="password" id="current_password" name="current_password" required><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit">Save</button>
    </form>
</body>
</html>

@endsection
