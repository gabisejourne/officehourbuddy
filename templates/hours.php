
    <ul>
        <li>
            <?php 
                if (empty($faculty))
                {
                    printf("<p><strong>No hours to display</strong></p>");
                }
            
                else
                {
                    foreach ($faculty as $teacher)
                    {
                        printf("<p><strong>Your hours for %s are %s from %s to %s.</strong></p>", htmlspecialchars($teacher["course"]), htmlspecialchars($teacher["day"]), htmlspecialchars($teacher["start"]), htmlspecialchars($teacher["end"]));
                    }
                }
            ?>
        </li>
    </ul>
    <ul class="nav nav-pills">
        <li>
            <a href="hours.php"><strong>Add/Edit Hours</strong></a>
        </li>
    </ul>
    <ul class="nav nav-pills">
        <li>
            <?php
                if($students == false)
                {
                    printf("<a href=%s><strong>%s</strong></a>", htmlspecialchars("student.php"), "Register as a Student");
                }
            ?>
        <li>
    </ul>
    <ul class="nav nav-pills">
        <li>
            <a href="delete.php"><strong>Delete Hours</strong></a>
        </li>
    </ul>
    <ul class="nav nav-pills">
        <li>
            <a href="logout.php"><strong>Log Out</strong></a>
        </li>
    </ul>


