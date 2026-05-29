<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        body{
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
        }
        /* menu superior */
        .topbar{
            background-color: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 40px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
            z-index: 10;
        }
        
        /* icone */
        .brand{
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
       
        .brand-icon{
            width: 20px;
            height: 20px;
            background-color: #1e3a8a;
            border-radius: 5px;
            transform: rotate(45deg);
            flex-shrink: 0;
        }
        
        
        .brand-text{
            font-size: 22px;
            font-weight: 700;
            color: #0f172a;
            line-height: 1;
        }
        .brand-text span{
            color: #1e3a8a;
        }

        /*menu de links (desktop)*/
        .user-menu{
            display: flex;
            align-items: center;
            gap: 25px;
            font-size: 14px;
            font-weight: 600;
        }
        .user-menu a{
            color: #64748b;
            text-decoration: none;
            transition: color 0.2s;
        }
        .user-menu a:hover, .user-menu a.active{
            color: #1e3a8a;
        }
        .btn-logout{
            color: #ef4444 !important;
        }
        .btn-logout:hover{text-decoration: underline;}
        /* botão do menu hamburger escondido no desktop */
        .hamburger{
            display:none;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 4px;
        }
        .hamburger .bar{
            width:24px;
            height: 3px;
            background-color: #0f172a;
            border-radius: 2px;
            transition: all 0.3s;
        }
        /* Container principal */
        .main-container{
            max-width:1100px;
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .welcome-section{
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .welcome-section h1{
            font-size: 28px;
            margin: 0;
            font-weight: 700;
        }
        /* Botão de Novo Agendamento */
        .btn-new-appointment{
            background-color: #0f172a;
            color: #ffffff;
            padding: 12px 24px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: background-color 0.2s;
        }
        .btn-new-appointment:hover{
            background-color: #1e293b;
        }
        /* Cartão de Destaque */
        .highlight-card{
            background-color: #eff6ff;
            border: 1px solid #bfdbfe;
            border-radius: 14px;
            padding: 24px;
            margin-bottom: 35px;
        }
        .highlight-card h3{
            margin: 0 0 8px 0;
            color: #1e40af;
            font-size: 18px;
        }
        .highlight-card p{
            margin: 0;
            color: #2563eb;
            font-size: 14px;
            line-height: 1.5;
        }
        /* Estilização da Tabela Modernizada para Barbearia */
        .table-container {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            overflow: hidden; /* Mantém as bordas arredondadas perfeitas */
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
            margin-top: 25px;
        }
        .table-header-title {
            padding: 20px 24px;
            border-bottom: 1px solid #e2e8f0;
            background-color: #ffffff;
        }
        .table-header-title h2 {
            margin: 0;
            font-size: 18px;
            font-weight: 700;
            color: #0f172a;
        }
        .appointments-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 14px;
        }
        .appointments-table th {
            background-color: #f8fafc;
            padding: 16px 24px;
            color: #64748b;
            font-weight: 600;
            border-bottom: 1px solid #e2e8f0;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.05em;
        }
        .appointments-table td {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #334155;
            vertical-align: middle;
        }
        .appointments-table tr:last-child td {
            border-bottom: none; /* Remove a linha cinza do último item */
        }
        .appointments-table tr:hover td {
            background-color: #f8fafc; /* Efeito visual ao passar o mouse */
        }
        
        /* Badges de Status Arredondados */
        .badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            display: inline-block;
            text-align: center;
        }
        .badge-confirmado {
            background-color: #dcfce7;
            color: #166534;
        }
        .badge-pendente {
            background-color: #fef9c3;
            color: #854d0e;
        }
        .badge-cancelado {
            background-color: #fee2e2;
            color: #991b1b;
        }
        /* REGRAS DE RESPONSIVIDADE (MOBILE) */
        @media (max-width: 768px) {
            .topbar { padding: 16px 20px; }

            /* Ativa o botão hambúrguer */
            .hamburger {
                display: flex;
            }

            .user-menu {
                display: none; 
                flex-direction: column;
                gap: 0;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                background-color: #ffffff;
                border-bottom: 1px solid #e2e8f0;
                box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            }

            .user-menu.active {
                display: flex;
            }

            .user-menu span {
                padding: 15px 20px;
                border-bottom: 1px solid #f1f5f9;
                width: 100%;
                box-sizing: border-box;
                color: #0f172a;
            }

            .user-menu a {
                padding: 15px 20px;
                width: 100%;
                box-sizing: border-box;
                border-bottom: 1px solid #f1f5f9;
            }

            /* Efeito de rotação no hambúrguer quando ativo */
            .hamburger.active .bar:nth-child(1) {
                transform: translateY(8px) rotate(45deg);
            }
            .hamburger.active .bar:nth-child(2) {
                opacity: 0;
            }
            .hamburger.active .bar:nth-child(3) {
                transform: translateY(-8px) rotate(-45deg);
            }

            .welcome-section { flex-direction: column; align-items: flex-start; gap: 15px; }
            .btn-new-appointment { width: 100%; text-align: center; box-sizing: border-box; }
            
            .table-container {
                overflow-x: auto;
            }
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
            <a href="#" class="active">Meus Agendamentos</a>
            <a href="#">Perfil</a>
            <a href="#">Sair</a>
        </div>
    </nav>
    <main class="main-container">
        <div class="welcome-section">
            <h1>Meus Agendamentos</h1>
            <a href="{{ route('agendamento.novo') }}" class="btn-new-appointment">+ Novo Agendamento</a>
        </div>
        <div class="highlight-card">
            <h3>Seu próximo Compromisso</h3>
            <p><strong>Data:</strong> </p>
            <p><strong>Status:</strong> Confirmado pela recepção</p>
        </div>
        <div class="table-container">
            <div class="table-header-title">
                <h2>Histórico de Agendamentos</h2>
            </div>
            <table class="appointments-table">
                <thead>
                    <tr>
                        <th>Serviço Escolhido</th>
                        <th>Data</th>
                        <th>Horário</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Corte Degradê + Sobrancelha</strong></td>
                        <td>30/05/2026</td>
                        <td>10:30</td>
                        <td><span class="badge badge-confirmado">Confirmado</span></td>
                    </tr>
                    <tr>
                        <td><strong>Barba Completa (Toalha Quente)</strong></td>
                        <td>02/06/2026</td>
                        <td>16:00</td>
                        <td><span class="badge badge-pendente">Pendente</span></td>
                    </tr>
                    <tr>
                        <td><strong>Combo: Cabelo, Barba e Pigmentação</strong></td>
                        <td>15/06/2026</td>
                        <td>14:20</td>
                        <td><span class="badge badge-cancelado">Cancelado</span></td>
                    </tr>
                </tbody>
            </table>
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