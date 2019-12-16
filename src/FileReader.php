<?php declare(strict_types=1);

namespace Nessworthy\AOC;

use Generator;

class FileReader
{
    public const AS_STRING = 'string';
    public const AS_INTEGER = 'integer';

    public static function readLineFrom(string $filePath, $format = self::AS_STRING): Generator
    {
        $resource = fopen($filePath, 'rb');
        while (true) {
            $line = fgets($resource);
            if ($line === false) {
                break;
            }
            yield self::format(trim($line), $format);
        }
        fclose($resource);
    }



    private static function format(string $string, string $format)
    {
        switch($format) {
            case self::AS_INTEGER:
                return (int) $string;
                break;
            case self::AS_STRING;
            default:
                return $string;
                break;
        }
    }

}
