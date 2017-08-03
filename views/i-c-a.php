        <style>
            body {
                background-color: #CCC;
                /* background-image: url('/media/png/hollows-small-light.png'); */
                /* background-image: url('/media/gif/hollows-10.gif'); */
                /* background-image: url('/media/gif/hollows-20.gif'); */
            }

            #logo {
                /* absolutely centered v+h -- https://codepen.io/Tipue/pen/CBbna */
                position: absolute;  
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                width: 200px;
                height: 90px;
                text-align: center;
            }

            #logo div {
                /* width: initial; */
                width: 100%;
            }
        </style>

        <div id="logo">
            <div id="logo-r"><img class="r" src="<? echo $host; ?>/media/png/logo-red.png"></div>
            <div id="logo-g"><img class="g" src="<? echo $host; ?>/media/png/logo-green.png"></div>
            <div id="logo-b"><img class="b" src="<? echo $host; ?>/media/png/logo-blue.png"></div>
        </div>

<script src="<? echo $host; ?>/static/js/logo.js"></script>

