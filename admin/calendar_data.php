<?php 
include('./../config/db.php'); 


$sql = "SELECT * FROM booking WHERE is_done='0'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        
        $date = new DateTime($row['event_datetime']);
        $date->modify('+2 hours');
        $modifiedTimeString = $date->format('Y-m-d H:i:s');
        $events[] = array(
            'id' => $row['id'],
            'title' => $row['cname'],
            'start' => $row['event_datetime'],
            'end' => $modifiedTimeString
        );
    }
} else {
    $data = [];
    echo $data;
}
echo json_encode($events);
?>