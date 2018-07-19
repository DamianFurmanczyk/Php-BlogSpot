<?php
    $m_db_q_fail = 'Database query failed';

    function confirm_q($result) {
        if(!$result) {
            die('Database query failed');
        }
    }

    function flash($message, $message_type, $path) {
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $message_type;
        header('location: ' . $path . '');
        exit();
    }

    function login($username, $password, $private) {
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['private'] = $private;
    }

    function user_exists($username) {
        $query = mysqli_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username'");
    }

    function render_posts($db, $user = false) {
        
        if($user) {

        } else {
            $query = 'Select * from posts order by date_added';
            $posts_results = mysqli_query($db, $query) or die('Database query failed');

            

            while($post = mysqli_fetch_assoc($posts_results)) {
                print('
                <div class="card">
                <span class="card-header text-right font-weight-light">'.$post['date_added'].'</span>
                <div class="card-body">
                    <h4 class="card-title">'.$post['title'].'</h4>
                    <p class="card-text">'.$post['contents'].'</p>
                    <a href="#" data-post-id='.$post['id'].' class="btn btn-primary">Like
                        <span class="fa fa-thumbs-up"></span>
                    </a>
                </div>
                </div>
                ');
            }
        }
    }