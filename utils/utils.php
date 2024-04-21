<?php

    use MongoDB\BSON\ObjectId;
    $cwd = '';
    //redirect to given url and stop current php
    //to go to homepage use redirect('');

    function redirectHome(){ #looks the function below but i'll keep it for now as I don't want to mess with it
        header("Location: landingpage.php"); # redirects user back to homepage
        exit(); # stops the page as it should only exist for each research page
    }


    function redirect($url)
    {
        //TODO: add base header for the website to append to
        //e.g.
        header('Location: ' . $cwd . $url);
        exit();
    }

    function pathRoot() {
        echo $cwd;
    }

    function redirectLandingPage() {
        redirect('landingpage.php');
    }

    function getId(){// this function tries to get the id from GET, and either returns the ID, or FALSE if it doesn't exist in GET, or returns to the homepage if the pageid isn't valid
        
        if(isset($_GET["_id"])){ # If the page has been accessed with an ID then it is a valid page and you can continue
            try {
                $_id = new ObjectId($_GET["_id"]); #Bug currently exists where if there is an id from GET but it's invalid page crashes, i have "fixed it by using this try/catch solution
            } catch(Exception $e){
                redirectHome();
            }
            return $_id;
        } else {
            return FALSE;
        }
    }

    $_SESSION['ROOT'] = $cwd;

?>