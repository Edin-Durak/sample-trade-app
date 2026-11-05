<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php'; ?>

<body>
    <div class="auth-page">
        <main class="auth-main">
            <div class="auth-wrap">
                <form class="auth-card" method="post" action="" novalidate aria-labelledby="signin-title">
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
                        <h1 class="auth-title" id="signin-title">Sign in to SampleTrail</h1>
                        <p class="text-secondary">Use your laboratory account.</p>
                    </div>

                    <div class="field">
                        <label class="label" for="email_address">Email</label>
                        <input
                            class="input"
                            id="email_address"
                            name="email_address"
                            type="email"
                            autocomplete="username"
                            placeholder="name@northfield-lab.example"
                            required
                            <?php if ($email_address) : ?>
                            value="<?= $email_address ?>"
                            <?php endif ?>>
                    </div>

                    <div class="field">
                        <label class="label" for="password">Password</label>
                        <div class="password-field">
                            <input
                                class="input"
                                id="password"
                                name="password"
                                type="password"
                                autocomplete="current-password"
                                required
                                <?php if ($passowrd) : ?>
                                value="<?= $passowrd ?>"
                                <?php endif ?>>
                            <button
                                class="password-toggle"
                                type="button"
                                aria-controls="password"
                                aria-pressed="false">
                                Show
                            </button>
                        </div>
                        <?php if (isset($errors['error_message'])) : ?>
                            <p class="alert danger">
                                <?= $errors['error_message']; ?>
                            </p>
                        <?php endif ?>
                    </div>

                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1">
                        Remember me on this device
                    </label>

                    <button class="btn btn-primary btn-block" type="submit">Sign in</button>

                    <div class="auth-restricted">
                        <span class="icon icon-lock" aria-hidden="true"></span>
                        <span>Access is restricted to authorized laboratory personnel. Accounts are created by a laboratory administrator — there is no public registration.</span>
                    </div>
                </form>
            </div>
        </main>

        <footer class="auth-footer">SampleTrail · Northfield Water Lab · internal system</footer>
    </div>

    <script>
        // Password toggle
        const passwordInput = document.getElementById('password');
        const passwordToggle = document.querySelector('.password-toggle');

        passwordToggle.addEventListener('click', () => {
            const isVisible = passwordInput.type === 'text';

            passwordInput.type = isVisible ? 'password' : 'text';
            passwordToggle.textContent = isVisible ? 'Show' : 'Hide';
            passwordToggle.setAttribute('aria-pressed', String(!isVisible));
        });
    </script>
</body>

</html>