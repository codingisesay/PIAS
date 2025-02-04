<?php
	session_start();
	if(!isset($_SESSION['StudentId']) && !isset($_SESSION['MailId']) && !isset($_SESSION['MobileNo']) && !isset($_SESSION["Name"])){

	  header('location:../login.php');

	}
	
	$course_id = $_GET['course_id'];
	
	include('../connection.php');
	
	$query = "SELECT * FROM `StudentAssignCourse` where StudentId =  $_SESSION[StudentId] and CourseId = $course_id and status = 1";
	
    $result = mysqli_query($conn,$query);
	$row = mysqli_num_rows($result); 
    if($row == 0){ 
		die("You are not enrolled for this course");
	} 
	
	
	$query = "select LectureId,SubjectLocalName,Lecture.SubjectId,LectureStartTime,
			LectureEndTime,VideoEmbedCode,s.SubjectName,Synopsis
			from Lecture 
            left join Subjects s on s.SubjectId =  Lecture.SubjectId
            where CourseId = $course_id order by SubjectId desc,LectureId asc";
			
    $result = mysqli_query($conn,$query);
	
	$SubjectName = "";
	$output = "";
	$i =0;
	while ($row = mysqli_fetch_array($result)) {
		if($SubjectName !== $row['SubjectName']){
			if($i !=0){
				$output .= "</li>";
			}
			else{
				$synopsis = $row['Synopsis'];
				$embeded_code =  $row['VideoEmbedCode'];
				$lecture_id = $row['LectureId'];
			}
			$output .="<li class='init-arrow-down'> 
					<a href='javascript:void(0)'> <span class='gw-menu-text'>$row[SubjectName]</span> 
						<b class='gw-arrow icon-arrow-up8'></b> </a>
						<ul class='gw-submenu'>
							<li>
								<a href='classlist.php?course_id=$course_id&vid=$row[LectureId]'>
								$row[SubjectLocalName] - ";
			$output .= date('d/m/Y',strtotime($row["LectureStartTime"]));
			$output .="</a>
							</li>
						</ul>";
				
		}
		else{
			$output .="<ul class='gw-submenu'>
							<li>
								<a href='classlist.php?course_id=$course_id&vid=$row[LectureId]'>
								$row[SubjectLocalName] - ";
			$output .= date('d/m/Y',strtotime($row["LectureStartTime"]));
			$output .="</a>
							</li>
						</ul>";
		}
		$SubjectName = $row['SubjectName'];
		if(isset($_GET['vid']) && $row['LectureId'] == $_GET['vid']){
			$synopsis = $row['Synopsis'];
			$embeded_code =  $row['VideoEmbedCode'];
			$lecture_id = $row['LectureId'];		
		}
		$i++;
	}
	
	if(isset($lecture_id)){
		$handout_notes_view = "";
		$query = "SELECT * FROM `LectureHandout` where LectureId =  $lecture_id";	
		$result = mysqli_query($conn,$query);
		while ($row = mysqli_fetch_array($result)) {
			$handout_notes_view .= "<a href='../$row[HandoutLink]' target='_blank'>$row[HandoutName]<a>";
		}
	}else{
		die("<h1>No Class have been schedule in this course.Please check this page after sometime</h1>");
	}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/bootstrap.min.css"> 
<style type="text/css">
@media screen and (min-width:901px){
	
	#mobile_app{
		display:none!important
	}
}
@media screen and (max-width:900px){
	#mob_id{
		display:none!important;
	}
	#app{
		display:none!important;
	}
}
@supports (-ms-ime-align:auto) {
   #app{
		display:none!important;
	}
	#mobile_app{
		display:none!important
	}
}
</style>
</head>
<header>


</header> 

<!DOCTYPE html>
<html lang="en" >
<head><script type="text/javascript">var NREUMQ=NREUMQ||[];NREUMQ.push(["mark","firstbyte",new Date().getTime()]);</script>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Patriotic IAS - Video Classroom Lecture</title>
    <meta name="keywords" content="UPSC,Upsc Paper,Upsc Online Classroom,Upsc Video Lecture">
    <meta name="description" content="Patriotic IAS Video Classroom Program"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link type="text/css" rel="stylesheet" href="/css/web.css" />
    <link href='https://fonts.googleapis.com/css?family=Alegreya:400,700' rel='stylesheet' type='text/css'>
    
    <link rel="stylesheet" type="text/css" href="/css/bs_leftnavi.css">
	<script type="text/javascript" src="/js/bs_leftnavi.js"></script>
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="/js/libs.min.js"></script>
    <script type="text/javascript" src="/js/mathjax.js"></script>
    <script type="text/javascript" src="/js/tpr.min.js"></script>
<style type="text/css">

@media (min-width:1200px){
	.container{
		margin-top:10px!important;
	}
	.mb-20{
	margin-top:40px!important;
	}
	.Vision-IAS-MENU{
		display:none!important;
	}
	.Vision-IAS-Logo{
		margin-top:0px!important;
	}

	.pv-30{
		margin-top:35px!important;
	}
}
@media (max-width:1200px){
	.pv-30{
		padding-top:50px!important;
	}
	.mobileMenu_fallbackHeader{
		background:#f8f8f8!important;
	}
	.pHeader {
		background:rgba(34, 34, 34, 0.73)!important;
	}
	.mb-20{
		margin-top:40px!important;
	}
	.navbar-fixed-top{
		display:none!important;
	}
}
.js-main-sidebar{
	margin-top:-32px!important;
}
.pTopHeader{
	background:#f8f8f8!important;
}
.mainSidebar_logoBlock{
	background:none!important;
}
.js-video {
  height: 0;
  padding-top: 0px;
  padding-bottom: 56.2%;
  margin-bottom: 10px;
  position: relative;
  overflow: hidden;
}
 
