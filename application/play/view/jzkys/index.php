<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            急诊科医生
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/jzkys/sample.jpg">
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
                <span class="short-inputname">年龄：</span>
                <span class="short-input">
                    <input id="user-age" type="text" class="input input-name" placeholder="请输入年龄">
                </span>
            </div>

            <div class="inputlist">
                <span class="short-inputname">患者症状：</span>
                <span class="short-input">
                    <span id="select-text1" class="analog-select" data-value="1">请输入患者症状</span>
                    <select class="select" id="select-list1" name="select1">
                        <option value="患者总觉得自己又瘦了。" selected>患者总觉得自己又瘦了。</option>
                        <option value="患者最近总是呼吸不畅，觉得胸闷气短。">患者最近总是呼吸不畅，觉得胸闷气短。</option>
                        <option value="患者常年处于单身状态。">患者常年处于单身状态。</option>
                        <option value="哇！怎么会有这么完美的一张脸！">哇！怎么会有这么完美的一张脸！</option>
                        <option value="患者最近老被人搭讪说“土豪我们做朋友吧”">患者最近老被人搭讪说“土豪我们做朋友吧”</option>
                        <option value="患者腼腆不爱说话不敢跟人多交流。">患者腼腆不爱说话不敢跟人多交流。</option>
                        <option value="患者有剁手hold不住症状表现。">患者有剁手hold不住症状表现。</option>
                        <option value="患者常常出现自己又胖了的错觉。">患者常常出现自己又胖了的错觉。</option>
                        <option value="患者看见帅哥就下肢发软，走不动路。">患者看见帅哥就下肢发软，走不动路。</option>
                        <option value="患者心脏部分发黑发青，但又不疼不痒。">患者心脏部分发黑发青，但又不疼不痒。</option>
                        <option value="患者感觉身心俱疲，每天都有忙不完的事。">患者感觉身心俱疲，每天都有忙不完的事。</option>

                        <option value="患者最近每晚12点过后都会对着手机一会笑一会哭。">患者最近每晚12点过后都会对着手机一会笑一会哭。</option>
                        <option value="患者经常觉得别人对自己有意思。">患者经常觉得别人对自己有意思。</option>
                        <option value="聚会吃饭时患者们都会一直盯着手机。">聚会吃饭时患者们都会一直盯着手机。</option>
                      

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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/jzkys/sample.jpg">
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
                var age = $('#user-age').val();
                var select1 = $('#select-list1').val();
                if (name == '') {
                    layer.open({
                        content: '姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (age == '') {
                    layer.open({
                        content: '年龄不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (select1 == '') {
                    layer.open({
                        content: '患者症状不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&select1="+select1+"&age="+age);
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