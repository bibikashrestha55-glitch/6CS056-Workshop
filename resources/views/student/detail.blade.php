
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>

    <style>
        * {
            box-sizing: border-box;
        }

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

        .navbar h2 {
            margin: 0;
        }

        .container {
            width: 65%;
            margin: 40px auto;
        }

        h1 {
            color: #453b80;
        }

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

        .student-avatar {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: #eeeaff;
            color: #6554c0;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 30px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .student-name {
            color: #453b80;
            margin-bottom: 5px;
        }

        .student-id {
            color: #999;
            margin-bottom: 25px;
        }

        .detail-row {
            padding: 16px 0;
            border-bottom: 1px solid #eee;
        }

        .detail-label {
            color: #888;
            font-size: 13px;
            margin-bottom: 6px;
        }

        .detail-value {
            font-weight: bold;
            color: #333;
        }

        .actions {
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            padding: 11px 20px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            margin-right: 8px;
        }

        .btn-primary {
            background: #6554c0;
            color: white;
        }

        .btn-secondary {
            background: #eee;
            color: #444;
        }

        @media(max-width: 700px) {
            .container {
                width: 92%;
            }

            .card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>EduManage</h2>
    </div>

    <div class="container">

        <h1>Student Details</h1>
        <p class="subtitle">View complete student information.</p>

        <div class="card">

            <div class="student-avatar">
                {{ strtoupper(substr($student->name, 0, 1)) }}
            </div>

            <h2 class="student-name">{{ $student->name }}</h2>

            <p class="student-id">
                Student ID: #{{ $student->id }}
            </p>

            <div class="detail-row">
                <div class="detail-label">Full Name</div>
                <div class="detail-value">{{ $student->name }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Email Address</div>
                <div class="detail-value">{{ $student->email }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Phone Number</div>
                <div class="detail-value">{{ $student->phone }}</div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Date of Birth</div>
                <div class="detail-value">
                    {{ $student->date_of_birth ?: 'Not provided' }}
                </div>
            </div>

            <div class="detail-row">
                <div class="detail-label">Address</div>
                <div class="detail-value">
                    {{ $student->address ?: 'Not provided' }}
                </div>
            </div>

            <div class="actions">

                <a href="{{ url('/students/'.$student->id.'/edit') }}"
                   class="btn btn-primary">
                    Edit Student
                </a>

                <a href="{{ url('/students') }}"
                   class="btn btn-secondary">
                    Back to Students
                </a>

            </div>

        </div>

    </div>

</body>
</html>
