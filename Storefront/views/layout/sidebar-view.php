<aside class="sidebar" aria-label="Main navigation">
    <a class="brand" href="/">
        <span class="brand-mark"><span class="icon icon-logo" aria-hidden="true"></span></span>
        <span class="brand-name">SampleTrail<span class="brand-sub">Northfield Water Lab</span></span>
    </a>

    <?php
    $uri = parse_url($_SERVER['REQUEST_URI']);
    $currentPageUri = $uri['path'];

    ?>
    <!-- Navigation for Administrator -->
    <nav class="nav" aria-label="Administrator">
        <div class="nav-group">
            <span class="nav-heading">Overview</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/') ?>" href="/" aria-current="page">
                <span class="icon icon-dashboard" aria-hidden="true"></span>Dashboard
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">Laboratory operations</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '#') ?>" href="#">
                <span class="icon icon-samples" aria-hidden="true"></span>Samples
            </a>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-results" aria-hidden="true"></span>Measurement Results
            </a>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-actions" aria-hidden="true"></span>Corrective Actions
                <span class="nav-count" aria-label="4 not closed">4</span>
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">Laboratory configuration</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-sample-types" aria-hidden="true"></span>Sample Types
            </a>
            <a class="nav-link" href="#">
                <span class="icon icon-parameters" aria-hidden="true"></span>Measurement Parameters
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">User management</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-technicians" aria-hidden="true"></span>Laboratory Technicians
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">Personal</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/profile') ?>" href=<?= "/profile?id={$userId}" ?>>
                <span class="icon icon-profile" aria-hidden="true"></span>My Profile
            </a>
        </div>
    </nav>

    <!-- Navigation for technician -->
    <!-- Hide for now 
    <nav class="nav" aria-label="Technician">
        <div class="nav-group">
            <span class="nav-heading">Overview</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/') ?>" href="/">
                <span class="icon icon-dashboard" aria-hidden="true"></span>Dashboard
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">Laboratory work</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-samples" aria-hidden="true"></span>Samples
            </a>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-record-sample" aria-hidden="true"></span>Record Sample
            </a>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-results" aria-hidden="true"></span>Measurement Results
            </a>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/url') ?>" href="#">
                <span class="icon icon-actions" aria-hidden="true"></span>Corrective Actions
            </a>
        </div>

        <div class="nav-group">
            <span class="nav-heading">Personal</span>
            <a class="nav-link <?php isActiveUrl($currentPageUri, '/profile') ?>" href="/profile">
                <span class="icon icon-profile" aria-hidden="true"></span>My Profile
            </a>
        </div>
    </nav>
    -->
    <div class="sidebar-footer">
        <div class="label-muted">Laboratory</div>
        <div class="label-strong">Unit 2 · Water &amp; steam chemistry</div>
    </div>
</aside>