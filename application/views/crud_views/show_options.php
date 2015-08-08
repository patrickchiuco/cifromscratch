<h2>Create</h2>
<?php echo validation_errors(); ?>
<?php echo form_open('site/create_user') ?>
<p>
  <label for="first_name">First Name:</label>
  <input type="text" name="first_name" id="first_name" placeholder="John">
</p>
<p>
  <label for="mid_name">Middle Name:</label>
  <input type="text" name="mid_name" id="mid_name" placeholder="S.">
</p>
<p>
  <label for="last_name">Last Name:</label>
  <input type="text" name="last_name" id="last_name" placeholder="Doe">
</p>
<p>
  <label for="add_info">Additional Info:</label>
  <textarea type="text" name="add_info" id="add_info" rows="4" cols="60" placeholder="Additional Info"></textarea>
</p>
<button type="submit">Create User</button>
</form>

<h2>Update</h2>
<?php echo form_open('site/update_user') ?>
<button type="submit" value="Update User">Update User</button>
</form>

<h2>Delete</h2>
<?php echo validation_errors(); ?>
<?php if(isset($users)): ?>
<h3>User list: </h3>
  <ul>
<?php foreach ($users as $user): ?>
  <li>
    <?php echo anchor("site/delete_user/".$user->id, $user->last_name.', '.$user->first_name);?>
  </li>
<?php endforeach; ?>
  </ul>
<?php else: ?>
  No users to delete.
<?php endif; ?>

<h2>Display All</h2>
<?php echo form_open('site/display_all_users') ?>
<?php if(isset($users)):?>
  <table>
    <tr>
      <th>ID</th>
      <th>First Name</th>
      <th>Middle Name</th>
      <th>Last Name</th>
      <th>Comment</th>
    </tr>
  <?php foreach ($users as $value): ?>
    <tr>
      <td><?php echo $value->id; ?></td>
      <td><?php echo $value->first_name; ?></td>
      <td><?php echo $value->middle_name; ?></td>
      <td><?php echo $value->last_name; ?></td>
      <td><?php echo $value->add_info; ?></td>
    </tr>
  <?php endforeach; ?>
  </table>
<?php else: ?>
  <h2>No records available </h2>
<?php endif; ?>
</table>
<button type="submit">Display All Users</button>
</form>
