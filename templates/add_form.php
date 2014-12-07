<ul>
    <li><?= htmlspecialchars($faculty["fullname"]) ?></li>
    <li><?= htmlspecialchars($faculty["day"]) ?></li>
    <strong>
    <li><?= htmlspecialchars($faculty["start"]) ?></li> to <li><?= htmlspecialchars($faculty["end"]) ?></li>
    </strong>
</ul>
<form action="add.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="faculty" placeholder="Confirm faculty name" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="day" placeholder="Confirm Day" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="start" placeholder="Confirm Start time" type="text"/>
        </div>
        <div class="form-group">
            <input class="form-control" name="end" placeholder="Confirm End time" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Confirm</button>
        </div>
    </fieldset>
</form>


