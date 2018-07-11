<?php

namespace App\Presenters;

use App\Transformers\ProdutoTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

/**
 * Class ProdutoPresenter.
 *
 * @package namespace App\Presenters;
 */
class ProdutoPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new ProdutoTransformer();
    }
}
