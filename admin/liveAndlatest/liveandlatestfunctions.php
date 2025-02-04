<?php 

function fetchliveandlatestlink(){
    include('../../connection.php');
    $query = "SELECT * FROM LiveAndLatestSessionVideo";
    $run = mysqli_query($conn,$query);
    while($data = mysqli_fetch_assoc($run)){
        $liveandlatestlink[] = $data;
    }

    return $liveandlatestlink;
    mysqli_close($conn);


}


?>