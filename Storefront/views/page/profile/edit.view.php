<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php';

$firstInit = false;
$lastInit = false;
$lastName = false;

if ($user->firstName) {
    $firstInit = mb_substr($user->firstName, 0, 1);
}

if ($user->lastName) {
    $lastInit = mb_substr($user->lastName, 0, 1);
}

if ($user->lastName) {
    $lastName = $user->lastName;
}

?>

<body>
    <div class="app">
        <?php require __DIR__ . '/../../layout/sidebar-view.php'; ?>

        <div class="main">
            <?php require __DIR__ . '/../../layout/header.view.php'; ?>

            <main class="content">
                <div class="stack">

                    <div class="page-header">
                        <div class="row">
                            <span class="avatar avatar-lg" aria-hidden="true"><?= $firstInit . $lastInit ?></span>
                            <div class="page-heading">
                                <h1 class="page-title">
                                    <?= htmlspecialchars($user->firstName) . ' ' . htmlspecialchars($lastName) ?>
                                    <span class="tag">Laboratory <?= htmlspecialchars($roleType) ?></span>
                                </h1>
                                <p class="page-subtitle"><?= htmlspecialchars($user->email) ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="stack">

                        <div class="panel-swap">
                            <input class="panel-swap-toggle visually-hidden" type="checkbox" id="profile-edit-toggle"
                                <?php if (isset($errors['profileErrorMessage'])) : ?> checked <?php endif ?>>

                            <section class="card panel-swap-a">
                                <div class="card-header">
                                    <h2 class="card-title">Profile</h2>
                                    <label class="btn btn-secondary btn-sm" for="profile-edit-toggle">Edit profile</label>
                                </div>
                                <div class="card-body">
                                    <dl class="dl">
                                        <div>
                                            <dt>Full name</dt>
                                            <dd><?= htmlspecialchars($user->firstName) . ' ' . htmlspecialchars($lastName) ?></dd>
                                        </div>
                                        <div>
                                            <dt>Email</dt>
                                            <dd><?= htmlspecialchars($user->email) ?></dd>
                                        </div>
                                        <div>
                                            <dt>Role</dt>
                                            <dd>Laboratory <?= htmlspecialchars($roleType) ?></dd>
                                        </div>
                                        <div>
                                            <dt>Account status</dt>
                                            <dd><span class="badge badge-active">Active</span></dd>
                                        </div>
                                        <div>
                                            <dt>Date added</dt>
                                            <dd class="num"><?= date('d.m.Y', strtotime($user->createdAt)) ?></dd>
                                        </div>
                                    </dl>
                                </div>
                            </section>

                            <section class="card panel-swap-b">
                                <div class="card-header">
                                    <h2 class="card-title">Edit profile</h2>
                                </div>
                                <div class="card-body">
                                    <form class="stack-sm" method="post" action="" novalidate>
                                        <div class="form-grid">
                                            <div class="field">
                                                <label class="label" for="first_name">First name<span class="req" aria-hidden="true">*</span></label>
                                                <input class="input" id="first_name" name="first_name" type="text" value="<?= htmlspecialchars($user->firstName) ?>" required>
                                            </div>
                                            <div class="field">
                                                <label class="label" for="last_name">Last name</label>
                                                <input class="input" id="last_name" name="last_name" type="text" value="<?= htmlspecialchars($lastName) ?>">
                                            </div>

                                            <?php if ($userRole === 1) : ?>
                                                <div class="field">
                                                    <label class="label" for="email">Email<span class="req" aria-hidden="true">*</span></label>
                                                    <input class="input" id="email" name="email" type="email" value="<?= htmlspecialchars($user->email) ?>" required>
                                                </div>

                                                <div class="field">
                                                    <label class="label" for="role_id">Role<span class="req" aria-hidden="true">*</span></label>
                                                    <select class="select" id="role_id" name="role_id" required>
                                                        <?php foreach ($roleList as $roleOption): ?>
                                                            <option
                                                                value="<?= $roleOption['id'] ?>"
                                                                <?= $user->roleId === $roleOption['id'] ? 'selected' : '' ?>>
                                                                <?= htmlspecialchars($roleOption['role_name']) ?>
                                                            </option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            <?php else: ?>
                                                <div class="field">
                                                    <label class="label" for="email">Email</label>
                                                    <input class="input" id="email" type="email" value="<?= htmlspecialchars($user->email) ?>" disabled>
                                                    <span class="help">Ask an administrator to change your sign-in email.</span>
                                                </div>

                                                <div class="field">
                                                    <span class="label">Role</span>
                                                    <div class="readonly-field">Laboratory <?= htmlspecialchars($roleType) ?></div>
                                                    <span class="permission-note">
                                                        <span class="icon icon-lock" aria-hidden="true"></span>
                                                        Set by an administrator
                                                    </span>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="row row-end">
                                            <input type="hidden" name="profile" value="true">
                                            <label class="btn btn-secondary" for="profile-edit-toggle">Cancel</label>
                                            <button class="btn btn-primary" type="submit" value="profile">Save profile</button>
                                        </div>

                                        <?php if (isset($errors['profileErrorMessage'])) : ?>
                                            <p class="alert danger">
                                                <?= $errors['profileErrorMessage']; ?>
                                            </p>
                                        <?php endif ?>
                                    </form>
                                </div>
                            </section>
                        </div>

                        <section class="card" aria-labelledby="pw-title">
                            <div class="card-header">
                                <h2 class="card-title" id="pw-title">Change password</h2>
                            </div>
                            <form class="card-body stack-sm" method="post" action="" novalidate>
                                <div class="form-grid">
                                    <div class="field span-2">
                                        <label class="label" for="current_password">Current password<span class="req" aria-hidden="true">*</span></label>
                                        <div class="password-field">
                                            <input class="input" id="current_password" name="current_password" type="password" autocomplete="current-password" value="<?= htmlspecialchars($user->password) ?>" readonly>
                                            <button class="password-toggle" type="button" aria-controls="current_password" aria-pressed="false">Show</button>
                                            <span class="help absolute">This field is read only.</span>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="new_password">New password<span class="req" aria-hidden="true">*</span></label>
                                        <div class="password-field">
                                            <input class="input" id="new_password" name="new_password" type="password" autocomplete="new-password" required>
                                            <button class="password-toggle" type="button" aria-controls="new_password" aria-pressed="false">Show</button>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="confirm_password">Confirm new password<span class="req" aria-hidden="true">*</span></label>
                                        <div class="password-field">
                                            <input class="input" id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" required>
                                            <button class="password-toggle" type="button" aria-controls="confirm_password" aria-pressed="false">Show</button>
                                        </div>
                                    </div>
                                    <?php if (isset($errors['passwordErrorMessage'])) : ?>
                                        <p class="alert danger">
                                            <?= $errors['passwordErrorMessage']; ?>
                                        </p>
                                    <?php endif ?>
                                </div>
                                <div class="row row-end">
                                    <input type="hidden" name="password" value="true">
                                    <button class="btn btn-primary" type="submit">Update password</button>
                                </div>
                            </form>
                        </section>

                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        document.querySelectorAll('.password-toggle').forEach((passwordToggle) => {
            passwordToggle.addEventListener('click', () => {
                const passwordInput = passwordToggle.closest('.password-field').querySelector('.input');
                const isVisible = passwordInput.type === 'text';

                passwordInput.type = isVisible ? 'password' : 'text';
                passwordToggle.textContent = isVisible ? 'Show' : 'Hide';
                passwordToggle.setAttribute('aria-pressed', String(!isVisible));
            });
        });
    </script>
</body>

</html>