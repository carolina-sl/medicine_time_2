<?php

echo $this->Html->tag('h1', 'Hora do Remédio');

echo $this->Form->create('MedicineTime');

echo $this->Form->input('User.id', ['label' => 'Usuário', 'required' => false]);
echo $this->Form->input('Remedio.id', ['label' => 'Remédio', 'required' => false]);
echo $this->Form->input('intervalo', ['type' => 'number', 'required' => false]);
echo $this->Form->input('hora_inicial', ['label' => 'Hora inicial', 'type' => 'time']);
echo $this->Form->submit('Cadastrar');
echo $this->Form->end();

$nome = Hash::get($this->request->data, 'User.id');
$remedio = Hash::get($this->request->data, 'Remedio.id');
$intervalo = Hash::get($this->request->data, 'MedicineTime.intervalo', 1);
$horario = Hash::get($this->request->data, 'MedicineTime.hour');
$value = '';

if (!empty($horariosRemedio)) {

    $tabelaHoraDoRemedio = "
            <div class='container'>
                <table class='table table-hover'>
                    <thead>
                        <tr>
                            <th scope='row'>Horários</th>
                            <th scope='row'>Remédio</th>
                            <th scope='row'>Intervalo (horas)</th>
                        </tr>
                    <thead>";

    foreach ($horariosRemedio as $value) {
        $tabelaHoraDoRemedio .= "
            <tbody>
                <tr>
                    <td>$value</td>
                    <td>$remedio</td>
                    <td>$intervalo</td>
                </tr>
            </tbody>
        </div>";
    }
    echo $tabelaHoraDoRemedio .= "</table>";
}
