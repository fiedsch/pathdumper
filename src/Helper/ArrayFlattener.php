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
            if (is_scalar($data[$k]) || null === $data[$k]) {
                $result[$newKey] = match (gettype($data[$k])) {
                    'boolean' => $data[$k] ? 'true' : 'false',
                    'string' => '"'.$data[$k].'"',
                    'NULL' => 'null',
                    default => $data[$k],
                };
            } else {
                if (is_array($data[$k])) {
                    if (empty($data[$k])) {
                        $result[$newKey] = '[]';
                    } else {
                        self::getReducedArray($data[$k], $result, $newKey);
                    }
                } else {
                    $result[$newKey] = sprintf('%s', get_class($data[$k]));
                }
            }
        }
    }
}
