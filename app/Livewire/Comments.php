<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;

class Comments extends Component
{
    public $post;
    public $editId;
    public $allComments;

    public function toggle($post_id_edit) {
        if($post_id_edit == $this->editId) {
            $this->editId = '';
        }
        else {
            $this->editId = $post_id_edit;
        }
    }

    public function delete($comment_id) {
        Comment::find($comment_id)->delete();
        $this->allComments = Comment::where('post_id', '=', $this->post->id)->orderBy('created_at', 'desc')->get();
    }

    public function store(Request $request, Post $post) {
        $request->validate(['body' => 'required|string']);
        $request->user()->comments()->create([
            'body' => $request->body,
            'post_id' => $post->id
        ]);
        
        $this->allComments = Comment::where('post_id', '=', $post->id)->orderBy('created_at', 'desc')->get();
        return back();
    }

    public function updateComment(Request $request, $to_update_id) {
        $request->validate(['body' => 'required|string']);
        $cID = $request->user()->comments()->find($to_update_id);
        $cID->update([
            'body' => $request->body
        ]);
        $this->allComments = Comment::where('post_id', '=', $cID->id)->orderBy('created_at', 'desc')->get();
        return back();
    }
    public function render()
    {
        $this->allComments = Comment::where('post_id', '=', $this->post->id)->orderBy('created_at', 'desc')->get();
        return view('livewire.comments');
    }
}
