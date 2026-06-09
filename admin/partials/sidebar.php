<?php
$currentFile = $_SERVER['PHP_SELF'];

if (
    strpos($currentFile, '/kendaraan/') !== false ||
    strpos($currentFile, '/customer/') !== false ||
    strpos($currentFile, '/transaksi/') !== false
) {
    $base = '../';
} else {
    $base = '';
}

$menu = [
    ['href' => 'dashboard.php',        'icon' => '📊', 'label' => 'Monitoring'],
    ['href' => 'kendaraan/index.php',  'icon' => '🚘', 'label' => 'Data Mobil'],
    ['href' => 'transaksi/index.php',  'icon' => '📄', 'label' => 'Transaksi'],
    ['href' => 'customer/index.php',   'icon' => '👥', 'label' => 'Costumer'],
    ['href' => 'laporan.php',          'icon' => '📈', 'label' => 'Laporan'],
];
?>
<aside class="sidebar">
    <div class="sidebar-header">
        <div class="sidebar-avatar">
            <svg width="32" height="32" viewBox="0 0 32 32" fill="none">
                <circle cx="16" cy="12" r="6" fill="rgba(255,255,255,0.9)"/>
                <path d="M4 28c0-6.627 5.373-12 12-12s12 5.373 12 12" fill="rgba(255,255,255,0.9)"/>
            </svg>
        </div>
        <div>
            <div class="sidebar-title">Administrator</div>
            <div class="sidebar-sub">Sistem Rental Kendaraan</div>
        </div>
    </div>
    <nav class="sidebar-nav">
        <?php foreach($menu as $m): 
            $isActive = strpos($currentFile, str_replace(['../','./'], '', $m['href'])) !== false;
        ?>
        <a href="<?= $base . $m['href'] ?>" class="sidebar-link <?= $isActive ? 'active' : '' ?>">
            <span class="sidebar-icon"><?= $m['icon'] ?></span>
            <?= $m['label'] ?>
        </a>
        <?php endforeach; ?>
    </nav>
    <div class="sidebar-footer">
        <a href="<?= $base ?>logout.php" class="sidebar-logout">
            <span>🚪</span> Logout
        </a>
    </div>
</aside>

<style>
@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap');

* { margin: 0; padding: 0; box-sizing: border-box; }

body {
    font-family: 'Plus Jakarta Sans', sans-serif;
    background: #f0f2f7;
    display: flex;
    min-height: 100vh;
}

.sidebar {
    width: 220px;
    min-height: 100vh;
    background: #2563eb;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    position: sticky;
    top: 0;
    height: 100vh;
}

.sidebar-header {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 24px 20px 20px;
    border-bottom: 1px solid rgba(255,255,255,0.15);
}

.sidebar-avatar {
    width: 44px;
    height: 44px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
}

.sidebar-title {
    color: white;
    font-weight: 700;
    font-size: 14px;
    line-height: 1.3;
}

.sidebar-sub {
    color: rgba(255,255,255,0.65);
    font-size: 11px;
    margin-top: 2px;
}

.sidebar-nav {
    padding: 16px 12px;
    display: flex;
    flex-direction: column;
    gap: 4px;
    flex: 1;
}

.sidebar-link {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 14px;
    border-radius: 10px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s;
}

.sidebar-link:hover {
    background: rgba(255,255,255,0.15);
    color: white;
}

.sidebar-link.active {
    background: white;
    color: #2563eb;
    font-weight: 600;
}

.sidebar-link.active .sidebar-icon {
    filter: none;
}

.sidebar-icon {
    font-size: 16px;
    width: 20px;
    text-align: center;
}

.sidebar-footer {
    padding: 12px;
    border-top: 1px solid rgba(255,255,255,0.15);
}

.sidebar-logout {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 11px 14px;
    border-radius: 10px;
    color: rgba(255,255,255,0.8);
    text-decoration: none;
    font-size: 14px;
    font-weight: 500;
    transition: all 0.2s;
}

.sidebar-logout:hover {
    background: rgba(239,68,68,0.3);
    color: #fca5a5;
}

