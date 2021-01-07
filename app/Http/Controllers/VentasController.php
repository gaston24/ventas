<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VentasController extends Controller
{

    public function localesPropios (Request $request){
        
        if(!empty($request)){

            $datos = array($request->desde, $request->hasta, $request->suc);
            $ventasPropios = DB::select("SET DATEFORMAT YMD EXEC SJ_VENTAS_LOCALES_PROPIOS ?, ?, ?", $datos);
            return view('ventas.locales', compact('ventasPropios'));
            
        }else{
            
            return view('ventas.locales');

        }


    }

    public function localesPropiosComp (Request $request){
        
        if(!empty($request)){

            $datos = array($request->desde1, $request->hasta1, $request->desde2, $request->hasta2, $request->suc);
            $ventasPropiosComp = DB::select("SET DATEFORMAT YMD EXEC SJ_VENTAS_LOCALES_PROPIOS_COMP ?, ?, ?, ?, ?", $datos);
            return view('ventas.localesComp', compact('ventasPropiosComp'));
            
        }else{
            
            return view('ventas.localesComp');

        }


    }





    public function localesFranquicias (Request $request){

        $franquiciasDisponibles = DB::select("SELECT NRO_SUCURSAL, DESC_SUCURSAL FROM FRANQUICIAS_LAKERS.DBO.SUCURSAL WHERE (NRO_SUCURSAL BETWEEN 803 AND 999) AND DESC_SUCURSAL NOT LIKE '%SOFIA%' ORDER BY NRO_SUCURSAL");
        
        if(!empty($request)){

            $datos = array($request->desde, $request->hasta, $request->suc);
            
            $ventasFranquicias = DB::select("SET DATEFORMAT YMD EXEC FRANQUICIAS_LAKERS.DBO.SJ_VENTAS_FRANQUICIAS ?, ?, ?", $datos);

            return view('ventas.franquicias')->with(
                ['ventasFranquicias' => $ventasFranquicias, 'franquiciasDisponibles' => $franquiciasDisponibles]
            );
            
        }else{
            
            return view('ventas.franquicias', compact('franquiciasDisponibles'));

        }
        
    }

    public function franquiciasComp (Request $request){

        $franquiciasDisponibles = DB::select("SELECT NRO_SUCURSAL, DESC_SUCURSAL FROM FRANQUICIAS_LAKERS.DBO.SUCURSAL WHERE (NRO_SUCURSAL BETWEEN 803 AND 999) AND DESC_SUCURSAL NOT LIKE '%SOFIA%' ORDER BY NRO_SUCURSAL");
                
        if(!empty($request)){

            $datos = array($request->desde1, $request->hasta1, $request->desde2, $request->hasta2, $request->suc);
            $franquiciasComp = DB::select("SET DATEFORMAT YMD EXEC FRANQUICIAS_LAKERS.DBO.SJ_VENTAS_FRANQUICIAS_COMP ?, ?, ?, ?, ?", $datos);

            return view('ventas.franquiciasComp')->with(
                ['franquiciasComp' => $franquiciasComp, 'franquiciasDisponibles' => $franquiciasDisponibles]
            );
            
        }else{
            
            return view('ventas.franquiciasComp', compact('franquiciasDisponibles'));

        }


    }




    public function todos (Request $request){

   
        if(!empty($request)){

            $datos = array($request->desde, $request->hasta);
            
            $ventasTodos = DB::select("SET DATEFORMAT YMD EXEC SJ_VENTAS_LOCALES_TODOS ?, ?", $datos);

            return view('ventas.todos', compact('ventasTodos'));
            
        }else{
            
            return view('ventas.todos');

        }
        
    }


}
