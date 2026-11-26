<div class="navbar">
    <h2>Restaurant & Cafe System</h2>

    <div class="nav-links">
        <a href="{{ route('tables.index') }}">Table & Area</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">
                Logout
            </button>
        </form>
    </div>
</div>