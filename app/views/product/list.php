<!--<p><h1><?php echo $title; ?></h1></p>
<p><?php foreach($vars as $element){
    echo $element;
    };
    ?></p>-->
<p><h1><?php echo $title; ?></h1></p>
<p><?php foreach($vars as $firstArr){
        foreach($firstArr as $secondArr){
            foreach($secondArr as $thirdArr){
                echo $thirdArr."<br/>";
            }
        }
    };
    ?></p>