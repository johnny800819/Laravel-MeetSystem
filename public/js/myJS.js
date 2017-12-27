$(function(){
  $(window).scroll(function(){
    //var $(window).scrollTop(); 返回或設置匹配元素的滾動條的垂直位置
    var scroll = $(window).scrollTop();
    //當卷軸超過50px，自動加上 .navbar-fixed-top ，如果小於就移除
    if( scroll >= 50){
      $(".navbar-scroll").addClass("navbar-fixed-top");
    }else{
      $(".navbar-scroll").removeClass("navbar-fixed-top")
    }
  });
})
function myJSaction()
{
	/* meet body onload in every page */
	$.ajaxSetup({
	   headers: { 'X-CSRF-Token' : $('meta[name=csrf-token]').attr('content') }
	});
	fp_ready();

	/* onclick */
	$('#member_initial').on('click', function () {
		$("select[name=multi_member]").val("");
		/*
		var $btn = $(this).button('loading')
		$btn.button('reset')
		*/
	})
}
function fp_ready()
{
	/* flatpicker display */
	document.getElementById("calendar").flatpickr();
}
function member_selector()
{
	/* ajax get member for selector */
	get_user("select[name*=_member]");// matches those that contain '_member'

	/* new meet event's */
	$('#myModal').on('show.bs.modal', function (event) {
	  var button = $(event.relatedTarget) // Button that triggered the modal
	  var recipient = button.data('test') // Extract info from data-* attributes
	  
	  var modal = $(this)
	  modal.find('#myModalLabel').text(recipient)
	  //modal.find('.modal-body input').val(recipient)
	})
}
function get_user(id)
{
	$.ajax({
        type: "post",
        url: "get_user",
        dataType: 'json',
        success: function (data) {

        	$(id).html('');//initailize

        	for (var i = 0; i < data.length; i++) {
        		var usr_name = data[i]["name"];
        		$(id).append($("<option></option>").attr("value", usr_name).text(usr_name));
			}
        },
        error: function (data) {
            alert('Error:', data);
        }
    });
}
function member_decided()
{
	/* value */
	var mem_str = "";
	$("#chairman_selected").val($("#chairman").find(":selected").val());
	$("#recordman_selected").val($("#recordman").find(":selected").val());
	$("select[name=multi_member]").find(":selected").each(function() { 
	    mem_str += this.value + '  ';
	});
	$("#member_selected_text").text(mem_str);
	$("input[name=member_selected]").val(mem_str);
	/* icon */
	set_feedback_success('check_chairman','check_chairman_icon');
	set_feedback_success('check_record_man','check_record_man_icon');
}
function set_feedback_success(id1,id2)
{
	/*	example:
		<div id="id1">
			... your text or other obj (must include class="form-control") ...
			<span id="id2"></span>
		</div>
	*/
	$("#"+id1).addClass('has-success has-feedback'); // div
	$("#"+id2).addClass('glyphicon glyphicon-ok form-control-feedback');// span
}
function addBook(get,set)
{
    var p = document.getElementById(get);
    var q = document.getElementById(set);
    var book_name = p.value;
    (book_name=="")?alert("Please enter book name"):q.innerHTML += '<li>' + book_name +'</li>';
}
function weapon()/*Javascript演示陣列內含多筆物件(Key-Value)*/
{
    var w_arr = [
        {
            name:"倚天劍",
            price:1000
        },
        {
            name:"屠龍刀",
            price:1000
        },
        {
            name:"雪飲刀",
            price:1000
        }
    ];    
    var people = {}; //物件-裏頭沒任何設置
    people.name = "Johnny";
    people.sex = "man";
    consist_weapon(people,w_arr);
    people.getweapon()
}
function consist_weapon(obj,w_arr)
{
    var n = Math.floor((Math.random() * 3));
    obj.getweapon = function(){
        alert(obj.name 
        + " / " 
        + obj.sex 
        +"\nYour weapon is : "+w_arr[n].name);
    }
}
