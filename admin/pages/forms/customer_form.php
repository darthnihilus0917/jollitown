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
            <input class="form-control" type="number" id="customer-mobile" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['mobile'] : "" ?>"/>
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
                $maleSelected = "";
                $femaleSelected = "";
                $nbSelected = "";               
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
            <input class="form-control" type="datetime-local" name="customer-event-date" id="customer-event-date" placeholder="Event Date" <?php echo $fieldDisabled ?> value="<?php echo ($field != null) ? $field['event_datetime'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Theme:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-control" name="party-theme" id="customer-theme">
                <option>Select a theme</option>
            <?php
                $theme = ['Factory', 'Hello Kitty', 'Jollitown', 'Race'];
                for($i=0;$i<count($theme);$i++) {
                    $value = ($field != null) ? $field['themes'] : "";
                    var_dump($value);
                    $selected = "";
                    if ($value != "") {
                        $selected = ($value == $theme[$i]) ? "selected" : "";
                    }
                    ?>
                    <option value="<?php echo $theme[$i] ?>" <?php echo $selected ?>><?php echo $theme[$i] ?></option>
                    <?php
                }
            ?>
            </select>
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
                        $value = (strpos($value, " ")) ? explode(" ", $value)[0] : $value;
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
            <select class="form-select" name="bundle-meal" id="bundle-meal" <?php echo $fieldStatus ?>>
                <option value="0">Select a meal</option>
            <?php
                $meal = ['A', 'B', 'C', 'D', 'E'];
                for($i=0;$i<count($meal);$i++) {
                    $value = ($field != null) ? $field['meal'] : "";
                    $selected = "";
                    if ($value != "") {
                        $value = (strpos($value, " - ")) ? explode(" - ", $value)[0] : $value;                  
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
            <select class="form-control" name="payment-mode" id="payment-mode" <?php echo $fieldDisabled ?>>
                <?php
                    $value = ($field != null) ? $field['payment_mode'] : "";
                    $cashSelected = "";
                    $gcashSelected = "";
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
            <select class="form-control" name="payment-terms" id="payment-terms" <?php echo $fieldDisabled ?>>
                <?php
                    $value = ($field != null) ? $field['payment'] : "";
                    $partialSelected = "";
                    $fullSelected = "";
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
            <label for="">Downpayment:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" name="payment-downpayment" id="payment-downpayment" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['payment_dp'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Balance:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" name="payment-balance" id="payment-balance" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['payment_balance'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Event Done?</label>
        </div>
        <div class="col-lg-10">
            <select class="form-select" name="event-status" id="event-status" <?php echo $fieldDisabled ?>>
                <?php
                $value = ($field != null) ? $field['is_done'] : "";
                $yesSelected = "";
                $noSelected = "";
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
        <?php 
        if ($process == "delete") {
        ?>
            <div class="col-lg-8">
                <button class="btn btn-danger" id="customer-save">
                    <span class="px-4">Delete this record? Click to proceed</span>
                </button>
                <span id="process-result" class="ps-2 fw-bold"></span>
            </div>             
        <?php
        } else {
            ?>
            <div class="col-lg-6">
                <button class="btn btn-primary" id="print-report">
                    <span>Print</span></button>
                <button class="btn btn-success" id="customer-save">
                    <span class="px-4">Save</span>
                </button>
                <span id="process-result" class="ps-2 fw-bold"></span>
            </div>            
            <?php
        }
        ?>
    </div>
</div>