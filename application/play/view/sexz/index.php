<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            十二星座
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/sexz/jinniu.jpg">
            <div class="gamebox">
                <div class="game">
                    <dl class="meta">
                        <div class="btn" id="cksl">查看示例</div>
                        <span class="count">
                            <span class="iconstars icon-start-filled5"></span>
                            &nbsp;45.7万人在玩
                          </span>
                    </dl>
                </div>
            </div>
        </div>
        <div class="page1-inputbox">
            <div class="inputlist upload-pic-containter">
                <span class="short-inputname upload-input upload-pic-lable" style="line-height: 90px">上传照片：</span>
                <div class="upload-pic-wrapper" style="height: auto">
                    <div class="upload-pic-pre upload-pic-hide">
                        <input type="file" accept="image/*" class="upload-pic-pre-value">
                    </div>
                    <div style="display: flex;justify-content: flex-end;align-items: baseline;top: 10px">
                        <canvas id="upload-canvas" class="upload-pic-result" style="display: inline;width: 80px;height: 80px;left: 20px;top: 0px"></canvas>
                        <img class="change" src="<?php echo $this->baseUrl;?>/static/img/change.png" style="position: relative;width: 20px;" alt="">
                        <input type="hidden" value="" id="user-avatar">
                        <input type="hidden" value="<?php echo isset($_SESSION['headimgurl'])&&$_SESSION['headimgurl']?1:2;?>" id="user-avatar-type">
                    </div>
                </div>
                <a href="<?php echo $this->baseUrl;?>">如照片无法上传，戳此进入装B利器</a>
            </div>
            <div class="inputlist">
                <span class="short-inputname">姓名</span>
                <span class="short-input">
                    <input id="user-name" type="text" value="<?php echo isset($_SESSION['nickname'])?$_SESSION['nickname']:'';?>" class="input input-name" placeholder="请输入姓名">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">生日：</span>
                <span class="short-input">
                    <input id="user-name1" maxlength="4" type="number" value="" class="input input-name" placeholder="如0506">
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/sexz/jinniu.jpg">
        </div>
    </div>


    <script type="text/javascript" src="<?php echo $this->baseUrl;?>/static/plugins/lrz/lrz.bundle.js"></script>

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
                    url: "?c=upload&a=base",
                    type: "POST",
                    data: rst.formData,
                    processData: false,
                    contentType: false,
                    dataType: 'json',
                    success: function (data) {
                        if (data.code == 200) {
                            var image = new Image();
                            image.crossOrigin = '';
                            image.onload = function () {
                                var c = document.getElementById("upload-canvas");
                                var ctx = c.getContext('2d');
                                ctx.drawImage(image,0,0,image.width,image.height,0,0,c.width,c.height);
                            };
                            image.src = data.real_name;
                            $('#user-avatar').val(data.file_name);
                            $('#user-avatar-type').val(2);
                        }
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
    <script>
        var headImg = "<?php echo isset($_SESSION['headimgurl'])?$_SESSION['headimgurl']:$this->baseUrl.'/static/img/default.png';?>";
        document.getElementById("user-name").value = "<?php echo isset($_SESSION['nickname'])?$_SESSION['nickname']:'';?>";
        var image = new Image();
        image.crossOrigin = '';
        image.onload = function () {
            var c = document.getElementById("upload-canvas");
            var ctx = c.getContext('2d');
            ctx.drawImage(image,0,0,image.width,image.height,0,0,c.width,c.height);
        };
        image.src = headImg;
        //loading层
        var index2 = layer.open({type: 2});
        //头像
        $.ajax({
            url: "?c=upload&a=remote&url=<?php echo isset($_SESSION['headimgurl'])?$_SESSION['headimgurl']:'';?>&openid=<?php echo isset($_SESSION['openid'])?$_SESSION['openid']:'';?>",
            type: "get",
            processData: false,
            contentType: false,
            dataType: 'json',
            success: function (data) {
                if (data.code == 200) {
                    var image = new Image();
                    image.crossOrigin = '';
                    image.onload = function () {
                        var c = document.getElementById("upload-canvas");
                        var ctx = c.getContext('2d');
                        ctx.drawImage(image,0,0,image.width,image.height,0,0,c.width,c.height);
                    };
                    image.src = data.real_name;
                    $('#user-avatar').val(data.file_name);
                    $('#user-avatar-type').val(1);

                }
                layer.close(index2);
            }
        });
    </script>
    <script>
        $('#select-list1').on('change', function(){
            $('#select-text1').text($(this).val());
        });
        $(function () {
            $('#submitbtn').click(function(){
                var name = $('#user-name').val();
                var name1 = $('#user-name1').val();
                var avatar = $('#user-avatar').val();
                var type = $('#user-avatar-type').val();
                if (name == '') {
                    layer.open({
                        content: '姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (avatar == '') {
                    layer.open({
                        content: '头像不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (name1 == '') {
                    layer.open({
                        content: '生日不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }

                if (name1.length !=4) {
                    layer.open({
                        content: '生日长度为4位,如:0506'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }

                var name1_tmp = name1.replace(/\b(0+)/gi,"");

                if (name1_tmp < 101 || name1_tmp > 1231) {
                    layer.open({
                        content: '输入的生日不正确'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }

                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&avatar="+avatar+"&type="+type+"&name1="+name1);
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