<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Status;
use App\Models\Task;

class CreateTask extends Component
{
    public $title = '';

    public $description = '';

    public $status = '1';

    public $points ='';

    public function render()
    {

        $statuses = Status::whereNotIn('name', ['Accepted', 'Rejected'])->get();

        return view('livewire.create-task')->with(['statuses' => $statuses, 'availableTags' => $availableTags]);
    }

    public function store(): void
    {
        $user = auth()->user();
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['string'],
            'points' =>['points'],
        ]);

        $task = new Task();
        $task->title = $validated['title'];
        $task->points - $validated['points'];
        $task->description = $validated['description'];
        $task->status_id = $validated['status'];
        $task->user_id = $user->id;
        $task->admin_id = $user->id;
        $task->save();

        $this->redirect('/admin');
    }
}
