<?php

namespace App\Presenters;

use App\Transformers\VendaConcluidaTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class VendaConcluidaPresenter.
 *
 * @package namespace App\Presenters;
 */
class VendaConcluidaPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new VendaConcluidaTransformer();
    }
}
