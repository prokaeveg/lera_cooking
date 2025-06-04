<div>
    @push('styles')
        <style>
            .note-input-wrapper {
                margin-bottom: 1rem;
                display: flex;
                align-items: center;
            }

            .note-input {
                width: calc(100% - 50px);
                padding: 0.5rem;
                border-radius: 8px;
                border: 1px solid #ccc;
                font-size: 1rem;
            }

            .note-button {
                padding: 0.5rem 1rem;
                margin-left: 0.5rem;
                border: none;
                background-color: #662e06;
                color: white;
                border-radius: 8px;
                font-size: 1rem;
                cursor: pointer;
            }

            .note-list {
                list-style: none;
                padding-left: 0;
                margin: 0;
            }

            .note-item {
                display: flex;
                justify-content: space-between;
                align-items: center;
                margin-bottom: 0.5rem;
                background: #fef2e6;
                padding: 0.5rem 1rem;
                border-radius: 10px;
                box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.1);
                position: relative;
            }

            .delete-x {
                font-size: 1.2rem;
                color: #b31c1c;
                cursor: pointer;
                padding: 0 0.5rem;
                line-height: 1;
                background: transparent;
                border: none;
                font-weight: bold;
                user-select: none;
            }
        </style>
    @endpush

    <h3 class="note-header">Заметки:</h3>

    <div class="note-input-wrapper">
        <input
                type="text"
                wire:model.defer="newNote"
                wire:keydown.enter="addNote"
                class="note-input"
                placeholder="Добавить заметку..."
        >
        <button
                wire:click="addNote"
                class="note-button"
        >
            ➤
        </button>
    </div>

    <ul class="note-list">
        @foreach($notes as $note)
            <li class="note-item">
                <span>{{ $note->text }}</span>
                <span class="delete-x" wire:click="deleteNote({{ $note->id }})">×</span>
            </li>
        @endforeach
    </ul>
</div>