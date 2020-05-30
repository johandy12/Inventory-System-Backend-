<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Job;

class JobController extends Controller
{
    public function __construct(Job $job)
    {
        $this->middleware('jwt', ['except' => ['']]);
        $this->job = $job;
    }

    public function getJob()
    {
        try {
            $data = Job::get();
            $array = Array();
            $array['data'] = $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'file is empty'], 404);
    }
    
    public function getUserPrivilege()
    {
        try {
            $payload = auth()->user()->job_id;
            $data = Job::where('id', '1')->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'not found'], 404);
    }

    public function addJob(Request $request)
    {
        $request->validate([
            'job'=> 'required',
            'privilege' => 'required',
        ]);

        $new =
        [
            'job'=> $request->job,
            'privilege'=> $request->privilege,
        ];

        try
        {
            $data = $this->job->create($new);
            $array = Array();
            $array['data'] = $data;
            return response()->json($array);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 404);
        }
    }

    public function updateJob($id, Request $request)
    {
        $new = [
            "job" => $request->job,
            "privilege" => $request->privilege,
        ];

        if (! $request->has("job") {
            $new = $request->except(["job"])
        });
        if (! $request->has("privilege") {
            $new = $request->except(["privilege"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            Job::where('id',$id)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function updateJob2($job, Request $request)
    {
        $new = [
            "job" => $request->job,
            "privilege" => $request->privilege,
        ];

        if (! $request->has("job") {
            $new = $request->except(["job"])
        });
        if (! $request->has("privilege") {
            $new = $request->except(["privilege"])
        });
        if (! $request->has("blank") {
            $new = $request->except(["blank"])
        });

        try{
            Job::where('job',$job)->update($new);
            return response()->json(["updated"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }

    public function deleteJob($id)
    {
        try{
            $data = Job::where("id",$id)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
    
    public function deleteJob2($job)
    {
        try{
            $data = Job::where("job",$job)->delete(); 
            return response()->json(["deleted"], 200);
        } catch(QueryException $a) {
            return response()->json(["Error" => "not found"], 404);
        }
    }
}
