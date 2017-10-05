
<?php
    // create folder
    if (!file_exists('test/nguyenbatrung'))
    {
        mkdir('test/nguyenbatrung', 0777, true);
    }
    else
    {
        echo 'folder đã tồn tại' . '<br/>';
    }
    if(file_exists('test/nguyenbatrung'))
    {
        if(rename('test/nguyenbatrung', 'test/batrung'))
        {
            echo 'đã được';
        }
        else
        {
            echo "Không được";
        }
    }
    
?>