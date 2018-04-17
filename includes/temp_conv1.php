<?php
//temp_conv1.php

if(isset($_POST['submit'])){//show data
    
    //get data
    $input = $_POST['input'];
    $tempFrom = $_POST['tempFrom'];
    $tempTo = $_POST['tempTo'];
    $result = 0;
    
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
    
    
    //checks if $input can be converted
        if (is_numeric($input)) {
        //perform calculations if kelvin
        if ($tempFrom == 'kelvin') {

            if ($tempTo == 'celsius') {
                //turns kelvin to celsius
                $result = ($input - 273.15);
                $tempTo='&deg;C';
                
            } elseif ($tempTo == 'fahrenheit') {
                //turns kelvin to fahrenheit
                $result = (($input * (9/5)) - 459.67);
                $tempTo='&deg;F';
            } else {
                //no conversion
                $result=$input;
                $tempTo='K';
            }
            $tempFrom='K';   
        //perform calculations if celsius
        } elseif ($tempFrom == 'celsius') {

            if ($tempTo == 'fahrenheit') {
                //turns celsius to fahrenheit
                $result = (($input * (9/5)) + 32);
                $tempTo='&deg;F';
                
            } elseif ($tempTo == 'kelvin') {
                //turns celsius to kelvin 
                $result = ($input + 273.15);
                $tempTo='K';
            } else {
                //no conversion
                $result=$input;
                $tempTo='&deg;C';
            }
            $tempFrom='&deg;C';
        //perform calculations if fahrenheit
        } elseif ($tempFrom == 'fahrenheit') {

            if ($tempTo == 'kelvin') {
                //turns fahrenheit to kelvin
                $result = (($input + 459.67) + (5/9));
                $tempTo='K';
                
            } elseif ($tempTo == 'celsius') {
                //turns fahrenheit to celsius
                $result = (($input - 32) * (5/9));
                $tempTo='&deg;C';
                
            } else {
                //no conversion
                $result=$input;
                $tempTo='&deg;F';
            }
            $tempFrom='&deg;F';
        }
        
        //Rounds results
        $input = round($input,2);
        $result = round($result,2);
        
//RESULT OUTPUT AND DO IT AGAIN
            echo '<p class="result">' . $input . $tempFrom . ' turns into ' . $result . $tempTo . '</p>';
            echo '<form action="" method "post">
                        <input type="submit" name="submit" value="Do it again!" />
                  </form>
            ';
            
        } else {
        
            //tells you you messed up
            echo '<p class="wrong"> Invalid input. Please use numeric values. </p> ';
            echo '<form action="" method "post">
                        <input class="again" type="submit" name="submit" value="Try again!" />
                  </form>
            ';
        }
        
    } else {//show form
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
                    <select name="tempFrom" required>
                        <option value="" selected disabled hidden>Select a unit of measure:</option>
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
                       <option value="" selected disabled hidden>Select a unit of measure:</option>
                       <option value="celsius">Celsius</option>
                       <option value="fahrenheit">Fahrenheit</option>
                       <option value="kelvin">Kelvin</option>
                    </select>
                </label>
            </p>
            <br />
                <input type="submit" name="submit" value="Convert it!" />
        </form>    
        ';
    }
