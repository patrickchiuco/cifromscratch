<div id="errors">
  <ul>
  <?php echo validation_errors();?>
  </ul>
</div>
<div id="newsletter">
  <?php echo form_open('email/send'); ?>
  <?php
      $name_data = array(
        "name" => 'name',
        "id" => 'name',
        'value' => set_value('name'),
      );
  ?>
  <p>
    <label for="name">Name: </label>
    <?php echo form_input($name_data);?>
  </p>

  <p>
    <label for="email">Email Address: </label>
    <input type="email" name="email" id="email" value="<?php echo set_value('email'); ?>">
  </p>

  <p>
    <?php echo form_submit('submit','Submit');?>
  </p>

  </form>
</div>
