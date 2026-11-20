
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courses</title>

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
            width: 90%;
            margin: 40px auto;
        }

        h1 { color: #453b80; }

        .subtitle {
            color: #888;
            margin-bottom: 25px;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        .btn {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 13px;
            display: inline-block;
        }

        .btn-primary {
            background: #6554c0;
            color: white;
        }

        .btn-primary:hover { background: #50419f; }

        .btn-view { background: #e8e4ff; color: #50419f; }
        .btn-edit { background: #fff0d9; color: #9b6500; }
        .btn-delete { background: #ffe1e1; color: #c0392b; }

        .success {
            background: #dff5e5;
            color: #237a3b;
            padding: 12px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
            margin-top: 20px;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #eee;
        }

        th {
            background: #f0edfc;
            color: #453b80;
        }

        tr:hover { background: #faf9ff; }

        .status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
        }

        .active { background: #dff5e5; color: #237a3b; }
        .inactive { background: #ffe1e1; color: #c0392b; }

        .actions {
            display: flex;
            gap: 6px;
            align-items: center;
        }

        @media(max-width: 700px) {
            .container { width: 94%; }
            .card { padding: 15px; }
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>Student Manage</h2>
</div>

<div class="container">

    <h1>Courses</h1>
    <p class="subtitle">Manage all available courses.</p>

    <p>
        <a href="{{ url('/courses/create') }}" class="btn btn-primary">
            + Add New Course
        </a>
        <a href="{{ url('/students') }}" class="btn btn-view">
            View Students
        </a>
    </p>

    @if(session('success'))
        <div class="success">{{ session('success') }}</div>
    @endif

    <div class="card">

        <table>
            <tr>
                <th>ID</th>
                <th>Course Name</th>
                <th>Duration</th>
                <th>Fee</th>
                <th>Difficulty</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>

            @forelse($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->duration }} weeks</td>
                    <td>{{ $course->fee }}</td>
                    <td>{{ $course->difficulty }}</td>
                    <td>
                        @if($course->is_active)
                            <span class="status active">Active</span>
                        @else
                            <span class="status inactive">Inactive</span>
                        @endif
                    </td>
                    <td>
                        <div class="actions">
                            <a href="{{ url('/courses/' . $course->id) }}"
                               class="btn btn-view">View</a>

                            <a href="{{ url('/courses/' . $course->id . '/edit') }}"
                               class="btn btn-edit">Edit</a>

                            <form action="{{ url('/courses/' . $course->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this course?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-delete">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" style="text-align:center; color:#888;">
                        No courses available yet.
                    </td>
                </tr>
            @endforelse

        </table>

    </div>
</div>

</body>
</html>
