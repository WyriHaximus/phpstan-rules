<?php

declare(strict_types=1);

namespace Localheinz\PHPStan\Rules\Test\Fixture\Classes\NoExtendsRuleWithClassesAllowedToBeExtended\Success;

use PHPUnit\Framework\TestCase;

/**
 * @internal
 */
final class ClassExtendingPhpUnitFrameworkTestCase extends TestCase
{
}
