const API_COMPETIDORES = "http://localhost/club-esgrima/backend/api/competidores.php";
const API_COMPETENCIAS = "http://localhost/club-esgrima/backend/api/competencias.php";

// ====== CARGAR COMPETIDORES ======
async function cargarCompetidores() {
    const res = await fetch(API_COMPETIDORES);
    const datos = await res.json();

    // Tabla
    document.querySelector("#tablaCompetidores tbody").innerHTML = datos.map(c => `
        <tr>
            <td>${c.nombre}</td>
            <td>${c.apellido}</td>
            <td>${c.categoria}</td>
            <td>${c.arma}</td>
            <td>${c.mano}</td>
        </tr>
    `).join("");

    // Select en Competencias
    document.getElementById("competidor_id").innerHTML =
        datos.map(c => `<option value="${c.id}">${c.nombre} ${c.apellido}</option>`).join("");
}

// ====== CARGAR COMPETENCIAS ======
async function cargarCompetencias() {
    const res = await fetch(API_COMPETENCIAS);
    const datos = await res.json();

    document.querySelector("#tablaCompetencias tbody").innerHTML = datos.map(c => `
        <tr>
            <td>${c.competidor}</td>
            <td>${c.nombre}</td>
            <td>${c.fecha}</td>
            <td>${c.resultado}</td>
            <td>${c.tipo}</td>
        </tr>
    `).join("");
}

// ====== AGREGAR COMPETIDOR ======
document.getElementById("formCompetidor").addEventListener("submit", async e => {
    e.preventDefault();
    const nuevo = {
        nombre: document.getElementById("nombre").value,
        apellido: document.getElementById("apellido").value,
        vi: document.getElementById("vi").value,
        fechaNacimiento: document.getElementById("fechaNacimiento").value,
        categoria: document.getElementById("categoria").value,
        arma: document.getElementById("arma").value,
        mano: document.getElementById("mano").value
    };
    await fetch(API_COMPETIDORES, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(nuevo)
    });
    document.getElementById("formCompetidor").reset();
    cargarCompetidores();
});

// ====== AGREGAR COMPETENCIA ======
document.getElementById("formCompetencia").addEventListener("submit", async e => {
    e.preventDefault();
    const nueva = {
        competidor_id: document.getElementById("competidor_id").value,
        nombre: document.getElementById("nombre_comp").value,
        fecha: document.getElementById("fecha_comp").value,
        gano: parseInt(document.getElementById("gano").value),
        tipo: document.getElementById("tipo").value
    };
    await fetch(API_COMPETENCIAS, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(nueva)
    });
    document.getElementById("formCompetencia").reset();
    cargarCompetencias();
});

// Inicialización
cargarCompetidores();
cargarCompetencias();
