# Proyecto Drupal con DDEV

Este proyecto es una instalación de **Drupal** configurada con **DDEV**, preparada para ser clonada, levantada y probada fácilmente.

---

## Requisitos previos

Antes de comenzar, asegúrate de tener instalado en tu sistema:

- [Docker Desktop](https://www.docker.com/products/docker-desktop/)
- [DDEV](https://ddev.readthedocs.io/en/stable/)

---

## Instalación y despliegue

Sigue estos pasos para clonar e iniciar el proyecto en tu entorno local.

### 1 Clonar el repositorio


git clone https://github.com/jabernabe2025/usuarios.git

cd tu_proyecto

ddev start


### 2 Importar la base de datos

ddev import-db --src=BBDD/db.sql.gz

### 3 Acceder al sitio

ddev launch

### 4 Credenciales de acceso

Usuario: admin
Contraseña: admin

### 5 Verificar el entorno

ddev describe





