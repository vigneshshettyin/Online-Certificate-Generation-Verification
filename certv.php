<?php 
require_once('config/configverify.php')
?>

<!DOCTYPE html>
<html lang="en">
<head>

  <title>CGV : Online Certificate Verification System</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta charset="utf-8">
  <link rel="icon" href="img/logo.png" type="image/gif">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro&display=swap" rel="stylesheet">

  <style>

    body{
      font-family: 'Source Serif Pro', serif;
      /* background: #D3CCE3;  */
       /* fallback for old browsers */
      /* background: -webkit-linear-gradient(to right, #E9E4F0, #D3CCE3);  /* Chrome 10-25, Safari 5.1-6 */
      /* background: linear-gradient(to right, #E9E4F0, #D3CCE3);  */
      background-image: url(img/certv.png);
      /* Full height */
      height: 100vh;
    /* Center and scale the image nicely */
    background-position: center;
    /* background-repeat: no-repeat; */
    background-size: cover;
      /* background-attachment: fixed; */
    }

    .des_logo{
      font-size: 30px;
      padding-top: 30px;
      text-align: center;
    }

    .footer{
      font-size: 16px;
      padding-top: 120px;
    }
    div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: green;
   font-size: 20px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}
.table-title-red h3 {
   color: red;
   font-size: 20px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  height: 320px;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45;
  font-size:23px;
  font-weight: 100;
  padding:24px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:20px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:18px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
</style>
<script>
  var message="Right Click Disabled!";

function clickIE4(){
if (event.button==2){
alert(message);
return false;
 }
}

function clickNS4(e){
if (document.layers||document.getElementById&&!document.all){
if (e.which==2||e.which==3){
alert(message);
return false;
}
}
}

if (document.layers){
document.captureEvents(Event.MOUSEDOWN);
document.onmousedown=clickNS4;
}
else if (document.all&&!document.getElementById){
document.onmousedown=clickIE4;
}

document.oncontextmenu=new Function("alert(message);return false")
</script>
</head>

<body>

<div class="container">

  <br>
  <div class="row">

      <!-- <img class="img-responsive center-block" src="img/logo.png" alt="" height="80" width="80">

      <p class="des_logo">CGV</p>
      <p class="text-center lead"><strong>Online Certificate Verification</strong></p> -->


  <div class="text-center">

    <div class="col-sm-3">


    </div>

    <div class="col-sm-6">

        <form class="form-inline" method="POST">
    <div class="form-group">
    <input type="text" class="form-control input-lg" name="cert_no" placeholder="Certificate Number" required>
    </div>
    &nbsp;&nbsp;
    <button type="submit" name="validate" class="btn btn-primary btn-lg">View</button>
  </form>
    </div>
  </div>
  <br>
  <br>
  <br>
  <?php validate(); ?>
</div>
</body>

</html>
