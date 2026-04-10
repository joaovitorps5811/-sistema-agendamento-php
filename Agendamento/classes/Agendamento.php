<?php 
class Agendamento {
    private $agendamentoId;
    private $cliente;
    private $servico;
    private $data;
    private $hora;
    private $status;

    public function __construct($cliente, $servico, $data, $hora, $status = 'pendente', $agendamentoId = null) {
        $this->cliente = $cliente;
        $this->servico = $servico;
        $this->data = $data;
        $this->hora = $hora;
        $this->status = $status;
        $this->agendamentoId = $agendamentoId;
    }
    public function getAgendamentoId() {
        return $this->agendamentoId;
    }
    public function getStatus() {
        return $this->status;
    }
    public function salvar($conexao) {
        $sql = "INSERT INTO agendamentos (id_usuario, id_servico, data_agendamento, hora, status)
                VALUES (?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);

        $id_u = is_object($this->cliente) ? $this->cliente->getId() : $this->cliente;
        $id_s = is_object($this->servico) ? $this->servico->getId() : $this->servico;

        $stmt->bind_param("iisss", $id_u, $id_s, $this->data, $this->hora, $this->status);
        return $stmt->execute();
    }
    public function cancelar($conexao) {
        $this->status = 'cancelado';
        $sql = "UPDATE agendamentos SET status = 'cancelado' WHERE id = ?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $this->agendamentoId);
        if ($stmt->execute()) {
            return "Agendamento cancelado com sucesso.";
        } else {
            return "Erro ao cancelar o agendamento: " . $stmt->error;
        }
    }
}
?>