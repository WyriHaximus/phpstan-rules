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

namespace Localheinz\PHPStan\Rules\Functions;

use PhpParser\Node;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;

final class NoParameterWithNullDefaultValueRule implements Rule
{
    public function getNodeType(): string
    {
        return Node\Stmt\Function_::class;
    }

    /**
     * @param Node\Stmt\Function_ $node
     * @param Scope               $scope
     *
     * @return array
     */
    public function processNode(Node $node, Scope $scope): array
    {
        if (0 === \count($node->params)) {
            return [];
        }

        $params = \array_filter($node->params, static function (Node\Param $node): bool {
            if (!$node->default instanceof Node\Expr\ConstFetch) {
                return false;
            }

            return 'null' === $node->default->name->toLowerString();
        });

        if (0 === \count($params)) {
            return [];
        }

        $functionName = $node->namespacedName;

        return \array_map(static function (Node\Param $node) use ($functionName): string {
            /** @var Node\Expr\Variable $variable */
            $variable = $node->var;

            /** @var string $parameterName */
            $parameterName = $variable->name;

            return \sprintf(
                'Function %s() has parameter $%s with null as default value.',
                $functionName,
                $parameterName
            );
        }, $params);
    }
}
