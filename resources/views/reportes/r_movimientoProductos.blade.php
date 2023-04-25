<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Movimiento Productos</title>
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

        table thead tr th, tbody tr td{
            text-align: center;
            font-size: 0.63em;
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
        <h4 id="texto">MOVIMIENTO DE PRODUCTOS</h4>
        <h4 id="fecha">FECHA DE EMISIÓN: {{ date('d-m-Y') }}</h4>
    </div>
    <table border="1">
        <thead>
            <tr>
                <th width="5%">Nro.</th>
                <th>Fecha</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Ingresos</th>
                <th>Salidas</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
        @if(count($stocks)>0)
            @php   
                $contador = 1;
            @endphp
            @foreach($stocks as $key => $value)
            <tr>
                <td>{{ $contador++ }}</td>
                <td>{{ date('d-m-Y',strtotime($value->fecha_movimiento)) }}</td>
                <td>{{ $value->producto->cod }}</td>
                <td>{{ $value->producto->nom }}</td>
                <td>{{ $value->cant_ingresos }}</td>
                <td>{{ $value->cant_salidas }}</td>
                <td>{{ $value->cant_actual }}</td>
            </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">NO SE ENCONTRARON REGISTROS</td>
            </tr>
        @endif
        </tbody>
    </table>
</body>
</html>