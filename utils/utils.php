<?php
	$path = $_SERVER['DOCUMENT_ROOT']."/real_group_project/";	

    include($path.'/templates/landingpagetemplate.php');
    include($path.'/templates/approvecardtemplate.php');
    use MongoDB\Model\BSONArray;
    use MongoDB\BSON\ObjectId;


    //redirect to given url and stop current php
    //to go to homepage use redirect('');

    function redirectHome(){ // same function as redirect landing page but exits() preventing further code executive, could probably refactor for consistency but not necessary
        header("Location: landingpage.php"); 
    }

    function redirect($url)
    {
        //TODO: add base header for the website to append to
        //e.g.
        header('Location: ' . $url);
        exit();
    }

    function pathRoot() {
        $cwd = 'localhost/ResearchConnect';
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

function getROOT() {
    return 'http://localhost/real_group_project/';
}
//redirect to given url and stop current php
//to go to homepage use redirect('');


function genLink($URI) {
    echo getROOT() . $URI;
}

// CHECK TOMORROW THINK THIS IS A DEAD FUNCTION???
function redirectProfilePage() {
    redirect('pages/profilepage.php');
}


?>