<?php
require_once "View/header.php";
?>
<div class="container">
    <h2 style="text-align:center ;">Catgory Form</h2>
    <div class="category_form">
        <form method="post" action="<?php echo $this->getUrl('save', 'Category') ?>">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php $name ?>">
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="enable">Enable</option>
                    <option value="disable">Disable</option>

                </select>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            </div>


            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
        </form>
    </div>
</div>