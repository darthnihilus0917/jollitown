<?php
$isAdmin = true;
$fieldStatus = ($isAdmin) ? "" : "readonly";
?>
<div class="form-wrapper">
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Celebrant's Name:</label>
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
            <label for="">Date of Reservation:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="date" name="customer-reservation-date" id="customer-reservation-date" placeholder="Reservation Date" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Event Date:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="date" name="customer-event-date" id="customer-event-date" placeholder="Event Date" <?php echo $fieldStatus ?>/>
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