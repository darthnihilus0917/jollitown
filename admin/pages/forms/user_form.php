<?php
$isAdmin = true;
$fieldStatus = ($isAdmin) ? "" : "readonly";
?>
<div class="form-wrapper">
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Name:</label>
        </div>
        <div class="col-lg-10">
            <input class="form-control" type="text" id="name" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Username:</label>
        </div>
        <div class="col-lg-10">
            <input type="text" class="form-control" id="username" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Password:</label>
        </div>
        <div class="col-lg-10">
            <input type="password" class="form-control" id="password" <?php echo $fieldStatus ?>/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Role:</label>
        </div>
        <div class="col-lg-10">
            <select name="" id="role" class="form-select" <?php echo $fieldStatus ?>>
                <option value="User">User</option>
                <option value="Admin">Admin</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Email Address:</label>
        </div>
        <div class="col-lg-10">
            <input type="email" class="form-control" id="email" <?php echo $fieldStatus ?>/>
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