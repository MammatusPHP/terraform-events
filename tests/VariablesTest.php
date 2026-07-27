<?php

declare(strict_types=1);

namespace Mammatus\Tests\Terraform\Events;

use Mammatus\Terraform\Events\Variables;
use Mammatus\Terraform\Events\Variables\Registry\Entry;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class VariablesTest extends TestCase
{
    /** @return iterable<string, array{0: array<Entry>, 1: array<string, array{name: string, value: mixed}>}> */
    public static function provideEntries(): iterable
    {
        yield 'basic' => [
            [
                new Entry('app_name', 'mammatus-demo'),
                new Entry('replicas', 3),
            ],
            [
                'app_name' => [
                    'name' => 'app_name',
                    'value' => 'mammatus-demo',
                ],
                'replicas' => [
                    'name' => 'replicas',
                    'value' => 3,
                ],
            ],
        ];
    }

    /**
     * @param array<Entry>                                     $entries
     * @param array<string, array{name: string, value: mixed}> $expected
     */
    #[DataProvider('provideEntries')]
    #[Test]
    public function get(array $entries, array $expected): void
    {
        $variables = Variables::create();

        foreach ($entries as $entry) {
            $variables->add($entry);
        }

        self::assertSame($expected, $variables->get());
    }
}
