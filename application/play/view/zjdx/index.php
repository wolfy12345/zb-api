<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            浙江大学录取通知书
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/zjdx/icon.jpg">
            <div class="gamebox">
                <div class="game">
                    <dl class="meta">
                        <div class="btn" id="cksl">查看示例</div>
                        <span class="count">
                            <span class="iconstars icon-start-filled5"></span>
                            &nbsp;32.5万人在玩
                          </span>
                    </dl>
                </div>
            </div>
        </div>
        <div class="page1-inputbox">
            <div class="inputlist">
                <span class="short-inputname">姓名：</span>
                <span class="short-input">
                    <input id="user-name" maxlength="3" type="text" class="input input-name" placeholder="请输入昵称">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">学院（系）：</span>
                <span class="short-input">
                    <input id="user-name1" type="text" class="input input-name" placeholder="请输入学院（系）">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">专业</span>
                <span class="short-input">
                    <input id="user-name2" maxlength="7" type="text" class="input input-name" placeholder="请输入专业">
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/zjdx/sample.jpg">
        </div>
    </div>
    <script>
        $('#select-list1').on('change', function(){
            $('#select-text1').text($(this).val());
        });
        $('#select-list2').on('change', function(){
            $('#select-text2').text($(this).val());
        });

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
                var name1 = $('#user-name1').val();
                var name2 = $('#user-name2').val();
                if (name == '') {
                    layer.open({
                        content: '昵称不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (name1 == '') {
                    layer.open({
                        content: '学院不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (name2 == '') {
                    layer.open({
                        content: '专业不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&name1="+name1+"&name2="+name2);
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