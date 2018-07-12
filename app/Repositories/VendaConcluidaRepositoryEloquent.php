<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\VendaConcluidaRepository;
use App\Entities\VendaConcluida;
use App\Validators\VendaConcluidaValidator;

/**
 * Class VendaConcluidaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class VendaConcluidaRepositoryEloquent extends BaseRepository implements VendaConcluidaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return VendaConcluida::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return VendaConcluidaValidator::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
    
}
