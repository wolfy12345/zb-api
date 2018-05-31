<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            奖杯
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/jiangbei/show.jpg">
            <div class="gamebox">
                <div class="game">
                    <dl class="meta">
                        <div class="btn" id="cksl">查看示例</div>
                        <span class="count">
                            <span class="iconstars icon-start-filled5"></span>
                            &nbsp;50万人在玩
                          </span>
                    </dl>
                </div>
            </div>
        </div>
        <div class="page1-inputbox">
            <div class="inputlist">
                <span class="short-inputname">姓名：</span>
                <span class="short-input">
                    <input id="user-name" type="text" class="input input-name" placeholder="请输入你的姓名">
                </span>
            </div>

            <div class="inputlist">
                <span class="short-inputname">组织：</span>
                <span class="short-input">
                    <span id="select-text1" class="analog-select" data-value="1">中国外贸协会</span>
                    <select class="select" id="select-list1" name="select1">
                        <option value="中国外贸协会" selected>中国外贸协会</option>
                        <option value="世界爱情组织">世界爱情组织</option>
                        <option value="联合国大学">联合国大学</option>
                        <option value="世界吉尼斯纪录">世界吉尼斯纪录</option>
                        <option value="联合国禁毒署">联合国禁毒署</option>
                        <option value="奥林匹克数学竞赛">奥林匹克数学竞赛</option>
                        <option value="国际足球联合会">国际足球联合会</option>
                    </select>
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">荣誉称号</span>
                <span class="short-input">
                    <span id="select-text2" class="analog-select" data-value="1">赛潘安称号</span>
                    <select class="select" id="select-list2" name="select1">
                        <option value="赛潘安称号">赛潘安称号</option>
                        <option value="最佳男神奖">最佳男神奖</option>
                        <option value="最佳女神奖">最佳女神奖</option>
                        <option value="撩妹之神">撩妹之神</option>
                        <option value="三好生">三好生</option>
                        <option value="啪啪秒射王">啪啪秒射王</option>
                        <option value="禁毒王">禁毒王</option>
                        <option value="特等奖">特等奖</option>
                        <option value="足球先生">足球先生</option>
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/jiangbei/show.jpg">
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
                var select1 = $('#select-list1').val();
                var select2 = $('#select-list2').val();
                if (name == '') {
                    layer.open({
                        content: '昵称不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (select1 == '') {
                    layer.open({
                        content: '组织不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (select2 == '') {
                    layer.open({
                        content: '荣誉称号不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&select1="+select1+'&select2='+select2);
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