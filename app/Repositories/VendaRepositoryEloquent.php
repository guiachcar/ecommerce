<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VendaRepository;
use App\Entities\Venda;
use App\Validators\VendaValidator;

/**
 * Class VendaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VendaRepositoryEloquent extends BaseRepository implements VendaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Venda::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VendaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
