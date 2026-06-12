<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - DeskTime</title>
    <style>
        /* Configuração global de centralização */
        html, body {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc; 
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Container do Card Centralizado */
        .card-container {
            width: 100%;
            max-width: 520px;
            background-color: #ffffff;
            padding: 45px 40px;
            border-radius: 16px; 
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            box-sizing: border-box;
            text-align: center;
        }

        /* Logo no Topo */
        .brand {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            font-size: 24px;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 12px;
        }
        .brand span {
            color: #1e3a8a;
        }
        .brand-icon {
            width: 22px;
            height: 22px;
            background-color: #1e3a8a;
            border-radius: 6px;
            transform: rotate(45deg);
        }

        /* Título e Subtítulo */
        h2 {
            font-size: 22px;
            color: #1e40af;
            margin: 0 0 8px 0;
            font-weight: 700;
        }

        .subtitle {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 35px;
        }

        /* Formulário e Inputs */
        .form-group {
            text-align: left;
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
            padding: 14px 16px;
            font-size: 15px;
            border: 1px solid #cbd5e1;
            border-radius: 10px;
            background-color: #ffffff;
            box-sizing: border-box;
            transition: all 0.2s;
            color: #0f172a;
        }

        .form-control:focus {
            outline: none;
            border-color: #1e3a8a;
            box-shadow: 0 0 0 3px rgba(30, 58, 138, 0.1);
        }

        /* Opções extras (Lembrar-me e Esqueci a senha) */
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 14px;
        }
        .form-options label {
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }
        .form-options a {
            color: #1e3a8a;
            text-decoration: none;
            font-weight: 600;
        }
        .form-options a:hover {
            text-decoration: underline;
        }

        /* Botão Principal Estilo 'eagenda' */
        .btn-primary {
            width: 100%;
            padding: 16px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            background-color: #0f172a; 
            border: none;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            transition: background-color 0.2s;
        }

        .btn-primary:hover {
            background-color: #1e293b;
        }

        /* Linha Divisória 'OU' */
        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 30px 0;
            color: #94a3b8;
            font-size: 12px;
        }
        .divider::before, .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e2e8f0;
        }
        .divider:not(:empty)::before { margin-right: .75em; }
        .divider:not(:empty)::after { margin-left: .75em; }

        /* Ícones Sociais Minimalistas */
        .social-group {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .btn-social {
            width: 45px;
            height: 45px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .btn-social:hover {
            background-color: #f8fafc;
        }

        /* Alerta de Sucesso Bonito (Azul Claro) */
        .alert-sucesso {
            background-color: #eff6ff;
            color: #1e40af;
            border: 1px solid #bfdbfe;
            border-radius: 12px;
            padding: 15px;
            text-align: left;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Novo estilo para Alerta de Erro (Vermelho Claro) */
        .alert-erro {
            background-color: #fef2f2;
            color: #991b1b;
            border: 1px solid #fca5a5;
            border-radius: 12px;
            padding: 15px;
            text-align: left;
            margin-bottom: 25px;
            font-size: 14px;
            line-height: 1.5;
        }

        /* Links de navegação do rodapé */
        .footer-links {
            font-size: 14px;
            color: #64748b;
        }

        .footer-links a {
            color: #1e40af;
            text-decoration: none;
            font-weight: 600;
        }

        .footer-links a:hover {
            text-decoration: underline;
        }

        .btn-back {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            margin-top: 20px;
            color: #64748b;
            text-decoration: none;
            font-size: 14px;
            font-weight: 600;
        }
        
        .btn-back:hover {
            color: #334155;
        }
        
        /* Responsividade para celulares e tablets */
        @media (max-width: 540px) {
            html, body {
                align-items: flex-start;
                padding: 20px 0;
            }

            .card-container {
                max-width: 95%;
                padding: 35px 20px;
            }

            h2 {
                font-size: 20px;
            }

            .brand {
                margin-bottom: 25px;
            }

            .form-options {
                flex-direction: row;
                justify-content: space-between;
                font-size: 13px;
            }
        }
    </style>
</head>
<body>

<div class="card-container">
    <div class="brand">
        <div class="brand-icon"></div>
        Desk<span>Time</span>
    </div>

    <h2>Login</h2>
    <div class="subtitle">Entre na sua conta</div>

    @if(session('sucesso'))
        <div class="alert-sucesso">
            <strong>Sucesso!</strong> {{ session('sucesso') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert-erro">
            <strong>Ops!</strong> {{ $errors->first() }}
        </div>
    @endif
    
    <form action="/login" method="POST">
        @csrf 

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Seu e-mail" required value="{{ old('email') }}">
        </div>

        <div class="form-group">
            <label for="senha">Senha</label>
            <input type="password" name="senha" id="senha" class="form-control" placeholder="Sua senha" required>
        </div>

        <div class="form-options">
            <label><input type="checkbox"> Continuar logado</label>
            <a href="#">Esqueceu a senha?</a>
        </div>

        <button type="submit" class="btn-primary">
            <span>→</span> Entrar
        </button>
    </form>

    <div class="divider">Ou faça login com</div>

    <div class="social-group">
        <button class="btn-social" type="button" onclick="alert('Template fictício!')">
            <img src="https://fonts.gstatic.com/s/i/productlogos/googleg/v6/web-24dp/logo_googleg_color_1x_web_24dp.png" width="18" alt="Google">
        </button>
        <button class="btn-social" type="button" onclick="alert('Template fictício!')">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="#1877F2"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
        </button>
    </div>

    <div class="footer-links">
        Ainda não tem uma conta? <a href="/cadastro">Criar uma conta</a>
    </div>

    <a href="/cadastro" class="btn-back">← Voltar</a>
</div>

</body>
</html>