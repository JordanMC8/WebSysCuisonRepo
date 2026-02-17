<!DOCTYPE html>
<html>
<head>
    <title>Student Evaluation</title>
</head>
<body>

<h2>Student Evaluation System</h2>

<form method="GET" action="/evaluation">
    <label>Student Name:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Prelim Grade:</label><br>
    <input type="number" name="prelim" required><br><br>

    <label>Midterm Grade:</label><br>
    <input type="number" name="midterm" required><br><br>

    <label>Final Grade:</label><br>
    <input type="number" name="final" required><br><br>

    <button type="submit">Evaluate</button>
</form>

<hr>

{{-- DISPLAY RESULTS ONLY AFTER SUBMISSION --}}
@if($name && $prelim && $midterm && $final)

    @php
        $average = ($prelim + $midterm + $final) / 3;
    @endphp

    <h3>Evaluation Result</h3>

    <p><strong>Name:</strong> {{ $name }}</p>
    <p><strong>Average:</strong> {{ number_format($average, 2) }}</p>

    {{-- LETTER GRADE --}}
    <p><strong>Letter Grade:</strong>
        @if($average >= 90)
            A
        @elseif($average >= 80)
            B
        @elseif($average >= 70)
            C
        @elseif($average >= 60)
            D
        @else
            F
        @endif
    </p>

    {{-- REMARKS --}}
    <p><strong>Remarks:</strong>
        @if($average >= 75)
            Passed
        @else
            Failed
        @endif
    </p>

    {{-- ACADEMIC AWARD --}}
    <p><strong>Award:</strong>
        @if($average >= 98)
            With Highest Honors
        @elseif($average >= 95)
            With High Honors
        @elseif($average >= 90)
            With Honors
        @else
            No Award
        @endif
    </p>

@endif

</body>
</html>
