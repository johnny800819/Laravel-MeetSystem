@extends('layouts.app')


@section('content')
<form action="{{ url('meethome/new_meet/store') }}" method="post" id="new_meet_form" class="form-horizontal" role="form" style="width:70%;margin:0 auto;">
	<!-- form's csrf token , during the page delivers info -->
	<input type="hidden" name="_token" value="{{ csrf_token() }}">

	<!-- error msg -->
	<div>
		@if(isset($_GET['error_msg']) && $_GET['error_msg'] != "")
			<h5 style="color:#F00">{{$_GET['error_msg']}}</h5>
		@endif
		<BR>
		<BR>
	</div>
	<div>
		<span class="text-left lead">Enter Your Meeting Information</span>
	</span>
	<div class="table-responsive">
	  <table class="table">
	  	<tr>
	  		<td width="10%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Meeting&nbsp;&nbsp;Name</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			<div class="form-group">
					<div class="col-sm-10">
						<input name="mt_name" type="text" class="form-control" placeholder="Text input">
					</div>
				</div>
	  		</td>
	  		<td width="10%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Meeting&nbsp;&nbsp;Date</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<input name="mt_date" id="calendar" class="flatpickr form-control" data-date-format="Y-m-d H:i" placeholder="Choise DateTime" data-enable-time=true>
	  				</div>
	  			</div>
	  		</td>
	  	</tr>
	  	<tr>
	  		<td width="10%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Meeting&nbsp;&nbsp;Cycle</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			
	  		</td>
	  		<td width="10%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Meeting&nbsp;&nbsp;Position</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			<div class="form">
					<div class="col-sm-10">
						<input name="mt_position" type="text" class="form-control" placeholder="Text input">
					</div>
				</div>
	  		</td>
	  	</tr>
	  	<tr>
	  		<td width="10%">
	  			<label for="input" class="col-sm-2 control-label">Meeting&nbsp;&nbsp;Description</label>
	  		</td>
	  		<td width="40%">
	  			<textarea name="mt_context" class="form-control" style="resize:none" rows="3"></textarea>
	  		</td>
	  	</tr>
	  </table>
	</div>
	<!-- ************************************************************************************************ -->
	<br>
	<div>
		<span class="text-left lead">Meeting Members</span>
		<!-- trigger modal -->
		<a onclick="member_selector()" style="cursor:pointer; margin-left:20px" data-toggle="modal" data-test="Member Selector" data-target="#myModal">Click here to Selector</a>

		<!-- Modal -->
		<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		        <h4 class="modal-title" id="myModalLabel"></h4>
		      </div>
		      <div class="modal-body">
		        <table class="table table-striped">
				  <tr>
				  	<td width="40%">ChairMan:</td>
				  	<td>
					  	<select id="chairman" name="one_member" class="form-control">
						</select>
					</td>
				  </tr>
				  <tr>
				  	<td>Record:</td>
				  	<td>
				  		<select id="recordman" name="one_member" class="form-control">
						</select>
				  	</td>
				  </tr>
				  <tr>
				  	<td>Participants:<br>(set multi , plz use "ctrl")<br><button id="member_initial" type="button" class="btn btn-primary btn-sm">initial</button></td>
				  	<td>
				  		<select name="multi_member" selected="none" multiple class="form-control">
						</select>
				  	</td>
				  </tr>
				</table>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button onclick="member_decided()" type="button" class="btn btn-primary" data-dismiss="modal">Save changes</button>
		      </div>
		    </div>
		  </div>
		</div>
	</div>
	<div class="table-responsive">
		<table class="table">
		<tr>
			<td width="10%">
				<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Chair&nbsp;&nbsp;Man</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			<div class="form">
					<div class="col-sm-10">
						<div id="check_chairman">
							<input name="chairman_selected" id="chairman_selected" type="text" class="form-control" placeholder="empty" readonly="true">
							<span id="check_chairman_icon"></span>
						</div>
					</div>
				</div>
	  		</td>
	  		<td width="10%">
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Record&nbsp;&nbsp;Man</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td width="40%">
	  			<div class="form">
					<div class="col-sm-10">
						<div id="check_record_man">
							<input name="recordman_selected" id="recordman_selected" type="text" class="form-control" placeholder="empty" readonly="true">
							<span id="check_record_man_icon"></span>
						</div>
					</div>
				</div>
	  		</td>
	  	</tr>
	  	<tr>
	  		<td>
	  			<div class="form">
					<div class="col-sm-10">
	  					<label for="input" class="col-sm-2 control-label">Member</label>
	  				</div>
	  			</div>
	  		</td>
	  		<td colspan="100%">
	  			<div class="form">
					<div class="col-sm-10">
						<label id="member_selected_text"></label>
						<input type="hidden" name="member_selected">
					</div>
				</div>
	  		</td>
	  	</tr>
	  	<!-- ************************************************************************************************ -->
	  	<tr>
	  		<td>
		  		<div class="col-sm-10">
		  			<div class="g-recaptcha" data-sitekey="{{$site_key}}"></div>
		  		</div>
		  		<div class="col-sm-10"><span class="col-sm-20"><input type="checkbox"> 記住我</span></div>
		  		<div class="form-group col-sm-10" style="width:200px"><button type="submit" class="btn btn-primary btn-lg btn-block">登入</button></div>
	  		</td>
	  	</tr>
	  	</table>
	</div>
</form>
@endsection