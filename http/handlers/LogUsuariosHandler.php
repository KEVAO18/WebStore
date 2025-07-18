<?php

namespace App\Http\Handlers;

use App\Core\Database;
use PDO;
use App\Models\LogUsuarios;

class LogUsuariosHandler {

    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create(LogUsuarios $log): int {
        $db = $this->db->getConnection();
        $stmt = $db->prepare(
            'INSERT INTO `log_usuarios` 
            (`usuario`, `accion`, `detalle`) 
            VALUES (?, ?, ?)'
        );

        $stmt->execute([
            $log->getUsuario()->getDni(),
            $log->getAccion(),
            $log->getDetalle()
        ]);

        return $db->lastInsertId();
    }

    public function update(LogUsuarios $log): bool {
        $db = $this->db->getConnection();
        $stmt = $db->prepare(
            'UPDATE `log_usuarios`
            SET `usuario` = ?, `accion` = ?, `detalle` = ?
            WHERE `id` = ?'
        );

        return $stmt->execute([
            $log->getUsuario()->getDni(),
            $log->getAccion(),
            $log->getDetalle(),
            $log->getId()
        ]); 
    }

    public function delete(int $id): bool {
        $db = $this->db->getConnection();
        $stmt = $db->prepare('DELETE FROM `log_usuarios` WHERE `id` =?');
        return $stmt->execute([$id]); 
    }

    public function getById(int $id): ?LogUsuarios {
        $db = $this->db->getConnection();
        $stmt = $db->prepare('SELECT * FROM `log_usuarios` WHERE `id` = ?');
        $stmt->execute([$id]);
        $datos = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

        return $datos ? new LogUsuarios(
            $datos['id'],
            (new UsuariosHandler())->getById($datos['usuario']),
            $datos['accion'],
            $datos['detalle'],
            $datos['fecha']
        ) : null;
    }

    public function getAll(): array {
        $db = $this->db->getConnection();
        $result = $db->query('SELECT * FROM `log_usuarios`')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn($datos) => new LogUsuarios(
                $datos['id'],
                (new UsuariosHandler())->getById($datos['usuario']),
                $datos['accion'],
                $datos['detalle'],
                $datos['fecha']
            ),
            $result
        ) ?? [];
    }
}