# Proyecto de evaluación C&S

## Puesta en marcha

Para hacer la puesta en marcha debe:

1. Clonar el repositorio
2. Crear un nuevo proyecto de laravel 8
3. Copiar el contenido de repositorio y pegarlo en el proyecto nuevo de laravel
4. Crear la base de datos con el nombre del proyecto de laravel o con el nombre deseado y cambiar en el .env DB_DATABASE=nombreDeseado
5. Posiblemente deba ejecutar el siguiente comando composer require tymon/jwt-auth:dev-develop --prefer-source
6. Ejecute el comando php artisan jwt:secret para generar la secretkey de la api en su .env
7. Haga las migraciones con el comando php artisan migrate si quiere agregar contenido a de prueba a la base de datos use php artisan migrate --seed
8. Ejecute el comando php artisan serv para poner el a funcionar el servidor, en la siguiente url http://127.0.0.1:8000

## Parte de la evaluación

1. Modelar artículos (número, descripción, inventario, ubicación) y los movimientos históricos del inventario (cantidad, tipo: compra/venta/recuento, fecha).

-   Se diagramó en MySQL Workbench un modelo de base de datos, que se encuentra en el repositorio con el nombre de evaluacioncys.mwb
-   A partir de este diagrama se a creado los modelos con sus respectivas migraciones, factories, y seeders

2. Generar una vista que permita visualizar los artículos y acceder a sus movimientos.

-   Se ha creado una vista que en el index que muestra la lista de artículos con un botón en cada ítem del historial que dirige a los movimientos de dicho artículo

### Rutas

-   '/' index contiene el contiene el listado de artículos
-   '/article/{id}' contiene un listado de los movimientos del artículo con id ingresado

3.  Proveer de una API web con entradas para:
    -   Consulta de artículos.
    -   Consulta de los movimientos de un artículo.
    -   Movimientos del inventario: Compra para añadir al inventario, venta para disminuir y recuento para ajustar el inventario de ser necesario.

-   Se usó JWT para hacer la autentificación del usuario de la api:
-   Se crearon 8 rutas de la api para hacer todo el sistema a continuación explicare como utilizar la misma

# API

## Registro

-   Modelo : User
-   Path: domain/api/register
-   Acciones Permitidas: POST
-   Formato de respuest: JSON

Utilizado para registrar un nuevo usuario, para poder usar la api debe estar registrado de lo contrario no obtendrá el token necesario para hacer las consultas

### Formato de json enviado:

    {
        "name" : "nombre del usuario",
        "password" : "123456",
        "password_confirmation" : "123456",
        "email" : "ejemplo@ejemplomail.com"
    }

### Formato de json devuelto:

    {
        "user": {
        "name": "nombre del usuario",
        "email": "ejemplo@ejemplomail.com",
        "updated_at": "2021-03-28T21:10:31.000000Z",
        "created_at": "2021-03-28T21:10:31.000000Z",
        "id": 4
        },

    "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9yZWdpc3RlciIsImlhdCI6MTYxNjk2NTgzMSwiZXhwIjoxNjE2OTY5NDMxLCJuYmYiOjE2MTY5NjU4MzEsImp0aSI6IkkyUU5sOXNsaERjUUpxN0MiLCJzdWIiOjQsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.IMPBy3wd6V-ui6XKAfqpbBsLOv-rvsxWHl9jpbTkmio"
    }

## Login

-   Modelo : User
-   Path: domain/api/login
-   Acciones Permitidas: POST
-   Formato de respuest: JSON

Forma de obtener el token de autenticación correspondiente para hacer las consultas este se debe enviar en el header de la siguiente manera Authorization: Bearer token

### Formato de json enviado:

    {
        "email" : "ejemplo@ejemplomail.com",
        "password" : "123456"
    }

### Formato de json devuelto:

    {
        "token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8xMjcuMC4wLjE6ODAwMFwvYXBpXC9sb2dpbiIsImlhdCI6MTYxNjk2NTkzMSwiZXhwIjoxNjE2OTY5NTMxLCJuYmYiOjE2MTY5NjU5MzEsImp0aSI6InRmam1NTFgzSFdjQjQ2dk8iLCJzdWIiOjQsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.0aihVGABWa_dspMaigHkrEeHe1dZlmMcr8Sd05JphN4"
    }

## Listado de artículos

-   Modelo : articles
-   Path: domain/api/articles
-   Acciones Permitidas: GET
-   Formato de respuest: JSON

Devuelve una lista de 10 artículos junto con la paginación /api/articles?page=1, si se le pasa /api/articles?page=2 mostrara los siguientes 10 artículos

