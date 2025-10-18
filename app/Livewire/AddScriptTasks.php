<?php

namespace App\Livewire;

use App\Models\AdScriptTask;
use Illuminate\View\View;
use Livewire\Component;

class AddScriptTasks extends Component
{
    public $adTasks = [];

    protected $listeners = ['refreshTasks' => 'loadTasks'];

    public function mount(): void
    {
        $this->loadTasks();
    }

    public function loadTasks(): void
    {
        $this->adTasks = AdScriptTask::latest()->take(10)->get();
    }

    public function render(): View
    {
        return view('livewire.add-script-tasks');
    }
}
