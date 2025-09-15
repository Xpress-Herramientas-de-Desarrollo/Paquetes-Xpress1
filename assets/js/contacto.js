document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('formContacto');

    form.addEventListener('submit', function(e) {
        e.preventDefault(); 

        const nombre = document.getElementById('nombre').value.trim();

        if (nombre === "") return; 

        Swal.fire({
            icon: 'success',
            title: `¡Mensaje enviado, ${nombre}!`,
            text: 'Gracias por contactarnos, responderemos pronto.',
            confirmButtonColor: '#ff7947'
        });

        form.reset();
    });
});
