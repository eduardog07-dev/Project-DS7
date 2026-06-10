# Project-DS7

# Credenciales del Proyecto Final - DS7
Administrador
Email: admin@ds7.com
pass: admin123
Usuario
Email: alejandro@test.com
pass:12345


# Roadmap del Proyecto Final - DS7

La aplicacion debe aplicar lo visto en el semestre:

- PHP puro con patron MVC.
- HTML5, CSS3 y JavaScript.
- MySQL con PDO y consultas preparadas.
- Sesiones y cookies.
- Seguridad con validacion, sanitizacion, roles y pruebas.
- Intercambio de datos mediante XML y JSON.
- Arquitectura organizada por carpetas.

## 2. Criterios de evaluacion del enunciado

Esto significa que el proyecto no solo debe "funcionar"; tambien debe demostrar seguridad, control de accesos, validacion de entradas y evidencia de pruebas.

## 3. Estructura base del proyecto

```text
proyecto/
|-- index.php
|-- database.sql
|-- config/
|   |-- conexion.php
|-- modelo/
|   |-- Usuario.php
|   |-- Pelicula.php
|   |-- Genero.php
|   |-- Preferencia.php
|   |-- Historial.php
|   |-- Calificacion.php
|-- controlador/
|   |-- AuthController.php
|   |-- PeliculaController.php
|   |-- AdminController.php
|   |-- RecomendacionController.php
|-- vistas/
|   |-- home.php
|   |-- login.php
|   |-- registro.php
|   |-- admin/
|   |   |-- dashboard.php
|   |   |-- listar.php
|   |   |-- crear.php
|   |   |-- editar.php
|   |   |-- reportes.php
|   |-- usuario/
|       |-- preferencias.php
|       |-- recomendaciones.php
|       |-- perfil.php
|       |-- detalle.php
|-- webservices/
|   |-- peliculas.xml
|   |-- peliculas.json
|   |-- importar.php
|   |-- exportar.php
|-- helpers/
|   |-- seguridad.php
|-- assets/
    |-- css/
    |   |-- estilos.css
    |   |-- tema.css
    |-- js/
        |-- main.js
```

## 4. Modelo de datos requerido

Tablas minimas:

- `usuarios`: id, nombre, email, password, rol, created_at.
- `generos`: id, nombre.
- `peliculas`: id, titulo, descripcion, anio, imagen, id_genero, created_at.
- `preferencias`: id, id_usuario, id_genero.
- `historial`: id, id_usuario, id_pelicula, fecha_vista.
- `calificaciones`: id, id_usuario, id_pelicula, puntuacion, comentario, fecha.

Relaciones clave:

- Una pelicula pertenece a un genero.
- Un usuario puede tener muchas preferencias.
- Un usuario puede tener muchos registros de historial.
- Un usuario puede calificar muchas peliculas.
- Una pelicula puede tener muchas calificaciones.

## 5. Distribucion del equipo

### Zuliannys Torrero - Frontend completo

Responsabilidad principal: construir toda la interfaz visual de la aplicacion y asegurar que las vistas sean claras, responsivas y faciles de usar.

Archivos principales:

- `assets/css/estilos.css`
- `assets/css/tema.css`
- `assets/js/main.js`
- `vistas/home.php`
- `vistas/login.php`
- `vistas/registro.php`
- `vistas/admin/dashboard.php`
- `vistas/admin/listar.php`
- `vistas/admin/crear.php`
- `vistas/admin/editar.php`
- `vistas/admin/reportes.php`
- `vistas/usuario/preferencias.php`
- `vistas/usuario/recomendaciones.php`
- `vistas/usuario/perfil.php`
- `vistas/usuario/detalle.php`

Tareas:

- Definir el estilo visual general de la plataforma.
- Crear barra de navegacion, pie de pagina y estructura comun de paginas.
- Disenar pagina publica de inicio con peliculas destacadas.
- Disenar formularios de login y registro.
- Disenar tarjetas de peliculas con imagen, titulo, genero y calificacion.
- Disenar vistas del panel admin: dashboard, listado, crear, editar y reportes.
- Disenar vistas del usuario: preferencias, recomendaciones, perfil y detalle.
- Implementar modo claro/oscuro con boton visual.
- Crear validaciones basicas del lado cliente con JavaScript.
- Mantener consistencia visual entre todas las paginas.
- Coordinar con Eduardo para conectar formularios y datos reales del backend.

Entregables:

