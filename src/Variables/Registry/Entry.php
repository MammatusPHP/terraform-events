<?php

declare(strict_types=1);

namespace Mammatus\Terraform\Events\Variables\Registry;

use JsonSerializable;

/** @api */
final readonly class Entry implements JsonSerializable
{
    public function __construct(
        public string $name,
        public mixed $value,
    ) {
    }

    /** @return array{name: string, value: mixed} */
    public function jsonSerialize(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value,
        ];
    }
}
