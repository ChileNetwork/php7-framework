# ChileNetwork Framework 

Practica en la construccion y desarrollo de un Framework que pretende ir aumentando su capacidad operativa con respecto a los diferentes niveles de usabilidad en una escala ascendente.

Para una mayor interoperatibidad se estructura este framework utlizando los estandares del PHP Framework Interop Group (PHP-FIG) con su PHP Standards Recommendations (PSR) los cuales permiten una mayor compatibilidad en el uso de paquetes de terceros.

Para este proyecto se utiliza Composer, un administrador de paquetes o dependencias para PHP descargando directamente desde (https://packagist.org/) padazos de codigo reutilizables. Para esto instalamos composer en nuestro proyecto:
> composer init
> composer install

#### Creación Estructura de Directorio
|--config/
	|--bootstrap.php          : Bootstraping de la aplicación. 
|--logs/                      : Logs generados por la aplicación.
|--public/
	|--index.php              : Punto de entrada a la aplicación.
|--src/
	|--Controller             : Controladores de la Aplicación.
	|--CNContainer.php        : Clase Contenedor de Inyección de Dependencias.

#### Dependency Injection Container - DIC
The DependencyInjection component implements a PSR-11 compatible service container that allows you to standardize and centralize the way objects are constructed in your application

Se utilizará el componente del proyecto de symfony, 'dependency-injection'.
> composer require symfony/dependency-injection

Symfony DI recomienda instalar varios otros componentes pero para esta etapa inicial instalaremos solo dos:
	´symfony/dependency-injection suggests installing symfony/yaml´
	´symfony/dependency-injection suggests installing symfony/config´
> composer require symfony/yaml
	´symfony/yaml suggests installing symfony/console (For validating YAML files using the lint command)´
> composer require symfony/config

#### Autoloading
Agregamos propiedad de composer autoload. Permite implementar estandar PSR-4 autoloader para espacio de nombres (namespace) y asi automatizar la inclusion de clases en los archivos de nuestra aplicacion.
	"autoload": {
        "psr-4": {
            "App\\": "src/"
        }
    }

#### Creacion Container de la Aplicacion
Se crea la clase CNContainer extendiendo a la clase ContainerBuilder del Componente DI de Symfony y utilizando tambien los componentes Yaml y Config. Se define el parametro root_path. El metodo get de nuestra clase CNContainer, sobreescribe al de la clase padre previniendo al contenedor de entregar 'service_container'.



#### Implementando Lazy Loading 
Para evitar cargar TODOS los servicios disponibles para la aplicación, ...


#### Routing

Apparently we want to have different controllers for different requests. So we need a routing system. Let’s install the symfony routing component.

> composer require symfony/routing