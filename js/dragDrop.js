$(document).ready(function(){
    
    function upload(files)
    {
        var pb = document.getElementById('pb');
        var pt = document.getElementById('pt');
        var id = 3;
        
        app.uploader
        ({
            progressBar: pb,
            progressText: pt,
            files: files,
            processor:'src/uploadFiles.php',

            finished: function(data)
            {
                var result ='';
                for (var i = 0; i < data.succeeded.length; i++) 
                {
                    $.ajax({
                        type: 'POST',
                        url: 'src/entityManager.php',
                        data: {
                            src: 'img/gallery/'+data.succeeded[i].file,
                            albumId: id,
                            request: 'photo'
                        },
                        success: function() {
                        },
                        error: function(error) {
                            alert( "Wystąpił błąd");
                        }
                    });
                }
                for (var j = 0; j < data.failed.length; j++) 
                {
                    result = result + data.failed[j].name + " Błedny plik! ";
                }
                for (var i = 0; i < data.succeeded.length; i++) 
                {
                    result = result + data.succeeded[i].name + " Plik Dodany! ";
                }
                document.getElementById('status').innerHTML = result;
            },

            error: function()
            {
                console.log('Not working');
            }
        }); 
    }
    
    var dropzone = $('#dropzone');
    
    dropzone.on('dragover',function()
    {
       this.className = 'upload-drop-zone drop dropzone dragover';
       return false;
    });
    
    dropzone.on('dragleave',function()
    {
       this.className = 'upload-drop-zone drop dropzone';
       return false;
    });
    
    dropzone.on('drop',function(event)
    {
       event.preventDefault();
       event.dataTransfer = event.originalEvent.dataTransfer;
       upload(event.dataTransfer.files);
    });
});

