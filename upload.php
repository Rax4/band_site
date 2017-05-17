<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Runika - Aktualności</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <link href="style/runika.css" rel="stylesheet" crossorigin="anonymous">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 style="color:white">Wrzuć zdjęcia do galerii</h1>
                  <div class="runika-post panel panel-default">
                      <!-- Standar Form -->
                      <h4>Wybierz album</h4>
                      <h4>Select files from your computer</h4>
                      <span id="pt"></span>
                      <span id="status"></span>
                      <form action="upload2.php" method="post" enctype="multipart/form-data">
                        <div class="form-inline">
                          <div class="form-group">
                            <input type="file" name="file[]" id="file" required multiple>
                          </div>
                          <button type="submit" class="btn btn-sm btn-primary" id="submit-files">Upload files</button>
                          <br>
                          <div class="progress">
                          <div id="pb" class="progress-bar" role="progressbar" style="width:0%">
                          </div>

                          <h3 id="status">Status</h3>
                          <p id="loaded_n_total"></p>
                        </div>
                        </div>
                      </form>
                      <h4>Or drag and drop them in!</h4>
                      <div class="upload-drop-zone drop dropzone" id="dropzone">Drop files here</div>
                  </div>
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <h1 style="color:white">Dodaj post do aktualności</h1>
                    <div class="runika-post">
                        <form action="#" method="post">
                            <div class="form-group" style="color:black">
                              <input type="text" name="text" placeholder="Tytuł" id="post-text" required><br>
                              <textarea name="post" placeholder="Treść"></textarea>
                              <button type="submit" class="btn btn-sm btn-primary" id="submit-post">Wrzuć posta</button> 
                          </div>
                      </form>
                    </div>
                </div>
                <div class="col-md-2"></div>
            </div>
        </div>
            
            <script src="js/dragDrop.js"></script>
            <script src="./js/upload.js"></script>                 
        <?php
            
            if($_SERVER['REQUEST_METHOD'] == 'POST' )
            {
               /* $fileName = $_FILES["file"]["name"]; // The file name
                $fileTmpLoc = $_FILES["file"]["tmp_name"]; // File in the PHP tmp folder
                $fileType = $_FILES["file"]["type"]; // The type of file it is
                $fileSize = $_FILES["file"]["size"]; // File size in bytes
                $fileErrorMsg = $_FILES["file"]["error"]; // 0 for false... and 1 for true
                if (!$fileTmpLoc) { // if file not chosen
                    echo "ERROR: Please browse for a file before clicking the upload button.";
                    exit();
                }
                if(move_uploaded_file($fileTmpLoc, "test_uploads/$fileName")){
                    echo "$fileName upload is complete";
                } else {
                    echo "move_uploaded_file function failed";
                } */
            }
        ?>
    </body>
</html>
