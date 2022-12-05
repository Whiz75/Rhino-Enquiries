<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

      <!-- site metas -->
      <title>Rhino Africa Enquiries</title>
      <meta name="keywords" content=""/>
      <meta name="description" content=""/>
      <meta name="author" content="Shane Khotsoka"/>

      <!-- style css -->
      <link rel="stylesheet" href="css/style.css"/>
    </head>

    <body>

      <?php
         if(isset($_POST['enquire']))
         {
            //$website_reference_number = "TST".'-'.$firstname[0].''.$lastname[0];
            
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email_address']; 
            $country = $_POST['from_country'];
            $phonenumber = $_POST['phone_number'];
            $holidaytype = $_POST['holiday_type'];
            $adults = $_POST['no_of_adults'];
            $children = $_POST['no_of_children'];
            $arrivaldate = date('d-m-Y', strtotime($_POST['arrival_date']));
            $departuredate = date('d-m-Y', strtotime($_POST['departure_date']));
            $comment = $_POST['enquiry_comment'];  

            if($arrivaldate > $departuredate)
            {
               echo "<script> alert('Arrival Date should be greater than Departure Date'); </script>";
            }
            else 
            {

               
               $url = 'https://eddy.rhinoafrica.com/submit';

               $data = array('website_reference_number' => "TST".'-'.$firstname[0].'-'.$lastname[0],
                           'first_name' => $firstname,
                           'last_name' => $lastname,
                           'email' => $email,
                           'country' => $country, 
                           'contact_number' => $phonenumber,
                           'holiday_type' => $holidaytype, 
                           'adults' => $adults,
                           'children' => $children, 
                           'arrival_date' => $arrivaldate,
                           'departure_date' => $departuredate, 
                           'comments' => $comment,
                           'ed_website' => '72', 
                           'ed_passkey' => 'devpass');

               // use key 'http' even if you send the request to https://...
               $options = array(
               'http' => array(
               'header'  => "Content-type: application/json",
               'method'  => 'POST',
               'content' => http_build_query($data),),
               );

               $context  = stream_context_create($options);
               $result = file_get_contents($url, false, $context);

               echo $result;
               var_dump($result);
            }
         } else
         {
            echo "not set";
         }
      ?>


      <!-- FORM TITLE -->
      <h2>ENQUIRY FORM</h2>

      <div class="wrapper" >
         <!-- INPUT FORM -->
         <form method="post" action="#">
            <!-- FIRST & LASTNAME ROW  -->
            <div class="row">
               <!-- FIRSTNAME -->
               <div class="col-6">
                  <div class="name" id="name">
                      <label for="first-name">FIRSTNAME</label>
                      <input id="first-name" type="text" value="<?php if(isset($_POST['firstname'])){echo $_POST['firstname'];} ?>" name="firstname" class="form-control" placeholder="First Name" tabindex="601" required/>
                  </div>
               </div>

               <!-- LASTNAME -->
               <div class="col-6">
                   <label for="last-name">LASTNAME</label>
                   <input id="last-name" type="text" value="<?php if(isset($_POST['lastname'])){echo $_POST['lastname'];} ?>" name="lastname" class="form-control" placeholder="Last Name" tabindex="602" required/>
               </div>
            </div>

            <!-- EMAIL -->
            <div class='email'>
                <label for="mce-HEAR">EMAIL ADDRESS</label>
                <input id="mce-HEAR" type="email" value="<?php if(isset($_POST['email_address'])){echo $_POST['email_address'];} ?>" name="email_address" class="form-control" placeholder="Email Address" tabindex="603" />
            </div>

            <!-- CHOOSE COUNTRY -->
            <div class="country">
                <label for="mce-HEAR">SELECT COUNTRY</label>
                <select name="from_country" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>Select your country</option>
                  <option value="Australia">AU</option>
                  <option value="United Kingdom">GB</option>
                  <option value="United States of America">US</option>
               </select>
            </div>
            <br>

            <!-- PHONE NUMBER -->
            <div class='phone-number'>
                <label for="mce-HEAR">PHONE NUMBER</label>
                <input id="mce-HEAR" type="text" tabindex="605" required name="phone_number" class="form-control" placeholder="Phone Number" value="<?php if(isset($_POST['phone_number'])){echo $_POST['phone_number'];} ?>"/>
            </div>

            <!-- CHOOSE HOLIDAY TYPE -->
            <div class="holiday-type">
                <label for="mce-HEAR">HOLIDAY TYPE</label>
                <select name="holiday_type" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>Select your holiday type</option>
                  <option value="Value">Value</option>
                  <option value="Standard">Standard</option>
                  <option value="Luxury">Luxury</option>
               </select>
            </div>

            <!-- NUMBER OF ADULTS -->
            <div class="Adults">
                <label for="mce-HEAR">NUMBER OF ADULTS</label>
                <select name="no_of_adults" class="form-control" id="mce-HEAR" required>
               <option value="" disabled selected hidden>Select how adults </option>
                  <?php
                     for($j = 1; $j <= 18; $j++){
                        echo "<option value='".$j."' >".$j."</option>";
                     }
                  ?>
               </select>
            </div>

            <!-- NUMBER OF CHILDREN -->
            <div class="Children">
                <label for="mce-HEAR">NUMBER OF CHILDREN</label>
                <select name="no_of_children" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected hidden>Select how many children</option>
                  <?php
                     for($i = 1; $i <= 18; $i++){
                        echo "<option value='".$i."' >".$i."</option>";
                     }
                  ?>
                  
               </select>
            </div>

            <!-- ARRIVAL DATE -->

            <div class='arrival-date'>
                <label for="arrival-date">ARRIVAL DATE</label>
                <input ID="arrival-date" type="date" value="<?php if(isset($_POST['arrival_date'])){echo $_POST['arrival_date'];} ?>" name="arrival_date" class="form-control" placeholder="Arrival Date" tabindex="605" required/>
            </div>

            <!-- DEPARTURE DATE -->
            <div class='departure-date'>
                <label FOR="mce-HEAR">DEPARTURE DATE</label>
                <input id="mce-HEAR" type="date" value="<?php if(isset($_POST['departure_date'])){echo $_POST['departure_date'];} ?>" name="departure_date" class="form-control" placeholder="Departure Date" tabindex="605" required/>
            </div>

            <!-- COMMENTS -->
            <div class="enquiry">
                <label for="mce-HEAR">COMMENT</label>
                    <textarea
                       id="mce-HEAR"
                       name="enquiry_comment"
                       cols="60" rows="4"
                       class="form-control"
                       placeholder="comment here..."
                       tabindex="607">

                    </textarea>
            </div>

            <!-- SUBMIT ENQUIRY BUTTON -->
            <div>
               <input class="btn btn-success" type="SUBMIT" value="Send" name="enquire" id="enquire"/>
            </div>

         </form>
      </div>
      
      <!-- FOOTER -->
      <footer><div class="text-center p-4"> © 2022 Rhino Africa Enquiries</div></footer>
      
    </body>
</html>