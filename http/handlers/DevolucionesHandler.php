<?php

namespace App\Http\Handlers;
;
use App\Core\Database;
use App\Models\Devoluciones;
use DateTime;
use PDO;

class DevolucionesHandler {

    /**
     * @var Database
     * @access private
     * 
     */
    private Database $db;

    /**
     * @return void
     * @access public
     * 
     */
    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function create(Devoluciones $devolucion): int {
        $db = $this->db->getConnection();
        $stmt = $db->prepare(
            'INSERT INTO `devoluciones` 
            (`producto`, `factura`, `motivo`, `reembolso`, `estado`, `fecha_ingreso`, `fecha_final`) 
            VALUES (?, ?, ?, ?, ?, ?, ?)'
        );

        $stmt->execute([
            $devolucion->getProducto()->getId(),
            $devolucion->getFactura()->getId(),
            $devolucion->getMotivo(),
            $devolucion->getReembolso(),
            $devolucion->getEstado(),
            $devolucion->getFechaIngreso(),
            $devolucion->getFechaFinal()
        ]);

        return $db->lastInsertId();
    }

    public function update(Devoluciones $devolucion): bool {
        $db = $this->db->getConnection();
        $stmt = $db->prepare(
            'UPDATE `devoluciones` SET 
            `producto` = ?, `factura` = ?, `motivo` = ?, `reembolso` = ?, `estado` = ?, `fecha_ingreso` = ?, `fecha_final` = ?
            WHERE `id` = ?'
        );

        return $stmt->execute([
            $devolucion->getProducto()->getId(),
            $devolucion->getFactura()->getId(),
            $devolucion->getMotivo(),
            $devolucion->getReembolso(),
            $devolucion->getEstado(),
            $devolucion->getFechaIngreso(),
            $devolucion->getFechaFinal(),
            $devolucion->getId()
        ]);
    }

    public function delete(int $id): bool {
        $db = $this->db->getConnection();
        $stmt = $db->prepare('DELETE FROM `devoluciones` WHERE `id` = ?');
        return $stmt->execute([$id]);
    }

    public function getById(int $id): ?Devoluciones {
        $db = $this->db->getConnection();
        $stmt = $db->prepare('SELECT * FROM `devoluciones` WHERE `id` = ?');
        $stmt->execute([$id]);
        $datos = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;

        return $datos? new Devoluciones(
            $datos['id'],
            (new ProductosHandler())->getById($datos['producto']),
            (new FacturaHandler())->getById($datos['factura']),
            $datos['motivo'],
            $datos['reembolso'],
            $datos['estado'],
            new DateTime($datos['fecha_ingreso']),
            new DateTime($datos['fecha_final']) 
        ) : null;
    }

    public function getAll(): array {
        $db = $this->db->getConnection();
        $result = $db->query('SELECT * FROM `devoluciones`')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            fn($datos) => new Devoluciones(
                $datos['id'],
                (new ProductosHandler())->getById($datos['producto']),
                (new FacturaHandler())->getById($datos['factura']),
                $datos['motivo'],
                $datos['reembolso'],
                $datos['estado'],
                new DateTime($datos['fecha_ingreso']),
                new DateTime($datos['fecha_final']) 
            ),
            $result
        );
    }
}