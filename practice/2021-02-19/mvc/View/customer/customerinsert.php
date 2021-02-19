<?php
require_once "View/header.php";
?>
<div class="container">
    <h2 style="text-align:center ;">Customer Form</h2>
    <div class="customer_form">
        <form method="post" action="<?php echo $this->getUrl('save', 'Customer') ?>">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="text" class="form-control" id="firstname" name="firstname" value="">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="mobile" name="mobile" value="">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password" value="">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>

                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>