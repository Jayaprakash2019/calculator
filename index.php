<html>
    <head lang="en">
        <title> Calculator </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>

    <?php
        
        $nameErr = "";
        $err1 = "";
        $err2 = "";
        $suberr = "";
        $addi = "";
        $sub = "";
        $multi = "";
        $divi = "";
        
        // $_POST["value1"] = "";
        // $_POST["value2"] = "";

        function test_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
//empty function 
        function inputempty($x){
            $newerr = "";
            if(empty($x)){
                $newerr = "enter valid input";
            }
            return $newerr;
            } 
//empty multiplication function
        function Multiplyempty($e,$f){
            if(empty($e && $f)){
                $nameErr = "enter valid input";
            }
        }
           
// Addition function
        function Addition($a,$b) {
            return intval($a) + intval($b);
                 }
// subtraction function
        function Subtraction($c,$d){
            if($d>$c){
                return "$d is greater than $c";
            }else
            return intval($c) - intval($d);
            }                
// multiplication function
        function Multiply($e,$f){
            return intval($e) * intval($f);
            }
            
//division function
        function Divide($g,$h){
            if($g<$h){
                return "$g is less than $h";
            }else{
                return intval($g) / intval($h);
            }
            }

//process addition
        // function processAddition($value1,$value2){

        // }

        if(isset($_POST["addition"])) {
            $data1 = test_input($_POST["value1"]);
            $data2 = test_input($_POST["value2"]);

            $erra = inputempty($data1);
            $errb = inputempty($data2);

            if($erra == "" || $errb == ""){
                $addi = Addition($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }
            }
        
        if(isset($_POST["subtract"])){
            $data1 = test_input($_POST["value1"]);
            $data2 = test_input($_POST["value2"]); 

            $erra = inputempty($data1);
            $errb = inputempty($data2);

                
            if($erra == "" && $errb == ""){
                $sub = Subtraction($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }
        
        }    

        if(isset($_POST["multiply"])){
            $data1 = test_input($_POST["value1"]);
            $data2 = test_input($_POST["value2"]); 

            $erra = inputempty($data1);
            $errb = inputempty($data2);
            $datax = 1;

            if($erra == "" && $errb == ""){
                $multi = Multiply($data1,$data2);   
            }elseif($erra == "enter valid input" && $errb == ""){
                $err1 = $erra;
            }elseif($erra == "" && $errb == "enter valid input"){
                $data2 = $datax;
                $multi = Multiply($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }
           

        }
        if(isset($_POST["divide"])){
            $data1 = test_input($_POST["value1"]);
            $data2 = test_input($_POST["value2"]); 

            $erra = inputempty($data1);
            $errb = inputempty($data2);
            $datax = 1;

            if($erra == "" && $errb == ""){
                $divi = Divide($data1,$data2);
            }elseif($erra == "enter valid input" && $errb == ""){
                $err1 = $erra;
            }elseif($erra == "" && $errb == "enter valid input"){
                $data2 = $datax;
                $divi = Divide($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }



        }
        if(isset($_POST["all"])){
            $data1 = test_input($_POST["value1"]);
            $data2 = test_input($_POST["value2"]);
            
            
            $erra = inputempty($data1);
            $errb = inputempty($data2);

            if($erra == "" || $errb == ""){
                $addi = Addition($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }

            if($erra == "" && $errb == ""){
                $sub = Subtraction($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }

            if($erra == "" && $errb == ""){
                $multi = Multiply($data1,$data2);   
            }elseif($erra == "enter valid input" && $errb == ""){
                $err1 = $erra;
            }elseif($erra == "" && $errb == "enter valid input"){
                $data2 = 1;
                $multi = Multiply($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }

            if($erra == "" && $errb == ""){
                $divi = Divide($data1,$data2);
            }elseif($erra == "enter valid input" && $errb == ""){
                $err1 = $erra;
            }elseif($erra == "" && $errb == "enter valid input"){
                $data2 = 1;
                $divi = Divide($data1,$data2);
            }else{
                $err1 = $erra;
                $err2 = $errb;
            }            

        }
        
    ?>


        <h2> Calculator </h2>
        <form method = "post" action = "">
            value1 <input type = "text" id="value1" name="value1">
            <span class="error">* <?php echo $err1;  ?></span> <br>

            value2 <input type = "text" id="value2" name="value2">
            <span class="error">* <?php echo $err2;?></span> <br>
            

            <button type = "submit" name="addition"> addition </button>
            <button type = "submit" name="subtract"> subtract </button>
            <button type = "submit" name="multiply"> multiply </button>
            <button type = "submit" name="divide"> divide </button>
            <button type = "submit" name="all"> all </button>
            
        </form>
        <?php
        
        echo  $addi ;
        echo "<br>";
        echo  $sub;
        echo "<br>";
        echo  $multi;
        echo "<br>";
        echo  $divi;
        ?>
    


    </body>

</html>

