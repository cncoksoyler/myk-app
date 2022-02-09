<?php

namespace App\Http\Livewire;

use App\Models\Applicant;
use App\Models\Result;
use Livewire\Component;

class ContactSearchBar extends Component
{
    public $query;
    public $contacts;
    public $highlightIndex;
    public $examid;

    public function mount($id)
    {
        $this->resetFilters();
        $this->examid = $id;
    }

    public function resetFilters()
    {
        $this->query = '';
        $this->contacts = [];
        $this->highlightIndex = 0;
    }

    public function incrementHighlight()
    {
        if ($this->highlightIndex === count($this->contacts) - 1) {
            $this->highlightIndex = 0;
            return;
        }
        $this->highlightIndex++;
    }

    public function decrementHighlight()
    {
        if ($this->highlightIndex === 0) {
            $this->highlightIndex = count($this->contacts) - 1;
            return;
        }
        $this->highlightIndex--;
    }

    public function selectContact()
    {
        $contact = $this->contacts[$this->highlightIndex] ?? null;
        if ($contact) {
            $this->redirect(route('results.create', $contact['id']));
        }
    }

    public function updatedQuery()
    {

        $dummy = Result::where('exam_id', $this->examid)->get('applicant_id')->toArray();


        $this->contacts = Applicant::with('modelResult')->where(function ($query) {
            $query->where('name', 'like', '%' . $this->query . '%')
                ->orWhere('TC', 'like', '%' . $this->query . '%');
        })
            ->whereNotIn('id',  $dummy)
            ->get()->toArray();
        // dd($this->contacts, $dummy);
    }

    public function render()
    {
        return view('livewire.contact-search-bar');
    }
}
