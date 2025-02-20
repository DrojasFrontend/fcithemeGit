<?php
    $redes = redesSocialesDisponibles(2);
    $redes_prnt = array();
    foreach($redes as $key => $red):
        $campo = get_option($key);
        $red_social = explode('-', $red);
        $name_red = (isset($red_social[1])) ? $red_social[1] : '';
        if($campo != ""):
            $redes_prnt[] = '
                <li><a href="'.$campo.'" target="_blank" aria-label="Red social ' . $name_red . '" title="' . $name_red . '"><i class="'.$red.'"></i></a></li>
            ';
        endif;
    endforeach;
    if(count($redes_prnt) > 0):
        echo "
        <ul>";
        foreach($redes_prnt as $red):
            echo $red;
        endforeach;
        echo "
        </ul>
        ";
    endif;
?>