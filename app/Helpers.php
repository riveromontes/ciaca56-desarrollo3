<?php

function totalTotal($vuelosAll, $id_estudiante, $id_instructor, $vuelo_desde, $vuelo_hasta, $avion){

    $totaldeTotales = 0;

    if (is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
    {
        foreach($vuelosAll as $vueloAux)
        {
            $totaldeTotales += $vueloAux->horas_voladas;
        }
    }
    else
    {
        foreach($vuelosAll as $vueloAux)
        {
            if(!is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if($id_estudiante == $vueloAux->id_estudiante)
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
             else if(is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))   
            {
                if($id_instructor == $vueloAux->id_instructor)
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion)
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion))
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //---------------------------------
            else if(!is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if($id_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))   
            {
                if($id_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //--------------------
            else if(!is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if($id_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))   
            {
                if($id_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and !is_null($vuelo_desde) and is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_desde))) <= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            //------------
            else if(!is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if($id_estudiante == $vueloAux->id_estudiante and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))   
            {
                if($id_instructor == $vueloAux->id_instructor and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if($avion == $vueloAux->avion and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
            else if(!is_null($id_estudiante) and !is_null($id_instructor) and is_null($vuelo_desde) and !is_null($vuelo_hasta) and !is_null($avion))
            {
                if(($id_estudiante == $vueloAux->id_estudiante) and ($id_instructor == $vueloAux->id_instructor) and ($avion == $vueloAux->avion) and strtotime(date("Y-m-d",strtotime($vuelo_hasta))) >= strtotime(date("Y-m-d",strtotime($vueloAux->fecha_vuelo))) )
                    $totaldeTotales += $vueloAux->horas_voladas;
            }
        }
    }

    

  return $totaldeTotales;
}