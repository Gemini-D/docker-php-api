<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace Docker\API\Exception;

use RuntimeException;

class ServiceUnavailableException extends RuntimeException implements ServerException
{
    public function __construct(string $message)
    {
        parent::__construct($message, 503);
    }
}
