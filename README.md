# Proyecto WEB APP - BACK END

Este es una API desarrollada con Laravel. A continuación, se detallan los pasos para instalar y poner en marcha el proyecto.

## Requisitos

-   PHP >= 8.2
-   Laravel 11
-   Composer 2
-   Git

## Instalación

1.  **Clonar el repositorio**

    ```bash
    git clone https://github.com/shirleymq/web-app-back-end.git
    cd web-app-back-end
    ```

2.  **Instalar dependencias**

    ```bash
    composer install
    ```

3.  **Configurar el entorno**

    ```bash
    cp .env.example .env
    ```

4.  **Generar la clave de la aplicación**

    ```bash
    php artisan key:generate
    ```

5.  **Levantar el servidor de desarrollo**

    ```bash
    php artisan serve
    ```

    La api estará disponible en http://localhost:8000/api para ser consumida desde el frontend.

## Tests

Para ejecutar los tests, use el siguiente comando:

```bash
php artisan test
```
