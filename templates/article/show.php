
<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article->getTitle()) ?></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        
        <h1 class="my-4"><?= htmlspecialchars($article->getTitle()) ?></h1>
        
        
        <p><?= nl2br(htmlspecialchars($article->getDescription())) ?></p>

        
        <h3>Commentaires</h3>
        <div class="list-group">
            
            <?php if (empty($comments)) : ?>
                <p>Aucun commentaire pour cet article.</p>
            <?php else : ?>
                
                <?php foreach ($comments as $comment) : ?>
                    <div class="list-group-item">
                        <p><strong>User <?= htmlspecialchars($comment->getUserId()) ?>:</strong> <?= nl2br(htmlspecialchars($comment->getComment())) ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

       
        <h4>Ajouter un commentaire</h4>
        <form action="index.php?controller=article&action=show&id=<?= $article->getId() ?>" method="POST">
            <div class="mb-3">
                <textarea class="form-control" name="comment" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter le commentaire</button>
        </form>
    </div>
</body>
</html>
<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>
