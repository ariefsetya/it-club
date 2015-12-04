<div class="panel">
    <div class="heading">
        <span class="icon">
            <span class="mif-bubbles"></span>
        </span>
        <span class="title">Comments</span>
    </div>
    <div class="content">
        <div class="listview-outlook" data-role="listview">
            <?php 
            $komentar = App\Komentar::where('idpost',$data->id)->orderBy('id','desc')->get();
            ?>
            @if(sizeof($komentar)==0)
                <form method="POST" action="{{ url('mine/komen/'.$data->id) }}">
                    <h3>Be the first to comment this post</h3>
                    <div class="input-control textarea full-size">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <textarea type="text" name="isi"></textarea>
                    </div>
                    <span class="place-right"><button class="button">Submit</button></span>
                </form>
            @else
                <h3>Comment to this post</h3>
                <form method="POST" action="{{ url('mine/komen/'.$data->id) }}">
                    <div class="input-control textarea full-size">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <textarea type="text" name="isi"></textarea>
                    </div>
                    <span class="place-right"><button class="button">Submit</button></span>
                </form>
                <br>
                <br>
                <br>
                <br>
                <hr>
                @foreach($komentar as $komen)
                <?php
                $datakom = App\User::find($komen->idpengguna);
                ?>
                <div class="list">
                    <div class="list-content">
                        <span class="list-title">{{ $datakom->namadepan." ".$datakom->namabelakang }}</span>
                        <span class="list-subtitle">{{ $komen->isi }}</span>
                        <span class="list-remark">{{ $komen->created_at }}</span>
                    </div>
                </div>
                @endforeach
            @endif
        </div>

    </div>
</div>