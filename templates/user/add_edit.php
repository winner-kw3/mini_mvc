<?php require_once _TEMPLATEPATH_ . '/header.php'; ?>


<h1><?= $pageTitle; ?></h1>

<form method="POST">
    <div class="mb-3">
        <label for="first_name" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="first_name" name="first_name" value="<?= htmlspecialchars($user->getFirstName() ?? '') ?>">
        <?php if (isset($errors['first_name'])): ?>
            <div class="text-danger"><?= $errors['first_name']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Nom</label>
        <input type="text" class="form-control" id="last_name" name="last_name" value="<?= htmlspecialchars($user->getLastName() ?? '') ?>">
        <?php if (isset($errors['last_name'])): ?>
            <div class="text-danger"><?= $errors['last_name']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user->getEmail() ?? '') ?>">
        <?php if (isset($errors['email'])): ?>
            <div class="text-danger"><?= $errors['email']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password" value="">
        <?php if (isset($errors['password'])): ?>
            <div class="text-danger"><?= $errors['password']; ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="confirm_password" class="form-label">Confirmer le mot de passe</label>
        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="">
        <?php if (isset($errors['confirm_password'])): ?>
            <div class="text-danger"><?= $errors['confirm_password']; ?></div>
        <?php endif; ?>
    </div>

    <input type="submit" name="saveUser" class="btn btn-primary" value="Enregistrer">
</form>

<?php require_once _TEMPLATEPATH_ . '/footer.php'; ?>
