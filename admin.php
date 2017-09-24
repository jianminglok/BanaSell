<?php 
session_start();

$page = 'admin.php';

include_once 'dbconnect.php';

$error = false;

// sql to create table

$_SESSION['form'] = NULL;

if(isset($_POST['getval'])) {

    

    $form_value = $_POST['form'];

    if(strpos($form_value, 'f') !== false) {
        $form_value_final = preg_replace("/[^0-9]/","",$form_value);
        
    }

    $form = 'form' . $form_value_final;

    $_SESSION['form'] = $form;

    $val = array();

    $sql4= mysqli_query($con, "SELECT * FROM  `form4`");

    $previous = NULL;

    while($row = mysqli_fetch_array($sql4)){
        foreach($row as $field => $value) {
            if($value != '') {
            if($field != 0) {
                if($field != 1) {
            $current = $value;

            if($previous != null && $previous != $current) {

            $val[] = $value;
            } elseif(!$previous) {
                $val[] = $value;
            }

            $previous = $current;
        }
        }}
            
        }

    }

}

if(isset($_POST['signup'])) {




$form = $_SESSION['form'];

$year = date("Y");
$html = file_get_contents($page);

$num_of_books = sizeof($_POST['booksname']);

$sql = "CREATE TABLE IF NOT EXISTS $form (
    `id` int(4) NOT NULL AUTO_INCREMENT,
   
    PRIMARY KEY (`id`)
    
    )";
    
    if ($con->query($sql) === TRUE) {
       
    } else {
        echo "Error creating table: " . $con->error;
        exit();
    }

    
    $book = 'book_';
    $prep = $_POST['booksname'];
    $booksname[] = $_POST['booksname'];

    $subject[] = $_POST['subject'];



    mysqli_query($con, "ALTER TABLE $form ADD `year` INT(4) NOT NULL DEFAULT '$year'");
    
            
    mysqli_query($con, "INSERT INTO $form(`year`) VALUES('$year')");

    $subject_name = "_subject";
    $book_name = "book_";

    echo "Number of books: ".$num_of_books;
    echo '<br />';


    

for($i=1; $i <= $num_of_books; $i++) {

    
    $col = mysqli_query($con, "SELECT book_$i FROM  `$form`");
    
    if(!$col) {
  
    $sql2 = "ALTER TABLE $form ADD book_$i  VARCHAR(100)";
    

    if ($con->query($sql2) === TRUE) {
        
    } else {
        echo "Error creating table: " . $con->error;
        exit();
    }

    

    
}

$book_subject = $book_name . $i . $subject_name;
    $col2 = mysqli_query($con, "SELECT $book_subject FROM  `$form`");
    
    if(!$col2) {
    
    $sql3 = "ALTER TABLE $form ADD $book_subject  VARCHAR(100)";
    
    
    if ($con->query($sql3) === TRUE) {
        
    } else {
        echo "Error creating table: " . $con->error;
        exit();
    }
   
}




}
 
for($i = 0; $i <= $num_of_books - 1; $i++) {
    if(isset($_POST['booksname'][$i])) {

            echo $i;
            echo '<br />';
        
            ${"booksname" . $i} = $_POST['booksname'][$i];
            echo 'value of booksname'. $i .' is not null';
            echo '<br />';

            if($_POST['subject'][$i] != '') {
            ${"subject" . $i} = $_POST['subject'][$i];
            echo 'value of subject'. $i .' is not null';
            echo '<br />';
            } 
             
            } 
}

    

    $sql = mysqli_query($con, "SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = '$form'");
    $row = mysqli_fetch_array($sql);
        while($row = mysqli_fetch_array($sql)){
            
            $output[] = $row['COLUMN_NAME'];                
        }

        $json = json_encode($_POST['booksname']);
        $phpStringArray = str_replace(array("{", "}", ":"), 
                                      array("array(", "}", "=>"), $json);

        echo '<br />';     
        
        $id = null;
                                      

        for($i=0; $i < $num_of_books; $i++) {      
            
            echo 'Current value of i is: ' . $i;
            echo '<br />';

            $v = $i + 1;
            $z = $i + 2;           

            

            if($id != null) {

                $id4 = $con->insert_id;

                $v = $v + $i;
                $z = $z + $i; 

                echo 'Current value of i is: ' . $i;
                echo '<br />';
                echo 'Current value of v is: ' . $v;
                echo '<br />';
                echo 'Current value of z is: ' . $z;
                echo '<br />';
                
                mysqli_query($con, "UPDATE $form SET `$output[$v]` = '${"booksname" . $i}' WHERE `id` = $id");
                
                mysqli_query($con, "UPDATE $form SET `$output[$z]` = '${"subject" . $i}' WHERE `id` = $id");
                
                mysqli_query($con, "DELETE FROM $form WHERE  `id` != $id");
                                
               
            } else {

                echo 'Current value of i is: ' . $i;
                echo '<br />';
                echo 'Current value of v is: ' . $v;
                echo '<br />';
                echo 'Current value of z is: ' . $z;
                echo '<br />';
                
                

            if(mysqli_query($con, "INSERT INTO $form(`$output[$v]`) VALUES ('${"booksname" . $i}')")) {            
                $id = $con->insert_id;
                
                
                

                mysqli_query($con, "UPDATE $form SET `$output[$z]` = '${"subject" . $i}' WHERE `id` = $id");

                $id2 = $id - 1;
                mysqli_query($con, "DELETE FROM $form WHERE  `id` != $id");
            } else {
                
                echo("Error description: " . mysqli_error($con));

                echo '<br />';
                echo '<br />';
            }
            
        }
        }

        echo "<pre>";
        print_r($_POST['booksname']); 

        
       echo "</pre>";

       echo "<pre>";
       print_r($output); 

       echo "<pre>";
       print_r($_POST['subject']);  

       
      echo "</pre>";

      

       
