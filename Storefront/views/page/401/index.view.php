<?php $metaTitle = $metaTitle ?? 'Unauthorized'; ?>
<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php'; ?>

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
                            Unauthorized access to the reqeusted page. Sign in first!
                        </p>
                    </div>

                    <a class="btn btn-primary btn-block" href="/login">Sign in</a>
                </div>
            </div>
        </main>

        <footer class="auth-footer">SampleTrail · Northfield Water Lab · internal system</footer>
    </div>
</body>

</html>