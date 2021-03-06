# Talentu.co Test

_El proyecto es un ex谩men para la evaluaci贸n de conocimientos_

### Pre-requisitos 馃搵

_Principalmente usted tener estos programas instalados en tu pc ya sea en windows, linux o mac esta disponible para est谩s tres plataformas_

```
1. Git: Herramiuenta que usaremos para descargar del repositorio en la nube
2. Docker: Para levantar los contenedores con la aplicaci贸n y base de datos
3. Postman: Para poder revisar los endpoint
```

### Instalaci贸n 馃敡

_Debes seguir paso a paso las indicaciones para poder levantar el proyecto_

_Abra el terminal y ejecute esto_

```
git clone https://github.com/jmoreno93/talentu.co.git
```
_Cuando termine el proceso de descarga entramos a la carpeta_

```
cd talentu.co
```

_Para este paso el docker debe estar corriendo en la pc, luego llamamos a este comando_

```
docker build -t moisesapi .
```

_Antes de continuar asegurese que el puerto 8000 esta disponible porque la aplicaci贸n tomar谩 este puerto en caso no este disponible no podr谩 levantar el contenedor_

```
docker-compose up -d
```

_Esperamos 1 minuto y con ello tendremos la aplicaci贸n ejecutandose en el puerto 8000_

## Ejecutando testing 鈿欙笍

_Podemos ejecutar mediante github actions el testing de la aplicaci贸n para asegurarnos que todo esta funcionando_

## Ejecutando endpoints 鈿欙笍

_Para este paso utilizaremos postman que debimos previamente instalar en la pc para ello utilice la colecci贸n que esta en el proyecto descargado o lo puede volver a descargar desde aqu铆_

```
 https://github.com/jmoreno93/talentu.co/blob/main/postman/talentu.co.postman_collection.json
```

_Una vez dentro de postman debe ir a la secci贸n *Enviroment* y dar al icono de *+* ya que se estar谩 almacenando el token en una variable de entorno para hacer m谩s f谩cil la verificaci贸n_

### Verifique los endpoint en postman 馃敥

_Como podr谩 visualizar en el arbol de carpetas de la colecci贸n de postman se organiza por carpetas de acuerdo a las preguntas dadas en el examen_

---
Gracias por la oportunidad
