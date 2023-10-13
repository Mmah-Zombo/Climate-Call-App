<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Illuminate\Http\Request;

class Posts extends Component
{
    public $editId;
    public $allPosts;
    public function store(Request $request) {
        $request->validate(['content' => 'required|string']);
        $request->user()->posts()->create([
            'content' => $request->content
        ]);
        $this->allPosts = Post::orderBy('created_at', 'desc')->get();
        return back();
    }

    public function delete($post_id) {
        Post::find($post_id)->delete();
        $this->allPosts = Post::orderBy('created_at', 'desc')->get();
    }

    public function updatePost(Request $request, string $to_update_id) {
        $request->validate(['content' => 'required|string']);
        $pID = $request->user()->posts()->find($to_update_id);
        $pID->update([
            'content' => $request->content
        ]);
        $this->allPosts = Post::orderBy('created_at', 'desc')->get();
        return back();
    }

    public function toggle($post_id_edit) {
        if($post_id_edit == $this->editId) {
            $this->editId = '';
        }
        else {
            $this->editId = $post_id_edit;
        }
    }

    public function render()
    {
        $this->allPosts = Post::orderBy('created_at', 'desc')->get();
        return view('livewire.posts');
    }
}
