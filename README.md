#  Simple Restful Booking API

This is a simple laravel api for clients to book a product.

in the application due to time, i omitted  :
   1. `units tests for my services,endpoints and validations`.


   2. `collections pagination and resource optimization`.


   3. `A client can book the same product multiple times`.


# Installation process

1. run `git@github.com:MartinPirate/booking_restapi.git`.

2. then `composer install`.

3. Update `.env` with your own database credentials

#  Run the app

1. run `php artisan dev:install`.


2. then `php artisan serve`.



# REST API

The REST API to the example app is described below.

## Get list of Products

### Request

`GET /products/`

    curl -i -H 'Accept: application/json' http://localhost:8000/products/

### Response

    HTTP/1.1 200 OK
    Host: localhost:8000
    Date: Tue, 23 Aug 2022 06:16:52 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    {"message":"List of All Products"
    ,"error":false,
    "code":200,
    "data":[{
      "id":1,
      "title":"Similique ab et quidem.",
      "type":"excursions",
      "description":"Nihil et illo voluptatem est sint et odit. Id magnam quas harum. Exercitationem illo illo est et quo. Fugiat quasi vero quia ut quaerat.",
      "total_slots":86,
      "available_slots":86,
      "is_available":true,
      "created_date":"2022.08.22 15:01:19",
      "last_updated_date":"2022.08.22 15:01:19"},


## Get list of Clients

### Request

`GET /clients/`

    curl -i -H 'Accept: application/json' http://localhost:8000/clients/

### Response

    HTTP/1.1 200 OK
    Host: localhost:8000
    Date: Tue, 23 Aug 2022 06:16:52 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    "message": "List of All Clients",
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "name": "Oleta Schmeler",
            "email": "rico.volkman@nikolaus.com",
            "passport_num": "9641514",
            "created_date": "2022.08.22 15:01:18",
            "last_updated_date": "2022.08.22 15:01:18",
            "bookings": 0
        },


## Get list of Bookings

### Request

`GET /bookings/`

    curl -i -H 'Accept: application/json' http://localhost:8000/bookings/

### Response

    HTTP/1.1 200 OK
    Host: localhost:8000
    Date: Tue, 23 Aug 2022 06:16:52 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

    "message": "List of All Bookings",
    "error": false,
    "code": 200,
    "data": [
        {
            "id": 1,
            "client": "Reanna O'Keefe",
            "product": "Similique ab et quidem.",
            "booked_date": "2022.08.23 06:26:37",
            "created_date": "2022.08.23 06:26:37",
            "last_updated_date": "2022.08.23 06:26:37"
        },


## Create a new Booking

### Request

`POST /bookings/`

    curl -i -H 'Accept: application/json' -d 'client_id=11&product_id=1' http://localhost:8000/bookings

### Response

    HTTP/1.1 200 OK
    Host: localhost:8000
    Date: Tue, 23 Aug 2022 06:16:52 GMT
    Status: 200 OK
    Connection: close
    Content-Type: application/json
    Content-Length: 2

     {"message":"Booking Created Successfully",
     "error":false,
     "code":200,
      "data":{
        "id":6,
        "client":"Reanna O'Keefe",
        "product":"Similique ab et quidem.",
        "booked_date":"2022.08.23 06:41:45",
        "created_date":"2022.08.23 06:41:45",
        "last_updated_date":"2022.08.23 06:41:45"
         }
        }
