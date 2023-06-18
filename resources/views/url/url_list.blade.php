<?php
/** Колл url в условной группе на отрисовку */
$countUrlInGroup = 3;
/** Колл символов отборажаемое после имени хоста */
$count_symbols = 1;

?>

<ul class="list-group">
    @for($i=0; count($urls) > $i; $i++)

       <?php
            /** Получаем имя хоста из url */
            preg_match('~^\w*://\w*~',$urls[$i], $host);
            if(empty($host)) continue;
            $host = array_shift($host) . '/';

            /** Общая длина строки котроую нужно отобразить на каждой итерации */
            $url_length = mb_strlen($host) + $count_symbols;
        ?>
        @if(($i+1) % $countUrlInGroup)
            <li class="list-group-item" >{{ mb_substr($urls[$i], 0, $url_length) }}</li>
        @else

            <li class="list-group-item" >{{ mb_substr($urls[$i], 0, $url_length) }}</li>
            <?php $count_symbols++; ?>
        @endif
    @endfor
</ul>

