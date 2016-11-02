<?php

do_shortcode('[contact-form-7 id="8" title="Contact form 1"]');
/**
 * Template Name: Contact1
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package interview
 */
get_header(); ?>

<?php

//response generation function
$response = "";
/**
 * Generate response message
 * @global type $response
 * @param type $type
 * @param type $message
 */
function my_contact_form_generate_response($type, $message){
    global $response;
    if($type == "success")
        $response = "<div class='success'>{$message}</div>";
    else
        $response = "<div class='error'>{$message}</div>";

}

$submitted = filter_input(INPUT_POST, 'submitted') ? filter_input(INPUT_POST, 'submitted') : '';
if ($submitted) {
    $email_invalid   = "Email is invalid.";
    $message_unsent  = "Message can not send, please try again.";
    $message_sent    = "<b>Thanks! </b><p>Your message is send, we will contact to you ASAP.</p>";
    $missing_content = "Vui lòng điền đầy đủ thông tin.";

    //user posted variables
    $name = filter_input(INPUT_POST, 'name') ? filter_input(INPUT_POST, 'name') : '';
    $email = filter_input(INPUT_POST, 'email') ? filter_input(INPUT_POST, 'email') : '';
    $message = filter_input(INPUT_POST, 'content') ? filter_input(INPUT_POST, 'content') : '';
    //php mailer variables
    $to = get_option('admin_email');
    $subject = 'Contact';
    $headers[] = 'Content-type: text/html; charset=utf-8'." ";
    $headers[] = 'Reply-To: ' . $email;
    $body = '<p>Name: '.$name.'</p>';
    $body .= '<p>Email: '.$email.'</p>';
    $body .= '<p>Message: '.stripslashes($message).'</p>';

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      my_contact_form_generate_response("error", $email_invalid);
    }
    else
    {
      if(empty($name) || empty($message)){
        my_contact_form_generate_response("error", $missing_content);
      }
      else
      {
        $sent = wp_mail($to, $subject, $body, $headers);
        if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
        else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
      }
    }
}

?>
<section class="contact-section">
    <div class="container">
      <div class="row">
        <div class="col-md-10 col-md-offset-1">
          <div class="contact-page">
            <h1>CONTACT ME FOR MORE</h1>
            <style type="text/css">
            .error{
              padding: 5px 9px;
              border: 1px solid red;
              color: red;
              border-radius: 3px;
            }

            .success{
              padding: 5px 9px;
              border: 1px solid green;
              color: green;
              border-radius: 3px;
            }
          </style>

        <?php echo $response; ?>
            <form class="contact-form">
              <div class="top">
                <div class="fieldline type-textfieldname">
                  <div class="field">
                    <input placeholder="Your name" type="text">
                  </div>
                </div>
                <div class="fieldline type-textfieldemail">
                  <div class="field">
                    <input placeholder="Your email" type="text">
                  </div>
                </div>
              </div>
              <div class="middle">
                <div class="fieldline type-textfieldMessage">
                  <div class="field">
                    <textarea type="" placeholder="Your Message" rows="10"></textarea>
                  </div>
                </div>
              </div>
              <div class="bottom">
                <div class="capcha"><div class="g-recaptcha" data-sitekey="6LfrpQoUAAAAALlUb8-FkPKF2FYk6-61jzjbNHBc"></div></div>
                <div class="send">
                  <button class="btn-text">SUBMIT</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

<?php
get_footer();
