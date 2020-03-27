 <?php
session_start();
$user =  $_SESSION['Email'];
$role = $_SESSION['Role'];
if(empty($_SESSION['Email']))
{
header("location:index.php");
}
else
{
if($role=="Admin")
{
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <link rel="stylesheet" type="text/css" href="../css.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style>
	body
	{
		/*background-image:url(../background.png);*/
		background-repeat: no-repeat; 
		background-attachment: fixed;
		background-size: 100% 100%;
	}
        
</style>
<title>PAMS</title>
</head>
<div>
<body>
<table width="100%"  border="0"cellspacing="00" cellpadding="00">
  <tr bgcolor="#2536df">
    <th width="74" scope="col">&nbsp;</th>
    <th width="164" scope="col"><a href="../Admin.php"><img src="../logo1.png" alt="LOGO"/></a></th>
    <th width="646" scope="col"><font size="8" color="White">Project Information Management System</font></th>
    <th width="140" scope="col"><font color="White" size="5">
	<?php
    print $role;
    ?></font></th>
    <th width="63" scope="col">&nbsp;</th>
  </tr>
</table>
<table width="100%" border="0" cellspacing="01" cellpadding="01">
  <tr bgcolor="#99CCFF">
      <th width="5%" scope="col"><h4>&nbsp;</h4></th>
      <th width="12%" scope="col"><a href="student.php">Add Student</a></th>
      <th width="11%" scope="col"><a href="faculty.php">Add Supervisor</a></th>
      <th width="11%" scope="col"><a href="stsearch.php">Search Student</a></th>
      <th width="11%" scope="col"><a href="fa_search.php">Search Supervisor </a></th>
      <th width="11%" scope="col"><a href="allocate.php">Allocate</a></th>
      <th width="11%" scope="col"><a href="skill.php">Skill Matrix</a></th>
      <th width="11%" scope="col"><a href="report.php">Reports</a></th>
      <th width="11%" scope="col"><a href="../logout.php">Logout</a></th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
</table>
    <br/><br/>
    </p>
    <?php
    $iderr = $stnameerr = $stemailerr = $stphoneerr = $stpasserr= $styearerr= "";
    $id = $stname = $stemail = $stphone = $stpass= $styear= "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (empty($_POST["id"])) {
        $iderr ="file id is required";
      } else{
        $id = test_input($_POST["id"]);
      }
      if (empty($_POST["stname"])) {
        $stnameerr ="student name is required";
      } else{
        $stname = test_input($_POST["stname"]);
      }
      if (empty($_POST["stphone"])) {
        $stphoneerr ="studentphone is required";
      } else{
        $stphone = test_input($_POST["stphone"]);
      }
      if (empty($_POST["stpass"])) {
        $stpasserr ="password is required";
      } else{
        $stpass = test_input($_POST["stpass"]);
      }
      if (empty($_POST["styear"])) {
        $styearerr ="Year is required";
      } else{
        $styear = test_input($_POST["styear"]);
      }
    }


    ?>
    <form method="post" action="st.php">
        <div style="background-color: beige; margin-left: 25%; alignment-adjust: central; width: 50%">
            <table align="center" width="100%" cellspacing="01" cellpadding="05">
  <tr>
    <th width="7%" scope="col">&nbsp;</th>
    <th width="43%" scope="col">&nbsp;</th>
    <th width="44%" scope="col">&nbsp;</th>
    <th width="6%" scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">File ID&nbsp;:&nbsp;</font></td>
    <td><input type="text" size="20" id="in" name="id"/><font color="red" size="4">*</font></td>
    <td>&nbsp;</td>
    <span class="error"> <?php echo $iderr; ?></span>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Name&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="stname"/><font color="red">*</font></td>
    <td>&nbsp;</td>
    <span class="error"> <?php echo $stnameerr; ?></span>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Email&nbsp;:&nbsp;</font></td>
    <td><input type="email" id="in" name="stemail"/><font color="red">*</font></td>
    <td>&nbsp;</td>
    <span class="error">* <?php echo $stemailerr; ?></span>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Phone&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="stphone"/><font color="red">*</font></td>
    <td>&nbsp;</td>
    <span class="error">* <?php echo $stphoneerr; ?></span>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"> <font size="5">Password &nbsp;:&nbsp;</font></td>
    <td><input type="password" id="in" name="stpass"/><font color="red">*</font></td>
    <span class="error">* <?php echo $stphoneerr; ?></span>
    <td>&nbsp;</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Year&nbsp;:&nbsp;</font></td>
    <td><input type="text" id="in" name="styear"/><font color="red">*</font></td>
    <span class="error">* <?php echo $styearerr; ?></span>
    <td>&nbsp;</td>
    <span class="error">* <?php echo $styearerr; ?></span>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td align="right"><font size="5">Department&nbsp;: &nbsp;</font></td>
    <td><select name="stream" style="width: 193px; height: 2em; font-size: 15px;">
         <option value="Selcet">Select</option>
        <option value="ETE">EE</option>
        <option value="COE">COE</option>
        <option value="ETE">ETE</option>
        <option value="CE">CE</option> 
        <option value="ME">ME</option>
        <option value="MFT">MFT</option>
        <option value="BIT">BIT</option>
        <option value="LT">LT</option>
        <option value="FST">FST</option>

        </select><font color="red">*</font></td>
    <td>&nbsp;</td>
  </tr>
  
  <tr align="center" >
    <td>&nbsp;</td>
    <br/>
    <td colspan="2">
    <input type="submit"  name="add" value="Add" id="bt" />
    				
    <td>&nbsp;</td>
  </tr>
            </table> <br/><br/>  </div></form>
 <?php
 // $message = "Success!";
 // echo "<script type='text/javascript'>alert('$message');</script>";
}
elseif($role=="Faculty")    
{
?>
    <?php 
    header('Location:../Admin.php');
    ?>
 <?php
}
else   
{
?>
    <?php 
    header('Location:../Admin.php');
    ?>
<?php
}
?>
</table>
<p>
  <?php
}
?>
    
    

<p>&nbsp;</p>
