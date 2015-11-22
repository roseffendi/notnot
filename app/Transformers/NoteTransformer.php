<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Eloquents\Note;

class NoteTransformer extends TransformerAbstract
{
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */
    public function transform(Note $note)
    {
        return [
            'id'            => (int) $note->id,
            'title'         => $note->title,
            'content'       => $note->content
        ];
    }
}