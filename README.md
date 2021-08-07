Run docker
```sh
docker-compose up
```
XDebug is enabled by default

Backend file located in 
```sh
src/backend/
```
Migrate migrations
```sh
php artisan migrate
```

To run queue jobs
```sh
php artisan queue:work
```

Three endpoint available:

1. List all parse requests
```sh
   http://localhost:8000/api/parses?per_page=20
```
2. Create new parse request
```sh
   http://localhost:8000/api/parses
```
Example passed data:
```sh
{
    "tag": "h3",
    "data": [
        {
            "url": "https://siauliuletenele.lt/apie-mus/"
        },
        {
            "url": "https://siauliuletenele.lt/"
        }
    ]
}
```
3. List parsed data results
```sh
   http://localhost:8000/api/parses
```

NOTICE: 
I now realise that job progress
isn't what was asked but added a "sort of" progress checker.
Also, I normally wouldn't put that sort of "heavy" query in listing if possible, but it was a quick make shift solution.