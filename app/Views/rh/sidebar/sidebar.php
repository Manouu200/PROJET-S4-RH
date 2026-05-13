<?php
$activePage = $activePage ?? '';
$userInitials = $userInitials ?? 'MR';
$userName = $userName ?? 'Marie Rabe';
$userRole = $userRole ?? 'Responsable RH';
$showMenuLabel = $showMenuLabel ?? true;
$showBadge = $showBadge ?? false;
$badgeCount = $badgeCount ?? '4';
$logoutLink = $logoutLink ?? '';
?>
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-logo-icon"><i class="bi bi-person-check"></i></div>
        <div class="sidebar-brand-name">TechMada RH<span>Espace responsable</span></div>
    </div>
    <?php if ($showMenuLabel): ?>
        <div class="sidebar-section">Menu</div>
    <?php endif; ?>
    <ul class="sidebar-nav"<?= $showMenuLabel ? '' : ' style="margin-top:1rem"' ?>>
        <li><a href="#page-dashboard-rh" class="<?= $activePage === 'dashboard' ? 'active' : '' ?>"><i class="bi bi-grid-1x2"></i> Tableau de bord</a></li>
        <li>
            <a href="#page-liste-rh" class="<?= $activePage === 'requests' ? 'active' : '' ?>">
                <i class="bi bi-inbox"></i> Demandes à traiter
                <?php if ($showBadge): ?>
                    <span class="nav-badge alert"><?= esc($badgeCount) ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li><a href="#page-liste-rh" class="<?= $activePage === 'history' ? 'active' : '' ?>"><i class="bi bi-archive"></i> Historique</a></li>
        <li><a href="#page-liste-rh" class="<?= $activePage === 'balances' ? 'active' : '' ?>"><i class="bi bi-people"></i> Soldes employés</a></li>
    </ul>
    <div class="sidebar-user">
        <div class="s-user-row">
            <div class="avatar av-blue"><?= esc($userInitials) ?></div>
            <div>
                <div class="user-name"><?= esc($userName) ?></div>
                <div class="user-role"><?= esc($userRole) ?></div>
            </div>
            <?php if ($logoutLink !== ''): ?>
                <a href="<?= esc($logoutLink) ?>" style="margin-left:auto;color:rgba(255,255,255,.25);font-size:1.1rem"><i class="bi bi-box-arrow-right"></i></a>
            <?php endif; ?>
        </div>
    </div>
</aside>
