<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
?>

<div id="docket">

    <p class="sub"><?

        // selector

        $root = 0;
        $children = $oo->children($root);
        $roots = $oo->children_ids($root);
        $count = 0;
        foreach($children as $child) {
            $name =  $child["name1"];
            $url = $child["url"];
            if ($count == 0) $class = "red";
            if ($count == 1) $class = "green";
            if ($count == 2) $class = "blue";
            ?><a href="<? echo $url; ?>" class="<? echo $class; ?>"><? echo $name; ?></a> <?
            $count++;
        }
            
        $count = 0;
    ?></p>
    
    <!-- cube -->

    <div id="camera">
        <div id="cube"><?
                
            foreach($roots as $root) {
    
                ?><div class="face f<? echo $count+1; ?> docket-items"><?

                    $children = $oo->children($root);
                    if ($count == 0) $class = "red";
                    if ($count == 1) $class = "green";
                    if ($count == 2) $class = "blue";

                    foreach($children as $child) {
                        $date =  $child["begin"];
                        $location = $child["notes"];
                        $title = $child["name1"];
                        $description = $child["deck"];
                        $url = $child["url"];

                        ?><p class="item"><?
                            ?><span class="date"><? echo $date; ?></span><?
                            ?><span class="location"><? echo $location; ?></span><?
                            ?><span class="title"><a href="<? echo "shows/" . $url; ?>" class="<? echo $class; ?>"><? echo $title; ?></a></span><?
                            ?><span class="description"><? echo $description; ?></span><?
                        ?></p><?
                    }
                    $count++;
                ?></div><?
            }
        ?></div>
    </div>

</div>
    
<div id="controls">
    <button id="control">
        rotate
    </div>
</div>


<!-- work out best practice for this ... add doument onload? init()? self-invoking function? -->
    
<script src="static/js/cube.js"></script>

<!-- from serverdial.php 
<script>
    // (...) is a self-invoking function
    ( function () {
        init();
        initMessage("status-source","status-display",true,40);
    } )();
</script>
-->
