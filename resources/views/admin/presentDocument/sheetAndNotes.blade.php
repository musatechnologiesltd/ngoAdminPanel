@extends('admin.master.master')

@section('title')
নোটাংশ এবং পত্রাংশ
@endsection


@section('body')
  <style>
        #container {
            width: 100%;
        }

        .ck-editor__editable[role="textbox"] {
            /* editing area */
            min-height: 40vh;
        }

        .ck-content .image {
            /* block images */
            max-width: 80%;
            margin: 20px auto;
        }
    </style>

       <div class="container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-6">
                            <h3>নোটাংশ</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">নোটাংশ</a></li>
                                <li class="breadcrumb-item">নোটাংশ</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Container-fluid starts-->
            <div class="container-fluid list-products">
                <div class="row">
                    <!-- Individual column searching (text inputs) Starts-->
                    <div class="col-sm-12">
                        <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-2 col-sm-12">
                                                <div style="border-right: 1px solid gray; height:100%">
                                                    <button class="btn btn-outline-success"><i class="fa fa-calendar"></i> নতুন নোট</button>

                                                    <p class="mt-2">আগত নোট <span>(2)</span></p>
                                                    <hr>
                                                    <button class="btn btn-transparent"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">01</span> Note Name</button>
                                                    <hr>
                                                    <button class="btn btn-transparent"><span class="me-2" style="padding:2px 5px; border-radius: 6px; border: 1px solid black">01</span> Note Name</button>

                                                </div>
                                            </div>
                                            <div class="col-lg-10 col-sm-12">
                                        <ul class="nav nav-tabs" id="icon-tab" role="tablist">
                                            <li class="nav-item"><a class="nav-link active" id="icon-home-tab"
                                                                    data-bs-toggle="tab" href="#icon-home" role="tab"
                                                                    aria-controls="icon-home" aria-selected="true"><i
                                                            class="icofont icofont-ui-home"></i>নোটাংশ</a></li>
                                            <li class="nav-item"><a class="nav-link" id="profile-icon-tab"
                                                                    data-bs-toggle="tab" href="#profile-icon" role="tab"
                                                                    aria-controls="profile-icon"
                                                                    aria-selected="false"><i
                                                            class="icofont icofont-man-in-glasses"></i>পত্রাংশ</a></li>
                                        </ul>
                                        <div class="tab-content mt-4" id="icon-tabContent">
                                            <div class="tab-pane fade show active" id="icon-home" role="tabpanel"
                                                 aria-labelledby="icon-home-tab">
                                                <div id="container">
                                                    <div id="editor">
                                                        <p>লিখুন</p>
                                                    </div>
                                                </div>
                                                <div class="d-flex flex-row-reverse mt-3">

                                                    <button class="btn btn-danger ms-3" type="button">
                                                        <i class="fa fa-send"></i>
                                                        বাতিল করুন
                                                    </button>
                                                    <div class="dropdown">
                                                        <button class="btn btn-primary dropdown-toggle" type="button"
                                                                id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                            সংরক্ষন করুন
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item" href="#">সংরক্ষন করুন</a></li>
                                                            <li><a class="dropdown-item" href="#">সংরক্ষন ও খসড়া</a>
                                                            </li>
                                                            <li><a class="dropdown-item" href="#">সংরক্ষন ও নতুন
                                                                    অনুচ্ছেদ</a></li>
                                                            <li><a class="dropdown-item" href="#">সংরক্ষন ও প্রেরণ</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile-icon" role="tabpanel"
                                                 aria-labelledby="profile-icon-tab">
                                                <div class="row">
                                                    <div class="col-xl-9">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-sm-2 col-xs-12">
                                                                    <div class="nav flex-column nav-pills"
                                                                         id="v-pills-tab" role="tablist"
                                                                         aria-orientation="vertical"><a
                                                                                class="nav-link active"
                                                                                id="v-pills-home-tab"
                                                                                data-bs-toggle="pill"
                                                                                href="#v-pills-home" role="tab"
                                                                                aria-controls="v-pills-home"
                                                                                aria-selected="true">অফিস স্মারক</a><a
                                                                                class="nav-link"
                                                                                id="v-pills-profile-tab"
                                                                                data-bs-toggle="pill"
                                                                                href="#v-pills-profile" role="tab"
                                                                                aria-controls="v-pills-profile"
                                                                                aria-selected="false">সরকারি পত্র</a><a
                                                                                class="nav-link"
                                                                                id="v-pills-messages-tab"
                                                                                data-bs-toggle="pill"
                                                                                href="#v-pills-messages" role="tab"
                                                                                aria-controls="v-pills-messages"
                                                                                aria-selected="false">বেসরকারি
                                                                            পত্র</a><a
                                                                                class="nav-link"
                                                                                id="v-pills-settings-tab"
                                                                                data-bs-toggle="pill"
                                                                                href="#v-pills-settings" role="tab"
                                                                                aria-controls="v-pills-settings"
                                                                                aria-selected="false">বিজ্ঞপ্তি/নোটিশ</a>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-10 col-xs-12">
                                                                    <div class="tab-content"
                                                                         id="v-pills-tabContent">
                                                                        <div class="tab-pane fade show active"
                                                                             id="v-pills-home" role="tabpanel"
                                                                             aria-labelledby="v-pills-home-tab">
                                                                            <div class="card">
                                                                                <div class="card-body">
                                                                                    <div class="text-center mb-3">
                                                                                        <h3>গণপ্রজাতন্ত্রী বাংলাদেশ
                                                                                            সরকার</h3>
                                                                                        <h5>এনজিও বিষয়ক ব্যুরো <br>
                                                                                            প্রধানমন্ত্রীর কার্যালয় <br>
                                                                                            প্লট-ই, ১৩/বি, আগারগাঁও <br>
                                                                                            শেরেবাংলা নগর, ঢাকা-১২০৭
                                                                                        </h5>
                                                                                    </div>
                                                                                    <p>স্মারক নং- 123456789</p>
                                                                                    <div class="row">
                                                                                        <div class="col-xl-1">বিষয় :
                                                                                        </div>
                                                                                        <div class="col-xl-11">
                                                                                        <span id="idOfElement"
                                                                                              class="block">
                                                                                        <textarea
                                                                                                class="form-control edit">..............................................................................................</textarea>
                                                                                        <span class="preview"></span>
                                                                                    </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xl-3">সুত্রঃ
                                                                                            (যদি থাকে):
                                                                                        </div>
                                                                                        <div class="col-xl-9">
                                                                                        <span id="idOfElement1"
                                                                                              class="block">
                                                                                        <textarea
                                                                                                class="form-control edit">.............................................................................................</textarea>
                                                                                        <span class="preview"></span>
                                                                                    </span>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="row">
                                                                                        <div class="col-xl-12">
                                                                                            <form action="">
                                                                                                <lable class="form-label">সম্পাদন শেষ করুন</lable>
                                                                                                <div id="container">
                                                                                                    <div id="editor2">
                                                                                                        <p>লিখুন</p>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                             id="v-pills-profile" role="tabpanel"
                                                                             aria-labelledby="v-pills-profile-tab">
                                                                            <p>Demo</p>
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                             id="v-pills-messages" role="tabpanel"
                                                                             aria-labelledby="v-pills-messages-tab">
                                                                            <p>Demo</p>
                                                                        </div>
                                                                        <div class="tab-pane fade"
                                                                             id="v-pills-settings" role="tabpanel"
                                                                             aria-labelledby="v-pills-settings-tab">
                                                                            <p>Demo</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3">
                                                        <h5>পত্র গ্রহণকারী</h5>
                                                        <div class="row">
                                                            <div class="col-10">
                                                                <p><i class="fa fa-arrow-right"></i> অনুমোদনকারী</p>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-transparent" data-bs-toggle="modal"
                                                                        data-original-title="" data-bs-target="#myModal2">
                                                                    <i class="fa fa-user-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <p><i class="fa fa-arrow-right"></i> প্রেরক</p>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-transparent">
                                                                    <i class="fa fa-user-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <p><i class="fa fa-arrow-right"></i> প্রাপক</p>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-transparent">
                                                                    <i class="fa fa-user-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <p><i class="fa fa-arrow-right"></i> দৃষ্টি আকর্ষণ</p>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-transparent">
                                                                    <i class="fa fa-user-plus"></i>
                                                                </button>
                                                            </div>
                                                            <div class="col-10">
                                                                <p><i class="fa fa-arrow-right"></i> অনুলিপি</p>
                                                            </div>
                                                            <div class="col-2">
                                                                <button class="btn btn-transparent">
                                                                    <i class="fa fa-user-plus"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                    </div>
                    <!-- Individual column searching (text inputs) Ends-->
                </div>
            </div>
            <!-- Container-fluid Ends-->
            <!-- Modal -->
