<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\Venda;

/**
 * Class VendaTransformer.
 *
 * @package namespace App\Transformers;
 */
class VendaTransformer extends TransformerAbstract
{
    /**
     * Transform the Venda entity.
     *
     * @param \App\Entities\Venda $model
     *
     * @return array
     */
    public function transform(Venda $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
