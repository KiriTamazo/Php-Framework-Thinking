<?php

namespace controllers;

use core\App;


class PagesController
{
    public function index()
    {
        $users = App::get('database')->selectAll('users');
        view('index', [
            'users' => $users
        ]);
    }
    public function about()
    {
        view('about');
    }
    public function contact()
    {
        view('contact');
    }
    public function order()
    {
        view('order');
    }
    public function customer()
    {
        view('customer');
    }
    public function createUser()
    {
        App::get('database')->insert([
            'name' => request('name'),
            'email' => 'ab@gmail.com'
        ], 'users');
        // App::get('database')->update([
        //     'name' => request('name'),
        //     'email' => 'kyaw@gmail.com',
        // ], 'users', 23);
        // App::get('database')->delete('users', 'id', '2');
        redirect('/');
    }
}
