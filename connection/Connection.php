<?php

    class Connection extends Mysqli {
        function __construct() {
            parent::__construct('localhost', 'root', '12345678', 'api_rest');
            $this->set_charset('utf8');
            $this->connect_error == NULL ? 'Conexión exítosa a la DB' : die('Error al conectarse a la BD');
        }
    }