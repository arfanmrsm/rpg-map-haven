<?php
ob_start();
/** @var array|null $order */
?>

<div class="card shadow border-0 border-start border-5 border-primary mb-4">
    <div class="card-body">
        <div class="row align-items-center">
            <div class="col">
                <h2 class="mb-1">Invoice</h2>
                <p class="text-muted mb-0">Order #<?= htmlspecialchars($order['fld_order_num']) ?></p>
            </div>
            <div class="col-auto">
                <button type="button" class="btn btn-primary" onclick="window.print()"><i class="bi bi-printer me-1"></i>Print</button>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-sm">
    <div class="card-body p-4">
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>RPG Map Haven</h4>
                <p class="text-muted mb-0">Sales Invoice</p>
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Invoice No.: </strong><?= htmlspecialchars($order['fld_order_num']) ?><br>
                <strong>Date: </strong><?= htmlspecialchars($order['fld_order_date']) ?>
            </div>
        </div>
        <hr>
        <div class="row mb-4">
            <div class="col-md-6">
                <strong>Customer</strong><br>
                <?= htmlspecialchars($order['fld_customer_name'] ?? $order['fld_customer_num']) ?><br>
                <?= htmlspecialchars($order['fld_customer_phone'] ?? '') ?>
            </div>
            <div class="col-md-6 text-md-end">
                <strong>Staff</strong><br>
                <?= htmlspecialchars($order['fld_staff_name'] ?? $order['fld_staff_num']) ?><br>
                <?= htmlspecialchars($order['fld_staff_email'] ?? '') ?>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Product</th>
                        <th>Unit Price</th>
                        <th>Quantity</th>
                        <th class="text-end">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $grandTotal = 0; ?>
                    <?php if (!empty($details)): ?>
                        <?php foreach ($details as $i => $detail): ?>
                            <?php
                            $price     = (float) ($detail['fld_product_price'] ?? 0);
                            $qty       = (int) $detail['fld_order_detail_quantity'];
                            $lineTotal = $price * $qty;
                            $grandTotal += $lineTotal;
                            ?>
                            <tr>
                                <td><?= $i + 1 ?></td>
                                <td><?= htmlspecialchars($detail['fld_product_name'] ?? $detail['fld_product_num']) ?></td>
                                <td>$<?= number_format($price, 2) ?></td>
                                <td><?= $qty ?></td>
                                <td class="text-end">$<?= number_format($lineTotal, 2) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr><td colspan="5" class="text-center">No products added to this order</td></tr>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-end">Grand Total</th>
                        <th class="text-end">$<?= number_format($grandTotal, 2) ?></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <a href="<?= BASE_URL ?>orderdetailcontroller/index/<?= htmlspecialchars($order['fld_order_num']) ?>" class="btn btn-secondary"><i class="bi bi-arrow-left me-1"></i>Back to Details</a>
    </div>
</div>

<style>
@media print {
    #mySidebar, #myBurger {
        display: none !important;
    }

    .btn {
        display: none !important;
    }

    .card {
        box-shadow: none !important;
        border: none !important;
    }

    .col.bg-light {
        background-color: white !important;
    }
}
</style>

<?php
$content = ob_get_clean();
require_once 'layout.php';
?>