
@extends('layout')

@section('title', 'Dashboard')

@section('content')

    <!-- Redirect to login if not authenticated -->
    @if (!auth()->check())
        <script>window.location.href = "{{ route('login') }}";</script>
    @endif

    <div style="
        background: url('{{ asset('storage/image.png') }}') no-repeat center center fixed;
        background-size: cover;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    ">
        <div style="
            width: 50%;
            height: 30%;
            background: rgba(255, 255, 255, 0.4); /* Adjust transparency */
            padding: 20px;
            border-radius: 10px;
            font-weight: bold;
            text-align: center;
            display: flex;
            align-items: center;
            gap: 20px;
        ">
            <img src="{{ asset('storage/wavee.img') }}" alt="Waving Cat" style="width: 30%; height: auto;">
            <h1 style="font-weight: bold; font-size: 300%; color: #FF4162;">
                Hello {{ auth()->user()->name }}, Welcome to TIAAF!
            </h1>
        </div>
    </div>

    <!-- Show logout button only if user is logged in -->
    @if (auth()->check())
        <form action="{{ route('logout') }}" method="POST" style="position: absolute; top: 10px; right: 10px;">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    @endif

@endsection
