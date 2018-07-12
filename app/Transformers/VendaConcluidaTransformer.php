<?php

namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use App\Entities\VendaConcluida;

/**
 * Class VendaConcluidaTransformer.
 *
 * @package namespace App\Transformers;
 */
class VendaConcluidaTransformer extends TransformerAbstract
{
    /**
     * Transform the VendaConcluida entity.
     *
     * @param \App\Entities\VendaConcluida $model
     *
     * @return array
     */
    public function transform(VendaConcluida $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
