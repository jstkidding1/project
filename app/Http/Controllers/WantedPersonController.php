<?php

namespace App\Http\Controllers;

use App\Models\WantedPerson;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\User;
use Validator;
use Auth;

class WantedPersonController extends Controller
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
            
            $wanteds = WantedPerson::where([
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

            return view('wanted.index', compact('wanteds'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('wanted.create');
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
                'region' => 'required',
                'name' => 'required',
                'criminal_case' => 'required',
                'offense' => 'required',
                'issuing_court' => 'required',
                'sex' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'region' => $request->region,
                'name' => $request->name,
                'alias' => $request->alias,
                'reward' => $request->reward,
                'criminal_case' => $request->criminal_case,
                'offense' => $request->offense,
                'issuing_court' => $request->issuing_court,
                'sex' => $request->sex,
                'height' => $request->height,
                'weight' => $request->weight,
                'hair' => $request->hair,
                'eye' => $request->eye,
                'complexion' => $request->complexion,
                'other' => $request->other,
                'age' => $request->age,
                'date_birth' => $request->date_birth,
                'place_birth' => $request->place_birth,
                'citizen' => $request->citizen,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'address' => $request->address,
                'civil_status' => $request->civil_status,
                'elementary' => $request->elementary,
                'secondary' => $request->secondary,
                'college' => $request->college,
                'status' => $request->status,
                'image' => $imageName,
                ];
                
            WantedPerson::create($data);

            return redirect()->route('wanted.index')->with('success', 'Wanted Person Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\WantedPerson  $wantedPerson
     * @return \Illuminate\Http\Response
     */
    public function show(WantedPerson $wanted)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('wanted.show', compact('wanted'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\WantedPerson  $wantedPerson
     * @return \Illuminate\Http\Response
     */
    public function edit(WantedPerson $wanted)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('wanted.edit', compact('wanted'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\WantedPerson  $wantedPerson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WantedPerson $wanted)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'region' => 'required',
                'name' => 'required',
                'alias' => 'required',
                'reward' => 'required',
                'criminal_case' => 'required',
                'offense' => 'required',
                'issuing_court' => 'required',
                'sex' => 'required',
                'height' => 'required',
                'weight' => 'required',
                'hair' => 'required',
                'eye' => 'required',
                'complexion' => 'required',
                'other' => 'required',
                'age' => 'required',
                'date_birth' => 'required',
                'place_birth' => 'required',
                'citizen' => 'required',
                'father_name' => 'required',
                'mother_name' => 'required',
                'address' => 'required',
                'civil_status' => 'required',
                'elementary' => 'required',
                'secondary' => 'required',
                'college' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'region' => $request->region,
                'name' => $request->name,
                'alias' => $request->alias,
                'reward' => $request->reward,
                'criminal_case' => $request->criminal_case,
                'offense' => $request->offense,
                'issuing_court' => $request->issuing_court,
                'sex' => $request->sex,
                'height' => $request->height,
                'weight' => $request->weight,
                'hair' => $request->hair,
                'eye' => $request->eye,
                'complexion' => $request->complexion,
                'other' => $request->other,
                'age' => $request->age,
                'date_birth' => $request->date_birth,
                'place_birth' => $request->place_birth,
                'citizen' => $request->citizen,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'address' => $request->address,
                'civil_status' => $request->civil_status,
                'elementary' => $request->elementary,
                'secondary' => $request->secondary,
                'college' => $request->college,
                'status' => $request->status,
                'image' => $imageName,
                ];

            $wanted->update($data);

            return redirect()->route('wanted.index')->with('success', 'Wanted Person Successfully Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\WantedPerson  $wantedPerson
     * @return \Illuminate\Http\Response
     */
    public function destroy(WantedPerson $wanted)
    {
        if(Auth::user()->announcement_admin)
        {
            $wanted->delete();

            return redirect()->route('wanted.index')->with('success', 'Wanted Person Successfully Deleted!');
        }
    }
}
