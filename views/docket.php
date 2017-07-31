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
                    if ($count == 0) $color = "red";
                    if ($count == 1) $color = "green";
                    if ($count == 2) $color = "blue";        
                    echo $category[$count];

                    foreach($children as $child) {
                        $date =  $child["begin"];
                        $location = $child["notes"];
                        $title = $child["name1"];
                        $description = $child["deck"];    
                        $url = $child["url"];
                        $media = $oo->media($child["id"]);

                        ?><p class="item"><?
                            // $date = date('l d/m', strtotime($date) );
                            $date = date('d/m h:i A', strtotime($date) );
                            ?><span class="date mono <? echo $color; ?>"><? echo $date; ?></span><?
                            ?><span class="location"><? echo $location; ?></span><?
                            ?><span class="title"><a href="<? echo "shows/" . $url; ?>" class="<? echo $color; ?>"><? echo $title; ?></a></span><?
                            ?><span class="description"><? echo $description; ?></span><?
                        ?></p><?
            
                        if (($media) && ($media[0][type] == 'gif')) {
                                ?><div class='img-container'><img src="<? echo m_url($media[0]);?>" class="fullscreen"></div><?
                            if ($m[caption]) {
                                ?><div class='caption'><? echo $m[caption]; ?></div><?
                            }
                        }
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
