<?php 
   session_start();
   include "db_conn.php";
   if (isset($_SESSION['username']) && isset($_SESSION['id'])) {   ?>

<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
	<script type="text/javascript">
        function preventBack(){
            window.history.forward();}
            setTimeout("preventBack()",0);
            window.onunload=function(){null;}
        </script>
</head>
<body>
      <div class="container d-flex justify-content-center align-items-center"
      style="min-height: 100vh">
      	<?php if ($_SESSION['role'] == 'Administrator') {?>
      		<!-- For Administrator -->
			  <?php  header("Location: Administrator/index.php"); ?>
		<?php }else { ?>
      		<!-- FORE Registral -->
			  <?php  header("Location: Registral/index.php"); ?>
      	<?php } ?>
      </div>
</body>
</html>
<?php }else{
	header("Location: index.php");
} ?>