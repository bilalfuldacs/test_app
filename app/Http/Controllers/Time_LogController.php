<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Time_Log;
use Auth;
use App\Models\User;
use App\Models\project;
use App\Repositories\ProjectRepository;
use App\Repositories\Time_LogRepository;
use App\Http\Requests\Time_LogRequest;

class Time_LogController extends Controller
{
    protected $projectRepository;
    protected $Time_Logrepository;
    public function __construct(ProjectRepository $projectRepository,Time_LogRepository $Time_Logrepository)
    {
        $this->projectRepository = $projectRepository;
           $this->Time_Logrepository = $Time_Logrepository;
    }

    public function index()
    {
        $projects = $this->projectRepository->getProjectsByUserId();
     // return view('Create_time_logs',compact('projects'));
      return view('Create_time_logs', ['data' => $projects]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function view()
    {
        $result = Time_Log::where('user_id', auth()->user()->id)->with('project')->get();

    return view('Home', ['data' => $result]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

          $result = $this->Time_Logrepository->Save_Time_Log($request->all());

  
   }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       
    $data=   Time_Log::where('id',$id)->get();
         return view('Edit_timeLogs', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $result = $this->Time_Logrepository->update_Time_Log($request->all(),$id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data=   Time_Log::where('id',$id)->delete();
             $result = Time_Log::where('user_id', auth()->user()->id)->with('project')->get();

    return view('Home', ['data' => $result]);
        
    }
}
