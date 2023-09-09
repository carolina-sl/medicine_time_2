<?php

App::uses('AppController', 'Controller');

class MedicineTimesController extends AppController {

    public function index() {

        $users = $this->User->find('all');
        $this->set($users, 'users');
        debug($users);
    }

    public function cadastrar() {
        date_default_timezone_set('America/Sao_Paulo');
        $nome = Hash::get($this->request->data, 'User.id');
        $remedio = Hash::get($this->request->data, 'Remedio.id');
        $intervalo = Hash::get($this->request->data, 'MedicineTime.intervalo', 1);
        $horario = Hash::get($this->request->data, 'MedicineTime.hour');
        $hour = Hash::get($this->request->data, 'MedicineTime.hora_inicial.hour');
        $min = Hash::get($this->request->data, 'MedicineTime.hora_inicial.min');
        $value = '';
        $interacoes = (int) (24 / $intervalo);
        $horariosRemedio = [];
        
        switch ($intervalo) {
            case 2:
                for ($i = 0; $i < $interacoes; $i++) {
                    $horariosRemedio[] = date('H:i', strtotime((($intervalo + $hour) * ($i + 1)) . " hours"));
                }
                break;

            case 4:
                for ($i = 0; $i < $interacoes; $i++) {
                    $horariosRemedio[] = date('H:i', strtotime($horario . "+" . ($intervalo * ($i + 1)) . " hours"));
                }
                break;

            case 6:
                for ($i = 0; $i < $interacoes; $i++) {
                    $horariosRemedio[] = date('H:i', strtotime($horario . "+" . ($intervalo * ($i + 1)) . " hours"));
                }
                break;

            case 8:
                for ($i = 0; $i < $interacoes; $i++) {
                    $horariosRemedio[] = date('H:i', strtotime($horario . "+" . ($intervalo * ($i + 1)) . " hours"));
                }
                break;

            case 12:
                for ($i = 0; $i < $interacoes; $i++) {
                    $horariosRemedio[] = date('H:i', strtotime($horario . "+" . ($intervalo * ($i + 1)) . " hours"));
                }
                break;

        }
        $this->set('horariosRemedio', $horariosRemedio);
    }
}
