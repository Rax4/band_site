$(document).ready(function()
{
   function loadConcerts()
   {
       $.ajax({
            type: 'GET',
            url: './src/entityManager.php',
            data: {
                request: 'concerts'
            },
            success: function(data) {
                var table = $('#events');
                console.log(data);
                var concerts = JSON.parse(data);
                for (var i = 0; i < concerts.length; i++) 
                {
                    var cell = '<tr>\n\
                            <td>'+ concerts[i].date +'</td>\n\
                            <td>'+ concerts[i].title +'</td>\n\
                            <td>'+ concerts[i].text +'</td>\n\
                            </tr>';
                    table.append(cell);
                }
            },
            error: function(error) {
                alert( "Wystąpił błąd");
            }
        });
   }
   loadConcerts();
});