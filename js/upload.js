
//
//    function _(el){
//            return document.getElementById(el);
//    }
//    function uploadFile(){
//            var file = _("file").files[0];
//            // alert(file.name+" | "+file.size+" | "+file.type);
//            var formdata = new FormData();
//            formdata.append("file", file);
//            var ajax = new XMLHttpRequest();
//            ajax.upload.addEventListener("progress", progressHandler, false);
//            ajax.addEventListener("load", completeHandler, false);
//            ajax.addEventListener("error", errorHandler, false);
//            ajax.addEventListener("abort", abortHandler, false);
//            ajax.open("POST", "upload.php");
//            ajax.send(formdata);
//    }
//    function progressHandler(event){
//            _("loaded_n_total").innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
//            var percent = (event.loaded / event.total) * 100;
//            _("progressBar").value = Math.round(percent);
//            _("status").innerHTML = Math.round(percent)+"% uploaded... please wait";
//    }
//    function completeHandler(event){
//            _("status").innerHTML = event.target.responseText;
//            _("progressBar").value = 0;
//    }
//    function errorHandler(event){
//            _("status").innerHTML = "Upload Failed";
//    }
//    function abortHandler(event){
//            _("status").innerHTML = "Upload Aborted";
//    }
//    
    //$('#submit-files').on("click",uploadFile);
    
    var app = app || {};
    
    (function(o)
    {
        "use strict";
        
        var ajax, getFormData, setProgress;
        
        ajax = function(data)
        {
            var xmlhttp = new XMLHttpRequest(), uploaded;
            
            xmlhttp.addEventListener('readystatechange',function(){
                if (this.readyState === 4) {
                    if (this.status === 200) {
                        uploaded = JSON.parse(this.response);                    
                        if (typeof o.options.finished === 'function') 
                        {
                            o.options.finished(uploaded);
                        }
                        else
                        {
                            if (typeof o.options.error === 'function') 
                            {
                                o.options.error();
                            }
                        }
                    }
                }
            });
            
            xmlhttp.upload.addEventListener('progress', function(event){
                var percent;
                
                if (event.lengthComputable === true) {
                    percent = Math.round(event.loaded/event.total*100);
                    setProgress(percent);
                }
            });
            xmlhttp.open('post', o.options.processor);
            xmlhttp.send(data);
        };
        
        getFormData = function(source)
        {
            var data = new FormData(), i;
            
            for (var i = 0; i < source.length; i++) 
            {
                data.append('file[]',source[i]);
            }
            
            data.append('ajax', true);
            
            return data;
        };
        
        setProgress = function(value)
        {
            if (o.options.progressBar !== undefined) 
            {
                o.options.progressBar.style.width = value ? value + '%' : 0;
            }
            
            if (o.options.progressText !== undefined) 
            {
                o.options.progressText.innerText = value ? value + '%' : '';
            }
        };
        
        o.uploader =function(options)
        {
            o.options = options;
            if (o.options.files !== undefined) 
            {
                if (o.options.files.files !== undefined)
                {
                    ajax(getFormData(o.options.files.files));
                }
                else
                {
                    ajax(getFormData(o.options.files));
                }
            }
        };
        
    }(app));
$(document).ready(function(){    
    document.getElementById('submit-files').addEventListener('click',function(e){
        e.preventDefault();
        var f = document.getElementById('file');
        var pb = document.getElementById('pb');
        var pt = document.getElementById('pt');
        var id = 3;
        app.uploader({
            files: f,
            progressBar: pb,
            progressText: pt,
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
    });
});
