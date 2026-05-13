<?php
$activePage = $activePage ?? '';
$userInitials = $userInitials ?? 'AD';
$userName = $userName ?? 'Administrateur';
$userRole = $userRole ?? 'Admin système';
$showMenuLabel = $showMenuLabel ?? true;
$showBadge = $showBadge ?? false;
$badgeCount = $badgeCount ?? '4';
$logoutLink = $logoutLink ?? '';
?>
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="sidebar-logo-icon" style="background:var(--ink);border:1px solid rgba(255,255,255,.15)"><i class="bi bi-shield-check" style="color:var(--leaf)"></i></div>
        <div class="sidebar-brand-name">TechMada RH<span>Administration</span></div>
    </div>
    <?php if ($showMenuLabel): ?>
        <div class="sidebar-section">Gestion</div>
    <?php endif; ?>
    <ul class="sidebar-nav" <?= $showMenuLabel ? '' : ' style="margin-top:1rem"' ?>>
        <li><a href="<?= base_url('admin/dashboard') ?>" class="<?= $activePage === 'dashboard' ? 'active' : '' ?>"><i class="bi bi-speedometer2"></i> Vue d'ensemble</a></li>
        <li>
            <a href="#page-liste-rh" class="<?= $activePage === 'requests' ? 'active' : '' ?>">
                <i class="bi bi-inbox"></i> Toutes les demandes
                <?php if ($showBadge): ?>
                    <span class="nav-badge alert"><?= esc($badgeCount) ?></span>
                <?php endif; ?>
            </a>
        </li>
        <li><a href="<?= base_url('admin/employes') ?>" class="<?= $activePage === 'employees' ? 'active' : '' ?>"><i class="bi bi-people"></i> Employés</a></li>
        <li><a href="<?= base_url('admin/departements') ?>" class="<?= $activePage === 'departments' ? 'active' : '' ?>"><i class="bi bi-building"></i> Départements</a></li>
        <li><a href="#page-admin-types" class="<?= $activePage === 'types' ? 'active' : '' ?>"><i class="bi bi-tags"></i> Types de congé</a></li>
        <li><a href="#page-admin-soldes" class="<?= $activePage === 'balances' ? 'active' : '' ?>"><i class="bi bi-sliders"></i> Soldes annuels</a></li>
    </ul>
    <div class="sidebar-user">
        <div class="s-user-row">
            <div class="avatar" style="background:#5a2d82;width:32px;height:32px;font-size:.7rem"><?= esc($userInitials) ?></div>
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