- Interfaz completa en HTML/PHP lista para recibir datos dinamicos.
- CSS general y responsive.
- JavaScript de interactividad basica.
- Vistas sin errores visuales y con formularios nombrados correctamente.

Criterios de aceptacion:

- Todas las pantallas principales existen.
- Los formularios tienen campos con `name` correctos para el backend.
- Las paginas se ven bien en escritorio y movil.
- Las tarjetas de peliculas pueden renderizar datos dinamicos.
- El modo claro/oscuro funciona visualmente.

### Einer Gonzalez - Base de datos y backend principal

Responsabilidad principal: crear la base de datos, la conexion PDO y la logica principal de acceso a datos.

Archivos principales:

- `database.sql`
- `config/conexion.php`
- `modelo/Usuario.php`
- `modelo/Pelicula.php`
- `modelo/Genero.php`
- `modelo/Preferencia.php`
- `modelo/Historial.php`
- `modelo/Calificacion.php`

Tareas:

- Disenar y crear la base de datos completa.
- Crear relaciones y llaves foraneas.
- Insertar datos de prueba: al menos 10 peliculas, 5 generos, 1 admin y 1 usuario normal.
- Configurar conexion PDO en `config/conexion.php`.
- Activar `PDO::ATTR_ERRMODE` en modo exception.
- Crear metodos base para usuarios, peliculas, generos, preferencias, historial y calificaciones.
- Implementar CRUD de peliculas desde el modelo.
- Implementar consultas para reportes:
  - generos mas visitados;
  - peliculas mas calificadas;
  - usuarios mas activos.
- Implementar consultas para recomendaciones:
  - peliculas por generos favoritos;
  - exclusion de peliculas ya vistas;
  - orden por promedio de calificacion.
- Entregar estructura SQL y documentar usuario, base de datos y datos de prueba.

Entregables:

- `database.sql` importable en MySQL.
- Conexion PDO funcional.
- Modelos con metodos listos para ser usados por controladores.
- Datos de prueba suficientes para demostrar la plataforma.

Criterios de aceptacion:

- El archivo SQL se importa sin errores.
- Las tablas tienen relaciones correctas.
- Las consultas usan PDO y consultas preparadas.
- Los modelos no imprimen HTML; solo devuelven datos.
- Los metodos principales pueden probarse antes de conectar el frontend.

### Eduardo Marmolejo - Backend de integracion con frontend

Responsabilidad principal: conectar las vistas con la logica del backend, organizar rutas/controladores y asegurar que los datos lleguen correctamente al frontend.

Archivos principales:

- `index.php`
- `controlador/PeliculaController.php`
- `controlador/AdminController.php`
- `controlador/RecomendacionController.php`
- `webservices/peliculas.xml`
- `webservices/peliculas.json`
- `webservices/importar.php`
- `webservices/exportar.php`

Tareas:

- Crear el router principal `index.php` usando parametros GET como `accion` o `vista`.
- Coordinar rutas publicas, rutas de usuario y rutas de administrador.
- Conectar las vistas de Zuliannys con los modelos creados por Einer.
- Implementar controladores para:
  - listar peliculas;
  - crear peliculas;
  - editar peliculas;
  - eliminar peliculas;
  - mostrar dashboard;
  - mostrar reportes;
  - mostrar recomendaciones;
  - registrar historial;
  - guardar calificaciones.
- Asegurar que cada formulario envie datos al controlador correcto.
- Devolver mensajes de exito o error a las vistas.
- Crear archivo `peliculas.xml` con al menos 5 peliculas.
- Crear archivo `peliculas.json` con las mismas peliculas.
- Implementar `importar.php` para leer XML/JSON e insertar peliculas.
- Implementar `exportar.php` para devolver peliculas en JSON con `Content-Type: application/json`.
- Preparar endpoints internos simples si el frontend necesita cargar datos por JavaScript.
- Mantener coordinacion constante con Zuliannys para nombres de campos, botones, rutas y mensajes.

Entregables:

- Flujo completo entre vistas, controladores y modelos.
- Router funcional.
- Webservices XML/JSON funcionales.
- Integracion de formularios con acciones reales.

Criterios de aceptacion:

- Navegar por `index.php` permite llegar a las vistas principales.
- Los formularios insertan, actualizan o consultan datos reales.
- Los controladores no contienen SQL directo; llaman a los modelos.
- XML y JSON se pueden importar o exportar.
- El frontend muestra datos reales de la base de datos.

### Alejandro - Seguridad, autenticacion y pruebas

