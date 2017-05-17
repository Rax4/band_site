<?php
    header('Content-Type: application/json');
    $uploaded = [];
    $allowed = ['jpeg','png','jpg'];

    $succedeed = [];
    $failed = [];
    if (!empty($_FILES['file']))
    {
        foreach ($_FILES['file']['name'] as $key => $name)
        {
           if ($_FILES['file']['error'][$key] === 0)
            {
                $temp = $_FILES['file']['tmp_name'][$key];

                $ext = explode('.',$name);
                $ext = strtolower(end($ext));

                $file = md5_file($temp) . time() .'.'. $ext;

                if (in_array($ext, $allowed) === true)
                {
                    if (move_uploaded_file($temp,"../img/gallery/{$file}") === true)
                    {
                        $succedeed[] = array('name' => $name, 'file' => $file);
                    }
                }
                else
                {
                    $failed[] = array('name' => $name);
                }
            }
        }
    }

    if (!empty($_POST['ajax']))
    {
        echo json_encode(array('succeeded' => $succedeed, 'failed' => $failed));
    }
