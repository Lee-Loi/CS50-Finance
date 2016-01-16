<!--
Lays out a history table of what shares you purchased, sold and any cash
lodegents. The "shares" table in history is a varchar vs an int so that for
any cash lodgements, it doesn't register as 0 on the table for design.
-->

<div>
<table class="table">
    <thead>
        <tr>
        <th>Transaction</th>
        <th>Date/Time</th>
        <th>Symbol</th>
        <th>Shares</th>
        <th>Price</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($positions as $position): ?>
        <tr>
            <td><?= $position["transaction"] ?></td>
            <td><?= $position["date"] ?></td>
            <td><?= $position["symbol"] ?></td>
            <td><?= $position["shares"] ?></td>
            <td>$<?=number_format($position["price"], 2)?></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>
</div>
