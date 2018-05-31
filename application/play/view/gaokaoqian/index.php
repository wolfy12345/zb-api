<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            高考祝福签
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/gaokaoqian/sample.jpg">
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
                    <input id="user-name" type="text" maxlength="4" class="input input-name" placeholder="输入姓名(限四个字)">
                </span>
            </div>

            <div class="inputlist">
                <span class="short-inputname">祝福签1：</span>
                <span class="short-input">
                    <span id="select-text1" class="analog-select" data-value="1">请选择</span>
                    <select class="select" id="select-list1" name="select1">
                        <option value="步步高升">步步高升</option>
                        <option value="所向披靡">所向披靡</option>
                        <option value="挥笔成章">挥笔成章</option>
                        <option value="独占鳌头">独占鳌头</option>
                        <option value="考试顺利">考试顺利</option>
                        <option value="重点大学">重点大学</option>
                        <option value="战力爆表">战力爆表</option>
                        <option value="数学高分">数学高分</option>
                        <option value="英语高分">英语高分</option>
                        <option value="语文高分">语文高分</option>
                        <option value="题目都会">题目都会</option>
                        <option value="心平气和">心平气和</option>
                        <option value="能力爆表">能力爆表</option>
                        <option value="超常发挥">超常发挥</option>
                        <option value="分数喜人">分数喜人</option>
                    </select>
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">祝福签２：</span>
                <span class="short-input">
                    <span id="select-text2" class="analog-select" data-value="1">请选择</span>
                    <select class="select" id="select-list2" name="select1">
                        <option value="直取苍龙">直取苍龙</option>
                        <option value="心想事成">心想事成</option>
                        <option value="出人头地">出人头地</option>
                        <option value="旗开得胜">旗开得胜</option>
                        <option value="如愿以偿">如愿以偿</option>
                        <option value="前程似锦">前程似锦</option>
                        <option value="鹏程万里">鹏程万里</option>
                        <option value="一帆风顺">一帆风顺</option>
                        <option value="一马当先">一马当先</option>
                        <option value="登科及第">登科及第</option>
                        <option value="功成名就">功成名就</option>
                        <option value="事事顺利">事事顺利</option>
                        <option value="五福临门">五福临门</option>
                        <option value="六六大顺">六六大顺</option>
                        <option value="七星高照">七星高照</option>
                        <option value="八面威风">八面威风</option>
                        <option value="九九洪福">九九洪福</option>
                        <option value="十全十美">十全十美</option>
                    </select>
                </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">祝福签３：</span>
                <span class="short-input">
                    <span id="select-text3" class="analog-select" data-value="1">请选择</span>
                    <select class="select" id="select-list3" name="select1">
                        <option value="循序渐进">循序渐进</option>
                        <option value="分数很高">分数很高</option>
                        <option value="一鸣惊人">一鸣惊人</option>
                        <option value="各种高分">各种高分</option>
                        <option value="及第成名">及第成名</option>
                        <option value="蟾宫折桂">蟾宫折桂</option>
                        <option value="金榜题名">金榜题名</option>
                        <option value="马到成功">马到成功</option>
                        <option value="百事称心">百事称心</option>
                        <option value="直取苍龙">直取苍龙</option>
                        <option value="拨云见日">拨云见日</option>
                        <option value="梦想成真">梦想成真</option>
                        <option value="旗开得胜">旗开得胜</option>
                        <option value="喜气盈门">喜气盈门</option>
                        <option value="光耀门楣">光耀门楣</option>
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/gaokaoqian/sample.jpg">
        </div>
    </div>
    <script>
        $('#select-list1').on('change', function(){
            $('#select-text1').text($(this).val());
        });
         $('#select-list2').on('change', function(){
            $('#select-text2').text($(this).val());
        });
         $('#select-list3').on('change', function(){
            $('#select-text3').text($(this).val());
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
                var select3 = $('#select-list3').val();
                if (name == '') {
                    layer.open({
                        content: '姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (select1 == '') {
                    layer.open({
                        content: '祝福签1不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                 if (select2 == '') {
                    layer.open({
                        content: '祝福签2不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                 if (select3 == '') {
                    layer.open({
                        content: '祝福签3不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('.footer-more').hide();
                $('.footer-ad2').hide();
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&select1="+select1+"&select2="+select2+"&select3="+select3);
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