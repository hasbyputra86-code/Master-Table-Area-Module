
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Table - Restaurant & Cafe</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    @include('partials.navbar')

    <div class="input-container">

        <div class="title">
            <h1>Edit Table</h1>
            <p>Update restaurant table information.</p>
        </div>

        <div class="card">

            <form action="{{ route('tables.update', $table->id) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <!-- TABLE NUMBER -->
                <div class="form-group">
                    <label for="table_number">Table Number</label>

                    <input
                        type="text"
                        id="table_number"
                        name="table_number"
                        value="{{ old('table_number', $table->table_number) }}"
                        required
                    >
                </div>

                <!-- SEAT CAPACITY -->
                <div class="form-group">
                    <label for="seat_capacity">Seat Capacity</label>

                    <select id="seat_capacity" name="seat_capacity" required>
                        <option value="2"
                            @selected(old('seat_capacity', $table->seat_capacity) == '2')>
                            2 Seats
                        </option>

                        <option value="4"
                            @selected(old('seat_capacity', $table->seat_capacity) == '4')>
                            4 Seats
                        </option>

                        <option value="8"
                            @selected(old('seat_capacity', $table->seat_capacity) == '8')>
                            8 Seats
                        </option>
                    </select>
                </div>

                <!-- ZONING -->
                <div class="form-group">
                    <label for="zoning">Zoning</label>

                    <select id="zoning" name="zoning" required>
                        <option value="Indoor"
                            @selected(old('zoning', $table->zoning) == 'Indoor')>
                            Indoor
                        </option>

                        <option value="VIP"
                            @selected(old('zoning', $table->zoning) == 'VIP')>
                            VIP
                        </option>
                    </select>
                </div>

                <!-- TABLE STATUS -->
                <div class="form-group">
                    <label for="status">Table Status</label>

                    <select id="status" name="status" required>
                        <option value="Available"
                            @selected(old('status', $table->status) == 'Available')>
                            Available
                        </option>

                        <option value="Occupied"
                            @selected(old('status', $table->status) == 'Occupied')>
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
                        Update Table
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
