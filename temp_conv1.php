<?php
//temp_conv1.php

include 'header.php';

if(isset($_POST['submit'])){//show data
    
    //get data
    
    
    //perform calculations
    
    
    //display results
    echo '
    
    
    ';
        
}else{//show form
    echo '
    <form action="" method="post">
        <p>
            <label>
            Enter a temperature:<br />
            <input type="text" name="" required="required" />
            </label>
        </p>
        
        <p>
            <input type="submit" name="submit" value="Convert it!" />
        </p>    
    </form>    
    ';
}
