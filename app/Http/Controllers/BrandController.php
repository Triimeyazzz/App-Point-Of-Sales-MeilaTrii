<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::paginate(10);
        return view('content.brand', compact('brands'));
    }

    public function create()
    {
        return view('content.brand');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:brands,name'
        ]);

        Brand::create($request->all());

        return redirect()->route('content.brand')->with('success', 'Brand created successfully.');
    }

    public function show(Brand $brand)
    {
        return view('content.brand', compact('brand'));
    }

    public function edit(Brand $brand)
    {
        return view('content.brand.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required|unique:brands,name,'.$brand->id
        ]);

        $brand->update($request->all());

        return redirect()->route('brands.index')->with('success', 'Brand updated successfully.');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        return redirect()->route('brands.index')->with('success', 'Brand deleted successfully.');
    }
}
