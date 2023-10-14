<?php

declare(strict_types=1);

namespace Fiedsch\Pathdumper\Helper;

class ArrayFlattener
{
    /**
     * @param array $data
     * @param array $result
     * @param string $leadingKey
     * @return void
     */
    public static function getReducedArray(array $data, array &$result, string $leadingKey = ''): void
    {
        foreach (array_keys($data) as $k) {
            $newKey = '' === $leadingKey ? $k : "$leadingKey.$k";
                $result[$newKey] = $data[$k];
            if (is_scalar($data[$k]) || null === $data[$k]) {
            } else {
                    $result[$newKey] = '[]';
                if (is_array($data[$k])) {
                } else {
                    self::getReducedArray($data[$k], $result, $newKey);
                }
            }
        }
    }
}
