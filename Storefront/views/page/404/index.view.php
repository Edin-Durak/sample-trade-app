<?php $metaTitle = $metaTitle ?? 'Page not found'; ?>
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
                        <h1 class="auth-title">404 · Page not found</h1>
                        <p class="text-secondary">
                            The page you requested does not exist, or the link may be outdated.
                        </p>
                    </div>

                    <a class="btn btn-primary btn-block" href="/">Go to home</a>
                </div>
            </div>
        </main>

        <footer class="auth-footer">SampleTrail · Northfield Water Lab · internal system</footer>
    </div>
</body>

</html>
