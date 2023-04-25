<?php

namespace ivorfid\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use ivorfid\Venta;
use ivorfid\DetalleVenta;
use ivorfid\Descuento;
use ivorfid\Cliente;
use ivorfid\Producto;
use ivorfid\ProductoRfid;
use ivorfid\Empresa;
use Barryvdh\DomPDF\Facade as PDF;

// require_once base_path('app/library/numero-a-letras/src/NumeroALetras.php');
use ivorfid\library\numero_a_letras\src\NumeroALetras;

class VentaController extends Controller
{
    public function index(Request $request)
    {
        $empresa = Empresa::first();
        if (Auth::user()->tipo == 'ADMINISTRADOR') {
            $ventas = Venta::where('estado', '=', 1)->get();
            if ($request->ajax()) {
                return response()->JSON(view('ventas.parcial.lista', compact('ventas'))->render());
            }
            return view('ventas.index', compact('empresa', 'ventas'));
        }
        if (Auth::user()->tipo == 'CAJA') {
            $ventas = Venta::where('users_id', '=', Auth::user()->id)
                ->where('estado', '=', 1)->get();
            if ($request->ajax()) {
                return response()->JSON(view('ventas.parcial.lista', compact('ventas'))->render());
            }
            return view('ventas.index', compact('empresa', 'ventas'));
        }
        return view('errors.sin_permiso', compact('empresa'));
    }

    public function obtenerProducto(Request $request)
    {
        $vendido1 = ProductoRfid::where('rfid', '=', $request->rfid)
            ->where('estado', '=', 'VENDIDO')->get();
        $vendido2 = ProductoRfid::where('rfid', '=', $request->rfid)
            ->where('estado', '=', 'SALIDA')->get();
        if (count($vendido1) > 0 || count($vendido2) > 0) {
            return response()->JSON([
                'msg' => 'Vendido'
            ]);
        } else {
            $producto_rfid = ProductoRfid::where('rfid', '=', $request->rfid)
                ->where('estado', '=', 'ALMACEN')->get()->first();
            if ($producto_rfid) {
                return response()->JSON([
                    'msg' => 'Bien',
                    'rfid' => $producto_rfid->rfid,
                    'producto_id' => $producto_rfid->producto->id,
                    'producto' => $producto_rfid->producto->nom,
                    'precio' => $producto_rfid->producto->precio
                ]);
            } else {
                return response()->JSON([
                    'msg' => 'Mal'
                ]);
            }
        }
    }

    public function create()
    {
        $empresa = Empresa::first();
        $descuentos = Descuento::orderBy('descuento', 'ASC')->get();
        foreach ($descuentos as $key => $value) {
            $array_descuentos[$value->simbolo] = $value->simbolo . " (" . ($value->descuento * 100) . "%)";
        }
        if (Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'CAJA') {
            return view('ventas.create', compact('empresa', 'array_descuentos'));
        }
        return view('errors.sin_permiso', compact('empresa'));
    }

