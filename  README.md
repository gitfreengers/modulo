## Instalación

### Paso 1: Instalación de paquete

```
composer require freengers-dev/firstmodule "dev-master" 
```

Una vez realizada la instalación, agregar el proveedor al archivo "config/app.php"

```
Freengersdev\firstmodule\ExampleServiceProvider::class,	
```

### Paso 2: Instalación de migraciones

Correr el comando vendor:publish para podere copiar las migraciones al directorio principal:

```
php artisan vendor:publish
```

### Paso 3: Actualización de base de datos
```
php artisan migrate
```

## Rutas 

/todo/list
/todo/edit
/todo/create