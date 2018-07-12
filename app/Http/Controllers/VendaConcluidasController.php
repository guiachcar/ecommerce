<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VendaConcluidaCreateRequest;
use App\Http\Requests\VendaConcluidaUpdateRequest;
use App\Repositories\VendaConcluidaRepository;
use App\Repositories\VendaRepository;
use App\Validators\VendaConcluidaValidator;

/**
 * Class VendaConcluidasController.
 *
 * @package namespace App\Http\Controllers;
 */
class VendaConcluidasController extends Controller
{
    /**
     * @var VendaConcluidaRepository
     */
    protected $repository;

    /**
     * @var VendaRepository
     */
    protected $venda_repository;

    /**
     * @var VendaConcluidaValidator
     */
    protected $validator;

    /**
     * VendaConcluidasController constructor.
     *
     * @param VendaConcluidaRepository $repository
     * @param VendaConcluidaValidator $validator
     */
    public function __construct(VendaConcluidaRepository $repository, VendaConcluidaValidator $validator, VendaRepository $venda_repository)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
        $this->venda_repository = $venda_repository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cupons()
    {
        $contents = file_get_contents("http://178.128.148.90:5000/cupoms");
        $cupons = json_decode($contents);
        $cupons = $cupons->cupoms;
        $user = \Auth::user();
        foreach($cupons as $cpm)
        {
            if($cpm->email == $user->email)
            {
                $cpm_user[] = $cpm;
            }
        }
        return view('cupons.index', compact('cpm_user'));

    }

    public function finalizar()
    {
        $user = \Auth::user();
        $vendas = $this->venda_repository->produtos($user);
        $valor =0;
        foreach ($vendas as $produto)
        {
            $valor = $valor + $produto->produtos->valor;
        }
        $req['user_id'] = $user->id;
        $req['valor'] = $valor;
        $vendaConcluida = $this->repository->create($req);
        foreach ($vendas as $venda)
        {
            $venda->venda_concluida_id = $vendaConcluida->id;
            $venda->save();
        }
        $mensagem = 'Compra concluida';
        return redirect()->route('home', compact('mensagem'));
    }
   
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vendaConcluidas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendaConcluidas,
            ]);
        }

        return view('vendaConcluidas.index', compact('vendaConcluidas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VendaConcluidaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VendaConcluidaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $vendaConcluida = $this->repository->create($request->all());

            $response = [
                'message' => 'VendaConcluida created.',
                'data'    => $vendaConcluida->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vendaConcluida = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendaConcluida,
            ]);
        }

        return view('vendaConcluidas.show', compact('vendaConcluida'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendaConcluida = $this->repository->find($id);

        return view('vendaConcluidas.edit', compact('vendaConcluida'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VendaConcluidaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VendaConcluidaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $vendaConcluida = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'VendaConcluida updated.',
                'data'    => $vendaConcluida->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);
        } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = $this->repository->delete($id);

        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'VendaConcluida deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'VendaConcluida deleted.');
    }
}
