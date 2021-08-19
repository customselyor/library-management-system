<div>
    <x-loading-indicator/>

    {{$qrCode}}
    <video id="preview" width="20%"></video>
    <br>

    <pre>
    @php
        print_r($sannerQrCode);
    @endphp
    </pre>
</div>
 
@push('scripts')
    <script type="text/javascript">
        let scanner = new Instascan.Scanner({video: document.getElementById('preview')});
        scanner.addListener('scan', function (content) {
        @this.QrcodeCheck(content);
        });
        Instascan.Camera.getCameras().then(function (cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                console.error('No cameras found.');
            }
        }).catch(function (e) {
            console.error(e);
        });
    </script>
@endpush