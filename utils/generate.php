<?php declare(strict_types = 1);

$variants = [
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
    'heavy-vertical' => [
        '│' => '┃',
        '┌' => '┎',
        '┐' => '┒',
        '┘' => '┚',
        '└' => '┖',
        '├' => '┠',
        '┤' => '┨',
        '┬' => '┰',
        '┴' => '┸',
        '┼' => '╂',
        '╵' => '╹',
        '╷' => '╻',
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
        '╪' => '╬',
        '╴' => '╛',
        '╵' => '╙',
        '╶' => '╒',
        '╷' => '╖',
        '.' => '◦',
        '·' => '◦',
    ],
    'double-vertical' => [
        '│' => '║',
        '┌' => '╓',
        '┐' => '╖',
        '┘' => '╜',
        '└' => '╙',
        '├' => '╟',
        '┤' => '╢',
        '┬' => '╥',
        '┴' => '╨',
        '┼' => '╫',
        '╪' => '╬',
        '╵' => '╙',
        '╷' => '╖',
    ],
];

$baseDir = dirname(__DIR__) . '/fonts';

foreach ($variants as $variant => $replacements) {
    foreach (['', '-small', '-slim', '-slim-small'] as $version) {
        echo sprintf('midnight-%s/midnight%s-%s.paf', $variant, $version, $variant) . "\n";
        $input = file_get_contents(sprintf('%s/midnight/midnight%s.paf', $baseDir, $version));
        $output = str_replace(array_keys($replacements), array_values($replacements), $input);
        file_put_contents(
            sprintf('%s/midnight-%s/midnight%s-%s.paf', $baseDir, $variant, $version, $variant),
            $output
        );
    }
}
