<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class CreatePost extends Component
{
    public $content;
    public $showForm = false;

    public function save()
    {
        $this->validate([
            'content' => 'required|min:3',
        ]);

        Auth::user()->posts()->create([
            'content' => $this->content,
        ]);


        $this->reset(['content', 'showForm']);
        session()->flash('message', 'Post Created successfully ');
    }

    public function render()
    {
        return view('livewire.create-post', [
            'posts' => Post::with('user')->latest()->get()
        ])->layout('layouts.app');
        ;
    }
}