<?php

namespace App\Livewire\Proposals;

use App\Models\Project;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Create extends Component
{
    public Project $project;
    public bool $modal = false;

    #[Rule('required', 'email')]
    public string $email = '';
    #[Rule('required', 'numeric', 'min:1')]
    public int $hours = 0;

    public bool $agree = false;

    public function save()
    {
        $this->validate();

        if(!$this->agree) {
            $this->addError('agree', 'Please agree to accept our terms and conditions.');
            return;
        }

        $this->project->proposals()
            ->updateOrCreate(
                ['email' => $this->email],
                ['hours' => $this->hours]);

        $this->dispatch('proposalCreated');

        return  redirect()->route('projects.show', $this->project)->with('success', 'Proposta enviada com sucesso!');
    }

    public function render()
    {
        return view('livewire.proposals.create');
    }
}