Responsabilidad principal: proteger la aplicacion, implementar autenticacion/roles y documentar las pruebas de seguridad requeridas.

Archivos principales:

- `helpers/seguridad.php`
- `controlador/AuthController.php`
- `modelo/Usuario.php` en coordinacion con Einer
- `vistas/login.php` en coordinacion con Zuliannys
- `vistas/registro.php` en coordinacion con Zuliannys
- Documento de pruebas de seguridad: Word, PDF o Markdown.

Tareas:

- Implementar registro de usuarios.
- Implementar inicio y cierre de sesion.
- Usar `password_hash()` para guardar contrasenas.
- Usar `password_verify()` para validar contrasenas.
- Manejar `$_SESSION` con id de usuario, nombre y rol.
- Proteger rutas privadas.
- Proteger rutas de administrador por rol.
- Crear helper `helpers/seguridad.php` con funciones:
  - `sanitizar($texto)`;
  - `validarEmail($email)`;
  - `escapar($texto)` para salida HTML con `htmlspecialchars`;
  - validacion basica de enteros/id.
- Revisar que todos los formularios validen campos obligatorios.
- Revisar que no haya SQL concatenado.
- Implementar bloqueo temporal por intentos fallidos de login.
- Configurar cookies de sesion con `HttpOnly` y, si aplica HTTPS, `Secure`.
- Validar la cookie de tema para que solo acepte valores permitidos.
- Preparar y ejecutar las pruebas de seguridad.

Pruebas minimas requeridas:

- P01: XSS en campo de nombre.
- P02: SQL Injection en login.
- P03: acceso sin sesion a panel privado.
- P04: acceso sin rol admin.
- P05: fuerza bruta en login.
- P06: inyeccion en busquedas.
- P07: XSS en comentarios/calificaciones.
- P08: acceso directo a `config/conexion.php`.
- P09: cookie de tema manipulada.
- P10: formularios vacios.

Entregables:

- Autenticacion funcional.
- Control de sesiones y roles.
- Helper de seguridad usado por el equipo.
- Documento de pruebas con procedimiento, resultado esperado y resultado obtenido.

Criterios de aceptacion:

- Nadie entra a vistas protegidas sin sesion.
- Un usuario normal no puede entrar al panel admin.
- Las contrasenas no se guardan en texto plano.
- Los scripts de XSS se muestran como texto, no se ejecutan.
- Los intentos de SQLi no inician sesion ni rompen consultas.
- El documento de pruebas incluye evidencia clara de cada caso.

## 6. Dependencias entre integrantes

Prioridad de arranque:

1. Einer debe entregar `database.sql`, `config/conexion.php` y modelos base.
2. Alejandro debe entregar `helpers/seguridad.php` y autenticacion inicial.
3. Zuliannys puede avanzar desde el dia 1 con maquetas y vistas estaticas.
4. Eduardo conecta las vistas con los controladores apenas existan modelos y formularios.

Dependencias criticas:

- Zuliannys depende de Eduardo para saber rutas y mensajes de formularios.
- Eduardo depende de Einer para modelos y consultas.
- Eduardo depende de Alejandro para validaciones, sesiones y permisos.
- Alejandro depende de Einer para la tabla `usuarios`.
- Einer debe evitar cambiar nombres de campos sin avisar al equipo.

## 7. Roadmap sugerido

### Fase 0 - Alineacion tecnica

Objetivo: evitar que cada persona construya con nombres distintos.

Checklist:

- Confirmar estructura de carpetas.
- Confirmar nombres de tablas.
- Confirmar nombres de campos de formularios.
- Confirmar rutas principales del `index.php`.
- Confirmar roles: `admin` y `usuario`.
- Crear tablero de tareas: Pendiente, En progreso, En revision, Terminado.

### Fase 1 - Base del sistema

Responsables principales: Einer, Alejandro y Zuliannys.

Checklist:

- Einer crea base de datos, tablas, relaciones y datos de prueba.
- Einer crea conexion PDO.
- Alejandro crea autenticacion, sesiones y helper de seguridad.
- Zuliannys crea layout base, navegacion, home, login y registro.
- Eduardo prepara router inicial y prueba carga de vistas.

Salida esperada:

- Se puede abrir la aplicacion.
- Se puede registrar e iniciar sesion.
- Hay datos de peliculas en la base de datos.

### Fase 2 - Modulo admin

Responsables principales: Einer, Eduardo y Zuliannys.

Checklist:

