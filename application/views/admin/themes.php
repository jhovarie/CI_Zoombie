<?php
echo "All themes<hr/>";

foreach($themes as $theme) {
   // echo $value['themes'];
    echo $theme['themes']."<br/>";
    echo "<img src='".$theme['screenshot']."' width='100px' height='100px'/>";
    echo "<br/><br/>";
}