<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
?>

<!-- menu -->

<div id="menu" class="sans">


<?
// hard-coded ids
$id_root = 16;
$ids_to_nav = [17,24,25,26];

foreach ($ids_to_nav as $id_nav) {

    // update $nav for next menu cluster

    $ids_nav = [$id_root, $id_nav];
    $nav = $oo->nav($ids_nav, $id_nav);

    // output html

    ?><ul class="menu-column"><?
        $prevd = $nav[0]['depth'];                
        foreach($nav as $n) {
            $d = $n['depth'];
                ?><li><?
                    ?><a href="<? echo $n['url']; ?>" class="menu-item"><? echo $n['o']['name1']; ?></a>
                </li><?
            $prevd = $d;
        }
    ?></ul><?
}
?></div>


