<!DOCTYPE html>
<html lang="en">

<?php require __DIR__ . '/../meta/head.view.php'; ?>

<body>
    <div class="app">
        <?php require __DIR__ . '/../../layout/sidebar-view.php'; ?>

        <div class="main">
            <?php require __DIR__ . '/../../layout/header.view.php'; ?>

            <main class="content">
                <div class="stack">

                    <div class="page-header">
                        <div class="row">
                            <span class="avatar avatar-lg" aria-hidden="true">AS</span>
                            <div class="page-heading">
                                <h1 class="page-title">
                                    Amra Selimović
                                    <span class="tag">Laboratory technician</span>
                                </h1>
                                <p class="page-subtitle">a.selimovic@northfield-lab.example</p>
                            </div>
                        </div>
                    </div>

                    <div class="stack">

                        <div class="panel-swap">
                            <input class="panel-swap-toggle visually-hidden" type="checkbox" id="profile-edit-toggle">

                            <section class="card panel-swap-a">
                                <div class="card-header">
                                    <h2 class="card-title">Profile</h2>
                                    <label class="btn btn-secondary btn-sm" for="profile-edit-toggle">Edit profile</label>
                                </div>
                                <div class="card-body">
                                    <dl class="dl">
                                        <div>
                                            <dt>Full name</dt>
                                            <dd>Amra Selimović</dd>
                                        </div>
                                        <div>
                                            <dt>Email</dt>
                                            <dd>a.selimovic@northfield-lab.example</dd>
                                        </div>
                                        <div>
                                            <dt>Role</dt>
                                            <dd>Laboratory technician</dd>
                                        </div>
                                        <div>
                                            <dt>Account status</dt>
                                            <dd><span class="badge badge-active">Active</span></dd>
                                        </div>
                                        <div>
                                            <dt>Date added</dt>
                                            <dd class="num">03 Mar 2025</dd>
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
                                                <input class="input" id="first_name" name="first_name" type="text" value="Amra" required>
                                            </div>
                                            <div class="field">
                                                <label class="label" for="last_name">Last name<span class="req" aria-hidden="true">*</span></label>
                                                <input class="input" id="last_name" name="last_name" type="text" value="Selimović" required>
                                            </div>
                                            <div class="field">
                                                <label class="label" for="email">Email</label>
                                                <input class="input" id="email" type="email" value="a.selimovic@northfield-lab.example" disabled>
                                                <span class="help">Ask an administrator to change your sign-in email.</span>
                                            </div>
                                            <div class="field">
                                                <span class="label">Role</span>
                                                <div class="readonly-field">Laboratory technician</div>
                                                <span class="permission-note">
                                                    <span class="icon icon-lock" aria-hidden="true"></span>
                                                    Set by an administrator
                                                </span>
                                            </div>
                                        </div>
                                        <div class="row row-end">
                                            <label class="btn btn-secondary" for="profile-edit-toggle">Cancel</label>
                                            <button class="btn btn-primary" type="submit">Save profile</button>
                                        </div>
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
                                            <input class="input" id="current_password" name="current_password" type="password" autocomplete="current-password" required>
                                            <button class="password-toggle" type="button" aria-controls="current_password" aria-pressed="false">Show</button>
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="new_password">New password<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="new_password" name="new_password" type="password" autocomplete="new-password" required>
                                        <span class="help">At least 12 characters.</span>
                                    </div>
                                    <div class="field">
                                        <label class="label" for="confirm_password">Confirm new password<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="confirm_password" name="confirm_password" type="password" autocomplete="new-password" required>
                                    </div>
                                </div>
                                <div class="row row-end">
                                    <button class="btn btn-primary" type="submit">Update password</button>
                                </div>
                            </form>
                        </section>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>
