<div class="contact-agileits">
    <h4>Contact Us</h4>
    <p class="contact-agile2">Sign Up For Our News Letters</p>
    <div name="sentMessage" id="contactForm">

        <div class="control-group form-group">                        
            <label class="contact-p1">Full Name:</label>
            <input type="text" class="form-control" name="name" id="name" required >
            <p class="help-block"></p>                       
        </div>	

        <div class="control-group form-group">                        
            <label class="contact-p1">Phone Number:</label>
            <input type="tel" class="form-control" name="phone" id="phone" required >
            <p class="help-block"></p>						
        </div>

        <div class="control-group form-group">                        
            <label class="contact-p1">Email Address:</label>
            <input type="email" class="form-control" name="email" id="email" required >
            <p class="help-block"></p>
        </div>
        
        <input type="button" name="sub" id="sign-up" value="Send Now" class="btn btn-primary">	
    </div>
    <?php
    if(isset($_POST['sub']))
    {
        $name =$_POST['name'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $approval = "Not Allowed";
        $sql = "INSERT INTO `contact`(`fullname`, `phoneno`, `email`,`cdate`,`approval`) VALUES ('$name','$phone','$email',now(),'$approval')" ;
        
        
        if(mysqli_query($con,$sql))
        echo"OK";					
    }
    ?>
</div>