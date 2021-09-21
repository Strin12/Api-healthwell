# Documentacion del Api del proyecto
- El Api fue creado para un sistema de control para pacientes con hipertensión con el fin de mejorar la calidad de vida del paciente.

# Extensiones externas que se usaron para su desarrollo
- https://www.nigmacode.com/laravel/jwt-en-laravel/  ---> Usado para la creacion de Token y metodo de autenticacion protegiendo rutas donde ningun usuario pueda acceder a la informacion si no ha sido validado.

- https://github.com/webpatser/laravel-uuid --> Usado para la generacion del UUID como forma de consultar informacion mediante un UUID unico generado para cada dato insertado.
Nota: En el archivo app.php dentro de "aliases" se debe insertar la siguiente linea:
        'Uuid' => Webpatser\Uuid\Uuid::class,

- https://github.com/ARCANEDEV/LogViewer/blob/master/_docs/1.Installation-and-Setup.md --> Usado para
la instalacion de los logs en laravel

- https://github.com/jenssegers/laravel-mongodb ---> usado para instalar la extension disponible para hacer uso de mongoDB en laravel.

- http://www.fpdf.org/ --> Usado para verificar el uso de la libreria FPDF documentacion para la creacion de PDFS con informacion.

# Estructura del proyecto
- Este proyecto esta estructurado por la arquitectura modelo vista controlador
- Se usaron repositorios como capa intermedia entre el modelo y el controlador para una mejor seguridad en caso de que un dato falle.

