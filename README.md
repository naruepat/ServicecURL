#Laravel Service cURL

CURL for THiNKNET Web Service by Naruepat

##Installation

Require this package in your `composer.json` and update composer. This will download the package

```php
"naruepat/servicecurl": "dev-master"
```

After updating composer, add the ServiceProvider to the providers array in `app/config/app.php`

```php
'Naruepat\Servicecurl\ServicecurlServiceProvider',
```

You can use the facade for shorter code. Add this to your aliases:

```php
'ServicecURL' => 'Naruepat\Servicecurl\Facades\Servicecurl',
```

The class is bound to the ioC as `ServicecURL`

```php
$post = ServicecURL::post('www.example.com');
```

##Usage
```php
<?php
// use http method get, post, put, patch, delete
$response = ServicecURL::get('http://www.example.com');
$response = ServicecURL::post('http://www.example.com', ['param1' => 'value1']);

// easily build an url with a query string
$url = ServicecURL::buildUrl('http://www.example.com', ['s' => 'curl']);
$response = ServicecURL::get($url);

// post() takes an array of POST data
$url = ServicecURL::buildUrl('http://api.myservice.com', ['api_key' => 'my_api_key']);
$response = ServicecURL::post($url, ['post' => 'data']);

// add "json" to the start of the method to post as JSON
$response = ServicecURL::jsonPut($url, ['post' => 'data']);

// add "raw" to the start of the method to post raw data
$response = ServicecURL::rawPost($url, '<?xml version...');

// a response object is returned
var_dump($response->code); // response status code (for example, '200 OK')
echo $response->body;
var_dump($response->headers); // array of headers
var_dump($response->info); // array of curl info
?>
```

If you need to send headers or set cURL options you can manipulate a request object instead. `send()` finalizes the request and returns the result.

```php
<?php
// newRequest or newJsonRequest returns a Request object
$result = ServicecURL::newRequest('post', $url, ['foo' => 'bar'])
	->setHeader('content-type', 'application/json')
	->setHeader('Accept', 'json')
	->setOptions([CURLOPT_VERBOSE => true])
	->send();
?>
```
