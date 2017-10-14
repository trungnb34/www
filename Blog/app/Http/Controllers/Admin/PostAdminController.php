<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IPostReporitory;
use App\Repositories\Contracts\ICategoryReporitory;
use App\Repositories\Contracts\IPostTypeReporitory;
use App\Http\Requests\AddPostAdminRequest;
use App\Http\Requests\EditPostAdminRequest;
use Illuminate\Support\Facades\Auth;

define('FOLDER_AVATAR_SAVE' , '\ckfinder\userfiles\images\avatar_post\\');

class PostAdminController extends Controller
{
    private $post;
    private $cates;
    private $posttype;

    public function __construct(IPostReporitory $post, ICategoryReporitory $cate, IPostTypeReporitory $posttype)
    {
        $this->post = $post;
        $this->cates = $cate;
        $this->posttype = $posttype;
    }

    public function index()
    {
        $cates = $this->cates->all();
        $posts = $this->post->getAll();
        $posttypes = $this->posttype->all();
        return view('admin.posts.list', ['posts' => $posts, 'cates' => $cates, 'posttypes' => $posttypes]);
    }

    public function getAdd()
    {
        $cates = $this->cates->all();
        $posttypes = $this->posttype->all();
        return view('admin.posts.add', ['cates' => $cates, 'posttypes' => $posttypes]);
    }

    public function postAdd(AddPostAdminRequest $request)
    {
        if($request->time_delete != 1) {
            $time_delete = date('Y-m-d H:i:s');
        }
        else {
            $time_delete = null;
        }
        // save avatar cho bài viết
        $slug = str_slug($request->title, '-');
        //echo $slug; die();
        if(createFolder($slug)) {
            $image =  $request->avatar->getClientOriginalName().'.'. $request->avatar->getClientOriginalExtension();
            $folder_save = FOLDER_AVATAR_SAVE .$slug;
            if($request->avatar->move(public_path($folder_save), $image)) {
                $data = [
                    'title'       => $request->title,
                    'slug'        => $slug,
                    'avatar'      => $folder_save .'\\'. $image,
                    'time_delete' => $time_delete,
                    'fulltext'    => $request->contentText,
                    'approval'    => 1,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'post_type_id' => $request->post_type_id,
                ];
                if($this->post->create($data)) {
                    return redirect()->route('listpost')->with('log', 'Bạn đã tạo thành công');
                }
                return redirect()->back()->with('log', 'Bạn đã tạo không thành công');
            }
            return redirect()->back()->with('log', 'Bạn đã tạo không thành công');
        }
        return redirect()->back()->with('log', 'Bạn đã tạo không thành công');
    }

    public function detail($slug)
    {
        if($posts = $this->post->findByFieldSlug($slug))
        {
            return view('admin.posts.detail', ['posts' => $posts]);
        }
        return redirect()->route('ex404');
    }

    public function change($id)
    {
        if($this->post->change($id))
        {
            return redirect()->route('listpost')->with('log', 'Bạn đã thay đổi thành công');
        }
        return redirect()->route('ex404');
    }

    public function postEdit(EditPostAdminRequest $request, $slug)
    {
        $post = $this->post->findByFieldSlug($slug);
        if($post && checkToEditModel($this->post, $post[0]->id, $request->title, 'title'))
        {
            if($request->time_delete != 1) {
                $time_delete = date('Y-m-d H:i:s');
            }
            else {
                $time_delete = null;
            }
            // rename folder avatar follow new title
            $slugNew = str_slug($request->title, '-');
            if(renameFolder($slugNew, $post[0]->slug))
            {
                $folder_save = '';
                if($request->avatar != null)
                {
                    $image =  $request->avatar->getClientOriginalName().'.'. $request->avatar->getClientOriginalExtension();
                    $folder_save = FOLDER_AVATAR_SAVE .$slug;
                    if($request->avatar->move(public_path($folder_save), $image))
                    {
                        $folder_save .= '\\'.$image;
                    }
                }
                else
                {
                    $folder_save = $post[0]->avatar;
                }
                $data = [
                    'title'       => $request->title,
                    'slug'        => $slugNew,
                    'avatar'      => $folder_save,
                    'time_delete' => $time_delete,
                    'fulltext'    => $request->contentText,
                    'approval'    => 1,
                    'user_id'     => Auth::user()->id,
                    'category_id' => $request->category_id,
                    'post_type_id' => $request->post_type_id,
                ];
                if($this->post->update($data, $post[0]->id))
                {
                    return redirect()->route('listpost')->with('log', 'Bạn đã thay đổi thành công');
                }
                return redirect()->route('listpost')->with('log', 'Bạn đã thay đổi không thành công');
            }
        }
    }

    public function getEdit($slug)
    {
        if($posts = $this->post->findByFieldSlug($slug))
        {
            $cates = $this->cates->all();
            $posttypes = $this->posttype->all();
            return view('admin.posts.edit', ['posts' => $posts, 'cates' => $cates, 'posttypes' => $posttypes]);
        }
        return redirect()->route('ex404');
    }

    public function filterByPost()
    {
        if ( Session::token() !== Input::get( '_token' ) ) {
            echo "ok man";
        }
    }
}
