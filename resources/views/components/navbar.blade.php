<nav class="navbar">
    <a href="{{ url('/') }}" class="brand">Training Institute</a>
    <div>
        <a href="{{ route('students.index') }}"
           class="{{ request()->routeIs('students.*') ? 'active' : '' }}">
            Students
        </a>
    </div>
</nav>