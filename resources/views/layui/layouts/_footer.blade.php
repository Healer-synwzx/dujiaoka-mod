<div class="sh-footer">

    <div class="layui-row">
        <div class="layui-container" style="margin-top:15px">

            <div class="footer-wrap">
                <div style="text-align: center">{!! config('webset.footer') !!} </div>
                <p>Copyright @ <?php echo date('Y');?> {{ config('webset.text_logo') }} . Powered by <a href="https://github.com/assimon/dujiaoka" target="_blank">独角数卡</a>
                </p><br>
            </div>


        </div>
    </div>
</div>

</body>
</html>
<script src="/assets/layui/layui.js"></script>
<script src="/assets/style/js/jquery-3.4.1.min.js"></script>
<script src="/assets/style/js/clipboard/clipboard.min.js"></script>

<script>
    //注意：导航 依赖 element 模块，否则无法进行功能性操作
    layui.config({
        base: '/assets/layui/'
    }).use(['sliderVerify', 'jquery', 'form', 'layer', 'element'], function () {
        var element = layui.element;
        var form = layui.form;
        var sliderVerify = layui.sliderVerify;
        var form = layui.form;
        var layer = layui.layer //获得layer模块
        var layerad = $("#layerad").html();
        if (typeof (layerad) != "undefined") {
            if (layerad.length > 0) {
                layer.open({
                    type: 1
                    , title: ['温馨提示', 'text-align:center;padding: 0 ;']
                    , closeBtn: false
                    , area: '300px;'
                    , shade: 0.8
                    , id: 'AD'
                    , btn: ['朕知道了']
                    , btnAlign: 'c'
                    , moveType: 1 //拖拽模式，0或者1
                    , content: '<div style="margin-top:15px;">' + layerad + '</div>'
                });
            }
        }
        form.on('select(classifys)', function (data) {
            $("#Search").val('');
            //文本输入框
            var txt = data.value;
            //不为空
            if ($.trim(txt) != "") {
                $(".category").hide().filter(function(index) {
                    return $(".layui-card-header", this).html().indexOf(txt) != -1;
                }).show();
                $(".product").show();
               
            }
            else{
                $(".category").show();
                $(".product").show();
            }
        });
        $("#Search").on("input", function (e) {
            $(".classifys").val("");
            form.render("select");
            //文本输入框
            var txt = $("#Search").val();
            //不为空
            if ($.trim(txt) != "") {
                //显示搜索内容相关的div
                $(".category").hide().filter(":contains('" + txt + "')").show();
                $(".product").hide().filter(":contains('" + txt + "')").show();
                
            } 
            else{
                $(".category").show();
                $(".product").show();
            }
        });
        if(getQueryVariable('search_word')){
            $(".classifys").val("");
            form.render("select");
            //文本输入框
            var txt = decodeURIComponent(getQueryVariable('search_word'));
            //不为空
            if ($.trim(txt) != "") {
                //显示搜索内容相关的div
                $(".category").hide().filter(":contains('" + txt + "')").show();
                $(".product").hide().filter(":contains('" + txt + "')").show();
            } else {
                $(".category").show();
                $(".product").show();
            }    
        }
    })

    //手机设备的简单适配

    var shadeMobile = $('.site-mobile-shade')
    shadeMobile.on('click', function () {
        $('body').removeClass('site-mobile');
        $('html,body').removeClass('ovfHiden');
    });
    $('#main-menu-mobile-switch').on('click', function () {
        $("#main-menu-mobile-switch").toggleClass('layui-icon-spread-left');
        $("#main-menu-mobile-switch").toggleClass('layui-icon-close');
        if ($("#main-menu-mobile").is(":hidden")) {
            $('body').addClass('main-menu-mobile_body');
            $('html,body').addClass('ovfHiden');
            var body_width = parseInt($('body').width());
            $("#main-menu-mobile").css("width", body_width);
            $('#main-menu-mobile').show();
        } else {
            $('body').removeClass('main-menu-mobile_body');
            $('html,body').removeClass('ovfHiden');
            $('#main-menu-mobile').hide();
        }
    });
    $('.site-mobile-shade').on('click', function () {
        $('body').removeClass('main-menu-mobile_body');
        $('html,body').removeClass('ovfHiden');
        $('#main-menu-mobile').hide();
    });
function getQueryVariable(variable)
{
       var query = window.location.search.substring(1);
       var vars = query.split("&");
       for (var i=0;i<vars.length;i++) {
               var pair = vars[i].split("=");
               if(pair[0] == variable){return pair[1];}
       }
       return(false);
}
</script>

