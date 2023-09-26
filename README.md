# rekalogika/psr-16-simple-cache-bundle

Enables PSR-16 Simple Cache services in Symfony projects. These were previously
enabled in the older Symfony version but were removed in 4.3.

## Synopsis

```php
use Psr\SimpleCache\CacheInterface;

class SomeService
{
    public function __construct(private CacheInterface $cache)
    {
    }

    public function doSomething()
    {
        $this->cache->set('foo', 'bar');
    }
}
```

## Documentation

[rekalogika.dev/psr-16-simple-cache-bundle](https://rekalogika.dev/psr-16-simple-cache-bundle)

## Credits

This package is just a service definition. The actual implementation is done by
the Symfony project; they just don't make the service available by default.

* [Adapters For Interoperability between PSR-6 and PSR-16 Cache](https://symfony.com/doc/current/components/cache/psr6_psr16_adapters.html)
* [Service definition by Tobion](https://github.com/symfony/symfony/issues/28918#issuecomment-433489302)

## License

MIT

## Contributing

Issues and pull requests should be filed in the GitHub repository
[rekalogika/psr-16-simple-cache-bundle](https://github.com/rekalogika/psr-16-simple-cache-bundle).