<footer>
    <div class="footer-container">
        <div class="partFooter">
            <h4>📞 Contacto</h4>
            <div class="contact">
                <i class="fa-solid fa-phone"></i>
                <p>(+57) 315 793 6046</p>
            </div>
            <div class="contact">
                <i class="fa-solid fa-envelope"></i>
                <p>cmquinterot@ufpso.edu.co</p>
            </div>
            <div class="contact">
                <i class="fa-solid fa-location-dot"></i>
                <p>Ocaña - N. de Santander - Colombia</p>
            </div>
        </div>

        <div class="partFooter">
            <h4>🔗 Enlaces</h4>
            <a href="https://ufpso.edu.co/" target="_blank" >UPFSO</a>
            <a href="https://fullstackopen.com/es/" target="_blank">Full Stack</a>
            <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank">SENA</a>
        </div>

        <div class="partFooter" >
            <h4>🌐 Redes Sociales</h4>
            <div class="social-media">
                <a href="https://github.com/Cmquintero" target="_blank"><i class="fa-brands fa-github"></i></a>
                <a href="https://www.linkedin.com/in/carlos-mario-quintero-trigos-b9a21b271/" target="_blank"><i class="fa-brands fa-linkedin"></i></a>
                <a href="https://web.facebook.com/carlosmario.quinterotrigos" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                <a href="https://www.instagram.com/cm_quintero/?hl=es-la" target="_blank"><i class="fa-brands fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <div class="copy">
        <p>© {{ date('Y') }} <strong>Carlos Mario Quintero Trigos</strong> — Todos los derechos reservados.</p>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</footer>

<style>
/* Footer fijo, serio y de ancho completo */
footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: #0d0d0d;
    color: #eaeaea;
    padding: 20px 0 10px; /* antes 35px 0 15px */
    border-top: 2px solid #ff9966; /* más sutil */
    font-family: 'Poppins', sans-serif;
    z-index: 1000;
    font-size: 0.9rem; /* reduce tamaño general */
}

.footer-container {
    max-width: 1100px;
    margin: auto;
    display: flex;
    justify-content: space-evenly;
    padding: 0 10px; /
}

.partFooter {
    flex: 1 1 250px;
    margin: 5px 0;
}

.partFooter h4 {
    color: #ff9966;
    font-size: 1rem;
    margin-bottom: 8px;
    border-bottom: 2px solid #ff9966;
    display: inline-block;
    padding-bottom: 3px;
}

.partFooter a {
    display: block;                    
    width: fit-content;                
    background: rgba(225, 225, 225, 0.08);
    border-radius: 20px;
    color: #ccc;
    text-decoration: none;
    margin-bottom: 6px;
    padding: 6px 12px;                 
    font-size: 0.85rem;
    transition: all 0.3s ease;
}

.partFooter a:hover {
    color: #ffb27a;
    background: rgba(255, 153, 102, 0.15);
    transform: translateX(3px);     
}
.contact {
    display: flex;                    
    align-items: center;
    gap: 8px;
    background: rgba(225, 225, 225, 0.08);
    border-radius: 20px;
    color: #ddd;
    margin-bottom: 6px;
    padding: 6px 12px;                 
    font-size: 0.85rem;
    width: fit-content;                 
    transition: background 0.3s ease;
}
.contact:hover {
    background: rgba(255, 153, 102, 0.15);
}
.contact i {
    font-size: 0.95rem;                 /* ícono más proporcionado */
}
.social-media {
    
    display: flex;
    gap: 10px;
    margin-top: 8px;
}

.social-media a {
    font-size: 1.2rem;
    color: #ccc;
    transition: color 0.3s ease, transform 0.2s ease;
}

.social-media a:hover {
    color: #ff9966;
    transform: translateY(-2px);
}

.copy {
    text-align: center;
    margin-top: 15px;
    font-size: 0.75rem;
    color: #888;
    border-top: 1px solid rgba(255, 150, 80, 0.3);
    padding-top: 8px;
}

/* Responsividad */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
        padding: 0 15px;
    }
    .social-media {
        justify-content: center;
    }
}

</style>
