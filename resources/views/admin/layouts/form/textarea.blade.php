@php
    $rich_text = $rich_text ?? true;
@endphp

<div class="form-group">
    @isset($title)
        <label for="{{ $name }}">{{ $title }}</label>
    @endisset
    <textarea name="{{ $name }}" class="form-control @error($name) is-invalid @enderror"
              id="{{ $name }}" @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
    >{{ old($name, $value ?? null) }}</textarea>
</div>
@if($rich_text)
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (document.querySelector( '#{{ $name }}' )) {
                ClassicEditor
                    .create(document.querySelector('#{{ $name }}'), {
                        ckfinder: {
                            uploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                        },
                        toolbar: {
                            items: [
                                'heading',
                                '|',
                                'bold',
                                'italic',
                                'link',
                                'bulletedList',
                                'numberedList',
                                '|',
                                'indent',
                                'outdent',
                                'alignment',
                                '|',
                                'blockQuote',
                                'insertTable',
                                'undo',
                                'redo',
                                'CKFinder',
                                'mediaEmbed',
                            ],
                            language: 'ru',
                            image: {
                                toolbar: ['toggleImageCaption', 'imageTextAlternative']
                            },
                            // image: {
                            //     toolbar: [
                            //         'imageTextAlternative',
                            //         'imageStyle:full',
                            //         'imageStyle:side',
                            //     ],
                            // },
                            table: {
                                contentToolbar: [
                                    'tableColumn',
                                    'tableRow',
                                    'mergeTableCells',
                                ],
                            },
                            licenseKey: '',
                        },
                        mediaEmbed: {
                            previewsInData: true,
                        }
                    })
                    .catch(function (error) {
                        console.error(error);
                    });
            }
        });
    </script>
@endif
