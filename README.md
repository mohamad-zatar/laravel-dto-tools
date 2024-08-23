# Laravel DTO Tools

This package provides a comprehensive set of tools designed to simplify working with Data Transfer Objects (DTOs).
It features an artisan command for generating DTOs and includes a facade to facilitate their hydration.


## Installation

```bash

composer require mohamad-zatar/laravel-dto-tools
```

## Usage

To generate a new DTO all you need to do is run the following artisan command:

```bash
php artisan make:dto MyDto
```

This will generate the following class: `app/DataObjects/MyDto.php`. By default this class
will be a `final` class that implements a `DataObjectContract` which enforces a method `toArray` so that you can 
easily cast your DTOs to arrays.

If you are using PHP 8.2 or 8.3 however, you will by default get a `readonly` class generated, so that you do not have
to declare each property as readonly.

To work with the hydration functionality you can either use Laravels DI container, or the ready made facade.

Using the container:

```php
class InventoryController
{
    public function __construct(
        private readonly HydratorContract $hydrator,
    ) {}
    
    public function __invoke(InventoryRequest $request)
    {
        $model = Model::query()->create(
            attributes: $this->hydrator->fill(
                class: ModelObject::class,
                parameters: $request->validated(),
            )->toArray(),
        );
    }
}
```

To work with the facade, you can do something very similar:

```php
class InventoryController
{
    public function __invoke(InventoryRequest $request)
    {
        $model = Model::query()->create(
            attributes: Hydrator::fill(
                class: ModelObject::class,
                parameters: $request->validated(),
            )->toArray(),
        );
    }
}
```

## Object Hydration

Under the hood this package uses an [EventSauce](https://eventsauce.io) package, created by [Frank de Jonge](https://twitter.com/frankdejonge). It is possibly the
best package I have found to hydrate objects nicely in PHP. You can find the [documentation here](https://github.com/EventSaucePHP/ObjectHydrator)
if you would like to see what else you are able to do with the package to suit your needs.

## Testing

To run the test suite:

```bash
composer run test
```

## LICENSE

The MIT License (MIT). Please see [License File](./LICENSE) for more information.
