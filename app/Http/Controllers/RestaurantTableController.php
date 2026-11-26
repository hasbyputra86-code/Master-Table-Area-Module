<?php

namespace App\Http\Controllers;

use App\Models\RestaurantTable;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RestaurantTableController extends Controller
{
    // Display all restaurant tables
    public function index()
    {
        $tables = RestaurantTable::orderBy('table_number', 'asc')->get();

        return view('tables.index', compact('tables'));
    }

    // Display Add Table form
    public function create()
    {
        return view('tables.create');
    }

    // Store new restaurant table
    public function store(Request $request)
    {
        $validated = $request->validate([
            'table_number' => 'required|string|max:255|unique:restaurant_tables,table_number',
            'seat_capacity' => 'required|in:2,4,8',
            'zoning' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Available,Occupied',
        ]);

        RestaurantTable::create($validated);

        return redirect()
            ->route('tables.index')
            ->with('success', 'Table added successfully!');
    }


    // Display Edit Table form
    public function edit(RestaurantTable $table)
    {
        return view('tables.edit', compact('table'));
    }

    // Update restaurant table
    public function update(Request $request, RestaurantTable $table)
    {
        $validated = $request->validate([
            'table_number' => [
                'required',
                'string',
                'max:255',
                Rule::unique('restaurant_tables', 'table_number')
                    ->ignore($table->id),
            ],
            'seat_capacity' => 'required|in:2,4,8',
            'zoning' => 'required|in:Indoor,VIP',
            'status' => 'required|in:Available,Occupied',
        ]);

        $table->update($validated);

        return redirect()
            ->route('tables.index')
            ->with('success', 'Table updated successfully!');
    }

    // Delete restaurant table
    public function destroy(RestaurantTable $table)
    {
        $table->delete();

        return redirect()
            ->route('tables.index')
            ->with('success', 'Table deleted successfully!');
    }


}
