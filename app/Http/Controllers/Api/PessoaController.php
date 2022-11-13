<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaStoreRequest;
use App\Http\Requests\PessoaUpdateRequest;
use App\Services\PessoaServiceInterface;
use App\Services\ValidateCepService;
use App\Services\ValidateCpfService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PessoaController extends Controller
{
    /**
     * @var PessoaServiceInterface
     */
    private $pessoaService;

    /**
     * @var ValidateCepService
     */
    private $validadeCepService;

    /**
     * @var ValidateCpfService
     */
    private $validadeCpfService;

    public function __construct(
        PessoaServiceInterface $pessoaService,
        ValidateCepService $validadeCepService,
        ValidateCpfService $validadeCpfService
    ) {
        $this->pessoaService = $pessoaService;
        $this->validadeCepService = $validadeCepService;
        $this->validadeCpfService = $validadeCpfService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoas = $this->pessoaService->all();
        if ($pessoas) {
            return response()->json($pessoas, Response::HTTP_OK);
        }
        return response()->json($pessoas, Response::HTTP_BAD_REQUEST);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(PessoaStoreRequest $request)
    {   
        $cpf = $this->validadeCpfService->validateCpf($request->cpf);
        $cep = $this->validadeCepService->validateCep($request->cep);
        if ($cep && $cpf) {
            $pessoa = $this->pessoaService->create($request->all());
            if ($pessoa) {
                return response()->json($pessoa, Response::HTTP_OK);
            }
            return response()->json($pessoa, Response::HTTP_BAD_REQUEST);
        }
        return response()->json('cep ou cpf invalido', Response::HTTP_OK);
    }

    /**
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $pessoa = $this->pessoaService->find($id);
        if ($pessoa) {
            return response()->json($pessoa, Response::HTTP_OK);
        }
        return response()->json($pessoa, Response::HTTP_BAD_REQUEST);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PessoaUpdateRequest $request, $id)
    {
        $cpf = $this->validadeCpfService->validateCpf($request->cpf);
        $cep = $this->validadeCepService->validateCep($request->cep);
        if ($cep && $cpf) {
            $pessoa = $this->pessoaService->update($request->all(), $id);
            if ($pessoa) {
                return response()->json($pessoa, Response::HTTP_OK);
            }
            return response()->json($pessoa, Response::HTTP_BAD_REQUEST);
        }
        return response()->json('cep ou cpf invalido', Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pessoa = $this->pessoaService->delete($id);
        if ($pessoa) {
            return response()->json('pessoa deletada', Response::HTTP_OK);
        }
        return response()->json('erro ao deletar pessoa', Response::HTTP_BAD_REQUEST);
    }
}
