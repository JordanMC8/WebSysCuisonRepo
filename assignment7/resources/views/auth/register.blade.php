<!DOCTYPE html>
<html>
<head>
    <title>Register</title>

    <style>
        body {
            font-family: Arial;
            background: #f4f6f9;
            display: flex;
            justify-content: center;
            padding: 40px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            width: 100%;
            padding: 10px;
            margin-top: 15px;
            background: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background: #1e7e34;
        }
    </style>
</head>
<body>

<div class="card">
    <h2>Register</h2>

    <form method="POST" action="/register">
        @csrf

        <input name="name" placeholder="Name">
        <input name="email" placeholder="Email">

        <input name="student_id" placeholder="Student ID">
        <input type="date" name="birthdate">

        <select name="gender">
            <option>Male</option>
            <option>Female</option>
        </select>

        <input name="address" placeholder="Address">
        <input name="phone" placeholder="Phone">
        <input name="course" placeholder="Course">
        <input name="year_level" placeholder="Year Level">

        <input type="password" name="password" placeholder="Password">
        <input type="password" name="password_confirmation" placeholder="Confirm Password">

        <button type="submit">Register</button>
    </form>
</div>

</body>
</html>