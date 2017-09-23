<?php

/**
 * @param $model
 */
function CheckToEditModel($model, $id, $value, $attribute)
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