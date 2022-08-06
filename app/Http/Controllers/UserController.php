<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;
        $users = User::where(function ($query) use ($search){
            if($search){
                $query->where('name', 'LIKE', "%{$search}%")
                      ->orWhere('email', 'LIKE', "%{$search}%");
            }
        })->get();
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //$users = User::where('id', $id)->first();
        if(!$users = User::find($id)){
            return redirect()->route('users.index');
        }
        
        return view('users.show', compact('users'));
        
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(StoreUpdateUserFormRequest $request)
    {
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $users = User::create($data);
        //return redirect()->route('users.show', $users->id);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$users = User::find($id)){
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('users'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$users = User::find($id)){
            return redirect()->route('users.index');
        }
        $data = $request->only('name', 'email');
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }
        $users->update($data);
        
        return redirect()->route('users.index');
    }

    public function delete($id)
    {
        if(!$users = User::find($id)->delete()){
            return redirect()->route('users.index');
        }

        return redirect()->route('users.index');
    }
}
