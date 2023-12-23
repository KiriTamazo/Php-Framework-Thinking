<?php

require 'vendor/autoload.php';
require 'core/bootstrap.php';
Router::load('routes.php')->direct(Request::uri(), $_SERVER['REQUEST_METHOD']);


die();
class Post
{
    public $title;
    public $isPublish;
    public function __construct($title, $isPublish)
    {
        $this->title = $title;
        $this->isPublish = $isPublish;
    }
}

$posts = [
    new Post('first Post', true),
    new Post('second Post', false),
    new Post('third Post', true),
    new Post('fourth Post', false),
];

$unpublish = array_filter($posts, function ($post) {
    return  !$post->isPublish;
});
$publish = array_filter($posts, function ($post) {
    return  $post->isPublish;
});
$title = array_map(function ($post) {
    return $post->title;
}, $posts);
