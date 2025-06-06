<div>
    @push('styles')
        <style>
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
        </style>
    @endpush

    <h3 class="note-header">Заметки:</h3>

    <ul class="note-list">
        @foreach($notes as $note)
            <li class="note-item">
                <span>{{ $note->text }}</span>
            </li>
        @endforeach
    </ul>
</div>