<?php
require_once "View/header.php";
?>
<div class="container">
    <h2 style="text-align:center ;">Catgory Form</h2>
    <div class="category_form">
        <form method="post" action="<?php echo $this->getUrl('update', 'Category') ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="hidden" name="id" value="<?php echo $row[0]['id'] ?>">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $row[0]['name'] ?>">
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
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"
                    rows="3"><?php echo $row[0]['description'] ?></textarea>
            </div>


            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        </form>
    </div>
</div>