
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Table & Area Management</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="container">

        <!-- PAGE HEADER -->
        <div class="page-header">
            <div>
                <h1>Table & Area Management</h1>
                <p>Manage restaurant tables, capacity, and zoning.</p>
            </div>

            @if(auth()->user()->role === 'admin')
                <a href="{{ route('tables.create') }}"
                   class="btn-add">
                    + Add Table
                </a>
            @endif
        </div>

        <!-- SUCCESS MESSAGE -->
        @if(session('success'))
            <div class="table-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- TABLE CARDS -->
        <div class="table-grid">

            @forelse($tables as $table)

                <div class="table-card">

                    <div class="table-card-header">
                        <h2>{{ $table->table_number }}</h2>

                        <span class="table-status
                            {{ $table->status == 'Available'
                                ? 'available'
                                : 'occupied' }}">
                            {{ $table->status }}
                        </span>
                    </div>

                    <div class="table-card-body">

                        <p>
                            <strong>Seat Capacity:</strong>
                            {{ $table->seat_capacity }} Seats
                        </p>

                        <p>
                            <strong>Zone:</strong>
                            {{ $table->zoning }}
                        </p>

                    </div>

                    @if(auth()->user()->role === 'admin')
                        <div class="table-actions">
                            <a href="{{ route('tables.edit', $table->id) }}"
                            class="btn-edit">
                                Edit
                            </a>

                            <form action="{{ route('tables.destroy', $table->id) }}"
                                method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this table?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-delete">
                                    Delete
                                </button>

                            </form>
                        </div>
                    @endif

                </div>

            @empty

                <p>No restaurant tables available yet.</p>

            @endforelse

        </div>

    </div>

</body>
</html>
