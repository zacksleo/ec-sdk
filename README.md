<h1 align="center"> ec-sdk </h1>

<p align="center"> 电商平台 SDK.</p>


## Installing

```shell
$ composer require zacksleo/ec-sdk -vvv
```

## Usage

```php
    try {
        $config = [
            'key'        => 'key',
            'secret'     => 'secret',
            'debug'      => false,
            'log' =>[
                'file'       => __DIR__.'/suning.log',
                'level'      => 'error',
                'permission' => 0777,
            ]
        ];
        $code = Factory::suning($config)->express->name2code('申通快递');
        var_dump($code);
    } catch (\Zacksleo\SuningSdk\SuningException $exception) {
        //苏宁返回错误
        var_dump($exception->getMessage());
    } catch (\Hanson\Foundation\Exception\HttpException $exception) {
        //Http 请求发生错误
        var_dump($exception->getMessage());
    } catch (\Exception $exception) {
        $exception->getMessage();
        var_dump($exception->getMessage());
    }
```

## Contributing

You can contribute in one of three ways:

1. File bug reports using the [issue tracker](https://github.com/zacksleo/ec-sdk/issues).
2. Answer questions or fix bugs on the [issue tracker](https://github.com/zacksleo/ec-sdk/issues).
3. Contribute new features or update the wiki.

_The code contribution process is not very formal. You just need to make sure that you follow the PSR-0, PSR-1, and PSR-2 coding guidelines. Any new code contributions must be accompanied by unit tests where applicable._

## License

MIT