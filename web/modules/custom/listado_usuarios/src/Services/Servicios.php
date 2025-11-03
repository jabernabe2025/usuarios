<?php

namespace Drupal\listado_usuarios\Services;

// Importar la interfaz MessengerInterface para usar el servicio messenger.
use Drupal\Core\Messenger\MessengerInterface;


/**
 * Servicio personalizado para gestionar las consultas de usuarios.
 */
class Servicios
{

    // Propiedad para almacenar el servicio messenger.
    private $messenger;


    // Constructor que recibe el servicio messenger.
    public function __construct(MessengerInterface $messenger)
    {
        $this->messenger = $messenger;
    }


    /**
     * Obtiene una lista de usuarios simulada.
     */
    public function ObtieneUsuarios()
    {

        // Usar el servicio messenger para mostrar un mensaje.
        //$this->messenger->addMessage(t('Se ha llamado al servicio'));

        // Lista simulada de usuarios.
        $usuarios = [
            'usuarios' => [
                [
                    'id' => 1,
                    'email' => 'ana.martinez@example.com',
                    'name' => 'Ana',
                    'surname1' => 'Martínez',
                    'surname2' => 'Ruiz',
                ],
                [
                    'id' => 2,
                    'email' => 'carlos.gomez@example.com',
                    'name' => 'Carlos',
                    'surname1' => 'Gómez',
                    'surname2' => 'López',
                ],
                [
                    'id' => 3,
                    'email' => 'laura.santos@example.com',
                    'name' => 'Laura',
                    'surname1' => 'Santos',
                    'surname2' => 'Morales',
                ],
                [
                    'id' => 4,
                    'email' => 'diego.rodriguez@example.com',
                    'name' => 'Diego',
                    'surname1' => 'Rodríguez',
                    'surname2' => 'Fernández',
                ],
                [
                    'id' => 5,
                    'email' => 'marta.lopez@example.com',
                    'name' => 'Marta',
                    'surname1' => 'López',
                    'surname2' => 'Serrano',
                ],
                [
                    'id' => 6,
                    'email' => 'jorge.perez@example.com',
                    'name' => 'Jorge',
                    'surname1' => 'Pérez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 7,
                    'email' => 'elena.ramos@example.com',
                    'name' => 'Elena',
                    'surname1' => 'Ramos',
                    'surname2' => 'Iglesias',
                ],
                [
                    'id' => 8,
                    'email' => 'lucas.moreno@example.com',
                    'name' => 'Lucas',
                    'surname1' => 'Moreno',
                    'surname2' => 'García',
                ],
                [
                    'id' => 9,
                    'email' => 'sofia.vargas@example.com',
                    'name' => 'Sofía',
                    'surname1' => 'Vargas',
                    'surname2' => 'León',
                ],
                [
                    'id' => 10,
                    'email' => 'pablo.navarro@example.com',
                    'name' => 'Pablo',
                    'surname1' => 'Navarro',
                    'surname2' => 'Mendoza',
                ],
                [
                    'id' => 11,
                    'email' => 'laura.ortega@example.com',
                    'name' => 'Laura',
                    'surname1' => 'Ortega',
                    'surname2' => 'Campos',
                ],
                [
                    'id' => 12,
                    'email' => 'sergio.romero@example.com',
                    'name' => 'Sergio',
                    'surname1' => 'Romero',
                    'surname2' => 'Vega',
                ],
                [
                    'id' => 13,
                    'email' => 'natalia.mendez@example.com',
                    'name' => 'Natalia',
                    'surname1' => 'Méndez',
                    'surname2' => 'Jiménez',
                ],
                [
                    'id' => 14,
                    'email' => 'andres.silva@example.com',
                    'name' => 'Andrés',
                    'surname1' => 'Silva',
                    'surname2' => 'Paredes',
                ],
                [
                    'id' => 15,
                    'email' => 'marina.castro@example.com',
                    'name' => 'Marina',
                    'surname1' => 'Castro',
                    'surname2' => 'Blanco',
                ],
                [
                    'id' => 16,
                    'email' => 'javier.reyes@example.com',
                    'name' => 'Javier',
                    'surname1' => 'Reyes',
                    'surname2' => 'Domínguez',
                ],
                [
                    'id' => 17,
                    'email' => 'carla.fernandez@example.com',
                    'name' => 'Carla',
                    'surname1' => 'Fernández',
                    'surname2' => 'González',
                ],
                [
                    'id' => 18,
                    'email' => 'daniel.martin@example.com',
                    'name' => 'Daniel',
                    'surname1' => 'Martín',
                    'surname2' => 'Herrera',
                ],
                [
                    'id' => 19,
                    'email' => 'isabel.torres@example.com',
                    'name' => 'Isabel',
                    'surname1' => 'Torres',
                    'surname2' => 'Pérez',
                ],
                [
                    'id' => 20,
                    'email' => 'ruben.sanchez@example.com',
                    'name' => 'Rubén',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Núñez',
                ],
                [
                    'id' => 21,
                    'email' => 'ruben.sancast1@example.com',
                    'name' => 'José',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 22,
                    'email' => 'ruben.sancast2@example.com',
                    'name' => 'María',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 23,
                    'email' => 'ruben.sancast3@example.com',
                    'name' => 'Luis',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 24,
                    'email' => 'ruben.sancast4@example.com',
                    'name' => 'Ana',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 25,
                    'email' => 'ruben.sancast5@example.com',
                    'name' => 'Lucía',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 26,
                    'email' => 'ruben.sancast6@example.com',
                    'name' => 'Miguel',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
                [
                    'id' => 27,
                    'email' => 'ruben.sancast7@example.com',
                    'name' => 'Carmen',
                    'surname1' => 'Sánchez',
                    'surname2' => 'Castillo',
                ],
            ],
        ];

        return $usuarios;
    }
}
