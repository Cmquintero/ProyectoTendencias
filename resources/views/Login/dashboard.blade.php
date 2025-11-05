<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Usuario - Sistema de Horarios</title>
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

        .dashboard-box {
            background: rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            padding: 60px 80px;
            box-shadow: 0 0 35px rgba(255, 0, 255, 0.4);
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: #ff00ff;
            font-size: 2.8rem;
            margin-bottom: 20px;
            text-shadow: 0 0 15px #ff00ff;
            animation: glow 2s ease-in-out infinite alternate;
        }

        p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            text-shadow: 0 0 10px #ff33ff;
        }

        button {
            padding: 12px 50px;
            background: #ff00ff;
            color: #0f0c29;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            font-size: 1.2rem;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 0 20px rgba(255, 0, 255, 0.5);
        }

        button:hover {
            background: #ff33ff;
            transform: scale(1.08);
            box-shadow: 0 0 30px rgba(255, 0, 255, 0.8);
        }

        @keyframes glow {
            from { text-shadow: 0 0 15px #ff00ff, 0 0 25px #ff00ff; }
            to { text-shadow: 0 0 25px #ff33ff, 0 0 45px #ff33ff; }
        }
    </style>
</head>
<body>

    <div class="dashboard-box">
        <h1>📖 Sistema de Manejo de Horarios</h1>
        <p>¡Has iniciado sesión correctamente! 🎉</p>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Cerrar sesión</button>
        </form>
    </div>

</body>
</html>