.main-content {
    flex: 1;
    padding: 32px;
    overflow-x: auto;
}

.page-title {
    font-size: 22px;
    font-weight: 700;
    color: #1e293b;
    margin-bottom: 24px;
}

/* TABLE STYLES */
.table-card {
    background: white;
    border-radius: 14px;
    overflow: hidden;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
}

.table-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 20px 24px;
    border-bottom: 1px solid #f1f5f9;
}

.table-header h2 {
    font-size: 16px;
    font-weight: 700;
    color: #1e293b;
}

.btn-add {
    background: #2563eb;
    color: white;
    padding: 8px 18px;
    border-radius: 8px;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    transition: background 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 6px;
}

.btn-add:hover { background: #1d4ed8; }

table {
    width: 100%;
    border-collapse: collapse;
}

thead th {
    background: #f8fafc;
    color: #64748b;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    padding: 12px 20px;
    text-align: left;
    border-bottom: 1px solid #f1f5f9;
}

tbody td {
    padding: 14px 20px;
    font-size: 14px;
    color: #374151;
    border-bottom: 1px solid #f8fafc;
}

tbody tr:last-child td { border-bottom: none; }

tbody tr:hover { background: #f8fafc; }

.badge {
    display: inline-block;
    padding: 3px 10px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 600;
}

.badge-green  { background: #dcfce7; color: #16a34a; }
.badge-blue   { background: #dbeafe; color: #2563eb; }
.badge-orange { background: #fff7ed; color: #ea580c; }
.badge-red    { background: #fee2e2; color: #dc2626; }
.badge-gray   { background: #f1f5f9; color: #64748b; }

.btn-edit {
    display: inline-block;
    padding: 5px 12px;
    background: #eff6ff;
    color: #2563eb;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
    margin-right: 4px;
}

.btn-edit:hover { background: #dbeafe; }

.btn-delete {
    display: inline-block;
    padding: 5px 12px;
    background: #fef2f2;
    color: #dc2626;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-delete:hover { background: #fee2e2; }

.btn-detail {
    display: inline-block;
    padding: 5px 12px;
    background: #f0fdf4;
    color: #16a34a;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
    margin-right: 4px;
}

.btn-detail:hover { background: #dcfce7; }

.btn-confirm {
    display: inline-block;
    padding: 5px 12px;
    background: #fefce8;
    color: #ca8a04;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
    margin-right: 4px;
}

.btn-confirm:hover { background: #fef9c3; }

.btn-done {
    display: inline-block;
    padding: 5px 12px;
    background: #f0fdf4;
    color: #16a34a;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.2s;
}

.btn-done:hover { background: #dcfce7; }

/* FORM STYLES */
.form-card {
    background: white;
    border-radius: 14px;
    padding: 28px;
    box-shadow: 0 1px 4px rgba(0,0,0,0.07);
    max-width: 560px;
}

.form-group {
    margin-bottom: 18px;
}

.form-group label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #374151;
    margin-bottom: 7px;
}

.form-group input,
.form-group textarea,
.form-group select {
    width: 100%;
    padding: 10px 14px;
    border: 1.5px solid #e2e8f0;
    border-radius: 9px;
    font-size: 14px;
    font-family: inherit;
    color: #1e293b;
    background: #f8fafc;
    transition: border-color 0.2s;
    outline: none;
}

.form-group input:focus,
.form-group textarea:focus,
.form-group select:focus {
    border-color: #2563eb;
    background: white;
}

.form-group textarea {
    resize: vertical;
    min-height: 90px;
}

.btn-submit {
    background: #2563eb;
    color: white;
    padding: 11px 28px;
    border: none;
    border-radius: 9px;
    font-size: 14px;
    font-weight: 600;
    font-family: inherit;
    cursor: pointer;
    transition: background 0.2s;
}

.btn-submit:hover { background: #1d4ed8; }

.btn-back {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    color: #64748b;
    text-decoration: none;
    font-size: 13px;
    font-weight: 500;
    margin-bottom: 20px;
    transition: color 0.2s;
}

.btn-back:hover { color: #2563eb; }
</style>
