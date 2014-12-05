
<ul>
    <li>
        <strong>Your hours are <?=$faculty["start"]?> to <?=$faculty["end"]?></strong>
    </li>
</ul>
<div>
    <a href="hours.php" class="btn btn-default">Edit Hours</a>
</div>

<form action="student.php" method="post">
    <fieldset>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Register as Student</button>
        </div>
    </fieldset>
</form>

<ul class="nav nav-pills">
    <li>
        <a href="logout.php"><strong>Log Out</strong></a>
    </li>
</ul>
