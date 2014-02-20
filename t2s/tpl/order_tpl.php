<!DOCTYPE html>
<html>
    <head>
        <title>Page Title</title>

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="utf-8">

        <link rel="stylesheet" href="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.css" />
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="http://code.jquery.com/mobile/1.4.1/jquery.mobile-1.4.1.min.js"></script>
    </head>
    <body>

        <div data-role="page">

            <div data-role="header">
                <h1>开心订餐</h1>
            </div><!-- /header -->

            <div role="main" class="ui-content">
                <form action="">
                    <label for="slider1">牛肉套餐 15元</label>
                    <input name="slider1" id="slider" value="0" min="0" max="20" type="range">
                    <label for="slider2">红烧排骨饭 15元</label>
                    <input name="slider2" id="slider" value="0" min="0" max="20" type="range">
                    <label for="slider3">秋刀鱼饭 15元</label>
                    <input name="slider3" id="slider" value="0" min="0" max="20" type="range" data-theme="b">
                    <label for="slider4">扬州炒饭XXXXX 15元</label>
                    <input name="slider4" id="slider" value="0" min="0" max="20" type="range" data-theme="b">
                    <input type="submit" data-theme="b"  value="提交">

                </form>

                <ul id="test1" data-role="listview" data-count-theme="b" data-inset="false" data-split-icon data-split-theme="a">
<!--                    <li>牛肉套餐 15元<span id="n1" class="ui-li-count">12</span><a href="#" data-icon="minus" ></a><a href="#" data-icon="plus" ></a></li>
                    <li>红烧排骨饭 15元<span id ="n2" class="ui-li-count">0</span><a href="#" data-icon="minus" ></a><a href="#" data-icon="plus" ></a></li>
                    <li>秋刀鱼饭 15元<span id ="n3" class="ui-li-count">4</span><a href="#" data-icon="plus" /></li>-->
                    <li ><a href="n1">扬州炒饭XXXXX 15元<span id="n1" class="ui-li-count">0</span></a><a href="n1" data-icon="minus" ></a></li>
                    <li ><a href="n2">猪脚饭套餐 18元<span id="n2" class="ui-li-count">0</span></a><a href="n2" data-icon="minus" ></a></li>
                    <li ><a href="n3">猪脚饭套餐 18元<span id="n3" class="ui-li-count">0</span></a><a href="n3" data-icon="minus" ></a></li>
                </ul>

            </div><!-- /content -->

            <!--	<div data-role="footer">
                            <h4>Page Footer</h4>
                    </div> /footer -->
        </div><!-- /page -->

    </body>

    <script language="javascript">
        $(function(){
            $('#test1 > li >a:first-child').click(function(){
                var n = $(this).attr('href');
                $('#' + n).text(parseInt($('#' + n).text()) + 1);
                return false;
            });
       
            $('#test1 > li >a:last-child').click(function(){                
                var n = $(this).attr('href');
                if (parseInt($('#' + n).text()) == 0) return false; 
                $('#' + n).text(parseInt($('#' + n).text()) - 1);
                return false;
            });
       
        });
    </script>
</html>
