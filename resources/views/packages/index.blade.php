<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Package Catalog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div>
            <h2 class="mb-1">Catering Packages</h2>
            <p class="text-secondary mb-0">Manage your service menu and pricing catalog.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ url('/') }}" class="btn btn-outline-secondary">Dashboard</a>
            <a href="{{ route('packages.create') }}" class="btn btn-dark">+ Add Package</a>
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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Style</th>
                    <th>Guests</th>
                    <th>Price / Guest</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($packages as $package)
                    <tr>
                        <td>{{ $package->id }}</td>
                        <td>
                            <div class="fw-semibold">{{ $package->name }}</div>
                            <small class="text-secondary">{{ \Illuminate\Support\Str::limit($package->description, 45) }}</small>
                        </td>
                        <td>{{ $package->style }}</td>
                        <td>{{ $package->min_guests }} - {{ $package->max_guests }}</td>
                        <td>${{ number_format($package->price_per_person, 2) }}</td>
                        <td>
                            @if($package->featured)
                                <span class="badge bg-success">Featured</span>
                            @else
                                <span class="badge bg-secondary">Standard</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('packages.edit', $package) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('packages.destroy', $package) }}" method="POST" onsubmit="return confirm('Delete this package?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4 text-secondary">No packages found. Add your first catering package.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
