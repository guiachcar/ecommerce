<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\ProdutoRepository;
use App\Repositories\VendaRepository;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    /**
     * @var ProdutoRepository
     */
    
    protected $produto_repository;
    protected $venda_repository;

    public function __construct(ProdutoRepository $produto_repository, VendaRepository $venda_repository)
    {
        $this->middleware('auth');
        $this->produto_repository = $produto_repository;
        $this->venda_repository = $venda_repository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = $this->produto_repository->all();
        $carrinho_produtos = $this->venda_repository->produtos(\Auth::user());
        return view('home')->with('produtos',$produtos)->with('carrinho_produtos',$carrinho_produtos);
    }
}
