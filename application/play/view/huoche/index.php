<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            火车票生成器
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/huoche/icon.jpg">
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
                <span class="short-inputname">起点站</span>
                <span class="short-input">
                    <input id="qidian" maxlength="4" type="text" class="input input-name" placeholder="如南京南">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">终点站</span>
                <span class="short-input">
                    <input id="zhongdian" maxlength="4" type="text" class="input input-name" placeholder="如上海虹桥">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">车次</span>
                <span class="short-input">
                    <input id="checi" maxlength="7" type="text" class="input input-name" placeholder="如G123">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">价格</span>
                <span class="short-input">
                    <input id="jiage" maxlength="5" type="text" class="input input-name" placeholder="如500">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">姓名</span>
                <span class="short-input">
                    <input id="name" maxlength="4" type="text" class="input input-name" placeholder="如XXX">
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">身份证</span>
                <span class="short-input">
                    <input id="shenfen" maxlength="18" type="text" class="input input-name" placeholder="如32121248****1254">
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/huoche/icon.jpg">
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
                var name = $('#name').val();
                var qidian = $('#qidian').val();
                var zhongdian = $('#zhongdian').val();
                var checi = $('#checi').val();
                var jiage = $('#jiage').val();
                var shenfen = $('#shenfen').val();
                if (name == '') {
                    layer.open({
                        content: '姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (qidian == '') {
                    layer.open({
                        content: '起点站不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (zhongdian == '') {
                    layer.open({
                        content: '终点站不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (checi == '') {
                    layer.open({
                        content: '车次不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (jiage == '') {
                    layer.open({
                        content: '价格不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (shenfen == '') {
                    layer.open({
                        content: '身份不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }

                if (shenfen.length != 18) {
                    layer.open({
                        content: '身份证需要18位'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&qidian="+qidian+"&zhongdian="+zhongdian+"&checi="+checi+"&jiage="+jiage+"&shenfen="+shenfen);
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