Para ejecutar este proyecto seguir estos pasos 

instalar laragon 
https://laragon.org/download/index.html

una vez instalado laragon debe tomar la carpeta front y ubicarla en la carpeta www de laragon 

instalar composer 
https://getcomposer.org/download/

una vez instalado composer se va a instalar laravel 
composer global requiere "laravel / installer". 

despues de instalar laravel en su equipo debe descargar el proyecto desarrollado en laravel y
copiar el archivo env.example y quitarle el .example.
dentro de este va a buscar el usuario de la base de datos y sus credenciales , acomodarlas dependiendo la configuracion de su equipo 

abrir gestor de base de datos e importar la base de datos suministrada por ustedes dejo el link
https://drive.google.com/file/d/1s9UNRpE0UjRqC4kDpyesK7MZDymPMENi/view?usp=sharing

una vez importada la base de datos solo queda ejecutar el proyecto, para esto realizar lo siguiente 

1- ubicar proyecto laravel 
2- abrir la consoloa 
3- ejecutar los siguientes comandos 
3.1- php artisan optimize
3.2- php artisan serve 

luego de tener la api corriendo local abrir laragon y realizar los siguientes pasos 

1-hacer click en el boton de start all 
2- dar click en el boton web 
3- seleccionar la carpeta que dice front 

