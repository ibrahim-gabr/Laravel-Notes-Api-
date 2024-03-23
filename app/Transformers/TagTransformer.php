<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Transformers\NoteTransformer;

class TagTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        //
    ];
    
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        //
    ];
    
    /**
     * A Fractal transformer.
     *
     * @return array
     */
    public function transform($tag)
    {
        return [
            "id" => (int)$tag->id,
            "name" => (string)$tag->name,
            "notes" => $tag->notes()->get()->transformWith(new NoteTransformer()),
      
        ];
    }
}
