@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{URL::route('pratice')}}" style="cursor:pointer">back</a>
        @if(isset($MailResponse))
        <div>
            @if($MailResponse['flag'] === 0)
                <div class="alert alert-danger">
                <ul>
                <li>{{$MailResponse['msg']}}</li>
                </ul>
                </div>
            @else
                <div class="alert alert-success">
                <ul>
                <li>{{$MailResponse['msg']}}</li>
                </ul>
                </div>
            @endif
        </div>
        @endif
        <form action="{{URL::route('sub2_submit')}}" method="post">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <table border="1">
            <tr>
                <td><font size="2">收件者:</font></td>
                <td><input type="text" size="30" name="To"/></td>
            </tr>
            <tr>
                <td><font size="2">寄件者:</font></td>
                <td><input type="text" size="30" name="From"/></td>
            </tr>
            <tr>
                <td><font size="2">主旨:</font></td>
                <td><input type="text" size="40" name="Subject"/></td>
            </tr>
            <tr>
                <td><font size="2">郵件內容:</font></td><td>  
                <textarea rows="5" cols="40" name="TextBody">
                </textarea></td>
            </tr>
        </table>
        <input type="submit" name="Send" value="寄送郵件"/>
        </form>
    </div>
@endsection
