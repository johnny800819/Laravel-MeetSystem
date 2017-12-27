@extends('layouts.app')

@section('content')

<!-- Other JavaScript -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<!-- Other CSS -->
<link rel='stylesheet' type='text/css' href="{{asset('css/newcss.css')}}">
<!-- google font effect -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Rancho&effect=shadow-multiple|fire-animation|splintered">
<!-- google font family -->
<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Indie+Flower">
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/earlyaccess/cwtexkai.css">

<script type="text/javascript">
$(function(){
    $('#gotobot').click(function(){
        // 讓捲軸用動畫的方式移動到 100000 的位置
        var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        $body.animate({
                scrollTop: 100000
        }, 600);
        return false;
    });
    $('.div_right_bottom').click(function(){
        // 讓捲軸用動畫的方式移動到 0 的位置
        var $body = (window.opera) ? (document.compatMode == "CSS1Compat" ? $('html') : $('body')) : $('html,body');
        $body.animate({
                scrollTop: 0
        }, 600);
        return false;
    });
});
</script>

<div class="container" style="font-size:24px">
    <h1>
        <img class="title_img" src='http://zh-tw.learnlayout.com/images/logo.png'>
        <span id="gotobot" class="title font-effect-fire-animation">Johnny's RWD</span>
    </h1>
    <div class="content">
        非常感謝您點閱我的履歷，我叫呂育安，住在新北市土城區。
        <br>
        <div>▼大事紀</div>
        <div>一、2013年  畢業於輔仁大學資訊工程系</div>
        <div>二、2013年  任職於輔仁大學資訊室  /  自學</div>
        <div>三、2014年  任職於永信新材料有限公司  (網站系統工程師)</div>
        <div>四、2016年  任職台北市大地工程處  (資訊管理師)</div>
        <br>
        <div>▼工作成果/內容</div>
        <div>一、大學時期</div>
        <div>(1)網路五子棋:<br>
        以java撰寫，主架構使用loop、if  else等基本概念進行判斷，利用java  servlet製作1對1連線對戰功能。</div>
        <div>(2)遊戲者與虛擬運動教練影像偵測系統(A  kinetic  detection  system  for  player  and  virtual  coach):<br>
        畢業專題，以C#撰寫，利用kinect  sdk得人體定位點，再利用matlab做教練影像處理得出人體關節點(Corner)，將使用者人體定位點與教練影像的人體關節點做比對正確性，以完成此系統。</div>
        <br>
        <div>二、輔大資訊室</div>
        <div>(1)輔大交換學生註冊網頁:<br>
        以asp.net撰寫，將web  layout得到的值存入ms  sql。</div>
        <div>(2)單一功能程式:<br>
        用vb寫一個AP將圖片存入sql  server後再將圖片分類。</div>
        <br>
        <div>三、永信新材料有限公司(開發系統：php、jquery；開發背景程式：C#)</div>
        <div>(1)會議系統:<br>
        為解決公司會議記錄製作慢、記錄傳遞和會議結論交辦能確實執行而開發，功能包含建立(刪除/修改)會議，會議行事曆，議題簡報，會議記錄(待辦事項)，待辦審批，提醒等功能；其中行事曆套用fullcalendar做客製開發。</div>
        <div>(2)申訴系統:<br>
        希望員工互相監督達到績效提升，流程為員工填表，主管審批。</div>
        <div>(3)評核系統:<br>
        主要功能是讓主管階級能線上打考績；此系統報表會綜合個人考績資料，出差勤資料，被申訴資料做出公司員工總考績。</div>
        <div>(4)考勤系統(DB    Access):<br>
        打卡使用BIO-IF600臉部指紋辨識機，利用AP(BIO-IF600  API  and  C#  socket)將台灣與大陸員工打卡資料傳至指定server，並且自動備份至backup  server。</div>
        <div>(5)-出差勤系統:<br>
        檢視考勤系統上下班時間，補申請上下班打卡功能，請假與加班功能(含一般申請、主管批准)，個人薪資詳細資訊。</div>
        (整合兩岸員工出差勤方式成為單一系統)
        <div>(6)質檢流水線系統(含保值期追蹤):<br>
        將工廠品質檢測流程進行數位化，針對各個檢測階段搭配各類型產品建置客製化頁面，依其規範方式提供資料查詢判斷填寫等功能，增加檢測人員工作效率，並改變最後成品品質判定方式，由人工變為自動。</div>
        <div>(7)系統通知與報表產製:<br>
        使用C#建置backend  application，各系統設定應通知條件，以mail  or  message通知當事人有待辦事項;  以背景方式處理報表的產製，減低系統loading。</div>
        <div>(8)EIP:<br>
        為外部套裝系統，架構linux環境導入，後續嵌至內部系統，並整合帳號密碼。</div>
        <br>
        <div>四、台北市政府大地工程處</div>
        <div>(1)辦理機關官方網站前端網頁製作，業務系統後臺管理工作。  </div>
        <div>(2)訂定外包契約，含需求分析，系統分析(UML繪製)，驗收文件等。</div>
        <div>(3)負責機關所屬網站與APP的檢核。  </div>
        <div>(4)負責電腦及網路設備維護、軟硬體障礙排除與修復。  </div>
        <div>(5)負責定期資安檢測與漏洞修補。  </div>
        <div>(6)執行政府資訊政策(部署網路架構、網站系統規劃、整合系統功能介接應用等)。 </div> 
        <br>
        <div>▼我想說<br>
        我希望能在一個開發團隊裡擔任開發人員，也希望能向高手們學習新的知識與團隊間的合作，工作中若有一群人可以為著相同目標，互相幫忙，精進能力，完成使命我認為是很棒的。    
        <br>
        學習、獲取經驗與成就感是我最真誠希望能在工作中獲得的，我不敢說我的coding能力非常強，但我肯定願意花時間磨練，我也絕對肯從零開始學習新的技術或語言，也希望能有機會在未來給予公司十足貢獻！
        <br>
        最後希望，若有幸去貴公司上班，懇請給我三周至一個月時間交接現有工作內容，感謝您撥空閱讀我的自傳，希望能有機會與您面談。
        </div>
        <br>
    </div>
    <div style="float: left">
    <h3>
        <p class="title">Course List(Draft mode)</p>
    </h3>
    <ul>
        <li>Program</li>
        <li>Aligorithm</li>
        <li>Database</li>
    </ul>
    </div>
    <div style="margin-left: 300px">
        <h3>
            <p class="title font-effect-splintered">Wiki Link</p>
        </h3>
        <ol>
            <li><a href="https://zh.wikipedia.org/wiki/HTML">Introduction of HTML</a></li>
            <li><a href="https://zh.wikipedia.org/wiki/HTML" target="_blank">Introduction of HTML(View in another page)</a></li>
        </ol>
    </div>
    <table style="width: 100%">
        <tfoot>
        <tr>
            <td width="33%">
                <div class="green box position_static"></div>
                <div class="yellow box position_relative"></div>
            </td>
            
            <td width="33%">
                <div class="position_relative">
                    <div class="green box position_static"></div>
                    <div class="yellow box position_absoluted"></div>
                </div>
            </td>
            <!--
            <td width="33%">
                <div class="green box position_static"></div>
                <div class="yellow box position_fixed"></div>
            </td>
            -->
        </tr>
        </tfoot>
    </table>
    
    <hr>
    <h2>Some Other Useful HTML Character Entities</h2>
    <table class="Entities" border='1'>
        <tr>
            <th>Result</th>
            <th>Description</th>
            <th>Entity Name</th>
            <th>Entity Number</th>
        </tr>
        <tr>
            <td style="height: 29px"></td>
            <td style="height: 29px">non-breaking space</td>
            <td style="height: 29px">&amp;nbsp;</td>
            <td style="height: 29px">&amp;#160;</td>
        </tr>
        <tr>
            <td>&lt;</td>
            <td>less than</td>
            <td>&amp;lt;</td>
            <td>&amp;#60;</td>
        </tr>
        <tr>
            <td>&gt;</td>
            <td>greater than</td>
            <td>&amp;gt;</td>
            <td>&amp;#62;</td>
        </tr>
        <tr>
            <td>&amp;</td>
            <td>ampersand</td>
            <td>&amp;amp;</td>
            <td>&amp;#38;</td>
        </tr>
        <tr>
            <td>&quot;</td>
            <td>double quotation mark </td>
            <td>&amp;quot;</td>
            <td>&amp;#34;</td>
        </tr>
        <tr>
            <td>&apos;</td>
            <td>single quotation mark (apostrophe) </td>
            <td>&amp;apos;</td>
            <td>&amp;#39;</td>
        </tr>
        <tr>
            <td>&cent;</td>
            <td>cent</td>
            <td>&amp;cent;</td>
            <td>&amp;#162;</td>
        </tr>
        <tr>
            <td>&pound;</td>
            <td>pound</td>
            <td>&amp;pound;</td>
            <td>&amp;#163;</td>
        </tr>
        <tr>
            <td>&yen;</td>
            <td>yen</td>
            <td>&amp;yen;</td>
            <td>&amp;#165;</td>
        </tr>
        <tr>
            <td>&euro;</td>
            <td>euro</td>
            <td>&amp;euro;</td>
            <td>&amp;#8364;</td>
        </tr>
        <tr>
            <td>&copy;</td>
            <td>copyright</td>
            <td>&amp;copy;</td>
            <td>&amp;#169;</td>
        </tr>
        <tr>
            <td>&#174;</td>
            <td>registered trademark</td>
            <td>&amp;reg;</td>
            <td>&amp;#174;</td>
        </tr>
    </table>
    <hr>
    <h3>HTML5 Audio/Video Exhibit</h3>
    <span style="width: auto">
        <video src="media/FWIDE_basketball_game.mp4" style="width: 200px; height: 300px;" controls="true" controlsList="nodownload"></video>
    </span>
    <span>
        <audio src="media/Strauss_An_der_schoenen_blauen_Donau.mp3" controls="true" controlsList="nodownload"></audio>
    </span>
    <hr>
    <div style="clear:left;">
        <h3>Table Exhibition</h3>
        <table border="1" style="width:100%; text-align: center; border-collapse:collapse;">
            <thead>
                <tr style="text-align: left">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Sex</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td colspan="4" height="30px" style="background-color: #ccccff"></td>
                </tr>
                <tr>
                    <td>Amy</td>
                    <td>Amy@hotmail.com</td>
                    <td>F</td>
                    <td>0123456789</td>
                </tr>
                <tr>
                    <td>Boson</td>
                    <td>Boson@hotmail.com</td>
                    <td>M</td>
                    <td>0123456789</td>
                </tr>
                <tr>
                    <td>Cathy</td>
                    <td>Cathy@hotmail.com</td>
                    <td>F</td>
                    <td>0123456789</td>
                </tr>
                <tr>
                    <td>Daron</td>
                    <td>Daron@hotmail.com</td>
                    <td>M</td>
                    <td>0123456789</td>
                </tr>
                <tr>
                    <td>Ella</td>
                    <td>Ella@hotmail.com</td>
                    <td>F</td>
                    <td>0123456789</td>
                </tr>
            </tbody>
        </table>
    </div>
    <hr>
    <h2>Pokemon Go</h2>
    <ul>
        <li class="pokemon_li">
            <a href="#" class="pokemon_string">PokemonGo-1</a>
            <img src="{{URL::asset('/images/favicon.png')}}" class="pokemon">
        </li>
        <li class="pokemon_li">
            <a href="#" class="pokemon_string">PokemonGo-2</a>
            <img src="media/PokemonGo2.png" class="pokemon">
        </li>
        <li class="pokemon_li">
            <a href="#" class="pokemon_string">PokemonGo-3</a>
            <img src="media/PokemonGo3.png" class="pokemon_animate">
        </li>
    </ul>
    <!--
    <div id="gotoheader">gotoheader</div>
    -->
    <div class="div_right_bottom"></div>
</div>
@endsection
