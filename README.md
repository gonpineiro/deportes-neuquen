## Formulario deporte

Sistema de registro de profesionales de deportes.

### Levantar el proyecto

<b>Instalación de dependencias:</b>

1) `composer install`
2) `npm install`

<b>Configuración de la base de datos</b>

3) Ejecutar el `sql query` ubicado en el root, nombrado como `sql.sql`
4) Correr el seeder de `Actividades`
5) Correr el seeder de `Categorias`

<small> Los seeder se encuentran en `app/seeder` </small>
<small> Se recomienda ejecutar los seeder desde el `index.php` ubicado en el root </small>

### Configuración del proyecto

Se debe configurar el `.env` ubicado en el root del proyecto
Las varibles mas importes son:

nombre              | detalle
-------             |--------
PROD                | Indica si el proyecto se encuentra en entorno desarllo o producción: `true | false`
*PATH_FILE_LOCAL     | Indica si los archivos del formulario se guarda en local o produccion: `true | false`

* Si `PATH_FILE_LOCAL` se configura en `true` los archivos se guardan en `/projects_files/formulario_deportes/`
* Si `PATH_FILE_LOCAL` se configura en `false` los archivos se guardan en `//storage2/DataServer/produccion/formulario_deportes/`

El sistema genera una carpeta con el número del formulario, `idFormulario/`, dentro de dicha se van a guardar, en cualquier formato de imagen aceptable, `antecedentes.jpeg` y `recibo.jpeg`.
También por cada `idFormulario` va generar dos nuevas carpetas `titulos/` y `trabajos/`
En `titulos/` va guardar, en formato de imagen, los títulos subidos por el usuario con el siguiente formato: `titulo_n.ext` (n representa el número del archivo para que no se pisen)
En `trabajos/` va guardar, en formato de imagen, documentos relacionados con los trabajos subidos por el usuario con el siguiente formato: `n.ext` (n representa el número del archivo para que no se pisen).

<b>Así se aprecia el árbol de los archivos.</b>

```tree
────formulario_deportes/
    └───idFormulario/
        ├───titulos/
        │   ├───titulo_1.jpeg
        │   ├───titulo_2.jpeg
        │   └───titulo_n.jpeg
        ├───trabajos/
        │   ├───0.png
        │   ├───1.jpeg
        │   └───n.jpeg
        ├───antecedentes.jpeg
        └───recibo.png
```

### Flujo de estados en la creación de una solicitud

<b>Estados del lado del usuario</b>

1) Cuando un usuario decide generar una solicitud nueva, el primer formulario que muestra es el de los `Datos Personales`
2) Luego de completar los `Datos Personales` se crea la solicitud con estado `Titulos` - `id 1`
3) El estado `Titulos` permite al usuario cargar varios archivos certificando los títulos que tiene, una vez completado se cambia el estado a `Trabajos` - `id 2`
4) El estado `Trabajos` permite al usuario cargar varios archivos certificando los trabajos que tiene, una vez completado se cambia el estado a `Actividades` - `id 3`
5) El estado `Actividades` permite al usuario cargar varias actividades ya establecidas de la tabla `actividades`, una vez completado se cambia el estado a `Condiciones` - `id 4`
6) El estado `Condiciones` permite al usuario revisar todos los datos cargados antes de enviar la solicitud, cuando se envía se cambia a estado `Nuevo` - `id 6`
7) El usuario en cada momento, menos en `Datos Personales` puede reiniciar la carga, lo que hace es cambiar el estado de la solicitud a `Cancelado` - `id 11`, no borra la solicitud.

<b>Estados del lado del administrador</b>

<small> La idea de cómo se debe gestionar las solicitudes de los usuario, es que, permita aprobar o rechazar cierta información de manera independiente, como por ejemplo aprobar 3 de 5 títulos o 2 de 5 trabajos, pero puede aprobar la solicitud -  Esto se explica más adelante el funcionamiento, cada título y trabajo cargado maneja su propio estado</small>

1) Cuando se obtiene una solicitud en estado `Nuevo` - `id 6` el administrador lo puede aprobar `Aprobado` - `id 8` o rechazar `Rechazado` - `id 7`
2) Si el estado se encuentra `Rechazado` el usuario deberá crear toda una solicitud nueva. No podrá recupera lo cargado.
3) Cuando se realice la impresión del carnet se debe cambiar a estado `Impreso` - `id 9`
4) Cuando se realice el retiro del carnet se debe cambiar a estado `Retirado` - `id 10`

<b>Estados del `titulos` y `trabajos`</b>

Cada título y cada trabajo manejan su propio estado como:

1) `null` Cuando se creó la solicitud en estado `Nuevo` - `id 6`
2) Cuando el administrador aprobó el titulo/trabajo  `Aprobado`
3) Cuando el administrador rechazo el titulo/trabajo `Rechazado`

<small>Cuando una solicitud se aprobó correctamente y tiene cierta información en estado Rechazado, al momento de generar otra solicitud (cuando se vence) durante la carga el usuario puede visualizar los títulos y trabajos aprobados sin la necesidad de cargarlos nuevamente</small>


### Progreso del proyecto
Todo lo que es el formulario ya se encuentra concretado, falta terminar de desarrollar el panel admin.