<div class="modal right fade bd-example-modal-lg"
     id="myModal2" tabindex="-1" role="dialog"
     aria-labelledby="myModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel2">
                    অনুমোদনকারী</h4>
            </div>

            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="mb-3">
                            <label class="form-label" for="">অফিসার খুজুন</label>
                            <select class="form-control" name="" id="">
                                <option value="">মহাপরচালক</option>
                                <option value="">মহাপরচালক</option>
                                <option value="">মহাপরচালক</option>
                                <option value="">মহাপরচালক</option>
                                <option value="">মহাপরচালক</option>
                            </select>
                            </div>
                            <div class="mt-3">
                                <button class="btn btn-info-gradien">সংরক্ষণ করুন</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
</div>
@endsection

@section('script')
<!-- Plugin used-->
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/super-build/ckeditor.js"></script>
<script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>
<script>
    // This sample still does not showcase all CKEditor 5 features (!)
    // Visit https://ckeditor.com/docs/ckeditor5/latest/features/index.html to browse all the features.
    CKEDITOR.ClassicEditor.create(document.getElementById("editor2"), {
        // https://ckeditor.com/docs/ckeditor5/latest/features/toolbar/toolbar.html#extended-toolbar-configuration-format
        toolbar: {
            items: [
                'exportPDF', 'exportWord', '|',
                'findAndReplace', 'selectAll', '|',
                'heading', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'code', 'subscript', 'superscript', 'removeFormat', '|',
                'bulletedList', 'numberedList', 'todoList', '|',
                'outdent', 'indent', '|',
                'undo', 'redo',
                '-',
                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor', 'highlight', '|',
                'alignment', '|',
                'link', 'insertImage', 'blockQuote', 'insertTable', 'mediaEmbed', 'codeBlock', 'htmlEmbed', '|',
                'specialCharacters', 'horizontalLine', 'pageBreak', '|',
                'textPartLanguage', '|',
                'sourceEditing'
            ],
            shouldNotGroupWhenFull: true
        },
        // Changing the language of the interface requires loading the language file using the <script> tag.
        // language: 'es',
        list: {
            properties: {
                styles: true,
                startIndex: true,
                reversed: true
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/headings.html#configuration
        heading: {
            options: [
                {model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph'},
                {model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1'},
                {model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2'},
                {model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3'},
                {model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4'},
                {model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5'},
                {model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6'}
            ]
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/editor-placeholder.html#using-the-editor-configuration
        placeholder: 'Welcome to CKEditor 5!',
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-family-feature
        fontFamily: {
            options: [
                'default',
                'Arial, Helvetica, sans-serif',
                'Courier New, Courier, monospace',
                'Georgia, serif',
                'Lucida Sans Unicode, Lucida Grande, sans-serif',
                'Tahoma, Geneva, sans-serif',
                'Times New Roman, Times, serif',
                'Trebuchet MS, Helvetica, sans-serif',
                'Verdana, Geneva, sans-serif'
            ],
            supportAllValues: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/font.html#configuring-the-font-size-feature
        fontSize: {
            options: [10, 12, 14, 'default', 18, 20, 22],
            supportAllValues: true
        },
        // Be careful with the setting below. It instructs CKEditor to accept ALL HTML markup.
        // https://ckeditor.com/docs/ckeditor5/latest/features/general-html-support.html#enabling-all-html-features
        htmlSupport: {
            allow: [
                {
                    name: /.*/,
                    attributes: true,
                    classes: true,
                    styles: true
                }
            ]
        },
        // Be careful with enabling previews
        // https://ckeditor.com/docs/ckeditor5/latest/features/html-embed.html#content-previews
        htmlEmbed: {
            showPreviews: true
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/link.html#custom-link-attributes-decorators
        link: {
            decorators: {
                addTargetToExternalLinks: true,
                defaultProtocol: 'https://',
                toggleDownloadable: {
                    mode: 'manual',
                    label: 'Downloadable',
                    attributes: {
                        download: 'file'
                    }
                }
            }
        },
        // https://ckeditor.com/docs/ckeditor5/latest/features/mentions.html#configuration
        mention: {
            feeds: [
                {
                    marker: '@',
                    feed: [
                        '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                        '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                        '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                        '@sugar', '@sweet', '@topping', '@wafer'
                    ],
                    minimumCharacters: 1
                }
            ]
        },
        // The "super-build" contains more premium features that require additional configuration, disable them below.
        // Do not turn them on unless you read the documentation and know how to configure them and setup the editor.
        removePlugins: [
            // These two are commercial, but you can try them out without registering to a trial.
            // 'ExportPdf',
            // 'ExportWord',
            'CKBox',
            'CKFinder',
            'EasyImage',
            // This sample uses the Base64UploadAdapter to handle image uploads as it requires no configuration.
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/base64-upload-adapter.html
            // Storing images as Base64 is usually a very bad idea.
            // Replace it on production website with other solutions:
            // https://ckeditor.com/docs/ckeditor5/latest/features/images/image-upload/image-upload.html
            // 'Base64UploadAdapter',
            'RealTimeCollaborativeComments',
            'RealTimeCollaborativeTrackChanges',
            'RealTimeCollaborativeRevisionHistory',
            'PresenceList',
            'Comments',
            'TrackChanges',
            'TrackChangesData',
            'RevisionHistory',
            'Pagination',
            'WProofreader',
            // Careful, with the Mathtype plugin CKEditor will not load when loading this sample
            // from a local file system (file://) - load this site via HTTP server if you enable MathType
            'MathType'
        ]
    });
</script>

<script src="https://cdn.jsdelivr.net/gh/JackChilds/Preview-In-Place@main/dist/previewinplace.min.js"></script>
<script>
    // get element:
    var el = document.querySelector('#idOfElement')

    // function to process the user's data, e.g. you could convert markdown to HTML here:
    function processData(data) {
        return data.toUpperCase() // do something with the data here
    }

    // initialise the class:
    var example = new PreviewInPlace(el, {
        // options
        previewGenerator: processData // reference to the function that processes the data
    })
</script>
<script>
    // get element:
    var el = document.querySelector('#idOfElement1')

    // function to process the user's data, e.g. you could convert markdown to HTML here:
    function processData(data) {
        return data.toUpperCase() // do something with the data here
    }

    // initialise the class:
    var example = new PreviewInPlace(el, {
        // options
        previewGenerator: processData // reference to the function that processes the data
    })
</script>
@endsection
