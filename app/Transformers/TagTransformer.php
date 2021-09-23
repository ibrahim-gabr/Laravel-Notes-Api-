<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;

class TagTransformer extends TransformerAbstract
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
    public function transform($tag)
    {
        return [
            "id" => (int)$tag->id,
            "name" => (string)$tag->name,
            "notes" => $tag->notes()->get(),
      
        ];
    }
}
