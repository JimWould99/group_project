<?php

class User {

    private $username;
    private $email;
    private $files = [];
    private $profilePicture;
    
    private function __contsruct($username, $email) {
        $this->$username = $username;
        $this->$email = $email;

    }

    public function getUsername() {
        return $this->$username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function addProfilePicture($profilePicture) {
        $this->$profilePicture = $profilePicture;
    }

    public function getProfilePicture() {
        return $this->$profilePicture;
    }

    public function addFile($file) {
        array_push($this->files, $file);
    }

    public function getFiles() {
        return $this->$files;
    }
}



?>