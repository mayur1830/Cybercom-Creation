<?php $payments = $this->getPayments();?>
<?php $cart = $this->getCart();?>
<h3>Payment Method</h3>
<hr>
<?php if ($payments): ?>
<?php foreach ($payments as $payment): ?>
<div class="form-check">
    <label class="form-check-label">
        <input type="radio" class="form-check-input" name="payment" id="" value="<?=$payment->id?>"
            <?php if ($payment->id == $cart->paymentId): ?>checked="checked" <?php endif;?>>
        <?=$payment->name?>
    </label>
</div>
<?php endforeach;?>
<?php endif;?>
<input type="button" value="Save" class="btn btn-primary" id="paymentMethod">
<script type="text/javascript">
$(document).ready(function() {
    $("#paymentMethod").click(function() {
        $('form').attr('action',
            '<?php echo $this->getUrl()->getUrl('savePaymentMethod', 'Cart'); ?>'
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
})
</script>