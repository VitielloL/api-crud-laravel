<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\PessoaRepository;
use App\Entities\Pessoa;
use App\Validators\PessoaValidator;

/**
 * Class PessoaRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class PessoaRepositoryEloquent extends BaseRepository implements PessoaRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Pessoa::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
