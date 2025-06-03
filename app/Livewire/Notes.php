<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;

class Notes extends Component
{
    public string $receiptCode;
    public string $newNote = '';

    public function mount(string $receiptCode): void
    {
        $this->receiptCode = $receiptCode;
    }

    public function addNote(): void
    {
        if (trim($this->newNote) === '') {
            return;
        }

        $note = new Note();
        $note->text = $this->newNote;
        $note->receipt_code = $this->receiptCode;
        $note->save();

        $this->newNote = '';
    }

    public function render()
    {
        return view(
            'livewire.notes',
            [
                'notes' => Note::where('receipt_code', $this->receiptCode)
                    ->orderByDesc('id')
                    ->get(),
            ]
        );
    }

    public function deleteNote($noteId)
    {
        Note::where('id', $noteId)
            ->where('receipt_code', $this->receiptCode)
            ->delete();
    }
}
