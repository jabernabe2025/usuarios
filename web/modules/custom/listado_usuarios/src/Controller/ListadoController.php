<?php

// namespace compuesto por Drupal + nombre del módulo + carpeta dentro de src.
namespace Drupal\listado_usuarios\Controller;

// Clase base para controladores en Drupal.
use Drupal\Core\Controller\ControllerBase;
use Drupal\listado_usuarios\Services\Servicios;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

use Symfony\Component\HttpFoundation\Request;

// Definición de la clase del controlador.
class ListadoController extends ControllerBase
{
    // Propiedad para almacenar el servicio.
    private $servicios;

    // Constructor que recibe el servicio.
    public function __construct(Servicios $servicios)
    {
        $this->servicios = $servicios;
    }

    // Método estático para la creación del controlador con inyección de dependencias.
    public static function create($container)
    {
        return new static(
            $container->get('listado_usuarios.servicios')
        );
    }

    // Método para mostrar la lista de usuarios.
    public function listaUsuarios()
    {

        // Obtener todos los usuarios.
        $data = $this->servicios->ObtieneUsuarios();

        // Extraer el array de usuarios.
        $usuarios = $data['usuarios'];

        // Parámetros de paginación manual.
        $items_por_pagina = 5;
        $total_usuarios = count($usuarios);

        // Calcular total de páginas.
        $total_paginas = ceil($total_usuarios / $items_por_pagina);

        // Tomar solo los 5 primeros (página 1).
        $usuarios_pagina = array_slice($usuarios, 0, $items_por_pagina);

        return [
            '#theme' => 'mi_plantilla',
            '#data' => $usuarios_pagina,
            '#total_paginas' => $total_paginas,
            '#pagina_actual' => 1,
            '#total_usuarios' => $total_usuarios,
            '#cache' => ['max-age' => 0],
        ];
    }

    // Método para manejar la solicitud AJAX y devolver la lista filtrada y paginada.
    public function listaUsuariosAjax()
    {
        // Obtener parámetros POST.
        $request = \Drupal::request();
        $pagina = (int) $request->request->get('pagina', 1);
        $nombre = trim($request->request->get('nombre', ''));
        $apellidos = trim($request->request->get('apellidos', ''));
        $correo = trim($request->request->get('correo', ''));

        // Obtener todos los usuarios.
        $data = $this->servicios->ObtieneUsuarios();
        $usuarios = $data['usuarios'];

        // Filtrar según los valores recibidos.
        $usuarios_filtrados = array_filter($usuarios, function ($u) use ($nombre, $apellidos, $correo) {
            return (!$nombre || stripos($u['name'], $nombre) !== FALSE)
                && (!$apellidos || stripos($u['surname1'] . ' ' . $u['surname2'], $apellidos) !== FALSE)
                && (!$correo || stripos($u['email'], $correo) !== FALSE);
        });

        // Paginación manual.
        $items_por_pagina = 5;
        $total_usuarios = count($usuarios_filtrados);
        $total_paginas = ceil($total_usuarios / $items_por_pagina);
        $offset = ($pagina - 1) * $items_por_pagina;
        $usuarios_pagina = array_slice($usuarios_filtrados, $offset, $items_por_pagina);

        return new JsonResponse([
            'usuarios' => array_values($usuarios_pagina), // array_values para reindexar
            'pagina_actual' => $pagina,
            'total_paginas' => $total_paginas,
        ]);

        // Devolver solo el HTML de la lista.
        // return [
        //    '#theme' => 'mi_plantilla',
        //     '#data' => $usuarios_pagina,
        //    '#total_paginas' => $total_paginas,
        //    '#pagina_actual' => $pagina,
        //     '#total_usuarios' => $total_usuarios,
        //     '#cache' => ['max-age' => 0],
        // ];
    }
}
