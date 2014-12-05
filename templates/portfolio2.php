<!--adapted from <http://finance.cs50.net>-->



<table border=1 width=200 cellpadding=10>
	<thead>
		<tr>
			<th>Sunday</th>
			<th>Monday</th>
			<th>Tuesday</th>
			<th>Wednesday</th>
			<th>Thursday</th>
			<th>Friday</th>
			<th>Saturday</th>
		</tr>
	</thead>
	<tbody>
	<?php
		for($i = 1; $i < 13; $i++)
		{
		    $time = ($i +7) % 12;
		    if ($time == 0)
		        $time = 12;
			
			print("<tr>");
			
			for($j = 0; $j < 7; $j++)
			{
				if ($j == 0)
				{
				    print("<td><p>$time:00"); 
				    
				    if (($i + 7) < 12)
				        print "a.m.</p></td>";
			        else
			            print "p.m.</p></td>";
			    }
                
                else
                {
                    $id = $i * $j;
					print("<td><div id = $id style='width: 100%; height: 1.5em; margin: 0 auto; background: #000;'></div></td>");
				}
			}
			print("</tr>");
		}
	?>
	</tbody>
</table>


<ul class="nav nav-pills">
    <li>
        <a href="logout.php"><strong>Log Out</strong></a>
    </li>
</ul>
