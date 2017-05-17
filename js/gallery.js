$(document).ready(function(){

    
    function loadAlbums()
    {
        $.ajax({
            type: 'GET',
            url: './src/entityManager.php',
            data: {
                request: 'albums'
            },
            success: function(data) {
                console.log(data);
                var albums = JSON.parse(data);
                for (var i = 0; i < albums.length; i++) 
                {
                    var title = albums[i].name;
                    var id = albums[i].id;
                    var date = albums[i].date;
                    var author = albums[i].author;
                    var thumbnail = albums[i].thumbnail;
                    if (thumbnail == null) 
                    {
                        thumbnail = 'img/plus.png';
                    }
                    result = '<div class="col-md-4 runika-album-handler"><div class="col-md-12 runika-album"><a data-albumId="'+ id +'" class="runika-album-a" href="#caru"><img class="runika-album-img" src="' + thumbnail + '" alt="Autor:'+author+'" style="width:100%">\n\
<div class="desc"><p class="runika-album-desc">' + title + '<br>' + date + '</p></div></a> </div></div>';
                    document.getElementById('content-albums').innerHTML += result;
                    $('.runika-album-a').on('click',showCarousel);
                }
            },
            error: function(error) {
                alert( "Wystąpił błąd");
            }
        });
    }
    loadAlbums();
    
    function showCarousel(event)
    {

        $.ajax({
            type: 'GET',
            url: './src/entityManager.php',
            data: {
                id: this.dataset.albumid,
                request: 'photos'
            },
            success: function(data) {
                var photos = JSON.parse(data);
                $.ajax({
                type: 'POST',
                url: './src/gallery.php',
                data: {
                    album: photos
                },
                success: function(data) {
                    console.log(data);
                    var pre = JSON.parse(data);
                    $('#caru').fadeOut(1);
                    document.getElementById('caru').innerHTML = '';
                    document.getElementById('caru').innerHTML += pre;
                    $('#caru').fadeIn(950);
                },
                error: function(error) {
                    alert( "Wystąpił błąd");
                }
                });
                    
            },
            error: function(error) {
                alert( "Wystąpił błąd");
            }
        });
    }
});

