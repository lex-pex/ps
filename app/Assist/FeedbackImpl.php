<?php

namespace App\Assist;

use App\Assist\Contracts\Feedback;
use App\Models\Feedback as FeedbackModel;

class FeedbackImpl implements Feedback
{

    function newMessages()
    {
        return FeedbackModel::all()->where('status', 0)->count();
    }

    function allMessages()
    {
        return FeedbackModel::all()->count();
    }

}