<?php
define('FOLDER_AVATAR', '../public/ckfinder/userfiles/images/avatar_post/');
/**
 * @param $model
 */
function checkToEditModel($model, $id, $value, $attribute)
{
    $objects = $model->all();
    foreach ($objects as $object)
    {
        if($object[$attribute] == $value)
        {
            if($object->id == $id)
            {
                return true;
            }
            return false;
        }
    }
    return true;
}

function createFolder($slug, $folder = null)
{
    if($folder == null)
    {
        if(!file_exists($folder = FOLDER_AVATAR . $slug))
        {
            if(mkdir($folder, 0777, true))
            {
                return true;
            }
        }
        else
        {
            $folder .= '(1)';
            createFolder($slug, $folder);
        }
    }
    else if($folder != null)
    {
        if(!file_exists($folder))
        {
            if(mkdir($folder, 0777, true))
            {
                return true;
            }
        }
        else
        {
            $folder .= '(1)';
            createFolder($slug, $folder);
        }
    }
}

function renameFolder($slugNew, $slugOld)
{
    if(file_exists(FOLDER_AVATAR . $slugOld))
    {
        rename(FOLDER_AVATAR . $slugOld, FOLDER_AVATAR . $slugNew);
        return true;
    }
    return false;
}

//function stripUnicode($str)
//{
//    if (!$str) return false;
//    $unicode = array(
//        'a' => 'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
//        'A' => 'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
//        'd' => 'đ',
//        'D' => 'Đ',
//        'e' => 'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
//        'E' => 'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
//        'i' => 'í|ì|ỉ|ĩ|ị',
//        'I' => 'Í|Ì|Ỉ|Ĩ|Ị',
//        'o' => 'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
//        'O' => 'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
//        'u' => 'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
//        'U' => 'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
//        'y' => 'ý|ỳ|ỷ|ỹ|ỵ',
//        'Y' => 'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
//    );
//
//    foreach ($unicode as $khongdau => $codau) {
//        $arr = explode("|", $codau);
//        $str = str_replace($arr, $khongdau, $str);
//        $str = str_replace(' ', '-', $str);
//    }
//    return $str;
//}

function showCategory($arrCate, $par_id = 0, $str = "")
{
    foreach ($arrCate as $cate)
    {
        echo $id = $cate["id"];
        $name_Cate = $cate["category_name"];
        $parent_id = $cate["parent_id"];
        if($parent_id == $par_id)
        {
            echo "<option value=".$id." data-menu=".$cate["menu_id"].">".$str.$str.$name_Cate."</option>";
            showCategory($arrCate, $cate['id'], $str."--");
        }
    }
}