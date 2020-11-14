<?php
/** @var string $file_name */
/** @var string $url */
/** @var string $button_class */


$images = ['JPEG', 'PNG', 'GIF', 'TIFF', 'JPG'];
$word = ['DOC', 'DOCM', 'DOCX', 'DOT', 'DOTM', 'DOTX'];
$file_type = "image";
$rand = rand(10000, 99999);


$url = $url ?? "";
$file_name = $file_name ?? "some_file.PNG";
$file_array = explode('.', $file_name);
$file_extension = end($file_array);
if (in_array(strtoupper($file_extension), $images)) { // is image
    $file_type = "image";
    $icon = "fa-file-image";
} elseif (strtoupper($file_extension) == "PDF") { // is PDF
    $file_type = "pdf";
    $icon = "fa-file-pdf";
} elseif (strtoupper($file_extension) == "TXT") {
    $file_type = "txt";
    $icon = "fa-file-alt";
} else {
    $file_type = "word";
    $icon = "fa-file-word";
}

?>

<button type="button" class="btn  {{ $button_class ?? "btn-primary" }}" data-toggle="modal"
        data-target=".pop_up_model_{{ $rand }}">
    <i class="fas {{ $icon }}"></i>
</button>

<div class="modal fade pop_up_model_{{ $rand }}" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-content">
            @if($file_type=="image")
                <img src="{{ $url }}" width="100%">
            @elseif($file_type=="pdf")
                <object data="{{ $url }}" type="application/pdf" width="1000" height="700">
                    {{--                    <iframe src="{{ $url }}#toolbar=0" width="1000" height="700">--}}
                    {{--                    </iframe>--}}
                </object>
            @elseif($file_type=="txt")
                <object data="{{ $url }}" width="1000" height="700">
                    Not supported
                </object>
            @else
                <iframe src="https://view.officeapps.live.com/op/embed.aspx?src={{ $url }}" width="1000" height="700">
                </iframe>
            @endif
        </div>
    </div>
</div>
