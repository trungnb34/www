<?php
namespace App\Repositories\Eloquents;

use App\Repositories\Contracts\IFeedBackReporitory;
use App\Repositories\ConfigModel;
use Illuminate\Container\Container as App;
use Illuminate\Support\Facades\DB;

abstract class FeedBackReporitory extends ConfigModel implements IFeedBackReporitory
{
    public function __construct(App $app)
    {
        $this->app = $app;
        $this->makeModel();
    }

    /**
     * @param $id
     * @return bool
     */
    public function isReaded($id)
    {
        // TODO: Implement isReaded() method.
        if($find = $this->model->find($id))
        {
            $find->is_read = 0;
            $find->save();
            return true;
        }
        return false;
    }

    /**
     *
     */
    public function readedAll()
    {
        // TODO: Implement readedAll() method.
        $query = DB::update('update feed_backs set is_read = 0 where is_read = 1');
        if($query)
        {
            return true;
        }
        return false;
    }

    /**
     * @return mixed
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
        return DB::select('select * from users join feed_backs on users.id = feed_backs.user_id order by feed_backs.date_time desc');
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getDetail($id)
    {
        // TODO: Implement getDetail() method.
        return DB::select('select * from users join feed_backs on users.id = feed_backs.user_id where feed_backs.id = :id', ['id' => $id]);
    }

    /**
     * @return mixed
     */
    public function getNotRead()
    {
        // TODO: Implement getNotRead() method.
        return DB::select('select * from users join feed_backs on users.id = feed_backs.user_id where feed_backs.is_read order by feed_backs.date_time desc');
    }

    public function getFeedBacKByWeek()
    {
        // TODO: Implement getFeedBacjByWeek() method.
        // get last week

    }

    public function getFeedBackByMouth()
    {
        // TODO: Implement getFeedBackByMouth() method.
    }

    abstract public function model();
}