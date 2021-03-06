<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Japn
 */

get_header();
$success_mail = false;
if(isset($_POST['contact_kind'])) {
    $shugyo = $_POST['shugyo'];
    $kinmuchi = $_POST['kinmuchi'];
    $seinen = isset($_POST['seinen']) ? $_POST['seinen'] : '';
    $name_sei = isset($_POST['name_sei']) ? $_POST['name_sei'] : '';
    $name_mei = isset($_POST['name_mei']) ? $_POST['name_mei'] : '';
    $furigana_sei = isset($_POST['furigana_sei']) ? $_POST['furigana_sei'] : '';
    $furigana_mei = isset($_POST['furigana_mei']) ? $_POST['furigana_mei'] : '';
    $tel = isset($_POST['tel']) ? $_POST['tel'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    // $s_kana = isset($_POST['s_kana']) ? $_POST['s_kana'] : '';
    // $s_year = isset($_POST['s_year']) ? $_POST['s_year'] : '';
    // $s_month = isset($_POST['s_month']) ? $_POST['s_month'] : '';
    // $s_day = isset($_POST['s_day']) ? $_POST['s_day'] : '';
    // $s_gender = isset($_POST['s_gender']) ? $_POST['s_gender'] : '';
    // $s_address = isset($_POST['s_address']) ? $_POST['s_address'] : '';
    // $s_phone = isset($_POST['s_phone']) ? $_POST['s_phone'] : '';
    // $s_email = isset($_POST['s_email']) ? $_POST['s_email'] : '';
    // $s_history = isset($_POST['s_history']) ? $_POST['s_history'] : '';
    // $s_content = isset($_POST['s_content']) ? $_POST['s_content'] : '';
    // $s_agree = isset($_POST['s_agree']) ? $_POST['s_agree'] : '';
    // $s_comment = isset($_POST['s_comment']) ? $_POST['s_comment'] : '';
    $to      = 'jinsp317@163.com';
    $time = date('Y-m-d H:i:s');

    $message = "
    昼ナビのサイトからの送信です。<br/>
    ご対応をお願いいたします。<br/>
    ---------------------------------------------------------------- <br/>
    [経験のある仕事を教えてください]  <br/> ". join(',', $shugyo)."<br />
    [生年月日を入力して下さい]  <br/>".$seinen."<br />
    [希望勤務地はどこですか] ". join(',', $kinmuchi)."<br />
    
    [お名前とフリガナを教えてください] :<br />
    お名前 : ".$name_sei . ' ' . $name_mei."<br />
    フリガナ : ".$furigana_sei . ' ' . $furigana_mei ."<br />        
    [優良企業を紹介するための連絡先を教えてください] <br /> ".
    '携帯: '. $tel."<br />".
    'メールアドレス: '. $email."<br />
    ---------------------------------------------------------------- <br />
    送信時刻　　　　：" . $time . " <br />
    送信者情報      ：" . $to . " <br />";
   
        
    $subject = '昼ナビのサイトよりご登録がありました。';
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    // echo $message;
    
    if(mail($to, $subject, $message, $headers)) {
        $success_mail = true;
        // echo '<script>alert("Success!"); location.href="'.home_url().'"</script>';
    } else {
        $success_mail = true;
        // echo '<script>alert("Failed!"); location.href="'.home_url().'"</script>';
    }   
    $headers = "From: " . $to . "\r\n";
    $headers .= "Reply-To: " . $to . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    $thanks_subject = 'ご登録、ありがとうございました。';
    $thanks = '
    この度は、昼ナビにご登録をいただきありがとうございます。<br/> 
    以下の内容にて、ご登録を受け付けましたので <br/> 
    ご確認くださいませ。 <br/> 

    ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ <br/> 
    [経験のある仕事を教えてください] <br/> 
    ' . join(',', $shugyo) . ' <br/> 

    [生年月日を入力して下さい] <br/> 
    '. $seinen . ' 年 <br/> 

    [希望勤務地はどこですか？] <br/> 
    '  .  join(',', $kinmuchi)  . ' <br/>

    [お名前とフリガナを教えてください] <br/>
    お名前：'. $name_sei . ' ' . $name_mei. ' <br/>
    フリガナ：'. $furigana_sei . ' ' . $furigana_mei . ' <br/>

    [優良企業を紹介するための連絡先を教えてください] <br/>
    携帯：'. $tel . ' <br />
    メールアドレス：' . $email . '<br />
    ＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝ <br />

    内容を確認させていただいた上で、専任の担当よりご連絡をいたします。 <br />
    以下の電話番号にてご連絡をいたしますので、ご連絡があった際は <br />
    お手数ではございますが、ご対応のほどよろしくお願い申し上げます。 <br />

    休日・祝日等をのぞき、2営業日以内にご連絡をいたしますので <br />
    もし、連絡がなかった場合はご一報をいただけますと幸いです。<br />
    <br />
    <br />
    ★*…ーーーーー…*★<br />
    <br />
    昼ナビ 運営事務局<br />
    TEL :0120-560-562 <br />
    　　 03-4405-3120<br />
    <br />
    ★*…ーーーーー…*★';
    mail($email, $thanks_subject, $thanks, $headers);
}
?>
<!-- CONTAIN_START -->
<section id="contain">
    <div class="banner-block-hp">
        <div class="banner-overlay-block-hp">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 banner-block-in-hp">
                        <div class="banner-middle-hp">
                            <div class="banner-left-hp"></div>
                            <div class="banner-right-hp">
                                <div class="banner-right-in-hp">
                                    <div class="banner-right-details-hp">
                                        <?php if(wp_is_mobile()) { ?>
                                            <h1 class="text-left mb-1"><span>Hiru</span> <br/> &nbsp;&nbsp;&nbsp;Navi</h1>
                                        <?php } else { ?>
                                            <h1><span>Hiru</span> Navi</h1>
                                        <?php } ?>
                                        
                                        <p>〜最短<span>2週間</span>で昼職へ〜</p>
                                        <div class="banner-info-hp">
                                            <p>
                                                夜職→昼職への転職専門サービス！<br>
                                                夜職卒業を<span>完全無料</span>でサポートします！
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="form-block-hp">
        <div class="container">
            <div class="form-row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 about-block-in-ip">
                    <form id="reservation" method="POST" action="">
                        <input type="hidden" name="contact_kind" value="1" />
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 form-block-in-hp">
                                <div class="form-title-hp">
                                    <div class="form-logo-hp" id="form_consult">
                                        <img src="<?php echo get_stylesheet_directory_uri() ?>/images/form_logo.png"
                                            alt="" />
                                    </div>
                                    <div class="form-title-name-hp">
                                        夜職→昼職への転職を「全て無料」でサポートします。<br>
                                        履歴書や職務経歴書の作成も私たちに全てお任せください。
                                    </div>
                                    <div class="form-title-tags-hp">
                                        <div class="form-title-tags-in-hp">45秒で登録</div>
                                        <div class="form-title-tags-in-hp">履歴書、職務経歴書必要なし</div>
                                        <div class="form-title-tags-in-hp">ビジネスマナーや面接対策もお教えします</div>
                                    </div>
                                </div>
                                <div class="form-middle-hp">
                                    <div class="form-middle-main-hp">
                                        <div class="form-middle-main-border-hp ">
                                            <?php if(!$success_mail) {?>
                                            <div class="steps-hp ">
                                                <div class="step-hp step-1-hp active">1
                                                    <br><span>就業状況</span>
                                                </div>
                                                <div class="step-hp step-2-hp">2
                                                    <br><span>生年月日</span>
                                                </div>
                                                <div class="step-hp step-3-hp">3
                                                    <br><span>希望勤務地</span>
                                                </div>
                                                <div class="step-hp step-4-hp">4
                                                    <br><span>お名前</span>
                                                </div>
                                                <div class="step-hp step-5-hp">5
                                                    <br><span>連絡先</span>
                                                </div>

                                            </div>
                                            <?php } ?>
                                            <div class="form-boxes-hp">
                                                <?php if(!$success_mail) {?>
                                                <div class="form-boxes-in-hp form-boxes-1-hp">
                                                    <div class="form-number-hp">
                                                        <span>Q1</span>
                                                    </div>
                                                    <div class="form-title-hp">
                                                        <h2>経験のある仕事を<br>教えてください<span>（複数選択可）</span>
                                                        </h2>
                                                    </div>
                                                    <div class="form-option-hp">
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="girls" class="q1"
                                                                value="ガールズバー">
                                                            <label for="girls" class="">ガールズバー</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="caba" class="q1"
                                                                value="キャバクラ">
                                                            <label for="caba" class="">キャバクラ</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="rounge"
                                                                class="q1" value="ラウンジ">
                                                            <label for="rounge" class="">ラウンジ</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="snack" class="q1"
                                                                value="スナック">
                                                            <label for="snack" class="">スナック</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="mens" class="q1"
                                                                value="メンズエステ">
                                                            <label for="mens" class="">メンズエステ</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="fuzoku"
                                                                class="q1" value="風俗">
                                                            <label for="fuzoku" class="">風俗</label>
                                                        </div>
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="shugyo[]" id="other" class="q1"
                                                                value="その他">
                                                            <label for="other" class="">その他</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_1"
                                                            disabled>次のステップへ</button>
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>まずは<br>最初のステップ！</span>
                                                        </p>
                                                        <div class="staff"><img
                                                                src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-boxes-in-hp form-boxes-2-hp" style="display:none;">
                                                    <div class="form-number-hp">
                                                        <span>Q2</span>
                                                    </div>
                                                    <div class="form-title-hp">
                                                        <h2>生まれた年を入力してください</h2>
                                                    </div>
                                                    <div class="form-option-hp form-option-2-hp ">
                                                        <div class="form-hp form-2-hp">
                                                            <p class="year">西暦</p>
                                                            <div class="detail">
                                                                <input required="" type="text" name="seinen" id="seinen"
                                                                    placeholder="生まれた年" value="">
                                                            </div>
                                                            <p class="year">年</p>
                                                        </div>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_2"
                                                            disabled>次のステップへ</button>
                                                    </div>
                                                    <div class="back-hp">
                                                        <input type="button" class="back_btn back_btn_2"
                                                            value="戻って修正する">
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>生まれた年を<br>ご記入ください</span>
                                                        </p>
                                                        <div class="staff"><img
                                                                src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-boxes-in-hp form-boxes-3-hp" style="display:none;">
                                                    <div class="form-number-hp">
                                                        <span>Q3</span>
                                                    </div>
                                                    <div class="form-title-hp">
                                                        <h2>希望勤務地はどこですか？</h2>
                                                    </div>
                                                    <div class="form-option-hp form-option-3-hp">
                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="tokyo" value="東京">
                                                            <label for="tokyo">東京</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="kanagawa" value="神奈川">
                                                            <label for="kanagawa">神奈川</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="chiba" value="千葉">
                                                            <label for="chiba">千葉</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="saitama" value="埼玉">
                                                            <label for="saitama">埼玉</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="osaka" value="大阪">
                                                            <label for="osaka">大阪</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="kyoto" value="京都">
                                                            <label for="kyoto">京都</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="hyogo" value="兵庫">
                                                            <label for="hyogo">兵庫</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="nara" value="奈良">
                                                            <label for="nara">奈良</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="fukuoka" value="福岡">
                                                            <label for="fukuoka">福岡</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="aichi" value="愛知">
                                                            <label for="aichi">愛知</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="sapporo" value="札幌">
                                                            <label for="sapporo">札幌</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3"
                                                                id="miyagi" value="宮城">
                                                            <label for="miyagi">宮城</label>
                                                        </div>
                                                        <!--form-->

                                                        <div class="form-hp">
                                                            <input type="checkbox" name="kinmuchi[]" class="q3" id="all"
                                                                value="全国">
                                                            <label for="all">全国</label>
                                                        </div>
                                                        <!--form-->
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_3"
                                                            disabled>次のステップへ</button>
                                                    </div>
                                                    <div class="back-hp">
                                                        <input type="button" class="back_btn back_btn_3"
                                                            value="戻って修正する">
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>ご希望の勤務地を<br>教えてください</span>
                                                        </p>
                                                        <div class="staff"><img
                                                                src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-boxes-in-hp form-boxes-4-hp" style="display:none;">
                                                    <div class="form-number-hp">
                                                        <span>Q4</span>
                                                    </div>
                                                    <div class="form-title-hp">
                                                        <h2>お名前とフリガナを教えてください</h2>
                                                    </div>
                                                    <div class="form-option-hp form-option-4-hp">
                                                        <div class="form-hp">
                                                            <p class="item">お名前</p>
                                                            <div class="detail">
                                                                <input required type="text" class="name1"
                                                                    name="name_sei" placeholder="姓" id="name_sei"
                                                                    value="">
                                                                <input type="text" class="name1" name="name_mei"
                                                                    placeholder="名" id="name_mei" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-hp">
                                                            <p class="item">フリガナ</p>
                                                            <div class="detail">
                                                                <input required type="text" class="name2"
                                                                    name="furigana_sei" placeholder="セイ" value=""
                                                                    id="furigana_sei">
                                                                <input type="text" class="name2" name="furigana_mei"
                                                                    placeholder="メイ" value="" id="furigana_mei">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_4"
                                                            disabled>次のステップへ</button>
                                                    </div>
                                                    <div class="back-hp">
                                                        <input type="button" class="back_btn back_btn_4"
                                                            value="次のステップへ">
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment"><span>あと一息です！</span>
                                                        </p>
                                                        <div class="staff"><img
                                                                src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-boxes-in-hp form-boxes-5-hp" style="display:none;">
                                                    <div class="form-number-hp">
                                                        <span>Q5</span>
                                                    </div>
                                                    <div class="form-title-hp">
                                                        <h2>優良企業を紹介するための<br>連絡先を教えてください</h2>
                                                    </div>
                                                    <div class="form-option-hp form-option-4-hp form-option-5-hp">
                                                        <div class="form-hp">
                                                            <p class="item">携帯番号</p>
                                                            <div class="detail"><input required="" type="tel"
                                                                    class="tel" name="tel" id="tel"
                                                                    placeholder="000-0000-0000" value="">
                                                            </div>
                                                        </div>
                                                        <div class="form-hp form-email-hp">
                                                            <p class="item">メールアドレス</p>
                                                            <div class="detail">
                                                                <input required="" type="email" class="email"
                                                                    name="email" id="email" placeholder="xxx@xxx.xxx"
                                                                    value="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_5"
                                                            disabled>確認する</button>
                                                    </div>
                                                    <div class="back-hp">
                                                        <input type="button" class="back_btn back_btn_5"
                                                            value="戻って修正する">
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>これが<br>最後の質問です！</span>
                                                        </p>
                                                        <div class="staff">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-boxes-in-hp form-boxes-6-hp" style="display: none">
                                                    <p class="check_p4 text-center h1">CHECK</p>
                                                    <h2 class="text-center">入力に間違いはありませんか？</h2>
                                                    <div class="forms container mt-2">
                                                        <div class="form-item top_border">
                                                            <p class="form_query font-weight-bold">
                                                                現在就業していますか？</p>
                                                            <p id="answer_1" class="mt-1">
                                                            </p>
                                                        </div>

                                                        <div class="form-item">
                                                            <p class="form_query font-weight-bold">
                                                                生年月日を入力して下さい</p>
                                                            <p id="answer_2" class="mt-1">
                                                            </p>
                                                        </div>

                                                        <div class="form-item">
                                                            <p class="form_query font-weight-bold">
                                                                希望勤務地はどこですか？</p>
                                                            <p id="answer_3" class="mt-1">
                                                            </p>
                                                        </div>

                                                        <div class="form-item">
                                                            <p class="form_query font-weight-bold">
                                                                お名前とフリガナを教えてください</p>
                                                            <p class="mt-1">
                                                                <span class="text-muted">お名前：</span>
                                                                <span id="name_i"></span>
                                                            </p>
                                                            <p>
                                                                <span class="text-muted">フリガナ：</span>
                                                                <span id="furigana"></span>
                                                            </p>
                                                        </div>

                                                        <div class="form-item">
                                                            <p class="form_query font-weight-bold">
                                                                優良企業を紹介するための連絡先を教えてください</p>
                                                            <p class="mt-1">
                                                                <span class="text-muted">携帯：</span>
                                                                <span id="tel_txt"></span>
                                                            </p>
                                                            <p>
                                                                <span class="text-muted">メールアドレス：</span>
                                                                <span id="email_txt"></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_6">送信する</button>
                                                    </div>
                                                    <div class="back-hp">
                                                        <input type="button" class="back_btn back_btn_6"
                                                            value="戻って修正する">
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>最終確認を<br />お願いいたします！</span>
                                                        </p>
                                                        <div class="staff">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } else {?>
                                                <div class="form-boxes-in-hp form-boxes-7-hp text-center">
                                                    <h2 class="text-center">送信完了</h2>
                                                    <div class="forms container mt-2">
                                                        <p class="py-4 h5">
                                                            昼ナビへのエントリーを受け付けました。<br />
                                                            確認メールをお送りさせていただいております。<br />
                                                            内容確認後、担当者よりご連絡させていただきます。<br />
                                                        </p>
                                                        <p class="text-danger py-4">
                                                            自動返信メールが届かない場合は、<br />
                                                            フォーム内容が送信出来ていない可能性がございます。<br />
                                                            お手数をおかけいたしますが、再度ご入力いただくか、<br />
                                                            直接お電話にてお問い合わせください。<br />
                                                        </p>
                                                    </div>
                                                    <div class="form-btn-main-hp">
                                                        <button type="button"
                                                            class="common-btn-hp form-btn-hp submit_btn_7">ホームへ戻る</button>
                                                    </div>
                                                    <div class="guidance-hp">
                                                        <p class="comment">
                                                            <span>送信が<br />完了しました！</span>
                                                        </p>
                                                        <div class="staff">
                                                            <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/staff.png"
                                                                alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="daytime-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 daytime-block-in-hp">
                    <div class="daytime-middle-hp">
                        <div class="daytime-top-hp">
                            <div class="daytime-top-in-hp"
                                style="background:url(<?php echo get_stylesheet_directory_uri() ?>/images/daytime_banner.png) no-repeat center center; background-size:cover;">
                                <div class="daytime-right-hp">
                                    <h2 id="about_hiru">Hiru Navi</h2>
                                    <p>昼ナビは、キャバクラ・クラブ・ボーイ・黒服などのナイトワークの方々が昼職に転職に転職したいと考えた時に感じる「履歴書の書き方が分からない」・「自分にあった仕事が分からない」・「昼職の実情が分からない」といったお悩みをアドバイザーが一人ひとりに真剣に向き合い、お話しした上で全て解消し、希望や適正に応じたお仕事をご紹介します。
                                    </p>
                                    <div class="daytime-btn-hp">
                                        <a href="#form_consult" class="common-btn-hp">お問い合わせはこちら</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="trouble-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 trouble-block-in-hp">
                    <div class="trouble-middle-hp">
                        <div class="trouble-top-hp">
                            <h2>Trouble</h2>
                            <div class="trouble-title-hp">
                                <h3>昼職への転職でお困りのあなた！</h3>
                            </div>
                            <div class="trouble-desc-hp">
                                キャバクラやガールズバーなどの夜職から昼職への転職を決意したものの、<br>
                                <span>「昼職のイメージができていない」、「何からしたらいいのか分からない」、「適職が分からない」、</span><br>
                                <span>「夜職に偏見をもたれ、書類選考すら通過しないのでは」</span>など不安やお困り事がありませんか。
                            </div>
                        </div>
                        <div class="trouble-bottom-hp">
                            <div class="trouble-box-hp hp_left">
                                <div class="trouble-box-in-hp ">
                                    履歴書の書き方が<br>
                                    わからない
                                </div>
                            </div>
                            <div class="trouble-img-hp hp_right">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/trouble_img.png" alt="" />
                            </div>
                            <div class="trouble-box-hp hp_left">
                                <div class="trouble-box-in-hp ">
                                    向いている昼職が<br>
                                    わからない、<br>
                                    イメージがつかない
                                </div>
                            </div>
                        </div>
                        <div class="trouble-img-hp_android">
                            <img src="<?php echo get_stylesheet_directory_uri() ?>/images/trouble_img.png" alt="" />
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="solution-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 solution-block-in-hp">
                    <div class="solution-middle-hp">
                        <div class="solution-top-hp">
                            <h2>Solution</h2>
                            <div class="solution-title-hp">
                                <h3>昼ナビが全て解決します！</h3>
                            </div>
                        </div>
                        <div class="solution-desc-hp">
                            <p class="text-center">
                                実績豊富な夜職出身のアドバイザーがあなたを全力でサポートし、不安や心配事を全て解消します。<br>
                                例えば、適職が分からない方には、『面談を通して、1万7千以上ある職種の中からあなたに最適なお仕事をご紹介』。<br>
                                昼職のイメージができていない方には、『仕事内容の詳細や、その仕事を通して感じることができるやりがい、大変なポイントを丁寧にお伝え』。<br>
                                また、夜職への偏見があるのではと心配している方には、『夜職に対して、ポジティブなイメージを持っている企業のご紹介』など、夜職の方に特化しているからこそのサポート体制を実現しています。<br>
                                さらに、面談から履歴書作成、面接対策なども手厚く、アドバイザー自身の昼職での実体験や、転職に成功した求職者様の体験談などもお話します。
                            </p>
                            <div class="solution-btn-hp">
                                <a  class="common-btn-hp no-cursor">不安が期待に変わる。そんな一人ひとりに寄り添った転職支援サービスが昼ナビです。</a>
                            </div>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="merit-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 merit-block-in-hp">
                    <div class="merit-middle-hp">
                        <div class="solution-top-hp merit-top-hp" id="merit-top-hp">
                            <h2>Hiru Navi Merit</h2>
                            <div class="solution-title-hp">
                                <h3>昼ナビ利用の３つのメリット</h3>
                            </div>
                        </div>
                        <div class="merit-precess-main-mp">
                            <div class="merit-box-mp">
                                <a href="#merit_1">
                                    <div class="merit-number-mp">Merit <span>1</span></div>
                                    <div class="merit-name-mp">
                                        <span>
                                            アドバイザーが<br>
                                            夜職出身者
                                        </span>
                                    </div>
                                    <div class="merit-arrow-mp"><img
                                            src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_arrow.svg"
                                            alt=""></div>
                                </a>
                            </div>
                            <div class="merit-box-mp">
                                <a href="#merit_2">
                                    <div class="merit-number-mp">Merit <span>2</span></div>
                                    <div class="merit-name-mp">
                                        <span>
                                            履歴書不要
                                        </span>
                                    </div>
                                    <div class="merit-arrow-mp"><img
                                            src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_arrow.svg"
                                            alt=""></div>
                                </a>
                            </div>
                            <div class="merit-box-mp">
                                <a href="#merit_3">
                                    <div class="merit-number-mp">Merit <span>3</span></div>
                                    <div class="merit-name-mp">
                                        <span>
                                            夜職が<br>
                                            職歴になる
                                        </span>
                                    </div>
                                    <div class="merit-arrow-mp"><img
                                            src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_arrow.svg"
                                            alt=""></div>
                                </a>
                            </div>
                        </div>
                        <div class="merit-info-hp">
                            <div class="merit-box-hp">
                                <div class="merit-box-left-hp">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_img1.png"
                                        alt="" />
                                </div>
                                <div class="merit-box-right-hp">
                                    <div class="merit-box-title-hp" id="merit_1">
                                        <div class="merit-number-mp">Merit <span>1</span></div>
                                        <div class="merit-box-name-hp">アドバイザーが夜職出身者</div>
                                    </div>
                                    <p>「夜職出身という職歴を不安に感じる」「夜職に偏見のある人が多かったらどうしよう…」夜職から昼職への転職を考えている皆さんが抱える不安や心配事の数々。こんな悩みをプロのキャリアアドバイザーが、求職者面談から入社までの一連の流れをまんべんなくサポート。同じ夜職出身なので、あなたの抱える不安はとてもよく分かります。また、昼職に関する知識が豊富なので、希望やあなたの強みを活かせるお仕事を案内する事が可能です。1人1人に寄り添い、納得・満足のできる転職へと導きます。
                                    </p>
                                </div>
                            </div>
                            <div class="merit-box-hp">
                                <div class="merit-box-left-hp">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_img2.png"
                                        alt="" />
                                </div>
                                <div class="merit-box-right-hp">
                                    <div class="merit-box-title-hp" id="merit_2">
                                        <div class="merit-number-mp">Merit <span>2</span></div>
                                        <div class="merit-box-name-hp">履歴書不要</div>
                                    </div>
                                    <p>応募時に必要な、履歴書・職務経歴書の作成は一緒に行います。「履歴書・職務経歴書の文章の作り方って難しそう」「書類選考に通過できるような内容を書けるか不安」「そもそも自分の強みが何なのか分からない」そんなあなたも大丈夫！文章の作成方法だけでなく、強みや自己PRなど内容を考えるところからお手伝いします。夜職で培ってきた経験・スキルはあなたのアピールポイントになるはず。この強みを企業へアピールしましょう！履歴書作成だけでなく、面接対策も行いますので沢山私たちを頼ってくださいね。
                                    </p>
                                </div>
                            </div>
                            <div class="merit-box-hp">
                                <div class="merit-box-left-hp">
                                    <img src="<?php echo get_stylesheet_directory_uri() ?>/images/merit_img3.png"
                                        alt="" />
                                </div>
                                <div class="merit-box-right-hp">
                                    <div class="merit-box-title-hp" id="merit_3">
                                        <div class="merit-number-mp">Merit <span>3</span></div>
                                        <div class="merit-box-name-hp">夜職が職歴になる</div>
                                    </div>
                                    <p>昼職で働いた事がなくても大丈夫。夜職はあなたの立派なキャリアですし、これまでの経験・スキルは最大の武器となります。様々な方と関わる事で身につけたコミュニケーション能力や気遣いは、どんな仕事をする上でも大切な要素。実は、夜職出身の方のコミュニケーション能力は平均して秀でている事が多いんです。自分では見つけられなかった、あなたの良さをキャリアアドバイザーが引き出します。培ってきたスキルを唯一無二の強み・アピールポイントとして、昼職への転職を成功させましょう！
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="daytime-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 daytime-block-in-hp">
                    <div class="daytime-middle-hp">
                        <div class="daytime-top-hp">
                            <div class="daytime-top-in-hp"
                                style="background:url(<?php echo get_stylesheet_directory_uri() ?>/images/daytime_banner.png) no-repeat center center; background-size:cover;">
                                <div class="daytime-right-hp">
                                    <h2>Hiru Navi</h2>
                                    <p>昼ナビは、キャバクラ・クラブ・ボーイ・黒服などのナイトワークの方々が昼職に転職に転職したいと考えた時に感じる「履歴書の書き方が分からない」・「自分にあった仕事が分からない」・「昼職の実情が分からない」といったお悩みをアドバイザーが一人ひとりに真剣に向き合い、お話しした上で全て解消し、希望や適正に応じたお仕事をご紹介します。
                                    </p>
                                    <div class="daytime-btn-hp">
                                        <a href="#form_consult" class="common-btn-hp">お問い合わせはこちら</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="work-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 work-block-in-hp">
                    <div class="solution-top-hp merit-top-hp" id="work_example">
                        <h2>Work Example</h2>
                        <div class="solution-title-hp">
                            <h3>お仕事例</h3>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="work-middle-hp">
            <div class="owl-carousel owl-theme" id="work_slider">

                <?php
                    $args = array(
                        'post_type' => 'example',
                        'posts_per_page' => 9);            
                        $the_query = new WP_Query($args); 
                     ?>
                <?php if ($the_query->have_posts()): ?>
                <?php while ($the_query->have_posts()): $the_query->the_post();?>
                <div class="work-box-hp">
                    <a href="<?php echo get_site_url(); ?>/example/<?php the_title() ?>">
                        <div class="work-box-img-hp">
                            <?php 
                               $logo = get_field('log'); 
                                                    if( !empty( $logo ) ): ?>
                            <img src="<?php echo esc_url($logo['url']); ?>"
                                alt="<?php echo esc_attr($logo['alt']); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="work-box-text-hp">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_field('company') ?></p>
                        </div>
                    </a>
                </div>
                <?php endwhile;
                                        wp_reset_postdata();?>
                <?php else: ?>
                <p></p>
                <?php endif;?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="changer-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 changer-block-in-hp">
                    <div class="solution-top-hp merit-top-hp" id="voice_job_changer">
                        <h2>Voice of Job Changer</h2>
                        <div class="solution-title-hp">
                            <h3>転職者の声</h3>
                        </div>
                    </div>
                    <div class="changer-middle-hp">
                        <div class="changer-tabs-hp">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-tab1-tab" data-toggle="pill" href="#pills-tab1"
                                        role="tab" aria-controls="pills-tab1" aria-selected="true">
                                        Oさん（営業職）<br>
                                        勤務先：XXXX株式会社
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-tab2-tab" data-toggle="pill" href="#pills-tab2"
                                        role="tab" aria-controls="pills-tab2" aria-selected="false">
                                        Oさん（接客業）<br>
                                        勤務先：XXXX株式会社
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-tab3-tab" data-toggle="pill" href="#pills-tab3"
                                        role="tab" aria-controls="pills-tab3" aria-selected="false">
                                        Oさん（美容職）<br>
                                        勤務先：XXXX株式会社
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-tab4-tab" data-toggle="pill" href="#pills-tab4"
                                        role="tab" aria-controls="pills-tab4" aria-selected="false">
                                        Oさん（事務職）<br>
                                        勤務先：XXXX株式会社
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-tab1" role="tabpanel"
                                    aria-labelledby="pills-tab1-tab">
                                    <div class="changer-details-hp">
                                        <div class="changer-details-left-hp">
                                            <div class="changer-img-hp">
                                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tab_img1.png"
                                                    alt="" />
                                            </div>
                                            <div class="changer-info-hp">
                                                <h3>
                                                    Oさん（営業職）<br>
                                                    勤務先：XXXX株式会社
                                                </h3>
                                                <p>
                                                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="changer-details-right-hp">
                                            <h2>営業職</h2>
                                            <div class="changer-text-hp">
                                                <h3>転職しようと思ったきかっけと営業職を選んだ理由</h3>
                                                <p>々一生できる仕事ではない、25歳くらいで辞めようと思っていたので、年齢とともに昼職への転職を決めました。営業職は考えていなかったのですが、アドバイザーさんとの面談を通してやりがいを感じる事や仕事で大切にしていることが営業職にマッチしたので営業職をすることに決めました。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>仕事のやりがい</h3>
                                                <p>
                                                    夜職同様、数字を上げたらその分評価されることにすごくやりがいを感じています！<br>
                                                    目標を達成した分、インセンティブも支給されるので、夜職までとは言えないですが、しっかりと稼ぐこともできます。なにより、成果次第でどんどんキャリアアップもできる環境なので、売上だけではなく、将来の目標もできて充実しています！
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>昼ナビを利用した感想</h3>
                                                <p>丁寧な面談のおかげで、やりがいのある昼職に就けて満足しています。初めは営業職というもののイメージが沸かず、選択肢にはありませんでした。ですが、面談の中でどんなことにやりがいを感じるか、何を大切にして働きたいかなどを丁寧に聞いてもらううちに、自分の中で整理ができました。「売上を作ること、数字を追うことが好き」で、「目に見える成果で正しく評価されること」にやりがいを感じることが分かり、それが叶う企業を紹介してもらいました。一人では出会えなかった仕事なので感謝しています。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>求職者へのメッセージ</h3>
                                                <p>私のように、夜職を一生の仕事にしようと思ってなかったけど、昼職への不安から行動できない方は、まずは昼ナビに相談をしてみる事から始めるのがオススメです！
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-tab2" role="tabpanel"
                                    aria-labelledby="pills-tab2-tab">
                                    <div class="changer-details-hp">
                                        <div class="changer-details-left-hp">
                                            <div class="changer-img-hp">
                                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tab_img1.png"
                                                    alt="" />
                                            </div>
                                            <div class="changer-info-hp">
                                                <h3>
                                                    Oさん（接客業）<br>
                                                    勤務先：XXXX株式会社
                                                </h3>
                                                <p>
                                                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="changer-details-right-hp">
                                            <h2>営業職</h2>
                                            <div class="changer-text-hp">
                                                <h3>転職しようと思ったきかっけと営業職を選んだ理由</h3>
                                                <p>々一生できる仕事ではない、25歳くらいで辞めようと思っていたので、年齢とともに昼職への転職を決めました。営業職は考えていなかったのですが、アドバイザーさんとの面談を通してやりがいを感じる事や仕事で大切にしていることが営業職にマッチしたので営業職をすることに決めました。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>仕事のやりがい</h3>
                                                <p>
                                                    夜職同様、数字を上げたらその分評価されることにすごくやりがいを感じています！<br>
                                                    目標を達成した分、インセンティブも支給されるので、夜職までとは言えないですが、しっかりと稼ぐこともできます。なにより、成果次第でどんどんキャリアアップもできる環境なので、売上だけではなく、将来の目標もできて充実しています！
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>昼ナビを利用した感想</h3>
                                                <p>丁寧な面談のおかげで、やりがいのある昼職に就けて満足しています。初めは営業職というもののイメージが沸かず、選択肢にはありませんでした。ですが、面談の中でどんなことにやりがいを感じるか、何を大切にして働きたいかなどを丁寧に聞いてもらううちに、自分の中で整理ができました。「売上を作ること、数字を追うことが好き」で、「目に見える成果で正しく評価されること」にやりがいを感じることが分かり、それが叶う企業を紹介してもらいました。一人では出会えなかった仕事なので感謝しています。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>求職者へのメッセージ</h3>
                                                <p>私のように、夜職を一生の仕事にしようと思ってなかったけど、昼職への不安から行動できない方は、まずは昼ナビに相談をしてみる事から始めるのがオススメです！
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-tab3" role="tabpanel"
                                    aria-labelledby="pills-tab3-tab">
                                    <div class="changer-details-hp">
                                        <div class="changer-details-left-hp">
                                            <div class="changer-img-hp">
                                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tab_img1.png"
                                                    alt="" />
                                            </div>
                                            <div class="changer-info-hp">
                                                <h3>
                                                    Oさん（美容職）<br>
                                                    勤務先：XXXX株式会社
                                                </h3>
                                                <p>
                                                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="changer-details-right-hp">
                                            <h2>営業職</h2>
                                            <div class="changer-text-hp">
                                                <h3>転職しようと思ったきかっけと営業職を選んだ理由</h3>
                                                <p>々一生できる仕事ではない、25歳くらいで辞めようと思っていたので、年齢とともに昼職への転職を決めました。営業職は考えていなかったのですが、アドバイザーさんとの面談を通してやりがいを感じる事や仕事で大切にしていることが営業職にマッチしたので営業職をすることに決めました。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>仕事のやりがい</h3>
                                                <p>
                                                    夜職同様、数字を上げたらその分評価されることにすごくやりがいを感じています！<br>
                                                    目標を達成した分、インセンティブも支給されるので、夜職までとは言えないですが、しっかりと稼ぐこともできます。なにより、成果次第でどんどんキャリアアップもできる環境なので、売上だけではなく、将来の目標もできて充実しています！
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>昼ナビを利用した感想</h3>
                                                <p>丁寧な面談のおかげで、やりがいのある昼職に就けて満足しています。初めは営業職というもののイメージが沸かず、選択肢にはありませんでした。ですが、面談の中でどんなことにやりがいを感じるか、何を大切にして働きたいかなどを丁寧に聞いてもらううちに、自分の中で整理ができました。「売上を作ること、数字を追うことが好き」で、「目に見える成果で正しく評価されること」にやりがいを感じることが分かり、それが叶う企業を紹介してもらいました。一人では出会えなかった仕事なので感謝しています。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>求職者へのメッセージ</h3>
                                                <p>私のように、夜職を一生の仕事にしようと思ってなかったけど、昼職への不安から行動できない方は、まずは昼ナビに相談をしてみる事から始めるのがオススメです！
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-tab4" role="tabpanel"
                                    aria-labelledby="pills-tab4-tab">
                                    <div class="changer-details-hp">
                                        <div class="changer-details-left-hp">
                                            <div class="changer-img-hp">
                                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/tab_img1.png"
                                                    alt="" />
                                            </div>
                                            <div class="changer-info-hp">
                                                <h3>
                                                    Oさん（事務職）<br>
                                                    勤務先：XXXX株式会社
                                                </h3>
                                                <p>
                                                    ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。
                                                </p>
                                            </div>
                                        </div>
                                        <div class="changer-details-right-hp">
                                            <h2>営業職</h2>
                                            <div class="changer-text-hp">
                                                <h3>転職しようと思ったきかっけと営業職を選んだ理由</h3>
                                                <p>々一生できる仕事ではない、25歳くらいで辞めようと思っていたので、年齢とともに昼職への転職を決めました。営業職は考えていなかったのですが、アドバイザーさんとの面談を通してやりがいを感じる事や仕事で大切にしていることが営業職にマッチしたので営業職をすることに決めました。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>仕事のやりがい</h3>
                                                <p>
                                                    夜職同様、数字を上げたらその分評価されることにすごくやりがいを感じています！<br>
                                                    目標を達成した分、インセンティブも支給されるので、夜職までとは言えないですが、しっかりと稼ぐこともできます。なにより、成果次第でどんどんキャリアアップもできる環境なので、売上だけではなく、将来の目標もできて充実しています！
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>昼ナビを利用した感想</h3>
                                                <p>丁寧な面談のおかげで、やりがいのある昼職に就けて満足しています。初めは営業職というもののイメージが沸かず、選択肢にはありませんでした。ですが、面談の中でどんなことにやりがいを感じるか、何を大切にして働きたいかなどを丁寧に聞いてもらううちに、自分の中で整理ができました。「売上を作ること、数字を追うことが好き」で、「目に見える成果で正しく評価されること」にやりがいを感じることが分かり、それが叶う企業を紹介してもらいました。一人では出会えなかった仕事なので感謝しています。
                                                </p>
                                            </div>
                                            <div class="changer-text-hp">
                                                <h3>求職者へのメッセージ</h3>
                                                <p>私のように、夜職を一生の仕事にしようと思ってなかったけど、昼職への不安から行動できない方は、まずは昼ナビに相談をしてみる事から始めるのがオススメです！
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="daytime-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 daytime-block-in-hp">
                    <div class="daytime-middle-hp">
                        <div class="daytime-top-hp">
                            <div class="daytime-top-in-hp"
                                style="background:url(<?php echo get_stylesheet_directory_uri() ?>/images/daytime_banner.png) no-repeat center center; background-size:cover;">
                                <div class="daytime-right-hp">
                                    <h2>Hiru Navi</h2>
                                    <p>昼ナビは、キャバクラ・クラブ・ボーイ・黒服などのナイトワークの方々が昼職に転職に転職したいと考えた時に感じる「履歴書の書き方が分からない」・「自分にあった仕事が分からない」・「昼職の実情が分からない」といったお悩みをアドバイザーが一人ひとりに真剣に向き合い、お話しした上で全て解消し、希望や適正に応じたお仕事をご紹介します。
                                    </p>
                                    <div class="daytime-btn-hp">
                                        <a href="#form_consult" class="common-btn-hp">お問い合わせはこちら</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="flow-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 flow-block-in-hp">
                    <div class="solution-top-hp merit-top-hp" id="flow_step">
                        <h2>Flow</h2>
                        <div class="solution-title-hp">
                            <h3>転職完了までのステップ</h3>
                        </div>
                    </div>
                    <div class="work-middle-hp">
                        <div class="flow-fp">
                            <ul>
                                <li>
                                    <div class="flow-step-fp">Step<span>1</span></div>
                                    <div class="flow-name-fp">電話・ヒアリング</div>
                                </li>
                                <li>
                                    <div class="flow-step-fp">Step<span>2</span></div>
                                    <div class="flow-name-fp">面談・書類作成<br>・求人提案</div>
                                </li>
                                <li>
                                    <div class="flow-step-fp">Step<span>3</span></div>
                                    <div class="flow-name-fp">面接対策</div>
                                </li>
                                <li>
                                    <div class="flow-step-fp">Step<span>4</span></div>
                                    <div class="flow-name-fp">面接</div>
                                </li>
                                <li>
                                    <div class="flow-step-fp">Step<span>5</span></div>
                                    <div class="flow-name-fp">内定<br>諸条件の確認</div>
                                </li>
                                <li>
                                    <div class="flow-step-fp">Step<span>6</span></div>
                                    <div class="flow-name-fp">内定承諾・入社</div>
                                </li>
                            </ul>
                        </div>
                        <div class="flow-list-main-fp">
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>1</span></div>
                                    <div class="flow-list-name-fp">電話・ヒアリング</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        昼職の業界・職種に精通した専任のキャリアアドバイザーが、あなたの経歴や昼職で挑戦したい仕事内容・希望条件等をお伺いします。<br>
                                        しっかりお話をした上で、あなたに合った求人の紹介やキャリアプランの提案を行います。転職は不安が付き物だと思いますので、心配な事やお困り事は何でもお伝えくださいね。キャリアアドバイザーがあなたの不安に寄り添い、夜職から昼職へのサポートを行います。
                                    </p>
                                </div>
                            </div>
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>2</span></div>
                                    <div class="flow-list-name-fp">面談・書類作成<br>・求人提案</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        電話ヒアリングでお伺いした内容を元に、今後の描きたいキャリア・あなたの強みや弱みの整理をします。堅くならず、夜職での経験や将来の夢なども交えながらざっくばらんにお話ししましょう！<br>
                                        その後キャリアアドバイザーと共に、アピールポイントがより魅力的に伝わるような履歴書・職務経歴書を作成。また将来のキャリアプランがイメージできた段階で、面談での内容を元にあなたに合う求人をご紹介します。
                                    </p>
                                </div>
                            </div>
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>3</span></div>
                                    <div class="flow-list-name-fp">面接対策</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        応募したい企業が決まったら面接対策を行います。お教えするのは入退室時などの基本的なマナーから、転職理由や志望動機といった面接時に必ず聞かれる質問への答え方など。また、表情や声のトーン・スピードなど話し方についても一緒に練習します。不安がなくなるまで練習を行うので、当日は自信を持って面接に臨む事が可能！<br>
                                        キャリアアドバイザーに沢山相談・アドバイスをもらい、面接をクリアしていきましょう。
                                    </p>
                                </div>
                            </div>
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>4</span></div>
                                    <div class="flow-list-name-fp">面接</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        企業によって選考フローは異なりますが、書類選考の後に1次面接・2次面接・最終面接とステップを踏む事がほとんど。面接日の調整はキャリアアドバイザーにお任せください。<br>
                                        自分で企業の人事や採用担当に直接連絡を取る事はないので安心してくださいね。面接官のタイプや良く聞かれる質問、面接官が求職者に求めるポイントなども事前にレクチャーします。面接後のフィードバックもお任せください。
                                    </p>
                                </div>
                            </div>
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>5</span></div>
                                    <div class="flow-list-name-fp">内定<br>諸条件の確認</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        無事に選考を進んだ後、キャリアアドバイザーが企業へ内定・諸条件の確認をします。具体的にはお給料や条件面での交渉、入社日のスケジュール調整など。また現在就業中の職場を退職する各種手続きや、スムーズな引き継ぎ方法などのアドバイスも行います。<br>
                                        自身で企業に対する交渉を行う事はありません。自分では言いづらい事もあると思うので、交渉上手なプロのキャリアアドバイザーに全部お任せください。
                                    </p>
                                </div>
                            </div>
                            <div class="flow-list-fp">
                                <div class="flow-list-left-fp">
                                    <div class="flow-step-fp">Step<span>6</span></div>
                                    <div class="flow-list-name-fp">内定承諾・入社</div>
                                </div>
                                <div class="flow-list-right-fp">
                                    <p>
                                        最後は入社を決めた企業への、内定承諾になります。<br>
                                        お給料や条件、入社日の確認を行います。入社日まで余裕がある場合は、新しい職場の業務について調べておくとスムーズにお仕事を始める事ができるでしょう。また出勤初日の持ち物や集合場所、出勤時間などを事前に採用担当者に確認しておくと安心です。ここからが昼職デビューのスタートライン！新たなステージに挑戦するあなたをずっと応援しています。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="daytime-btn-hp text-center mt-5">
                            <a href="#form_consult" class="common-btn-hp">お問い合わせはこちら</a>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="company-block-hp">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 company-block-in-hp">
                    <div class="company-middle-hp">
                        <div class="company-middle-in-hp">
                            <div class="company-img-hp">
                                <img src="<?php echo get_stylesheet_directory_uri() ?>/images/logo.png" alt="" />
                            </div>
                            <div class="company-info-hp">
                                昼ナビは、キャバクラ・クラブ・ボーイ・黒服などのナイトワークの方々が昼職に転職に転職したいと考えた時に感じる「履歴書の書き方が分からない」・「自分にあった仕事が分からない」・「昼職の実情が分からない」といったお悩みをアドバイザーが一人ひとりに真剣に向き合い、お話しした上で全て解消し、希望や適正に応じたお仕事をご紹介します。
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</section>
<!-- CONTAIN_END -->
<?php
get_footer();