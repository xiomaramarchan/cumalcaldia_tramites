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
        $sueldo_trabajador=$formatter->toWords($datos_constancia[0]->sueldo_base, $decimals);   

        //----------------------------------------------------------------------------------------//


          //-------------------------Obtener la  fecha actual en letras---------------------------//
        
          $Anio = date("Y");
          $Mes = date("m");
          $Dia = date("d");
          setlocale(LC_ALL, 'spanish');
          $mes_letras= strftime('%B');
          $dia_letras=$formatter->toWords($Dia);

          
             
          //----------------------------------------------------------------------------------------//
        
        




    @endphp

    <!--Apócope de uno
        Para cambiar la palabra 'UNO' por 'UN' hacer lo siguiente:-->
        
        {{--$formatter = new NumeroALetras();
        $formatter->apocope = true;--}}

	<p>
        Quien suscribe, LCDO. WILLIANS JOSE MARVAL FERNANDEZ, Director del Poder Municipal de talento Humano, 
        de la Alcaldía del Municipio Sucre del Estado Sucre, por medio de la presente hago constar que el(la) 
        ciudadano(a): 
        {!! $datos_constancia[0]->nombres !!} 
        {!! $datos_constancia[0]->apellidos !!} , Cédula de Identidad N° 
        {!! $datos_constancia[0]->cedula !!}, presta servicios en esta Institución Municipal desde el 
        {!! $datos_constancia[0]->fecha_ingreso !!} hasta la presente fecha, desempeñando el cargo de:
        {!! $datos_constancia[0]->cargo !!}, adscrito(a) a la 
        {!! $datos_constancia[0]->unidad_administrativa !!}, de la Alcaldía Bolivariana del Municipio Sucre del Estado Sucre.
        Devengando un sueldo básico mensual de 
        Bs. ({!!  $sueldo_trabajador !!} )    
    </p>
    <p>
        Constancia que se expide a petición de la parte interesada, en la ciudad de Cumaná, a los {!! $dia_letras !!} ({!!  $Dia !!}) días del mes de {!! $mes_letras !!}  de  {!!  $Anio !!} 
    </p>

    
</body>
</html>