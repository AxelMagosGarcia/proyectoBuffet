<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido Jorge</title>
    <link rel="stylesheet" href="estilos.css">
    <script src="script.js" defer></script>
</head>
<body>

    <!-- Encabezado -->
    <header>
        <div class="logo">
            <img src="Logo.jpg" alt="Logo">
        </div>
        <h1>BIENVENIDO JORE</h1>
    </header>

    <!-- Menú -->
    <nav>
        <ul>
            <li><a href="#home" class="menu-link">HOME</a></li>
            <li><a href="#servicios" class="menu-link">SERVICIOS</a></li>
            <li><a href="#contacto" class="menu-link">CONTACTO</a></li>
            <li><a href="#nosotros" class="menu-link">NOSOTROS</a></li>
        </ul>
    </nav>

<!-- SECCIÓN HOME -->
<section id="home" class="seccion">
    <h2>Inicio</h2>
    <div class="imagenes" id="carousel"></div>
</section>

<style>
.imagenes {
    position: relative;
    width: 100%;
    height: 260px;
    overflow: hidden;
    border-radius: 10px;
}

.card {
    position: absolute;
    top: 0;
    left: 100%;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: all 0.6s ease;
    cursor: pointer;
    text-align: center;
}

.card.activa {
    left: 0;
    opacity: 1;
}

.card .imagen {
    width: 100%;
    height: 200px;
    overflow: hidden;
}

.card img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.card p {
    margin: 10px 0;
    font-weight: bold;
    font-size: 18px;
    background: #fff;
    padding: 5px 0;
    border-top: 2px solid #ddd;
}
</style>

<script>
// Datos del carrusel
const imagenes = [
    {src: "images/Derecho Familiar.jpg", titulo: "Familiar"},
    {src: "images/Derecho Civil.jpg", titulo: "Civil"},
    {src: "images/Mercantil.jpg", titulo: "Mercantil"},
    {src: "images/Sucesorio.jpg", titulo: "Sucesorio"},
    {src: "images/amparo.jpg", titulo: "Amparo"}
];

// Crear las tarjetas del carrusel
const carousel = document.getElementById("carousel");
imagenes.forEach((img, index) => {
    const card = document.createElement("div");
    card.className = "card";
    card.innerHTML = `
        <div class="imagen"><img src="${img.src}" alt="${img.titulo}"></div>
        <p>${img.titulo}</p>
    `;
    card.onclick = () => mostrarServicio(img.titulo);
    carousel.appendChild(card);
});

const cards = document.querySelectorAll(".card");
let indice = 0;

// Función para mostrar la imagen activa
function mostrarImagen(index) {
    cards.forEach(c => c.classList.remove("activa"));
    cards[index].classList.add("activa");
}

// Inicializa el carrusel
mostrarImagen(indice);

// Cambia de imagen automáticamente al pasar el mouse
let intervalo;
carousel.addEventListener("mouseenter", () => {
    intervalo = setInterval(() => {
        indice = (indice + 1) % cards.length;
        mostrarImagen(indice);
    }, 2000);
});

carousel.addEventListener("mouseleave", () => clearInterval(intervalo));

// Mostrar servicio correspondiente
function mostrarServicio(tipo) {
    const seccion = document.getElementById("servicios");
    seccion.scrollIntoView({behavior: "smooth"});

    // Ocultar todo el contenido
    document.querySelectorAll(".bloque-servicio").forEach(b => b.style.display = "none");

    // Mostrar solo el servicio seleccionado
    const bloque = document.getElementById(`serv-${tipo.toLowerCase()}`);
    if (bloque) bloque.style.display = "block";
}
</script>

<!-- SECCIÓN SERVICIOS -->
<section id="servicios" class="seccion">
    <h2>Servicios</h2>

    <div class="contenedor-servicios">
        <div class="card-servicio" onclick="window.location.href='familiar.html'">
            <img src="images/Derecho Familiar.jpg" alt="Derecho Familiar">
            <div class="overlay">
                <h3>Derecho Familiar</h3>
                <p>Juicios, Divorcios, Alimentos, Custodia y más.</p>
            </div>
        </div>

        <div class="card-servicio" onclick="window.location.href='civil.html'">
            <img src="images/Derecho Civil.jpg" alt="Derecho Civil">
            <div class="overlay">
                <h3>Derecho Civil</h3>
                <p>Contratos, Hipotecas, Propiedad, Desahucio.</p>
            </div>
        </div>

        <div class="card-servicio" onclick="window.location.href='mercantil.html'">
            <img src="images/Mercantil.jpg" alt="Derecho Mercantil">
            <div class="overlay">
                <h3>Derecho Mercantil</h3>
                <p>Ejecutivos, Medios Preparatorios, Juicios Ordinarios.</p>
            </div>
        </div>

        <div class="card-servicio" onclick="window.location.href='sucesorio.html'">
            <img src="images/Sucesorio.jpg" alt="Derecho Sucesorio">
            <div class="overlay">
                <h3>Derecho Sucesorio</h3>
                <p>Sucesiones testamentarias e intestamentarias.</p>
            </div>
        </div>

        <div class="card-servicio" onclick="window.location.href='amparo.html'">
            <img src="images/amparo.jpg" alt="Amparo">
            <div class="overlay">
                <h3>Amparo</h3>
                <p>Juicios de amparo directo e indirecto.</p>
            </div>
        </div>
    </div>
