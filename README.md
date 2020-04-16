Hive Home PHP API
-------

An unofficial package to support the Hive Home API


Installation
-------

This package can be installed via [Composer](https://getcomposer.org):

``` bash
$ composer require kan-agency/hive-php-api
```

It requires **PHP >= 7.0.0**.


Simple Usage
-------

There's a helper class, named `Kan\Hive\Hive`, which should be instantiated with the same credentials used to login to https://my.hivehome.com/login. This can be done like the below:

``` php
use Kan\Hive\Hive;

$hive = new Hive(
  'name@email.com',
  'password'
);
```

Once that's complete, we need to create a reference to a device using it's ID (Note: You can locate the ID of devices by viewing the URL of the https://my.hivehome.com/dashboard after selecting the required device).

``` php
use Kan\Hive\Reference\Device;

$plug = Device::make('123456ab-7898-7654-c321-d234567e89f1');
```

The device we're using here is a Plug, so, the below code will work for the above `$plug` device:

``` php
use Kan\Hive\Device\Plug;

Plug::fromHive($hive, $plug)->off(); // Will switch the plug off.
Plug::fromHive($hive, $plug)->on();  // Will switch the plug on.
```

That's it, simple. For more advance useage, see the below section.

Advance Usage
-------

We should still instantiate an instance of the helper class `Kan\Hive\Hive`, however, you can utilise a Service Provider to inject this as a dependency into a class. We won't go into depth on how to do that, so for this example, we'll use the same method as above:

``` php
use Kan\Hive\Hive;

$hive = new Hive(
  'name@email.com',
  'password'
);
```

We can now create a new class within our project, let's name it `Lamp` and ensure it extends the correct device class. For this example, that is `Kan\Hive\Device\Plug`, as we have a lamp plugged into a plug. We need to implement the method `getDevice()` to return an instance of the correct device using it's ID, as explained above:

``` php
<?php

namespace App;

use Kan\Hive\Device\Plug;
use Kan\Hive\Reference\Device

class Lamp extends Plug
{

    /**
     * {inheritdoc}
     */
    public function getDevice() : Device
    {
        return Device::make('123456ab-7898-7654-c321-d234567e89f1');
    }

}
```

Now we have our specific device class, we're able to perform actions on those easily like the below:

``` php

$hive->device('App\Lamp')->off(); // Will switch the lamp off.
$hive->device('App\Lamp')->on();  // Will switch the lamp on.

```

Methods
-------

The below outlines the supported devices and actions, along with the methods you're able to use for each:

**Active Plug**: `Kan\Hive\Device\Plug`
- `->on()`: This will switch the plug on.
- `->off()`: This will switch the plug off.

**Camera**: `Kan\Hive\Device\Camera`
- `->on()`: This will arm the camera, enabling features like detection and notifications.
- `->off()`: This will disarm the camera.

**Action**: `Kan\Hive\Device\Action`
- `->trigger()`: This will trigger the pre-defined action to be run.


Testing
-------

Unit tests can be run inside the package:

``` bash
$ ./vendor/bin/phpunit
```


Contributing
-------

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.


License
-------

**kan-agency/hive-php-api** is licensed under the MIT license. See the [LICENSE](LICENSE) file for more details.
