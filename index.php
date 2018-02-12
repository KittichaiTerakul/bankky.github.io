<!DOCTYPE html>
<html>
<head>
	<title>โปรแกรมคำนวณค่าสุขภาพ</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body class="wrapper">

	<center>
	<h1 class="rainbow">โปรแกรมคำนวณค่าสุขภาพ</h1>
	<select class="selec" id="dropdown1">
		<option>-------------------------Please select menu------------------------</option>
		<option class="opt1" id="opt1">คำนวณหาค่าดัชนีมวลกาย Body Mass Index (BMI)</option>
		<option class="opt2" id="opt2">คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</option>
		<option class="opt3" id="opt3">คำนวณค่าคอเลสเตอรอลรวม</option>
	</select>
	<button class="btn" id="btn">Submit</button>
	</center>

	<form id = "1"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="bmiCal" id="bmiCal">
		<h1 id="bmi">คำนวณดัชนีมวลกาย Body Mass Index (BMI)</h1><br>
		<h2>ส่วนสูง/เซนติเมตร : <input type="text" name="centi1" class="centi1" id="centi1" maxlength="3" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
		<h2>น้ำหนัก/กิโลกรัม : <input type="text" name="weight1" class="weight1" id="weight1" maxlength="3" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2><br>
		<input class="sub" type="submit" name="BMI">
	</div>
	</form>

	<form id = "2"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
	<div class="bmrCal" id="bmrCal">
		<h1 id="bmr">คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)</h1><br>
		<label><input name="Sex" type="radio" value="Male"   class="male"  /> ชาย</label>
        <label><input name="Sex" type="radio"  class="female" value="Female" checked="checked" />หญิง</label><br>
		<h2>ส่วนสูง/เซนติเมตร :<input type="text" name="he" class="centi1" id="centi1" maxlength="3" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
		<h2>น้ำหนัก/กิโลกรัม : <input type="text" name="we" class="weight1" id="weight1" maxlength="3" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>		
		<h2>อายุ/ปี : <input type="text" name="age" class="age1" id="age1" maxlength="3" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
		<h2>กิจกรรม : <select class="activities" id="dropdown2" name="case"></h2>
			<option>-------------------------Please select menu------------------------</option>
			<option value="o1" class="opt1" id="opt1">ไม่ออกกำลังกายหรืออกกำลังกายน้อยมากๆ</option>
			<option value="o2" class="opt2" id="opt2">ออกกำลังกายน้อยเล่นกีฬา 1-3 วัน/สัปดาห์</option>
			<option value="o3" class="opt3" id="opt3">ออกกำลังกายปานกลางเล่นกีฬา 3-5 วัน/สัปดาห์</option>
			<option value="o4" class="opt4" id="opt4">ออกกำลังกายหนักเล่นกีฬา 6-7 วัน/สัปดาห์</option>
			<option value="o5" class="opt5" id="opt5">ออกกำลังกายหนักมากเป็นนักกีฬา</option>
		</select>
		<input class="sub" type="submit" name="BMR">
	</div>
	</form>

	<form id = "3"  method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    <div class="calCo" id="calCo">
    	<h1 id="co">คำนวณค่าคอเลสเตอรอลรวม</h1>
    	<h2>ไขมันแอลดีแอล : <input type="text" name="LDL" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
    	<h2>ไขมันเอชดีแอล : <input type = "text" name="HDL" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
    	<h2>ไตรกลีเซอไรด์ : <input type = "text" name="TRI" onKeypress="return event.charCode >= 48 && event.charCode <= 57"></h2> <br>
    	<input class="sub" type="submit" name="คำนวณค่าคอเลสเตอรอลรวม">
   	</div>
    </form>

	<script type="text/javascript" src="jquery-3.3.1.min.js" ></script>
	<script>
		function home(){
			$("#bmiCal").hide();
			$("#bmrCal").hide();
			$("#calCo").hide();
      $("#clear").hide();		
		}
		home();
		$(function() { 
  			$('#dropdown1').change(function() {
     			if ($(this).val() == 'คำนวณหาค่าดัชนีมวลกาย Body Mass Index (BMI)') {
     				$("#btn").click(function(){
     					$("#btn").hide();
     					$("#dropdown1").hide();
     					$("#clear").hide();
     					$("#bmiCal").show();

    				})
     			} else if ($(this).val() == 'คำนวณการเผาผลาญพลังงาน Basal Metabolic Rate (BMR)'){
     				$("#btn").click(function(){
     					$("#btn").hide();
     					$("#dropdown1").hide();
     					$("#clear").hide();
     					$("#bmrCal").show();
     				})
     			} else {
     				$("#btn").click(function(){
     					$("#btn").hide();
     					$("#dropdown1").hide();
     					$("#clear").hide();
     					$("#calCo").show();
     				})
     			}
  			});
 		});
	</script>

	<h2 class="clear" id="clear"><?php
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['BMI']) ) {
    		$weight = htmlspecialchars($_REQUEST['weight1']); 
   			$hight = htmlspecialchars($_REQUEST['centi1']); 
        if (!empty($weight) && !empty($hight)){
            $hight = ((htmlspecialchars($_REQUEST['centi1'])*0.01));
            if(is_numeric($weight) && is_numeric($hight)){
              $result = $weight/($hight*$hight);
              if($result>30){
                  echo "ค่าBMI = ".$result."   อ้วนระดับ2 คุณเสี่ยงต่อการเกิดโรคที่มากับความอ้วน หากคุณมีเส้นรอบเอวมากกว่าเกณฑ์ปกติคุณจะเสี่ยงต่อการเกิดโรคสูง คุณต้องควบคุมอาหาร และออกกำลังกายอย่างจริงจัง" ;
              }else if($result<=30 && $result>= 25){
                  echo "ค่าBMI = ".$result."   อ้วนระดับ1 และหากคุณมีเส้นรอบเอวมากกว่า 90 ซม.(ชาย) 80 ซม.(หญิง) คุณจะมีโอกาศเกิดโรคความดัน เบาหวานสูง จำเป็นต้องควบคุมอาหาร และออกกำลังกาย";
              }else if($result>=23 && $result<25){
                  echo "ค่าBMI = ".$result."   น้ำหนักเกิน หากคุณมีกรรมพันธ์เป็นโรคเบาหวานหรือไขมันในเลือดสูงต้องพยายามลดน้ำหนักให้ดัชนีมวลกายต่ำกว่า 23";
              }else if($result>=18.6 && $result<23){
                  echo "ค่าBMI = ".$result."   น้ำหนักปกติและมีปริมาณไขมันอยู่ในเกณฑ์ปกติ มักจะไม่ค่อยมีโรคร้าย อุบัติการณ์ของโรคเบาหวาน ความดันโลหิตสูงต่ำกว่าผู้ที่อ้วนกว่านี้";
              }else{
                  echo "ค่าBMI = ".$result."   ผอมเกินไป ซึ่งอาจจะเกิดจากนักกีฬาที่ออกกำลังกายมาก และได้รับสารอาหารไม่เพียงพอ วิธีแก้ไขต้องรับประทานอาหารที่มีคุณภาพ และมีปริมาณพลังงานเพียงพอ และออกกำลังกายอย่างเหมาะสม";
              }
          }
        }else{
          echo "Please input";
        }
		} 
		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['BMR'])){
			   $weightB = htmlspecialchars($_REQUEST['we']); 
   			$hightB = htmlspecialchars($_REQUEST['he']); 
   			$age = htmlspecialchars($_REQUEST['age']);
        if (!empty($weightB) && !empty($hightB) && !empty($age)){
            if ($_POST['Sex']=='Male') {
              $total = (66+(13.7*$weightB)+(5*$hightB)-(6.8*$age));
              if($_POST['case']=="o1"){
                  $total1 = $total*1.2 ;
              }else if($_POST['case']=="o2"){
                    $total1 = $total*1.375 ;
              }else if($_POST['case']=="o3"){
                  $total1 = $total*1.55 ;
              }else if($_POST['case']=="o4"){
                  $total1 = $total*1.725 ;
              }else if($_POST['case']=="o5"){
                  $total1 = $total*1.9 ;
              }

              echo "BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิตของผู้ชาย =  ".$total. "กิโลแคลอรี่" ;
              echo "<br />\n";
              echo "TDEE (Total Daily Energy Expenditure) พลังงานที่ต้องใช้ในแต่ละวันของผู้ชาย =  ".$total1. "กิโลแคลอรี่";
        }else if ($_POST['Sex'] == 'Female'){
              $total = (665+(9.6*$weightB)+(1.8*$hightB)-(4.7*$age));
              if($_POST['case']=="o1"){
                  $total1 = $total*1.2 ;
              }else if($_POST['case']=="o2"){
                    $total1 = $total*1.375 ;
              }else if($_POST['case']=="o3"){
                  $total1 = $total*1.55 ;
              }else if($_POST['case']=="o4"){
                  $total1 = $total*1.725 ;
              }else if($_POST['case']=="o5"){
                  $total1 = $total*1.9 ;
              }
              echo "BMR (Basal Metabolic Rate) พลังงานที่จำเป็นพื้นฐานในการมีชีวิตของผู้หญิง =  ".$total. "กิโลแคลอรี่";
              echo "<br />\n";
              echo "TDEE (Total Daily Energy Expenditure) พลังงานที่ต้องใช้ในแต่ละวันของผู้หญิง =  ".$total1. "กิโลแคลอรี่";
          } 
        }else{
          echo "Please input";
        }
   			
		}

		if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST['คำนวณค่าคอเลสเตอรอลรวม'])) {
    		$L1 = htmlspecialchars($_REQUEST['LDL']); 
    		$H1 = htmlspecialchars($_REQUEST['HDL']); 
    		$T1 = htmlspecialchars($_REQUEST['TRI']); 
        if (!empty($L1) && !empty($H1) && !empty($T1)){
            if(is_numeric($L1) && is_numeric($H1) && is_numeric($T1)){
            $result = $L1+$H1+($T1/5);
            if($result<200){
                echo $result."   ระดับคอลเลสเตอรอลดีมาก";
            }else if($result>=200 && $result<240){
                echo $result."   ระดับคอลเลสเตอรอลค่อนข้างสูง";
            }else if ($result>=240){
                echo $result."   ระดับคอลเลสเตอรอลค่อนข้างสูง";
            }
        }else{
            echo "Please input";
        }
        } else{
          echo "Please input";
        }

		}
	?></h2>
</body>
</html>