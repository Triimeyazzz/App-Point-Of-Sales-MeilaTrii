<?php



namespace App\Http\Controllers;



use App\Models\Brand;

use Illuminate\Http\Request;



class BrandController extends Controller

{

    public function index()

    {

        $brands = Brand::all();

        return view('brand.blade.php', compact('brands'));

    }



    public function create()

    {

        return view('brand.blade.php');

    }



    public function store(Request $request)

    {

        $request->validate([

            'name' => 'required|unique:brands,name'

        ]);



        Brand::create($request->all());



        return redirect()->route('brands.index')->with('success', 'Brand created successfully.');