### Formato de json devuelto:

    {
        "articles": {
        "current_page": 1,
        "data": [
        {
            "id": 1,
            "number": 955326,
            "description": "Descripción",
            "inventario": 30,
            "street": "569 Bernier Glens",
            "city": "Rooseveltbury",
            "province": "Michigan",
            "country": "Niue",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T21:29:06.000000Z"
        },
        {
            "id": 2,
            "number": 52121,
            "description": "Descripción",
            "inventario": 0,
            "street": "2999 Andreane Greens Apt. 708",
            "city": "Mckaylaland",
            "province": "Oklahoma",
            "country": "Iraq",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 3,
            "number": 7,
            "description": "Descripción",
            "inventario": 7,
            "street": "734 Jesus Bridge",
            "city": "Satterfieldview",
            "province": "Vermont",
            "country": "Suriname",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 4,
            "number": 2767588,
            "description": "Descripción",
            "inventario": 2,
            "street": "4131 McDermott Court",
            "city": "Carolinefort",
            "province": "Rhode Island",
            "country": "Uganda",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 5,
            "number": 749749755,
            "description": "Descripción",
            "inventario": 9,
            "street": "154 Amari Drives Suite 920",
            "city": "Kleinchester",
            "province": "Delaware",
            "country": "Slovenia",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 6,
            "number": 98,
            "description": "Descripción",
            "inventario": 9,
            "street": "4761 Boehm Plaza",
            "city": "Emieberg",
            "province": "Alabama",
            "country": "Mali",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 7,
            "number": 833613,
            "description": "Descripción",
            "inventario": 9,
            "street": "3088 Walsh Islands",
            "city": "Lake Ceciliaville",
            "province": "Michigan",
            "country": "Spain",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 8,
            "number": 1,
            "description": "Descripción",
            "inventario": 1,
            "street": "41514 Renner Lodge Apt. 309",
            "city": "Considinechester",
            "province": "Arizona",
            "country": "American Samoa",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 9,
            "number": 4019,
            "description": "Descripción",
            "inventario": 3,
            "street": "1500 Tillman Parkway",
            "city": "Davonteshire",
            "province": "Iowa",
            "country": "Qatar",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        },
        {
            "id": 10,
            "number": 299,
            "description": "Descripción",
            "inventario": 6,
            "street": "22191 Dare Parkways Apt. 800",
            "city": "New Lillaville",
            "province": "New Mexico",
            "country": "Falkland Islands (Malvinas)",
            "created_at": "2021-03-28T20:56:11.000000Z",
            "updated_at": "2021-03-28T20:56:11.000000Z"
        }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/articles?page=1",
        "from": 1,
        "next_page_url": "http://127.0.0.1:8000/api/articles?page=2",
        "path": "http://127.0.0.1:8000/api/articles",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10
        }
    }

## Listado de movimientos históricos

-   Modelo : HistoriInventories
-   Path: domain/api/article/{pk}
-   Acciones Permitidas: GET
-   Formato de respuest: JSON

Pasandole el id al del artículo al final devuelve una lista de 10 movimiento de ese artículo junto con la paginación /api/article/{pk}?page=1, si se le pasa /api/article/{pk}?page=2 mostrará los siguientes 10 movimiento de ese artículo

### Formato de json devuelto:

    {
        "hitorial": {
        "current_page": 1,
        "data": [
        {
            "id": 540,
            "amount": 6,
            "date": "1973-08-03",
            "type": "recuento",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 900,
            "amount": 7,
            "date": "1974-05-18",
            "type": "venta",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1045,
            "amount": 8,
            "date": "1986-01-06",
            "type": "venta",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1059,
            "amount": 8,
            "date": "1972-11-03",
            "type": "compra",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1091,
            "amount": 9,
            "date": "1972-01-21",
            "type": "venta",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1154,
            "amount": 9,
            "date": "2017-02-06",
            "type": "compra",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1312,
            "amount": 3,
            "date": "1981-07-11",
            "type": "venta",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1352,
            "amount": 0,
            "date": "1974-05-15",
            "type": "recuento",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:21.000000Z",
            "updated_at": "2021-03-28T20:56:21.000000Z"
        },
        {
            "id": 1444,
            "amount": 2,
            "date": "1970-03-25",
            "type": "compra",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:22.000000Z",
            "updated_at": "2021-03-28T20:56:22.000000Z"
        },
        {
            "id": 1462,
            "amount": 5,
            "date": "1983-10-13",
            "type": "recuento",
            "article_id": 1,
            "created_at": "2021-03-28T20:56:22.000000Z",
            "updated_at": "2021-03-28T20:56:22.000000Z"
        }
        ],
        "first_page_url": "http://127.0.0.1:8000/api/article/1?page=1",
        "from": 1,
        "next_page_url": "http://127.0.0.1:8000/api/article/1?page=2",
        "path": "http://127.0.0.1:8000/api/article/1",
        "per_page": 10,
        "prev_page_url": null,
        "to": 10
        }
    }

## Comprar un artículo

-   Modelo : HistoriInventories
-   Path: domain/api/article/buy
-   Acciones Permitidas: POST
-   Formato de respuest: JSON

Crea un nuevo registro de movimientos históricos y agrega la cantidad a el inventario de ese artículo

### Formato de json enviado:

    {
        "article_id" : 1,
        "amount" : 10,
        "date" : 2021-03-28,
    }

### Formato de json devuelto:

Si el registro fue creado devuelve status 201

    {
        "Result": "Article Buy"
    }

Si el registro tuvo algún error devuelve status 400

    {
        "Result": "Bad Request"
    }

## Vender un artículo

-   Modelo : HistoriInventories
-   Path: domain/api/article/sell
-   Acciones Permitidas: POST
-   Formato de respuest: JSON

Crea un nuevo registro de movimientos históricos y descuenta la cantidad a el inventario de ese artículo

### Formato de json enviado:

    {
        "article_id" : 1,
        "amount" : 10,
        "date" : 2021-03-28,
    }

### Formato de json devuelto:

Si el registro fue creado devuelve status 201

    {
        "Result": "Article Sell"
    }

Si el registro tuvo algún error devuelve status 400

    {
        "Result": "Bad Request"
    }

## Recontar un artículo

-   Modelo : HistoriInventories
-   Path: domain/api/article/count
-   Acciones Permitidas: POST
-   Formato de respuest: JSON

Crea un nuevo registro de movimientos históricos y ajusta el inventario de ese artículo

### Formato de json enviado:

    {
        "article_id" : 1,
        "amount" : 10,
        "date" : 2021-03-28,
    }

### Formato de json devuelto:

Si el registro fue creado devuelve status 201

    {
        "Result": "Article Count"
    }

Si el registro tuvo algún error devuelve status 400

    {
        "Result": "Bad Request"
    }
