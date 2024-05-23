CONFIGURACION DE LA BD:
app/app.php

METODOS Y ACCESOS A LAS DIFERENTES FUNCIONES DE LA API:

GET:

Parametro: id_inventario 
Descripcion: Consulta informacion del inventario por id

Parametro: allPrint 
Descripcion: Consulta toda la informacion del inventario.

POST:

Form-data: newPrint, serial, marca 
Descripcion: Crea un nuevo registro en el inventario.

Form-data: search_marca 
Descripcion: Consulta informacion del inventario por marca.

PUT:

Json-data: id_inventario, serial, marca 
Descripcion: Actualiza informacion del inventario por id.     

PATCH:

Json-data: id_inventario, serial 
Descripcion: Actualiza el serial por id.  

DELETE:

Parametro: id_inventario 
Descripcion: Elimina informacion del inventario por id.
