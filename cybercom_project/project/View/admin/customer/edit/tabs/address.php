<?php
$billing = $this->getBillingAddress();
?>
<div class="form-field col-lg-12">
    <p class="title">Billing Address</p>
</div>

<div class="form-field col-lg-6">
    <input id="firstname" name="billing[address]" class="input-text js-input" type="text"
        value="<?php echo $billing->address ?>" required>
    <label class="label" for="address">Address</label>
</div>

<div class="form-field col-lg-6">
    <input id="city" name="billing[city]" class="input-text js-input" type="text" value="<?php echo $billing->city ?>"
        required>
    <label class="label" for="city">City</label>
</div>
<div class="form-field col-lg-6">
    <input id="state" name="billing[state]" class="input-text js-input" type="text"
        value="<?php echo $billing->state ?>" required>
    <label class="label" for="state">State</label>
</div>
<div class="form-field col-lg-6">
    <input id="zipcode" name="billing[zipcode]" class="input-text js-input" type="text"
        value="<?php echo $billing->zipcode ?>" required>
    <label class="label" for="zipcode">ZipCode</label>
</div>
<div class="form-field col-lg-6">
    <input id="country" name="billing[country]" class="input-text js-input" type="text"
        value="<?php echo $billing->country ?>" required>
    <label class="label" for="country">Country</label>
</div>
<?php
$shipping = $this->getShippingAddress();

?>
<div class="form-field col-lg-12">
    <p class="title">Shipping Address</p>
</div>
<div class="form-field col-lg-6">
    <input id="shippingaddress" name="shipping[address]" class="input-text js-input" type="text"
        value="<?php echo $shipping->address ?>" required>
    <label class="label" for="address">Address</label>
</div>
<div class="form-field col-lg-6">
    <input id="city" name="shipping[city]" class="input-text js-input" type="text" value="<?php echo $shipping->city ?>"
        required>
    <label class="label" for="city">City</label>
</div>
<div class="form-field col-lg-6">
    <input id="state" name="shipping[state]" class="input-text js-input" type="text"
        value="<?php echo $shipping->state ?>" required>
    <label class="label" for="state">State</label>
</div>
<div class="form-field col-lg-6">
    <input id="zipcode" name="shipping[zipcode]" class="input-text js-input" type="text"
        value="<?php echo $shipping->zipcode ?>" required>
    <label class="label" for="zipcode">ZipCode</label>
</div>
<div class="form-field col-lg-6">
    <input id="country" name="shipping[country]" class="input-text js-input" type="text"
        value="<?php echo $shipping->country ?>" required>
    <label class="label" for="country">Country</label>
</div>
<div class="form-field col-lg-12">
    <input class="submit-btn" type="button" id="customer_address" value="Submit">
</div>
<script>
$(document).ready(function() {

    $("#customer_address").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('save', 'Customer_Address'); ?>'
        );
        var dataString = $('#customerForm').serialize();
        $.ajax({
            url: $('#customerForm').prop('action'),
            type: "POST",
            data: dataString,
            success: function(response) {
                console.log(response);
                $.each(response.element, function(i, element) {
                    $(element.selector).html(element
                        .html);
                });
            },
        })
    });

});
</script>