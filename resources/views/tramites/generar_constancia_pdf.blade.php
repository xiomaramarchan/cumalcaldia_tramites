<!DOCTYPE html>
<html lang="es">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Constancia de Trabajo</title>
</head>
<body>
    <h1 style="text-align: center"><strong></strong></h1>

	<br>
    @php

        //-------------------dar formato en letras al sueldo del trabajador----------------------//
        
        use Luecano\NumeroALetras\NumeroALetras;        
        $decimals=2;
        $formatter = new NumeroALetras();
        //$sueldo_trabajador=$formatter->toWords($datos_constancia[0]->sueldo_base, $decimals);   

         $sueldo_trabajador=$formatter->toWords($datos_constancia[0]->sueldo, $decimals);   
         if( $datos_constancia[0]->tipoSueldo=='SB'){
            $palabra='básico';
         }
         else{
            $palabra='integral';
        } 
        //----------------------------------------------------------------------------------------//


          //-------------------------Obtener la  fecha actual en letras---------------------------//
        
          $Anio = date("Y");
          $Mes = date("m");
          $Dia = date("d");
          setlocale(LC_ALL, 'spanish');
          $mes_letras= strftime('%B');
          $dia_letras=$formatter->toWords($Dia);

          //----------------------------------------------------------------------------------------//
        


          //-------------------------Fecha en formato de barras---------------------------//
        
          $fechaIngreso = date("d/m/Y", strtotime($datos_constancia[0]->fecha_ingreso));
          
          //----------------------------------------------------------------------------------------//
          
 

    @endphp

    <!--Apócope de uno
        Para cambiar la palabra 'UNO' por 'UN' hacer lo siguiente:-->
        
        {{--$formatter = new NumeroALetras();
        $formatter->apocope = true;--}}
      
        <span style = "color:#000000; line-height: 250%; font-size: 12px;">
        <br />
	    <p align="justify;">       
        Quien suscribe, <b>{!! $datos_director[0]->titulo_academico !!}. {!! $datos_director[0]->nombres !!} {!! $datos_director[0]->apellidos !!}</b>, Director del Poder Municipal de talento Humano, 
        de la Alcaldía del Municipio Sucre del Estado Sucre, por medio de la presente hago constar que el (la) 
        ciudadano(a): <b>
        {!! $datos_constancia[0]->nombres !!} 
        {!! $datos_constancia[0]->apellidos !!}</b> , titular de la Cédula de Identidad N° 
        <b>{!! $datos_constancia[0]->cedula !!}</b>, presta servicios en esta Institución Municipal desde el 
        <b>{!! $fechaIngreso !!}</b> hasta la presente fecha, desempeñando el cargo de:
        <b>{!! $datos_constancia[0]->cargo !!}</b>, adscrito(a) a la 
        <b>{!! $datos_constancia[0]->unidad_administrativa !!}</b>, de la Alcaldía Bolivariana del Municipio Sucre del Estado Sucre.
        Devengando un sueldo {!! $palabra !!} mensual de 
        BOLIVARES. <b>(Bs.{!! $sueldo_trabajador !!} ).</b>   
    </p>
    <p>
       <!-- Constancia que se expide a petición de la parte interesada, en la ciudad de Cumaná, a los {!! $dia_letras !!} ({!!  $Dia !!}) días del mes de {!! $mes_letras !!}  de  {!!  $Anio !!}. -->
       Constancia que se expide a petición de la parte interesada, en la ciudad de Cumaná, a los {!!  $Dia !!} días del mes de {!! $mes_letras !!}  de  {!!  $Anio !!}.
    </p>
    </ span> 
    
</body>
</html>