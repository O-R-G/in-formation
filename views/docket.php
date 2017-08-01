<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
            
/*
echo "----";
print_r($uu);
print_r($oo);
print_r($uu->id);
*/
?>

<div id="docket"><?

        // build selectors

        $root = 15;     // docket id
        $category = array();
        $children = $oo->children($root);
        $roots = $oo->children_ids($root);
        $count = 0;
        foreach($children as $child) {
            $name =  $child["name1"];
            $url = $child["url"];
            if ($count == 0) $color = "red";
            if ($count == 1) $color = "green";
            if ($count == 2) $color = "blue";
            if ($count == 3) $color = "white";
            $html = "<div class='sub'><a href='" . $url . "' class='" . $color . "'>" . $name . "</a></div>"; 
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
                    if ($count == 3) $color = "white";        
                    echo $category[$count];

                    foreach($children as $child) {
                        $date_time =  $child["begin"];
                        $date = date('d/m', strtotime($date_time));
                        // $location = $child["notes"];
                        $time = date('h:i A', strtotime($date_time));
                        $title = $child["name1"];
                        $description = $child["deck"];    
                        $url = $child["url"];
                        $media = $oo->media($child["id"]);

                        // only show if within date range
                        // better done w/ sql but trouble with $uu, etc.

                        $date_this = new DateTime($date_time);
                        $date_display_begin = new DateTime('2017-06-30');
                        $date_display_end = new DateTime('2017-08-06');
                        $date_in_range = (($date_this > $date_display_begin) && ($date_this < $date_display_end));
                        
                        if ($date_in_range) {

                            ?><p class="item <? echo $color; ?>"><?
                                ?><span class="date mono"><? echo $date; ?></span><?
                                ?><!-- <span class="location"><? echo $location; ?></span> --><?
                                ?><span class="time mono"><? echo $time; ?></span><?
                                ?><span class="title sans"><a href="<? echo "shows/" . $url; ?>"><? echo $title; ?></a></span><?
                                ?><span class="description sans"><? echo $description; ?></span><?
                            ?></p><?
                
                            if (($media) && ($media[0][type] == 'gif')) {
                                    ?><div class='img-container'><img src="<? echo m_url($media[0]);?>" class="fullscreen"></div><?
                                if ($m[caption]) {
                                    ?><div class='caption'><? echo $m[caption]; ?></div><?
                                }
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
<script src="/static/js/screenfull.js"></script>
<script>
    var imgs = document.getElementsByClassName('fullscreen');
    var i;
    var index;
    for (i = 0; i < imgs.length; i++) {
        imgs[i].addEventListener('click', function () {
            if (screenfull.enabled) {
                screenfull.toggle(this);
            }
            index = i;
            console.log(index);
        }, false);
    }
</script>

<!-- from serverdial.php 
<script>
    // (...) is a self-invoking function
    ( function () {
        init();
        initMessage("status-source","status-display",true,40);
    } )();
</script>
-->
