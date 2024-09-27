# Backend-Codeigniter

# Crar base de datos inventarios_db.
Dar click en importar -> seleccionar archivo -> buscar dentro de la carpeta inventarios_db.sql y seleccionar.

## Obtener Mobiliario
http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/


## Metodo para insertar Mobiliario:

http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/

 {
  "nombre":"Mesa",
  "descripcion":"Mesa color cafe",
  "tipo":"Madera",
  "estado":"Bueno",
  "fecha_registro":"26/09/24",
  "activo":"1",
  "codigo":"123asd",
  "id_ubicacion":"1"
}

## Actualizar mobiliario
http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/6

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

## Eliminar Mobiliario:

http://localhost/codeigniter3-rest-controller/index.php/Api/Mobiliario/6


## Get resguardos:
http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/

## Post resguardos

http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/

{
  "id_persona": "2",
  "id_mobiliario": "1",
  "fecha_asignacion":"26/09/24"
}

## Put resguardos
http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/4

{
  "id_persona": "2",
  "id_mobiliario": "1",
  "fecha_asignacion":"22/09/24"
}

#Delete resguardos

http://localhost/codeigniter3-rest-controller/index.php/Api/Resguardos/4