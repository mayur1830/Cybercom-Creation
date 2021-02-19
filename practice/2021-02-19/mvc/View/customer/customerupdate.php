<?php
require_once "View/header.php";
?>
<div class="container">
    <h2 style="text-align:center ;">Customer Form</h2>
    <div class="customer_form">
        <form method="post" action="<?php echo $this->getUrl('update', 'Customer') ?>">
            <div class="form-group">
                <label for="firstname">Firstname</label>
                <input type="hidden" name="id" value="<?php echo $row[0]['id'] ?>">
                <input type="text" class="form-control" id="firstname" name="firstname"
                    value="<?php echo $row[0]['firstname'] ?>">
            </div>
            <div class="form-group">
                <label for="lastname">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname"
                    value="<?php echo $row[0]['lastname'] ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row[0]['email'] ?>">
            </div>
            <div class="form-group">
                <label for="mobile">Mobile</label>
                <input type="number" class="form-control" id="mobile" name="mobile"
                    value="<?php echo $row[0]['mobile'] ?>">
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="password" class="form-control" id="password" name="password"
                    value="<?php echo $row[0]['password'] ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <?php
                    $select = ['enable' => "Enable", 'disable' => "Disable"];
                    foreach ($select as $key => $value) {
                        if ($key === $row[0]['status']) {
                    ?>
                    <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                    <?php
                        } else {
                        ?>
                    <option value="<?php echo $key ?>"><?php echo $value ?></option>
                    <?php
                        }
                    }
                    ?>


                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
    </div>
</div>