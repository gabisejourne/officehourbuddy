<!--adapted from <http://code.tutsplus.com/tutorials/create-a-sticky-note-effect-in-5-easy-steps-with-css3-and-html5--net-13934>-->

<div id = postits>
<ul>

        <?php 

            foreach ($positions as $position)
            {
                printf("<li><a href='#'>");
                printf("<p>%s</p>", htmlspecialchars($position["faculty"]));
                printf("<p>%s</p>", htmlspecialchars($position["course"]));
                printf("<p>%s</p>", htmlspecialchars($position["day"]));
                printf("<p>%s to %s</p>", htmlspecialchars($position["start"]), htmlspecialchars($position["end"]));
                printf("</a></li>");
            }
        ?>

</ul>
</div>

<ul class="nav nav-pills">
    <li>
        <a href="logout.php"><strong>Log Out</strong></a>
    </li>
</ul>

<ul class="nav nav-pills">
    <li>
        <?php
            if($faculty == false)
            {
                printf("<a href=%s><strong>%s</strong></a>", htmlspecialchars("faculty.php"), "Register as a Faculty Member");
            }
            else if($faculty != false && $students != false)
            {
                printf("<a href=%s><strong>%s</strong></a>", htmlspecialchars("view_hours.php"), "View your hours");
            }
        ?>
    </li>
</ul>
        
<ul class="nav nav-pills">
    <li>
        <a href="search.php"><strong>Search for TF</strong></a>
    </li>
</ul>

