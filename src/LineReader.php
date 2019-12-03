<?php declare(strict_types=1);

namespace Nessworthy\AOC;

use Generator;

class LineReader
{
    public const AS_STRING = 'string';
    public const AS_INTEGER = 'integer';

    public static function readLineFrom($filePath, $format = self::AS_STRING): Generator
    {
        $resource = fopen($filePath, 'rb');
        while (true) {
            $line = fgets($resource);
            if ($line === false) {
                break;
            }
            switch($format) {
                case self::AS_INTEGER:
                    yield (int) $line;
                    break;
                case self::AS_STRING;
                default:
                    yield $line;
                    break;
            }
        }
        fclose($resource);
    }
}
