<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\Incident;
use App\Models\User;
use Validator;
use Auth;

class IncidentController extends Controller
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
            
            $incidents = Incident::where([
                ['name', '!=', Null],
                ['status', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                        $query->orWhere('status', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
                ]) 
                ->orderBy('id', 'desc')
                ->paginate(10);
                // Paginator::useBootstrap();
                // $incidents = Incident::orderBy('id')->paginate(5);

            return view('incident.index', compact('incidents'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('incident.create');
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
                'date' => 'required',
                'location' => 'required',
                'victim' => 'required',
                'description' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'date' => $request->date,
                'mname' => $request->mname,
                'location' => $request->location,
                'victim' => $request->victim,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $imageName,
                ];

            Incident::create($data);

            // Incident::create($request->all());

            return redirect()->route('incident.index')->with('success', 'Incident Report Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Incident $incident)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('incident.show', compact('incident'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Incident $incident)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('incident.edit', compact('incident'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Incident $incident)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'name' => 'required',
                'date' => 'required',
                'location' => 'required',
                'victim' => 'required',
                'description' => 'required',
                // 'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'date' => $request->date,
                'location' => $request->location,
                'victim' => $request->victim,
                'description' => $request->description,
                'status' => $request->status,
                'image' => $imageName,
                ];

            $incident->update($data);

            return redirect()->route('incident.index')->with('success', 'Incident Report Successfully Updated!');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Incident $incident)
    {
        if(Auth::user()->announcement_admin)
        {
            $incident->delete();

            return redirect()->route('incident.index')->with('success', 'Incident Successfully Deleted!');
        }
    }

    // public function changeStatus(Request $request)
    // {
    //     $incident = Incident::find($request->id);
    //     $incident->status = $request->status;
    //     $incident->save();

    //     return response()->json(['Success' => 'Status Changed Successfully!']);
    // }
}
