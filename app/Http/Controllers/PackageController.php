<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();

        return view('packages.index', compact('packages'));
    }

    public function create()
    {
        return view('packages.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_person' => 'required|numeric|min:0',
            'min_guests' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1|gte:min_guests',
            'style' => 'required|string|max:100',
            'featured' => 'nullable|boolean',
        ]);

        Package::create($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Catering package created successfully!');
    }

    public function edit(Package $package)
    {
        return view('packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price_per_person' => 'required|numeric|min:0',
            'min_guests' => 'required|integer|min:1',
            'max_guests' => 'required|integer|min:1|gte:min_guests',
            'style' => 'required|string|max:100',
            'featured' => 'nullable|boolean',
        ]);

        $package->update($validated);

        return redirect()->route('packages.index')
            ->with('success', 'Catering package updated successfully!');
    }

    public function destroy(Package $package)
    {
        $package->delete();

        return redirect()->route('packages.index')
            ->with('success', 'Catering package deleted successfully!');
    }
}
