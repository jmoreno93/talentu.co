# Talentu.co Test

_El proyecto es un exámen para la evaluación de conocimientos_

### Pre-requisitos 📋

_Principalmente usted tener estos programas instalados en tu pc ya sea en windows, linux o mac esta disponible para estás tres plataformas_

```
1. Git: Herramiuenta que usaremos para descargar del repositorio en la nube
2. Docker: Para levantar los contenedores con la aplicación y base de datos
3. Postman: Para poder revisar los endpoint
```

### Instalación 🔧

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

_Antes de continuar asegurese que el puerto 8000 esta disponible porque la aplicación tomará este puerto en caso no este disponible no podrá levantar el contenedor_

```
docker-compose up
```

_Con ello tendremos la aplicación ejecutandose en el puerto 8000_

## Ejecutando testing ⚙️

_Podemos ejecutar mediante github actions el testing de la aplicación para asegurarnos que todo esta funcionando_

## Ejecutando endpoints ⚙️

_Para este paso utilizaremos postman que debimos previamente instalar en la pc para ello utilice la colección que esta en el proyecto descargado o lo puede volver a descargar desde aquí_

```
 https://github.com/jmoreno93/talentu.co/blob/main/postman/talentu.co.postman_collection.json
```

_Una vez dentro de postman debe ir a la sección *Enviroment* y dar al icono de *+* ya que se estará almacenando el token en una variable de entorno para hacer más fácil la verificación_

### Verifique los endpoint en postman 🔩

_Como podrá visualizar en el arbol de carpetas de la colección de postman se organiza por carpetas de acuerdo a las preguntas dadas en el examen_

---
Gracias por la oportunidad
