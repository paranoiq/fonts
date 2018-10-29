<?php declare(strict_types = 1);

if (empty($argv[1])) {
    echo "usage:\n";
    echo "`php generate.php variant input/file/path.paf`\n";
}

$replacements = [
    'rounded' => [
        '┌' => '╭',
        '┐' => '╮',
        '┘' => '╯',
        '└' => '╰',
    ],
    'dashed' => [
        '─' => '┄',
        '│' => '┊',
    ],
    'rounded-dashed' => [
        '┌' => '╭',
        '┐' => '╮',
        '┘' => '╯',
        '└' => '╰',
        '─' => '┄',
        '│' => '┊',
    ],
    'heavy' => [
        '─' => '━',
        '│' => '┃',
        '┌' => '┏',
        '┐' => '┓',
        '┘' => '┛',
        '└' => '┗',
        '├' => '┣',
        '┤' => '┫',
        '┬' => '┳',
        '┴' => '┻',
        '┼' => '╋',
        '╴' => '╸',
        '╵' => '╹',
        '╶' => '╺',
        '╷' => '╻',
        '.' => '•',
        '·' => '•',
    ],
    'heavy-dashed' => [
        '─' => '┅',
        '│' => '┋',
        '┌' => '┏',
        '┐' => '┓',
        '┘' => '┛',
        '└' => '┗',
        '├' => '┣',
        '┤' => '┫',
        '┬' => '┳',
        '┴' => '┻',
        '┼' => '╋',
        '╴' => '╸',
        '╵' => '╹',
        '╶' => '╺',
        '╷' => '╻',
        '.' => '•',
        '·' => '•',
    ],
    'double' => [
        '─' => '═',
        '│' => '║',
        '┌' => '╔',
        '┐' => '╗',
        '┘' => '╝',
        '└' => '╚',
        '├' => '╠',
        '┤' => '╣',
        '┬' => '╦',
        '┴' => '╩',
        '┼' => '╬',
        '╴' => '╛',
        '╵' => '╙',
        '╶' => '╒',
        '╷' => '╖',
        '.' => '◦',
        '·' => '◦',
    ],
];

$variant = $argv[1];
$path = $argv[2];

// foo.paf -> foo-variant.paf
$input = file_get_contents($path);
$output = str_replace(array_keys($replacements[$variant]), array_values($replacements[$variant]), $input);
file_put_contents(
    sprintf('%s-%s.paf', substr($path, 0, -4), $variant),
    $output
);
