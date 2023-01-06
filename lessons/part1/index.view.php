<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laracast</title>
</head>

<body>

    <h1>Recommended books </h1>
    <ul>
        <?php foreach ($filteredbooks as $book) : ?>
            <li>
                <a href="<?= $book['purchaseUrl'] ?>">
                    <?= $book['name'] ?> - By <?= $book['author'] ?>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</body>

</html>