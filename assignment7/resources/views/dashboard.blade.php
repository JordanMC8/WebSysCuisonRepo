<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            margin: 0;
        }

        .navbar {
            background: #343a40;
            color: white;
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .container {
            padding: 20px;
            max-width: 900px;
            margin: auto;
        }

        .card {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
        }

        .update-btn {
            background: #28a745;
            color: white;
            width: 100%;
        }

        .success {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>

<div class="navbar">
    <div>Student Portal</div>

    <form method="POST" action="/logout">
        @csrf
        <button class="logout-btn">Logout</button>
    </form>
</div>

<div class="container">

    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    {{-- PROFILE DISPLAY --}}
    <div class="card">
        <h2>Welcome, {{ auth()->user()->name }}</h2>

        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        <p><strong>Student ID:</strong> {{ auth()->user()->student_id }}</p>
        <p><strong>Birthdate:</strong> {{ auth()->user()->birthdate }}</p>
        <p><strong>Gender:</strong> {{ auth()->user()->gender }}</p>
        <p><strong>Address:</strong> {{ auth()->user()->address }}</p>
        <p><strong>Phone:</strong> {{ auth()->user()->phone }}</p>
        <p><strong>Course:</strong> {{ auth()->user()->course }}</p>
        <p><strong>Year Level:</strong> {{ auth()->user()->year_level }}</p>
    </div>

    {{-- UPDATE PROFILE FORM --}}
    <div class="card">
        <h3>Update Profile</h3>

        <form method="POST" action="/profile/update">
            @csrf

            <input name="name" value="{{ auth()->user()->name }}" placeholder="Name">
            <input name="email" value="{{ auth()->user()->email }}" placeholder="Email">

            <input name="student_id" value="{{ auth()->user()->student_id }}" placeholder="Student ID">
            <input type="date" name="birthdate" value="{{ auth()->user()->birthdate }}">

            <input name="gender" value="{{ auth()->user()->gender }}" placeholder="Gender">
            <input name="address" value="{{ auth()->user()->address }}" placeholder="Address">
            <input name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone">
            <input name="course" value="{{ auth()->user()->course }}" placeholder="Course">
            <input name="year_level" value="{{ auth()->user()->year_level }}" placeholder="Year Level">

            <button type="submit" class="update-btn">Update Profile</button>
        </form>
    </div>

</div>

</body>
</html>