<h1>Create an Account</h1>
<div class="reg-errors">
  <ul>
    <?php echo validation_errors("<li class='reg-error-item'>"); ?>
  </ul>
  <?php if(isset($insert_errors)):?>
    <?php echo $insert_errors ?>
  <?php endif; ?>
</div>

<fieldset>
  <legend>Personal Information</legend>
  <?php
    echo form_open('login/create_member');
    echo form_input('first_name',set_value('first_name','John'));
    echo form_input('last_name', set_value('last_name', 'Doe'));
    echo form_input('email_address', set_value('email_address','john.doe@thinkers.com'));
  ?>
</fieldset>

<fieldset>
  <legend>Log in Info</legend>
  <?php
    echo form_input('username', set_value('username','Username'));
    echo form_password('password', set_value('password','Password'));
    echo form_password('password2', set_value('password2','Password'));
    echo form_submit('submit','Create Account');
    echo anchor('','Login Page');
  ?>
  </form>
</fieldset>
