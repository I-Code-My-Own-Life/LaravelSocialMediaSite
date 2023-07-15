<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentSection extends Component
{
    public $postId;
    public $comments;

    public function mount($postId){
        $this->postId = $postId;
    }

    public function fetchComments()
    {
        $this->comments = Comment::where('post_id',$this->postId)->get();
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}
