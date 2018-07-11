<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Produto;

/**
 * Class ProdutoTransformer.
 *
 * @package namespace App\Transformers;
 */
class ProdutoTransformer extends TransformerAbstract
{
    /**
     * Transform the Produto entity.
     *
     * @param \App\Entities\Produto $model
     *
     * @return array
     */
    public function transform(Produto $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
