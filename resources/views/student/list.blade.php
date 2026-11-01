
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>

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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar h2 {
            margin: 0;
        }

        .container {
            width: 86%;
            margin: 40px auto;
        }

        .heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .heading h1 {
            color: #453b80;
            margin: 0;
        }

        .heading p {
            color: #888;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            cursor: pointer;
            font-size: 14px;
            margin: 2px;
        }

        .btn-primary {
            background: #6554c0;
            color: white;
        }

        .btn-primary:hover {
            background: #50419f;
        }

        .btn-edit {
            background: #eeeaff;
            color: #6554c0;
        }

        .btn-view {
            background: #e4f4ec;
            color: #248653;
        }

        .btn-delete {
            background: #ffe8e8;
            color: #d33;
        }

        .card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 3px 12px rgba(0,0,0,0.05);
        }

        .message {
            background: #e0f5e9;
            color: #21834d;
            padding: 13px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f0edff;
            color: #50419f;
            padding: 15px;
            text-align: left;
        }

        td {
            padding: 15px;
            border-bottom: 1px solid #eee;
        }

        tr:hover {
            background: #faf9ff;
        }

        .empty {
            text-align: center;
            padding: 30px;
            color: #888;
        }

        @media(max-width: 750px) {
            .container {
                width: 95%;
            }

            .card {
                overflow-x: auto;
            }

            .heading {
                gap: 15px;
                flex-wrap: wrap;
            }
        }
    </style>
</head>

<body>

    <div class="navbar">
        <h2>EduManage</h2>
        <span>Student Management System</span>
    </div>

    <div class="container">

        <div class="heading">
            <div>
                <h1>Students</h1>
                <p>Manage all your student records here.</p>
            </div>

            <a href="{{ url('/students/create') }}" class="btn btn-primary">
                + Add Student
            </a>
        </div>

        @if(session('success'))
            <div class="message">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">

            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($students as $student)
                        <tr>
                            <td>{{ $student->id }}</td>

                            <td><strong>{{ $student->name }}</strong></td>

                            <td>{{ $student->email }}</td>

                            <td>{{ $student->phone }}</td>

                            <td>
                                <a href="{{ url('/students/'.$student->id) }}"
                                   class="btn btn-view">View</a>

                                <a href="{{ url('/students/'.$student->id.'/edit') }}"
                                   class="btn btn-edit">Edit</a>

                                <form action="{{ url('/students/'.$student->id) }}"
                                      method="POST"
                                      style="display:inline;"
                                      onsubmit="return confirm('Are you sure you want to delete this student?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-delete">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="empty">
                                No students found. Add your first student!
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

        </div>

    </div>

</body>
</html>
