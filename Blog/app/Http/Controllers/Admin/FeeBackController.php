<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Contracts\IFeedBackReporitory;

class FeeBackController extends Controller
{
    private $feedBack;

    public function __construct(IFeedBackReporitory $app)
    {
        $this->feedBack = $app;
    }

    public function index()
    {
        $feedbacks = $this->feedBack->getAll();
        return view('admin.feedback.list', ['feedbacks' => $feedbacks]);
    }

    public function detail($id)
    {
        if($feedbacks = $this->feedBack->getDetail($id))
        {
            $this->feedBack->isReaded($id);
            return view('admin.feedback.detail', ['feedbacks' => $feedbacks]);
        }
    }

    public function unread()
    {
        $feedBacks = $this->feedBack->getNotRead();
        return view('admin.feedback.list', ['feedbacks' => $feedBacks]);
    }

    public function fightallread()
    {
        $this->feedBack->readedAll();
        return redirect()->route('listfeedback');
    }

    public function delete($id)
    {
        if($this->feedBack->delete($id))
        {
            return redirect()->route('listfeedback')->with('log', 'Bạn đã xóa thành công');
        }
        return redirect()->route('listfeedback')->with('log', 'Bạn đã xóa không thành công');
    }
}
