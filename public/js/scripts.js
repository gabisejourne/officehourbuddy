/**
 * scripts.js
 *
 * Computer Science 50
 * Problem Set 7
 *
 * Global JavaScript, if any.
 */
 
 function search(query, cb)
{
    // get places matching query (asynchronously)
    var parameters = {
        fullname: query
    };
    var faculty = getJSON("search2.php", parameters)


}
