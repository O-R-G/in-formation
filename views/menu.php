<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
?>

<?
$nav = $oo->nav($uu->ids);
?>

<!-- menu -->

<div id="menu" class="sans">
    <ul class="menu-column"><?
        $prevd = $nav[0]['depth'];                
        foreach($nav as $n) {    
            $d = $n['depth'];
            if($d > $prevd) {
                ?><ul class="menu-column"><?
            }
                ?><li><?
                    ?><a href="<? echo $n['url']; ?>" class="menu-item"><? echo $n['o']['name1']; ?></a>
                </li><?
            if($d > $prevd) {
                ?></ul><?
            }
            $prevd = $d;
        }
    ?></ul>
</div>



