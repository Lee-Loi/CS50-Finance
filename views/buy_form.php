<!--
Found out how to display "symbols" or import the array from stackoverflow! // http://stackoverflow.com/questions/23546818/php-foreach-loop-to-populate-dropdown-list-with-values-from-an-array-of-arrays
-->

<form action="buy.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="symbol" placeholder="Enter symbol" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="shares" placeholder="Enter amount of shares" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Buy
            </button>
        </div>
    </fieldset>
</form>

