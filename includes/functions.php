<?php 
class funciones {
    function mostrarRol($rol){
        switch($rol){
            case 1:
                return "Cliente";
                break;
            case 2:
                return "Administrador";
                break;
        }
    }
}