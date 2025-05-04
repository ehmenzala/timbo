# Base MVC para Proyectos Web

Esta base se ha desarrollado con el objetivo de ser agnóstica al tipo de proyecto que se desarrolla con ella. Al usar el patrón de diseño MVC para la organización de sus módulos, hace posible su migración a cualquier otro lenguaje de programación si fuese necesario por un requerimiento externo.

## Componentes de Configuración

**Archivos y Carpetas:**

- `/Router.php`: Enrutamiento para rutas amigables y para garantizar la seguridad de las rutas que no deben visualizarse.
- `/index.php`: Archivo en que se configuran las rutas y controladores, junto con la conexión a la base de datos.
- `.htaccess`: Configuración del servidor Apache a nivel local. Esta configuración redirige todas las peticiones realizadas hacia `index.php`, para verificar la ruta y el método HTTP en el cuerpo de la petición.
- `/public/`: Conjunto de archivos públicos que es necesario mostrar al usuario. Estos archivos incluyen archivos JavaScript, CSS, imágenes y librerías (Etiquetadas en cada carpeta bajo el directorio `vendor`).
- `/app/`: Código fuente de la aplicación.
- `/app/partials/:` Archivos parciales (Header, footer, navbar) que son incluidos en otras vistas PHP.
- `/app/views/:` Las vistas son las interfaces visuales en que se muestra la información pertinente.
- `/app/repositories/:` Los repositorios contienen lógica de acceso a los datos.
- `/app/controllers/:` Los controladores orquestan la interacción entre vistas y el modelo de datos.

**Librerías:**

- Esta base usa [Íconos de Font Awesome](https://fontawesome.com/), y se incluye como script al incio del marcado de todas las vistas.
- Se hace uso de la [plantilla AdminLTE](https://adminlte.io/) en todas las vistas desarrolladas. Si se desarrolla una aplicación dentro de Donna, es recomendable usar la plantilla para garantizar la consistencia visual en toda la plataforma.

## Buenas Prácticas

- Se han tomado en consideración las [Guías de Estándares de PHP](https://phptherightway.com/)
- En esencia, las directrices de nomenclatura para esta base son las siguientes:
  - Código fuente y comentarios de documentación en inglés. Esto, con el objetivo de reducir la carga cognitiva de desarrollar en dos idiomas diferentes al mismo tiempo.
  - `camelCase` para nombres de variables.
  - `SCREAMING_SNAKE_CASE` para nombres de variables constantes.
  - `UpperCamelCase` para nombramiento de clases.

## Acknowledgements

Developed by [Esteban Huaman](https://github.com/ehmenzala).
