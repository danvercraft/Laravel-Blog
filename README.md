# Laravel-Blog

Una aplicación minimalista y funcional para gestionar tus finanzas personales.

## Características

- **Categorías Financieras (FinanceCategory):** Organiza tus finanzas creando categorías personalizadas para tus ingresos y gastos.
- **Registros Financieros (FinanceRegistry):** Lleva un control detallado de tus transacciones financieras, asociándolas a categorías específicas.
- **Interfaz Intuitiva:** Diseñada para ser fácil de usar y eficiente.
- **Escalable:** Construida con Laravel, lo que permite futuras expansiones y personalizaciones.

## Instalación

1. Clona este repositorio:
   ```bash
   git clone https://github.com/tu-usuario/Laravel-Blog.git
   ```
2. Instala las dependencias:
   ```bash
   composer install
   npm install
   ```
3. Configura el archivo `.env`:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
4. Configura tu base de datos en el archivo `.env` y ejecuta las migraciones:
   ```bash
   php artisan migrate
   ```

## Uso

1. Inicia el servidor de desarrollo:
   ```bash
   php artisan serve
   ```
2. Accede a la aplicación en tu navegador en `http://localhost:8000`.

## Contribuciones

¡Las contribuciones son bienvenidas! Si deseas colaborar, por favor abre un issue o envía un pull request.

## Licencia

Este proyecto está bajo la licencia MIT. Consulta el archivo `LICENSE` para más detalles.
