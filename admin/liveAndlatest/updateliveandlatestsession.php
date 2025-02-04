<?php 
include('../adminSession.php');
include('../../connection.php');
if(isset($_REQUEST['submit'])){
   $linkid = mysqli_real_escape_string($conn, $_POST['linkid']);
   $VideoLinkenglish = mysqli_real_escape_string($conn, $_POST['Content']);
   $VideoLinkHindi = mysqli_real_escape_string($conn, $_POST['Content1']);

    $query = "UPDATE LiveAndLatestSessionVideo SET 	VideoEmbedCodeEnglish = '$VideoLinkenglish', VideoEmbedCodeHindi = '$VideoLinkHindi'
    WHERE VideoId = '$linkid'";
    $run = mysqli_query($conn,$query);
    if($run){?>
    <script>

        alert('Video Link Updated');
        location.replace('latestSessionupdate.php');
    </script>
    
    <?php



    }else{
        ?>
    <script>

        alert('Video Not Link Updated');
        location.replace('latestSessionupdate.php');
    </script>
    
    <?php
    }
}

?>