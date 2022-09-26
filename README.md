# php_mvc
PHP MVC Framework

# app/config/config.php
Add your DB data
Add Name Site
Add URLROOT like http://localhost/php_mvc/

# public/.htaccess
Replace: RewriteBase /php_mvc/public
with: RewriteBase /YOUR_FOLDER

# EXAMPLE module > controller
#
# app/config/models
<?php
class Post {
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getPosts() {
        $this->db->query("SELECT * FROM posts");
        return $this->db->resultSet();
    }
}
#
# app/controllers/Pages.php
<?php

class Pages extends Controller {

    public function __construct() {
        $this->postModel = $this->model('Post');
    }

    public function index() {
        $posts = $this->postModel->getPosts();

        $data = [
            'title' => 'Welcome',
            'posts' =>  $posts
        ];

        $this->view('pages/index', $data);
    }

    public function about() {
        $data = [
            'title' => 'About Us'
        ];

        $this->view('pages/about', $data);
    }

}
#
# app/views/pages/index.php
<?php require APPROOT . '/views/inc/header.php'; ?>
<h1><?= $data['title']; ?></h1>
<ul>
    <?php foreach ($data['posts'] as $post) { ?>
            <li><?= $post->title; ?></li>
    <?php } ?>
</ul>
<?php require APPROOT . '/views/inc/footer.php'; ?>