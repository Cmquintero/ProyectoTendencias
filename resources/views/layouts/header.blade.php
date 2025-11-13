{{-- Header / Navbar --}}
<nav class="navbar">
    <div class="container-nav">
        <div class="navbar-title"><a href="{{ route('welcome') }}">🏫 Gestión de Horarios</a></div>


        <ul class="navbar-links">
            @auth
                <li><a href="{{ route('estudiantes.index') }}">👨‍🎓 Estudiantes</a></li>
                <li><a href="{{ route('docentes.index') }}">👩‍🏫 Docentes</a></li>
                <li><a href="{{ route('asignaturas.index') }}">📘 Asignaturas</a></li>
                <li><a href="{{ route('horarios.index') }}">📅 Horarios</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST" class="logout-form">
                        @csrf
                        <button type="submit">🚪 Cerrar sesión</button>
                    </form>
                </li>
            @endauth
        </ul>
    </div>
</nav>

<style>
/* ==== NAVBAR ANIMADA Y ELEGANTE ==== */
.navbar {
    position: fixed;
    margin-bottom:15px;
    width: 100%;
    background: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(8px);
    border-bottom: 2px solid #ff9966;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
    z-index: 1000;
    font-family: 'Poppins', sans-serif;
    padding: 25px 0;
}

/* Contenedor general */
.container-nav {
    max-width: 1300px;
    margin: auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 50px;
}

/* 🔸 Título con animación naranja */
.navbar-title a {
    text-decoration: none;       
    color: #ff9966;           
    font-size: 2rem;
    font-weight: 700;
    text-shadow: 0 0 10px rgba(255, 150, 80, 0.4);
    animation: glowTitle 2s ease-in-out infinite alternate;
    transition: color 0.3s ease, transform 0.2s ease;
    margin-right:25px;
}

.navbar-title a:hover {
    color: #ffb27a;              
    transform: translateY(-2px); 
}

@keyframes glowTitle {
    from { text-shadow: 0 0 8px rgba(255, 150, 80, 0.4); }
    to { text-shadow: 0 0 16px rgba(255, 180, 100, 0.9); }
}

/* 🔸 Lista de enlaces */
.navbar-links {
    list-style: none;
    display: flex;
    align-items: center;
    gap: 30px;
    margin: 0;
    padding: 0;
}

/* 🔸 Estilo de enlaces */
.navbar-links a {
    text-decoration: none;
    color: #fff;
    font-size: 1.15rem;
    font-weight: 500;
    transition: color 0.3s ease, transform 0.2s ease;
}

.navbar-links a:hover {
    color: #ff9966;
    transform: translateY(-2px);
}

/* 🔸 Botón de logout */
.logout-form {
    display: inline;
}

.logout-form button {
    background: none;
    border: none;
    color: #fff;
    font-size: 1.15rem;
    font-weight: 500;
    cursor: pointer;
    transition: color 0.3s ease, transform 0.2s ease;
}

.logout-form button:hover {
    color: #ff9966;
    transform: translateY(-2px);
}

/* 🔸 Responsivo */
@media (max-width: 900px) {
    .container-nav {
        flex-direction: column;
        gap: 10px;
    }

    .navbar-links {
        flex-wrap: wrap;
        justify-content: center;
        gap: 15px;
    }

    .navbar-title {
        font-size: 1.6rem;
        text-align: center;
    }
}
</style>
