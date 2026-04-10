<?php 

class Usuario {
protected $id;    
protected $nome;
protected $email;
protected $senha;
protected $tipo; // 'admin' ou 'usuario'
protected $criado_em;

public function __construct($nome ,$email ,$senha ,$tipo , $id = null){
    $this->nome = $nome;
    $this->email = $email;
    $this->senha = $senha;
    $this->tipo = $tipo;
    $this->id = $id;
}
public function salvar($conexao) {
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $this->nome, $this->email, $this->senha, $this->tipo);
    return $stmt->execute();
}
public function getID() {
    return $this->id;
}

public function getNome() {
    return $this->nome;
}
public function getEmail() {
    return $this->email;
}
public function exibirDados(){
    return "Nome: " . $this->nome . "<br>Email: " . $this->email . "<br>Tipo: " . $this->tipo;
}
}
?>