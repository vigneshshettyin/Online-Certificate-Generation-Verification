<fieldset>
    <div class="form-group">
        <label for="f_name">First Name *</label>
          <input type="text" name="f_name" value="<?php echo htmlspecialchars($edit ? $customer['f_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="First Name" class="form-control" required="required" id = "f_name">
    </div> 

    <div class="form-group">
        <label for="l_name">Last name *</label>
        <input type="text" name="l_name" value="<?php echo htmlspecialchars($edit ? $customer['l_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Last Name" class="form-control" required="required" id="l_name">
    </div>
    <div class="form-group">
        <label for="certificate_number">Certificate Number *</label>
        <input type="text" name="certificate_number" value="<?php echo htmlspecialchars($edit ? $customer['certificate_number'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Certificate Number" class="form-control" required="required" id="certificate_number">
    </div>
    <div class="form-group">
        <label for="training_name">Training Name *</label>
        <input type="text" name="training_name" value="<?php echo htmlspecialchars($edit ? $customer['training_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Training Name" class="form-control" required="required" id="training_name">
    </div>
    <div class="form-group">
        <label for="college_name">Organization Name *</label>
        <input type="text" name="college_name" value="<?php echo htmlspecialchars($edit ? $customer['college_name'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Organization Name" class="form-control" required="required" id="college_name">
    </div>
    <div class="form-group">
        <label for="college_name">Marks *</label>
        <input type="text" name="marks" value="<?php echo htmlspecialchars($edit ? $customer['marks'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Marks" class="form-control" required="required" id="marks">
    </div>
    <div class="form-group">
        <label>Gender *</label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="male" <?php echo ($edit &&$customer['gender'] =='male') ? "checked": "" ; ?> required="required" id="male"/> Male
        </label>
        <label class="radio-inline">
            <input type="radio" name="gender" value="female" <?php echo ($edit && $customer['gender'] =='female')? "checked": "" ; ?> required="required" id="female"/> Female
        </label>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
          <textarea name="address" placeholder="Address" class="form-control" id="address"><?php echo htmlspecialchars(($edit) ? $customer['address'] : '', ENT_QUOTES, 'UTF-8'); ?></textarea>
    </div>

    <div class="form-group">
        <label>State</label>
        <?php $opt_arr = array("Maharashtra", "Kerala", "Karnataka"); ?>
        <select name="state" class="form-control selectpicker" required>
            <option value=" ">Please select your state</option>
            <?php
            foreach ($opt_arr as $opt) {
                if ($edit && $opt == $customer['state']) {
                    $sel = 'selected';
                } else {
                    $sel = '';
                }
                echo '<option value="'.$opt.'"' . $sel . '>' . $opt . '</option>';
            }
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" value="<?php echo htmlspecialchars($edit ? $customer['email'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="E-Mail Address" class="form-control" id="email">
    </div>

    <div class="form-group">
        <label for="phone">Phone</label>
        <input name="phone" value="<?php echo htmlspecialchars($edit ? $customer['phone'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="6362490105" class="form-control"  type="text" id="phone">
    </div>

    <div class="form-group">
        <label>Date of birth</label>
        <input name="date_of_birth" value="<?php echo htmlspecialchars($edit ? $customer['date_of_birth'] : '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Birth date" class="form-control" type="date">
    </div>

    <div class="form-group text-center">
        <label></label>
        <button type="submit" class="btn btn-warning" >Save <i class="glyphicon glyphicon-send"></i></button>
    </div>
</fieldset>
