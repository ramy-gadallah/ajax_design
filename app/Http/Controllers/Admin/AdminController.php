<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $users=User::get();
        return view('admin.admins.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
                'password.confirmed' => 'confirm password does not match',
            ]);

            if($validator->fails()) {   
                return response()->json([
                    'status' => 'false',
                    'message' => $validator->errors(),
                ]);
            }
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ]);
            return response()->json([
                'status' => 'true',
                'message' => 'تمت الاضافة بنجاح',
                'redirect' => route('admins.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) 
    {
        try {
            $validator = Validator::make($request->all(),[
                'name' => 'required',
                'email' => 'required|unique:users,email',
                'password' => 'required|confirmed',
            ],
            [
                'name.required' => 'Name is required',
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exists',
                'password.required' => 'Password is required',
                'password.confirmed' => 'confirm password does not match',
            ]);

            if($validator->fails()) {   
                return response()->json([
                    'status' => 'false',
                    'message' => $validator->errors(),
                ]);
            }

            $user = User::findOrFail($request->id);
            $user->name = $request->name;
            $user->email = $request->email;

        
            // Update the password only if provided   
            $user->save();
            
            return response()->json([
                'status' => 'true',
                'message' => 'تم التعديل بنجاح',
                'redirect' => route('admins.index'),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'false',
                'message'=>'فشل التعديل',
                'error' => $e->getMessage(),
            ]);
        }
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request) {

      $user=User::find($request->id);
      $user->delete();
      return response()->json([
        'id'=>$request->id,
        'status'=>'200',
        'message'=>'تم الحذف بنجاح نعم',
        'fail'=>'فشل الحذف',
    ]);}
}
