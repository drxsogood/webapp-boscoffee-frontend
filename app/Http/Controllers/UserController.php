<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function index()
    {
        return view('users.users', [
            'header' => 'Users Management',
            'users' =>  User::all()
        ]);
    }

    public function form()
    {
        return view('users.form', [
            'header' => 'Add Users',

        ]);
    }

    public function passwordForm($id)
    {
        $user = User::find($id);
        return view('users.form_password', [
            'header' => 'Change Password',
            'user'      => $user
        ]);
    }

    public function changePassword(Request $request, $id)
    {
        
        DB::table('users')->where('id', $request->id)->update([
            'password' => Hash::make($request->password)
        ]);

        session()->flash('status', 'Password Updated Successfully!');

        return redirect('/users');
    }


    public function store(Request $request)
    {

        //FOR VALIDATION
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', Rules\Password::defaults()],
        ]);


        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);

        session()->flash('status', 'Added User Successfully!');
        return redirect('/users');
    }

   
     public function show($id)
     {
         $user = User::find($id);
 
         return view('users.form', [
                 'header'    => 'Update User',
                 'user'      => $user
             ]); 
     }

    
    public function update(Request $request, $id)
    {
        // For Validation
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $user = User::find($id);

        $user->update($request->all());

        session()->flash('status', 'Updated User Successfully!');

        return redirect('/users/update/' . $user->id);
    }

    public function destroy(Request $request, $id){
        
        $user = User::find($id);
        $user->delete($request->all());
        session()->flash('status', 'Data Successfully Deleted!');
        return redirect('/users');
    }

    
}
