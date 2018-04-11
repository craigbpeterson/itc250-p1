<?php
//temp_conv1.php

include 'header.php';

if(isset($_POST['submit'])){//show data
    
    //get data
    $input = (float)$_POST['input'];
    $tempFrom = $_POST['tempFrom'];
    $tempTo = $_POST['tempTo'];
    
    /* 
    //calculations were not working, so I started dumping vars
    //all is good now, I believe
    echo '<pre>';
    var_dump($_POST);
    var_dump($input);
    var_dump($tempFrom);
    var_dump($tempTo);
    echo '</pre>';
    */
    
    //perform calculations
    if($tempFrom == 'kelvin'){
        if($tempTo == 'celsius'){
            //turns kelvin to celsius
            $result = ($input - 273.15);
            
        }elseif ($tempTo == 'fahrenheit'){
            //turns kelvin to fahrenheit
            $result = (($input * (9/5)) - 459.67);
            
        }
    }elseif($tempFrom == 'celsius'){
        if($tempTo == 'fahrenheit'){
            //turns celsius to fahrenheit
            $result = (($input * (9/5)) + 32);
            
        }elseif ($tempTo == 'kelvin'){
            //turns celsius to kelvin 
            $result = ($input + 273.15);
        }
    }elseif($tempFrom == 'fahrenheit'){
        if($tempTo == 'kelvin'){
            //turns fahrenheit to kelvin
            $result = (($input + 459.67) + (5/9));
            
        }elseif ($tempTo == 'celsius'){
            //turns fahrenheit to celsius
            $result = (($input - 32) * (5/9));
        }
    }
    
    
    //display results
    echo "Your result is $result $tempTo.";
        
}else{//show form
    echo '
    <form action="" method="post">
        <p>
            <label>
            Enter a temperature:<br />
            <input type="text" name="input" required="required" />
            </label>
        </p>
        <p>
            <label>
            Convert From:</br>
                <select name="tempFrom">
                    <option value="">Select a unit of measure:</option>
                    <option value="celsius">Celsius</option>
                    <option value="fahrenheit">Fahrenheit</option>
                    <option value="kelvin">Kelvin</option>
                </select>
            </label>
        </p>
        <p>
            <label>
            Convert To:</br>
                <select name="tempTo">
                   <option value="">Select a unit of measure:</option>
                   <option value="celsius">Celsius</option>
                   <option value="fahrenheit">Fahrenheit</option>
                   <option value="kelvin">Kelvin</option>
                </select>
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Convert it!" />
        </p>    
    </form>    
    ';
}
