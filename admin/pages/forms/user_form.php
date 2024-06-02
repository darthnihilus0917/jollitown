<?php
include('./../config/db.php'); 

$process = $_GET['process'];
$field = null;
$id = 0;
if ($process == "edit" || $process == "delete") {
    $id = $_GET['id'];
    $sql = "SELECT * FROM users WHERE id = '". $id ."'";
    $field = $conn->query($sql)->fetch_assoc();
} 

$isAdmin = true;
$fieldStatus = (!$isAdmin || $process == "delete") ? "readonly" : "";
$fieldDisabled = (!$isAdmin || $process == "delete") ? "disabled" : "";
?>
<div class="form-wrapper">
    <div class="row">
        <p class="fw-bold">
            All fields are required.
        </p>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Name:</label>
        </div>
        <div class="col-lg-10">
            <input type="hidden" id="process" value="<?php echo $_GET['process']?>" data-id="<?php echo $id ?>"/>
            <input class="form-control" type="text" id="name" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['name'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Username:</label>
        </div>
        <div class="col-lg-10">
            <input type="text" class="form-control" id="username" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['user_name'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Password:</label>
        </div>
        <div class="col-lg-10">
            <input type="password" class="form-control" id="password" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['password'] : "" ?>"/>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Role:</label>
        </div>
        <div class="col-lg-10">
            <?php
                $userSelected = ($field != null) ? $field['role'] : "";            
            ?>
            <select name="" id="role" class="form-select" <?php echo $fieldDisabled ?>>
                <option value="User" <?php echo ($userSelected == "User") ? "selected" : "" ?>>User</option>
                <option value="Admin"<?php echo ($userSelected == "Admin") ? "selected" : "" ?>>Admin</option>
            </select>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-lg-2 label-placeholder">
            <label for="">Email Address:</label>
        </div>
        <div class="col-lg-10">
            <input type="email" class="form-control" id="email" <?php echo $fieldStatus ?> value="<?php echo ($field != null) ? $field['email'] : "" ?>"/>
        </div>
    </div>
</div>
<div class="button-section mt-2">
    <div class="row mb-2">
        <?php 
        if ($process == "delete") {
        ?>
            <div class="col-lg-8">
                <button class="btn btn-danger" id="user-save">
                    <span class="px-4">Delete this record? Click to proceed</span>
                </button>
                <span id="process-result" class="ps-2 fw-bold"></span>
            </div>             
        <?php
        } else {
            ?>
            <div class="col-lg-6">
                <button class="btn btn-success" id="user-save">
                    <span class="px-4">Save</span>
                </button>
                <span id="process-result" class="ps-2 fw-bold"></span>
            </div>            
            <?php
        }
        ?>
    </div>
</div>