- Einer completa metodos CRUD de peliculas y generos.
- Eduardo conecta CRUD con controladores y rutas.
- Zuliannys termina vistas admin.
- Alejandro valida proteccion por rol admin.

Salida esperada:

- El admin puede crear, listar, editar y eliminar peliculas.
- Un usuario normal no puede acceder al panel admin.

### Fase 3 - Modulo usuario y recomendaciones

Responsables principales: Einer, Eduardo y Zuliannys, con seguridad de Alejandro.

Checklist:

- Einer completa consultas de preferencias, historial y calificaciones.
- Eduardo conecta recomendaciones, detalle y perfil.
- Zuliannys termina interfaz de usuario.
- Alejandro valida seguridad en comentarios, calificaciones y preferencias.

Salida esperada:

- El usuario selecciona generos favoritos.
- El sistema muestra recomendaciones.
- El usuario puede ver detalle, calificar y comentar.
- El perfil muestra preferencias, historial y ultima pelicula visitada.

### Fase 4 - XML, JSON e integracion final

Responsable principal: Eduardo.

Checklist:

- Crear `peliculas.xml`.
- Crear `peliculas.json`.
- Importar peliculas desde XML/JSON.
- Exportar peliculas desde base de datos como JSON.
- Confirmar `Content-Type: application/json`.
- Probar que los datos importados aparecen en frontend.

Salida esperada:

- El proyecto demuestra webservices XML/JSON.
- La aplicacion intercambia datos con formatos vistos en clase.

### Fase 5 - Seguridad, pruebas y cierre

Responsable principal: Alejandro, con apoyo de todo el equipo.

Checklist:

- Ejecutar las 10 pruebas de seguridad.
- Corregir vulnerabilidades encontradas.
- Documentar resultados.
- Revisar que todas las consultas usen PDO preparado.
- Revisar que todas las salidas usen `htmlspecialchars`.
- Revisar que no haya rutas privadas sin proteccion.
- Preparar demostracion final por flujo.

Salida esperada:

- Aplicacion funcional.
- Documento de pruebas listo.
- Equipo preparado para presentacion y preguntas.

## 8. Reglas de trabajo del equipo

- Nadie modifica `database.sql` sin avisar a Einer.
- Nadie cambia nombres de campos de formulario sin avisar a Eduardo y Zuliannys.
- Todo formulario que reciba datos debe pasar por validacion de Alejandro.
- Todo SQL debe estar en modelos, no en vistas.
- Toda vista debe recibir datos ya preparados desde controladores.
- Toda salida de datos de usuario o base de datos debe escaparse con `htmlspecialchars`.
- Toda ruta protegida debe verificar sesion.
- Toda ruta admin debe verificar rol.

## 9. Definicion de terminado

Una tarea se considera terminada solo si cumple:

- El archivo esta creado en la carpeta correcta.
- El codigo corre sin errores visibles.
- Usa nombres acordados con el equipo.
- No rompe modulos de otros integrantes.
- Tiene validacion basica.
- Tiene seguridad minima aplicada.
- Fue probado al menos con un caso correcto y un caso incorrecto.
- Otro integrante pudo revisarlo o integrarlo.

## 10. Flujo recomendado para la demostracion

1. Mostrar home publica.
2. Registrar usuario.
3. Iniciar sesion.
4. Elegir preferencias.
5. Ver recomendaciones.
6. Abrir detalle de pelicula.
7. Calificar y comentar.
8. Mostrar perfil e historial.
9. Entrar como admin.
10. Crear, editar y eliminar pelicula.
11. Mostrar reportes.
12. Mostrar importacion/exportacion XML/JSON.
13. Mostrar pruebas de seguridad documentadas.

## 11. Riesgos principales

- Que la base de datos cambie tarde y rompa formularios o modelos.
- Que las vistas usen nombres de campos distintos a los esperados por el backend.
- Que el CRUD funcione, pero sin proteccion de rol.
- Que la app funcione visualmente, pero no tenga pruebas de seguridad documentadas.
- Que el equipo deje XML/JSON para el final y no alcance a integrarlo.
- Que se mezclen consultas SQL dentro de vistas, haciendo dificil corregir seguridad.

Mitigacion:

- Congelar nombres de tablas y campos temprano.
- Hacer integraciones pequenas cada fase.
- Revisar seguridad desde el inicio, no al final.
- Mantener una lista unica de rutas y acciones del router.
- Hacer pruebas con datos reales desde la fase 2.
