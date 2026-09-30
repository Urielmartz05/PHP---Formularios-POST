<?php

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $client = trim((string) ($_GET["cliente"] ?? ""));
        $product = trim((string) ($_GET["producto"] ?? ""));
        $price = (float) ($_GET["precio-unitario"] ?? "");

        $quantity = (int) ($_GET["cantidad"] ?? "");

        $dataValidation = ($client === "" || $product === "" || $price <= 0 || $quantity <= 0);

        $subtotal = $price * $quantity;

        $discount = 0;

        if ($subtotal > 500) {
            $discount = $subtotal * 0.1;
        }

        $total = $subtotal - $discount;

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&family=Scoutie+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="ticket.css">
</head>
<body>

    <div class="ticket-container">

        <div class="ticket-header">
            <h1>Ticket de compra</h1>
        </div>

        <div class="ticket-info">

            <div class="detail">
                <p>Cliente:</p>
                <?= htmlspecialchars($client) ?>
            </div>
            
        </div>

        <div class="ticket-description">

            <div class="detail">
                <p>Producto:</p>
                <?= htmlspecialchars($product) ?>
            </div>

            <div class="detail">
                <p>Precio unitario:</p>
                <?= "$" . htmlspecialchars($price) ?>
            </div>

            <div class="detail">
                <p>Cantidad:</p>
                <?= htmlspecialchars($quantity) ?>
            </div>

        </div>

        <div class="ticket-total">

            <div class="detail">
                <p>Subtotal:</p>
                <?= "$" .htmlspecialchars($subtotal) ?>
            </div>
            
            <?php if ($subtotal > 500): ?>
                <div class="detail">
                    <p>Discount:</p>
                    <?= "- $" .htmlspecialchars($discount) ?>
                </div>
            <?php endif; ?>

            <div class="detail">
                <p>Total:</p>
                <?= "$" .htmlspecialchars($total) ?>
            </div>
        </div>

        <div class="ticket-footer">
            <p>¡Gracias por su compra!</p>
        </div>
        
    </div>
</body>
</html>