# Order

## 使用方法

1.使用生成器进行循环

```php

    foreach ($client->order->whereBetween('2019-01-01 00:00:00', '2019-01-20 00:00:00')->cursor() as $res) {
        var_dump($res->get());
    }

2. 使用 chunk 方法

```php
    $client->order
    ->whereBetween('2019-01-01 00:00:00', '2019-01-20 00:00:00')
    ->chunk(10, function($res){
        var_dump($res);
    });
```
