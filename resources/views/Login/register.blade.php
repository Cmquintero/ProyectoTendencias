<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Horarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #0f0c29, #302b63, #24243e, #8a2be2);
            background-size: 300% 300%;
            animation: gradientShift 10s ease infinite;
            color: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .register-box {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 50px 60px;
            box-shadow: 0 0 30px rgba(255, 0, 255, 0.3);
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: #ff00ff;
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-shadow: 0 0 15px #ff00ff;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #ff00ff, 0 0 20px #ff00ff; }
            to { text-shadow: 0 0 25px #ff33ff, 0 0 40px #ff33ff; }
        }

        input {
            width: 80%;
            padding: 12px;
            margin: 10px 0;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
            font-size: 1rem;
            text-align: center;
            transition: background 0.3s ease;
        }

        input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.25);
        }

        button {
            margin-top: 15px;
            padding: 12px 40px;
            background: #ff00ff;
            color: #0f0c29;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            font-size: 1.1rem;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 15px rgba(255, 0, 255, 0.5);
        }

        button:hover {
            background: #ff33ff;
            transform: scale(1.08);
            box-shadow: 0 0 25px rgba(255, 0, 255, 0.8);
        }

        .links {
            margin-top: 15px;
        }

        .links a {
            color: #ff33ff;
            text-decoration: none;
            font-weight: 600;
            margin: 0 8px;
            transition: 0.3s ease;
        }

        .links a:hover {
            text-decoration: underline;
            color: #ff66ff;
        }
    </style>
</head>
<body>

    <div class="register-box">
        <h1>Crear Cuenta</h1>
        <form method="POST" action="{{ route('register.post') }}">
            @csrf
            <input type="text" name="name" placeholder="Nombre completo" required><br>
            <input type="email" name="email" placeholder="Correo electrónico" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" required><br>
            <button type="submit">Registrarse ✨</button>
        </form>

        <div class="links">
            <a href="{{ route('login') }}">🔙 Volver al login</a>
        </div>
    </div>

</body>
</html>
