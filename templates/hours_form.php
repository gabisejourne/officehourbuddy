<form action="hours.php" method="post">
    <fieldset>
        <div class="form-group">
            <input autofocus class="form-control" name="course" placeholder="Course" type="text"/>
        </div>
        <div class="form-group">
            <select class="form-control" name="day">
                <option value>Select day</option>
                <option value= "Sunday">Sunday</option>
                <option value= "Monday">Monday</option>
                <option value= "Tuesday">Tuesday</option>
                <option value= "Wednesday">Wednesday</option>
                <option value= "Thursday">Thursday</option>
                <option value= "Friday">Friday</option>
                <option value= "Saturday">Saturday</option>
            </select>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="start" placeholder="hh:mm" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="end" placeholder="hh:mm" type="text"/>
        </div>
        <div class="form-group">
            <input autofocus class="form-control" name="location" placeholder="Location" type="text"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
    </fieldset>
</form>

