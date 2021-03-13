<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Str;
use App\Models\Police;
use App\Models\User;
// use App\Traits\UploadTrait;
use Validator;
use Auth;

class PoliceController extends Controller
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
            
            $officers = Police::where([
                ['name', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ]) 
                ->orderBy('id', 'desc')
                ->paginate(10);     

            // $officers = Police::orderBy('id')->paginate(10);

            return view('police.index', compact('officers'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('police.create');
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
                'name' => 'required|unique:police',
                'mobile' => 'required',
                'rank' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
                // dd($imageName);
            
            $data = [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'rank' => $request->rank,
                'status' => $request->status,
                'image' => $imageName,
                ];

            Police::create($data);

            return redirect()->route('police.index')->with('success', 'Police Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Police $police)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('police.show', compact('police'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Police $police)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('police.edit', compact('police'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Police $police)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'name' => 'required',
                'mobile' => 'required',
                'rank' => 'required',
                'status' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'mobile' => $request->mobile,
                'rank' => $request->rank,
                'status' => $request->status,
                'image' => $imageName,
                ];
                
            // Police::update($data);

            $police->update($data);

            return redirect()->route('police.index')->with('success', 'Police Successfully Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Police $police)
    {
        if(Auth::user()->announcement_admin)
        {
            $police->delete();
            return redirect()->route('police.index')->with('success', 'Police Successfully Deleted!');
        }
    }
}
