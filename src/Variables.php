<?php

declare(strict_types=1);

namespace Mammatus\Terraform\Events;

use Mammatus\Terraform\Events\Variables\Registry;
use Mammatus\Terraform\Events\Variables\Registry\Entry;

/** @api */
final readonly class Variables
{
    private function __construct(
        private Registry $registry,
    ) {
    }

    public static function create(): self
    {
        return new self(new Registry());
    }

    public function add(Entry $entry): void
    {
        $this->registry->add($entry);
    }

    /** @return array<string, array{name: string, value: mixed}> */
    public function get(): array
    {
        $values = [];

        foreach ($this->registry->get() as $name => $entry) {
            $values[$name] = $entry->jsonSerialize();
        }

        return $values;
    }
}
