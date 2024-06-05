<?php
function highlighter($linkName) {
    $page = $_GET['page'];
    if (empty($page)) return "";

    return ($linkName == $page) ? "active" : "";
}
?>

<div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('dashboard'); ?>" aria-current="page" href="?page=dashboard">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
            <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/>
            <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/>
            </svg>
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
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('reports'); ?>" href="?page=reports">
            <svg class="bi"><use xlink:href="#graph-up"/></svg>
            Reports
            </a>
        </li> -->
    </ul>

    <hr class="my-3">

    <ul class="nav flex-column mb-auto mb-2">
        <!-- <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 <?php echo highlighter('settings'); ?>" href="?page=settings">
            <svg class="bi"><use xlink:href="#gear-wide-connected"/></svg>
            Settings
            </a>
        </li> -->
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2" href="logout.php">
            <svg class="bi"><use xlink:href="#door-closed"/></svg>
            Sign out
            </a>
        </li>
    </ul>
</div>