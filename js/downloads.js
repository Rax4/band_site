$(document).ready(function(){
   
    function loadDownloads()
    {
        $.ajax({
           type: 'GET',
           url: './src/entityManager.php',
           data: {
               request: 'files'
           },
           success: function(data)
           {
                data = JSON.parse(data);
                console.log(data);
                for (var i = 0; i < data.length; i++) 
                {
                    var link = '<li><a  download="'+ data[i].name +'" href="'+ data[i].src +'">'+ data[i].name +' </a><span class="file-description">'+ data[i].description +'<span></li>';
                    $('.runika-files-list').append(link);
                }   
           },
           error: function(error)
           {
               
           }
           
            
        });
    }
    loadDownloads();
});
