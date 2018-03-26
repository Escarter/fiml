<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class AdminController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDashboard()
    {

        return  view('admins.dashboard');//->compact([''=>]);
    }


    /**
     * Users Manangement Section
     *
     * @return \Illuminate\Http\Response
     */
    public function getUsersManagement()
    {
        $users = User::orderBy('first_name','DESC')->paginate(50);

        return view('admins.users-management')->with(['users'=>$users]);
    }
    /**
     * Create New User
     */
    public function createUser(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }
        $dob = date("Y-m-d H:i:s",strtotime($request->input('dob')));
        $user =  User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'sex' => $request->input('sex'),
            'status' => $request->input('status'),
            'location' => $request->input('location'),
            'dob' =>  $dob,
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $role = $request->input('role');
        $user->assign($role);

        return redirect()->back()->withInfo('New user '.$user->first_name.' was successfully created!');
    }

    /**
     * Edit user
     */
    public function editUser($id)
    {
        try{
            $user = User::findOrFail($id);

            $role = $user->roles()->first()->name;

            return response()->json([
                'data' =>$user,
                'role'=>$role,
                'status' =>'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'data' => $e,
                'status' => 'error'
            ]);
        }
    }

    /**
     * Update users information
     */
    public function updateUser(Request $request)
    {

        dd($request);
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|string|email|max:255']);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator);
        }

        $user = User::findOrFail($request->input('id'));
        $dob = date("Y-m-d H:i:s",strtotime($request->input('dob')));
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'dob' => $dob,
            'sex' => $request->input('sex'),
            'location' => $request->input('location'),
            'email' => $request->input('email'),
            'password' => $request->input('password') == NULL ? $user->password :  bcrypt($request->input('password')),
        ]);

        if($user->roles()->first()->name <> $request->input('role')){
            $role = Role::where('name',$request->input('role'))->first();
            $user->roles()->sync($role);
        }else{
            
        }

        return redirect()->back()->withInfo($user->first_name.' Info was successfully Updated!');
    }

    /**
     * Delete a user
     */
    public function deleteUser($id)
    {
        try{
            $user = User::findOrFail($id);

            $user->delete();

            return response()->json([
                'status' =>'success'
            ]);
        }catch(\Exception $e){
            return response()->json([
                'status' => 'error'
            ]);
        }
    }





    /**
     * Get a validator for an incoming registration request for a user.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'sex' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
}
