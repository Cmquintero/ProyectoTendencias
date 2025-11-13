<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña - Sistema de Horarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
  <style>
        * {
            box-sizing: border-box;
        }

        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #fcb045, #ff7e5f, #FFC0CB, #fcb045);
            background-size: 300% 300%;
            animation: gradientShift 10s ease infinite;
            color: #ffffff;
            text-align: center;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .recover-box {
    background: rgba(255, 255, 255, 0.08);
    border-radius: 15px;
    padding: 50px 60px;
    box-shadow: 0 0 30px rgba(100,20,10,0.5);
    backdrop-filter: blur(10px);
    animation: fadeIn 1.5s ease;
    width: 100%;
    max-width: 420px;
}


        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: #fff;
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-shadow: 0 0 15px #fcb045;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #FAC1CB, 0 0 20px #FFC0CA; }
            to { text-shadow: 0 0 25px #ff7e5f, 0 0 40px #ff7e5f; }
        }

        input {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.4);
            color: #fff;
            font-size: 1rem;
            text-align: center;
            transition: background 0.3s ease;
        }

        input::placeholder {
            color: #f9f9f9;
        }

        button {
            margin-top: 15px;
            padding: 12px 40px;
            background: #df7e5f;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 15px rgba(255,170,100,0.6);
        }

        button:hover {
            background: #FAC1CB;
            transform: scale(1.08);
            box-shadow: 0 0 25px rgba(255,170,100,0.6);
        }

        .links {
            margin-top: 20px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .links a {
            color: #FAC1CB;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s ease;
        }

        .links a:hover {
            text-decoration: underline;
            color: #df7e5f;
        }
    </style>
</head>
<body>

<div class="recover-box">
    <h1>Recuperar Contraseña</h1>

  @if (session('status'))
    <div id="statusMessage" style="background: rgba(255,170,100,0.6); color: #fff; padding: 10px; border-radius: 10px; margin-bottom: 15px;">
        {{ session('status') }}
    </div>
@endif


    @if ($errors->any())
        <div style="background: rgba(255, 255, 255, 0.4); color: #fff; padding: 10px; border-radius: 10px; margin-bottom: 15px;">
            {{ $errors->first('email') }}
        </div>
    @endif

    <form method="POST" action="{{ route('forgot.post') }}">
        @csrf
        <input type="email" name="email" placeholder="Correo registrado" required><br>
        <button type="submit">Enviar enlace de recuperación ✉️</button>
    </form>

    <div class="links">
        <a href="{{ route('login') }}">🔙 Volver al login</a>
    </div>
</div>


</body>
<script>
    setTimeout(() => {
        const msg = document.getElementById('statusMessage');
        if(msg) {
            msg.style.transition = 'opacity 0.5s';
            msg.style.opacity = '0';
            setTimeout(() => msg.remove(), 500);
        }
    }, 3000); // 3000ms = 3 segundos
</script>

</html>
