$(document).ready(function(){
   
    function loadLyrics()
    {
        $.ajax({
           type: 'GET',
           url: './src/entityManager.php',
           data: {
               request: 'lyrics'
           },
           success: function(data)
           {
               var data = JSON.parse(data);
                for (var i = 0; i < data.length; i++) 
                {
                    var lyr = '\
                    <a><div data-toggle="collapse" href="#collapse'+ i +'" class="panel panel-default panel-runika"></a>\n\
                            <div class="panel-heading">\n\
                                <h4 class="panel-title">'+ data[i].title +'</h4>\n\
                            </div>\n\
                            <div id="collapse'+ i +'" class="panel-collapse collapse">\n\
                                <div class="panel-body">'+ data[i].text +'</div>\n\
                                <div class="panel-footer">Tekst: '+ data[i].words +' Muzyka: '+ data[i].music +'</div>\n\
                            </div>\n\
                        </div>';
                    $('#runika-lyrics-group').append(lyr);
                }   
           },
           error: function(error)
           {
               
           }
           
            
        });
    }
    loadLyrics();
});
