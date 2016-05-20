 <?php

    $finder = Symfony\CS\Finder\DefaultFinder::create()
        ->in([
            sprintf('%s%s%s', __DIR__, DIRECTORY_SEPARATOR, 'src'),
            sprintf('%s%s%s', __DIR__, DIRECTORY_SEPARATOR, 'tests')
        ]);

    return Symfony\CS\Config\Config::create()
        ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
        ->finder($finder);