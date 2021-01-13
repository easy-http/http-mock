<p align="center"><img src="https://blog.pleets.org/img/articles/easy-http-logo.png" height="150"></p>

# Mock builder

A fluid interface to build HTTP mocks. You can use this library to build mocks for Guzzle, Symfony and other HTTP Clients.

# :pencil: Requirements

This library requires the following dependencies

- Guzzle v7.0 or later

# :wrench: Installation

Use following command to install this library:

```bash
composer require easy-http/mock-builder
```

# :bulb: Usage

## Creating a simple Mock for Guzzle

```php
use EasyHttp\MockBuilder\HttpMock;
use EasyHttp\MockBuilder\MockBuilder;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Client;

$builder = new MockBuilder();
$builder
    ->when()
        ->methodIs('POST')
    ->then()
        ->body('bar');

$mock = new HttpMock($builder);

$client = new Client(['handler' => HandlerStack::create($mock)]);
$client
    ->post('foo')
    ->getBody()
    ->getContents(); // bar
```

## Expectations

| Method                     | URL                                           | Headers                               |
|----------------------------|-----------------------------------------------|---------------------------------------|
| [methodIs](#methodIs)      | [queryParamIs](#queryParamIs)                 | [headerIs](#headerIs)                 |
|                            | [queryParamExists](#queryParamExists)         | [headerExists](#headerExists)         |
|                            | [queryParamNotExists](#queryParamNotExists)   | [headerNotExists](#headerNotExists)   |
|                            | [queryParamsAre](#queryParamsAre)             | [headersAre](#headersAre)             |
|                            | [queryParamsExists](#queryParamsExists)       |                                       |
|                            | [queryParamsNotExists](#queryParamsNotExists) |                                       |

### methodIs

It expects for a method.

```php
$builder
    ->when()
        ->methodIs('POST')
    ->then()
        ...
```

### queryParamIs

It expects for a query parameter with specific value (for example term=bluebird).

```php
$builder
    ->when()
        ->queryParamIs('page', '5')
    ->then()
        ...
```

### queryParamExists

It expects a query parameter exists.

```php
$builder
    ->when()
        ->queryParamExists('pages')
    ->then()
        ...
```

### queryParamNotExists

It expects a query parameter does not exists.

```php
$builder
    ->when()
        ->queryParamNotExists('pages')
    ->then()
        ...
```

### queryParamsAre

It expects for a query parameters set with specific values.

```php
$builder
    ->when()
        ->queryParamsAre([
            'pages' => '30',
            'npage' => '5'
        ])
    ->then()
        ...
```

### queryParamsExists

It expects a query parameters set exists.

```php
$builder
    ->when()
        ->queryParamsExists([
            'pages',
            'npage'
        ])
    ->then()
        ...
```

### queryParamsNotExists

It expects a query parameters set does not exists.

```php
$builder
    ->when()
        ->queryParamsNotExists([
            'pages',
            'npage'
        ])
    ->then()
        ...
```

### headerIs

It expects for a header with specific value (for example Content-Type: text/html).

```php
$builder
    ->when()
        ->headerIs('Content-Type', 'text/html')
    ->then()
        ...
```

### headerExists

It expects a header exists.

```php
$builder
    ->when()
        ->headerExists('Authorization')
    ->then()
        ...
```

### headerNotExists

It expects a header does not exist.

```php
$builder
    ->when()
        ->headerNotExists('Authorization')
    ->then()
        ...
```

### headersAre

It expects for a headers set with specific values.

```php
$builder
    ->when()
        ->headersAre([
            'Authorization' => 'Bearer YourToken',
            'Content-Type' => 'application/json'
        ])
    ->then()
        ...
```

### headersExists

It expects a headers set exists.

```php
$builder
    ->when()
        ->headersExists([
            'Authorization',
            'Content-Type'
        ])
    ->then()
        ...
```