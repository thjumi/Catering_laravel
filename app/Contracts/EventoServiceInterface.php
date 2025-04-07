<?php

namespace App\Contracts;

interface EventoServiceInterface
{
    public function getAllEventos($usuario);
    public function getEventoById($id);
    public function createEvento(array $data);
    public function updateEvento($id, array $data);
    public function deleteEvento($id);
}
