<!--  ----------------------------------------------------------------------  -->
<!--  DATE: 2022-DEC-08 -->
<!--  DESCRIPTION: THIS WEBSITE ALLOWS LEADS TO SUBMIT ENQUIRIES VIA THE FORM -->
<!--  ----------------------------------------------------------------------  -->

<!DOCTYPE html>
<html lang="en">
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

        <!--  ----------------------------------------------------------------------  -->
        <!-- Bootstrap libraries -->
        <!--  ----------------------------------------------------------------------  -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

        <!--  ----------------------------------------------------------------------  -->
        <!-- Sweet alert dialog library -->
        <!--  ----------------------------------------------------------------------  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="js/alert.js"></script>


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
            $firstname = $_POST['first_name'];
            $lastname = $_POST['last_name'];

            //check the user id length and format it correctly
            $code = rand(1,1000);
            $last_digits = "00000000";

            if (strlen((string)$code) == 1){
                $last_digits = "0000000".$code;
            }elseif (strlen((string)$code) == 2){
                $last_digits = "000000".$code;
            }else{
                $last_digits = "00000".$code;
            }

            //assign the user id
            $website_reference_number = "TST".'-'.substr($firstname,0).substr($lastname,0).$last_digits;
            $email_address = $_POST['email'];
            $country = $_POST['country'];
            $contact_number = $_POST['contact_number'];
            $holiday_type = $_POST['holiday_type'];
            $adults = $_POST['no_of_adults'];
            $children = $_POST['no_of_children'];
            $arrival_date = date('d-m-Y', strtotime($_POST['arrival_date']));
            $departure_date = date('d-m-Y', strtotime($_POST['departure_date']));
            $comment = $_POST['enquiry_comment'];

            //check if arrival date is not greater than departure date
            if($arrival_date > $departure_date) {
               echo "<script> warningAlert() </script>";
            }
            else {


                //API url
                $url = 'https://eddy.rhinoafrica.com/submit';
                //post input data to API
                $data = array(
                    'website_reference_number' => $website_reference_number,
                    'first_name' => $firstname,
                    'last_name' => $lastname,
                    'email' => $email_address,
                    'country' => $country,
                    'contact_number' => $contact_number,
                    'holiday_type' => $holiday_type,
                    'adults' => $adults,
                    'children' => $children,
                    'arrival_date' => $arrival_date,
                    'departure_date' => $departure_date,
                    'comments' => $comment,
                    'ed_website' => '72',
                    'ed_passkey' => 'devpass');

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

                 //call Php method to create API POST method
                 httpPost($url,$data);
            }
         }
      ?>

      <!-- FORM TITLE -->
      <h2>ENQUIRY FORM</h2>

      <div class="wrapper" >
         <!-- INPUT FORM -->
         <form method="post" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" >

             <!-- TWO HIDDEN INPUTS FOR LINKING TO THE OBJECT -->
             <input type=hidden name="oid" value="00D8d000008DJBg">
             <input type=hidden name="retURL" value="http://rhino-enquiries.great-site.net">

            <!-- FIRST & LASTNAME ROW  -->
            <div class="row">
               <!-- FIRSTNAME -->
               <div class="col-6">
                  <div class="name" id="name">
                      <label for="firstname">FIRSTNAME</label>
                      <input id="firstname" type="text"
                             value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];} ?>"
                             name="first_name" class="form-control" placeholder="First Name" tabindex="601" required/>
                  </div>
               </div>

               <!-- LASTNAME -->
               <div class="col-6">
                   <label for="lastname">LASTNAME</label>
                   <input id="lastname" type="text"
                          value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];} ?>"
                          name="last_name" class="form-control" placeholder="Last Name" tabindex="602" required/>
               </div>
            </div>

            <!-- EMAIL -->
            <div class='email'>
                <label for="email_address">EMAIL ADDRESS</label>
                <input id="email_address" type="email"
                       value="<?php if(isset($_POST['email'])){echo $_POST['email'];} ?>"
                       name="email" class="form-control" placeholder="Email Address" tabindex="603" />
            </div>

            <!-- CHOOSE COUNTRY -->
            <div class="country">
                <label for="mce-HEAR">SELECT COUNTRY</label>
                <select name="country" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>--Select one--</option>
                  <option value="AU">AU</option>
                  <option value="GB">GB</option>
                  <option value="US">US</option>
               </select>
            </div>
            <br>

            <!-- CONTACT NUMBER -->
            <div class="contact-number">
                <label for="mce-HEAR">CONTACT NUMBER</label>
                <input id="mce-HEAR" type="text"
                       tabindex="605" required name="contact_number"
                       class="form-control" placeholder="Contact Number"
                       value="<?php if(isset($_POST['contact_number'])){echo $_POST['contact_number'];} ?>"/>
            </div>

            <!-- CHOOSE HOLIDAY TYPE -->
            <div class="holiday-type">
                <label for="mce-HEAR">HOLIDAY TYPE</label>
                <select name="holiday_type" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>--Select one--</option>
                  <option value="Value">Value</option>
                  <option value="Standard">Standard</option>
                  <option value="Luxury">Luxury</option>
               </select>
            </div>

            <!-- NUMBER OF ADULTS -->
            <div class="Adults">
                <label for="mce-HEAR">NUMBER OF ADULTS</label>
                <select name="no_of_adults" class="form-control" id="mce-HEAR" required>
               <option value="" disabled selected hidden>--Select one--</option>
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
                  <option value="" disabled selected hidden>--Select one--</option>
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
                <input ID="arrival-date" type="date"
                       value="<?php if(isset($_POST['arrival_date'])){echo $_POST['arrival_date'];} ?>"
                       name="arrival_date" class="form-control" placeholder="Arrival Date" tabindex="605" required/>
            </div>

            <!-- DEPARTURE DATE -->
            <div class='departure-date'>
                <label FOR="mce-HEAR">DEPARTURE DATE</label>
                <input id="mce-HEAR" type="date"
                       value="<?php if(isset($_POST['departure_date'])){echo $_POST['departure_date'];} ?>"
                       name="departure_date" class="form-control" placeholder="Departure Date" tabindex="605" required/>
            </div>

             //check if arrival date is greater than departure date
             <?php
                 $date_of_arrival = date('d-m-Y', strtotime($_POST['arrival_date']));
                 $date_of_departure = date('d-m-Y', strtotime($_POST['departure_date']));

                 if($date_of_arrival > $date_of_departure) {
                   echo "<script> warningAlert() </script>";
                 }
             ?>

            <!-- COMMENTS -->
            <div class="enquiry">
                <label for="mce-HEAR">COMMENT</label>
                    <textarea
                       id="mce-HEAR" name="enquiry_comment" cols="60" rows="4"
                       class="form-control" placeholder="comment here..." tabindex="607">

                    </textarea>
            </div>

            <!-- SUBMIT ENQUIRY BUTTON -->
            <div>
               <input class="btn btn-success" type="SUBMIT" value="Submit" name="enquire" id="enquire"/>
            </div>

         </form>
      </div>
      
      <!-- FOOTER -->
      <footer><div class="text-center p-4"> © 2022 Rhino Africa Enquiries</div></footer>
    </body>
</html>

<!--method to test inputs-->
<?php
    function show_inputs($array){
        echo "<pre>";
        print_r($array);
        echo "<pre/>";
    }
?>

<?php
    function httpPost($url, $data)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);

        echo $response; //show output

        return $response;
    }
?>

