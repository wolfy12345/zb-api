<?php echo $this->renderCommon('header_content');?>
    <div class="navbox">
        <div class="common-nav">
            <svg id="header-menubtn" width="20" height="20" class="header-menubtn">
                <path d="M15,0 L5,10 L15,20" stroke="#fff" stroke-width="2" fill="none"></path>
            </svg>
            明星未接来电生成器
            <a href="<?php echo $this->baseUrl;?>"><i class="icon-home iconfont"></i></a>
        </div>
    </div>

    <div id="page1" class="box active">
        <div id="openexample" class="gameinfobox">
            <img src="<?php echo $this->baseUrl;?>/example/mxwjld/11.jpg">
            <div class="gamebox">
                <div class="game">
                    <dl class="meta">
                        <div class="btn" id="cksl">查看示例</div>
                        <span class="count">
                            <span class="iconstars icon-start-filled5"></span>
                            &nbsp;59.8万人在玩
                          </span>
                    </dl>
                </div>
            </div>
        </div>
        <div class="page1-inputbox">
            <div class="inputlist">
                <span class="short-inputname">姓名：</span>
                <span class="short-input">
                        <input id="user-name" type="text" class="input input-name" placeholder="请输入姓名">
                    </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">明星姓名：</span>
                <span class="short-input">
                        <input id="user-mxname" type="text" class="input input-name" maxlength="3" placeholder="请输入明星姓名">
                    </span>
            </div>
            <div class="inputlist">
                <span class="short-inputname">选择消息内容：</span>
                <span class="short-input">
                    <span id="select-text1" class="analog-select" data-value="1">选择消息</span>
                    <select class="select" id="select-list1" name="select1">
                        <option value="，你一定要好好的">xxx，你一定要好好的</option>
                        <option value="，乖乖等我回家哦">xxx，乖乖等我回家哦</option>
                        <option value="，我睡不着，想你了">xxx，我睡不着，想你了</option>
                        <option value="，快说你爱我，我想听">xxx，快说你爱我，我想听</option>
                        <option value="，我生气了，快来哄哄我">xxx，我生气了，快来哄哄我</option>
                        <option value="，刚拍戏呢，没接到宝宝的电话">xxx，刚拍戏呢，没接到宝宝的电话</option>
                        <option value="我错了，回去跪搓衣板好不好？">xxx我错了，回去跪搓衣板好不好？</option>
                        <option value="在我心里永远是最美的">我发誓，xxx在我心里永远是最美的</option>
                        <option value="，我不在，不许你和别的姑娘眉来眼去！">xxx，我不在，不许你和别的姑娘眉来眼去！</option>
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
            <img class="exampleimg result" src="<?php echo $this->baseUrl;?>/example/mxwjld/22.jpg">
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
                var mxname = $('#user-mxname').val();
                var select1 = $('#select-list1').val();
                if (name == '') {
                    layer.open({
                        content: '姓名不能为空'
                        ,skin: 'msg'
                        ,time: 2 //2秒后自动关闭
                    });
                    return false;
                }
                if (mxname == '') {
                    layer.open({
                        content: '明星姓名不能为空'
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
                $('#page1').removeClass('active');
                $('#page3').addClass('active');
                $('#result').attr('src', "?m=play&c=<?php echo $this->ctl;?>&a=image&name="+name+"&mxname="+mxname+"&select1="+select1);
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