(function ($) {

    // Manejar el clic en los botones de paginación
    $(".btn-pagina").click(function (e) {
        let pagina = $(this).attr('data-pagina');
        enviarPeticionAjax(pagina); // Reiniciar a página 1
    });

    // Manejar el envío del formulario de búsqueda
    $("#user-search").submit(function (e) {
        e.preventDefault();

        enviarPeticionAjax(1); // Reiniciar a página 1
    });


    // Función para enviar la petición AJAX
    function enviarPeticionAjax(pagina) {

        // Tomar los valores del formulario
        const data = {
            pagina: pagina,
            nombre: $('input[name="nombre"]').val(),
            apellidos: $('input[name="apellidos"]').val(),
            correo: $('input[name="email"]').val(),
        };
        $.ajax({
            url: Drupal.url('listado-usuarios/ajax'),
            type: 'POST',
            data: data,
            success: function (response) {
                // Reemplazar el bloque de la lista con el nuevo HTML
                $('#usuarios-lista').html(response);

                // alert(JSON.stringify(response));
                actualizarDatos(response);
            },
            error: function (xhr) {
                console.error('Error AJAX:', xhr.responseText);
            }
        });
    }

    // Función para actualizar la tabla y el paginador
    function actualizarDatos(response) {

        // Actualizar tabla de usuarios
        const tbody = document.querySelector('#tabla-usuarios tbody');
        tbody.innerHTML = '';
        response.usuarios.forEach(u => {
            const fila = `
        <tr>
          <td>${u.id}</td>
          <td>${u.name}</td>
          <td>${u.surname1}</td>
          <td>${u.surname2}</td>
          <td>${u.email}</td>
        </tr>`;
            tbody.insertAdjacentHTML('beforeend', fila);
        });


        // Actualizar paginador
        const paginador = document.querySelector('#paginador');
        paginador.innerHTML = `
      <p>Página ${response.pagina_actual} de ${response.total_paginas}</p>
      <div class="botones">
        ${Array.from({ length: response.total_paginas }, (_, i) => {
            const num = i + 1;
            const active = num === response.pagina_actual ? 'style="font-weight:bold;"' : '';
            return `<button class="btn-pagina" data-pagina="${num}" ${active}>${num}</button>`;
        }).join('')}
      </div>
    `;

        // Reasignar eventos a los nuevos botones de paginación
        $(".btn-pagina").off('click').on('click', function (e) {
            let pagina = $(this).attr('data-pagina');
            enviarPeticionAjax(pagina);
        });
    }

})(jQuery);
