<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Methods\NoNullableReturnTypeDeclarationRule\Success;

interface MethodInInterfaceWithReturnTypeDeclaration
{
    public function toString(): string;
}
