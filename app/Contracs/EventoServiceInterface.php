<?php

namespace App\Contracts;

interface EventoServiceInterface
{
    public function obtenerEventos($usuario);
    public function obtenerEventoPorId($id);
    public function crearEvento(array $data);
    public function actualizarEvento($id, array $data);
    public function eliminarEvento($id);
}
