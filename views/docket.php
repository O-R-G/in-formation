<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
?>

<div id="docket"><?

        // build selectors

        $root = 0;
        $category = array();
        $children = $oo->children($root);
        $roots = $oo->children_ids($root);
        $count = 0;
        foreach($children as $child) {
            $name =  $child["name1"];
            $url = $child["url"];
            if ($count == 0) $class = "red";
            if ($count == 1) $class = "green";
            if ($count == 2) $class = "blue";
            $html = "<div class='sub'><a href='" . $url . "' class='" . $class . "'>" . $name . "</a></div>"; 
            array_push($category, $html);
            $count++;
        }
        $count = 0;

    ?><!-- cube -->

    <div id="viewport">
        <div id="cube"><?
                
            foreach($roots as $root) {
    
                ?><div class="face f<? echo $count+1; ?> docket-items"><?

                    $children = $oo->children($root);
                    if ($count == 0) $class = "red";
                    if ($count == 1) $class = "green";
                    if ($count == 2) $class = "blue";        
                    echo $category[$count];

                    foreach($children as $child) {
                        $date =  $child["begin"];
                        $location = $child["notes"];
                        $title = $child["name1"];
                        $description = $child["deck"];
                        $url = $child["url"];

                        ?><p class="item"><?
                            $date = date('l d/m', strtotime($date) );  
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
   
<!-- 
<div id="controls">
    <button id="control">
        rotate
    </div>
</div>
-->

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
