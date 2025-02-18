<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>
<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Liste des articles</h1>

        <?php if (empty($articles)) : ?>
            <p>Aucun article disponible.</p>
        <?php else : ?>
            <div class="list-group">
                <?php foreach ($articles as $article) : ?>
                    <a href="index.php?controller=article&action=show&id=<?= $article->getId(); ?>" class="list-group-item list-group-item-action">
                        <h5><?= htmlspecialchars($article->getTitle()); ?></h5>
                        <p><?= htmlspecialchars(substr($article->getDescription(), 0, 150)) . '...'; ?></p>
                        <small><strong>Lire plus</strong></small>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>