exit();




exit();
}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Ogiebooks - Add Books</title>
</head>

<body style="background-image: url('img/background.jpg'); height:100%; background-size: 100% 100%;
        background-repeat: no-repeat;
        background-position: left top;">  

<?php

include('nav.php');

?>

<!-- Wide card with share menu button -->
<style>
.demo-card-wide.mdl-card {
  width: 350px;
  height: 487px;
}
.demo-card-wide > .mdl-card__title {
  color: #fff;
  height: 176px;
  background: #da4932;
}
}
.demo-card-wide > .mdl-card__menu {
  color: #fff;
}
</style>
<main class="mdl-layout__content">


<div class="demo-card-wide mdl-card mdl-shadow--2dp" id="form_card" style=" margin: 45px 0;
    max-width: 1044px;
    margin-left: auto;
    margin-right: auto;">
				<div class="mdl-card__title" style="padding-top: 9.9em">
					<h2 class="mdl-card__title-text">Add Books</h2>
				</div>
				<!-- MDL Progress Bar with Indeterminate Progress -->
				<div class="mdl-card__supporting-text" style="overflow-y: auto; padding-right: 1.36em">
				<form id="form-id" method="post" action="#" style="padding-left: 1em; padding-right: 1.1em; padding-top: 1em; ">  
				<!-- Simple Textfield -->
				
					<label class="mdl-textfield--floating-label" for="form">Which form are the books for?</label>
					<div class="mdl-selectfield mdl-js-selectfield" id="div_dbd" style="margin-bottom: 0.9em;">
						<select name="form" required class="mdl-selectfield__select mdl-textfield__input">
							<option></option>
							<option value="f1">Junior 1</option>
							<option value="f2">Junior 2</option>
							<option value="f3">Junior 3</option>
							<option value="f4">Senior 1</option>
							<option value="f5">Senior 2</option>
							<option value="f6">Senior 3</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Choose your form</label>
					</div>

