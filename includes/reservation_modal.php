<div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h2 class="modal-title" id="reservationModalLabel">JolliTown Reservation Form</h2>
      </div>
      <div class="modal-body">
        <h3>Personal Details</h3>
        <div class="container-responsive p-4">
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-12">
                    <label for="">Celebrant's Full Name</label><br/>
                    <input class="form-control" type="text" name="celebrants-name" id="celebrants-name" placeholder="Celebrant's Name"/>
                </div>
            </div>
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Customer Name</label><br/>
                    <input class="form-control" type="text" name="customer-name" id="customer-name" placeholder="Customer Name"/>
                </div>
                <div class="col-lg-4">
                    <label for="">Mobile Number</label><br/>
                    <input class="form-control" type="text" name="customer-mobile-no" id="customer-mobile-no" placeholder="Mobile No."/>
                </div>
                <div class="col-lg-4">
                    <label for="">Email Address</label><br/>
                    <input class="form-control" type="email" name="customer-email" id="customer-email" placeholder="Email Address"/>
                </div>
            </div>
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Age</label><br/>
                    <input class="form-control" type="number" name="customer-age" id="customer-age" placeholder="Age"/>
                </div>
                <div class="col-lg-4">
                    <label for="">Gender</label><br/>
                    <select name="" id="customer-gender" class="form-control">
                        <option value="0">Select a gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="NB">Non-Binary</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="">Nickname</label><br/>
                    <input class="form-control" type="text" name="customer-nickname" id="customer-nickname" placeholder="Nickname"/>
                </div>
            </div>
        </div>

        <hr class="divider"/>

        <h3>Reservation</h3>
        <div class="container-response p-4">
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Reservation Type</label><br/>
                    <select name="reservation-type" id="customer-reservation-type" class="form-control">
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
                <div class="col-lg-4">
                    <label for="">Event Date & Time</label><br/>
                    <input class="form-control" type="datetime-local" name="customer-reservation-date" id="customer-reservation-date" placeholder="Reservation Date"/>
                </div>
                <div class="col-lg-4">
                    <label for="">Pick A Theme</label><br/>
                    <select class="form-control" name="party-theme" id="customer-theme">
                        <option>Select a theme</option>
                    <?php
                        $theme = ['Party Hats', 'Invitational Card', 'Trayliner', 'Message Board'];
                        for($i=0;$i<count($theme);$i++) {
                            ?>
                            <option value="<?php echo $theme[$i] ?>"><?php echo $theme[$i] ?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
            </div>
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Party Favors</label><br/>
                    <select class="form-control" name="party-favors" id="customer-favors">
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
                <div class="col-lg-4">
                    <label for="">Theme Cake</label><br/>
                    <select class="form-control" name="theme-cake" id="customer-cake">
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
                <div class="col-lg-4">
                    <label for="">Bundle Meal</label><br/>
                    <select class="form-control" name="bundle-meal" id="customer-meal">
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
        </div>

        <hr class="divider"/>

        <h3>Payment</h3>
        <div class="container-response p-4">
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Payment Option</label><br/>
                    <select class="form-control" name="payment-terms" id="payment-mode">
                        <option value="0"> Select a payment mode</option>
                        <option value="Cash">Cash</option>
                        <option value="GCash">GCash (09486502742)</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="">Payment Terms</label><br/>
                    <!-- <input class="form-control" type="text" name="payment-terms" id="payment-terms" /> -->
                    <select class="form-control" name="payment-terms" id="payment-terms">
                        <option value="0"> Select a payment terms</option>
                        <option value="Partial Payment">Partial Payment (Downpayment)</option>
                        <option value="Full Payment">Full Payment</option>
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="">Payment Amount (Php)</label><br/>
                    <input class="form-control" type="number" name="payment-amount" id="payment-amount"/>
                </div>
            </div>            
        </div>

        <hr class="divider"/>

        <div class="container-response">
            <div class="rounded-wrapper">
                <h3 class="terms-title">Terms and Conditions</h3>
                <p class="terms">
                    These Terms and Conditions shall apply to all orders of Jollibee products (“Products”) of a customer through this Jollibee Delivery Website (“Site”). By placing an order for Products through this Site, you understand, agree with, and accept: (i) these Terms and Conditions and any corresponding changes thereto which we may implement from time to time; and (ii) our Privacy Policy in connection with how we process your personal information collected from this Site.For purposes of these Terms and Conditions, “Jollibee”, “our” or “we” shall refer to Jollibee Foods Corporation, while “customer” or “you” shall refer to the customer who intends to purchase the Products from this Site.
                </p>
                <hr/>
                <input type="checkbox" id="agree-to-terms"/> I agree and accept
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="customer-booking-btn">Submit</button>
      </div>
    </div>
  </div>
</div>