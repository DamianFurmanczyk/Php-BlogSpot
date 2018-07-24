<?php
    $m_db_q_fail = 'Database query failed';

    function confirm_q($result) {
        if(!$result) {
            die('Database query failed');
        }
    }

    function display_message($message, $message_type) {
        print('
          <div id="notification" class="text-center mb-3 col-sm-12 col-md-6 offset-md-3 alert alert-'. $message_type .'" role="alert">
            <strong>' . $message . '</strong>
          </div>');
    }

    function flash($message, $message_type, $path = false) {
        $_SESSION['message'] = $message;
        $_SESSION['message_type'] = $message_type;
        if($path) {
            header('location: ' . $path);
            exit();
        } 
    }

    function login($id, $username, $password, $private) {
        $_SESSION['id'] = $id;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['private'] = $private;
    }

    function user_exists($username) {
        $query = mysqli_query("SELECT COUNT(`id`) FROM `users` WHERE `username` = '$username'");
    }

    function render_posts($db, $user_id = false, $rm_privilage = false) {

            $query = $user_id ? "SELECT * FROM posts WHERE `user_id` = $user_id ORDER BY date_added" : "SELECT * FROM posts ORDER BY date_added";
            $posts_results = mysqli_query($db, $query) or die('Database query failed');

            if($posts_results->num_rows < 1) {
                echo 'Brak postów';
                return;
            }

            while($post = mysqli_fetch_assoc($posts_results)) {

                $user_id = $post['user_id'];
                $sql = "SELECT username FROM users WHERE `id` = '$user_id'";
                $result = $db->query($sql);
                $username = $result->fetch_assoc()['username'];
                $rm_icon = $rm_privilage ? '<span class="text-danger fa fa-minus-circle" data-post-id="'.$post['id'].'"></span>' : '';

                
                print('
                <div class="card mb-5">
                    <h4 class="card-header font-weight-light">
                        '.$rm_icon.'
                        <span>Autor: 
                            <a href="../public_html/user.php?id='.$user_id.'">'.$username.'</a>
                        </span>
                        <span class="pull-right"> '.$post['date_added'].' </span>
                    </h4>
                    <div class="card-body">
                        <h4 class="card-title">'.$post['title'].'</h4>
                        <p class="card-text">'.$post['contents'].'</p>
                    </div>
                </div>
                ');
        }
    }