<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class ListPost extends Component
{
    public $updateStateId=0;
	public $body=0;

	public $listeners=[
		'postCreated'=>'$refresh'
	];

    public function render()
    {
        return view('livewire.list-post',[
        	'posts' => Post::latest()->get()
        ]);
    }

    public function showUpdateForm($postId){
        $post=Post::find($postId);
        $this->body=$post->body;
    	$this->updateStateId=$postId;
    }

    public function update($postId)
    {
        $post=Post::find($postId);
        $post->body=$this->body;
        $post->save();

        $this->updateStateId=0;
    }

    public function delete($postId)
    {
        $post=Post::find($postId);
        $post->delete();
    }
}
