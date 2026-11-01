
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>

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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #453b80;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
        }

        input:focus, textarea:focus {
            border-color: #6554c0;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .error {
            color: #dc3545;
            font-size: 13px;
            margin-top: 6px;
        }

        .btn {
            padding: 11px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            text-decoration: none;
            font-size: 14px;
            display: inline-block;
        }

        .btn-primary {
            background: #6554c0;
            color: white;
        }

        .btn-secondary {
            background: #eee;
            color: #444;
        }

        .form-actions {
            margin-top: 25px;
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

        <h1>Edit Student</h1>
        <p class="subtitle">Update student information below.</p>

        <div class="card">

            <form action="{{ url('/students/'.$student->id) }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name"
                           value="{{ old('name', $student->name) }}">

                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="email"
                           value="{{ old('email', $student->email) }}">

                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="text" name="phone"
                           value="{{ old('phone', $student->phone) }}">

                    @error('phone')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date" name="date_of_birth"
                           value="{{ old('date_of_birth', $student->date_of_birth) }}">

                    @error('date_of_birth')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <textarea name="address">{{ old('address', $student->address) }}</textarea>

                    @error('address')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        Update Student
                    </button>

                    <a href="{{ url('/students') }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>
                </div>

            </form>

        </div>

    </div>

</body>
</html>
