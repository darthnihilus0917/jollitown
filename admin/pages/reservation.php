<?php
$isCalendar = false;
if(isset($_GET['sub'])) {
    $isCalendar = true;
}
$reservationPageTitle = ($isCalendar) ? "Calendar of Reservation" : "Reservations";

$defaultLink = "?page=reservations";
$newLink = $defaultLink . "&process=new";
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
        <?php if(isset($_GET['process'])) { ?>
            
            <a class="btn btn-secondary ms-1" href="<?php echo $defaultLink ?>">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-backspace" viewBox="0 0 16 16">
            <path d="M5.83 5.146a.5.5 0 0 0 0 .708L7.975 8l-2.147 2.146a.5.5 0 0 0 .707.708l2.147-2.147 2.146 2.147a.5.5 0 0 0 .707-.708L9.39 8l2.146-2.146a.5.5 0 0 0-.707-.708L8.683 7.293 6.536 5.146a.5.5 0 0 0-.707 0z"/>
            <path d="M13.683 1a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-7.08a2 2 0 0 1-1.519-.698L.241 8.65a1 1 0 0 1 0-1.302L5.084 1.7A2 2 0 0 1 6.603 1zm-7.08 1a1 1 0 0 0-.76.35L1 8l4.844 5.65a1 1 0 0 0 .759.35h7.08a1 1 0 0 0 1-1V3a1 1 0 0 0-1-1z"/>
            </svg>
                <span class="ps-1">Back</span>
            </a>

        <?php } ?>
    </div>    
</div>
<div class="container-fluid">
    <?php
        if (!$isCalendar) {
            if (isset($_GET['process'])) {
                $process = $_GET['process'];
                switch($process) {
                    case "new":
                        include('forms/reservation_form.php');
                        break;
                    case "edit":
                        include('forms/reservation_form.php');
                        break;
                    case "delete":
                        include('datatables/reservations_table.php');
                        break;                    
                    default:
                        include('datatables/reservations_table.php');
                } 
            } else {
                include('datatables/reservations_table.php');
            }
        } else {
            ?>
            <div id="reservation-calendar" class="mb-4"></div>
            <?php
        }
    ?>
</div>