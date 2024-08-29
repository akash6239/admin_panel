<?php

namespace App\Http\Controllers;

use App\Models\AdminAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session,Cache;
use Illuminate\Support\Facades\Validator;

class AdminAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function adminverify(Request $request)
    {
        $input = $request->all();
        $username=$request->post('username');
        $password=$request->post('password');
        $rules=[
            'username' => 'required|min:5|max:30',
            'password' => 'required|min:8|max:30',
        ];
        
        $validator = Validator::make($request->all(),$rules,[
            'username.required' => 'User Name is required',
            'password.required' => 'Password is required !',
            
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else{
            $result=AdminAccount::where(['email'=>$username])->first();
               if(isset($result)){
                   if(Hash::check($request->post('password'),$result->password)){
                       $request->session()->put('USER_NAME', $result['email']);
                       $request->session()->put('USER_ID', $result['id']);
                       $request->session()->put('ADMIN_LOGIN_NOW',true);
                       return redirect()->route('dashboard');
                   }
                   else{
                       return redirect()->back()->with(['status' => 'Please enter Valid login details']);
                   }
                }
            else{
                return redirect()->back()->with(['status' => 'Please enter Valid login details']);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AdminAccount $adminAccount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AdminAccount $adminAccount)
    {
        //
    }
}
