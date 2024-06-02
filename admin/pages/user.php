<?php
$defaultLink = "?page=users";
$newLink = $defaultLink . "&process=new";
?>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Users</h1>
    <div class="btn-toolbar">
        <?php
            if (!isset($_GET['process'])) {
                ?>
                <a class="btn btn-primary" href="<?php echo $newLink ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
                    <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
                    </svg>
                    <span class="ps-1">New</span>
                </a>
                <?php
            }        
        ?>
        <?php
            if(isset($_GET['process'])) {
        ?>
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
        if (isset($_GET['process'])) {
            $process = $_GET['process'];
            switch($process) {
                case "new":
                    include('forms/user_form.php');
                    break;
                case "edit":
                    include('forms/user_form.php');
                    break;
                case "delete":
                    include('forms/user_form.php');
                    break;                    
                default:
                    include('datatables/users_table.php');
            }            
        } else {
            include('datatables/users_table.php');
        }
    ?>
</div>