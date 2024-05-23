CONFIGURACION DE LA BD:
app/app.php

METODOS Y ACCESOS A LAS DIFERENTES FUNCIONES DE LA API:

GET:

Parametro                         Descripcion
id_inventario                     Consulta informacion del inventario por id.
allPrint                          Consulta toda la informacion del inventario.

POST:

Form-data                         Descripcion
newPrint, serial, marca           Crea un nuevo registro en el inventario.
search_marca                      Consulta informacion del inventario por marca.

PUT:

Json-data                         Descripcion
id_inventario, serial, marca      Actualiza informacion del inventario por id.     

PATCH:

Json-data                         Descripcion
id_inventario, serial             Actualiza el serial por id.  

DELETE:

Parametro                         Descripcion
id_inventario                     Elimina informacion del inventario por id.
