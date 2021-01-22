<?php

    //Clean String Values
    function clean($string) {
        return htmlentities($string);
    }

    //Validate if present and return the table
    function validate() {
        if(isset($_POST['validate'])) {
        $certificate_number = clean($_POST['cert_no']);

        $sql = "SELECT * FROM customers WHERE certificate_number='".$certificate_number."'";
        $query = Query($sql);
        confirm($query);
        $result = fetch_data($query);

        if(count_rows($query) == 1) {
            echo '
            <div class="container pm-certificate-container">
            <div class="outer-border"></div>
            <div class="inner-border"></div>
            
            <div class="pm-certificate-border col-xs-12">
              <div class="row pm-certificate-header">
                <div class="pm-certificate-title cursive col-xs-12 text-center">
                  <h2 >CERTIFICATE OF COMPLETION</h2>
                </div>
              </div>
        
              <div class="row pm-certificate-body">
                
                <div class="pm-certificate-block">
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        <div class="pm-certificate-name underline margin-0 col-xs-8 text-center">
                          <span class="pm-name-text bold">'.$result['f_name'] . ' ' . $result['l_name'].'</span>
                        </div>
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                      </div>
                    </div>          
        
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        <div class="pm-earned col-xs-8 text-center">
                          <span class="pm-earned-text padding-0 block cursive">has earned</span>
                          <span class="pm-credits-text block bold sans">'.$result['marks'].'% IN FINAL TEST</span>
                        </div>
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        <div class="col-xs-12"></div>
                      </div>
                    </div>
                    
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        <div class="pm-course-title col-xs-8 text-center">
                          <span class="pm-earned-text block cursive">while completing the training course entitled</span>
                        </div>
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                      </div>
                    </div>
        
                    <div class="col-xs-12">
                      <div class="row">
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                        <div class="pm-course-title underline col-xs-8 text-center">
                          <span class="pm-credits-text block bold sans">'.$result['training_name'].'</span>
                        </div>
                        <div class="col-xs-2"><!-- LEAVE EMPTY --></div>
                      </div>
                    </div>
                </div>       
                
                <div class="col-xs-12">
                  <div class="row">
                    <div class="pm-certificate-footer">
                        <div class="col-xs-4 pm-certified col-xs-4 text-center">
                          <span class="pm-empty-space block underline">'.$result['college_name'].'</span>
                          <span class="bold block">AUTHORIZED</span>
                        </div>
                        <div class="col-xs-4">
                          <!-- LEAVE EMPTY -->
                        </div>
                        <div class="col-xs-4 pm-certified col-xs-4 text-center">
                          <span class="pm-empty-space block underline">DATE COMPLETED:'.$result['created_at'].'</span>
                          <span class="bold block">CERTIFICATE ID:'.$result['certificate_number'].'</span>
                        </div>
                        <center><div>
                          <a href="#" class=" print btn btn-default"><span class="glyphicon glyphicon-print"></span> Print Certificate</a>
                        </div>
                        <p>This is a computer generated document. No signature required.</p></center>
                    </div>
        
                  </div>
        
                </div>
        
                </div>
        
        
            </div>
        
          </div>
';
        } else {
            echo '<div class="table-titl">
            <center style="color: red;"><h3>Certificate number is invalid</h3></center>
            </div>';
        }

    }
}

?>