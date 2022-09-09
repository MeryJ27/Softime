<?php
date_default_timezone_set('America/Bogota');

class funciones
{
    function mostrarRol($rol)
    {
        switch ($rol) {
            case 1:
                return "Cliente";
                break;
            case 2:
                return "Administrador";
                break;
        }
    }

    function getActualDate()
    {
        return date('d/m/Y h:i a');
    }
}