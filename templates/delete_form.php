<form action="delete.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="day">
                <option value>Select day to delete</option>
                <?php 
                    foreach ($faculty as $entry)
                    {
                        printf("<option value=%s>%s from %s to %s</option>", htmlspecialchars($entry["day"]), $entry["day"], $entry["start"], $entry["end"]);
                    }
                ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Delete entry</button>
        </div>
    </fieldset>
</form>




