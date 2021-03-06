<?
use \Michelf\Markdown;

$o = $oo->get($uu->id);
$body = Markdown::defaultTransform($o["body"]);
$media = $oo->media($uu->id);
foreach ($uri as $url_part) {           
    if ($url_part == 'exhibitions')
        $show = 0;
    else if ($url_part == 'live')
        $show = 1;
    else if ($url_part == 'films') 
        $show = 2;
    else if ($url_part == 'feed')
        $show = 3;
}
if ($show === null)
    $showall = true;
?>

<!-- docket -->

<div id="docket">
    <div id="viewport"><?
    
        // 0. build category
    
        $category = array();
        $category_name = array();
    
        $root = 15;     // docket id
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
            $href = (!$showall) ? '/now' : '/now/' . $url;
            $html = "<div class='sub sans'><a href='" . $href . "' class='" . $color . "'>" . $name . "</a></div>"; 
            array_push($category, $html);
            array_push($category_name, $name);
            $count++;
        }
        $count = 0;
    
        // 1. build children_combined
    
        $children_combined = array();
    
        foreach($roots as $root) {
            $children = $oo->children($root);
            if ($count == 0) $color = "red";
            if ($count == 1) $color = "green";
            if ($count == 2) $color = "blue";
            if ($count == 3) $color = "white";
            foreach($children as $child) {
                $child['color'] = $color;
                array_push($children_combined, $child);
            }
            $count++;
        }
        $count = 0;
    
        // 2. display child
    
        function display_child($oo, $child, $color, $ladder, $showall, $category_name) {
            $date_time =  $child["begin"];
            $date = date('d/m', strtotime($date_time));
            $time = date('h:i A', strtotime($date_time));
            $location = $child["notes"];
            $title = $child["name1"];
            $description = $child["deck"];    
            $url = $child["url"];
            $media = $oo->media($child["id"]);
            if ($ladder) $color = $child['color'];
            // $href = (!$showall) ? '/now/' . $category_name . '/' . $url : '/now/' . $url;
            $href = '/now/' . $category_name . '/' . $url;

            $date_this = new DateTime($date_time);
            $date_display_begin = new DateTime('2017-07-15');
            $date_display_end = new DateTime('2017-08-08');
            $date_in_range = (($date_this > $date_display_begin) && ($date_this < $date_display_end));
            
            if ($date_in_range) {
                ?><p class="item <? echo $color; ?>"><?
                    ?><span class="date"><? echo $date; ?></span><?
                    ?><span class="time"><? echo $time; ?></span><?
                    ?><span class="title"><a href="<? echo $href; ?>"><? echo $title; ?></a></span><?
                    ?><span class="description"><? echo $description; ?></span><?
                ?></p><?
    
                if (($media) && ($media[0][type] == 'gif')) {
                    ?><div class='img-container'><img src="<? echo m_url($media[0]);?>" class="fullscreen"></div><?
                    if ($m[caption]) {
                        ?><div class='caption'><? echo $m[caption]; ?></div><?
                    }
                }
            }
            return true;
        }
    
        // 3. compare by date for sorting
    
        function date_compare($a, $b) {
            $t1 = strtotime($a['begin']);
            $t2 = strtotime($b['begin']);
            return $t1 - $t2;
            // return $t2 - $t1;
        }

        // 4. display

        ?><!-- ladder -->

        <div id="ladder"><?
            ?><div class="face f1"><?

                $ladder = true;    
                usort($children_combined, 'date_compare');
                foreach($children_combined as $child) {
                    display_child($oo, $child, $color, $ladder, $showall, $category_name[$count]);
                }

            ?></div><?
        ?></div><?

        ?><!-- cube -->

        <div id="cube"><?

            foreach($roots as $root) {

                ?><div class="face f<? echo $count+1; ?>"><?

                    $children = $oo->children($root);
                    if ($count == 0) $color = "red";
                    if ($count == 1) $color = "green";
                    if ($count == 2) $color = "blue";        
                    if ($count == 3) $color = "white";        
                    echo $category[$count];

                    $ladder = false;
                    usort($children, 'date_compare');
                    if (($count == $show) || ($showall)) {
                        foreach($children as $child) {
                            display_child($oo, $child, $color, $ladder, $showall, $category_name[$count]);
                        }
                    }
                    $count++;
                ?></div><?
            }
        ?></div>

        <!-- detail --><?

        if (!$showall) {

            ?><script>
                $innerhtml = "<a href='/now/'><? echo ucfirst($category_name[$show]); ?></a>";
                document.getElementById('in-formation').innerHTML = $innerhtml;
            </script>

            <div id="detail" class="sans"><?

                echo nl2br($o['body']);    

            ?></div>

            <div id="detail" class="sans"><?

                $media = $oo->media($uu->id);
                if ($media) {
                    foreach ($media as $m) {
                        ?><div class='img-container floater'><img src='<? echo m_url($m);?>' class='fullscreen'></div><?
                        if ($m[caption]) {
                            ?><div class='caption'><? echo $m[caption]; ?></div><?
                        }
                    }
                }

            ?></div><?
        }

    ?></div>
</div>
   
<div id="controls">
    <div id="control-cube" class="control"></div>
    <div id="control-ladder" class="control"></div>
</div>

<!-- work out best practice for this ... add doument onload? init()? self-invoking function? -->

<script src="<? echo $host; ?>/static/js/cube.js"></script>
<script src="<? echo $host; ?>/static/js/screenfull.js"></script>
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
