    <form method="post" action="../../index.php?action=can">
        <?php
            echo '<table>';
                for ($i = 0; $i < 4; $i++ ){
                    echo '<tr>';
                    for ($j = 0; $j < 4; $j++){
                        
                        echo '<td>'.$_POST[$i.'-'.$j].'</td>';
                    }
                    echo '</tr>';
                }
            echo '</table>';
        ?>
        <input type="submit" value="Save" class="btn">
    </form>

<?php

echo $_POST['test'];
echo $_POST['0-0'];

?>
