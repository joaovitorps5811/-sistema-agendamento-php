<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Agendamento</title>
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

        /* Container do Formulário */
        .main-container{
            max-width: 600px; 
            margin: 40px auto;
            padding: 0 20px;
            box-sizing: border-box;
        }
        .page-header {
            margin-bottom: 30px;
        }
        .page-header h1 {
            font-size: 28px;
            margin: 0 0 8px 0;
            font-weight: 700;
        }
        .page-header p {
            margin: 0;
            color: #64748b;
            font-size: 15px;
        }

        /* Cartão do Formulário */
        .form-card {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 14px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
        }
        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            font-size: 15px;
            background-color: #ffffff;
            color: #0f172a;
            box-sizing: border-box;
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        }
        
        /* Área de Botões */
        .form-actions {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }
        .btn {
            flex: 1;
            padding: 14px;
            border-radius: 10px;
            font-size: 15px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
            border: none;
            transition: background-color 0.2s;
        }
        .btn-primary {
            background-color: #0f172a;
            color: #ffffff;
        }
        .btn-primary:hover {
            background-color: #1e293b;
        }
        .btn-secondary {
            background-color: #f1f5f9;
            color: #475569;
        }
        .btn-secondary:hover {
            background-color: #e2e8f0;
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
            
            .form-actions { flex-direction: column; }
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
            <a href="/dashboard-user">Meus Agendamentos</a>
            <a href="#">Perfil</a>
            <form action="/logout" method="POST" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; color: #b91c1c; font-size: 14px; font-weight: 600; cursor: pointer; padding: 0; font-family: inherit;">Sair</button>
            </form>
        </div>
    </nav>

    <main class="main-container">
        <div class="page-header">
            <h1>Agendar Horário</h1>
            <p>Escolha o serviço, a data e o horário desejado.</p>
        </div>

        <div class="form-card">
            <form action="{{ route('agendamento.salvar') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="service">Selecione o Serviço</label>
                    <select id="service" name="servico" class="form-control" required>
                        <option value="" disabled selected>Escolha uma opção...</option>
                        <option value="corte">Corte Tradicional / Degradê - R$ 35,00</option>
                        <option value="barba">Barba Completa (Toalha Quente) - R$ 30,00</option>
                        <option value="combo1">Combo: Cabelo + Barba - R$ 60,00</option>
                        <option value="combo2">Combo Completo: Cabelo + Barba + Sobrancelha - R$ 70,00</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="date">Data do Agendamento</label>
                    <input type="date" id="date" name="data" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="time">Horário Disponível</label>
                    <select id="time" name="horario" class="form-control" required>
                        <option value="" disabled selected>Escolha o horário...</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                    </select>
                </div>

                <div class="form-actions">
                    <a href="/dashboard-user" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Confirmar Agendamento</button>
                </div>
            </form>
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