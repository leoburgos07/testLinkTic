**Prueba Desarrollador LinkTic**

Pasos para correr la prueba:
* Correr las migraciones con el seeder.
* Ejecutar php artisan serve

**ENDPOINTS**

POST] localhost:8000/api/login

[POST] localhost:8000/api/register

[POST] localhost:8000/api/storeTask

[GET] localhost:8000/api/listTasks?status=Iniciada&due_date=2024-12-31  (Los parámetros son los filtros y son opcionales, si no van en la petición, trae toda la data)

[GET] localhost:8000/api/getTask/1

[PUT] localhost:8000/api/updateTask/2

[DELETE] localhost:8000/api/deleteTask/1

**DATA DUMMIE**

Para el endpoint de crear, puede usar esta data:

{
  "title": "Tarea de prueba pendiente",
  "description": "Descripción de tarea pendiente.",
  "status": "Pendiente",
  "due_date": "2024-12-30"
}
