<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Import Storage for image handling

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modules = Module::all();
        return view('employee.onboarding-home-page', compact('modules')); // Return the view
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create-modules'); // Return the view
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust size limit as needed
        ]);

        $fileName = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();

        // Use Storage to store the image:
        $path = $request->file('image')->storeAs('modules', $fileName, 'public');

        // dump the path:
        //dd($path);

        $module = Module::create([
            'title' => $request->input('title'),
            'image_path' => $path, // Store the stored path
        ]);

        return redirect()->route('employee.onboarding-home-page')->with('success', 'Module created successfully!');
    }

    public function __invoke(Request $request)
    {
        // Logic for the route action in this case (e.g., display a welcome message)
        return view('welcome');
    }
}



