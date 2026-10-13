<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Client;
use App\Models\Package;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['client', 'package'])->latest()->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $clients = Client::orderBy('name')->get();
        $packages = Package::orderBy('price_per_person')->get();

        return view('bookings.create', compact('clients', 'packages'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'package_id' => 'required|exists:packages,id',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'guest_count' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'status' => 'required|in:Pending,Confirmed,Completed,Cancelled',
            'notes' => 'nullable|string',
        ]);

        Booking::create($validated);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully!');
    }

    public function edit(Booking $booking)
    {
        $clients = Client::orderBy('name')->get();
        $packages = Package::orderBy('price_per_person')->get();

        return view('bookings.edit', compact('booking', 'clients', 'packages'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'package_id' => 'required|exists:packages,id',
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'guest_count' => 'required|integer|min:1',
            'location' => 'required|string|max:255',
            'status' => 'required|in:Pending,Confirmed,Completed,Cancelled',
            'notes' => 'nullable|string',
        ]);

        $booking->update($validated);

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully!');
    }
}
