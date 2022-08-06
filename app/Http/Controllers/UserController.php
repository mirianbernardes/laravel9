<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateUserFormRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;    
    }

    public function index(Request $request)
    {
        $users = $this->model
                        ->getUsers(
                            search: $request->search ?? ''
                        );
        return view('users.index', compact('users'));
    }

    public function show($id)
    {
        //$users = User::where('id', $id)->first();
        if(!$users = $this->model::find($id)){
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
        $this->model::create($data);
        //return redirect()->route('users.show', $users->id);
        return redirect()->route('users.index');
    }

    public function edit($id)
    {
        if(!$users = $this->model::find($id)){
            return redirect()->route('users.index');
        }
        return view('users.edit', compact('users'));
    }

    public function update(StoreUpdateUserFormRequest $request, $id)
    {
        if(!$users = $this->model::find($id)){
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
        if(!$users = $this->model::find($id)->delete()){
            return redirect()->route('users.index');
        }

        return redirect()->route('users.index');
    }
}