    public function store(Request $request)
    {
        $existe_cliente = $request->existe_cliente;
        // REGISTRAR CLIENTE
        if ((int)$existe_cliente == 0) {
            $ultimo_cliente = Cliente::get()->last();
            $num_cli = 0;
            if ($ultimo_cliente) {
                $num_cli = $ultimo_cliente->num_cli + 1;
            } else {
                $num_cli = 1;
            }
            $cliente = new Cliente();
            $cliente->num_cli = $num_cli;
            $cliente->nom_cli = mb_strtoupper($request->nom_cli);
            $cliente->nit_ci = $request->nit_ci;
            $cliente->fono = $request->fono;
            $cliente->user_id = Auth::user()->id;
            $cliente->status = 1;
            $cliente->save();
        } else {
            $cliente = Cliente::find($existe_cliente);
            $cliente->update([
                "nom_cli" => mb_strtoupper($request->nom_cli),
                "fono" => $request->fono,
            ]);
        }

        // REGISTRAR LA VENTA
        $ultima_venta = Venta::get()->last();
        $num_factura = 0;
        if ($ultima_venta) {
            $num_factura = $ultima_venta->num_factura + 1;
        } else {
            $num_factura = 1000;
        }
        $venta = new Venta();
        $venta->pago_total = $request->total;
        $venta->pago_venta = $request->total;
        $venta->fecha = date('Y-m-d');
        $venta->num_factura = $num_factura;
        // CREAR UN CÓDIGO DE CONTROL
        // crear un array
        $array_codigo = [];
        for ($i = 1; $i <= 9; $i++) {
            $array_codigo[] = $i; //agregar los números del 1 al 9
        }
        array_push($array_codigo, 'A', 'B', 'C', 'D', 'E', 'F'); //agregar las letras para poder generar un # hexadecimal
        //generar el código
        $codigo = '';
        for ($i = 1; $i <= 10; $i++) {
            $indice = mt_rand(0, 14);
            $codigo .= $array_codigo[$indice];
            if ($i % 2 == 0) {
                $codigo .= '-';
            }
        }
        $codigo = substr($codigo, 0, strlen($codigo) - 1); //quitar el ultimo guión
        $venta->codigo = $codigo;
        $venta->codigo_qr = mt_rand(10000, 99999);
        $venta->observacion = "Sin observaciones";
        $venta->estado = 1;
        $venta->fecha_venta = date('Y-m-d');
        $venta->fecha_lim_emi = date('Y-m-d', strtotime(date('Y-m-d') . "+ 6 month"));
        $venta->users_id = Auth::user()->id;
        $venta->cliente_id = $cliente->id;
        $venta->save();

        // CREAR EL DETALLE DE LA VENTA
        $array_cantidad = $request->array_cantidad;
        $array_precio = $request->array_precio;
        $array_descuento = $request->array_descuento;
        $array_subtotal = $request->array_subtotal;
        $array_producto_id = $request->array_producto_id;
        $array_rfid = $request->array_rfid;
        for ($i = 0; $i < count($array_cantidad); $i++) {
            // CREAR UN NUEVO DETALLE
            $detalle_venta = new DetalleVenta();
            $detalle_venta->cantidad = $array_cantidad[$i];
            $detalle_venta->precio_uni = $array_precio[$i];
            $detalle_venta->subtotal = $array_subtotal[$i];
            $detalle_venta->precio_final = $array_subtotal[$i];
            $detalle_venta->descuento_sim = $array_descuento[$i];
            $detalle_venta->venta_id = $venta->id;
            $detalle_venta->producto_id = $array_producto_id[$i];
            $detalle_venta->save();
            // ACTUALIZAR EL ESTADO DEL PRODUCTO
            $producto_rfid = ProductoRfid::where('rfid', '=', $array_rfid[$i])->get()->first();
            $producto_rfid->estado = 'VENDIDO';
            $producto_rfid->save();
            // ACTUALIZAR STOCK DEL PRODUCTO
            $producto = Producto::where('id', '=', $array_producto_id[$i])->get()->first();
            $cant_actual = $producto->stock->cant_actual;
            $cant_salidas = $producto->stock->cant_salidas;
            $producto->stock->cant_actual = $cant_actual - 1;
            $producto->stock->cant_salidas = $cant_salidas + 1;
            $producto->stock->save();
        }
        $url = route('ventas.show', $venta->id);
        return response()->JSON([
            'msg' => 'Bien',
            'url' => $url
        ]);
    }

    public function edit(Venta $venta)
    {
        $empresa = Empresa::first();
        if (Auth::user()->tipo == 'ADMINISTRADOR') {
            return view('ventas.edit', compact('empresa', 'venta'));
        }
        return view('errors.sin_permiso', compact('empresa'));
    }

    public function update(Request $request, Venta $venta)
    {
        $venta->cliente->nom_cli = $request->nom_cli;
        $venta->cliente->nit_ci = $request->nit_ci;
        $venta->cliente->save();
        return redirect()->route('ventas.edit', $venta->id)->with('success', 'success');
    }

    public function show(Venta $venta)
    {
        $empresa = Empresa::first();
        if (Auth::user()->tipo == 'ADMINISTRADOR' || Auth::user()->tipo == 'CAJA') {
            return view('ventas.show', compact('empresa', 'venta'));
        }
        return view('errors.sin_permiso', compact('empresa'));
    }

    public function factura(Venta $venta)
    {
        $empresa = Empresa::first();
        $convertir = new NumeroALetras();
        $array_monto = explode('.', $venta->pago_total);
        $literal = $convertir->convertir($array_monto[0]);
        $literal .= " " . $array_monto[1] . "/100." . " BOLIVIANOS";
        $pdf = PDF::loadView('ventas.factura', compact('empresa', 'venta', 'literal'));
        return $pdf->stream('Factura.pdf');
    }

    public function destroy(Venta $venta)
    {
        $venta->estado = 0;
        $venta->save();
        return response()->JSON([
            'msg' => 'cambiar status',
        ]);
    }
}
