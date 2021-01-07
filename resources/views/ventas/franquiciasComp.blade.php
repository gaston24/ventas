@extends('base')

@section('pageTitle', ' - Comparacion Franquicias')

@section('content')

@php
    $sum = 0;
    $sum2 = 0;
    $sum3 = 0;
    $sum4 = 0;
    $cantSuc = 0;
    $dif_ticket_cant = 0;
    $dif_ticket_1 = 0;
    $dif_ticket_2 = 0;
    $dif_importe_1 = 0;
    $dif_importe_2 = 0;

    $mytime = Carbon\Carbon::now();
    $mytimeOld = Carbon\Carbon::now()->subYear();

@endphp

    
@if (!$franquiciasComp)
    @php
        $desde1 = $mytimeOld->toDateString();
        $hasta1 = $mytimeOld->toDateString();
        $desde2 = $mytime->toDateString();
        $hasta2 = $mytime->toDateString();
    @endphp
@else
    @php
        $desde1 = $_GET['desde1'];
        $hasta1 = $_GET['hasta1'];
        $desde2 = $_GET['desde2'];
        $hasta2 = $_GET['hasta2'];
    @endphp
@endif    



<header>


    <form action="{{ url('/franquiciasComp') }}" method="GET">
        
        @method('PUT')
        @csrf

        <div class="row mt-3 mb-2">

            <div class="col ml-5">
                <input type="date" name="desde1" class="form-control form-control-sm" value="{{ $desde1}}">
            </div>

            <div class="col">
                <input type="date" name="hasta1" class="form-control form-control-sm" value="{{ $hasta1}}">
            </div>

            <div class="col">
                <input type="date" name="desde2" class="form-control form-control-sm" value="{{ $desde2}}">
            </div>

            <div class="col">
                <input type="date" name="hasta2" class="form-control form-control-sm" value="{{ $hasta2}}">
            </div>

            <div class="col">
                <select name="suc" class="form-control form-control-sm">
                    <option value="%">TODOS</option>
                    
                    @foreach ($franquiciasDisponibles as $franquicia)
                        <option value="{{$franquicia->NRO_SUCURSAL}}">{{$franquicia->DESC_SUCURSAL}}</option>
                    @endforeach
           
                </select >
            </div>

            <div class="col">
                <button type="submit" class="btn btn-primary btn-sm">
                    Consultar
                </button>
            </div>

        </div>
        
    </form>
</header>


@if ($franquiciasComp)
            
    <div class="table-responsive-lg">
        
        <table id="tablaVentas" class="display table-striped table-bordered table-sm" style="width:100%">
            
            <thead>
                <td class="col-"><h6>NUM</h6></td>

				<td class="col-"><h6>SUCURSAL</h6></td>
				
				<td class="col-"><h6>CANT_COMP_{{substr($desde1, 0, 4)}}</h6></td>
		
                <td class="col-"><h6>IMPORTE_{{substr($desde1, 0, 4)}}</h6></td>

				<td class="col-"><h6>CANT_COMP_{{substr($desde2, 0, 4)}}</h6></td>
		
                <td class="col-"><h6>IMPORTE_{{substr($desde2, 0, 4)}}</h6></td>
				
				<td class="col-"><h6>DIF_COMP_CANT</h6></td>
				
				<td class="col-"><h6>DIF_COMP_%</h6></td>
		
                <td class="col-"><h6>DIF_IMPORTE_%</h6></td>
                
            </thead>
            
            <tbody>
                



                @foreach ($franquiciasComp as $venta)
                
                <tr>
                    <td class="col-">{{$venta->NUM }}</a></td>
		
                    <td class="col-">{{$venta->DESC_SUCURSAL }}</a></td>
                    
                    <td class="col-">{{$venta->CANT_COMP_1 }}</a></td>
                    
                    <td class="col-">{{number_format($venta->IMPORTE_1 , 0, '', '.') }}</a></td>
                    
                    <td class="col-">{{$venta->CANT_COMP_2 }}</a></td>
                    
                    <td class="col-">{{number_format($venta->IMPORTE_2 , 0, '', '.') }}</a></td>

                    <td class="col-">{{$venta->DIF_CANT }}</a></td>

                    <td class="col-">{{$venta->DIF_COMP }}</a></td>

                    <td class="col-">{{$venta->DIF_IMPORTE }}</a></td>

                    @php
                        $sum2 = $sum2 + $venta->CANT_COMP_1; 
                        $sum = $sum + $venta->IMPORTE_1; 
                        $sum3 = $sum3 + $venta->CANT_COMP_2; 
                        $sum4 = $sum4 + $venta->IMPORTE_2; 
                        
                        if($venta->DIF_COMP != 0){$dif_ticket_1 += $venta->CANT_COMP_1; $dif_ticket_2 += $venta->CANT_COMP_2;}
                        if($venta->DIF_COMP != 0){$dif_importe_1 += $venta->IMPORTE_1; $dif_importe_2 += $venta->IMPORTE_2;}
                        if($venta->DIF_COMP != 0){$dif_ticket_cant += $venta->DIF_CANT;}
                    @endphp


                </tr>
                
                @endforeach

                
                
                
            </tbody>
            @php
                $dif_ticket_total = (($dif_ticket_2 / $dif_ticket_1)*100)-100;
                $dif_importe_total = (($dif_importe_2 / $dif_importe_1)*100)-100;
            @endphp
                <tr>
                <td></td>
                <td align="center"><h5>TOTALES</h5></td>
                <td><h5>{{number_format($sum2 , 0, '', '.') }} </h5> </td>
                <td><h5>{{number_format($sum , 0, '', '.') }} </h5> </td>
                <td><h5>{{number_format($sum3 , 0, '', '.') }} </h5> </td>
                <td><h5>{{number_format($sum4 , 0, '', '.') }} </h5> </td>
                <td><h5>{{number_format($dif_ticket_cant , 0, '', '.') }} </h5> </td>
                <td><h5>{{number_format($dif_ticket_total , 2, ',', '.') }} </h5> </td>
                <td><h5>{{number_format($dif_importe_total , 2, ',', '.') }} </h5> </td>
                </tr>
        
        </table>
        
    </div>
    
@endif
                
                
@endsection