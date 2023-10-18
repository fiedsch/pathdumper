<?php

declare(strict_types=1);

namespace Fiedsch\Pathdumper;

use Fiedsch\Pathdumper\Helper\ArrayFlattener;

class Dumper
{
    /**
     * Print the data in a compact format that also shows the "paths" the te respective
     * components of the array. The path being what you would use in a Twig template.
     *
     * @param array $data
     * @return void
     */
    public static function displayData(array $data, bool $showCodePosition = true): void
    {
        // Visual Debug der Datenstruktur
        $flattened = [];
        ArrayFlattener::getReducedArray($data, $flattened);
        if ($showCodePosition) {
            $backtrace = debug_backtrace(0)[0];
            printf("Called in file %s, line %d:\n", $backtrace['file'], $backtrace['line']);
        }
        foreach ($flattened as $k => $v) {
            print "$k => $v\n";
        }
    }

    /**
     * Returns the output of @see displayData() as string.
     *
     * @param array $data
     * @return string
     */
    public static function getDisplayDataAsString(array $data): string
    {
        ob_start();
        self::displayData($data);
        return ob_get_clean();
    }

}
