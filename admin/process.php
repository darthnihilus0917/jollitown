<?php
include('./../config/db.php'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch($_POST['module']) {
        case "customer":
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

                    $sql = "UPDATE booking 
                        SET cname='".$celebrantName."', name='".$customerName."', rdates='".$reservationDate."', reservation='".$reservationType."', event_datetime='".$eventDateTime."', is_done='".$eventStatus."',
                        mobile='".$mobile."', age='".$age."', gender='".$gender."', nickname='".$nickname."'
                        WHERE id='".$id."'";
                    
                    echo $sql;

                    break;
                default:
                    $celebrantName = htmlspecialchars(trim($_POST['celebrantName']));
                    $customerName = htmlspecialchars(trim($_POST['customerName']));
                    $eventDateTime = htmlspecialchars(trim($_POST['eventDateTime']));
                    $eventStatus = htmlspecialchars(trim($_POST['eventStatus']));
                    $reservationType = htmlspecialchars(trim($_POST['reservationType']));
                    $reservationDate = htmlspecialchars(trim($_POST['reservationDate']));
        
                    $sql = "UPDATE booking 
                        SET cname='".$celebrantName."', name='".$customerName."', rdates='".$reservationDate."', reservation='".$reservationType."', event_datetime='".$eventDateTime."', is_done='".$eventStatus."'
                        WHERE id='".$id."'";
                        
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
                                "msg" => "User successfully updated!"
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