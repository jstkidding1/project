<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Report;
use App\Models\User;
use Validator;
use Auth;

class ReportController extends Controller
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
        if(Auth::user()->report_admin)
        {
            Paginator::useBootstrap();
            
            $reports = Report::where([
                ['name', '!=', Null],
                ['email', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                        $query->orWhere('email', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ]) 
                ->orderBy('id', 'desc')
                ->paginate(10);
            // Paginator::useBootstrap();
            // $reports = Report::orderBy('id')->paginate(10);

            return view('report.index', compact('reports'))->with('i', (request()->input('page', 1) - 1) * 5);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->report_admin)
        {
            return view('report.create');
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
        if(Auth::user()->report_admin)
        {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'type' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'type' => $request->type,
                'description' => $request->description,
                'image' => $imageName,
            ];

            // return $data;

            Report::create($data);

            return redirect()->route('report.index')->with('success', 'Report Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        if(Auth::user()->report_admin)
        {
            return view('report.show', compact('report'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        if(Auth::user()->report_admin)
        {
            return view('report.edit', compact('report'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        if(Auth::user()->report_admin)
        {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'mobile' => 'required',
                'date' => 'required',
                'time' => 'required',
                'location' => 'required',
                'type' => 'required',
                'description' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
    
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
    
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'type' => $request->type,
                'description' => $request->description,
                'image' => $imageName,
                
            ];

            // return $data;
    
            $report->update($data);
    
            return redirect()->route('report.index')->with('success', 'Report Successfully Updated!'); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        if(Auth::user()->report_admin)
        {
            $report->delete();

            return redirect()->route('report.index')->with('success', 'Report Successfully Deleted!');
        }
    }
}
