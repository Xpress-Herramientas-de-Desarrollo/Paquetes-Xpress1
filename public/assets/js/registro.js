function mostrarAlertaRegistro(tipo, mensaje, redirect = null) { 
    Swal.fire({
        icon: tipo,            
        title: tipo === 'success' ? '¡Éxito!' : 'Error',
        text: mensaje,
        showConfirmButton: true,
        timer: tipo === 'success' ? 2500 : undefined,
    }).then(() => {
        if (redirect) {
            window.location.href = redirect;
        }
    });
}
