<?php

declare(strict_types=1);

/**
 * Copyright (c) 2018 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/phpstan-rules
 */

use Localheinz\PhpCsFixer\Config;

$header = <<<'EOF'
Copyright (c) 2018 Andreas Möller

For the full copyright and license information, please view
the LICENSE file that was distributed with this source code.

@see https://github.com/localheinz/phpstan-rules
EOF;

$config = Config\Factory::fromRuleSet(new Config\RuleSet\Php71($header));

$config->getFinder()
    ->ignoreDotFiles(false)
    ->in(__DIR__)
    ->exclude([
        '.github',
        '.build',
        '.travis',
        'test/Fixture',
    ])
    ->name('.php_cs');

$directory = \getenv('TRAVIS') ? \getenv('HOME') : __DIR__;

$config->setCacheFile($directory . '/.build/php-cs-fixer/.php_cs.cache');

return $config;
