<?php
    require_once "connection/Connection.php";

    class Contacto {

        public static function getAll() {
            $db = new Connection();
            $query = "SELECT *FROM contactos";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'email' => $row['email'],
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function getWhere($id_contacto) {
            $db = new Connection();
            $query = "SELECT *FROM contactos WHERE id=$id_contacto";
            $resultado = $db->query($query);
            $datos = [];
            if($resultado->num_rows) {
                while($row = $resultado->fetch_assoc()) {
                    $datos[] = [
                        'id' => $row['id'],
                        'nombre' => $row['nombre'],
                        'apellido' => $row['apellido'],
                        'email' => $row['email'],
                    ];
                }
                return $datos;
            }
            return $datos;
        }

        public static function insert($nombre, $apellido, $email) {
            $db = new Connection();
            $query = "INSERT INTO contactos (nombre, apellido, email)
            VALUES('".$nombre."', '".$apellido."', '".$email."')";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function update($id_contacto, $nombre, $apellido, $email) {
            $db = new Connection();
            $query = "UPDATE contactos SET
            nombre='".$nombre."', apellido='".$apellido."', email='".$email."'
            WHERE id=$id_contacto";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }

        public static function delete($id_contacto) {
            $db = new Connection();
            $query = "DELETE FROM contactos WHERE id=$id_contacto";
            $db->query($query);
            if($db->affected_rows) {
                return TRUE;
            }
            return FALSE;
        }
    }