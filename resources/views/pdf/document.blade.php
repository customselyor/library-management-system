<div>
    @foreach ($loans as $item)
        <div class="qr_code_list" style="display: block">
            <center>
                <img src="data:image/png;base64,{{$item->qr_img}}" alt="{{$item->invertar_number}}" style="width: 150px;height: 150px;">
            </center>
            <center>{{$item->invertar_number}}</center>
        </div>
    @endforeach
</div>