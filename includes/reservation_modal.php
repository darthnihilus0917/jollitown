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
                    <input class="form-control" type="text" name="celebrant-name" id="celebrant-name" placeholder="Celebrant's Name"/>
                </div>
            </div>
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-4">
                    <label for="">Customer Name</label><br/>
                    <input class="form-control" type="text" name="customer-name" id="customer-name" placeholder="Customer Name"/>
                </div>
                <div class="col-lg-4">
                    <label for="">Mobile Number</label><br/>
                    <input class="form-control" type="number" name="customer-mobile" id="customer-mobile" placeholder="Mobile No."/>
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
            <ul style="margin-left: 14px;">
                <li>Venue reservation is good for two (2) hours, which also includes the host.</li>
                <li>Party schedule has 3 schedules per day: 10AM-12PM | 1-3PM | 4-6PM.</li>
            </ul>
            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-6">
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
                <div class="col-lg-6">
                    <label for="">Event Date & Time</label><br/>
                    <input class="form-control" type="datetime-local" name="customer-reservation-date" id="customer-reservation-date" placeholder="Reservation Date"/>
                </div>
            </div>

            <div class="row" style="padding-top: 4px;">
                <div class="col-lg-6">
                    <div>
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
                    <div>
                        <label for="">Party Favors</label><br/>
                        <select class="form-control" name="party-favors" id="customer-favors">
                            <option>Select party favors</option>
                        <?php
                            $favors = ['2000 Php', '1500 Php'];
                            for($i=0;$i<count($favors);$i++) {
                                $label = "Party Favors" . $i+1 . " - " . $favors[$i];
                                ?>
                                <option value="<?php echo $favors[$i] ?>">Party Favors <?php echo $label ?></option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="">Theme Cake</label><br/>
                        <select class="form-control" name="theme-cake" id="customer-cake">
                            <option value="0">Select a cake</option>
                        <?php
                            $cake = ['Mocha Cake', 'Chocolate Cake'];
                            for($i=0;$i<count($cake);$i++) {
                                $label = $cake[$i] . " (Hello Kitty) - 2000 Php";
                                ?>
                                <option value="<?php echo $cake[$i] ?>"><?php echo $label ?> </option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="">Bundle Meal</label><br/>
                        <select class="form-control" name="bundle-meal" id="bundle-meal">
                            <option value="0">Select a meal</option>
                        <?php
                            $meal = ['A - 214 Php', 'B - 286 Php', 'C - 339 Php', 'D - 296 Php'];
                            for($i=0;$i<count($meal);$i++) {
                                $label = "Meal " . $meal[$i];
                                ?>
                                <option value="<?php echo $meal[$i] ?>"><?php echo $label ?></option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                    <div>
                        <label for="">Other Options</label><br/>
                        <select class="form-control" name="others" id="others">
                            <option value="0">Select a package</option>
                        <?php
                            $others = [
                                'Photo Coverage - 3500 Php', 
                                'Video Coverage - 3500 Php', 
                                'Photobooth + Photo Coverage - 7500 Php', 
                                'Photobooth + Video Coverage - 7500 Php',
                                'Photobooth + Video Coverage w/ Album - 12000 Php', 
                            ];
                            for($i=0;$i<count($others);$i++) {
                                ?>
                                <option value="<?php echo $others[$i] ?>"><?php echo $others[$i] ?></option>
                                <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <label for="">Preview</label>
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
                    <select class="form-control" name="payment-terms" id="payment-terms">
                        <option value="0"> Select a payment terms</option>
                        <option value="Partial">Partial Payment (Downpayment)</option>
                        <option value="Full">Full Payment</option>
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
            <div style="padding-top:8px; padding-bottom: 10px; text-align: center;">
                <span class="submission-status"></span>
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