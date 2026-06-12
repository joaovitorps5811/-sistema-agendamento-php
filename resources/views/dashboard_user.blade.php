<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        /* menu superior */
        .topbar {
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 10;
        }
        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .brand-icon {
            width: 20px;
            height: 20px;
            background-color: #1e3a8a;
            border-radius: 5px;
            transform: rotate(45deg);
            flex-shrink: 0;
        }
        .brand-text {
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
        }
        .brand-text span {
            color: #1e3a8a;
        }
        .user-menu {
            display: flex;
            align-items: center;
            gap: 25px;
            font-size: 14px;
            font-weight: 600;
        }
        .user-menu a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s;
        }
        .user-menu a:hover, .user-menu a.active {
            color: #1e3a8a;
        }
        .hamburger {
            display: none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }
        .hamburger .bar {
            width: 24px;
            height: 3px;
            background-color: #0f172a;
            border-radius: 2px;
            transition: all 0.3s;
        }

        /* Container Principal */
        .main-container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        .page-header h1 {
            font-size: 28px;
            margin: 0;
            font-weight: 700;
        }

        /* Cartões de Conteúdo */
        .card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 24px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-bottom: 30px;
        }
        .card h2 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 16px;
            color: #1e3a8a;
        }
        .card p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }

        /* Tabela */
        .table-responsive {
            width: 100%;
            overflow-x: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }
        th {
            background-color: #f8fafc;
            color: #64748b;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            padding: 16px;
            border-bottom: 1px solid #e2e8f0;
        }
        td {
            padding: 16px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
        }
        tr:last-child td {
            border-bottom: none;
        }

        /* Badges de Status */
        .badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 600;
            text-align: center;
        }
        .status-pendente {
            background-color: #fef3c7;
            color: #d97706;
        }
        .status-confirmado {
            background-color: #dcfce7;
            color: #15803d;
        }
        .status-cancelado {
            background-color: #fee2e2;
            color: #b91c1c;
        }

        /* Alertas de Sucesso */
        .alert-success {
            background-color: #dcfce7;
            border: 1px solid #bbf7d0;
            color: #15803d;
            padding: 14px 20px;
            border-radius: 10px;
            margin-bottom: 25px;
            font-size: 15px;
            font-weight: 500;
        }

        /* Botão */
        .btn-add {
            background-color: #0f172a;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        .btn-add:hover {
            background-color: #1e293b;
        }

        /* Responsividade (Mobile) */
        @media (max-width: 768px) {
            .topbar { padding: 16px 20px; }
            .hamburger { display: flex; }
            .user-menu {
                display: none;
                flex-direction: column;
                position: absolute;
                top: 100%; left: 0; width: 100%;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            }
            .user-menu.active { display: flex; }
            .user-menu span, .user-menu a {
                padding: 15px 20px;
                width: 100%;
                box-sizing: border-box;
                border-bottom: 1px solid #f1f5f9;
            }
            .hamburger.active .bar:nth-child(1) { transform: translateY(8px) rotate(45deg); }
            .hamburger.active .bar:nth-child(2) { opacity: 0; }
            .hamburger.active .bar:nth-child(3) { transform: translateY(-8px) rotate(-45deg); }
            
            .page-header { flex-direction: column; align-items: flex-start; gap: 15px; }
            .btn-add { width: 100%; text-align: center; box-sizing: border-box; }
        }
    </style>
</head>
<body>
    <nav class="topbar">
        <div class="brand">
            <div class="brand-icon"></div>
            <div class="brand-text">Desk<span>Time</span></div>
        </div>
        <button class="hamburger" id="hamburgerBtn">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </button>
        <div class="user-menu" id="userMenu">
            <span>Olá, {{ auth()->user()->nome ?? 'Usuário' }}</span>
            <a href="/dashboard-user" class="active">Meus Agendamentos</a>
            <a href="#">Perfil</a>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #64748b; font-size: 14px; font-weight: 600; cursor: pointer; padding: 0; font-family: inherit;">Sair</button>
            </form>
        </div>
    </nav>

    <main class="main-container">
        
        @if(session('sucesso'))
            <div class="alert-success">
                {{ session('sucesso') }}
            </div>
        @endif

        <div class="page-header">
            <h1>Meus Agendamentos</h1>
            <a href="/dashboard/user/novo-agendamento" class="btn-add">+ Novo Agendamento</a>
        </div>

        <div class="card">
            <h2>Seu próximo Compromisso</h2>
            @if($proximoCompromisso)
                <p>
                    <strong>Serviço:</strong> 
                    @if($proximoCompromisso->id_servico == 1) Corte Tradicional / Degradê
                    @elseif($proximoCompromisso->id_servico == 2) Barba Completa (Toalha Quente)
                    @elseif($proximoCompromisso->id_servico == 3) Combo: Cabelo + Barba
                    @elseif($proximoCompromisso->id_servico == 4) Combo Completo
                    @else Serviço @endif
                    <br>
                    <strong>Data:</strong> {{ date('d/m/Y', strtotime($proximoCompromisso->data_agendamento)) }} às {{ $proximoCompromisso->hora }}
                </p>
            @else
                <p>Você não tem nenhum compromisso confirmado no momento.</p>
            @endif
        </div>

        <div class="card">
            <h2>Histórico de Agendamentos</h2>
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Serviço Escolhido</th>
                            <th>Data</th>
                            <th>Horário</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($agendamentos as $agendamento)
                            <tr>
                                <td>
                                    @if($agendamento->id_servico == 1) Corte Tradicional / Degradê
                                    @elseif($agendamento->id_servico == 2) Barba Completa (Toalha Quente)
                                    @elseif($agendamento->id_servico == 3) Combo: Cabelo + Barba
                                    @elseif($agendamento->id_servico == 4) Combo Completo
                                    @else Serviço #{{ $agendamento->id_servico }} @endif
                                </td>
                                <td>{{ date('d/m/Y', strtotime($agendamento->data_agendamento)) }}</td>
                                <td>{{ $agendamento->hora }}</td>
                                <td>
                                    <span class="badge status-{{ strtolower($agendamento->status) }}">
                                        {{ ucfirst($agendamento->status) }}
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" style="text-align: center; color: #64748b; padding: 20px;">
                                    Você ainda não possui nenhum agendamento realizado.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <script>
        const hamburgerBtn = document.getElementById('hamburgerBtn');
        const userMenu = document.getElementById('userMenu');

        hamburgerBtn.addEventListener('click', () => {
            hamburgerBtn.classList.toggle('active');    
            userMenu.classList.toggle('active');
        });
    </script>
</body>
</html>