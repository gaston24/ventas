@extends('base')

@section('pageTitle', ' - Locales Propios')

@section('content')

@php
    $sum = 0;
    $suc = 0;
    $comp = 0;

    $mytime = Carbon\Carbon::now();

@endphp

    
@if (!$ventasPropios)
    @php
        $desde = $mytime->toDateString();
        $hasta = $mytime->toDateString();
    @endphp
@else
    @php
        $desde = $_GET['desde'];
        $hasta = $_GET['hasta'];
    @endphp
@endif    



<header>


    <form action="{{ url('/locales') }}" method="GET">
        
        @method('PUT')
        @csrf


            <div class="row mt-3 mb-2">

                <div class="col">
                    <input type="date" name="desde" class="form-control form-control-sm" value="{{ $desde}}">
                </div>

                <div class="col">
                    <input type="date" name="hasta" class="form-control form-control-sm" value="{{ $hasta}}">
                </div>

                <div class="col">
                    @include('ventas.listadoLocales')
                </div>

                <div class="col">
                    <button type="submit" class="btn btn-primary btn-sm">
                        Consultar
                    </button>
                </div>

            </div>

        
    </form>
</header>


@if ($ventasPropios)
            
 
    
<div class="row">
    <div class="col-lg-12">
    <div class="table-responsive">
    <table id="tablaVentas" class="display table-striped table-bordered table-sm" style="width:100%">
            
            <thead>
                <tr>

                    <td class="col-"><h4 id="headNum">NUM</h4></td>
                    
                    <td class="col-"><h4 id="headSuc">SUCURSAL</h4></td>
                    
                    <td class="col-"><h4 id="headCantComp">CANT_COMP</h4></td>
                    
                    <td class="col-"><h4 id="headImporte">IMPORTE</h4></td>
                </tr>
                
            </thead>
            
            <tbody>
                



                @foreach ($ventasPropios as $venta)
                
                <tr>
                    <td class="col-">
                        {{$venta->NUM}}
                    </td>
                    <td class="col-">
                        {{$venta->SUCURSAL}}
                    </td>
                    <td class="col-">
                        {{$venta->CANT_COMP}}
                    </td>
                    <td class="col-">
                        {{number_format($venta->IMPORTE , 0, '', '.')}}
                    </td>

                    @php
                        $sum = $sum + $venta->IMPORTE; 

                        $comp = $comp + $venta->CANT_COMP;

                        $suc++ 
                    @endphp


                </tr>
                
                @endforeach

                                
            </tbody>
                
                <tr>
                    <td align="center"><h3>TOTAL</h3></td>
                    <td>
                        <h3> <a id="sucursales"> {{number_format($suc , 0, '', '.')}} (Locales) </a> </h3>
                    </td>
                    <td>
                        <h3> <a id="cantComp">  {{number_format($comp , 0, '', '.')}} </a> </h3>
                    </td>
                    <td>
                        <h3> <a id="importe"> {{number_format($sum , 0, '', '.')}} </a> </h3>
                    </td>
                </tr>
                
            </table>
        
        </div>
        </div>
        </div>

               


@endif
                
                
@endsection