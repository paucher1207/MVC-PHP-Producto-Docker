# MVC-PHP-Producto-Docker

Este repositorio es un arquetipo para un proyecto de producto en PHP con arquitectura MVC, completamente dockerizado para facilitar el desarrollo y despliegue local. Incluye un servidor Apache con PHP, una base de datos MySQL y phpMyAdmin.

---

## Estructura del Proyecto


- **assets/**: Archivos estáticos (CSS, JS, imágenes)
- **config/**: Configuración de la aplicación
- **controller/**: Controladores PHP del patrón MVC
- **model/**: Modelos de datos y lógica de negocio
- **repository/**: Acceso y consultas a la base de datos
- **sql/**: Scripts de inicialización y migración de la base de datos
- **view/**: Vistas y plantillas HTML/PHP
- **.gitattributes, .htaccess**: Archivos de configuración
- **docker-compose**: Definición de servicios Docker Compose
- **Dockerfile**: Configuración del entorno PHP/Apache
- **index**: Entrada principal de la aplicación
- **README**: Documentación del proyecto

---

## Requisitos previos

- Docker Desktop (Windows/Mac) o Docker Engine (Linux) instalados.

---

## Servicios Incluidos

- **web:** Servidor Apache con PHP (puerto `8084`)
- **db:** MySQL 8.0 (puerto `3306`)
- **phpmyadmin:** Interfaz para administrar la base de datos (puerto `8085`)

Variables de entorno de la base de datos (definidas en `docker-compose.yml`):

- `MYSQL_DATABASE`: `products_db`
- `MYSQL_USER`: `usuario_app`
- `MYSQL_PASSWORD`: `clave_app`

---

## ¿Cómo levantar el entorno local?

1. Clona el repositorio:
   ```bash
   git clone <url-del-repositorio>
   cd MVC-PHP-Producto-Docker
   ```

2. Levanta los servicios:
   ```bash
   docker-compose up --build
   ```

3. Accede a:
   - Aplicación PHP: [http://localhost:8084](http://localhost:8084)
   - phpMyAdmin: [http://localhost:8085](http://localhost:8085)
     - Servidor: `db`
     - Usuario: `usuario_app` o `root`
     - Contraseña: `clave_app` o la contraseña de root

---

## Detener y limpiar completamente los servicios

Para detener todos los servicios y eliminar los volúmenes de datos (esto borra la base de datos y datos persistentes):

```bash
docker-compose down -v
```

El flag `-v` elimina también los volúmenes creados, asegurando que la próxima vez que levantes los servicios todo comenzará desde cero.

---

## Notas

- Los archivos del proyecto se sincronizan automáticamente con el contenedor vía volumen Docker.
- Puedes modificar la configuración de la base de datos editando las variables en el archivo `docker-compose.yml`.
- Si necesitas dependencias adicionales de PHP, agrégalas en el `Dockerfile`.
- El servicio `phpmyadmin` es útil para inspeccionar y administrar la base de datos durante el desarrollo.

---

## Licencia de uso

Contenido bajo licencia Creative Commons BY-NC-SA 4.0. Consulta LICENSE para detalles.

---

## Autor

Creado con 🎾 por **cgarcher** y **2DAW Hellín Tech**
