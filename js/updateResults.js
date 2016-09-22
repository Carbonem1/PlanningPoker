function updateResults(last_id) {
    $.ajax({
        url: '/php/updateResults.php', //php          
        data: {"last_id": last_id}, //the data
        method: 'GET', 
        success: function (msg) {
        alert(msg);
        }
    });

}

setInterval(updateResults, 1000); //every 1 secs
