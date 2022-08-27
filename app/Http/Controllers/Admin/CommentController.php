<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCommentRequest;
use App\Models\{Comment, User};
use Illuminate\Http\Request;

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $user_id)
    {
        if(!$user = $this->user->find($user_id)){
            return redirect()->back();
        }

        $comments = $user->comments()
                        ->where('description', 'LIKE', "%{$request->search}%")
                        ->get();

        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($user_id)
    {
        if(!$user = $this->user->find($user_id)){
            return redirect()->back();
        }
        return view('users.comments.create', compact('user'));
    }

    public function store(StoreUpdateCommentRequest $request, $user_id)
    {
        if(!$user = $this->user->find($user_id)){
            return redirect()->back();
        }
        //dd($request);
        $user->comments()->create([
            'description' => $request->description,
            'visible' => isset($request->visible),
        ]);
        
        return redirect()->route('comments.index', $user_id);
    }

    public function edit($user_id, $id)
    {
        if(!$comment = $this->comment->find($id)){
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }

    public function update(StoreUpdateCommentRequest $request, $id)
    {
        if(!$comment = $this->comment->find($id)){
            return redirect()->back();
        }

        $comment->update([
            'description' => $request->description,
            'visible' => isset($request->visible),
        ]);
        
        return redirect()->route('comments.index', $comment->user_id);
    }

    public function delete($user_id, $id)
    {
        if(!$comment = $this->comment->find($id)->delete()){
            return redirect()->route('comments.index', $comment->user_id);
        }

        return redirect()->route('comments.index', $user_id);
    }
}
