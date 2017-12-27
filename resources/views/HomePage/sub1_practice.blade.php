@extends('layouts.app')

@section('content')
    <script>
    $(document).ready(function() {
        $("h1").click(function() {
            location.reload();
        });
        $("#btn").click(function() {
            $("#block").css("background-color","greenyellow");
        });
        var url = "http://opendata.epa.gov.tw/ws/Data/UV/?format=json";
        $.ajax({
            url: url,
            dataType: "jsonp",
            success : function(data) {
                $.each(data,function() {
                    var s = this.SiteName + "的紫外線是 : " + this.UVI;
                    $("#show_uvi").append($('<li></li>').text(s));
                })
            },
            error : function(err) {console.log(err.status)}
        });
        /*
        $.ajax({
            url: 'http://data.coa.gov.tw/Service/OpenData/DataFileService.aspx',
            dataType: 'jsonp',
            data : {UnitId: 102},
            success : function(data) {alert(data)},
            error : function(err) {console.log(err)}
        });
        */
    });
    </script>
    <div class="container">
        <h1>Johnny's JavaScript Exhibition</h1>
        <a onclick="javascript:history.back();" style="cursor:pointer">back</a>
        <p>
        1.書名：<input id="book_name" style="width: 50px" />
        <button onclick='addBook("book_name","book_list")'>新增</button>
        </p>
        <ol id="book_list"></ol>
        <p>2.物件</p>
        <button onclick="weapon()">weapon</button>
        <p>3.jQuery</p>
        <button id="btn">I'm a button, Hello!</button>
        <div id="block" style="width: 50px; height: 50px"></div>
        <p>4.Use ajax get open data</p>
        <ul id="show_uvi"></ul>
    </div>
@endsection
