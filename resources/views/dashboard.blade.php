
@php
    $clientCount = \Illuminate\Support\Facades\Schema::hasTable('clients') ? \App\Models\Client::count() : 0;
    $packageCount = \Illuminate\Support\Facades\Schema::hasTable('packages') ? \App\Models\Package::count() : 0;
    $bookingCount = \Illuminate\Support\Facades\Schema::hasTable('bookings') ? \App\Models\Booking::count() : 0;
    $confirmedBookingCount = \Illuminate\Support\Facades\Schema::hasTable('bookings') ? \App\Models\Booking::where('status', 'Confirmed')->count() : 0;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Catering Service Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f9f7f3 0%, #f2efe8 100%);
            font-family: Arial, sans-serif;
        }
        .hero {
            background: linear-gradient(135deg, #1f2937 0%, #2d3748 100%);
            border-radius: 1.5rem;
            color: white;
        }
        .stat-card {
            border-radius: 1rem;
            border: none;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.08);
        }
        .module-card {
            border: none;
            border-radius: 1.25rem;
            box-shadow: 0 12px 28px rgba(15, 23, 42, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .module-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 30px rgba(15, 23, 42, 0.12);
        }
        .soft-highlight {
            background: #fff7ed;
            color: #9a4d00;
            border: 1px solid #fed7aa;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-dark bg-dark px-4 py-3 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">Catering Management</a>
            <span class="text-light opacity-75">Operations Dashboard</span>
        </div>
    </nav>

    <div class="container py-5">
        <div class="hero p-4 p-lg-5 mb-4">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3">
                <div>
                    <span class="badge soft-highlight mb-2">Event & Catering Suite</span>
                    <h1 class="display-6 fw-bold mb-2">Catering Dashboard</h1>
                    <p class="mb-0 text-light opacity-75">Track clients, packages, and bookings from one central command center.</p>
                </div>
                <a href="{{ route('clients.create') }}" class="btn btn-light btn-lg fw-semibold">+ New Client</a>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-3">
                <div class="card stat-card h-100 border-0 bg-white">
                    <div class="card-body">
                        <p class="text-uppercase text-secondary small mb-2">Clients</p>
                        <h3 class="fw-bold mb-0">{{ $clientCount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card h-100 border-0 bg-white">
                    <div class="card-body">
                        <p class="text-uppercase text-secondary small mb-2">Packages</p>
                        <h3 class="fw-bold mb-0">{{ $packageCount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card h-100 border-0 bg-white">
                    <div class="card-body">
                        <p class="text-uppercase text-secondary small mb-2">Bookings</p>
                        <h3 class="fw-bold mb-0">{{ $bookingCount }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card h-100 border-0 bg-white">
                    <div class="card-body">
                        <p class="text-uppercase text-secondary small mb-2">Confirmed</p>
                        <h3 class="fw-bold mb-0">{{ $confirmedBookingCount }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4 mt-1">
            <div class="col-lg-4">
                <div class="card module-card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-dark-subtle text-dark px-3 py-2">Clients</span>
                            <span class="text-success fw-semibold">Live</span>
                        </div>
                        <h4 class="fw-bold mb-2">Client Directory</h4>
                        <p class="text-secondary mb-4">Keep customer details, contact info, and event history organized.</p>
                        <a href="{{ route('clients.index') }}" class="btn btn-dark w-100">Manage Clients</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card module-card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-warning-subtle text-dark px-3 py-2">Packages</span>
                            <span class="text-warning fw-semibold">Catalog</span>
                        </div>
                        <h4 class="fw-bold mb-2">Catering Packages</h4>
                        <p class="text-secondary mb-4">Define pricing, guest ranges, and menu styles for every event type.</p>
                        <a href="{{ route('packages.index') }}" class="btn btn-warning w-100 text-dark">Open Packages</a>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card module-card h-100">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="badge bg-success-subtle text-dark px-3 py-2">Bookings</span>
                            <span class="text-success fw-semibold">Active</span>
                        </div>
                        <h4 class="fw-bold mb-2">Event Bookings</h4>
                        <p class="text-secondary mb-4">Manage reservations, guest counts, dates, and event locations in real time.</p>
                        <a href="{{ route('bookings.index') }}" class="btn btn-success w-100">View Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

