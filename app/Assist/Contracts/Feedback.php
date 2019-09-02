<?php

namespace App\Assist\Contracts;


interface Feedback
{
    function allMessages();
    function newMessages();
}