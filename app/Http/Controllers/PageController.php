<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Models\Part;

class PageController extends Controller
{
    public function index() {
        return view('index', [
            'headers' => $this->getIndexHeaders(),
        ]);
    }

    public function sitemap() {
        // Prev-Next Links function
        $item = Part::all()->where('alias', 'sitemap')->first();
        $parts = Part::all()->where('status', 1)->sortBy('sort_order');
        $prev = null;
        $next = null;
        $found = false;
        foreach ($parts as $p) {
            if($found) {
                $next = $p;
                break;
            }
            if ($p->alias == 'sitemap') {
                $found = true;
            } else {
                $prev = $p;
            }
        }
        // Prev-Next Links function
        return view('pages.sitemap', [
            'id' => $item->id,
            'type' => 'part',
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'headers' => $this->getSitemapHeaders($item),
            'item' => $item,
            'path' => ['Главная' => '', 'Карта сайта PS' => 'sitemap']
        ]);
    }

    public function about() {
        // Prev-Next Links function
        $parts = Part::all()->where('status', 1)->sortBy('sort_order');
        $item = Part::all()->where('alias', 'about')->first();
        $prev = null;
        $next = null;
        $found = false;
        foreach ($parts as $p) {
            if($found) {
                $next = $p;
                break;
            }
            if ($p->alias == 'about') {
                $found = true;
            } else {
                $prev = $p;
            }
        }
        // Prev-Next Links function
        return view('pages.about', [
            'id' => $item->id,
            'type' => 'part',
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'headers' => $this->getAboutHeaders(),
            'path' => ['Главная' => '', 'О проекте PS' => 'about']
        ]);
    }

    public function contacts(){
        return $this->contactsForm();
    }

    private function contactsForm($is_sent = false) {
        $sent = $is_sent;
        // Prev-Next Links function
        $parts = Part::all()->where('status', 1)->sortBy('sort_order');
        $item = Part::all()->where('alias', 'about')->first();
        $prev = null;
        $next = null;
        $found = false;
        foreach ($parts as $p){
            if($found) {
                $next = $p;
                break;
            }
            if ($p->alias == 'contacts') {
                $found = true;
            } else {
                $prev = $p;
            }
        }
        // Prev-Next Links function
        return view('pages.contacts', [
            'id' => $item->id,
            'type' => 'part',
            'prevLink' => ($prev ? $prev->alias : '#'),
            'nextLink' => ($next ? $next->alias : '#'),
            'prevDescription' => ($prev ? 'Предыдущая страница: ' . $prev->name : 'Предидущей страницы в этой рубрике нет'),
            'nextDescription' => ($next ? 'Следующая страница: ' . $next->name : 'Следующей страницы в этой рубрике нет'),
            'isSent' => $sent,
            'headers' => $this->getContactHeaders(),
            'path' => ['Главная' => '', 'Контакты проекта PS' => 'contacts']
        ]);
    }

    public function feedback(Request $request) {
        $this->validate($request, [
            'captcha' => 'required|in:5',
            'name' => 'required|min:2|max:100',
            'email' => 'email',
            'text' => 'required|min:3|max:510',
        ]);
        $data = $request->except('_token');
        $feedback = new Feedback();
        $feedback->fill($data);
        $feedback->save();
        return $this->contactsForm(true);
    }

    /**
     *  ______ Get Headers on Pages _______
     */

    public function getIndexHeaders() {
        return [
            'pageTitle' => 'Proger Skill | Навык программиста',
            'url' => '/',
            'title' => 'Proger Skill | Навык программиста',
            'description' => 'Бесплатный курс программирования на примере языка Java, цель которого дать крепкую базу знаний для начинающего программиста, и главные навыки программиста',
            'image' => '/img/def/def.jpg'
        ];
    }

    public function getSitemapHeaders($item) {
        return [
            'pageTitle' => 'Карта сайта PS, Курса программирования | Proger Skill',
            'url' => $item ? $item->alias : 'sitemap',
            'title' => $item ? $item->name : 'Карта сайта PS, Структура курса IT',
            'description' => $item ? $item->description : 'Карта ссылок сайта Proger Skill, для наглядного обзора данного самоучителя. Для более удобного обучения это пособие по программированию разбито на участки разных уровней в три ступени: Часть (язык программирования) / Категория (уровень) сложности / Рубрика / Уроки',
            'image' => $item ? $item->image : '/img/def/def.jpg'
        ];
    }

    public function getAboutHeaders() {
        return [
            'pageTitle' => 'О проекте PS | Proger Skill',
            'url' => 'about',
            'title' => 'О проекте PS',
            'description' => 'Это образовательный проект о программировании, цель которого рассказать простыми словами о сложном. Пусть курс очередной, но далеко не самый заурядный, тут есть много полезных советов, а главное правильный путь изучения программирования на примере языка Java',
            'image' => '/img/def/def.jpg'
        ];
    }

    public function getContactHeaders() {
        return [
            'pageTitle' => 'Контакты проекта PS | Proger Skill',
            'url' => 'contacts',
            'title' => 'Связь с проектом PS',
            'description' =>
                'Образовательный проект о программировании Proger Skill. По вопросам к администрации Вы можете связаться посредством формы, указав Ваш контактный Email',
            'image' => '/img/def/def.jpg'
        ];
    }


    /**
     *  _____ Old Home Headers ______ (25.12.18)
     */
    public function getMainHeaders() {
        return [
            'pageTitle' => 'Proger Skill | Навык программиста | Бесплатные курсы IT, языка Java и программирования | Proger Skill',
            'url' => '/',
            'title' => 'Main title',
            'description' => 'Это образовательный проект о программировании, цель которого рассказать простыми словами о сложном. Пусть курс очередной, но далеко не самый заурядный, тут есть много полезных советов, а главное правильный путь изучения программирования на примере языка Java',
            'image' => ''
        ];
    }

}





















