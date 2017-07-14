<?php
 
  //response generation function
  $response = "";
 
  //function to generate response
  function my_contact_form_generate_response($type, $message){
 
    global $response;
 
    if($type == "success") {
      $response = "<div class='response success'>{$message}</div>";
    }
    else {
      $response = "<div class='response error'>{$message}</div>";
    }
  }

  //response messages
  $missing_content = "Veuillez rentrer toutes les informations.";
  $email_invalid   = "L'adresse email est invalide.";
  $message_unsent  = "Désolé, votre message n'a pas été envoyé. Réessayé.";
  $message_sent    = "Merci! Votre message a bien été envoyé.";

  //user posted variables
  $firstname = $_POST['prenom'];
  $name = $_POST['nom'];
  $email = $_POST['email'];
  $date = $_POST['date'];
  $message = $_POST['demande'];
  $tel = $_POST['tel'];
  
  if (empty($tel)){
    $mailCont = $message;
  }
  else {
    $mailCont = "De : ".$firstname." ".$name."\r\n";
    $mailCont .= $message."\r\n";
    $mailCont .= "Téléphone : ".$tel;
  }

  //php mailer variables
  $to = get_option('admin_email');
  $subject = "Quelqu'un vous a envoyé un message depuis ".get_bloginfo('name');
  $headers = 'From: '. $email . "\r\n".'Reply-To: ' . $email . "\r\n";

  //Validate the form :
  if ($_POST['submitted']) {
    //Validate the email
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      my_contact_form_generate_response("error", $email_invalid);
    }

    else { //email is valid
      //validate presence of name and message
      if( empty($firstname) || empty($name) || empty($message)){
        my_contact_form_generate_response("error", $missing_content);
      }
      else { //ready to go!
        //send email
        $sent = wp_mail($to, $subject, strip_tags($mailCont), $headers);
        if($sent) my_contact_form_generate_response("success", $message_sent); //message sent!
        else my_contact_form_generate_response("error", $message_unsent); //message wasn't sent
      }
    }
  }
  
?>
<?php get_header(); ?>
  <div class="ask section">
    <div class="container">
      <div class="row">
        <div class="header-forms col s12 center white-text">
          <i class="material-icons">contacts</i>
          <h3>
            Une demande particulière laissez-nous vos coordonnées.
          </h3>
        </div>
      </div>
    </div>
  </div>

<!-- FORM -->
  <div class="container">
    <div class="row">

      <?php echo $response; ?>

      <div class="form-instructions"><p>Les champs marqués d'un <span class="required">*</span> sont obligatoires</p></div>

      <form class="col s12" action="<?php the_permalink(); ?>" method="post">
        <div class="row">
          <div class="input-field col s6">
            <input id="first_name" type="text" class="validate" name="prenom" required value="<?php echo esc_attr($_POST['prenom']); ?>">
            <label for="first_name">Prénom <span class="required">*</span></label>
          </div>
          <div class="input-field col s6">
            <input id="last_name" type="text" class="validate" name="nom" required value="<?php echo esc_attr($_POST['nom']); ?>">
            <label for="last_name">Nom de famille <span class="required">*</span></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
            <i class="material-icons grey-text">email <span class="required">*</span></i>
            <input id="email" type="email" placeholder="email" class="validate" name="email" required value="<?php echo esc_attr($_POST['email']); ?>">
          </div>
          <div class="input-field col s6">
            <i class="material-icons grey-text">today</i>
            <input type="date" class="datepicker" name="date" value="<?php echo esc_attr($_POST['date']); ?>">
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <textarea id="textarea1" class="materialize-textarea" name="demande" required><?php echo esc_attr($_POST['demande']); ?></textarea>
            <label for="textarea1">Votre demande <span class="required">*</span></label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s6">
              <input type="checkbox" id="test5" name="telOn" 
                <?php if(isset($_POST['telOn']) AND $_POST['telOn'] == "on") : ?>
                  checked
                <?php endif; ?>
              />
              <label for="test5">Je souhaite être contacté par téléphone</label>
          </div>
          <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>

            <input id="icon_telephone" 
              <?php if(isset($_POST['telOn']) AND $_POST['telOn'] == "on") : ?>
                value="<?php echo esc_attr($_POST['tel']); ?>"
              <?php else :?>
                disabled value="I am not editable"
              <?php endif ?>
             id="disabled" type="tel" name="tel" class="validate">

            <label for="icon_telephone">Téléphone</label>
          </div>
        </div>
        <div class="row">
          <div class="input-field col s12">
            <input type="hidden" name="submitted" value="1">
            <button class="btn waves-effect waves-light" type="submit">Envoyer<i class="material-icons right">send</i></button>
          </div>
        </div>
      </form>
    </div>
  </div>
  <div class="company section">
    <div class="container">
      <div class="row">
        <div class="col s12">
          <?php if(have_posts()) : the_post();?>
          <h3 class="white-text"><?php the_field('titleDesc_fld'); ?></h3>
          <p class="grey-text text-lighten-4"><?php the_field('textDesc_fld', false, false); ?></p>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
<?php get_footer(); ?>
