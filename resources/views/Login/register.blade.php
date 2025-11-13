<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Sistema de Horarios</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        * { box-sizing: border-box; }

        body {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(-45deg, #fcb045, #ff7e5f, #FFC0CB, #fcb045);
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
            margin-top: 120px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 15px;
            padding: 50px 60px;
            box-shadow: 0 0 30px rgba(100,20,10,3.5);
            backdrop-filter: blur(10px);
            animation: fadeIn 1.5s ease;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 {
            color: #ffff;
            font-size: 2.5rem;
            margin-bottom: 25px;
            text-shadow: 0 0 15px #fcb045;
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from { text-shadow: 0 0 10px #FAC1CB, 0 0 20px #FFC0CA; }
            to { text-shadow: 0 0 25px #ff7e5f, 0 0 40px #ff7e5f; }
        }

        input, select {
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

        select option {
            background: #ff7e5f;
            color: white;
        }

        button {
            margin-top: 15px;
            padding: 12px 40px;
            background: #Df7e5f;
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
            margin-top: 15px;
        }

        .links a {
            color: #FAC1CB;
            text-decoration: none;
            font-weight: 600;
            margin: 0 8px;
            transition: 0.3s ease;
        }

        .links a:hover {
            text-decoration: underline;
            color: #Df7e5f;
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

            <!-- 🔹 Selector de rol -->
            <select name="role" required>
                <option value="" disabled selected>Selecciona tu rol</option>
                <option value="plan_estudios">Plan de Estudios 📘</option>
                <option value="docente">Docente 👨‍🏫</option>
                <option value="estudiante">Estudiante 🎓</option>
            </select><br>

            <button type="submit">Registrarse ✨</button>
        </form>

        <div class="links">
            <a href="{{ route('welcome') }}">🔙 Volver al login</a>
        </div>
    </div>

</body>
</html>
