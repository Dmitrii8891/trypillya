<script type="text/javascript">
    jQuery(document).ready(function() {
                jQuery('#w0-button').KCFinderInputWidget({
                    "browseOptions": [],
                    "uploadURL": "/backend/web/upload",
                    "multiple": false,
                    "inputName": "image",
                    "thumbsDir": ".thumbs",
                    "thumbsSelector": "#w0-thumbs",
                    "thumbTemplate": "<li><img src=\"{thumbSrc}\" /><input type=\"hidden\" name=\"{inputName}\" value=\"{inputValue}\"></li>"
                })
                jQuery('#uploadimg-file12').fileinput(fileinput_8d73414f);

                CKEDITOR.replace('portfolio-object', {
                    "filebrowserBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=files",
                    "filebrowserUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=files",
                    "filebrowserImageBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=images",
                    "filebrowserImageUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=images",
                    "height": 300,
                    "toolbarGroups": [{
                        "name": "clipboard",
                        "groups": ["mode", "undo", "selection", "clipboard", "doctools"]
                    }, {
                        "name": "editing",
                        "groups": ["tools", "about"]
                    }, "/", {
                        "name": "paragraph",
                        "groups": ["templates", "list", "indent", "align"]
                    }, {
                        "name": "insert"
                    }, "/", {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    }, {
                        "name": "colors"
                    }, {
                        "name": "links"
                    }, {
                        "name": "others"
                    }],
                    "removeButtons": "Smiley,Iframe"
                });
                dosamigos.ckEditorWidget.registerOnChangeHandler('portfolio-object');
                dosamigos.ckEditorWidget.registerCsrfImageUploadHandler();
                $('#portfolio-project_manadger').on('select2:opening', initS2Open).on('select2:unselecting', initS2Unselect);
                jQuery.when(jQuery('#portfolio-project_manadger').select2(select2_1465051d)).done(initS2Loading('portfolio-project_manadger', '.select2-container--krajee', '', true));

                $('#portfolio-team').on('select2:opening', initS2Open).on('select2:unselecting', initS2Unselect);
                jQuery.when(jQuery('#portfolio-team').select2(select2_019fc569)).done(initS2Loading('portfolio-team', '.select2-container--krajee', '', true));

                jQuery('#portfolio-file2').fileinput(fileinput_4cf5df3d);

                CKEDITOR.replace('portfolio-text1', {
                    "filebrowserBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=files",
                    "filebrowserUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=files",
                    "filebrowserImageBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=images",
                    "filebrowserImageUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=images",
                    "height": 300,
                    "toolbarGroups": [{
                        "name": "clipboard",
                        "groups": ["mode", "undo", "selection", "clipboard", "doctools"]
                    }, {
                        "name": "editing",
                        "groups": ["tools", "about"]
                    }, "/", {
                        "name": "paragraph",
                        "groups": ["templates", "list", "indent", "align"]
                    }, {
                        "name": "insert"
                    }, "/", {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    }, {
                        "name": "colors"
                    }, {
                        "name": "links"
                    }, {
                        "name": "others"
                    }],
                    "removeButtons": "Smiley,Iframe"
                });
                dosamigos.ckEditorWidget.registerOnChangeHandler('portfolio-text1');
                dosamigos.ckEditorWidget.registerCsrfImageUploadHandler();
                CKEDITOR.replace('portfolio-text2', {
                    "filebrowserBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=files",
                    "filebrowserUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=files",
                    "filebrowserImageBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=images",
                    "filebrowserImageUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=images",
                    "height": 300,
                    "toolbarGroups": [{
                        "name": "clipboard",
                        "groups": ["mode", "undo", "selection", "clipboard", "doctools"]
                    }, {
                        "name": "editing",
                        "groups": ["tools", "about"]
                    }, "/", {
                        "name": "paragraph",
                        "groups": ["templates", "list", "indent", "align"]
                    }, {
                        "name": "insert"
                    }, "/", {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    }, {
                        "name": "colors"
                    }, {
                        "name": "links"
                    }, {
                        "name": "others"
                    }],
                    "removeButtons": "Smiley,Iframe"
                });
                dosamigos.ckEditorWidget.registerOnChangeHandler('portfolio-text2');
                dosamigos.ckEditorWidget.registerCsrfImageUploadHandler();
                jQuery('#uploadimg-file').fileinput(fileinput_8d73414f);

                CKEDITOR.replace('portfolio-description', {
                    "filebrowserBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=files",
                    "filebrowserUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=files",
                    "filebrowserImageBrowseUrl": "/backend/web/assets/1491203e/browse.php?opener=ckeditor&type=images",
                    "filebrowserImageUploadUrl": "/backend/web/assets/1491203e/upload.php?opener=ckeditor&type=images",
                    "height": 300,
                    "toolbarGroups": [{
                        "name": "clipboard",
                        "groups": ["mode", "undo", "selection", "clipboard", "doctools"]
                    }, {
                        "name": "editing",
                        "groups": ["tools", "about"]
                    }, "/", {
                        "name": "paragraph",
                        "groups": ["templates", "list", "indent", "align"]
                    }, {
                        "name": "insert"
                    }, "/", {
                        "name": "basicstyles",
                        "groups": ["basicstyles", "cleanup"]
                    }, {
                        "name": "colors"
                    }, {
                        "name": "links"
                    }, {
                        "name": "others"
                    }],
                    "removeButtons": "Smiley,Iframe"
                });
                dosamigos.ckEditorWidget.registerOnChangeHandler('portfolio-description');
                dosamigos.ckEditorWidget.registerCsrfImageUploadHandler();
                $('#coordinates-country').on('select2:opening', initS2Open).on('select2:unselecting', initS2Unselect);
                jQuery.when(jQuery('#coordinates-country').select2(select2_e75a160e)).done(initS2Loading('coordinates-country', '.select2-container--krajee', '', true));

                jQuery('#w1').yiiActiveForm([{
                                "id": "portfolio-title",
                                "name": "title",
                                "container": ".field-portfolio-title",
                                "input": "#portfolio-title",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Название» должно быть строкой.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "uploadimg-file12",
                                "name": "file12",
                                "container": ".field-uploadimg-file12",
                                "input": "#uploadimg-file12",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.file(attribute, messages, {
                                        "message": "Загрузка файла не удалась.",
                                        "skipOnEmpty": true,
                                        "mimeTypes": [],
                                        "wrongMimeType": "Разрешена загрузка файлов только со следующими MIME-типами: .",
                                        "extensions": [],
                                        "wrongExtension": "Разрешена загрузка файлов только со следующими расширениями: .",
                                        "minSize": 240000,
                                        "tooSmall": "Файл «{file}» слишком маленький. Размер должен быть более 240 000 байт.",
                                        "maxSize": 3780000,
                                        "tooBig": "Файл «{file}» слишком большой. Размер не должен превышать 3 780 000 байт.",
                                        "maxFiles": 1,
                                        "tooMany": "Вы не можете загружать более 1 файла."
                                    });
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «File12»."
                                    });
                                }
                            }, {
                                "id": "portfolio-object",
                                "name": "object",
                                "container": ".field-portfolio-object",
                                "input": "#portfolio-object",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Объект» должно быть строкой.",
                                        "skipOnEmpty": 1
                                    });
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Объект»."
                                    });
                                }
                            }, {
                                "id": "portfolio-area",
                                "name": "area",
                                "container": ".field-portfolio-area",
                                "input": "#portfolio-area",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Площадь»."
                                    });
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Площадь» должно быть строкой.",
                                        "max": 255,
                                        "tooLong": "Значение «Площадь» должно содержать максимум 255 символов.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "portfolio-client",
                                "name": "client",
                                "container": ".field-portfolio-client",
                                "input": "#portfolio-client",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Клиент»."
                                    });
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Клиент» должно быть строкой.",
                                        "max": 255,
                                        "tooLong": "Значение «Клиент» должно содержать максимум 255 символов.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "portfolio-task",
                                "name": "task",
                                "container": ".field-portfolio-task",
                                "input": "#portfolio-task",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Задача»."
                                    });
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Задача» должно быть строкой.",
                                        "max": 255,
                                        "tooLong": "Значение «Задача» должно содержать максимум 255 символов.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "portfolio-year",
                                "name": "year",
                                "container": ".field-portfolio-year",
                                "input": "#portfolio-year",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Год»."
                                    });
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Год» должно быть строкой.",
                                        "max": 255,
                                        "tooLong": "Значение «Год» должно содержать максимум 255 символов.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "portfolio-project_manadger",
                                "name": "project_manadger",
                                "container": ".field-portfolio-project_manadger",
                                "input": "#portfolio-project_manadger",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Руководитель проекта»."
                                    });
                                    yii.validation.string(value, messages, {
                                        "message": "Значение «Руководитель проекта» должно быть строкой.",
                                        "max": 255,
                                        "tooLong": "Значение «Руководитель проекта» должно содержать максимум 255 символов.",
                                        "skipOnEmpty": 1
                                    });
                                }
                            }, {
                                "id": "portfolio-team",
                                "name": "team",
                                "container": ".field-portfolio-team",
                                "input": "#portfolio-team",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                    yii.validation.required(value, messages, {
                                        "message": "Необходимо заполнить «Команда»."
                                    });
                                }
                            }, {
                                "id": "portfolio-file2",
                                "name": "file2[]",
                                "container": ".field-portfolio-file2",
                                "input": "#portfolio-file2",
                                "validate": function(attribute, value, messages, deferred, $form) {
                                        yii.validation.image(attribute, messages, {
                                                    "message": "Загрузка файла не удалась.",
                                                    "skipOnEmpty": true,
                                                    "mimeTypes": [],
                                                    "wrongMimeType": "Разрешена загрузка файлов только со следующими MIME-типами: .",
                                                    "extensions": [],
                                                    "wrongExtension": "Разрешена загрузка файлов только со следующими расширениями: .",
                                                    "maxFiles": 3,
                                                    "tooMany": "Вы не можете загружать более 3 файлов.",
                                                    "notImage": "Файл «{file}» не является изображением.",
                                                    "minWidth": 1080,
                                                    "underWidth": "Файл «{file}» слишком маленький. Ширина должна быть более 1 080 пикселей.",
                                                    "maxWidth": 1920,
                                                    "overWidth": "Файл «{file}» слишком большой. Ширина не должна превышать 1 920 пикселей.",
                                                    "minHeight": 300,
                                                    "underHeight": "Фай…
</script>