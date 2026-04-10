<?php 

require_once 'Usuario.php';

class Cliente extends Usuario {
  

public function solicitarAgendamento($data, $hora, $servico) {
    return "Agendamento solicitado pelo Cliente: {this->nome} para o dia {data} às {hora} ";
}
}

?>