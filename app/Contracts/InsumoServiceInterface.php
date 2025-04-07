<?php

namespace App\Contracts;

interface InsumoServiceInterface
{
    public function getAllInsumos($user);

    public function createInsumo(array $data, $user);

    public function getInsumoById($id, $user);

    public function updateInsumo($id, array $data, $user);

    public function deleteInsumo($id, $user);

    public function asignarInsumoAEvento($insumoId, $eventoId, $cantidad, $usuario);
}
