<?php

namespace App\Livewire\Projects;

use Livewire\Attributes\Computed;
use App\Models\Project;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.projects.index', [
            'projects' => $this->projects(),
        ]);

    }

    #[Computed()]
    public function projects()
    {
        return Project::query()->inRandomOrder()->get();
    }
}
