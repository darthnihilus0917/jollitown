<?php
include('./../config/db.php');

$process = $_GET['process'];
$field = null;
$id = 0;
if ($process == "edit" || $process == "delete") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM booking WHERE id = '". $id ."'";
    $field = $conn->query($sql)->fetch_assoc();
} 

$isAdmin = true;
$fieldStatus = ($isAdmin) ? "" : "readonly";
$fieldDisabled = (!$isAdmin || $process == "delete") ? "disabled" : "";
?>
<div class="form-wrapper">
    <div class="row">
        <p class="fw-bold">
            All fields are required.
        </p>
        <p>
            <strong>REMINDER:</strong> Venue reservation is good for two (2) hours, which also includes the host.
        </p>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Celebrant's Name:</label>
        </div>
        <div class="col-lg-10">
            <input type="hidden" id="process" value="<?php echo $_GET['process']?>" data-id="<?php echo $id ?>"/>
            <input class="form-control" type="text" id="celebrant-name" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['cname'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Customer Name:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="customer-name" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['name'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Reservation Type:</label>
        </div>
        <div class="col-lg-10">
            <select name="reservation-type" id="customer-reservation-type" class="form-select"  <?php echo $fieldDisabled ?>>
                <option value="0">Select reservation type</option>
                <?php
                    $type = ['In-Store Jollibee Kids Party', 'Out - Outside of store'];
                    for($i=0;$i<count($type);$i++) {
                        $value = ($field != null) ? $field['reservation'] : "";
                        $selected = "";
                        if ($value != "") {
                            $selected = ($value == $type[$i]) ? "selected" : "";
                        }
                        ?>
                        <option value="<?php echo $type[$i] ?>" <?php echo $selected ?>><?php echo $type[$i] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Date of Reservation:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="date" name="customer-reservation-date" id="customer-reservation-date" placeholder="Reservation Date" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['rdates'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Event Date & Time:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="datetime-local" name="customer-event-date" id="customer-event-date" placeholder="Event Date" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['event_datetime'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Event Done?</label>
        </div>
        <div class="col-lg-10">
            <select class="form-select" name="event-status" id="event-status" <?php echo $fieldStatus ?>>
                <?php
                $value = ($field != null) ? $field['is_done'] : "";
                $selected = "";
                $yesSelected = "";
                $noSelected = "";
                if ($value != "") {
                    $value = ($value == "0") ? "No" : "Yes";
                    $yesSelected = ($value == "Yes") ? "selected" : "";
                    $noSelected = ($value == "No") ? "selected" : "";
                }
                ?>
                <option value=""> Select an event status</option>
                <option value="1" <?php echo $yesSelected; ?>>Yes</option>
                <option value="0" <?php echo $noSelected; ?>>No</option>
            </select>
        </div>
    </div>
</div>
<div class="button-section mt-2">
    <div class="row mb-2">
        <div class="col-lg-6">
            <button class="btn btn-success" id="reservation-save">
                <span class="px-4">Save</span>
            </button>
            <span id="process-result" class="ps-2 fw-bold"></span>
        </div>
    </div>
</div>