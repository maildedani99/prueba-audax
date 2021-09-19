<?php

namespace App\Http\Controllers;

use App\Contrato;
use App\Cliente;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [ 'clientes' => Cliente::all(), 'contratos' => Contrato::all()]);
    }
    public function cliente(request $request)
    {
        $id = $request->id;

        if ($id)
        {
            return view('home', ['contratos' => Contrato::where('cliente_id', $id)->get(), 'clientes' => Cliente::where('id', $id)->get() ]);
        } else {
            return view('home', [ 'contratos' => Contrato::all(), 'clientes' => Cliente::all() ]);
        }
    }
}
