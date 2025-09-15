function mostrarAlertaRegistro(tipo, mensaje, redirect = null) {
    Swal.fire({
        icon: tipo,            // 'success', 'error', 'warning', 'info'
        title: mensaje,
        showConfirmButton: true,
        timer: tipo === 'success' ? 2500 : undefined,
    }).then(() => {
        if (redirect) {
            window.location.href = redirect;
        }
    });
}
