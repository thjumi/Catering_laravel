<?php

namespace App\Contracts;

interface EmpleadoServiceInterface
{
    public function getAllEmpleados($user);
    public function createEmpleado(array $data, $user);
    public function getEmpleadoById($id, $user);
    public function asignarSubrolEmpleado($id, array $data, $user);
    public function updateEmpleado($id, array $data, $user);
    public function deleteEmpleado($id, $user);
}
