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
      <h2>ENQUIRY FORM</h2>

      <div class="wrapper" class="container-fluid">
         <form name="registerForm" method="POST" action="">
            <div class="row">

               <!-- FIRSTNAME -->
               <div class="col-6">
                  <div class="name" id="name">
                     <input type="text" value="" name="FNAME" class="form-control" placeholder="First Name" tabindex="601" required/>
                  </div>
               </div>

               <!-- LASTNAME -->
               <div class="col-6">
                  <input type="text" value="" name="LNAME" class="form-control" placeholder="Last Name" tabindex="602" required/>
               </div>
            </div>

            <!-- EMAIL -->
            <div class='email'>
               <input type="email" name="EMAIL" class="form-control" placeholder="Email Address" tabindex="603" />
            </div>

            <!-- CHOOSE COUNTRY -->
            <label for="Country">SELECT COUNTRY</label>
            <div class="country">
               <select name="Country" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>Select your country</option>
                  <option value="Australia">AU</option>
                  <option value="United Kingdom">GB</option>
                  <option value="United States of America">US</option>
               </select>
            </div>
            <br>

            <!-- PHONE NUMBER -->
            <div class='phone-number'>
               <input type="text" value="" name="NUMBER" class="form-control" placeholder="Phone Number" tabindex="605" required/>
            </div>

            <!-- CHOOSE HOLIDAY TYPE -->
            <label for="Holiday Type">HOLIDAY TYPE</label>
            <div class="holiday-type">
               <select name="Holiday Type" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected>Select your holiday type</option>
                  <option value="Value">Value</option>
                  <option value="Standard">Standard</option>
                  <option value="Luxury">Luxury</option>
               </select>
            </div>

            <!-- NUMBER OF ADULTS -->
            <label for="Adults">NUMBER OF ADULTS</label>
            <div class="Adults">
               <select name="Adults" class="form-control" id="mce-HEAR" required>
               <option value="" disabled selected hidden>Select how adults </option>
                  <?php
                     for($j = 1; $j <= 18; $j++){
                        echo "<option value='".$j."' >".$j."</option>";
                     }
                  ?>
               </select>
            </div>

            <!-- NUMBER OF CHILDREN -->
            <label for="Children">NUMBER OF CHILDREN</label>
            <div class="Children">
               <select name="Children" class="form-control" id="mce-HEAR" required>
                  <option value="" disabled selected hidden>Select how many children</option>
                  <?php
                     for($i = 1; $i <= 18; $i++){
                        echo "<option value='".$i."' >".$i."</option>";
                     }
                  ?>
                  
               </select>
            </div>

            <!-- ARRIVAL DATE -->
            <label for="arrival-date">ARRIVAL DATE</label>
            <div class='arrival-date'>
               <input type="date" value="" name="arrival-date" class="form-control" placeholder="Arrival Date" tabindex="605" required/>
            </div>

            <!-- DEPARTURE DATE -->
            <label for="departure-date">DEPARTURE DATE</label>
            <div class='departure-date'>
               <input type="date" value="" name="departure-date" class="form-control" placeholder="Departure Date" tabindex="605" required/>
            </div>

            <!-- COMMENTS -->
            <label for="ENQUIRY">COMMENT</label>
            <div class="enquiry">
               <textarea 
                  name="enquiry"
                  cols="60" rows="6" 
                  class="form-control"
                  placeholder="Leave a comment for us..." 
                  tabindex="607">
            
               </textarea>
            </div>

            <!-- SUBMIT ENQUIRY BUTTON -->
            <div>
               <input class="btn btn-success" type="submit" value="Send" name="enquire"/>
            </div>

         </form>
      </div>
      
      <!-- FOOTER -->
      <footer><div class="text-center p-4"> © 2022 Rhino Africa Enquiries</div></footer>
      
    </body>
</html>