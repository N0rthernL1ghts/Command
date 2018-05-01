<?php

namespace NorthernLights\Command\Exception;

use Exception as GenericException;

/**
 * Class ReadOnlyObjectException
 * @package NorthernLights\Command\Exception
 */
class ReadOnlyObjectException extends GenericException implements CommandExceptionInterface
{

}
