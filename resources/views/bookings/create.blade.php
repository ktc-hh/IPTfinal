<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Booking</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Create Booking</h2>
                        <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    </div>

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Client</label>
                                <select name="client_id" class="form-select @error('client_id') is-invalid @enderror" required>
                                    <option value="">Select client</option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                                @error('client_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Package</label>
                                <select name="package_id" class="form-select @error('package_id') is-invalid @enderror" required>
                                    <option value="">Select package</option>
                                    @foreach($packages as $package)
                                        <option value="{{ $package->id }}" {{ old('package_id') == $package->id ? 'selected' : '' }}>{{ $package->name }} (${{ number_format($package->price_per_person, 2) }}/guest)</option>
                                    @endforeach
                                </select>
                                @error('package_id')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-7">
                                <label class="form-label">Event Name</label>
                                <input type="text" name="event_name" value="{{ old('event_name') }}" class="form-control @error('event_name') is-invalid @enderror" required>
                                @error('event_name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-5">
                                <label class="form-label">Event Date</label>
                                <input type="date" name="event_date" value="{{ old('event_date') }}" class="form-control @error('event_date') is-invalid @enderror" required>
                                @error('event_date')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Guest Count</label>
                                <input type="number" min="1" name="guest_count" value="{{ old('guest_count') }}" class="form-control @error('guest_count') is-invalid @enderror" required>
                                @error('guest_count')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-8">
                                <label class="form-label">Location</label>
                                <input type="text" name="location" value="{{ old('location') }}" class="form-control @error('location') is-invalid @enderror" required>
                                @error('location')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-5">
                                <label class="form-label">Status</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    @foreach(['Pending', 'Confirmed', 'Completed', 'Cancelled'] as $status)
                                        <option value="{{ $status }}" {{ old('status') == $status ? 'selected' : ($status === 'Pending' ? 'selected' : '') }}>{{ $status }}</option>
                                    @endforeach
                                </select>
                                @error('status')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Notes</label>
                                <textarea name="notes" rows="3" class="form-control @error('notes') is-invalid @enderror">{{ old('notes') }}</textarea>
                                @error('notes')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('bookings.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button class="btn btn-success">Save Booking</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
