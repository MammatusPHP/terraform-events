<?php

declare(strict_types=1);

namespace Mammatus\Tests\Terraform\Events\Variables;

use Mammatus\Terraform\Events\Variables\Registry;
use Mammatus\Terraform\Events\Variables\Registry\Entry;
use PHPUnit\Framework\Attributes\Test;
use WyriHaximus\TestUtilities\TestCase;

final class RegistryTest extends TestCase
{
    #[Test]
    public function addAndGet(): void
    {
        $registry = new Registry();
        $entry    = new Entry('foo', 'bar');

        $registry->add($entry);

        self::assertSame(
            ['foo' => $entry],
            $registry->get(),
        );
    }

    #[Test]
    public function addOverwritesExistingEntryWithSameName(): void
    {
        $registry = new Registry();
        $registry->add(new Entry('foo', 'bar'));
        $updated = new Entry('foo', 'baz');

        $registry->add($updated);

        self::assertSame(['foo' => $updated], $registry->get());
    }
}
