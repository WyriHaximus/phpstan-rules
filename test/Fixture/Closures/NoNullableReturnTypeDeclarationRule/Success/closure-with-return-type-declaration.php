<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Closures\NoNullableReturnTypeDeclarationRule\Success;

$foo = function (): string {
    return 'Hello';
};
