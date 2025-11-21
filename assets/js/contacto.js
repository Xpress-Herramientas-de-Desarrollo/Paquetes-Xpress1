document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formContacto');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); // Evita recargar la página
        const nombre = document.getElementById('nombre').value;
        const correo = document.getElementById('correo').value;
        const mensaje = document.getElementById('mensaje').value;

        Swal.fire({
            icon: 'success',
            title: '¡Mensaje enviado!',
            html: `
                <p><strong>Nombre:</strong> ${nombre}</p>
                <p><strong>Correo:</strong> ${correo}</p>
                <p><strong>Mensaje:</strong> ${mensaje}</p>
            `,
            confirmButtonColor: '#ff7947'
        });

        form.reset();
    });
});
