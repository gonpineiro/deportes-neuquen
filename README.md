#### Formulario deporte

Sistema de registro de profesionales de deportes.

##### Levantar el proyecto

Instalación de dependencias:

1) `composer install`
2) `npm install`

Configuración de la base de datos

3) Ejecutar el `sql query` ubicado en el root, nombrado como `sql.sql`
4) Correr el seeder de `Actividades`
5) Correr el seeder de `Categorias`

<small> Los seeder se encuentran en `app/seeder` </small>
<small> Se recomienda ejecutar los seeder desde el `index.php` ubicado en el root </small>

##### Configuración del proyecto

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

Así se aprecia el árbol de los archivos.

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

##### Progreso del proyecto
Todo lo que es el formulario ya se encuentra concretado, falta terminar de desarrollar el panel admin.
