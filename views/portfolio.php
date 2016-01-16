<!--
Lays out portfolio table of what shares you purchased, the quantity and value 
and it displays how much cash is left in your account. Price isn't rounded with
number format for users accuracy of determing price per share.
-->

<div>
<table class="table">
    <thead>
        <tr>
        <th>Name</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price per share</th>
        <th>Total Value</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positions as $position): ?>
        <tr>
            <td><?= $position["name"] ?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td>$<?=$position["price"]?></td>
            <td>$<?=number_format($position["totalprice"], 2)?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
    <tfoot>
        <tr>
        <td>Cash</td>
        <td colspan ="3">
        <td>$<?=number_format($cash, 2)?></td>
        </tr>
    </tfoot>
</table>
</div>
