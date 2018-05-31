<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            保证书
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/baozhengshu/sample.jpg">
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
                <span class="short-inputname">对方姓名：</span>
                <span class="short-input">
                    <input id="user-name" type="text" class="input input-name" placeholder="请输入对方姓名">
                </span>
            </div>

            <div class="inputlist">
                <span class="short-inputname">保证人：</span>
                <span class="short-input">
                    <input id="user-name2" type="text" class="input input-name" placeholder="请输入保证人">
                </span>
            </div>

            <div class="inputlist">
                <span class="short-inputname">类型：</span>
                <span class="short-input">
                    <span id="select-text1" class="analog-select" data-value="1">老公保证书</span>
                    <select class="select" id="select-list1" name="select1">
                        <option value="老公保证书" selected>老公保证书</option>
                        <option value="老婆保证书">老婆保证书</option>
                        <option value="男友保证书">男友保证书</option>
                        <option value="女友保证书">女友保证书</option>
                        <option value="戒烟保证书">戒烟保证书</option>
                        <option value="好好学习保证书">好好学习保证书</option>
                        <option value="好好工作保证书">好好工作保证书</option>
                    </select>
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/baozhengshu/sample.jpg">
        </div>
    </div>
    <script>
        $('#select-list1').on('change', function(){
            $('#select-text1').text($(this).val());
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
                var name2 = $('#user-name2').val();
                var select1 = $('#select-list1').val();
                if (name == '') {
                    layer.open({
                        content: '对方姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (name2 == '') {
                    layer.open({
                        content: '保证人不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (select1 == '') {
                    layer.open({
                        content: '类型不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&select1="+select1+"&name2="+name2);
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