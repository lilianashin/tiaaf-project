@extends('layout')
@section('title', 'Registration')
@section('content')
    <style>
        * { box-sizing: border-box; font-family: Arial, sans-serif; margin: 0; padding: 0; }
        body {
            background: url('{{ asset('storage/image.png') }}') no-repeat center center fixed;
            background-size: cover;
            display: flex; justify-content: center; align-items: center; height: 100vh;
        }
        .container {
            width: 300px; padding: 20px; background: rgba(255, 255, 255, 0.6);
            box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 5px;
        }
        h2 { text-align: center; margin-bottom: 20px; }
        label { font-size: 14px; color: #333; display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 5px; }
        button { width: 100%; padding: 10px; background: #FF8096; color: white; border: none; border-radius: 5px; cursor: pointer; }
        button:hover { background: #FF4162; }
        .link { text-align: center; margin-top: 10px; font-size: 14px; }
        .link a { color: #28a745; text-decoration: none; }
    </style>

    <div class="container">
        <h2>Register</h2>
        <form action="{{route('registration.post')}}" method="POST">
            @csrf
            <label>Fullname</label>
            <input type="text" name="name">
            <label>Email address</label>
            <input type="email" name="email">
            <label>Password</label>
            <input type="password" name="password">
            <button type="submit">Sign Up</button>
        </form>
        <div class="link">Already have an account? <a href="{{route('login')}}">Login</a></div>
    </div>
@endsection


