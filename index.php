<?php
ini_set("display_errors",'true');
function __autoload($class)
{
    $parts = explode('\\', $class);
    if (count($parts) > 1) {
        unset ($parts[0]);
        $last = count($parts);
        $parts[$last] = join('/', explode('_', $parts[$last]));
        require join("/", $parts).'.php';
    }
}

function box($object, $text)
{
    echo '
    <div>
        <h2>'.get_class($object).'</h2>
        <p>'. $text .'</p>
    </div>';
}

?>
<style>
    * { font-family: sans-serif; color: #333 }
    div, p, h1, h2 { margin: 10px; padding: 0; }
    h1 { font-size: 1.5em; }
    h2 { font-size: 1em; }
    div { border: 1px solid #ccc; }
</style>

<h1>Examples of classes use</h1>

<?php

$odds = new Futilities\Numbers\Odds();
box($odds, "You rolled {$odds->roll} and the rarity is {$odds->rarity} \n");
$odds = new Futilities\Numbers\Odds_Thousand();
box($odds, "You rolled {$odds->roll} and the rarity is {$odds->rarity} \n");


$date = new DateTime();
$moment = new Futilities\Gameplay\Environment($date);
box($moment, $moment->weather. ' '. $moment->season. ' '. $moment->period);
?>

