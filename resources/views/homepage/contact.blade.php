@extends('layouts.main')
@section('title', 'Liên hệ')

@section('content')
<div class="contact-container">
    <h2>Gửi lời nhắn đến Golden Tree</h2>

    @if(session('success'))
        <div class="alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('contact.send') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="email">Email của bạn</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}">
            @error('email') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <div class="form-group">
            <label for="message">Nội dung</label>
            <textarea id="message" name="message" rows="5">{{ old('message') }}</textarea>
            @error('message') <span style="color:red">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="btn-submit">Gửi liên hệ</button>
    </form>
</div>
@endsection

<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background: #f4f4f9;
        margin: 0;
        overflow-x: hidden;
    }

    main {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
    }

    .contact-container {
        width: 100%;
        max-width: 600px;
        background: #fffdf8;
        padding: 40px;
        border-radius: 16px;
        border: 1px solid #e0e0e0;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        animation: fadeInUp 0.8s ease forwards;
        opacity: 0;
    }

    @keyframes fadeInUp {
        0% {
            opacity: 0;
            transform: translateY(40px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    h2 {
        text-align: center;
        margin-bottom: 25px;
        color: #333;
    }

    .form-group {
        margin-bottom: 20px;
    }

    label {
        display: block;
        margin-bottom: 6px;
        font-weight: 600;
        color: #222;
    }

    input, textarea {
        width: 100%;
        padding: 12px;
        border-radius: 8px;
        border: 1px solid #ccc;
        font-size: 14px;
        background-color:rgb(250, 250, 250);
        transition: border-color 0.5s, box-shadow 0.8s;
    }

    input::placeholder, textarea::placeholder {
        color: #999;
        font-style: italic;
    }

    input:focus, textarea:focus {
        border-color:rgb(167, 124, 60);
        background-color:#fff;
        outline: none;
        box-shadow: 0 0 5px rgba(184, 138, 68, 0.45);
    }

    .btn-submit {
        width: 100%;
        padding: 12px;
        border: none;
        background-color: #B88A44;
        color: white;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .btn-submit:hover {
        background-color: #a37332;
    }

    .alert-success {
        background-color: #d4edda;
        border-left: 5px solid #28a745;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 6px;
        color: #155724;
    }
</style>