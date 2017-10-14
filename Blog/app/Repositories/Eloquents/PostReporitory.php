<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IPostReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;

class PostReporitory extends ConfigModel implements IPostReporitory
{
    /**
     *
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        $sql = 'SELECT post.created_at, post.post_type_id, post.id, post.title, post.slug, post.avatar, post.time_delete, users.last_name, users.first_name, categorys.category_name,
        post_types.post_type_name FROM post JOIN users ON post.user_id = users.id JOIN post_types ON post.post_type_id = post_types.id
        JOIN categorys ON categorys.id = post.category_id ORDER BY post.created_at DESC';

        return DB::select($sql);
    }

    public function findPost($id)
    {
        // TODO: Implement findPost() method.
        $sql = 'SELECT post.created_at, post.post_type_id, post.id, post.title, post.slug, post.avatar, post.time_delete, post.fulltext, users.last_name, users.first_name, categorys.category_name,
        post_types.post_type_name FROM post JOIN users ON post.user_id = users.id JOIN post_types ON post.post_type_id = post_types.id
        JOIN categorys ON categorys.id = post.category_id WHERE post.id = '.$id;

        return DB::select($sql);
    }

    public function findByFieldSlug($slug)
    {
        // TODO: Implement findByFieldSlug() method.
        $sql = 'SELECT post.created_at, post.post_type_id, post.id, post.title, post.slug, post.category_id, post.avatar, post.time_delete, post.fulltext, users.last_name, users.first_name, categorys.category_name,
        post_types.post_type_name FROM post JOIN users ON post.user_id = users.id JOIN post_types ON post.post_type_id = post_types.id
        JOIN categorys ON categorys.id = post.category_id WHERE post.slug = '.'"'.$slug .'"';

        return DB::select($sql);
    }

    public function showByCate($cate_id)
    {

    }

    public function showOnTopList()
    {
        // TODO: Implement showOnTopList() method.
    }

    public function change($id)
    {
        // TODO: Implement change() method.
        if($post = $this->model->find($id))
        {
            if($post->time_delete == null)
            {
                $post->time_delete = date('Y-m-d H:i:s');
            }
            else
            {
                $post->time_delete = null;
            }
            $post->save();
            return true;
        }
        return false;
    }

    public function model()
    {
        return \Post::class;
    }
}
