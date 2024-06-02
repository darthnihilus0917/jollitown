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
            <label for="">Mobile Number:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" id="customer-mobile-no" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['mobile'] : "" ?>"/>
        </div>
    </div>
    <!-- <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Email Address:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="email" id="customer-email" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['mobile'] : "" ?>"/>
        </div>
    </div> -->
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Age:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" id="customer-age" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['age'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Gender:</label>
        </div>
        <div class="col-lg-10">
            <select name="" id="customer-gender" class="form-select"  <?php echo $fieldStatus ?>>
                <option value="0">Select a gender</option>
                <?php
                $value = ($field != null) ? $field['gender'] : "";
                $selected = "";
                if ($value != "") {
                    $maleSelected = ($value == "M") ? "selected" : "";
                    $femaleSelected = ($value == "F") ? "selected" : "";
                    $nbSelected = ($value == "NB") ? "selected" : "";
                }
                ?>
                <option value="M" <?php echo $maleSelected; ?>>Male</option>
                <option value="F" <?php echo $femaleSelected; ?>>Female</option>
                <option value="NB" <?php echo $nbSelected; ?>>Non-Binary</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Nickname:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="customer-nickname" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['nickname'] : "" ?>"/>
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
            <label for="">Party Favors:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-select" name="party-favors" id="customer-favors" <?php echo $fieldStatus ?>>
                <option>Select party favors</option>
            <?php
                $favors = ['2000', '1500'];
                for($i=0;$i<count($favors);$i++) {
                    $value = ($field != null) ? $field['favors'] : "";
                    $selected = "";
                    if ($value != "") {
                        $selected = ($value == $favors[$i]) ? "selected" : "";
                    }
                    ?>
                    <option value="Party Favors <?php echo $i+1 . " = " . $favors[$i] ?>" <?php echo $selected; ?>>Party Favors <?php echo $i+1 . " = " . $favors[$i] ?></option>
                    <?php
                }
            ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Theme Cake:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-select" name="theme-cake" id="customer-cake" <?php echo $fieldStatus ?>>
                <option value="0">Select a cake</option>
            <?php
                $cake = ['Mocha Cake', 'Chocolate Cake'];
                for($i=0;$i<count($cake);$i++) {
                    $value = ($field != null) ? $field['cake'] : "";
                    $selected = "";
                    if ($value != "") {
                        $selected = ($value == $cake[$i]) ? "selected" : "";
                    }
                    ?>
                    <option value="<?php echo $cake[$i] ?> (Hello Kitty = 2000)" <?php echo $selected; ?>><?php echo $cake[$i] ?> (Hello Kitty = 2000)</option>
                    <?php
                }
            ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Bundle Meal:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-select" name="bundle-meal" id="customer-meal" <?php echo $fieldStatus ?>>
                <option value="0">Select a meal</option>
            <?php
                $meal = ['A', 'B', 'C', 'D', 'E'];
                for($i=0;$i<count($meal);$i++) {
                    $value = ($field != null) ? $field['meal'] : "";
                    $selected = "";
                    if ($value != "") {
                        $selected = ($value == $meal[$i]) ? "selected" : "";
                    }
                    ?>
                    <option value="Meal - <?php echo $meal[$i] ?>" <?php echo $selected; ?>>Meal - <?php echo $meal[$i] ?></option>
                    <?php
                }
            ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Payment Option:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-control" name="payment-terms" id="payment-mode" <?php echo $fieldStatus ?>>
                <?php
                    $value = ($field != null) ? $field['payment_mode'] : "";
                    $selected = "";
                    if ($value != "") {
                        $cashSelected = ($value == "Cash") ? "selected" : "";
                        $gcashSelected = ($value == "GCash") ? "selected" : "";
                    }
                ?>
                <option value="0"> Select a payment mode</option>
                <option value="Cash" <?php echo $cashSelected; ?>>Cash</option>
                <option value="GCash" <?php echo $gcashSelected; ?>>GCash (09486502742)</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Payment Terms:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-control" name="payment-terms" id="payment-terms" <?php echo $fieldStatus ?>>
                <?php
                    $value = ($field != null) ? $field['payment'] : "";
                    $selected = "";
                    if ($value != "") {
                        $partialSelected = ($value == "Partial") ? "selected" : "";
                        $fullSelected = ($value == "Full") ? "selected" : "";
                    }
                ?>
                <option value="0"> Select a payment terms</option>
                <option value="Partial" <?php echo $partialSelected; ?>>Partial Payment (Downpayment)</option>
                <option value="Full" <?php echo $fullSelected; ?>>Full Payment</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Payment Amount:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" name="payment-amount" id="payment-amount" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['payment_amount'] : "" ?>"/>
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
        <div class="col-lg-2">
            <button class="btn btn-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-floppy" viewBox="0 0 16 16">
                <path d="M11 2H9v3h2z"/>
                <path d="M1.5 0h11.586a1.5 1.5 0 0 1 1.06.44l1.415 1.414A1.5 1.5 0 0 1 16 2.914V14.5a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 14.5v-13A1.5 1.5 0 0 1 1.5 0M1 1.5v13a.5.5 0 0 0 .5.5H2v-4.5A1.5 1.5 0 0 1 3.5 9h9a1.5 1.5 0 0 1 1.5 1.5V15h.5a.5.5 0 0 0 .5-.5V2.914a.5.5 0 0 0-.146-.353l-1.415-1.415A.5.5 0 0 0 13.086 1H13v4.5A1.5 1.5 0 0 1 11.5 7h-7A1.5 1.5 0 0 1 3 5.5V1H1.5a.5.5 0 0 0-.5.5m3 4a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5V1H4zM3 15h10v-4.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5z"/>
                </svg>
                <span class="ps-2">Save</span>
            </button>
        </div>
    </div>
</div>