<?php if(isset($_POST['getval'])) {

    
    for ($i=0; $i < sizeof($val) / 2; $i++) { 

        if($i != 0) {

            $v = $v + 2;
            $z = $z + 2;

        } else {
            $v = 0;
            $z = 1;
        }


        ?>

        

        <label class="mdl-textfield--floating-label	" for="name">Please enter the name of your books</label>
        <div class="mdl-textfield mdl-js-textfield " style="margin-bottom: 0.5em; padding-top: 0em;">
        <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: 0 0; padding: 0 0; width: 100%;">
        <div class="mdl-cell mdl-cell--7-col" style="float:left; margin: 0 0;">
            <input name="booksname[]" class="mdl-textfield__input" value="<?php echo $val[$v] ?>" required="true" type="text" id="name" style="padding-top:1.1em; height: 25px; width: 155px">
            <label class="mdl-textfield__label" for="booksname[]" style="width: 155px;height:43px;">Name</label>
            </div>
            <div class="mdl-cell mdl-cell--5-col">
            <div id="selectbox" class="mdl-selectfield mdl-js-selectfield" style="margin-left: 1.5em; margin-top: -0.5em">
            <select id="test" name="subject[]" class="mdl-selectfield__select mdl-textfield__input">

                <option value="<?php echo $val[$z]; ?>"><?php echo strtoupper($val[$z]); ?></option>
                <option value="bm">BM</option>
                <option value="cn">CN</option>
                <option value="en">EN</option>
                <option value="sci">SCI</option>
                <option value="am">AM</option>
                <option value="em">EM</option>
                <option value="maths">MATHS</option>
                <option value="sej">SEJ</option>
                <option value="khb">KHB</option>
                <option value="mor">MOR</option>
                <option value="geo">GEO</option>
                <option value="bio">BIO</option>
                <option value="chem">CHEM</option>
                <option value="phy">PHY</option>
                <option value="chist">CHIST</option>
                <option value="business">BUS</option>
                <option value="acc">ACC</option>
                <option value="econ">ECON</option>
                <option value="bookkeep">BK</option>
                <option value="comop">COMP</option>
            </select>
            <label class="mdl-selectfield__label" for="myselect">Subject</label>
            </div>
            </div>
        </div>

        </div>
        

        
    <?php } ?>
                    				
					<label class="mdl-textfield--floating-label	" for="name">Please enter the name of your books</label>
					<div class="mdl-textfield mdl-js-textfield " style="margin-bottom: 0.5em; padding-top: 0em;">
                    <div class="mdl-cell mdl-cell--12-col mdl-grid" style="margin: 0 0; padding: 0 0; width: 100%;">
                    <div class="mdl-cell mdl-cell--7-col" style="float:left; margin: 0 0;">
                        <input name="booksname[]" class="mdl-textfield__input" value="" required="true" type="text" id="name" style="padding-top:1.1em; height: 25px; width: 155px">
                        <label class="mdl-textfield__label" for="booksname[]" style="width: 155px;height:43px;">Name</label>
						</div>
                        <div class="mdl-cell mdl-cell--5-col">
                        <div class="mdl-selectfield mdl-js-selectfield" style="margin-left: 1.5em; margin-top: -0.5em">
						<select name="subject[]" required class="mdl-selectfield__select mdl-textfield__input">
							
							<option value="bm">BM</option>
							<option value="cn">CN</option>
							<option value="en">EN</option>
							<option value="sci">SCI</option>
							<option value="am">AM</option>
                            <option value="em">EM</option>
                            <option value="maths">MATHS</option>
							<option value="sej">SEJ</option>
                            <option value="khb">KHB</option>
                            <option value="mor">MOR</option>
                            <option value="geo">GEO</option>
                            <option value="bio">BIO</option>
                            <option value="chem">CHEM</option>
                            <option value="phy">PHY</option>
                            <option value="chist">CHIST</option>
                            <option value="business">BUS</option>
                            <option value="acc">ACC</option>
                            <option value="econ">ECON</option>
                            <option value="bookkeep">BK</option>
                            <option value="comop">COMP</option>
						</select>
						<label class="mdl-selectfield__label" for="myselect">Subject</label>
                        </div>
                        </div>
					</div>

                    </div>
                    
                    <?php } else { ?>

                        <style>

                        .mdl-card__supporting-text {
                            padding-bottom: 6.5em;
                          }
                          </style>

                          <?php } ?>
                    

				</div>
				<div class="mdl-card__actions mdl-card--border">
					<button name="clearform" onclick="showDiv()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Add another field
					</button>
                    <button type="submit" name="cleardob" onclick="remove()" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;" formnovalidate>
						Remove field
					</button>
                    <button name="signup" onclick="$("#form-id").submit();" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Submit
					</button>
                    <?php if(!isset($_POST['getval'])) { ?>
                    <button type="submit" name="getval" onclick="" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-left: 0.5em;">
						Get Existing values
                    </button>
                    <?php } ?>
				</div>
				</form>
			</div>
			</div>

</main>
<?php if(isset($errorinfo)) { ?>
<div id="error-toast" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text" style="margin-right: 11px"></div>
  <button class="mdl-snackbar__action" type="button" style="display:none"></button>
</div>
<?php } ?>



