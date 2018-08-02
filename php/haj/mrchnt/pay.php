<html>
<head>
  <link rel="stylesheet" href="css1.css">  <title> Haji Wallet - pay</title>

</head>
<body>

<? 
include "../config.php";

if(isset($_POST['scan']))

 {
  	 $barcode = trim($_POST['barcode']);

		 if ($barcode == '') 
		 {
        	$msg = "You must Scan Barcode";
            } 
          else
            {
				
				$sql = "Select *from register where reg_id='$barcode' ";
    	    		
       			 $query = mysql_query($sql,$link);
       			 
       	     }  

             	 if ($query === false) {
        	    echo "Could not successfully run query ($sql) from DB: " . mysql_error();
        	    exit;
           		  }
			if (mysql_num_rows($query) > 0)
			{$result=mysql_fetch_array($query);
		
		echo "<center> <font color=#fffff size=6>Hajj Id:".$result['reg_id'];
		echo "<br> Hajj Name:".$result['name'];
		//echo "<br> Hajj amount:".$result['amount']." ".$result['currency'];
		echo"<META HTTP-EQUIV='Refresh' CONTENT='1;URL=pay2.php'>";
		exit();

		
		
		
				  
			}
			
			
			
			
			  else 
{

	 
        $msg = "<center> <font color=red size=5>Barcode not match";
		
      
	}
 }
				
				

?>
<center>


<center>
	<div id="results">Your captured image will appear here...</div>
	
	
	
	<div id="my_camera"></div>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="../webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 600,
			height: 460,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
	</script>
	
	<!-- A button for taking snaps -->
	<!--<form action="saveimage.php">
		<input type=button value="Go"  onClick="take_snapshot()">
	</form>-->
	
	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				
				document.getElementById('results').innerHTML = 
					'<h2>Processing</h2>';
					
				Webcam.upload( data_uri, 'saveimage.php', function(code, text) {
					document.getElementById('results').innerHTML = 
					'<h2>successfully registered, you may login now</h2>' + 
					'<img src="'+text+'"/>' + '<META HTTP-EQUIV="Refresh" CONTENT="1;URL=profile.php"> ';
				} );	
			} );
		}
	</script>
<form name="frmpay"action="<?= $_SERVER['PHP_SELF'] ?>" method="post" >
		
						<?php echo $msg; ?>

		 
		<input  name="barcode" id="barcode" type="text" size="30" class="form-control" placeholder="barcode:"/>
	
<br>
	
				<input  type="submit" name="scan" value="Scan" alt="scan" title="scan" class="btn btn-default"  id="btnlogin" "/>
	</div>			

</form>






</body>