
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Table - Restaurant & Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="input-container">

        <div class="title">
            <h1>Add New Table</h1>
            <p>Register a new restaurant table.</p>
        </div>

        <div class="card">

            <form action="{{ route('tables.store') }}" method="POST">
                @csrf

                <!-- TABLE NUMBER -->
                <div class="form-group">
                    <label for="table_number">Table Number</label>

                    <input
                        type="text"
                        id="table_number"
                        name="table_number"
                        value="{{ old('table_number') }}"
                        placeholder="Example: T001"
                        required
                    >
                </div>

                <!-- SEAT CAPACITY -->
                <div class="form-group">
                    <label for="seat_capacity">Seat Capacity</label>

                    <select id="seat_capacity" name="seat_capacity" required>
                        <option value="">Select Capacity</option>

                        <option value="2" @selected(old('seat_capacity') == '2')>
                            2 Seats
                        </option>

                        <option value="4" @selected(old('seat_capacity') == '4')>
                            4 Seats
                        </option>

                        <option value="8" @selected(old('seat_capacity') == '8')>
                            8 Seats
                        </option>
                    </select>
                </div>

                <!-- ZONING -->
                <div class="form-group">
                    <label for="zoning">Zoning</label>

                    <select id="zoning" name="zoning" required>
                        <option value="">Select Zone</option>

                        <option value="Indoor" @selected(old('zoning') == 'Indoor')>
                            Indoor
                        </option>

                        <option value="VIP" @selected(old('zoning') == 'VIP')>
                            VIP
                        </option>
                    </select>
                </div>

                <!-- TABLE STATUS -->
                <div class="form-group">
                    <label for="status">Table Status</label>

                    <select id="status" name="status" required>
                        <option value="Available"
                            @selected(old('status', 'Available') == 'Available')>
                            Available
                        </option>

                        <option value="Occupied"
                            @selected(old('status') == 'Occupied')>
                            Occupied
                        </option>
                    </select>
                </div>

                <!-- VALIDATION ERRORS -->
                @if($errors->any())
                    <div class="validation-errors">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- BUTTONS -->
                <div class="button-area">

                    <button type="submit" class="btn-save">
                        Save Table
                    </button>

                    <a href="{{ route('tables.index') }}"
                       class="btn-cancel">
                        Cancel
                    </a>

                </div>

            </form>

        </div>

    </div>

    <div class="footer">
        Restaurant & Cafe Information System
    </div>

</body>
</html>
