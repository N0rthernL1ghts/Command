<?php

namespace NorthernLights\Command\Exception;

use Exception as GenericException;

/**
 * Class ReadOnlyObjectException.
 */
class ReadOnlyObjectException extends GenericException implements CommandExceptionInterface
{
}
