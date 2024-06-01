<?php
$isAdmin = true;
$fieldStatus = ($isAdmin) ? "" : "readonly";
?>
<div class="form-wrapper">
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Celebrant's Full Name:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="celebrant-name" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Customer Name:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="customer-name" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Mobile Number:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" id="customer-mobile-no" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Email Address:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="email" id="customer-email" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Age:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" id="customer-age" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Gender:</label>
        </div>
        <div class="col-lg-10">
            <select name="" id="customer-gender" class="form-select"  <?php echo $fieldStatus ?>>
                <option value="0">Select a gender</option>
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="NB">Non-Binary</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Nickname:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="customer-nickname" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Reservation Type:</label>
        </div>
        <div class="col-lg-10">
            <select name="reservation-type" id="customer-reservation-type" class="form-select"  <?php echo $fieldStatus ?>>
                <option value="0">Select reservation type</option>
                <?php
                    $type = ['In-Store Jollibee Kids Party', 'Out - Outside of store'];
                    for($i=0;$i<count($type);$i++) {
                        ?>
                        <option value="<?php echo $type[$i] ?>"><?php echo $type[$i] ?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Reservation Date:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="date" name="customer-reservation-date" id="customer-reservation-date" placeholder="Reservation Date" <?php echo $fieldStatus ?>/>
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
                    ?>
                    <option value="Party Favors <?php echo $i+1 . " = " . $favors[$i] ?>">Party Favors <?php echo $i+1 . " = " . $favors[$i] ?></option>
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
                    ?>
                    <option value="<?php echo $cake[$i] ?> (Hello Kitty = 2000)"><?php echo $cake[$i] ?> (Hello Kitty = 2000)</option>
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
                    ?>
                    <option value="Meal - <?php echo $meal[$i] ?>">Meal - <?php echo $meal[$i] ?></option>
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
                <option value="0"> Select a payment mode</option>
                <option value="Cash">Cash</option>
                <option value="GCash">GCash (09486502742)</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Payment Terms:</label>
        </div>
        <div class="col-lg-10">
            <select class="form-control" name="payment-terms" id="payment-terms" <?php echo $fieldStatus ?>>
                <option value="0"> Select a payment terms</option>
                <option value="Partial Payment">Partial Payment (Downpayment)</option>
                <option value="Full Payment">Full Payment</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Payment Amount:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="number" name="payment-amount" id="payment-amount" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Event Done?</label>
        </div>
        <div class="col-lg-10">
            <select class="form-control" name="event-status" id="event-status" <?php echo $fieldStatus ?>>
                <option value="0"> Select an event status</option>
                <option value="Yes">Yes</option>
                <option value="N">No</option>
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