<script>
r(function(){
    var snackbarContainer = document.querySelector('#error-toast');
    var data = {
      message: '<?php echo $errorinfo ?>',
      timeout: 10000
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
});
function r(f){ /in/.test(document.readyState)?setTimeout('r('+f+')',1):f()}
</script>

<script>
function showDiv() {
    var field = $("<label></label>").text("Please enter the name of your book");
    field.attr({
        "class" : "mdl-textfield--floating-label",
        "for" : "book"
    });
    var div = $("<div></div>");
    div.attr({
        "class" : "mdl-textfield mdl-js-textfield",
        "style" : "margin-bottom: -1em; ",
    });
    var div2 = $("<div></div>");
    div2.attr({
        "class" : "mdl-cell mdl-cell--12-col mdl-grid",
        "style" : "margin: 0 0; padding: 0 0; width: 100%;",
    });
    var div3 = $("<div></div>");
    div3.attr({
        "class" : "mdl-cell mdl-cell--7-col",
        "style" : "float:left; margin: 0 0;",
    });
    var div4 = $("<div></div>");
    div4.attr({
        "class" : "mdl-cell mdl-cell--5-col"
    });
    var div5 = $("<div></div>");
    div5.attr({
        "class" : "mdl-selectfield mdl-js-selectfield",
        "style" : "margin-left: 1.5em; margin-top: -1.5em",
    });
    var input = $("<input></input>");
    input.attr({
        "name" : "booksname[]",
        "class" : "mdl-textfield__input",
        "required" : "true",
        "type" : "text",
        "id" : "booksname",
        "style" : "height: 21px; width: 155px"
    });
    var label = $("<label></label>").text("Name");
    label.attr({
        "class" : "mdl-textfield__label",
        "for" : "booksname[]",
        "style" : "width: 155px;height:47px;"
    });
    var label2 = $("<label></label>").text("Subject");
    label2.attr({
        "class" : "mdl-selectfield__label",
        "for" : "myselect"
    });
    var select = $("<select></select>");
    select.attr({
        "class" : "mdl-selectfield__select mdl-textfield__input",
        "required" : "true",
        "name" : "subject[]"
    });    
    var option1 = $("<option></option>").text("BM");
    option1.attr({
        "value" : "bm"
    });    
    var option2 = $("<option></option>").text("CN");
    option2.attr({
        "value" : "cn"
    });    
    var option3 = $("<option></option>").text("EN");
    option3.attr({
        "value" : "en"
    });    
    var option4 = $("<option></option>").text("SCI");
    option4.attr({
        "value" : "sci"
    });    
    var option5 = $("<option></option>").text("AM");
    option5.attr({
        "value" : "am"
    });    
    var option6 = $("<option></option>").text("EM");
    option6.attr({
        "value" : "em"
    });    
    var option7 = $("<option></option>").text("MATHS");
    option7.attr({
        "value" : "maths"
    });    
    var option8 = $("<option></option>").text("SEJ");
    option8.attr({
        "value" : "sej"
    });    
    var option9 = $("<option></option>").text("KHB");
    option9.attr({
        "value" : "khb"
    });    
    var option10 = $("<option></option>").text("MOR");
    option10.attr({
        "value" : "mor"
    });    
    var option11 = $("<option></option>").text("GEO");
    option11.attr({
        "value" : "geo"
    });    
    var option12 = $("<option></option>").text("BIO");
    option12.attr({
        "value" : "bio"
    });    
    var option13 = $("<option></option>").text("CHEM");
    option13.attr({
        "value" : "chem"
    });    
    var option14 = $("<option></option>").text("PHY");
    option14.attr({
        "value" : "phy"
    });    
    var option15 = $("<option></option>").text("CHIST");
    option15.attr({
        "value" : "chist"
    });    
    var option16 = $("<option></option>").text("BUS");
    option16.attr({
        "value" : "bus"
    });    
    var option17 = $("<option></option>").text("ACC");
    option17.attr({
        "value" : "acc"
    });   
    var option18 = $("<option></option>").text("ECO");
    option18.attr({
        "value" : "eco"
    });  
    var option19 = $("<option></option>").text("BK");
    option19.attr({
        "value" : "bk"
    });    
    var option20 = $("<option></option>").text("COMP");
    option20.attr({
        "value" : "comp"
    });   

    div.append(div2);
    div2.append(div3, div4);
    div3.append(input,label);
    div4.append(div5);
    div5.append(select,label2);
    select.append(option1,option2,option3,option4,option5,option6,option7,option8,option9,option10,option11,option12,option13,option14,option15,option16,option17,option18,option19,option20)
    $("#div_dbd").after(field,div); 
    var height = $("#form_card").height() + 81;
    $('#form_card').css("height", height); 
    componentHandler.upgradeDom();    // Append the new elements 
}

function remove() {
    $("#form-id div:last child").last().remove();
    var height = $("#form_card").height() - 81;
    $('#form_card').css("height", height); 
    componentHandler.upgradeDom();    // Append the new elements 
}
</script>



</script>

</body>
</html>


<script src="js/material.js"></script>
<script src="js/mdl-selectfield.min.js"></script>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>