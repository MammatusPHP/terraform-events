<?php

declare(strict_types=1);

namespace Mammatus\Terraform\Events\Variables;

use Mammatus\Terraform\Events\Variables\Registry\Entry;

final class Registry
{
    /** @var array<string, Entry> */
    private array $entries = [];

    public function add(Entry $entry): void
    {
        $this->entries[$entry->name] = $entry;
    }

    /** @return array<string, Entry> */
    public function get(): array
    {
        return $this->entries;
    }
}
