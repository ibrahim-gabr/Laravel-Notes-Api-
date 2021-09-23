<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class NoteTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($note)
    {
        return [
            "id" => (int)$note->id,
            "title" => (string)$note->title,
            "body" => (string)$note->body,
            "created_at" => (string)$note->created_at,
            "updated_at" => (string)$note->updated_at,
            "tags" => $note->tags()->get(),
      
        ];
    }
}
