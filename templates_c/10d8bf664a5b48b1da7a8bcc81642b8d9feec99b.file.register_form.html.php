<?php /* Smarty version Smarty-3.0.8, created on 2013-07-01 14:00:30
         compiled from "D:/xampp/htdocs/Local_Photowall/View\register/register_form.html" */ ?>
<?php /*%%SmartyHeaderCode:3118651d18b7e14c907-32356336%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10d8bf664a5b48b1da7a8bcc81642b8d9feec99b' => 
    array (
      0 => 'D:/xampp/htdocs/Local_Photowall/View\\register/register_form.html',
      1 => 1369624570,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3118651d18b7e14c907-32356336',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <script type="text/javascript">
    function check_repeat(){
        var login_name=document.getElementById("login_name").value;
        $.ajax({
            data:"login_name="+login_name,
            url:"check_repeat_login_name.php",
            type:"post",
            dataType:"text",
            success:function(data)
            {
                
            }
        });
    }
    </script>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Photowall-新用户注册</title>
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/register.css">
    <link rel="stylesheet" type="text/css" href="../../View/resources/css/bootstrap.css">
    <script type="text/javascript" src="../../View/resources/js/bootstrap.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <script src="http://twitter.github.com/bootstrap/assets/js/bootstrap-tooltip.js"></script>
    <script type="text/javascript" src="../../View/resources/js/bootstrap-modal.js"></script>
    <script type="text/javascript">
        function AgreeCheck(){
            if($("#agree").is(':checked')){
                $("#register_button").removeAttr("disabled").attr("title","");
            }
            else{
                $("#register_button").attr("disabled", true).attr("title","请认真阅读并同意注册条款后申请注册");
            }
        }

        $(document).ready(function () {
            $(".shadow-input").tooltip({
                'trigger': 'focus',
                'placement': 'left'
            });
            $('#agree').change(function(){AgreeCheck();});
            $("#policy-agreed").click(function(){
                $("#agree").prop('checked', true);
                AgreeCheck();
            });
            $("#policy-declined").click(function(){
                $("#agree").prop('checked', false);
                AgreeCheck();
            });
        });
    </script>
</head>
<body>
    <div class="wrapper">
        <div class="main_content row-fluid">
            <div class="register span2 offset3">
                <h4 class="text-black span8">新用户注册</h4>
                <form class="form-horizontal" id="form1" action="register_action.php" method="post">
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="shadow-input" id="login_name" name="login_name" onblur="check_repeat()" title="登陆账号" placeholder="登陆账号">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="shadow-input" id="confirm" name="confirm" title="确认账号" placeholder="确认账号">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="shadow-input" id="real_name" name="real_name" title="真实姓名" placeholder="真实姓名">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="password" class="shadow-input" id="password" name="password" title="登陆密码" placeholder="登陆密码">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="password" class="shadow-input" id="password_confirm" name="password_confirm" title="确认密码" placeholder="确认密码">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="shadow-input" id="email" name="email" title="邮箱地址" placeholder="邮箱地址">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="text" class="shadow-input" id="recommended_by" name="recommended_by" title="推荐人账号" placeholder="推荐人账号">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <input type="hidden" name="submit_test" value="yes" />
                            <label class="checkbox" for="agree">
                                <input type="checkbox" value="yes" name="agree" id="agree">我已阅读并同意<a href="#myModal" class="text-error" data-toggle="modal">Photowall注册条款</a></p>
                            </label>
                            <label class="space20"></label>
                            <button class="btn btn-primary btn-large" id="register_button" type="submit" value="注册" style="margin-right:10px;" disabled="true" title="">注册</button>
                            <button class="btn btn-large offset2" type="reset" value="重填" >重填</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="apps span2">
                <h4 class="text-black space20">Photowall移动客户端下载</h4>
                <a href="#">
                   <div class="apps_down" id="apps_ios">
                           <p>iOS</p>
                   </div>
                </a>
                <a href="#">
                    <div class="apps_down" id="apps_android">
                      <p>Android</p>
                    </div>
                </a>
                <a href="#">
                    <div class="apps_down" id="apps_other">
                      <p>其他</p>
                    </div>
                </a>
            </div>
            <div id="banner" class="span3">
                <img src="../../View/resources/img/logo_login.png" height="100%" alt="photowall" longdesc="http://www.photowall.cc" style="margin-left:auto; margin-right:auto;">
            </div>
        </div>
        <div class="footer">
               <div class="copyright">
                   <p>Copyright? 2012-2022 Photowall Inc, All Rights Reserved.</p>
                    <p>照片墙 版权所有</p>
                    <a href="http://www.tangerteq.com" style="text-decoration:none;"><p>Powered by Tanger TEQ LLC.</p></a>
                </div>
            </div>
    </div>

    <!-- Modal -->
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel" class="text-error">Photowall注册服务条款</h3>
        </div>
        <div class="modal-body">
            <p class="register_policy_txt">
                一、服务条款的确认和接纳<br/>
                Photowall（http://www.photowall.cc）及其涉及到的产品、相关软件的所有权和运作权归青岛英勘文化传媒有限公司（以下简称英勘公司）所有， 英勘公司享有对Photowall上一切活动的监督、提示、检查、纠正及处罚等权利。用户通过注册程序阅读本服务条款并点击"同意"按钮完成注册，即表示用户与英勘公司已达成协议，自愿接受本服务条款的所有内容。如果用户不同意服务条款的条件，则不能获得使用photowall.cc服务以及注册成为Photowall用户的权利。<br/>
                <br/>
                二、服务保护条款<br/>
                1、 英勘公司运用自己的操作系统通过国际互联网络为用户提供各项服务，用户必须:<br/>
                （1）提供设备，包括个人电脑一台、调制解调器一个及配备上网装置。<br/>
                （2）个人上网和支付与此服务有关的电话费用。<br/>
                2、考虑到英勘公司产品服务的重要性，用户同意:<br/>
                （1）提供及时、详尽及准确的个人资料。<br/>
                （2）不断更新注册资料，符合及时、详尽准确的要求。所有原始键入的资料将引用为注册资料。<br/>
                3、用户可授权英勘公司向第三方透露其注册资料，否则英勘公司不能公开用户的姓名、住址、出件地址、电子邮箱、帐号。除非:<br/>
                （1）事先获得用户明确授权后，用户要求英勘公司或授权某人通过电子邮件服务或其他方式透露这些信息。<br/>
                （2）相应的法律、法规要求以及按照有关政府主管部门的要求，需要英勘公司提供用户的个人资料。<br/>
                （3）为了维护公众以及Photowall合法利益。<br/>
                （4）Photowall可能会与第三方合作向用户提供相关的网络服务，在此情况下，如该第三方同意承担与Photowall同等的保护用户隐私的责任，则Photowall有权将用户的注册资料等提供给该第三方。<br/>
                （5）在不透露单个用户隐私资料的前提下，Photowall有权对整个用户数据库进行分析并对用户数据库进行商业上的利用。<br/>
                4、如果用户提供的资料不准确，不真实，不合法有效，英勘公司保留结束用户使用英勘公司各项服务的权利。<br/>
                用户在享用英勘公司各项服务的同时，同意接受英勘公司提供的各类信息服务。<br/>
                5、英勘公司定义的信息内容包括:文字、软件、声音、相片、录像、图表；在广告中全部内容；英勘公司为用户提供的商业信息等，所有这些内容受版权、商标权、和其它知识产权及所有权法律的保护。所以，用户只能在英勘公司授权下才能使用这些内容，而不能擅自复制、修改、编撰这些内容、或创造与内容有关的衍生产品。<br/>
                6、如果用户未遵守本服务条款的任何一项，英勘公司有权利即终止提供一切服务，并保留通过法律手段追究责任的权利。<br/>
                7、使用Photowall提供的服务由用户自己承担风险，在适用法律允许的最大范围内，英勘公司在任何情况下不就因使用或不能使用Photowall提供的服务所发生的特殊的、意外的、直接或间接的损失承担赔偿责任。即使已事先被告知该损害发生的可能性。<br/>
                8、用户须明白，使用Photowall提供的服务涉及到Internet服务和电信增值服务，可能会受到各个环节不稳定因素的影响。因此服务存在因不可抗力、计算机病毒或黑客攻击、国家相关行业主管部门及电信运营商的调整、系统不稳定、用户所在位置、用户关机以及其他任何技术、互联网络、通信线路原因等造成的服务中断或不能满足用户要求的风险。用户须承担以上风险，英勘公司不作担保。对因此导致用户不能发送、上传和接受阅读消息、或接发错消息，或无法实现其他通讯条件，英勘公司不承担任何责任。<br/>
                9、用户须明白，在使用Photowall提供的服务存在有来自任何他人的包括威胁性的、诽谤性的、令人反感的或非法的内容或行为或对他人权利的侵犯（包括知识产权）的匿名或冒名的信息的风险，用户须承担以上风险，英勘公司和合作公司对服务不作任何类型的担保，不论是明确的或隐含的，包括所有有关信息真实性、适用性、所有权和非侵权性的默示担保和条件，对因此导致任何因用户不正当或非法使用服务产生的直接、间接、偶然、特殊及后续的损害，不承担任何责任。<br/>
                <br/>
                三、用户使用规则<br/>
                特别提示用户，使用互联网必须遵守国家有关的政策和法律，包括刑法、国家安全法、保密法、计算机信息系统安全保护条例等，保护国家利益，保护国家安全，对于违法使用互联网络而引起的一切责任，由用户负全部责任。 1、用户在申请使用Photowall提供的网络服务时，必须向英勘公司提供准确的个人资料，如个人资料有任何变动，必须及时更新。<br/>
                2、用户注册成功后，英勘公司将给予每个用户一个用户帐号及相应的密码，该用户帐号和密码由用户负责保管；用户应当对以其用户帐号进行的所有活动和事件负法律责任。<br/>
                3、用户不得使用Photowall服务发送或传播敏感信息和违反国家法律制度的信息，包括但不限于下列信息:<br/>
                (a) 反对宪法所确定的基本原则的；<br/>
                (b) 危害国家安全，泄露国家秘密，颠覆国家政权，破坏国家统一的；<br/>
                (c) 损害国家荣誉和利益的；<br/>
                (d) 煽动民族仇恨、民族歧视，破坏民族团结的；<br/>
                (e) 破坏国家宗教政策，宣扬邪教和封建迷信的；<br/>
                (f) 散布谣言，扰乱社会秩序，破坏社会稳定的；<br/>
                (g) 散布淫秽、色情、赌博、暴力、凶杀、恐怖或者教唆犯罪的；<br/>
                (h) 侮辱或者诽谤他人，侵害他人合法权益的；<br/>
                (i) 含有法律、行政法规禁止的其他内容的。<br/>
                4、用户在使用Photowall络服务过程中，必须遵循以下原则:<br/>
                (a) 遵守中国有关的法律和法规；<br/>
                (b) 不得为任何非法目的而使用网络服务系统；<br/>
                (c) 遵守所有与网络服务有关的网络协议、规定和程序；<br/>
                (d) 不得利用Photowall网络服务系统进行任何可能对互联网的正常运转造成不利影响的行为；<br/>
                (e) 不得利用Photowall网络服务系统传输任何骚扰性的、中伤他人的、辱骂性的、恐吓性的、庸俗淫秽的或其他任何非法的信息资料；<br/>
                (f) 不得利用Photowall网络服务系统进行任何不利于 千橡 公司的行为。<br/>
                5、使用Photowall站服务，用户应加强个人资料的保护意识，并注意个人密码的密码保护。<br/>
                6、盗取他人用户帐号或利用网络通讯骚扰他人，均属于非法行为。用户不得采用测试、欺骗等任何非法手段，盗取其他用户的帐号和对他人进行骚扰。<br/>
                <br/>
                四、服务条款的修改<br/>
                英勘公司会在必要时修改服务条款，服务条款一旦发生变动，公司将会在用户进入下一步使用前的页面提示修改内容。如果您同意改动，则再一次激活"同意"按钮。如果您不接受，则及时取消您的用户使用服务资格。<br/>
                用户要继续使用Photowall各项服务需要两方面的确认:<br/>
                （1）首先确认Photowall服务条款及其变动。<br/>
                （2）同意接受所有的服务条款限制。<br/>
                <br/>
                五、服务修订<br/>
                英勘公司特别提示用户，英勘公司为了保障公司业务发展和调整的自主权，拥有随时修改或中断服务而不需通知用户的权利，英勘公司行使修改或中断服务的权利不需对用户或任何第三方负责。用户必须在同意本条款的前提下，英勘公司才开始对用户提供服务。<br/>
                <br/>
                六、用户隐私制度<br/>
                尊重用户个人隐私是英勘公司的一项基本政策。所以，作为对以上第二点个人注册资料分析的补充，英勘公司一定不会公开、编辑或透露用户的注册资料及保存在英勘公司各项服务中的非公开内容，除非英勘公司在诚信的基础上认为透露这些信息在以下几种情况是必要的:<br/>
                （1）遵守有关法律规定，包括在国家有关机关查询时，提供用户在Photowall的网页上发布的信息内容及其发布时间、互联网地址或者域名以及其他用户上传至Photowall的信息。<br/>
                （2）遵从Photowall产品服务程序。<br/>
                （3）保持维护英勘公司的商标所有权。<br/>
                （4）在紧急情况下维护用户个人和社会大众的隐私安全。<br/>
                （5）英勘公司认为必要的其他情况下。<br/>
                用户在此授权英勘公司可以向其电子邮箱发送商业信息。<br/>
                <br/>
                七、用户的帐号、密码和安全性<br/>
                用户一旦成功注册，将得到一个密码和帐号。如果用户未保管好自己的帐号和密码而对其自身、英勘公司或第三方造成的损害，用户将负全部责任。另外，每个用户都要对其帐户中的所有活动和事件负全责。用户可随时改变自己的密码和图标，也可以结束旧的帐户重开一个新帐户。用户同意若发现任何非法使用用户帐号或安全漏洞的情况，立即通告英勘公司。<br/>
                <br/>
                八、拒绝提供担保<br/>
                用户明确同意邮件服务的使用由用户个人承担风险。邮件服务提供是建立在免费的基础上。英勘公司明确表示不提供任何类型的担保，不论是明确的或隐含的。 英勘公司不担保服务一定能满足用户的要求，也不担保服务不会受中断，对服务的及时性、安全性、出错发生都不作担保。英勘公司拒绝提供任何担保，包括信息能否准确、及时、顺利地传送。 用户理解并接受下载或通过英勘公司产品服务取得的任何信息资料取决于用户自己，并由其承担系统受损或资料丢失的所有风险和责任。英勘公司对在服务网上得到的任何商品购物服务或交易进程，都不作担保。用户不会从英勘公司收到口头或书面的意见或信息，英勘公司也不会在这里作明确担保。<br/>
                <br/>
                九、有限责任<br/>
                英勘公司对直接、间接、偶然、特殊及继起的损害不负责任，这些损害来自:不正当使用产品服务，在网上购买商品或类似服务，在网上进行交易，非法使用服务或用户传送的信息有所变动。用户的上述行为引起对英勘公司或第三方的损害，应当依法承担责任并向英勘公司进行赔偿，英勘公司可以自行或协助第三方使用用户提供的任何信息进行维权。<br/>
                <br/>
                十、未经英勘公司同意禁止进行商业性行为<br/>
                用户承诺不经英勘公司书面同意，不能利用英勘公司各项服务在Photowall或相关网站上进行销售或其他商业性行为。用户违反此约定，英勘公司将依法追究其违约责任，由此给英勘公司造成损失的，英勘公司有权进行追偿。<br/>
                <br/>
                十一、Photowall用户信息的储存及限制<br/>
                英勘公司不对用户所发布信息的删除或储存失败负责。英勘公司保留判定用户的行为是否符合Photowall服务条款的要求和精神的权利，如果用户违背了服务条款的规定，则中断或删除其虚拟社区服务的帐号。<br/>
                <br/>
                十二、保障<br/>
                用户同意保障和维护英勘公司全体成员的利益，负责支付由用户违反本服务条款或为纠正用户的违反行为所引起的律师费用、诉讼费用、公正费用、鉴定费用、执行费用等，以及因违反服务条款的引起损害赔偿费用，其他人使用用户的电脑、帐号和其它知识产权的追索费。 如用户的密码、帐户被盗用，除非该事件由于英勘公司的过失导致，否则用户应承担被盗用期间产生的一切责任和后果。<br/>
                <br/>
                十三、结束服务<br/>
                用户或英勘公司可随时根据实际情况中断服务。英勘公司不需对任何个人或第三方负责而随时中断服务。用户若反对任何服务条款的建议或对后来的条款修改有异议，或对英勘公司服务不满，用户享有以下的追索权:<br/>
                （1）不再使用英勘公司及（或）Photowall的服务。<br/>
                （2）结束用户使用英勘公司及（或）Photowall服务的资格。<br/>
                （3）书面通告英勘公司停止该用户的服务。<br/>
                结束用户服务后，用户使用英勘公司服务的权利马上中止。从那时起，英勘公司不再对用户承担任何义务。<br/>
                <br/>
                十四、通告<br/>
                所有发给用户的通告都可通过电子邮件或常规的信件传送。英勘公司会通过邮件服务发报消息给用户，告诉他们服务条款的修改、服务变更、或其它重要事情。同时， 英勘公司保留对Photowall用户投放商业性广告的权利。<br/>
                <br/>
                十五、参与广告策划<br/>
                在英勘公司书面许可下用户可在他们发表的信息中加入宣传资料或参与广告策划，在Photowall各项免费服务上展示他们的产品。任何这类促销方法，包括运输货物、付款、服务、商业条件、担保及与广告有关的描述都只是在相应的用户和广告销售商之间发生。 英勘公司不承担任何责任，英勘公司没有义务为这类广告销售负任何一部分的责任。<br/>
                <br/>
                十六、关于Photowall增值服务业务<br/>
                (1)	只有同意Photowall制订的使用条件和条款的用户才能使用Photowall增值服务。Photowall增值服务包括但不限于商城、Photowall星战帝国、Photowall魔神战记等。Photowall增值服务条款包括但不限于本服务条款。<br/>
                (2) 支付确认是指用户用选择的支付方法申请结算后, Photowall进行的确认。 Photowall在结算时将把用户填写的内容默认为全部是事实, 填写虚假内容的用户不受到法律保护以及不会获得Photowall各项服务的保障。另外对违反本款的用户Photowall有权终止其使用Photowall提供的服务、取消其用户资格, 并不允许重新加入用户。<br/>
                (3) MM可以用Photowall指定的多种支付手段进行充值, Photowall有权通过限定月充值额等方法限制MM充值的额度。另外, 因为服务器或技术故障或漏洞等因素而出现非正常过度充值的情况, Photowall有权向用户收回非正常过多充值的MM；如非正常减少过少充值, 用户有权得到MM补充再充值。<br/>
                (4) Photowall对信誉不良的注册用户有权限制其使用MM或限制其使用相关的Photowall服务。<br/>
                (5) 如由于可归责于Photowall单方的原因致使用户购买的内容出现破损、被无故删除的情况，Photowall将为用户提供MM再充值或复原相应内容。<br/>
                (6) 用户在下列情况下, 可以通过合法程序从Photowall获赔本人直接用现金充值MM的消费。 但是Photowall要在扣除手续费及Photowall已经产生的成本后退还。（手续费及成本包括和充值相关的结算代理Photowall的结算手续费、汇款手续费等解除程序所必需的手续费相加的最小金额。）<br/>
                ① 已经进行了MM充值, 但在正常操作情况下无法使用MM服务，并且该责任全部应由Photowall承担的(但是系统定期检查等不可避免的情况除外)；<br/>
                ② 使用充值服务并已经支付款项, 但MM在3日内没有得到充值, 用户书面要求退还金额的；<br/>
                ③ 其他为保护消费者, Photowall另行规定的情况；<br/>
                ④ Photowall通知相应用户解除用户资格的情况。<br/>
                <br/>
                (7) 退还程序如下。<br/>
                ① 符合本条第（6）项①, ②, ③的情况, 希望退还金额的用户, 应在MM充值后20日内通过"1对1咨询"后书面申请退还金额。若判定合理则退还用户金额，需要用户提供Photowall的充值记录、本人签字的申请退款的书面材料、用户本人银行卡帐号相关信息、身份证复印件等相关信息，具体可咨询Photowall充值客服。退款时间以收到用户全部材料当天起20个工作日。若充值超过20天,Photowall有权依据具体情况以及成本负担等因素决定是否退还以及退还的具体数额。<br/>
                ② 对于本条第（6）项④号的情况, Photowall解除用户资格时即进行返还。<br/>
                (8) 用户还可以不申请退还, 用户通知Photowall不要求对余额进行退还的，Photowall将视为用户自愿捐献出退还金额，该捐款Photowall有权用于慈善团体、宗教团体、资助学校等公益事业。<br/>
                (9) 使用本Photowall服务时, 违反使用条款规定而被暂停中断使用的情况下, 相关用户充值的MM由Photowall暂时保管。 使用中断期结束后, Photowall将重新释放MM，用户可以继续使用。<br/>
                (10) 用户尚有金额未缴纳而提出退出用户服务时，在金额未缴纳之前不准许退出。Photowall有权要求申请退出的用户支付未纳的金额。<br/>
                (11) 解除没有利用结算手段而违法或违规获得MM的用户资格时, 剩余的MM全部消除。<br/>
                (12) 法律规定的未成年人用户进行MM充值的时候, 需要得到法定代理人的同意, 对未获得同意的未成年人Photowall有权限制其进行MM充值。除非Photowall在时候获得其法定代理人确切的同意信息，否则该限制将持续至未成年人享有完全民事行为能力时止。<br/>
                (13)为了反映用户提出的与服务相关的建议或不满并对其进行处理，Photowall将设置并运营损失处理机构，优先处理来自于用户用户的不满和建议。如果用户的咨询或投诉难以立刻处理，则Photowall将及时告知用户用户原因以及处理时间。<br/>
                (14)用户如已把MM兑换为游戏内货币的情况下,因游戏下线等第三方原因导致的MM损失Photowall不予以赔偿.<br/>
                <br/>
                十七、知识产权<br/>
                用户保证和声明对其所提供的作品拥有完整的合法的著作权或完整的合法的授权可以用于其在Photowall上从事的活动，保证英勘公司使用该作品不违反国家的法律法规，也不侵犯第三方的合法权益或承担任何义务。用户应对其所提供作品因形式、内容及授权的不完善、不合法所造成的一切后果承担完全责任。对于经用户本人创作并上传到Photowall的文本、图片、图形、音频和/ 或视频等，英勘公司保留对其网站所有内容进行实时监控的权利，并有权依其独立判断对任何违反本协议约定的作品实施删除。英勘公司对于删除用户作品引起的任何后果或导致用户的任何损失不负任何责任。因用户作品的违法或侵害第三人的合法权益而导致英勘公司或其关联公司对第三方承担任何性质的赔偿、补偿或罚款而遭受损失（直接的、间接的、偶然的、惩罚性的和继发的损失），用户对于英勘公司或其关联公司蒙受的上述损失承担全面的赔偿责任。<br/>
                <br/>
                十八、言论<br/>
                用户承诺发表言论要:爱国、守法、自律、真实、文明。不传输任何非法的、骚扰性的、中伤他人的、辱骂性的、恐吓性的、伤害性的、庸俗的，淫秽的、危害国家安全的、泄露国家机密的、破坏国家宗教政策和民族团结的以及其它违反法律法规及政策的内容。 若用户的行为不符合以上提到的服务条款， 千橡 公司将作出独立判断立即取消用户服务帐号。用户需对自己在网上的行为承担法律责任。<br/>
                <br/>
                十九、内容的所有权<br/>
                内容的定义包括:文字、软件、声音、相片、录象、图表；在广告中的全部内容；电子邮件的全部内容；Photowall虚拟社区服务为用户提供的商业信息。所有这些内容均受版权、商标、标签和其它财产所有权法律的保护。所以，用户只能在英勘公司和广告商授权下才能使用这些内容，而不能擅自复制、再造这些内容、或创造与内容有关的派生产品。<br/>
                <br/>
                二十、免责与赔偿声明<br/>
                1、若英勘公司已经明示其网络服务提供方式发生变更并提醒用户应当注意事项，用户未按要求操作所产生的一切后果由用户自行承担。<br/>
                2、用户明确同意其使用英勘公司网络服务所存在的风险将完全由其自己承担；因其使用英勘公司服务而产生的一切后果也由其自己承担，英勘公司对用户不承担任何责任。<br/>
                3、英勘公司不担保网络服务一定能满足用户的要求，也不担保网络服务不会中断，对网络服务的及时性、安全性、准确性也都不作担保。<br/>
                4、用户同意保障和维护英勘公司及其他用户的利益，由于用户登录网站内容违法、不真实、不正当、侵犯第三方合法权益，或用户违反本协议项下的任何条款而给英勘公司或任何其他第三人造成损失，用户同意承担由此造成的损害赔偿责任。<br/>
                <br/>
                二十一、法律<br/>
                用户和英勘公司一致同意有关本协议以及使用英勘公司的服务产生的争议交由仲裁解决，但是英勘公司有权选择采取诉讼方式，并有权选择受理该诉讼的有管辖权的法院。若有任何服务条款与法律相抵触，那这些条款将按尽可能接近的方法重新解析，而其它条款则保持对用户产生法律效力和影响。<br/>
                <br/>
                二十二、青少年用户特别提示<br/>
                1、青少年及使用Photowall服务应该在父母和老师的指导下，正确学习使用网络。青少年避免沉迷虚拟的网络世界而影响日常的学习生活。<br/>
                2、青少年用户必须遵守全国青少年网络文明公约:<br/>
                要善于网上学习，不浏览不良信息；<br/>
                要诚实友好交流，不侮辱欺诈他人；<br/>
                要增强自护意识，不随意约会网友；<br/>
                要维护网络安全，不破坏网络秩序；<br/>
                要有益身心健康，不沉溺虚拟时空。<br/>
                <br/>
                二十三、帐号的冻结<br/>
                Photowall帐号由用户在申请线下帐号找回业务中，如果提交信息正确，Photowall会为了用户的帐号资产安全把帐号锁定。再线下找回流程完毕后再次激活。<br/>
                <br/>
                二十四、其他<br/>
                1、	英勘公司将视向用户所提供服务内容之特性，要求用户在注册英勘公司提供的有关服务时，遵守特定的条件和条款；如该特定条件和条款与以上服务条款有任何不一致之处，则已特定条件和条款为准。<br/>
                2、本服务条款中的任何条款无论因何种原因完全或部分无效或不具有执行力，其余条款仍应有效并且有约束力。<br/>
                3、本服务条款执行过程中所产生的任何问题本网站和用户都将友好协商解决。<br/>
                4、以上条款的解释权归英勘公司最终所有。<br/>
            </p>
        </div>
        <div class="modal-footer">
            <button class="btn" data-dismiss="modal" aria-hidden="true" id="policy-declined">拒绝</button>
            <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true" id="policy-agreed">同意</button>
        </div>
    </div>
</body>
</html>