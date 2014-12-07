<ul>
    <li><?= htmlspecialchars($faculty["fullname"]) ?></li>
    <li><?= htmlspecialchars($faculty["course"]) ?></li>
    <li><?= htmlspecialchars($faculty["day"]) ?></li>
    <strong>
    <li><?= htmlspecialchars($faculty["start"]) ?></li> 
    to
    <li><?= htmlspecialchars($faculty["end"]) ?></li>
    </strong>
</ul>


<div>
    <a href="add.php" class="btn btn-default">Add</a>
</div>
