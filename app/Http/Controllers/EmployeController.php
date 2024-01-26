<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\User;

// use App\Http\Controllers\Users;

class EmployeController extends Controller 
{
    public function index(){
        $users = User::latest()->get();
        return view('employe.index',compact('users'));

    }

    public function create(){
    return view('employe.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,',
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);
        $user = new User([
            'f_name' => $request->input('f_name'),
            'l_name' => $request->input('l_name'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'address' => $request->input('address'),
            'password' => bcrypt($request->input('password')),
        ]);
        // dd($user->toArray());
        $user->save();


        return redirect()->route('employe.index')
            ->with('success', 'Employee created successfully');
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('employe.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'f_name' => 'required|string|max:255',
            'l_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|numeric',
            'address' => 'required|string|max:255',
            'password' => 'nullable|string|min:6',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        // dd($user);

        return redirect()->route('employe.index')
            ->with('success', 'Employee updated successfully');
    }


    public function destroy($id)
       {    
                $user = User::findOrFail($id);

            $user->delete();
    
            return redirect()->route('employe.index')
               ->with('success', 'Employee deleted successfully');
         }
     
        }

