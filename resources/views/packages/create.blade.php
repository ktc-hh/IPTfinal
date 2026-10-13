<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create Package</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-lg-5">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h2 class="mb-0">Add Catering Package</h2>
                        <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary btn-sm">Back</a>
                    </div>

                    <form action="{{ route('packages.store') }}" method="POST">
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Package Name</label>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                @error('name')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Style</label>
                                <input type="text" name="style" value="{{ old('style', 'Classic') }}" class="form-control @error('style') is-invalid @enderror" required>
                                @error('style')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <label class="form-label">Description</label>
                                <textarea name="description" rows="4" class="form-control @error('description') is-invalid @enderror" required>{{ old('description') }}</textarea>
                                @error('description')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Price / Guest</label>
                                <input type="number" step="0.01" min="0" name="price_per_person" value="{{ old('price_per_person') }}" class="form-control @error('price_per_person') is-invalid @enderror" required>
                                @error('price_per_person')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Min Guests</label>
                                <input type="number" min="1" name="min_guests" value="{{ old('min_guests', 20) }}" class="form-control @error('min_guests') is-invalid @enderror" required>
                                @error('min_guests')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-md-4">
                                <label class="form-label">Max Guests</label>
                                <input type="number" min="1" name="max_guests" value="{{ old('max_guests', 200) }}" class="form-control @error('max_guests') is-invalid @enderror" required>
                                @error('max_guests')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                            </div>

                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="featured" value="1" {{ old('featured') ? 'checked' : '' }}>
                                    <label class="form-check-label">Mark as featured package</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="{{ route('packages.index') }}" class="btn btn-outline-secondary">Cancel</a>
                            <button class="btn btn-dark">Save Package</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
