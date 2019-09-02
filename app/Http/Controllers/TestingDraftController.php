<?php

namespace App\Http\Controllers;


class TestingDraftController extends Controller
{

    public function testing_draft()
    {

        return view('pages.Testing_Draft', [

            'id' => 'test',
            'type' => 'test',

            'prevLink' => '#',
            'nextLink' => '#',
            'prevDescription' => 'Предидущей страницы в этой рубрике нет',
            'nextDescription' => 'Следующей страницы в этой рубрике нет',
            'headers' => $this->getTestingHeaders(),
            'path' => ['Главная' => '/', 'О проекте PS' => 'about']
        ]);
    }


    public function getTestingHeaders()
    {
        return [
            'pageTitle' => 'Testing Admin Page | Proger Skill',
            'url' => 'testing_draft_admin',
            'title' => 'Testing Draft Page',
            'description' => 'Тестовая страница для отработки html верстки',
            'image' => '/img/def/def.jpg'
        ];
    }

}