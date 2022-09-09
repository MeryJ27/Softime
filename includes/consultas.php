<?php
include_once 'db.inc.php';
date_default_timezone_set('America/Bogota');

class consultasDB extends DB
{


    function existeusuario($userform, $passform)
    {
        $md5pass = md5($passform);
        try {
            $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :username AND contraseña = :pass');
            $query->execute(['username' => $userform, 'pass' => $md5pass]);
            $row = $query->fetch(PDO::FETCH_ASSOC);

            if ($row == true) {
                $_SESSION['id'] = $row['id_usuario'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['nombreCliente'] = $row['nombres'];
                $_SESSION['apeCliente'] = $row['apellidos'];
                $_SESSION['rolCliente'] = $row['rol'];
                $_SESSION['ceduCliente'] = $row['cedula_ciudadania'];
                $_SESSION['teleCliente'] = $row['telefono'];
                $_SESSION['correoCliente'] = $row['correo'];
                $_SESSION['direCliente'] = $row['direccion'];

                try {
                    $this->updateLogin($row['id_usuario'], $this->getActualDate());
                } catch (PDOException $e) {
                    return print_r('Error ejecuntando la acción existe usuario segunda: ' . $e->getMessage());
                }

                return true;
            }
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción existe usuario: ' . $e->getMessage());
        }
    }

    function registrarUsuario($datos)
    {
        $md5password = md5($datos['contraseña']);

        try {
            $query = $this->connect()->prepare('INSERT INTO usuarios (username, nombres, apellidos, cedula_ciudadania, telefono, correo, contraseña, rol) VALUES (:username, :nombres, :apellidos, :cedula, :telefono, :correo, :pass, :rol)');
            $query->execute(['username' => $datos['username'], 'nombres' => $datos['nombres'], 'apellidos' => $datos['apellidos'], 'cedula' => 0, 'telefono' => 0, 'correo' => $datos['correo'], 'pass' => $md5password, 'rol' => 1]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción registrar usuario: ' . $e->getMessage());
        }
    }

    function actualizarDatos($data)
    {
        try {
            $query = $this->connect()->prepare('UPDATE usuarios SET username = :username, nombres = :nom, apellidos = :ape, cedula_ciudadania = :cc, telefono = :tel, correo = :correo, direccion = :dir WHERE id_usuario = :idUsuario');
            $query->execute(['username' => $data['username'], 'nom' => $data['nombres'], 'ape' => $data['apellidos'], 'cc' => $data['cedula'], 'tel' => $data['telefono'], 'correo' => $data['correo'], 'dir' => $data['direccion'], 'idUsuario' => $data['idUsuario']]);

            $_SESSION['username'] = $data['username'];
            $_SESSION['nombreCliente'] = $data['nombres'];
            $_SESSION['apeCliente'] = $data['apellidos'];
            $_SESSION['ceduCliente'] = $data['cedula'];
            $_SESSION['teleCliente'] = $data['telefono'];
            $_SESSION['correoCliente'] = $data['correo'];
            $_SESSION['direCliente'] = $data['direccion'];

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción actualizar datos: ' . $e->getMessage());
        }
    }

    function obtenerClientes()
    {
        try {
            $query = $this->connect()->prepare('SELECT * FROM usuarios');
            $query->execute();

            return $query;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción obtener clientes: ' . $e->getMessage());
        }
    }

    function obternerClienteId($id)
    {
        try {
            $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE id_usuario=:id');
            $query->execute(['id' => $id]);

            return $query;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción obtener cliente por id: ' . $e->getMessage());
        }
    }

    function cambiarEstado($estado, $id)
    {
        try {
            $query = $this->connect()->prepare('UPDATE usuarios SET estado = :estado WHERE id_usuario = :id');
            $query->execute(['estado' => $estado, 'id' => $id]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción cambiar Estado: ' . $e->getMessage());
        }
    }

    function updateLogin($id, $fecha)
    {
        try {
            $query = $this->connect()->prepare('UPDATE usuarios SET ultimo_login = :fecha WHERE id_usuario = :id');
            $query->execute(['fecha' => $fecha, 'id' => $id]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción Ultimo Login: ' . $e->getMessage());
        }
    }

    function getActualDate()
    {
        return date('d/m/Y h:i a');
    }

    function actualizarDatosControl($data)
    {
        try {
            $md5pass = md5($data['password']);
            $query = $this->connect()->prepare('UPDATE usuarios SET estado = :estado, username = :username, nombres = :nom, apellidos = :ape, cedula_ciudadania = :cc, telefono = :tel, correo = :correo, direccion = :dir, contraseña = :pass, rol = :rol WHERE id_usuario = :idUsuario');
            $query->execute(['estado' => $data['estado'], 'username' => $data['username'], 'nom' => $data['nombres'], 'ape' => $data['apellidos'], 'cc' => $data['cedula'], 'tel' => $data['telefono'], 'correo' => $data['correo'], 'dir' => $data['direccion'], 'pass' => $md5pass, 'rol' => $data['rol'], 'idUsuario' => $data['idUsuario']]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción actualizar datos: ' . $e->getMessage());
        }
    }

    function crearUsuario($data)
    {

        $md5password = md5($data['contraseña']);
        try {
            $query = $this->connect()->prepare(
                'INSERT INTO usuarios (estado,username, nombres, apellidos, cedula_ciudadania, telefono, correo, direccion, contraseña, rol) VALUES (:estado, :username, :nom, :ape, :cedula, :telefono, :correo, :dir, :pass, :rol)'
            );
            $query->execute(['estado' => $data['estado'], 'username' => $data['username'], 'nom' => $data['nombres'], 'ape' => $data['apellidos'], 'cedula' => $data['cedula'], 'telefono' => $data['telefono'], 'correo' => $data['correo'], 'dir' => $data['direccion'], 'pass' => $md5password, 'rol' => $data['rol']]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción crear usuario: ' . $e->getMessage());
        }
    }


    function cambiarPass($pass, $id)
    {
        $md5pass = md5($pass);
        try {
            $query = $this->connect()->prepare('UPDATE usuarios SET contraseña = :pass WHERE id_usuario = :idUsuario');
            $query->execute(['pass' => $md5pass, 'idUsuario' => $id]);

            return true;
        } catch (PDOException $e) {
            return print_r('Error ejecuntando la acción cambiar contraseña ' . $e->getMessage());
        }
    }
}