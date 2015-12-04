@extends('app')

@section('content')

<div class="grid">
    <div class="row cells12">
        <div class="cell colspan12">
            <div class="tabcontrol" data-role="tabControl">
                <ul class="tabs">
                    <li class="active"><a href="#frame_1_1">General</a></li>
                    <li class=""><a href="#frame_1_2">Social</a></li>
                    <li class=""><a href="#frame_1_3">Account</a></li>
                </ul>
                <div class="frames bg-grayLight">
                    <div class="frame bg-white" id="frame_1_1">
                        <form method="POST" action="{{ url('mine/update/settings') }}">
                            @include('utils.form_update')
                        </form>
                    </div>
                    <div class="frame bg-white" id="frame_1_2">
                        <form method="POST" action="{{ url('mine/social') }}">
                            <table style="width:100%">
                                <tr>
                                    <td>Facebook</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            <input type="text" name="fb" placeholder="https://www.facebook.com/user" value="{{ $profile->fb }}" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Twitter</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input type="text" name="twitter" placeholder="https://twitter.com/user" value="{{ $profile->twitter }}" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Google Plus</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input type="text" name="gplus" placeholder="https://plus.google.com/+user" value="{{ $profile->gplus }}" >
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="button">Update</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <div class="frame bg-white" id="frame_1_3">
                        <form method="POST" action="{{ url('mine/account') }}">
                            <table style="width:100%">
                                <tr>
                                    <td>E-Mail</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input type="hidden" value="{{ csrf_token() }}" name="_token">
                                            <input type="email" name="email" value="{{ $profile->email }}" required>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>
                                        <div class="input-control text full-size">
                                            <input type="password" name="password" placeHolder="blank mean unchanged">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>
                                        <button class="button">Save</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection