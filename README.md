# -sistema-agendamento-php
Projeto de sistema de agendamento em PHP utilizando programação orientada a objetos.

# 📅 Sistema de Agendamento em PHP

## 📌 Descrição do Projeto
O Sistema de Agendamento é uma aplicação web desenvolvida em PHP com o objetivo de permitir que usuários realizem o agendamento de serviços de forma simples e organizada.

O sistema permite cadastrar informações como nome do cliente, serviço desejado, data e horário do atendimento.

Este projeto foi desenvolvido como atividade acadêmica da disciplina de Programação Orientada a Objetos (POO).

---

## 🎯 Objetivo
Desenvolver uma aplicação utilizando conceitos de Programação Orientada a Objetos para praticar:

- Criação de classes
- Uso de atributos e métodos
- Conexão com banco de dados
- Organização de código em PHP

---

## 🛠 Tecnologias Utilizadas

- PHP
- MySQL
- HTML
- CSS
- Git
- GitHub

---

## 🗂 Estrutura do Projeto

```
sistema-agendamento/
│
├── index.php
├── conectar.php
│
├── classes/
│   └── Agendamento.php
│
├── cadastrar_agendamento.php
├── salvar_agendamento.php
└── listar_agendamentos.php
```

---

## 🗄️ Banco de Dados

O sistema utiliza um banco de dados MySQL chamado:

```
agendamento
```

Tabela principal:

```
agendamentos
```

Campos:

| Campo | Tipo |
|------|------|
| id | INT |
| nome | VARCHAR |
| servico | VARCHAR |
| data_agendamento | DATE |
| horario | TIME |

---

## ⚙️ Funcionalidades do Sistema

- Cadastro de agendamentos
- Armazenamento de dados no banco de dados
- Listagem de agendamentos cadastrados

---

## ▶️ Como Executar o Projeto

1. Instalar um servidor local (XAMPP ou WAMP)
2. Criar o banco de dados no MySQL
3. Importar a tabela `agendamentos`
4. Colocar o projeto na pasta `htdocs`
5. Abrir no navegador:

```
http://localhost/agendamento
```

---

## 👨‍💻 Autor
João Vitor Pereira Da Silva
**João Vitor Pereira da Silva**

Projeto desenvolvido para fins acadêmicos.
