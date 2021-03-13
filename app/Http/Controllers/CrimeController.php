<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\Crime;
use App\Models\User;
use Validator;
use Auth;


class CrimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        if(Auth::user()->announcement_admin)
        {
            Paginator::useBootstrap();
            
            $crimes = Crime::where([
                ['name', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ]) 
                ->orderBy('id', 'desc')
                ->paginate(10);
            // Paginator::useBootstrap();
            // $crimes = Crime::orderBy('id')->paginate(5);

            return view('crime.index', compact('crimes'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->announcement_admin)
        {
            return view('crime.create');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'name' => 'required',
                'occupation' => 'required',
                'sex' => 'required',
                'eyes' => 'required',
                'hair' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'crime_type' => 'required',
                'description' => 'required',
                'bail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'occupation' => $request->occupation,
                'sex' => $request->sex,
                'eyes' => $request->eyes,
                'hair' => $request->hair,
                'height' => $request->height,
                'weight' => $request->weight,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'crime_type' => $request->crime_type,
                'description' => $request->description,
                'bail' => $request->bail,
                'image' => $imageName,
                ];
                
            Crime::create($data);

            return redirect()->route('crime.index')->with('success', 'Crime Report Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Crime $crime)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('crime.show', compact('crime'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Crime $crime)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('crime.edit', compact('crime'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Crime $crime)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'name' => 'required',
                'occupation' => 'required',
                'sex' => 'required',
                'eyes' => 'required',
                'hair' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'crime_type' => 'required',
                'description' => 'required',
                'bail' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'occupation' => $request->occupation,
                'sex' => $request->sex,
                'eyes' => $request->eyes,
                'hair' => $request->hair,
                'height' => $request->height,
                'weight' => $request->weight,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'crime_type' => $request->crime_type,
                'description' => $request->description,
                'bail' => $request->bail,
                'image' => $imageName,
            ];

            $crime->update($data);

            return redirect()->route('crime.index')->with('success', 'Crime Report Successfully Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Crime $crime)
    {
        if(Auth::user()->announcement_admin)
        {
            $crime->delete();

            return redirect()->route('crime.index')->with('success', 'Crime Successfully Deleted!');
        }
    }
}
