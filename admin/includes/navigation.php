<?php
function highlighter($linkName) {
    $page = $_GET['page'];
    if (empty($page)) return "active";

    return ($linkName == $page) ? "active" : "";
}
?>

<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('dashboard'); ?>" aria-current="page" href="?page=dashboard">
        <svg class="bi"><use xlink:href="#house-fill"/></svg>
        Dashboard
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('reservations'); ?>" href="?page=reservations">
        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
        Reservations
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('customers'); ?>" href="?page=customers">
        <svg class="bi"><use xlink:href="#cart"/></svg>
        Customers
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('users'); ?>" href="?page=users">
        <svg class="bi"><use xlink:href="#people"/></svg>
        Users
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('reports'); ?>" href="?page=reports">
        <svg class="bi"><use xlink:href="#graph-up"/></svg>
        Reports
        </a>
    </li>
    </ul>

    <hr class="my-3">

    <ul class="nav flex-column mb-auto">
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('settings'); ?>" href="?page=settings">
        <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
        Settings
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link d-flex align-items-center gap-2" href="?page=signout">
        <svg class="bi"><use xlink:href="#door-closed"/></svg>
        Sign out
        </a>
    </li>
    </ul>
</div>