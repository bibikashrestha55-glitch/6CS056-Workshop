
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course Details</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f6f5fc;
            color: #333;
        }

        .navbar {
            background: #6554c0;
            color: white;
            padding: 20px 7%;
        }

        .navbar h2 { margin: 0; }

        .container {
            width: 65%;
            margin: 40px auto;
        }

        h1 { color: #453b80; }

        .subtitle {
            color: #888;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
        }

        .detail-row {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .detail-row strong {
            display: inline-block;
            width: 160px;
            color: #453b80;
        }

        .status {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
        }

        .active { background: #dff5e5; color: #237a3b; }
        .inactive { background: #ffe1e1; color: #c0392b; }

        .btn {
            padding: 11px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }

        .btn-primary { background: #6554c0; color: white; }
        .btn-primary:hover { background: #50419f; }
        .btn-secondary { background: #eee; color: #444; }

        .actions { margin-top: 25px; }

        @media(max-width: 700px) {
            .container { width: 92%; }
            .card { padding: 20px; }
            .detail-row strong {
                display: block;
                width: auto;
                margin-bottom: 7px;
            }
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>Student Manage</h2>
</div>

<div class="container">

    <h1>Course Details</h1>
    <p class="subtitle">View complete course information.</p>

    <div class="card">

        <div class="detail-row">
            <strong>Course ID</strong>
            {{ $course->id }}
        </div>

        <div class="detail-row">
            <strong>Course Name</strong>
            {{ $course->name }}
        </div>

        <div class="detail-row">
            <strong>Description</strong>
            {{ $course->description }}
        </div>

        <div class="detail-row">
            <strong>Duration</strong>
            {{ $course->duration }} weeks
        </div>

        <div class="detail-row">
            <strong>Course Fee</strong>
            {{ $course->fee }}
        </div>

        <div class="detail-row">
            <strong>Difficulty</strong>
            {{ $course->difficulty }}
        </div>

        <div class="detail-row">
            <strong>Status</strong>

            @if($course->is_active)
                <span class="status active">Active</span>
            @else
                <span class="status inactive">Inactive</span>
            @endif
        </div>

        <div class="actions">
            <a href="{{ url('/courses/' . $course->id . '/edit') }}"
               class="btn btn-primary">Edit Course</a>

            <a href="{{ url('/courses') }}"
               class="btn btn-secondary">Back to Courses</a>
        </div>

    </div>
</div>

</body>
</html>
