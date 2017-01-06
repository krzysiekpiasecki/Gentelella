 <?php

use PhpCsFixer\Finder;

$finder = (Finder::create())->in([
    sprintf('%s%s%s', __DIR__, DIRECTORY_SEPARATOR, 'src'),
    sprintf('%s%s%s', __DIR__, DIRECTORY_SEPARATOR, 'tests')
]);

return PhpCsFixer\Config::create()
    ->setCacheFile(__DIR__.'/var/cache/php_cs.cache')
    ->setRules(array(
        '@Symfony' => true,
        'full_opening_tag' => false,
    ))
    ->setFinder($finder)
;