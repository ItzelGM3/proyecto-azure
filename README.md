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
- **Cuerpo de la solicitud:**
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
- **Cuerpo de la solicitud:**
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

### Resguardos

#### Obtener Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/`
- **Método:** `GET`
- **Descripción:** Obtiene la lista de todos los resguardos.

#### Insertar Resguardos
- **URL:** `http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/`
- **Método:** `POST`
- **Cuerpo de la solicitud:**
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
- **Cuerpo de la solicitud:**
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
