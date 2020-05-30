<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Exceptions\JWTException;
use JWTAuth;
use DB;
use App\User;
use App\Models\Job;

class UserController extends Controller
{
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('jwt', ['except' => ['register']]);
    }
    
    public function getUsers()
    {
        try {
            $data = User::get();
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        } return response()->json(['error' => 'file is empty'], 404);
    }

    public function getUsersJob()
    {
        try {
            $data = DB::table('users')
                    ->join('job', 'job.id', '=', 'users.job_id')
                    ->select('job.id', 'job.job', 'job.privilege', 'users.name', 'users.email', 'users.gender',
                             'users.address', 'users.mobilePhone', 'users.dateOfBirth')
                    ->get();
            return $data;
        } catch (QueryException $e) {
            return response()->json(['error' => "failed"], 404);
        }

        if(count($data) > 0){
            return response()->json($data);
        }return response()->json(['error' => 'file is empty'], 404);
    }

    public function register(Request $request)
    {
        $request->validate([
            'job_id'=> 'required|integer',
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $new =
        [
            'job_id'=> $request->job_id,
            'name'=> $request->name,
            'email'=> $request->email,
            'password' => Hash::make($request->password),
            'gender'=> $request->gender,
            'address'=> $request->address,
            'mobilePhone'=> $request->mobilePhone,
            'dateOfBirth'=> $request->dateOfBirth,
            'profilePicture'=> $request->profilePicture,
        ];

        try
        {
            $data = $this->user->create($new);
            $array = Array();
            $array['data'] = $data;
            return response()->json($array);
        } catch(QueryException $a) {
            return response()->json(["Error" => $a], 400);
        }
    }

    public function updateProfile(Request $request)
    {
      $new = [
        'job_id'=> $request->job_id,
        'name'=> $request->name,
        'email'=> $request->email,
        'password' => Hash::make($request->password),
        'gender'=> $request->gender,
        'address'=> $request->address,
        'mobilePhone'=> $request->mobilePhone,
        'dateOfBirth'=> $request->dateOfBirth,
        'profilePicture'=> $request->profilePicture,
      ];

      if (! $request->has("job_id") {
        $new = $request->except(["job_id"])
      });
      if (! $request->has("name") {
        $new = $request->except(["name"])
      });
      if (! $request->has("email") {
        $new = $request->except(["email"])
      });
      if (! $request->has("password") {
        $new = $request->except(["password"])
      });
      if (! $request->has("gender") {
        $new = $request->except(["gender"])
      });
      if (! $request->has("address") {
        $new = $request->except(["address"])
      });
      if (! $request->has("mobilePhone") {
        $new = $request->except(["mobilePhone"])
      });
      if (! $request->has("dateOfBirth") {
        $new = $request->except(["dateOfBirth"])
      });
      if (! $request->has("profilePicture") {
        $new = $request->except(["profilePicture"])
      });
      if (! $request->has("blank") {
          $new = $request->except(["blank"])
      });
        
      $payload = auth()->payload();
      $pt = $payload->get('sub');

      try{
        User::where('id',$pt)->update($new);
        return response()->json(["updated"], 200);
      } catch(QueryException $a) {
        return response()->json(["Error" => "not found"], 404);
      }
    }

    public function updatePassword(Request $request)
    {
      $new = [
        "password" => Hash::make($request->password),
      ];

      $payload = auth()->payload();
      $pt = $payload->get('sub');

      try{
        User::where('id',$pt)->update($new);
      }
      catch(QueryException $a){
        return response()->json(["Error" => "failed"], 404);
      }

      if($data = 1){
        return response()->json(["updated"],200);
      } else{
        return response()->json(["Error" => "no data is found"], 404);
      }
    }

    public function updateUserJob($name, Request $request)
    {
      $new = [
        "job_id" => $request->job_id,
      ];

      try{
        User::where('name', $name)->update($new);
      }
      catch(QueryException $a){
        return response()->json(["Error" => "failed"], 404);
      }

      if($data = 1){
        return response()->json(["updated"],200);
      } else{
        return response()->json(["Error" => "no data is found"], 404);
      }
    }

    public function delete($id)
    {
      $data = User::where("id",$id)->delete(); 

      if($data == 1){
        return response()->json(["deleted"],200);
      } else {
        return response()->json(["Error" => "no data is found"], 404);
      }
    }
    
    public function deleteUser($name)
    {
      $data = User::where("name", $name)->delete(); 

      if($data == 1){
        return response()->json(["deleted"],200);
      } else {
        return response()->json(["Error" => "no data is found"], 404);
      }
    }
}