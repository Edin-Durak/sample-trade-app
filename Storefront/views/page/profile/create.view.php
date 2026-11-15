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

                    <div class="stack stack-sm">
                        <nav aria-label="Breadcrumb">
                            <div class="row">
                                <a href="/">Dashboard</a>
                                <span class="text-secondary" aria-hidden="true">/</span>
                                <a href="/profiles">Laboratory technicians</a>
                                <span class="text-secondary" aria-hidden="true">/</span>
                                <span aria-current="page">Add technician</span>
                            </div>
                        </nav>

                        <div class="page-header">
                            <div class="page-heading">
                                <h1 class="page-title">Add technician</h1>
                                <p class="page-subtitle">Create an account that can sign in to SampleTrail. The person will set their own password from an invitation email.</p>
                            </div>
                        </div>
                    </div>

                    <div class="grid grid-main-aside">

                        <form class="card" method="post" action="" novalidate>
                            <div class="card-header">
                                <h2 class="card-title">Account</h2>
                                <span class="t-caption"><span class="req">*</span> Required field</span>
                            </div>

                            <div class="card-body">
                                <div class="form-grid">
                                    <div class="field">
                                        <label class="label" for="first_name">First name<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="first_name" name="first_name" type="text" autocomplete="off" required>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="last_name">Last name</label>
                                        <input class="input" id="last_name" name="last_name" type="text" autocomplete="off">
                                    </div>

                                    <div class="field span-2">
                                        <label class="label" for="email">Email<span class="req" aria-hidden="true">*</span></label>
                                        <input class="input" id="email" name="email" type="email" autocomplete="off" placeholder="name@northfield-lab.example" required>
                                        <span class="help">Used to sign in and to receive the account setup invitation.</span>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="role_id">Role<span class="req" aria-hidden="true">*</span></label>
                                        <select class="select" id="role_id" name="role_id" required>
                                            <option value="2" selected>Laboratory technician</option>
                                            <option value="1">Administrator</option>
                                        </select>
                                        <span class="help">Technicians do laboratory work. Administrators can also manage users and configuration.</span>
                                    </div>

                                    <div class="field">
                                        <label class="label" for="is_active">Account status<span class="req" aria-hidden="true">*</span></label>
                                        <select class="select" id="is_active" name="is_active" required>
                                            <option value="1" selected>Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                        <span class="help">Inactive accounts cannot sign in. New accounts can be left Active so they sign in after setting a password.</span>
                                    </div>

                                    <div class="field span-2">
                                        <label class="label" for="notes">Notes <span class="optional">(optional)</span></label>
                                        <textarea class="textarea" id="notes" name="notes" rows="3" placeholder="Shift, training status, start date…"></textarea>
                                        <span class="help">Visible to administrators only.</span>
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <div class="row row-end">
                                    <a class="btn btn-secondary" href="/profiles">Cancel</a>
                                    <button class="btn btn-primary" type="submit">Create account</button>
                                </div>
                            </div>
                        </form>

                        <aside class="stack">
                            <section class="card">
                                <div class="card-header">
                                    <h2 class="card-title">Password setup</h2>
                                </div>
                                <div class="card-body stack-sm">
                                    <div class="row">
                                        <span class="badge badge-invited">Invitation pending</span>
                                    </div>
                                    <p class="text-secondary">
                                        After saving, the person receives an email with a one-time link to choose their own password.
                                        Until they do, the account shows “Invitation pending” and cannot sign in.
                                    </p>
                                    <p class="t-caption">
                                        There is deliberately no password field here. The PHP backend should create an invitation token and store only a password hash.
                                    </p>
                                </div>
                            </section>

                            <section class="card">
                                <div class="card-header">
                                    <h2 class="card-title">What each role can do</h2>
                                </div>
                                <div class="card-body stack-sm">
                                    <p class="t-caption">
                                        <span class="tag">Laboratory technician</span>
                                        Record samples and measurements, view results, update corrective actions assigned to them, edit their own profile.
                                    </p>
                                    <p class="t-caption">
                                        <span class="tag tag-admin">Administrator</span>
                                        Everything above, plus user management, sample type and parameter configuration, reviews and audited corrections.
                                    </p>
                                </div>
                            </section>
                        </aside>

                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>