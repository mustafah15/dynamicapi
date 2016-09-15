# dynamicapi

###Api Manager for Laravel framework 

Easy way to return response from your application with model data 

##Installation

First open up a console in your project root and use composer to fetcht the package into your project

```
composer require mustafah15/dynamicapi
```

Now go into your `config/app.php` and add the service provider:

```
  Mustafah15\DynamicApi\DynamicApiServiceProvider::class,
```

##Usage and Responses

####Usage

Create new object form ```php DynamicApi() ``` class 

```php
  (new DynamicApi())->respond(User::all(),['name','email']);
```

It could take two params first one is the result from your model 
The second is optional param with keys you need to be showed

####Response

It return json response with data, status and totoal (number of how meny record in data)

```json
{
    "status": 200,
    "total": 15,
    "data": [
        {
            "name": "example",
            "email": "example@example.com"
        },
        {
            "name": "example1",
            "email": "example1@example1.com"
        }
    ]
}
```

## License
The package is open-sourced software licensed under the  [MIT license].

