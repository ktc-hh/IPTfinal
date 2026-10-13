

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Client</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="card shadow-sm mx-auto" style="max-width: 650px;">
        <div class="card-body p-4">
            <h2 class="mb-4">Edit Client</h2>

            <form action="{{ route('clients.update', $client) }}"
                  method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Full Name</label>
                    <input type="text" name="name"
                           value="{{ old('name', $client->name) }}"
                           class="form-control @error('name') is-invalid @enderror"
                           required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Phone Number</label>
                    <input type="text" name="phone"
                           value="{{ old('phone', $client->phone) }}"
                           class="form-control @error('phone') is-invalid @enderror"
                           required>
                    @error('phone')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           value="{{ old('email', $client->email) }}"
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Address</label>
                    <textarea name="address" class="form-control"
                              rows="3">{{ old('address', $client->address) }}</textarea>
                    @error('address')
                        <div class="text-danger small">{{ $message }}</div>
                    @enderror
                </div>

                <button class="btn btn-dark">Update Client</button>
                <a href="{{ route('clients.index') }}"
                   class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>
