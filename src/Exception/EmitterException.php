<?php
/**
 * @see       https://github.com/zendframework/zend-httphandlerrunner for the canonical source repository
 * @copyright Copyright (c) 2018 Zend Technologies USA Inc. (https://www.zend.com)
 * @license   https://github.com/zendframework/zend-httphandlerrunner/blob/master/LICENSE.md New BSD License
 */

declare(strict_types=1);

namespace Zend\HttpHandlerRunner\Exception;

use RuntimeException;

class EmitterException extends RuntimeException implements ExceptionInterface
{
    public static function forHeadersSent(string $file, int $line) : self
    {
        return new self(
            sprintf(
                'Unable to emit response; headers already sent, output started at %s:%d',
                $file,
                $line
            )
        );
    }

    public static function forOutputSent() : self
    {
        return new self('Output has been emitted previously; cannot emit response');
    }
}
