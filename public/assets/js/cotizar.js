document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formCotizacion');
    const resultadoDiv = document.getElementById('resultado');

    form.addEventListener('submit', function(e) {
        e.preventDefault();

        const origen = document.getElementById('origen').value.trim();
        const destino = document.getElementById('destino').value.trim();
        const peso = parseFloat(document.getElementById('peso').value);

        if (!origen || !destino || isNaN(peso) || peso <= 0) {
            resultadoDiv.innerHTML = `
                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-lg">
                    Por favor, completa todos los campos correctamente.
                </div>
            `;
            return;
        }

        const tarifa = (10 + (peso * 2.5)).toFixed(2);

        resultadoDiv.innerHTML = `
            <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg">
                <strong class="block mb-2">Cotización Generada:</strong>
                <p>Origen: <span>${origen}</span></p>
                <p>Destino: <span>${destino}</span></p>
                <p>Peso: <span>${peso} kg</span></p>
                <p class="font-semibold mt-2">Total estimado: S/. ${tarifa}</p>
            </div>
        `;
    });
});
