<?php

namespace App\Http\Controllers;

use App\Models\MissingPerson;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\User;
use Validator;
use Auth;

class MissingPersonController extends Controller
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
            
            $missings = MissingPerson::where([
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

            return view('missing.index', compact('missings'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('missing.create');
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
                'reportedBy' => 'required',
                'name' => 'required',
                'relationship' => 'required',
                'mobile' => 'required',
                'location' => 'required',
                'time' => 'required',
                'date' => 'required',
                'status' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'reportedBy' => $request->reportedBy,
                'name' => $request->name,
                'relationship' => $request->relationship,
                'mobile' => $request->mobile,
                'location' => $request->location,
                'time' => $request->time,
                'date' => $request->date,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $imageName,
                ];
                
            MissingPerson::create($data);

            return redirect()->route('missing.index')->with('success', 'Missing Person Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MissingPerson  $missingPerson
     * @return \Illuminate\Http\Response
     */
    public function show(MissingPerson $missing)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('missing.show', compact('missing'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MissingPerson  $missingPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(MissingPerson $missing)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('missing.edit', compact('missing'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MissingPerson  $missingPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MissingPerson $missing)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'reportedBy' => 'required',
                'name' => 'required',
                'relationship' => 'required',
                'mobile' => 'required',
                'location' => 'required',
                'time' => 'required',
                'date' => 'required',
                'status' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'reportedBy' => $request->reportedBy,
                'name' => $request->name,
                'relationship' => $request->relationship,
                'mobile' => $request->mobile,
                'location' => $request->location,
                'time' => $request->time,
                'date' => $request->date,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $imageName,
                ];
                
            $missing->update($data);

            return redirect()->route('missing.index')->with('success', 'Missing Person Successfully Created!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MissingPerson  $missingPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(MissingPerson $missing)
    {
        if(Auth::user()->announcement_admin)
        {
            $missing->delete();

            return redirect()->route('missing.index')->with('success', 'Missing Person Successfully Deleted!');
        }
    }
}
