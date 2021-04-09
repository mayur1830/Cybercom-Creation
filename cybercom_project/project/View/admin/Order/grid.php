<?php
$orders = $this->getOrders();

?>

<body>

    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Order Details</h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead align="center">
                    <th>OrderId</th>
                    <th>Customer Name</th>
                    <th>Payment Method</th>
                    <th>Shipping Method</th>
                    <th>Discount</th>
                    <th>Shipping Amount</th>
                    <th>Total</th>
                </thead>
                <tbody align="center">
                    <?php if (!$orders): ?>
                    <tr>
                        <td colspan="10"> No Record Found</td>
                    </tr>
                    <?php else: ?>
                    <?php foreach ($orders->getData() as $key => $order): ?>

                    <tr>
                        <td><?php echo $order->orderId ?></td>
                        <td><?php echo $order->customerName ?></td>
                        <td><?php echo $order->paymentMethod ?></td>
                        <td><?php echo $order->shippingMethod ?></td>
                        <td><?php echo $order->discount ?></td>
                        <td><?php echo $order->shippingAmount ?></td>
                        <td><?php echo $order->total ?></td>
                    </tr>
                    <?php endforeach;?>
                    <?php endif;?>

                </tbody>

            </table>

        </div>
    </div>

</body>