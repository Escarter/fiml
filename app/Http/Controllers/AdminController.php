<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    /**
     * Get a validator for an incoming registration request.
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //return  view('admin.dashboard')->compact([''=>]);
    }


    /**
     * get all users
     */

     public function getAllUsers()
     {
         $users = User::orderBy('first_name','DESC')->paginate(40);

         //return view('admin')->compact(['users'=>$users]);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUserCreationForm()
    {
        
        return view('admin.partials.createUser');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeNewUser(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors('');
        }
        $user =  User::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'sex' => $request->input('sex'),
            'location' => $request->input('location'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
        $user->asign($request->input('role'));

        return redirect()->back()->withInfo('New user '.$user->first_name.' was successfully created!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function editUser($id)
    {
        try{
            $user = User::findOrFail($id);

            return response()->json([
                'data' =>$user,
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateUser(Request $request)
    {
        $validator = $this->validator($request->all());

        if($validator->fails()){
            return redirect()->back()->withErrors('');
        }
        $user = User::findOrFail($request->input('id'));
        $user->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone' => $request->input('phone'),
            'sex' => $request->input('sex'),
            'location' => $request->input('location'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => $request->input('password') == NULL ? $user->password :  bcrypt($request->input('password')),
        ]);

        if($user->roles()->first()->name <> $request->input('role')){
            $role = Role::where('name',$request->input('role'))->first();
            $user->roles()->sync($role);
        }
        return redirect()->back()->withInfo('New user '.$user->first_name.' was successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
