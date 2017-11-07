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
            $bundles[] = new Symfony\Bundle\DebugBundle\DebugBundle();
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            
            // HERE!
            $bundles[] = new \Sidus\DoctrineDebugBundle\SidusDoctrineDebugBundle();

            if ('dev' === $this->getEnvironment()) {
                $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
                $bundles[] = new Symfony\Bundle\WebServerBundle\WebServerBundle();
            }
        }

        return $bundles;
    }
    // ...
}
```
