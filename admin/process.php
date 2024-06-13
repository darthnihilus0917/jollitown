<?php
include('./../config/db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['module']) {
        case "customers":
            $process = $_POST['process'];
            switch($process) {
                case "delete":
                    $id = $_POST['id'];

                    $sql = "DELETE FROM booking WHERE id='".$id."'";

                    try {
                        if($conn->query($sql)) {
                            $response = [
                                "isProcessed" => true,
                                "msg" => "Booking successfully removed!"
                            ];
                            echo json_encode($response);
                            
                        } else {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Error removing data."
                            ];
                            echo json_encode($response);
                        }

                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    }
                    break;
                case "edit":
                    $id = $_POST['id'];
                    $celebrantName = htmlspecialchars(trim($_POST['celebrantName']));
                    $customerName = htmlspecialchars(trim($_POST['customerName']));
                    $eventDateTime = htmlspecialchars(trim($_POST['eventDateTime']));
                    $eventStatus = htmlspecialchars(trim($_POST['eventStatus']));
                    $reservationType = htmlspecialchars(trim($_POST['reservationType']));
                    $reservationDate = htmlspecialchars(trim($_POST['reservationDate']));
                    $mobile = htmlspecialchars(trim($_POST['mobile']));
                    $age = htmlspecialchars(trim($_POST['age']));
                    $gender = htmlspecialchars(trim($_POST['gender']));
                    $nickname = htmlspecialchars(trim($_POST['nickname']));
                    $favors = htmlspecialchars(trim($_POST['favors']));
                    $cake = htmlspecialchars(trim($_POST['cake']));
                    $meal = htmlspecialchars(trim($_POST['meal']));
                    $theme = htmlspecialchars(trim($_POST['theme']));
                    $paymentMode = htmlspecialchars(trim($_POST['paymentMode']));
                    $paymentTerms = htmlspecialchars(trim($_POST['paymentTerms']));
                    $amount = htmlspecialchars(trim($_POST['amount']));
                    $balance = htmlspecialchars(trim($_POST['balance']));
                    $downpayment = htmlspecialchars(trim($_POST['downpayment']));

                    $sql = "UPDATE booking SET cname='".$celebrantName."', name='".$customerName."', rdates='".$reservationDate."', reservation='".$reservationType."', event_datetime='".$eventDateTime."', is_done='".$eventStatus."',
                        mobile='".$mobile."', age='".$age."', gender='".$gender."', nickname='".$nickname."', payment_balance='".$balance."', payment_dp='".$downpayment."', payment_amount='".$amount."', favors='".$favors."', cake='".$cake."'
                        WHERE id='".$id."'";

                    $schedule = DateTime::createFromFormat('Y-m-d\TH:i', $eventDateTime)->format('Y-m-d H:i:s');
                    $schedCheck = "SELECT * FROM booking WHERE event_datetime LIKE '%".$schedule."%'";

                    $eventDate = DateTime::createFromFormat('Y-m-d\TH:i', $eventDateTime)->format('Y-m-d');
                    $dateCountCheck = "SELECT * FROM booking WHERE event_datetime LIKE '%".$eventDate."%'";

                    $eventTime = DateTime::createFromFormat('Y-m-d\TH:i', $eventDateTime)->format('H:i');
                    // $timeCheck = "SELECT * FROM booking WHERE TIME(event_datetime) < '".$eventTime."' OR TIME(event_datetime) > '".$eventTime."'";

                    try {
                        $timeObject = DateTime::createFromFormat('H:i', $eventTime);
                        $tenAM = DateTime::createFromFormat('H:i', '10:00');
                        $threePM = DateTime::createFromFormat('H:i', '15:00');
                    
                        if ($timeObject < $tenAM || $timeObject > $threePM) {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Invalid requested schedule. Please refer to event schedules."
                            ];
                            echo json_encode($response);
                            return false;
                        }

                        if ($conn->query($dateCountCheck)->num_rows >= 3) {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Requested date is already fully booked."
                            ];
                            echo json_encode($response);
                            return false;                        
                        }

                        if ($conn->query($schedCheck)->num_rows >= 1) {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Requested schedule is no longer available."
                            ];
                            echo json_encode($response);
                            return false;
                            
                        } else {
                            if($conn->query($sql)) {
                                $response = [
                                    "isProcessed" => true,
                                    "msg" => "Customer successfully updated!"
                                ];
                                echo json_encode($response);
                                
                            } else {
                                $response = [
                                    "isProcessed" => false,
                                    "msg" => "Error saving data."
                                ];
                                echo json_encode($response);
                            }
                        }

                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    }
                    break;
                default:
                    $id = $_POST['id'];
                    $celebrantName = htmlspecialchars(trim($_POST['celebrantName']));
                    $customerName = htmlspecialchars(trim($_POST['customerName']));
                    $mobile = htmlspecialchars(trim($_POST['mobile']));
                    $age = htmlspecialchars(trim($_POST['age']));
                    $gender = htmlspecialchars(trim($_POST['gender']));
                    $nickname = htmlspecialchars(trim($_POST['nickname']));
                    $favors = htmlspecialchars(trim($_POST['favors']));
                    $cake = htmlspecialchars(trim($_POST['cake']));
                    $meal = htmlspecialchars(trim($_POST['meal']));
                    $theme = htmlspecialchars(trim($_POST['theme']));
                    $others = htmlspecialchars(trim($_POST['others']));
                    $paymentMode = htmlspecialchars(trim($_POST['paymentMode']));
                    $paymentTerms = htmlspecialchars(trim($_POST['paymentTerms']));
                    $amount = htmlspecialchars(trim($_POST['amount']));
                    $eventDateTime = htmlspecialchars(trim($_POST['eventDateTime']));
                    $eventStatus = htmlspecialchars(trim($_POST['eventStatus']));
                    $reservationType = htmlspecialchars(trim($_POST['reservationType']));
                    $reservationDate = htmlspecialchars(trim($_POST['reservationDate']));
                    $agreement = htmlspecialchars(trim($_POST['agreed']));
                    $agreement = ($agreement) ? "agree" : "";
                    $balance = htmlspecialchars(trim($_POST['balance']));
                    $downpayment = htmlspecialchars(trim($_POST['downpayment']));

                    $sql = "INSERT INTO booking(name,cname,mobile,rdates,themes,gender,age,nickname,reservation,favors,cake,meal,payment,agreement,is_done,event_datetime,payment_mode,payment_amount, others, payment_balance, payment_dp)
                        VALUES('".$customerName."','".$celebrantName."','".$mobile."',now(),'".$theme."','".$gender."','".$age."','".$nickname."','".$reservationType."','".$favors."','".$cake."','".$meal."','".$paymentTerms."','".$agreement."','".$eventStatus."','".$eventDateTime."','".$paymentMode."','".$amount."', '".$others."', '".$balance."', '".$downpayment."')";

                    $schedule = DateTime::createFromFormat('Y-m-d\TH:i', $eventDateTime)->format('Y-m-d H:i:s');
                    $schedCheck = "SELECT * FROM booking WHERE event_datetime LIKE '%".$schedule."%'";

                    try {
                        if ($conn->query($schedCheck)->num_rows >= 1) {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Requested schedule is no longer available."
                            ];
                            echo json_encode($response);
                        } else {
                            if($conn->query($sql)) {
                                $response = [
                                    "isProcessed" => true,
                                    "msg" => "Reservation booked! Our team will contact you the soonest."
                                ];
                                echo json_encode($response);
                                
                            } else {
                                $response = [
                                    "isProcessed" => false,
                                    "msg" => "Error in booking. Try again later."
                                ];
                                echo json_encode($response);
                            }
                        }
        
                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    };
            }
            break;
        case "reservations":
            $process = $_POST['process'];
            $id = $_POST['id'];
            $celebrantName = htmlspecialchars(trim($_POST['celebrantName']));
            $customerName = htmlspecialchars(trim($_POST['customerName']));
            $eventDateTime = htmlspecialchars(trim($_POST['eventDateTime']));
            $eventStatus = htmlspecialchars(trim($_POST['eventStatus']));
            $reservationType = htmlspecialchars(trim($_POST['reservationType']));
            $reservationDate = htmlspecialchars(trim($_POST['reservationDate']));

            $sql = "UPDATE booking 
                SET cname='".$celebrantName."', name='".$customerName."', rdates='".$reservationDate."', reservation='".$reservationType."', event_datetime='".$eventDateTime."', is_done='".$eventStatus."'
                WHERE id='".$id."'";

            // echo $conn->query($sql);    
            try {
                if($conn->query($sql)) {
                    $response = [
                        "isProcessed" => true,
                        "msg" => "Reservation successfully updated!"
                    ];
                    echo json_encode($response);
                    
                } else {
                    $response = [
                        "isProcessed" => false,
                        "msg" => "Error saving data."
                    ];
                    echo json_encode($response);
                }

            } catch(Exception $e) {
                $response = [
                    "isProcessed" => false,
                    "msg" => $e
                ];
                echo json_encode($response);
            }    
            break;
        default:
            $process = $_POST['process'];
            switch($process) {
                case "delete":
                    $id = $_POST['id'];

                    $sql = "DELETE FROM users WHERE id='".$id."'";

                    try {
                        if($conn->query($sql)) {
                            $response = [
                                "isProcessed" => true,
                                "msg" => "User successfully removed!"
                            ];
                            echo json_encode($response);
                            
                        } else {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Error removing data."
                            ];
                            echo json_encode($response);
                        }

                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    }
                    break;

                case "edit":
                    $id = $_POST['id'];
                    $name = htmlspecialchars(trim($_POST['name']));
                    $username = htmlspecialchars(trim($_POST['username']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $role = htmlspecialchars(trim($_POST['role']));
                    $email = htmlspecialchars(trim($_POST['email']));

                    $sql = "UPDATE users 
                        SET email='".$email."', name='".$name."', user_name='".$username."', password='".$password."', role='".$role."'
                        WHERE id='".$id."'";

                    try {
                        if($conn->query($sql)) {
                            $response = [
                                "isProcessed" => true,
                                "msg" => "Reservation successfully updated!"
                            ];
                            echo json_encode($response);
                            
                        } else {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Error saving data."
                            ];
                            echo json_encode($response);
                        }

                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    }
                    break;
                default:
                    $name = htmlspecialchars(trim($_POST['name']));
                    $username = htmlspecialchars(trim($_POST['username']));
                    $password = htmlspecialchars(trim($_POST['password']));
                    $role = htmlspecialchars(trim($_POST['role']));
                    $email = htmlspecialchars(trim($_POST['email']));
        
                    $sql = "INSERT INTO users(`email`, `name`, `user_name`, `password`, `role`) 
                        VALUES ('$email', '$name', '$username', '$password', '$role')";
                        
                    try {
                        if($conn->query($sql)) {
                            $response = [
                                "isProcessed" => true,
                                "msg" => "New user successfully added!"
                            ];
                            echo json_encode($response);
                            
                        } else {
                            $response = [
                                "isProcessed" => false,
                                "msg" => "Error saving data."
                            ];
                            echo json_encode($response);
                        }
        
                    } catch(Exception $e) {
                        $response = [
                            "isProcessed" => false,
                            "msg" => $e
                        ];
                        echo json_encode($response);
                    };
            }
    }
}
?>