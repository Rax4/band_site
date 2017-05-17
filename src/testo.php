<?php
    include 'photo.php';
    include 'album.php';
    include 'post.php';
    
    $post = Post::loadPostById(2);
    $post->setText('Lorem ipsum dolor sit amet, consectetur adipiscing elit. In nec laoreet diam. Etiam eget mollis nulla. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam nec arcu aliquam, pellentesque erat vel, porttitor felis. Nunc pellentesque consequat nulla tristique mattis. In ut tempor nisi. Morbi consequat mi vitae scelerisque imperdiet. In dignissim tempus condimentum. Duis semper libero quis blandit molestie. Aenean a molestie mauris. In sodales mauris augue, vitae posuere augue scelerisque sed. ');
    $post->setTitle("MURZYNI WKRACZAJĄ DO AKCJI!! PREMIERA!!");
    $post->setDate(date('Y:m:d H:i:s'));
    $post->saveToDB();

    