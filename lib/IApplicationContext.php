<?php
    interface IApplicationContext
    {
        public function GetCurrentUser();
        public function GetSession();
        public function GetFactory();
    }
?>