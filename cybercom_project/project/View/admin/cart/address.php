<?php $billingAddress = $this->getBillingAddress();?>
<?php $shippingAddress = $this->getShippingAddress();?>
<div class="row mt-5 ">

    <div class="col">
        <h3>Billing Address</h3>
        <hr>
        <div class="form-group">
            <label for="billing[address]">Address</label>
            <textarea class="form-control" name="billing[address]" id="billing[address]"
                rows="3"> <?=$billingAddress->address?></textarea>
        </div>
        <div class="form-group">
            <label for="billing[city]">City</label>
            <input type="text" class="form-control" name="billing[city]" id="billing[city]"
                value="<?=$billingAddress->city?>">
        </div>
        <div class="form-group">
            <label for="billing[zipcode]">Zipcode</label>
            <input type="text" class="form-control" name="billing[zipcode]" id="billing[zipcode]"
                value="<?=$billingAddress->zipcode?>">
        </div>

        <div class="form-group">
            <label for="billing[state]">State</label>
            <input type="text" class="form-control" name="billing[state]" id="billing[state]"
                value="<?=$billingAddress->state?>">
        </div>
        <div class="form-group">
            <label for="billing[country]">Country</label>
            <input type="text" class="form-control" name="billing[country]" id="billing[country]"
                value="<?=$billingAddress->country?>">
        </div>

        <div>
            <input type="checkbox" name="sameAsShipping">Same As Shipping
            <input type="checkbox" name="BillingBook"> Save in Address Book
            <input type="button" value="Save" class="btn btn-primary" id="saveBilling">

        </div>
    </div>

    <div class="col">
        <h3>Shipping Address</h3>
        <hr>
        <div class="form-group">
            <label for="shipping[address]">Address</label>
            <textarea class="form-control" name="shipping[address]" id="shipping[address]"
                rows="3"> <?=$shippingAddress->address?></textarea>
        </div>
        <div class="form-group">
            <label for="shipping[city]">City</label>
            <input type="text" class="form-control" name="shipping[city]" id="shipping[city]"
                value="<?=$shippingAddress->city?>">
        </div>
        <div class="form-group">
            <label for="shipping[zipcode]">Zipcode</label>
            <input type="text" class="form-control" name="shipping[zipcode]" id="shipping[zipcode]"
                value="<?=$shippingAddress->zipcode?>">
        </div>

        <div class="form-group">
            <label for="shipping[state]">State</label>
            <input type="text" class="form-control" name="shipping[state]" id="shipping[state]"
                value="<?=$shippingAddress->state?>">
        </div>
        <div class="form-group">
            <label for="shipping[country]">Country</label>
            <input type="text" class="form-control" name="shipping[country]" id="shipping[country]"
                value="<?=$shippingAddress->country?>">
        </div>

        <div>
            <input type="checkbox" name="sameAsBilling">Same As Billing
            <input type="checkbox" name="ShippingBook"> Save in Address Book
            <input type="button" value="Save" class="btn btn-primary" id="saveShipping">
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {

    $("#saveBilling").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('saveBillingAddress', 'Cart'); ?>'
        );
        var dataString = $('#cartForm').serialize();
        $.ajax({
            url: $('#cartForm').prop('action'),
            type: "POST",
            data: dataString,
            success: function(response) {
                $.each(response.element, function(i, element) {
                    $(element.selector).html(element
                        .html);
                });
            },
        })
    });
    $("#saveShipping").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('saveShippingAddress', 'Cart'); ?>'
        );
        var dataString = $('#cartForm').serialize();
        $.ajax({
            url: $('#cartForm').prop('action'),
            type: "POST",
            data: dataString,
            success: function(response) {
                $.each(response.element, function(i, element) {
                    $(element.selector).html(element
                        .html);
                });
            },
        })
    });

});
</script>