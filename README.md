#### 1. INFORMACIÓN INICIAL
- **Autor:** Los 4**P**(**PRO**gramadores **P**om**p**om**p**urin) 
- **Título del proyecto:** Apoyo  al alumnado de los Estudios Técnicos Especializados Computación
- **Fecha de inicio:** 

#### 2. RESUMEN DEL PROYECTO, METAS Y OBJETIVOS
- **Resumen:** 
Sistema web responsivo y de acceso restringido para apoyar a los alumnos de quinto grado que cursan el el Estudio Técnico en Computación en el Plantel 6 “Antonio Caso”, además de sus docentes. Este recaba información del alumnado mediante cuestionarios y perfiles personales, permitiendo detectar factores de riesgo de deserción.
    
- **Metas:** 
    - Reducir la deserción 
    - El sitio sea responsivo y creado conforme a tendencias existentes, así como a los estándares del W3C
    - Un sistema de acceso restringido donde tendrá dos tipos de usuarios: estudiante y docente
        
- **Objetivos:**
    - General: Brindar información que oriente la planeación de acciones de apoyo al alumnado de los Estudios Técnicos Especializados en Computación del Plantel 6 “Antonio Caso” que coadyuven a disminuir la deserción.
    - Específico:
        - Recabar indicadores individuales y grupales que apoyen la detección de necesidades y características particulares y generales del alumnado del Estudio Técnico en Computación durante el primer año.
        - Dotar al estudiantado de información individual que contribuya a su toma de decisiones en torno al logro de objetivos en el curso del Estudio Técnico en Computación.
        - Brindar información a los docentes que les permita implementar estrategias grupales para alcanzar objetivos académicos.


#### 3. PÚBLICO OBJETIVO (UX)
Estudiantes de quinto grado que cursan el el Estudio Técnico en Computación en el Plantel 6 “Antonio Caso”, ya que estos podrán comentar sus inconvenientes y recibir  retroalimentación para su mejora; y los profesores que imparten materia, porque con este sitio ellos podrán acceder a la información de los estudiantes y así proporcionar apoyo.

#### 4. PROPÓSITO Y ALCANCE
- **En alcance (Entregables):**
    - Sistema de inicio de sesión.
    - Formulario general de descripción de situación específica de alumnx.  
    - Apartado de información relacionada : 
        - Instancias de apoyo psicológico
        - Material de consulta de métodos de estudio
    - Visualización de situaciones académicas específicas de cada alumnos y estadísticas grupales.
    - Ordenamiento de situaciones mediante ponderación para identificar a lxs alumnxs con mayor riesgo a desertar.
    - Formulario
- **Fuera de alcance:**
    - Rol de administrador
    - Crear actividades y anuncios
    - Comunicación directa alumnx-profesor.

#### 5. ESPECIFICACIONES FUNCIONALES
- Registro de usuarios e inicio de sesión.

    Los alumnos del ETE en computación podrán acceder al sistema usando su número de cuenta y una contraseña que les proporcionará el docente. 

- Formularios estadísticos y de seguimiento. (Alumnos)

    Los usuarios podrán realizar un formulario estadístico inicial, así como formularios de seguimiento posterior que permitan al profesor conocer su situación individual en términos personales y del ETE.
	
- Estrategias y links de apoyo. (Alumnos).

    Los alumnos encontrarán en el sistema botones que les permitan visitar sitios de utilidad e interés para sus estudios. Éstos podrían incluir: estrategias de trabajo, materiales de apoyo relacionados con los módulos que estén cursando, programas de estudio, así como información sobre instancias de apoyo psicológico en caso de que lo requieran.

- Visualización de datos estadísticos de los alumnos y grupos a su cargo. (Profesores).


#### 6. REQUISITOS NO FUNCIONALES
| Categoría | Requisito |
|:---------:|:---------:|
| Rendimiento | Tiempo de carga inicial rápido. (LCP) |
| Seguridad | El inicio de sesión debe tener contraseñas hasheadas |
| Disponibilidad | Compatibilidad con lectores de pantalla, navegación por teclado y mouse.
| Escalabilidad | Debe ser capaz de aceptar un nuevo registro de usuarios cada año. |
| Usabilidad | Tiene que ser fácil de usar, intuitivo y atractivo. |

#### 7. ARQUITECTURA DE LA INFORMACIÓN Y UX
Dos perfiles con distinta navegación: docente y estudiante.
Estudiante: Botones que permitirán acceder a la información de los 5 primeros módulos del ETE (uno por botón) además de una sección de Técnicas de Estudio e información sobre instancias de apoyo psicológico dentro de la universidad.
Docente: En una sección fija se encontrarán cuatro botones, para registrar usuarios, modificar usuarios, activar o desactivar usuarios y para consultar sus grupos y estudiantes, puede consultar las respuestas del formulario diagnóstico de cada alumno

#### 8. ESPECIFICACIONES TÉCNICAS
- **Frontend:**
    - HTML y CSS : maquetado, estructura y diseño de las vistas / páginas.
- **Backend:** 
    - PHP : para manipulación de datos de los usuarios, estadísticas y conexión a la base de datos.
- **Base de Datos:** Sql, con Manejador MariaDB como manejador, para relacionar datos de los dos tres tipos de usuario.