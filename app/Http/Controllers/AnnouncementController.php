<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Announcement;
use App\Models\User;
use Validator;
use Auth;

class AnnouncementController extends Controller
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
            
            $announcements = Announcement::where([
                ['title', '!=', Null],
                [function ($query) use ($request) {
                    if(($term = $request->term)) {
                        $query->orWhere('title', 'LIKE', '%' . $term . '%')->get();
                    }
                }]
            ]) 
                ->orderBy('id', 'desc')
                ->paginate(10);
            // Paginator::useBootstrap();
            // $announcements = Announcement::orderBy('id')->paginate(10);

            return view('announcement.index', compact('announcements'))->with('i', (request()->input('page', 1) - 1) * 5);
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
            return view('announcement.create');
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
                'title' => 'required',
                'shortTitle' => 'required',
                'date' => 'required',
                'time' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'subject' => 'required',
                'description' => 'required',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'title' => $request->title,
                'shortTitle' => $request->shortTitle,
                'date' => $request->date,
                'time' => $request->time,
                'image' => $imageName,
                'subject' => $request->subject,
                'description' => $request->description,
            ];

            Announcement::create($data);

            return redirect()->route('announcement.index')->with('success', 'Announcement Successfully Created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('announcement.show', compact('announcement'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        if(Auth::user()->announcement_admin)
        {
            return view('announcement.edit', compact('announcement'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Announcement $announcement)
    {
        if(Auth::user()->announcement_admin)
        {
            $request->validate([
                'title' => 'required',
                'shortTitle' => 'required',
                'date' => 'required',
                'time' => 'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'subject' => 'required',
                'description' => 'required',
            ]);

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $data = [
                'title' => $request->title,
                'shortTitle' => $request->shortTitle, 
                'date' => $request->date,
                'time' => $request->time,
                'image' => $imageName,
                'subject' => $request->subject,
                'description' => $request->description,
            ];

            $announcement->update($data);

            return redirect()->route('announcement.index')->with('success', 'Announcement Successfully Updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        if(Auth::user()->announcement_admin)
        {
            $announcement->delete();

            return redirect()->route('announcement.index')->with('success', 'Announcement Successfully Deleted!');
        }
    }
}
