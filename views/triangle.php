        <style>
            body {
                background-color: #CCC;
                /* background-image: url('/media/png/hollows-small-light.png'); */
                /* background-image: url('/media/gif/hollows-10.gif'); */
                /* background-image: url('/media/gif/hollows-20.gif'); */
            }

            #triangle {
                /* absolutely centered v+h -- https://codepen.io/Tipue/pen/CBbna */
                position: absolute;  
                position: fixed;  
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 200px;
                height: 300px;
                text-align: center;
                mix-blend-mode: screen;
            }

            #triangle div {
                position: absolute;
                /* width: initial; */
                width: 100%;
                mix-blend-mode: screen;
                transition: transform .5s;
                transition-timing-function: ease-out;    
                transform-style: preserve-3d;
            }
        </style>

        <!--
        <div id="triangle">
            <div id="triangle-r"><img class="r" src="<? echo $host; ?>/media/svg/triangle-1-r.svg"></div>
            <div id="triangle-g"><img class="g" src="<? echo $host; ?>/media/svg/triangle-2-g.svg"></div>
            <div id="triangle-b"><img class="b" src="<? echo $host; ?>/media/svg/triangle-3-b.svg"></div>
        </div>
        -->

        <div id="triangle">
            <div id="triangle-r"><img class="r" src="<? echo $host; ?>/media/svg/triangle-1.svg"></div>
            <div id="triangle-g"><img class="g" src="<? echo $host; ?>/media/svg/triangle-2.svg"></div>
            <div id="triangle-b"><img class="b" src="<? echo $host; ?>/media/svg/triangle-3.svg"></div>
        </div>

        <!--
        <div id="triangle">
            <div id="triangle-r"><img class="r" src="<? echo $host; ?>/media/svg/triangle.svg"></div>
            <div id="triangle-g"><img class="g" src="<? echo $host; ?>/media/svg/triangle.svg"></div>
            <div id="triangle-b"><img class="b" src="<? echo $host; ?>/media/svg/triangle.svg"></div>
        </div>
        -->

        <!--
        <div id="triangle">
            <div id="triangle-r"><img class="r" src="<? echo $host; ?>/media/svg/triangle-white.svg"></div>
            <div id="triangle-g"><img class="g" src="<? echo $host; ?>/media/svg/triangle-white.svg"></div>
            <div id="triangle-b"><img class="b" src="<? echo $host; ?>/media/svg/triangle-white.svg"></div>
        </div>
        -->

<script src="<? echo $host; ?>/static/js/triangle.js"></script>

