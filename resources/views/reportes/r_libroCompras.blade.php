<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libro Compras</title>
    <style type="text/css">
        *{
            font-family: sans-serif;
        }

        @page {
            margin-top: 2cm;
            margin-bottom: 1.5cm;
            margin-left: 1.5cm;
            margin-right:  1.5cm;
            border: 5px solid blue;
          }

        table{
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top:20px;
        }

        table tbody tr td{
            text-align: center;
            font-size: 0.5em;
        }
    
        table thead tr th{
            text-align: center;
            font-size: 0.55em;
        }

        #encabezado{
            width: 100%;
        }

        #logo img{
            position: absolute;
            width: 150px;
            height: 110px;
            top:-40px;
        }
        h2#titulo{
            width: 450px;
            margin: auto;
            margin-top:15px; 
            margin-bottom:15px; 
            text-align: center;
            font-size:0.95em;
        }

        #texto,#fecha{
            width: 450px;
            text-align: center;
            margin:auto;
            margin-top:15px; 
            font-weight: normal;
            font-size:0.85em;
        }

        .periodo{
            margin-top: 20px;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            font-size: 1.3em;
            width: 40%;
            font-weight: bold;
        }

        .periodo tr td:nth-child(2n){
            text-align: left;
            padding-left: 5px;
            font-weight: normal;
            border:solid 1px;
            padding:3.5px;
        }

        .empresa{
            margin-top: 10px;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            font-size: 1.3em;
            width: 100%;
        }

        .empresa tr td:nth-child(1n){
            font-weight:bold;
            width: 35%;
        }
        .empresa tr td:nth-child(2n){
            width: 40%;
            text-align: left;
            font-weight: normal;
            border:solid 1px;
            padding:3.5px;
        }
        .empresa tr td:nth-child(3n){
            font-weight:bold;
            width: 10%;
        }

        .empresa tr td:nth-child(4n){
            width: 15%;
            text-align: left;
            font-weight: normal;
            border:solid 1px;
            padding:3.5px;
        }

        .dir{
            margin-top: 10px;
            margin-bottom: auto;
            margin-left: auto;
            margin-right: auto;
            font-size: 1.3em;
            width: 100%;
        }

        .dir tr td:nth-child(1n){
            font-weight:bold;
            width: 15%;
        }
        .dir tr td:nth-child(2n){
            width: 5%;
            text-align: left;
            font-weight: normal;
            border:solid 1px;
            padding:3.5px;
        }
        .dir tr td:nth-child(3n){
            font-weight:bold;
            width: 15%;
        }
        .dir tr td:nth-child(4n){
            width: 65%;
            text-align: left;
            font-weight: normal;
            border:solid 1px;
            padding:3.5px;
        }

        .totales td{
            font-weight:bold;
            text-align: center;
        }

        .totales td:nth-child(1){
            padding-right: 15px;
            text-align: right; 
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div id="encabezado">
        <div id="logo">
            <img src="{{ asset('imgs/empresa/'.$empresa->logo) }}">
        </div>
        <h2 id="titulo">
            {{ $empresa->name }}
        </h2>
        <h4 id="texto">LIBRO DE COMPRAS</h4>
    </div>
    <table class="periodo">
        <tr>
            <td>PERIODO FISCAL:</td>
            <td>{{$anio_fiscal[0]}}</td>
        </tr>
    </table>
    <table class="empresa">
        <tr>
            <td>NOMBRE O RAZÓN SOCIAL:</td>
            <td>{{$empresa->name}}</td>
            <td>NIT:</td>
            <td>{{$empresa->nit}}</td>
        </tr>
    </table>
    <table class="dir">
        <tr>
            <td>N° SUCURSAL:</td>
            <td>0</td>
            <td>DIRECCIÓN:</td>
            <td>{{$empresa->zona}} {{$empresa->calle}} {{$empresa->nro}}</td>
        </tr>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th colspan="3" width="13%">Fecha</th>
                <th rowspan="2">NIT del proveedor</th>
                <th rowspan="2">Nombre o razón social del proveedor</th>
                <th rowspan="2">N° de factura</th>
                <th rowspan="2">N° de autorización</th>
                <th rowspan="2">Código de control</th>
                <th rowspan="2">Total factura (A)</th>
                <th rowspan="2">Total ICE (B)</th>
                <th rowspan="2">Importes externos (C)</th>
                <th rowspan="2">Importe Neto (A-B-C)</th>
                <th rowspan="2">Credito fiscal IVA</th>
            </tr>
            <tr>
                <th>D</th>
                <th>M</th>
                <th>A</th>
            </tr>
        </thead>
        <tbody>
        @if(count($ingresos)>0)
            @php   
                $contador = 1;
                $total_fac = 0;
                $total_neto = 0;
                $total_iva = 0;
            @endphp
            @foreach($ingresos as $key => $value)
            @php
                $array_fecha = explode('-',$value->fecha_ingreso);
                $total_fac = $total_fac + $value->precio_total;
                $total_neto = $total_neto + $value->precio_total;
                $total_iva = $total_iva + number_format($value->precio_total * 0.13,2,'.',',');
            @endphp
            <tr>
                <td>{{ $array_fecha[2] }}</td>
                <td>{{ $array_fecha[1] }}</td>
                <td>{{ $array_fecha[0] }}</td>
                <td>{{ $value->nit_pro_p }}</td>
                <td>{{ $value->razon_social_p }}</td>
                <td>{{ $value->nro_fac }}</td>
                <td>{{ $value->numa_pro_p }}</td>
                <td>{{ $value->codigo }}</td>
                <td>{{ $value->precio_total }}</td>
                <td>0</td>
                <td>0</td>
                <td>{{ $value->precio_total }}</td>
                <td>{{ number_format($value->precio_total * 0.13,2,'.',',') }}</td>
            </tr>
            @endforeach
            <tr class="totales">
                <td colspan="8">
                    TOTALES GENERALES
                </td>
                <td>
                    {{number_format($total_fac,2,'.',',')}}
                </td>
                <td>
                    0
                </td>
                <td>
                    0
                </td>
                <td>
                    {{number_format($total_neto,2,'.',',')}}
                </td>
                <td>
                    {{number_format($total_iva,2,'.',',')}}
                </td>
            </tr>
        @else
            <tr>
                <td colspan="13">NO SE ENCONTRARON REGISTROS</td>
            </tr>
        @endif
        </tbody>
    </table>
</body>
</html>