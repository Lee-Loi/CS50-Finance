<!--
Found out how to display "symbols" or import the array from stackoverflow! // http://stackoverflow.com/questions/23546818/php-foreach-loop-to-populate-dropdown-list-with-values-from-an-array-of-arrays
-->

<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name ="symbol">
                <option disabled selected value ="">Symbols</option>
                <?php
                foreach($symbols as $symbol) 
                { ?>
                    <option value="<?= $symbol['symbol'] ?>"><?= $symbol['symbol'] ?></option>
                    <?php
                } ?>
            </select>
        </div>    
        <div class="form-group">
            <button class="btn btn-default" type="submit">Sell</button>
        </div>
    </fieldset>
</form>

