<?php
class _send_email_with_ajax{
  public function __construct($data){
    $this->send_email_with_ajax($data);
  }
  public function send_email_with_ajax($data){
    if(empty($data)){
      return ;
    }
      $to = "chetan@idevelopingsolutions.com";
      $subject = "Contact Details of the User";
      $message = '<style type="text/css">
                  /* CLIENT-SPECIFIC STYLES */body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }img { -ms-interpolation-mode: bicubic; }
                  /* RESET STYLES */img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }table { border-collapse: collapse !important; }body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }
                  /* iOS BLUE LINKS */a[x-apple-data-detectors] {    color: inherit !important;    text-decoration: none !important;    font-size: inherit !important;    font-family: inherit !important;    font-weight: inherit !important;    line-height: inherit !important;}
                  /* MEDIA QUERIES */@media screen and (max-width: 480px) {    .mobile-hide {        display: none !important;    }    .mobile-center {        text-align: center !important;    }}
                  /* ANDROID CENTER FIX */div[style*="margin: 16px 0;"] { margin: 0 !important; }
                  </style>
                  <table border="0" width="100%" cellspacing="0" cellpadding="0">
                  <tbody>
                  <tr>
                    <td style="background-color: #eeeeee;" align="center" bgcolor="#eeeeee">
                      <table style="max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                      <tbody>
                      <tr>
                        <td style="font-size: 0; padding: 16px;" align="center" valign="top" bgcolor="#fff">
                          <div>
                            <table style="max-width: 100%;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                            <tr>
                              <td style="padding:15px 0px;" align="center" bgcolor="#fff">
                                
                                <table style="max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                                  <tbody>
                                    <tr>
                                      <td align="center">
                                        <a href="https://idevelopingsolutions.com"><img style="display: block; border: 0px;" src="https://idevelopingsolutions.com/assets/images/logo-dark.png" width="150"/></a>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>  
                              </td>
                            </tr>
                            </tbody>
                            </table>
                          </div>
                          <div class="mobile-hide" style="display: inline-block; max-width: 50%; min-width: 100px; vertical-align: top; width: 100%;">
                            <table style="max-width: 300px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="left">
                            <tbody>
                            <tr>
                              <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; line-height: 48px;" align="right" valign="top">
                                <table border="0" cellspacing="0" cellpadding="0" align="right">
                                </table>
                              </td>
                            </tr>
                            </tbody>
                            </table>
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 0px 35px 20px 35px; background-color: #ffffff7d;" align="center" bgcolor="#ffffff">
                          <table style="max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                          <tbody>
                          <tr>
                            <td style="padding-top: 20px;" align="left">
                              <table border="1" width="100%" cellspacing="0" cellpadding="0" style="border-color: #fff;border: #dcdcdc;">
                              <tbody>
                              <tr>
                                <td colspan="2" style="font-family: Open Sans, Helvetica, Arial, sans-serif;color: #fff; font-size: 16px; font-weight: 800; line-height: 24px; padding: 10px;background-image: linear-gradient(90deg, #03457F 10%, #1CA5DC 100%);" align="left" bgcolor="#dd4b39" width="100%">
                                  Personal Information
                                </td>
                                
                              </tr>
                              <tr>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;" align="left"  width="75%">
                                  Name:
                                </td>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 15px 10px 5px 10px;" align="left"  width="25%">
                                '. $data["name"] .'
                                </td>
                              </tr>
                              <tr>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left"  width="75%">
                                  Email:
                                </td>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left" width="25%">
                              '. $data["email"] .'
                                </td>
                              </tr>
                              <tr>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left"  width="75%">
                                  Phone Number:
                                </td>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left"  width="25%">
                              '. $data["phone"] .'
                                </td>
                              </tr>
                              <tr>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left"  width="75%">
                                  Messages
                                </td>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 16px; font-weight: 400; line-height: 24px; padding: 5px 10px;" align="left"  width="25%">
                              '. $data["message"].'
                                </td>
                              </tr>
                            
                              </tbody>
                              </table>
                            </td>
                          </tr>
                          </tbody>
                          </table>
                        </td>
                      </tr>
                      <tr>
                        <td style="padding: 10px; background-color: #d5d5d5b5;" align="center" bgcolor="#ffffff">
                          <table style="max-width: 600px;" border="0" width="100%" cellspacing="0" cellpadding="0" align="center">
                            <tbody>
                              <tr>
                                <td align="center">
                                  <a href="https://idevelopingsolutions.com"><img style="display: block; border: 0px;" src="https://idevelopingsolutions.com/assets/images/logo-dark.png" width="100" /></a>
                                </td>
                              </tr>
                              <tr>
                                <td style="font-family: Open Sans, Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 24px; padding: 5px 0 10px 0;" align="center">
                                    <a style="color:#000" target="_blank" href="https://idevelopingsolutions.com/">www.idevelopingsolutions.com</a>
                                </td>
                              </tr>
                            </tbody>
                          </table>  
                        </td>
                      </tr>
                      </tbody>
                      </table>
                    </td>
                  </tr>
                </tbody>
                
              </table>';
      $headers  = "Content-type:text/html;charset=UTF-8" ."\r\n"; 
      $headers .= 'From: '.$data['email'] . "\r\n" .
        'Reply-To:'.$data['email'] . "\r\n" .
        'X-Mailer: PHP/';

      ## thanks email 
      $thanks_to = $data['email'];
      $thanks_subject = "Thank you for Connecting with us ".$data['name']."";
      /** thanku msg table**/
      $thanks_message = '<div class="thankuemial">
                
                    <!-- Start container for logo -->
                    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f2f4f6;" width="600">
                      <tbody>
                        <tr>
                          <td style="width: 596px; vertical-align: top; padding-left: 0; padding-right: 0; padding-top: 35px; padding-bottom: 15px;" width="596">
                
                            <!-- Your logo is here -->
                            <img style="width: 150px; max-width: 150px; height: auto; max-height: auto; text-align: center; color: #ffffff;" alt="Logo" src="https://idevelopingsolutions.com/assets/images/logo-dark.png" align="center" width="180" height="85">
                
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  
                    <!-- Start single column section -->
                    <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f2f4f6;" width="600">
                        <tbody>
                          <tr>
                            <td style="width: 596px; vertical-align: top; padding-left: 30px; padding-right: 30px; padding-top: 0px; padding-bottom: 10px;" width="596">
                
                              <h1 style="font-size: 28px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 600; text-decoration: none; color: #000000;">Thank You!</h1>
                              <p style="font-size: 15px; line-height: 24px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none; color: #919293;">Your submission has been received <br/>We will be in touch and contact you soon!</p>              
                             
                            </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      
                      <table align="center" style="text-align: center; vertical-align: top; width: 600px; max-width: 600px; background-color: #f2f4f6;" width="600">
                        <tbody> 
                            <tr>      
                              <td style="width: 252px; vertical-align: top; padding-left: 30px; padding-right: 15px; padding-top: 0; padding-bottom: 30px; text-align: left;" width="252">
                                <p><b>Contact Us:</b></p>
                                <p style="font-size: 15px; line-height: 0px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none;"><a href="tel:+91-186-3590033" style="color: #474545"> +91-186-3590033</a></p>
                                <p><b>Email:</b></p>             
                                <p style="font-size: 15px; line-height: 0px; font-family: Arial, sans-serif; font-weight: 400; text-decoration: none;"><a href="mailto:contact@idevelopingsolutions.com" style="color: #474545">contact@idevelopingsolutions.com</a></p>
                              </td>
                              <td style="width: 252px; vertical-align: middle; padding-left: 15px; padding-right: 30px; padding-top: 0; padding-bottom: 30px; text-align: right;" width="252"> 
                                <img style="width: 100px; max-width: 100px; height: auto; max-height: auto; text-align: center; opacity: 0.1; color: #ffffff;" alt="Logo" src="https://idevelopingsolutions.com/assets/images/emial-icon.png" align="center" width="100" height="85">
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <table align="center" style="text-align: center; vertical-align: bottom; width: 600px; max-width: 600px; background-color: #f2f4f6;" width="600">
                        <tbody> 
                            <tr>      
                              <td style="width: 252px; vertical-align: middle; padding-left: 30px; padding-right: 15px; padding-top: 0; padding-bottom: 30px; text-align: center;" width="252">
                                <a href="https://idevelopingsolutions.com/" target="_blank" style="background-image: linear-gradient(90deg, #03457F 10%, #1CA5DC 100%); font-size: 15px; line-height: 22px; font-family: Arial, sans-serif; font-weight: normal; text-decoration: none; padding: 12px 15px; color: #ffffff; border-radius: 5px; display: inline-block; mso-padding-alt: 0;">
                                  <span style="mso-text-raise: 15pt; color: #ffffff;">Go Back</span></a>
                              </td>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                  </div>';
                  $thanks_headers  = "Content-type:text/html;charset=UTF-8" ."\r\n"; 
                  $thanks_headers .= "From: contact@idevelopingsolutions.com \r\n" .
                    "Reply-To: contact@idevelopingsolutions.com \r\n" .
                    'X-Mailer: PHP/';

      if(mail($to,$subject,$message,$headers) && mail($thanks_to, $thanks_subject, $thanks_message, $thanks_headers)){
        echo 'true';
        exit;
      }else{
        echo 'false';
        exit;
      }
  }
}
$data = isset($_POST) ? $_POST : array();
new _send_email_with_ajax($data);

?>
<?php //include 'footer.php';?>

