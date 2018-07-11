<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;
use App\Http\Requests\VendaCreateRequest;
use App\Http\Requests\VendaUpdateRequest;
use App\Repositories\VendaRepository;
use App\Validators\VendaValidator;

/**
 * Class VendasController.
 *
 * @package namespace App\Http\Controllers;
 */
class VendasController extends Controller
{
    /**
     * @var VendaRepository
     */
    protected $repository;

    /**
     * @var VendaValidator
     */
    protected $validator;

    /**
     * VendasController constructor.
     *
     * @param VendaRepository $repository
     * @param VendaValidator $validator
     */
    public function __construct(VendaRepository $repository, VendaValidator $validator)
    {
        $this->repository = $repository;
        $this->validator  = $validator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
        $vendas = $this->repository->all();

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $vendas,
            ]);
        }

        return view('vendas.index', compact('vendas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VendaCreateRequest $request
     *
     * @return \Illuminate\Http\Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function store(VendaCreateRequest $request)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

            $venda = $this->repository->create($request->all());

            $response = [
                'message' => 'Venda created.',
                'data'    => $venda->toArray(),
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
        $venda = $this->repository->find($id);

        if (request()->wantsJson()) {

            return response()->json([
                'data' => $venda,
            ]);
        }

        return view('vendas.show', compact('venda'));
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
        $venda = $this->repository->find($id);

        return view('vendas.edit', compact('venda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  VendaUpdateRequest $request
     * @param  string            $id
     *
     * @return Response
     *
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(VendaUpdateRequest $request, $id)
    {
        try {

            $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

            $venda = $this->repository->update($request->all(), $id);

            $response = [
                'message' => 'Venda updated.',
                'data'    => $venda->toArray(),
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
                'message' => 'Venda deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'Venda deleted.');
    }
}
