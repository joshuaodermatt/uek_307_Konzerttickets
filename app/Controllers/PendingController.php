<?php
    class PendingController {
        public function show() {
            $pdo = db();

            require './app/Views/pending.view.php';
        }
    }