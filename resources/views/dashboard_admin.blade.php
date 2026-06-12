<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel do Administrador - DeskTime</title>
    <style>
        body { margin: 0; font-family: 'Segoe UI', system-ui, sans-serif; background-color: #f8fafc; color: #0f172a; }
        .topbar { background-color: #ffffff; border-bottom: 1px solid #e2e8f0; padding: 16px 40px; display: flex; align-items: center; justify-content: space-between; }
        .brand { display: flex; align-items: center; gap: 12px; font-size: 22px; font-weight: 700; }
        .brand span { color: #1e3a8a; }
        .user-menu { font-size: 14px; font-weight: 600; color: #64748b; display: flex; gap: 20px; align-items: center; }
        .user-menu a { color: #b91c1c; text-decoration: none; }
        .main-container { max-width: 1100px; margin: 40px auto; padding: 0 20px; }
        .card { background-color: #ffffff; border: 1px solid #e2e8f0; border-radius: 14px; padding: 24px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); }
        .card h2 { font-size: 18px; margin-top: 0; margin-bottom: 16px; color: #1e3a8a; }
        table { width: 100%; border-collapse: collapse; text-align: left; font-size: 14px; }
        th { background-color: #f8fafc; color: #64748b; font-weight: 600; text-transform: uppercase; font-size: 12px; padding: 16px; border-bottom: 1px solid #e2e8f0; }
        td { padding: 16px; border-bottom: 1px solid #f1f5f9; color: #334155; vertical-align: middle; }
        .badge { display: inline-block; padding: 6px 12px; border-radius: 20px; font-size: 13px; font-weight: 600; }
        .status-pendente { background-color: #fef3c7; color: #d97706; }
        .status-confirmado { background-color: #dcfce7; color: #15803d; }
        .status-cancelado { background-color: #fee2e2; color: #b91c1c; }
        
        /* Botões de Ação */
        .actions-wrapper { display: flex; gap: 8px; }
        .btn-action { border: none; padding: 6px 12px; border-radius: 6px; font-size: 12px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        .btn-confirm { background-color: #16803d; color: #ffffff; }
        .btn-confirm:hover { background-color: #14532d; }
        .btn-cancel { background-color: #b91c1c; color: #ffffff; }
        .btn-cancel:hover { background-color: #7f1d1d; }
        
        .alert-success { background-color: #dcfce7; border: 1px solid #bbf7d0; color: #15803d; padding: 14px 20px; border-radius: 10px; margin-bottom: 25px; font-size: 15px; font-weight: 500; }
    </style>
</head>
<body>
    <nav class="topbar">
        <div class="brand">Desk<span>Time Admin</span></div>
        <div class="user-menu">
            <span>Olá, {{ auth()->user()->nome }}</span>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #b91c1c; font-size: 14px; font-weight: 600; cursor: pointer; padding: 0; font-family: inherit;">Sair</button>
            </form>
        </div>
    </nav>

    <main class="main-container">
        @if(session('sucesso'))
            <div class="alert-success">
                {{ session('sucesso') }}
            </div>
        @endif

        <div class="card">
            <h2>Todos os Agendamentos do Sistema</h2>
            <table>
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Serviço</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($agendamentos as $agendamento)
                        <tr>
                            <td><strong>{{ $agendamento->nome_cliente }}</strong></td>
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
                            <td>
                                @if(strtolower($agendamento->status) === 'pendente')
                                    <div class="actions-wrapper">
                                        <form action="/admin/agendamentos/{{ $agendamento->id }}/confirmar" method="POST" onsubmit="return confirm('Deseja mesmo confirmar esse agendamento?')">
                                            @csrf
                                            <button type="submit" class="btn-action btn-confirm">Confirmar</button>
                                        </form>

                                        <form action="/admin/agendamentos/{{ $agendamento->id }}/cancelar" method="POST" onsubmit="return confirm('Tem certeza que deseja cancelar esse agendamento?')">
                                            @csrf
                                            <button type="submit" class="btn-action btn-cancel">Cancelar</button>
                                        </form>
                                    </div>
                                @else
                                    <span style="color: #94a3b8; font-size: 12px; font-style: italic;">Finalizado</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" style="text-align: center; color: #64748b; padding: 20px;">
                                Nenhum agendamento encontrado no sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>