.js-video.widescreen {
  padding-bottom: 56.34%;
}
 
.js-video.vimeo {
  padding-top: 0;
}
.js-video embed, .js-video iframe, .js-video object, .js-video video {
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	position: absolute;
}

</style>
</head>

<body>
<div class="pageContentContainer" id="pageContentContainer">
<div class="mobileMenu" style="position:fixed; top:0; left:0; right:0; height:50px;z-index:10">
		<div class="mobileMenu_fallbackHeader"></div>
		<div class="mobileMenu_hamburger js-hamburger-menu">
		<div class="mobileMenu_hamburger_icon glyphicon glyphicon-menu-hamburger">
		<img alt="Vision-IAS Logo" title="Vision-IAS Logo"
			style="width:140px; margin-top:-15px;margin-left:18px" border="0" 
			src="https://patrioticias.in/photos/sky_500_500-removebg-preview%20(1).png">
		</div>
		</div>
	</div>

	<div id="page_content_wrapper" class="js-page-content-wrapper">
   <div class="pHeader">
   <!--video LInk-->
	<div class="pHeader_tabsWrapper js-page-tabs-wrapper mb-20">
		<div class="container">
			<nav role="navigation">
				<ul class="pHeader_tabs">
						
					<li class="active"><a href="video_class_timeline_dashboard.php?vid=<?php echo $lecture_id ?>&course_id= <?php echo $course_id ?>" >Video</a></li>
					<li><a href="self_test_dashboard.php?vid=<?php echo $lecture_id ?>&course_id=<?php echo $course_id ?>">PRELIMS PRACTICE QUESTIONS</a></li> 
					<li><a href="assignment_dashboard.php?vid=<?php echo $lecture_id ?>&course_id=<?php echo $course_id ?>" >MAINS PRACTICE QUESTIONS</a></li>
				</ul>
			</nav>
		</div>
	</div>
	<div class="pHeader_tabsSpacing">
		
	</div>
</div>

<div class="container pv-30">
  
<div class="pCol pCol-wide alpha">
<div class="js-video [vimeo, widescreen]">

<iframe width="555" height="312" src="<?php echo $embeded_code;?>" title="GORAKHPUR: THE RISING HUB FOR IAS/PCS (UPSC/STATE PSC) PREPARATION." allowfullscreen></iframe><br>
</div>
<div class="csTile mb-20 formula js-sheet-tile" data-id="6568" data-type="formula" data-is-bookmarked="0">
				<div class="csTile_indicator"></div>
				<div class="csTile_header clearfix">
					<div class="csTile_num">1</div>
					<div class="csTile_header_vSeperator fl"></div>
					<div class="csTile_type">Summary</div>
					
				</div>
				<div class="csTile_body apply-mathjax">
					
						<?php echo $synopsis?>
				</div>
</div>
<div style="display:none">
<video width="320" height="240" controls>
<source src="upload/index.php?vid=92124&pid=6087&id=2862709152066476543" type="video/mp4">
</video>
</div>
</div>
<aside class="pCol pCol-narrow omega">
 <div class="upgradeBanner">

	<h3 class="heading-bordered h3">Class Handouts/Notes</h3>
	<div class='subHeading mv-20'>
		<?php echo $handout_notes_view ?>
		<hr>
	</div>
</div>
       
</aside>
<div class="clr">
</div>
</div>
</div>
</div>
<div class="mainSidebar js-main-sidebar">
<div style ="margin-top:40px;">

</div>
<nav role="navigation" class="mainSidebar_contentBlock js-main-sidebar-content-block">
	
<!DOCTYPE html>
<html>
<head lang="en">
<head>
<style>
.help-tip{
	
	top: 18px;
	right: 18px;
	text-align: center;
	background-color: #55BBEA;
	border-radius: 50%;
	width: 24px;
	height: 24px;
	font-size: 14px;
	line-height: 0px;
	cursor: default;
}

.help-tip:before{
	content:'?';
	font-weight: bold;
	color:#fff;
}

.help-tip:hover p{
	display:block;
	transform-origin: 100% 0%;

	-webkit-animation: fadeIn 0.3s ease-in-out;
	animation: fadeIn 0.3s ease-in-out;

}

.help-tip p{	/* The tooltip */
	display: none;
	text-align: left;
	background-color: #1E2021;
	padding: 20px;
	width: 300px;
	position: absolute;
	border-radius: 3px;
	box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
	right: -4px;
	color: #FFF;
	font-size: 13px;
	line-height: 1.4;
}

.help-tip p:before{ /* The pointer of the tooltip */
	position: absolute;
	content: '';
	width:0;
	height: 0;
	border:6px solid transparent;
	border-bottom-color:#1E2021;
	right:10px;
	top:-12px;
}

.help-tip p:after{ /* Prevents the tooltip from being hidden */
	width:100%;
	height:40px;
	content:'';
	position: absolute;
	top:-40px;
	left:10px;
}

/* CSS animation */

@-webkit-keyframes fadeIn {
	0% { 
		opacity:0; 
		transform: scale(0.6);
	}

	100% {
		opacity:100%;
		transform: scale(1);
	}
}

@keyframes fadeIn {
	0% { opacity:0; }
	100% { opacity:100%; }
}
</style>
</head>
<body>
 <hr>
	<a href='/studentZone/dashboard.php' ><font color=black><h3>Dashboard</h3></font></a>
	<hr>
	<h1><b>Classes</b></h1>	
    <ul class="gw-nav gw-nav-list">
	
    <?php echo $output ?>
	
			</ul></li></ul></body>
</html>
</nav>
</div>
<div class="mdOverlay js-main-sidebar-overlay"></div>
</body>
</html>
