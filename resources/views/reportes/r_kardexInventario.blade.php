<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Kardex Inventario</title>
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

        table.producto{
            width: 100%; 
            font-size: 1.1em;
            margin-bottom: -22px;
        }

        table.producto tbody tr td{
            background:#0069d2;
            color:white;
            font-size: 0.75em;
        }

        table.producto tbody tr td.info1{
            text-align: right;
            padding-right: 10px;
            width: 35%;
        }

        table.producto tbody tr td.info2{
            font-weight: bold;
            text-align: left;
            padding-left: 10px;
            width: 65%;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            margin-top:20px;
        }

        table thead tr th, tbody tr td{
            text-align: center;
            font-size: 0.63em;
        }

        table thead tr th.fila1{
            background:#c4e1ff;
        }
    
        table thead tr th{
            font-size: 0.8em;
        }

        #encabezado{
            width: 100%;
        }

        #logo img{
            position: absolute;
            width: 150px;
            height: 110px;
            top:-20px;
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

        .total{
            text-align: right;
            padding-right: 15px;
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
        <h4 id="texto">KARDEX DE INVENTARIO</h4>
        <h4 id="fecha">FECHA DE EMISIÓN: {{ date('d-m-Y') }}</h4>
        <h4 id="fecha">DEL {{ date('d-m-Y',strtotime($fecha_ini)) }} AL {{ date('d-m-Y',strtotime($fecha_fin)) }}</h4>
    </div>
    @foreach($productos as $producto)
    <table class="producto" border="1">
        <tbody>
            <tr>
                <td class="info1"><strong>Producto:</strong></td>
                <td class="info2">{{$producto->nom}}</td>
                <td class="info1"><strong>Existencia mínima:</strong> </td>
                <td class="info2">{{$producto->stock->cant_min}}</td>
            </tr>
        </tbody>
    </table>
    <table border="1">
        <thead>
            <tr>
                <th colspan="6" class="fila1">
                    UNIDADES
                </th>
                <th colspan="4" class="fila1">
                    MONTOS
                </th>
            </tr>
            <tr>
                <th width="5%">Nro.</th>
                <th>Fecha</th>
                <th>Detalle</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Saldo</th>
                <th>C/U(Bs.)</th>
                <th>Ingreso</th>
                <th>Salida</th>
                <th>Saldo(Bs.)</th>
            </tr>
        </thead>
        <tbody>
        @if(count($array_kardex)>0)
            @php   
                $contador = 1;
                $total = 0;
            @endphp
            @foreach($array_kardex[$producto->id] as $key => $value)
            <tr>
                <td>{{ $contador++ }}</td>
                <td>{{ date('d-m-Y',strtotime($value['fecha'])) }}</td>
                <td>{{ $value['detalle'] }}</td>
                <td>{{ $value['ingreso'] }}</td>
                <td>{{ $value['salida'] }}</td>
                <td>{{ $value['saldo'] }}</td>
                <td>{{ number_format($value['cu'],2,'.',',') }}</td>
                <td>{{ $value['ingreso2'] }}</td>
                <td>{{ $value['salida2'] }}</td>
                <td>{{ number_format($value['saldo2'],2,'.',',') }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10">NO SE ENCONTRARON REGISTROS</td>
            </tr>
        @endif
        </tbody>
    </table>
    @endforeach
</body>
</html>