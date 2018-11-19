
<?php 
session_start();
echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';
require_once 'connection.php';
// $sql = "SELECT * FROM wedding_data";  
// $result = mysqli_query($conn, $sql);


// while ($row = mysqli_fetch_array($result)) {
//     echo '<tr>';
//     foreach($row as $field) {
//         echo '<td>' . htmlspecialchars($field) . '</td><br>';
//     }
//     echo '</tr><br>';
// }


// $data = array();
// while($enr = mysqli_fetch_assoc($result)){
//     $a = array("id"=>$enr['id'],"wedding-month"=>$enr['wed_month'],"wedding-date"=>$enr['wed_date'], "wedding-year"=>$enr['wed_year'],"wedding-hour"=>$enr['wed_hour'],"wedding-minute"=>$enr['wed_min'],"user-id"=>$enr['user_id'],"shared-person-id"=>$enr['shared_person_id'],"wedding-location"=>$enr['location']);
//     array_push($data, $a);
// }
// print_r($data['id']);
