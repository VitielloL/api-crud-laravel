<?php

namespace App\Services;


use App\Repositories\PessoaRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class PessoaService implements PessoaServiceInterface
{
    /**
     * @var PessoaRepository
     */
    private $pessoaRepo;

    public function __construct(PessoaRepository $pessoaRepository)
    {
        $this->pessoaRepo = $pessoaRepository;
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Model
    {
        return $this->pessoaRepo->find($id);
    }

    /**
     * @inheritDoc
     */
    public function all(): ?Collection
    {
        return $this->pessoaRepo->all();
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): ?Model
    {
        return $this->pessoaRepo->create($data);
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): ?bool
    {
        return $this->pessoaRepo->delete($id);
    }

    /**
     * @inheritDoc
     */
    public function update(array $data, int $id): ?Model
    {
        return $this->pessoaRepo->update($data, $id);
    }
}
