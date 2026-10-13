<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookings</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Event Bookings</h2>
            <p class="text-secondary mb-0">Follow upcoming events and reservations.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Dashboard</a>
            <a href="{{ route('bookings.create') }}" class="btn btn-success">+ New Booking</a>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm border-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                <tr>
                    <th>Event</th>
                    <th>Client</th>
                    <th>Package</th>
                    <th>Date</th>
                    <th>Guests</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($bookings as $booking)
                    <tr>
                        <td>{{ $booking->event_name }}</td>
                        <td>{{ $booking->client?->name ?? 'N/A' }}</td>
                        <td>{{ $booking->package?->name ?? 'N/A' }}</td>
                        <td>{{ $booking->event_date->format('M d, Y') }}</td>
                        <td>{{ $booking->guest_count }}</td>
                        <td>
                            @php
                                $statusClass = [
                                    'Pending' => 'bg-warning text-dark',
                                    'Confirmed' => 'bg-success',
                                    'Completed' => 'bg-primary',
                                    'Cancelled' => 'bg-secondary',
                                ][$booking->status] ?? 'bg-secondary';
                            @endphp
                            <span class="badge {{ $statusClass }}">{{ $booking->status }}</span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('bookings.edit', $booking) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('bookings.destroy', $booking) }}" method="POST" onsubmit="return confirm('Delete this booking?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-secondary">No bookings created yet.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
