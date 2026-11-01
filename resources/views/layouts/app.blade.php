
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Student Management')</title>

    <!-- Connect CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

    <div class="dashboard">

        <aside class="sidebar">
            <div class="logo">Edu<span>Manage.</span></div>

            <p class="nav-label">MENU</p>

            <a href="{{ url('/students') }}" class="nav-link active">
                <span>👨‍🎓 Students</span>
            </a>

            <a href="{{ url('/students/create') }}" class="nav-link">
                <span>➕ Add Student</span>
            </a>
        </aside>

        <main class="main-content">

            <header class="topbar">
                <div>
                    <h1>@yield('heading', 'Dashboard')</h1>
                    <p>Welcome to Student Management System</p>
                </div>

                <div class="profile">
                    <div class="avatar">A</div>
                    Admin
                </div>
            </header>

            @yield('content')

        </main>

    </div>

</body>
</html>
