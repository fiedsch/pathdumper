# Readme


## What is it

A very small library that helps displaying the data of complex array data structures.
The output is "flattened", i.e. it contains one "path" per leaf of the array's data
(see example below).

## How to use it

```
<?php
require "vendor/autoload.php";

use Fiedsch\Pathdumper\Dumper;

$nested_data = [
  'top_level_a' => [
      'has' => [
          'only', 'one', 'level', 'of', 'nesting',
      ]
  ],
  'top_level_b' => [
    'contains' => [
        'another' => [
            'array', 'with', 'some', 'elements'
        ]
    ]
 ],
 'top_level_c' => 'contains only a scalar value'
];

Dumper::displayData($nested_data);
```

would output 

```
top_level_a.has.0 => only
top_level_a.has.1 => one
top_level_a.has.2 => level
top_level_a.has.3 => of
top_level_a.has.4 => nesting
top_level_b.contains.another.0 => array
top_level_b.contains.another.1 => with
top_level_b.contains.another.2 => some
top_level_b.contains.another.3 => elements
top_level_c => contains only a scalar value
```

If you need the output as string, use `Dumper::getDisplayDataAsString()`.
