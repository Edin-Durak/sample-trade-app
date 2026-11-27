<?php $metaTitle = $metaTitle ?? 'Unauthorized'; ?>
<!DOCTYPE html>
<html lang="en">

<?php

require __DIR__ . '/../meta/head.view.php';


### Dynamically adjusted content based on whether the user is logged in

if (isset($_SESSION['user'])) {

    $userIsSignedIn = true;
} else {
    $userIsSignedIn = false;
}

if ($userIsSignedIn) {

    $textMessage = 'Unauthorized access to the reqeusted page. Go back to the home page!';
    $ctaUrl = '/';
    $ctaLabel = 'Home page';
} else {

    $textMessage = 'Unauthorized access to the reqeusted page. Sign in first!';
    $ctaUrl = '/login';
    $ctaLabel = 'Sign in';
}

?>

<body>
    <div class="auth-page">
        <main class="auth-main">
            <div class="auth-wrap">
                <div class="auth-card">
                    <div class="auth-brand">
                        <span class="brand-mark">
                            <span class="icon icon-logo" aria-hidden="true"></span>
                        </span>
                        <span class="brand-name">
                            SampleTrail
                            <span class="brand-sub">Northfield Water Lab</span>
                        </span>
                    </div>

                    <div class="auth-intro">
                        <h1 class="auth-title">401 · Unauthorized</h1>
                        <p class="text-secondary">
                            <?= $textMessage ?>
                        </p>
                    </div>

                    <a class="btn btn-primary btn-block" href=<?= $ctaUrl ?>><?= $ctaLabel ?></a>
                </div>
            </div>
        </main>

        <footer class="auth-footer">SampleTrail · Northfield Water Lab · internal system</footer>
    </div>
</body>

</html>