<html>

    <head>
        <title>Countries on Earth</title>
    </head>

    <body>

        <h3>Countries on Earth</h3>

        <form action="<?php echo($_SERVER['PHP_SELF']); ?>" method="post">
            Enter Country Name: <input type="text" name="country_name" size="30"/>
            <input type="submit" value="Get Details"/>
        </form>

        <hr/>

        <?php

        // Check for an incoming POST request
        if ($_POST) {

            $countryName = $_POST['country_name'];
            //echo 'The user entered: ' . $countryName."<br>";

            $queryName = urlencode(str_replace(" ", "", $countryName));

            $countriesURL = "https://restcountries.eu/rest/v1/name/".$queryName;

            if (!empty($request = json_decode(file_get_contents($countriesURL)))){



                $languages = $request[0]->languages;
                $langList = '';
                foreach ($languages as $lang){

                    if($langList == ''){

                        $langList = $lang;
                    } else {             

                        $langList = $langList.", ".$lang;
                    }
                }

            
            
                echo "<p>Country Name: ".$request[0]->name."</p>";
                echo "<p>Capital: ".$request[0]->capital."</p>";
                echo "<p>Region: ".$request[0]->region."</p>";
                echo "<p>Population: ".number_format($request[0]->population)."</p>";
                echo "<p>Languages: ".$langList;

           } else {

                echo "<p>No country matches that name. Please try again.</p>";
           }
        }
        ?>

    </body>

</html>