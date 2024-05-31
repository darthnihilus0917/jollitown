<?php
$isCalendar = false;
if(isset($_GET['sub'])) {
    $isCalendar = true;
}
$reservationPageTitle = ($isCalendar) ? "Calendar of Reservation" : "Reservations";
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">

    <h1 class="h2"><?php echo $reservationPageTitle ?></h1>
    <div class="btn-toolbar"> 
        <?php
            if($isCalendar) {
                ?>
                <a class="btn btn-danger" href="?page=reservations" title="Reservation Calendar">
                    <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                    <span class="ps-1">Reservation List</span>
                </a>
                <?php
            } else {
                ?>
                <a class="btn btn-danger" href="?page=reservations&sub=calendar" title="Reservation Calendar">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
                    <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                    <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                    </svg>
                    <span class="ps-1">Calendar</span>
                </a>
                <?php
            }
        ?>     

        <a class="btn btn-primary ms-1" href="<?php echo $newLink ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
            </svg>
            <span style="padding-left: 2px">New</span>
        </a>  
    </div>    
</div>
<div class="container">
    <?php
        if (!$isCalendar) {
            include('datatables/reservations_table.php');
        } else {
            ?>
            <div id="reservation-calendar" class="mb-4"></div>
            <?php
        }
    ?>
</div>