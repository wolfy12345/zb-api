<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            东方时空
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/dfsk/sample.jpg">
            <div class="gamebox">
                <div class="game">
                    <dl class="meta">
                        <div class="btn" id="cksl">查看示例</div>
                            <span class="count">
                            <span class="iconstars icon-start-filled5"></span>
                            &nbsp;1104.32万人在玩
                          </span>
                    </dl>
                </div>
            </div>
        </div>
        <div class="page1-inputbox">
            <div class="inputlist">
                <span class="short-inputname">昵称：</span>
                    <span class="short-input">
                        <input id="user-name" type="text" class="input input-name" placeholder="请输入昵称">
                    </span>
            </div>
        </div>
        <div class="first-page-btn  ">
            <div class="mixbtnbox">
                <div class="mixstartbtn"><span id="submitbtn" class="">生成</span></div>
            </div>
        </div>
    </div>


    <div id="page3" class="box">
        <div class="page3">
            <div class="resultimgbox">
                <div id="savetipsbox">
                    <div class="savetip"></div>
                    <span>长按图片</span>
                    <span>即可保存到相册</span>
                </div>
                <img id="result" class="result" src="">
            </div>
            <div class="savetipbox">
                <?php echo $this->renderCommon('share');?>
            </div>
        </div>
    </div>

    <div id="page4" class="box">
        <div id="backtohomgpage" class="examplebox">

            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/dfsk/sample.jpg">
        </div>
    </div>
    </body>
    <script type="text/javascript" src="<?php echo $this->baseUrl;?>/static/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl;?>/dist/lrz.bundle.js"></script>
    <script type="text/javascript" src="<?php echo $this->baseUrl;?>/layer_mobile/layer.js"></script>
    <script>
        $("input[type=file]").change(function () {
            var index = layer.open({type: 2});
            /* 压缩图片 */
            lrz(this.files[0], {
                width: 150 //设置压缩参数
            }).then(function (rst) {
                /* 处理成功后执行 */
                rst.formData.append('base64img', rst.base64); // 添加额外参数
                $.ajax({
                    url: "upload.php",
                    type: "POST",
                    data: rst.formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        var image = new Image();
                        image.crossOrigin = '';
                        image.onload = function () {
                            var c = document.getElementById("upload-canvas");
                            var ctx = c.getContext('2d');
                            ctx.drawImage(image,0,0,image.width,image.height,0,0,c.width,c.height);
                        };
                        image.src = data.real_name;
                        $('#user-avatar').val(data.file_name);
                        layer.close(index);
                    }
                });
            }).catch(function (err) {
                /* 处理失败后执行 */
            }).always(function () {
                /* 必然执行 */
            })
        })
    </script>
    <!--    <script>-->
    <!--        var headImg = "http://funny.cdn.woquhudong.cn/funny/wechat/img/default.png";-->
    <!--        document.getElementById("user-name").value = "";-->
    <!--        var image = new Image();-->
    <!--        image.crossOrigin = '';-->
    <!--        image.onload = function () {-->
    <!--            var c = document.getElementById("upload-canvas");-->
    <!--            var ctx = c.getContext('2d');-->
    <!--            ctx.drawImage(image,0,0,image.width,image.height,0,0,c.width,c.height);-->
    <!--        };-->
    <!--        image.src = headImg;-->
    <!---->
    <!--    </script>-->
    <script>
        $(function () {
            $('#openexample').click(function(){
                $('#page1').removeClass('active');
                $('#page4').addClass('active');
            });
            $('#backtohomgpage').click(function(){
                $('#page4').removeClass('active');
                $('#page1').addClass('active');
            });

            $('#submitbtn').click(function(){
                var name = $('#user-name').val();
//                var b = $("#sel option:checked").text();
                if (name == '') {
                    layer.open({
                        content: '昵称不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
//                if (avatar == '') {
//                    layer.open({
//                        content: '头像不能为空'
//                        ,skin: 'msg'
//                        ,time: 2 //2秒后自动关闭
//                    });
//                    return false;
//                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name);
                $('#savetipsbox').show();
                setTimeout(function(){$('#savetipsbox').hide();}, 3000);
            });

            $('#showsavetipbtn').click(function(){
                $('#savetipsbox').show();
                setTimeout(function(){$('#savetipsbox').hide();}, 3000);
            });

            $('#header-menubtn').click(function(){
                window.history.back();
            });
        })
    </script>

<?php echo $this->renderCommon('footer_content');?>