</section>

<!-- ESTILOS -->
<style>
#servicios {
    background-color: #0b0b0b;
    color: white;
    text-align: center;
    padding: 50px 0;
}

#servicios h2 {
    font-size: 2em;
    margin-bottom: 30px;
    color: #00b894;
    text-transform: uppercase;
}

.contenedor-servicios {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    max-width: 1200px;
    margin: auto;
}

.card-servicio {
    position: relative;
    width: 300px;
    height: 200px;
    border: 1px dashed #444;
    border-radius: 10px;
    overflow: hidden;
    cursor: pointer;
    transition: transform 0.4s ease, box-shadow 0.4s ease;
}

.card-servicio img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    filter: brightness(70%);
    transition: all 0.4s ease;
}

.card-servicio:hover img {
    filter: brightness(40%);
    transform: scale(1.05);
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    color: #fff;
    background: rgba(0, 0, 0, 0.4);
    transition: background 0.3s ease;
}

.overlay h3 {
    font-size: 1.2em;
    font-weight: bold;
    color: #00b894;
    margin-bottom: 5px;
}

.overlay p {
    font-size: 0.9em;
    width: 80%;
}
</style>


    <!-- Sección CONTACTO -->
    <section id="contacto" class="seccion contacto">
        <h2>Contacto</h2>
        <p> Comunícate con nosotros a través de los siguientes medios:</p>
        <div class="contacto-info">
            <p>📞 <strong>Teléfono:</strong> <a href="tel:7779731521">7779731521</a></p><p>✉️ <strong>Correo:</strong> 
    <a href="correo:licenciada.vivianagomez@gmail.com">licenciada.vivianagomez@gmail.com</a>
</p>

        <a class="whatsapp-btn" href="https://wa.me/7779731521" target="_blank">
            💬 Enviar mensaje por WhatsApp
        </a>
    </section>

<!-- Sección NOSOTROS -->
<section id="nosotros" class="seccion">
    <h2>Nosotros</h2>
    <p>
        ⚖️ <strong>Misión</strong><br><br>
        Prestar a nuestros clientes servicios jurídicos especializados y de calidad en diferentes ramas del derecho, 
        satisfaciendo siempre sus necesidades específicas, protegiendo sus derechos e intereses, 
        procurando integridad y equidad, promoviendo la justicia y el orden social. 
        Brindamos asesoría y representación legal ética, profesional, humana, transparente, comprensible, eficiente 
        y con la máxima confidencialidad, orientada a proteger los derechos personales y económicos de cada cliente. 
        Ofrecemos soluciones jurídicas efectivas, eficientes y accesibles, que proporcionen tranquilidad y certeza jurídica 
        durante los procesos legales para resolver los complejos desafíos a los que se enfrentan los clientes, 
        actuando siempre con diligencia y conforme a la ley.
    </p>

    <p style="margin-top: 20px;">
        🌟 <strong>Visión</strong><br><br>
        Consolidarnos en un modelo de profesionalismo y difusión de valores éticos, reconocidos por la calidad y responsabilidad de nuestros servicios, 
        nuestra honestidad, eficiencia y cercanía con las personas, consiguiendo siempre los mejores resultados posibles para nuestros clientes. 
        Contribuimos al acceso a la justicia y al fortalecimiento de la confianza en el ejercicio del derecho, 
        ya sea mediante acuerdos o procesos judiciales, construyendo relaciones de confianza duraderas con los clientes 
        basadas en la probidad y la eficiencia. Contribuimos activamente a una sociedad más justa, inclusiva y equitativa, 
        adaptándonos a las nuevas circunstancias y problemas que surjan en la sociedad y los negocios, 
        ofreciendo siempre soluciones innovadoras.
    </p>
</section>

</body>
</html>


