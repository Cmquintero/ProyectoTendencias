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
            <a href="https://ufpso.edu.co/" target="_blank">UPFSO</a>
            <a href="https://fullstackopen.com/es/" target="_blank">Full Stack</a>
            <a href="https://www.sena.edu.co/es-co/Paginas/default.aspx" target="_blank">SENA</a>
        </div>

        <div class="partFooter">
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
</footer>

<style>
footer {
    width: 100%;
    background: rgba(0, 0, 0, 0.8);
    backdrop-filter: blur(10px);
    color: #fff;
    padding: 40px 20px 20px;
    margin-top: 60px;
    border-top: 2px solid rgba(255, 0, 255, 0.4);
    box-shadow: 0 -4px 20px rgba(255, 0, 255, 0.2);
    animation: fadeIn 1.5s ease;
}

.footer-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    text-align: left;
    max-width: 1100px;
    margin: auto;
}

.partFooter {
    flex: 1 1 250px;
    margin: 10px;
}

.partFooter h4 {
    color: #ff00ff;
    font-size: 1.3rem;
    margin-bottom: 15px;
    border-bottom: 2px solid #ff00ff;
    display: inline-block;
    padding-bottom: 5px;
}

.partFooter a {
    display: block;
    color: #cccccc;
    text-decoration: none;
    margin-bottom: 8px;
    transition: color 0.3s ease;
}

.partFooter a:hover {
    color: #ff00ff;
}

.contact {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #ddd;
    margin-bottom: 8px;
}

.social-media a {
    margin-right: 10px;
    font-size: 1.5rem;
    color: #fff;
    transition: transform 0.3s ease, color 0.3s ease;
}

.social-media a:hover {
    color: #ff00ff;
    transform: scale(1.2);
}

.copy {
    text-align: center;
    margin-top: 25px;
    font-size: 0.9rem;
    color: #aaa;
    border-top: 1px solid rgba(255, 0, 255, 0.2);
    padding-top: 15px;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Adaptable a pantallas pequeñas */
@media (max-width: 768px) {
    .footer-container {
        flex-direction: column;
        text-align: center;
    }
    .partFooter {
        margin-bottom: 20px;
    }
}
</style>
