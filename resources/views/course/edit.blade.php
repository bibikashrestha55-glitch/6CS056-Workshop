
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Course</title>

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

        .form-group { margin-bottom: 20px; }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #453b80;
        }

        input, textarea, select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
            outline: none;
            background: white;
        }

        input:focus, textarea:focus, select:focus {
            border-color: #6554c0;
        }

        textarea {
            resize: vertical;
            min-height: 90px;
        }

        .checkbox-group label {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .checkbox-group input { width: auto; }

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

        .btn-primary:hover { background: #50419f; }

        .btn-secondary {
            background: #eee;
            color: #444;
        }

        .form-actions { margin-top: 25px; }

        @media(max-width: 700px) {
            .container { width: 92%; }
            .card { padding: 20px; }
        }
    </style>
</head>

<body>

<div class="navbar">
    <h2>Student Manage</h2>
</div>

<div class="container">

    <h1>Edit Course</h1>
    <p class="subtitle">Update the course information below.</p>

    <div class="card">

        <form action="{{ url('/courses/' . $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Course Name</label>
                <input type="text" name="name"
                       value="{{ old('name', $course->name) }}">

                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Description</label>
                <textarea name="description">{{ old('description', $course->description) }}</textarea>

                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Duration (Weeks)</label>
                <input type="number" name="duration" min="1"
                       value="{{ old('duration', $course->duration) }}">

                @error('duration')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Course Fee</label>
                <input type="number" name="fee" step="0.01" min="0"
                       value="{{ old('fee', $course->fee) }}">

                @error('fee')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label>Difficulty Level</label>
                <select name="difficulty">
                    <option value="Easy" {{ old('difficulty', $course->difficulty) == 'Easy' ? 'selected' : '' }}>Easy</option>
                    <option value="Medium" {{ old('difficulty', $course->difficulty) == 'Medium' ? 'selected' : '' }}>Medium</option>
                    <option value="Hard" {{ old('difficulty', $course->difficulty) == 'Hard' ? 'selected' : '' }}>Hard</option>
                </select>

                @error('difficulty')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group checkbox-group">
                <label>
                    <input type="checkbox" name="is_active" value="1"
                           {{ old('is_active', $course->is_active) ? 'checked' : '' }}>
                    Active Course
                </label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Update Course
                </button>

                <a href="{{ url('/courses') }}" class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </div>
</div>

</body>
</html>
