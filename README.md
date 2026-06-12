# Sistema de Agendamento para Barbearia - DeskTime

## Descrição e Objetivo

Este projeto tem como objetivo o desenvolvimento de um sistema de agendamento para uma barbearia, permitindo o controle de horários, clientes e serviços.

O sistema foi inicialmente idealizado sobre conceitos puros de Programação Orientada a Objetos (POO) com PHP e integrado ao banco de dados MySQL, e foi evoluído para uma arquitetura MVC robusta utilizando o framework Laravel.

Este projeto faz parte de uma atividade acadêmica com foco na aplicação prática de modelagem de sistemas, relacionamentos entre entidades e gerenciamento de níveis de acesso.

---

## Funcionalidades Implementadas

### Área do Cliente
* **Cadastro e Login:** Autenticação segura integrada com criptografia de senha (Bcrypt).
* **Novo Agendamento:** Controle de horários e serviços (Corte, Barba e Combos) com validação de data (impede agendamentos em dias retroativos).
* **Dashboard do Usuário:** Listagem dinâmica do próximo compromisso confirmado e histórico de agendamentos.

### Área do Administrador
* **Redirecionamento por Nível:** Identifica o tipo do usuário no momento do login (cliente ou admin) e direciona para o painel correto.
* **Painel de Controle:** Listagem em tempo real de todos os agendamentos do sistema com identificação do cliente.
* **Ações Gerenciais:** Botões integrados para Confirmar ou Cancelar agendamentos pendentes.

### Segurança
* **Logout Seguro:** Encerramento completo e seguro da sessão atual utilizando o método POST para proteção de dados contra fixação de sessão.
* **Proteção de Rotas:** Uso de Middlewares para restringir o acesso às dashboards apenas para usuários autenticados.

---

## Estrutura Atual do Projeto (Laravel MVC)

```text
app/
└── Http/
    └── Controllers/
        └── AuthController.php   # Controle de Autenticação, Fluxo de Usuário e Admin
database/
└── migrations/                  # Estrutura automatizada das tabelas (usuarios, agendamentos)
resources/
└── views/
    ├── login.blade.php          # Tela de Autenticação
    ├── cadastrar.blade.php      # Tela de Registro de Clientes
    ├── dashboard_user.blade.php # Painel e histórico do Cliente
    └── dashboard_admin.blade.php# Painel de Controle e Gestão do Administrador
routes/
└── web.php                      # Gerenciamento de Rotas e Middlewares de Segurança
```
##Tecnologias Utilizadas
Ambiente de Desenvolvimento: XAMPP / PHP 8+

Framework Backend: Laravel

Banco de Dados: MySQL (tabelas usuarios e agendamentos)

Frontend: Blade Template Engine, HTML5, CSS3 (Responsivo)
---
##Como Executar o Projeto
Clone o repositório:

Bash
git clone [https://github.com/seu-usuario/seu-repositorio.git](https://github.com/seu-usuario/seu-repositorio.git)
Instale as dependências do Composer:

Bash
composer install
Configure o arquivo .env com o nome do seu banco de dados MySQL (sistema_agendamento).
---
##Execute as migrations para estruturar o banco:

Bash
php artisan migrate
Inicie o servidor embutido do Laravel:

Bash
php artisan serve
---
##Autor
João Vitor Pereira da Silva
