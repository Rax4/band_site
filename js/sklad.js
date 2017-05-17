$(document).ready(function(){
   
    function showMember(event)
    {
        var id = '#' + this.dataset.albumid;
        $('.sklad-opis').fadeOut(0);
        $(id).fadeIn(500);
    }
    
    function tabs(event)
    {
        event.preventDefault();
        if (jQuery(this).attr("id") == "story-tab") 
        {
            if ($('#historia').css('display') == 'none') 
            {
                $('#sklad').fadeOut(0);
                $('#historia').fadeIn(500);
                $('#band-tab').removeClass('active');
                $('#story-tab').addClass('active');
            }
        }
        else
        {
            if ($('#sklad').css('display') == 'none') 
            {
                $('#historia').fadeOut(0);
                $('#sklad').fadeIn(500);
                $('#story-tab').removeClass('active');
                $('#band-tab').addClass('active');
            }
        }
            
    }
    
    $('.runika-album-a').on('click',showMember);
    $('.runika-tab').on('click',tabs);
});

