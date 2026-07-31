# Terraform related Events

![Continuous Integration](https://github.com/MammatusPHP/terraform-events/workflows/Continuous%20Integration/badge.svg)
[![Latest Stable Version](https://poser.pugx.org/mammatus/terraform-events/v/stable.png)](https://packagist.org/packages/mammatus/terraform-events)
[![Total Downloads](https://poser.pugx.org/mammatus/terraform-events/downloads.png)](https://packagist.org/packages/mammatus/terraform-events/stats)
[![License](https://poser.pugx.org/mammatus/terraform-events/license.png)](https://packagist.org/packages/mammatus/terraform-events)

# Install

To install via [Composer](http://getcomposer.org/), use the command below, it will automatically detect the latest version and bind it with `^`.

```
composer require mammatus/terraform-events
```

# Events

This package provides the following events:

## Variables

This event is emitted when Terraform tfvars are being collected from a Mammatus application. Register a
[`wyrihaximus/broadcast`](https://github.com/wyrihaximus/php-broadcast) listener and use `add` to register entries
that will be returned through `get` and encoded as HCL tfvars by
[`mammatus/terraform`](https://github.com/MammatusPHP/terraform).

```php
<?php

declare(strict_types=1);

namespace MyApp\Terraform;

use Mammatus\Terraform\Events\Variables;
use Mammatus\Terraform\Events\Variables\Registry\Entry;
use WyriHaximus\Broadcast\Contracts\Listener;

final class VariablesListener implements Listener
{
    public function vars(Variables $variables): void
    {
        $variables->add(new Entry('app_name', 'mammatus-demo'));
        $variables->add(new Entry('replicas', 3));
    }
}
```

When multiple listeners register the same variable name, the last one wins.

# License

The MIT License (MIT)

Copyright (c) 2026 Cees-Jan Kiewiet

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
