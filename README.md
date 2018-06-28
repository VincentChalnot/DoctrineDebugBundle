Sidus/DoctrineDebugBundle Documentation
==================================

## Introduction

This bundle adds a stack trace to each doctrine query in the profiler.

![Example](Resources/documentation/exemple.png)

## Installation

### Require the bundle with composer:

````bash
$ composer require sidus/doctrine-debug-bundle "~1.0"
````

### Add the bundle to AppKernel.php

```php
<?php

use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
        ];

        if (in_array($this->getEnvironment(), ['dev', 'test'], true)) {
            // ...

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();

                // HERE!
                $bundles[] = new Sidus\DoctrineDebugBundle\SidusDoctrineDebugBundle();
            }
        }

        return $bundles;
    }
    // ...
}
```

## Changelog

### v1.0.2
Doesn't require xdebug to be installed anymore.

### v1.0.1
Fixing compatibility with Web Profiler 4
