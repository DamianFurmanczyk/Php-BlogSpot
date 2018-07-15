<?php
    function confirm_q($result) {
        if(!$result) {
            die('Database query failed');
        }
    }