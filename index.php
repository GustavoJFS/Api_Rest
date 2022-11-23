<?php
    require_once "models/Contacto.php";

    switch ($_SERVER['REQUEST_METHOD']) {
        case 'GET':
            if(isset($_GET['id'])) {
                echo json_encode(Contacto::getWhere($_GET['id']));
            }
            else {
                echo json_encode(Contacto::getAll());
            }
            break;
        case 'POST':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Contacto::insert($datos->nombre, $datos->apellido, $datos->email)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;

        case 'PUT':
            $datos = json_decode(file_get_contents('php://input'));
            if($datos != NULL) {
                if(Contacto::update($datos->id, $datos->nombre, $datos->apellido, $datos->email)) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        case 'DELETE':
            if(isset($_GET['id'])){
                if(Contacto::delete($_GET['id'])) {
                    http_response_code(200);
                }
                else {
                    http_response_code(400);
                }
            }
            else {
                http_response_code(405);
            }
            break;
        
        default:
            http_response_code(405);
            break;
    }