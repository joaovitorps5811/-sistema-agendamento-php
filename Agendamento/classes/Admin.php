<?php

require_once 'classes/Usuario.php';

class Admin extends Usuario {
    public function cancelarAgendamento($agendamentoId) {
        return "O Administrador {$this->nome} cancelou o agendamento com ID: {$agendamentoId}.";
    }
    public function cadastrarServico($nome_servico, $preco) {
        return "Serviço cadastrado pelo Administrador {$this->nome}: {$nome_servico} - R$ {$preco}";
    }
}
?>