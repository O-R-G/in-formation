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

    ?></p>
    
    <!-- menu-cube -->

    <div id="menu-cube">

        <!-- f1 -->
        <div class="f1">
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
            <p class='red'>** hello world! **</p>
        </div>

        <!-- f1 
        <div class="f1"><?

            // items
            $root = $uu->id;
            $children = $oo->children($root);

            foreach($children as $child) {
                $date =  $child["begin"];
                $location = $child["notes"];
                $title = $child["name1"];
                $description = $child["deck"];
                $url = $child["url"];

                ?><p class="item"><?
                    ?><span class="date"><? echo $date; ?></span><?
                    ?><span class="location"><? echo $location; ?></span><?
                    ?><span class="title"><a href="<? echo "shows/" . $url; ?>"><? echo $title; ?></a></span><?
                    ?><span class="description"><? echo $description; ?></span><?
                ?></p><?
            }
        ?></div>
        -->

        <!-- f2 -->
        <div class="f2">
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
            <p class='green'>** goodbye world! **</p>
        </div>

        <!-- f3 -->
        <div class="f3">
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
            <p class='blue'>** ciao world! **</p>
        </div>

    </div>
</div>
    
<div id="controls"> 

    <div id="control" onclick="javascript: rotate_menu();">
        rotate_menu();
    </div>

    <div id="control" onclick="javascript: change_color();">
        change_color();
    </div>

</div>


       





    <!-- f1 

    <div class="f1 docket-items"><?

        // items

        $root = $uu->id;
        $children = $oo->children($root);

        foreach($children as $child) {
            $date =  $child["begin"];
            $location = $child["notes"];
            $title = $child["name1"];
            $description = $child["deck"];
            $url = $child["url"];

            ?><p class="item"><?
                ?><span class="date"><? echo $date; ?></span><?
                ?><span class="location"><? echo $location; ?></span><?
                ?><span class="title"><a href="<? echo "shows/" . $url; ?>"><? echo $title; ?></a></span><?
                ?><span class="description"><? echo $description; ?></span><?
            ?></p><?
        }
    ?></div>

        
    -->







<?
/*   
// reference 

    public static function get_all( $fields = array("*"),
                                    $tables = array("objects"),
                                    $where = array(),
                                    $order = array(),
                                    $limit = '',
                                    $descending = FALSE,
                                    $distinct = TRUE)

    // return the children of object with id $o
    public function children($o)
    {
        $fields = array("objects.*");
        $tables = array("objects", "wires");
        $where  = array("wires.fromid = '".$o."'",
                        "wires.active = 1",
                        "wires.toid = objects.id",
                        "objects.active = '1'");
        $order  = array("objects.rank", "objects.begin", "objects.end", "objects.name1");

        return $this->get_all($fields, $tables, $where, $order);
    }
*/
?>


