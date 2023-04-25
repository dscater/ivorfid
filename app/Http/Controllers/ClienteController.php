<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use ivorfid\Cliente;

class ClienteController extends Controller
{
    public function buscar(Request $request)
    {
        $nit_ci = $request->nit_ci;
        $cliente = Cliente::where("nit_ci", $nit_ci)->get()->first();
        if ($cliente) {
            return response()->JSON([
                "sw" => true,
                "cliente" => $cliente
            ]);
        }
        return response()->JSON([
            "sw" => false,
        ]);
    }
}
