# API de Inventarios

Este proyecto implementa un sistema para gestionar mobiliarios y resguardos utilizando Codeigniter.

## Instrucciones para configurar la base de datos

1. Crear la base de datos `inventarios_db`.
2. Dar click en **Importar**.
3. Seleccionar el archivo `inventarios_db.sql` y cargarlo.

## Endpoints de la API





### Mobiliario

#### Obtener Mobiliario
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de todos los mobiliarios.

#### Insertar Mobiliario
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/`
- **Método:** `POST`
- **Cuerpo del Json:**
    ```json
    {
      "nombre": "Mesa",
      "descripcion": "Mesa color cafe",
      "tipo": "Madera",
      "estado": "Bueno",
      "fecha_registro": "26/09/24",
      "activo": "1",
      "codigo": "123asd",
      "id_ubicacion": "1"
    }
    ```
- **Descripción:** Inserta un nuevo mobiliario.

#### Actualizar Mobiliario
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/6`
- **Método:** `PUT`
- **Cuerpo del Json:**
    ```json
    {
      "id_mobiliario": "6",
      "nombre": "Pizarron",
      "descripcion": "Pizarron grande",
      "tipo": "0",
      "estado": "0",
      "fecha_registro": "2026-09-24 00:00:00",
      "activo": "0",
      "codigo": "asdpze",
      "id_ubicacion": "1"
    }
    ```
- **Descripción:** Actualiza un mobiliario específico.

#### Eliminar Mobiliario
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/6`
- **Método:** `DELETE`
- **Descripción:** Elimina un mobiliario específico.



### Personas

#### Obtener Personas

- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Personas`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de todas las personas.

#### Insertar Personas
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Personas`
- **Método:** `POST`
- **Cuerpo del Json:**
    ```json
        {
          "nombre":"Itzel",
          "apaterno":"Guarneros",
          "amaterno":"Mendez",
          "matricula":"utp01448858",
          "telefono":"2231431329",
          "correo":"itzel303@gmail.com"
        }
    ```
- **Descripción:** Inserta una nueva Persona.

#### Actualizar Persona
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Personas/1`
- **Método:** `PUT`
- **Cuerpo del Json:**
    ```json
       {
        "nombre":"Osvaldo",
        "apaterno":"Mendez",
        "amaterno":"Guarneros",
        "matricula":"utp01448858",
        "telefono":"2231431329",
        "correo":"itzel303@gmail.com"
        }
    ```
- **Descripción:** Actualiza una persona.

#### Eliminar Persona
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Persona/3`
- **Método:** `DELETE`
- **Descripción:** Elimina una persona.



### Ubucaciones

#### Obtener ubicaciones
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Ubicacion/`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de todas las ubicaciones.

#### Insertar Ubicación
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Ubicacion/`
- **Método:** `POST`
- **Cuerpo del Json:**
    ```json
        {
          "edificio": "K5",
          "departamento": "Tecnologias de la informacion",
          "area": "Laboratorio 108"
        }
    ```
- **Descripción:** Inserta una nueva uicación.

#### Actualizar ubicación
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Ubicacion/4`
- **Método:** `PUT`
- **Cuerpo del Json:**
    ```json
    {
      "area":"102"
    }
    ```
- **Descripción:** Actualiza una ubicación.

#### Eliminar ubicación
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Ubicacion/1`
- **Método:** `DELETE`
- **Descripción:** Elimina una ubicación.



### Resguardos

#### Obtener Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de todos los resguardos.

#### Insertar Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/`
- **Método:** `POST`
- **Cuerpo del Json:**
    ```json
    {
      "id_persona": "2",
      "id_mobiliario": "1",
      "fecha_asignacion": "26/09/24"
    }
    ```
- **Descripción:** Inserta un nuevo resguardo.

#### Actualizar Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/4`
- **Método:** `PUT`
- **Cuerpo del Json:**
    ```json
    {
      "id_persona": "2",
      "id_mobiliario": "1",
      "fecha_asignacion": "22/09/24"
    }
    ```
- **Descripción:** Actualiza un resguardo específico.

#### Eliminar Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/4`
- **Método:** `DELETE`
- **Descripción:** Elimina un resguardo específico.
