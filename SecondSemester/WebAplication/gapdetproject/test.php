<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php

function create_anchor(
    $text,
    $href = '#',
    $title = '',
    $target = '_self'
)
{
    $href = $href ? sprintf('href="%s"', $href) : '';
    $title = $title ? sprintf('title="%s"', $title) : '';
    $target = $target ? sprintf('target="%s"', $target) : '';

    return "<a $href $title $target>$text</a>";
}


$link = create_anchor(
    'PHP Tutorial', 
    'https://www.phptutorial.net/',
    target: '_blank'
);

echo $link;

?>
</body>
</html>




