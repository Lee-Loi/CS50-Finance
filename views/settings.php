<!--
Found out how to display "symbols" or import the array from stackoverflow! // http://stackoverflow.com/questions/23546818/php-foreach-loop-to-populate-dropdown-list-with-values-from-an-array-of-arrays
-->

<p> Add cash to your portfolio:</p>
<form action="settings.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autocomplete="off" autofocus class="form-control" name="cash" placeholder="Enter amount" type="text"/>
        </div>
        <div class="form-group">
            <button class="btn btn-default" type="submit">
                <span aria-hidden="true" class="glyphicon glyphicon-log-in"></span>
                Add cash
            </button>
        </div>
    </fieldset>
</form>

