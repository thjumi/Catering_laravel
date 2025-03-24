<?php

namespace App\Contracts;

interface TareaServiceInterface
{
    public function getAllTareas($user);

    public function createTarea(array $data, $user);

    public function getTareaById($id, $user);

    public function updateTarea($id, array $data, $user);

    public function deleteTarea($id, $user);

}
