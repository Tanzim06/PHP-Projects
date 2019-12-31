<?php
class ec_Format{
    public function formatDate($date){
        return date('F j, Y, g:i a', strtotime($date)); // What is 'F j, Y, g:i a'?????
    }
    public function TextShorting($bodytext, $limit= 200){// here we are catching text content from "Index.php/line: 27" by "$bodytext" variable and declearing another variable called limit assigning with 200 for future work
        $bodytext= $bodytext." ";// here we are concatenating a " "(space) with bodytext content
        $bodytext= substr($bodytext, 0,  $limit);// "substr()" is a function that break any text within a limit from starting position
        $bodytext= substr($bodytext, 0,  strrpos($bodytext, " "));//"strrpos()" is a function that helps "substring()" to break a string based on a parameter like " "(space)
        $bodytext= $bodytext."....";// here we are concatenating dots with body text
        return $bodytext;// hrere we are returning bodytext content to the front end
    }
    public function validation($data){ //this function is made for checking and clearing the input data of "login.php" page from some unexpected characters. the input of "login.php" page is being cached here by "$data"
        $data= trim($data);// ""trim()" functioin is used for unexpected " "(blank speces) from the input data
        $data= stripcslashes($data);//"stripcslashes()" is used for erese unexpected "/" from the input data
        $data= htmlspecialchars($data);//"htmlspecialchars()" is used for converting "<>" to special characters like #@ etc.
        return $data;// here after all kind of checking and clearing the data is being returned to "login.php/ line 35, 36"
    }
    public function title(){
        $path=$_SERVER['SCRIPT_FILENAME']; //this is a keyword. It's catching the webpage's path from the url box of the browzer.
        $title= basename($path,".php");// "basename()" is a function. it is ereaseing the format part of the page's name.
        $title= str_replace('_', ' ', $title);// "str_replace()" is a function that is replaceing underscore "_" by a blankspace " " from the middle of the website title
        if($title=='index'){
            $title='home';
        }elseif($title=='contact'){
            $title='contact';
        }
        return $title= ucwords($title);// "ucwords()" is a function that converts the first letter of every words from lowercase to uppercase
    }
}
