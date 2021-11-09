/*!
 * WebCodeCamJS 2.1.0 javascript Bar code and QR code decoder
 * Author: Tóth András
 * Web: http://atandrastoth.co.uk
 * email: atandrastoth@gmail.com
 * Licensed under the MIT license
 */
(function (undefined) {
    "use strict";

    function Q(el) {
        if (typeof el === "string") {
            var els = document.querySelectorAll(el);
            return typeof els === "undefined"
                ? undefined
                : els.length > 1
                ? els
                : els[0];
        }
        return el;
    }
    var txt =
        "innerText" in HTMLElement.prototype ? "innerText" : "textContent";

    var scannerLaser = Q(".scanner-laser"),
        imageUrl = new Q("#image-url"),
        play = Q("#play"),
        scannedImg = Q("#scanned-img"),
        scannedQR = Q("#scanned-QR"),
        grabImg = Q("#grab-img"),
        decodeLocal = Q("#decode-img"),
        pause = Q("#pause"),
        stop = Q("#stop"),
        contrast = Q("#contrast"),
        contrastValue = Q("#contrast-value"),
        zoom = Q("#zoom"),
        zoomValue = Q("#zoom-value"),
        brightness = Q("#brightness"),
        brightnessValue = Q("#brightness-value"),
        threshold = Q("#threshold"),
        thresholdValue = Q("#threshold-value"),
        sharpness = Q("#sharpness"),
        sharpnessValue = Q("#sharpness-value"),
        grayscale = Q("#grayscale"),
        grayscaleValue = Q("#grayscale-value"),
        flipVertical = Q("#flipVertical"),
        flipVerticalValue = Q("#flipVertical-value"),
        flipHorizontal = Q("#flipHorizontal"),
        flipHorizontalValue = Q("#flipHorizontal-value");

    var args = {
        autoBrightnessValue: 100,
        resultFunction: function (res) {
            [].forEach.call(scannerLaser, function (el) {
                fadeOut(el, 0.5);
                setTimeout(function () {
                    fadeIn(el, 0.5);
                }, 300);
            });
            chaqir(res.code);
            scannedImg.src = res.imgData;
            // scannedQR[txt] = res.code;
            // scannedQR[val] = res.code;
            // document.getElementById("scanned-QR").value = "Johnny Bravo";
            document.getElementById("scanned-QR").value = res.code;
        },
        getDevicesError: function (error) {
            var p,
                message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        getUserMediaError: function (error) {
            var p,
                message = "Error detected with the following parameters:\n";
            for (p in error) {
                message += p + ": " + error[p] + "\n";
            }
            alert(message);
        },
        cameraError: function (error) {
            var p,
                message = "Error detected with the following parameters:\n";
            if (error.name == "NotSupportedError") {
                var ans = confirm(
                    "Your browser does not support getUserMedia via HTTP!\n(see: https:goo.gl/Y0ZkNV).\n You want to see github demo page in a new window?"
                );
                if (ans) {
                    window.open("https://andrastoth.github.io/webcodecamjs/");
                }
            } else {
                for (p in error) {
                    message += p + ": " + error[p] + "\n";
                }
                alert(message);
            }
        },
        cameraSuccess: function () {
            grabImg.classList.remove("disabled");
        },
    };
    var decoder = new WebCodeCamJS("#webcodecam-canvas")
        .buildSelectMenu("#camera-select", "environment|back")
        .init(args);

    decodeLocal.addEventListener(
        "click",
        function () {
            Page.decodeLocalImage();
        },
        false
    );
    play.addEventListener(
        "click",
        function () {
            if (!decoder.isInitialized()) {
                scannedQR[txt] = "Scanning ...";
            } else {
                scannedQR[txt] = "Scanning ...";
                decoder.play();
            }
        },
        false
    );
    grabImg.addEventListener(
        "click",
        function () {
            if (!decoder.isInitialized()) {
                return;
            }
            var src = decoder.getLastImageSrc();
            scannedImg.setAttribute("src", src);
        },
        false
    );
    pause.addEventListener(
        "click",
        function (event) {
            scannedQR[txt] = "Paused";
            decoder.pause();
        },
        false
    );
    stop.addEventListener(
        "click",
        function (event) {
            grabImg.classList.add("disabled");
            scannedQR[txt] = "Stopped";
            decoder.stop();
        },
        false
    );
    Page.changeZoom = function (a) {
        if (decoder.isInitialized()) {
            var value =
                typeof a !== "undefined"
                    ? parseFloat(a.toPrecision(2))
                    : zoom.value / 10;
            zoomValue[txt] =
                zoomValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.zoom = value;
            if (typeof a != "undefined") {
                zoom.value = a * 10;
            }
        }
    };
    Page.changeContrast = function () {
        if (decoder.isInitialized()) {
            var value = contrast.value;
            contrastValue[txt] =
                contrastValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.contrast = parseFloat(value);
        }
    };
    Page.changeBrightness = function () {
        if (decoder.isInitialized()) {
            var value = brightness.value;
            brightnessValue[txt] =
                brightnessValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.brightness = parseFloat(value);
        }
    };
    Page.changeThreshold = function () {
        if (decoder.isInitialized()) {
            var value = threshold.value;
            thresholdValue[txt] =
                thresholdValue[txt].split(":")[0] + ": " + value.toString();
            decoder.options.threshold = parseFloat(value);
        }
    };
    Page.changeSharpness = function () {
        if (decoder.isInitialized()) {
            var value = sharpness.checked;
            if (value) {
                sharpnessValue[txt] =
                    sharpnessValue[txt].split(":")[0] + ": on";
                decoder.options.sharpness = [0, -1, 0, -1, 5, -1, 0, -1, 0];
            } else {
                sharpnessValue[txt] =
                    sharpnessValue[txt].split(":")[0] + ": off";
                decoder.options.sharpness = [];
            }
        }
    };
    Page.changeVertical = function () {
        if (decoder.isInitialized()) {
            var value = flipVertical.checked;
            if (value) {
                flipVerticalValue[txt] =
                    flipVerticalValue[txt].split(":")[0] + ": on";
                decoder.options.flipVertical = value;
            } else {
                flipVerticalValue[txt] =
                    flipVerticalValue[txt].split(":")[0] + ": off";
                decoder.options.flipVertical = value;
            }
        }
    };
    Page.changeHorizontal = function () {
        if (decoder.isInitialized()) {
            var value = flipHorizontal.checked;
            if (value) {
                flipHorizontalValue[txt] =
                    flipHorizontalValue[txt].split(":")[0] + ": on";
                decoder.options.flipHorizontal = value;
            } else {
                flipHorizontalValue[txt] =
                    flipHorizontalValue[txt].split(":")[0] + ": off";
                decoder.options.flipHorizontal = value;
            }
        }
    };
    Page.changeGrayscale = function () {
        if (decoder.isInitialized()) {
            var value = grayscale.checked;
            if (value) {
                grayscaleValue[txt] =
                    grayscaleValue[txt].split(":")[0] + ": on";
                decoder.options.grayScale = true;
            } else {
                grayscaleValue[txt] =
                    grayscaleValue[txt].split(":")[0] + ": off";
                decoder.options.grayScale = false;
            }
        }
    };
    Page.decodeLocalImage = function () {
        if (decoder.isInitialized()) {
            decoder.decodeLocalImage(imageUrl.value);
        }
        imageUrl.value = null;
    };
    var getZomm = setInterval(function () {
        var a;
        try {
            a = decoder.getOptimalZoom();
        } catch (e) {
            a = 0;
        }
        if (!!a && a !== 0) {
            Page.changeZoom(a);
            clearInterval(getZomm);
        }
    }, 500);

    function fadeOut(el, v) {
        el.style.opacity = 1;
        (function fade() {
            if ((el.style.opacity -= 0.1) < v) {
                el.style.display = "none";
                el.classList.add("is-hidden");
            } else {
                requestAnimationFrame(fade);
            }
        })();
    }

    function fadeIn(el, v, display) {
        if (el.classList.contains("is-hidden")) {
            el.classList.remove("is-hidden");
        }
        el.style.opacity = 0;
        el.style.display = display || "block";
        (function fade() {
            var val = parseFloat(el.style.opacity);
            if (!((val += 0.1) > v)) {
                el.style.opacity = val;
                requestAnimationFrame(fade);
            }
        })();
    }
    document
        .querySelector("#camera-select")
        .addEventListener("change", function () {
            if (decoder.isInitialized()) {
                decoder.stop().play();
            }
        });
}.call((window.Page = window.Page || {})));

function chaqir(qiymat) {
    console.log(qiymat);
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $.ajax({
        type: "POST",
        url: "/admin/ajaxRequest",
        data: {
            qr_code: qiymat,
        },
        success: function (data) {
            alert(data.success);
        },
    });
}
$(function () {
    $("#user_data").hide();
    $("#book_data").hide();
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $("#tbody").on("click", ".remove", function () {
        // Getting all the rows next to the

        // row containing the clicked button

        var child = $(this).closest("tr").nextAll();
        // Iterating across all the rows

        // obtained to change the index

        child.each(function () {
            // Getting <tr> id.

            var id = $(this).attr("id");

            // Getting the <p> inside the .row-index class.

            var idx = $(this).children(".row-index").children("p");

            // Gets the row number from <tr> id.

            var dig = parseInt(id.substring(1));

            // Modifying row index.

            idx.html(`Row ${dig - 1}`);

            // Modifying row id.

            $(this).attr("id", `R${dig - 1}`);
        });

        $(this).closest("tr").remove();

        // Decreasing the total number of rows by 1.
    });
    $("#saveBtn").prop("disabled", true);
    $("#qidirish_qr").on("click", function (e) {
        e.preventDefault();
        let qr_code = $("#scanned-QR").val();

        $.ajax({
            type: "POST",
            url: "/admin/ajaxRequest",
            data: {
                qr_code: qr_code,
            },
            success: function (data) {
                if (data.success) {
                    if (data.type == "book") {
                        $("#id_qr_codes").val(data.data.qr_id + ",");

                        markup =
                            `<tr id="R${data.data.qr_id}" >
                            <td>
                            <input type="hidden" name='books_id[]' id="books_id" value="` +
                            data.data.book_id +
                            `
                            ">
                            <input type="hidden" name='qr_id[]' id="qr_id" class="qr_id" value="` +
                            data.data.qr_id +
                            `
                            ">
                            ` +
                            data.data.qr_id +
                            `
                            </td>
                            <td> ` +
                            data.data.book_title +
                            `</td><td> ` +
                            data.data.book_author +
                            `</td><td> ` +
                            data.data.book_qr_code +
                            `</td>
                            <td class="text-center">
                            <input type='number' name='for_how_many_days[]' value='10' />
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger remove" type="button">Remove</button>
                            </td>
                            </tr>`;
                        tableBody = $("table tbody");
                        tableBody.append(markup);
                        $("#book_data").show();
                        const book_ids = [];
                        var books_ids = $("#books_ids").val();

                        if (books_ids == "") {
                            $('[name="books_id"]').val(data.data.book_id);
                        } else {
                            books_ids = books_ids + ", " + data.data.book_id;
                            // books_ids.push(data.data.book_id);
                            $('[name="books_id"]').val(books_ids);
                            // books_ids.push(data.data.book_id);
                        }
                    }
                    if (data.type == "user") {
                        $("#user_data").show();

                        var url = "/storage/avatar/" + data.data.image;
                        // var image = new Image();
                        // image.src = url;
                        // $(`<img src='${url}' width="80px" />`).appendTo(
                        //     "#image"
                        // );
                        $("#image").attr("src", url);

                        var email = data.data.user.email;
                        var name = data.data.user.name;
                        var qr_code = data.data.qr_code;
                        $("#kitobxon_id").val(data.data.user.id);
                        $("#name").text(name);
                        $("#email").text(email);
                        $("#qr_code").text(qr_code);
                        $("#saveBtn").prop("disabled", false);
                    }
                    $("#scanned-QR").val("");
                }
            },
        });
    });
    // keyup keydown
    $("#scanned-QR").on("change", function (e) {
        e.preventDefault();
        let qr_code = $("#scanned-QR").val();

        $.ajax({
            type: "POST",
            url: "/admin/ajaxRequest",
            data: {
                qr_code: qr_code,
            },
            success: function (data) {
                if (data.success) {
                    if (data.type == "book") {
                        $("#id_qr_codes").val(data.data.qr_id + ",");

                        markup =
                            `<tr id="R${data.data.qr_id}" >
                            <td>
                            <input type="hidden" name='books_id[]' id="books_id" value="` +
                            data.data.book_id +
                            `
                            ">
                            <input type="hidden" name='qr_id[]' id="qr_id" class="qr_id" value="` +
                            data.data.qr_id +
                            `
                            ">
                            ` +
                            data.data.qr_id +
                            `
                            </td>
                            <td> ` +
                            data.data.book_title +
                            `</td><td> ` +
                            data.data.book_author +
                            `</td><td> ` +
                            data.data.book_qr_code +
                            `</td>
                            <td class="text-center">
                            <input type='number' name='for_how_many_days[]' value='10' />
                            </td>
                            <td class="text-center">
                                <button class="btn btn-danger remove" type="button">Remove</button>
                            </td>
                            </tr>`;
                        tableBody = $("table tbody");
                        tableBody.append(markup);
                        $("#book_data").show();
                        const book_ids = [];
                        var books_ids = $("#books_ids").val();

                        if (books_ids == "") {
                            $('[name="books_id"]').val(data.data.book_id);
                        } else {
                            books_ids = books_ids + ", " + data.data.book_id;
                            // books_ids.push(data.data.book_id);
                            $('[name="books_id"]').val(books_ids);
                            // books_ids.push(data.data.book_id);
                        }
                    }
                    if (data.type == "user") {
                        $("#user_data").show();

                        var url = "/storage/avatar/" + data.data.image;
                        // var image = new Image();
                        // image.src = url;
                        // $(`<img src='${url}' width="80px" />`).appendTo(
                        //     "#image"
                        // );
                        $("#image").attr("src", url);

                        var email = data.data.user.email;
                        var name = data.data.user.name;
                        var qr_code = data.data.qr_code;
                        $("#kitobxon_id").val(data.data.user.id);
                        $("#name").text(name);
                        $("#email").text(email);
                        $("#qr_code").text(qr_code);
                        $("#saveBtn").prop("disabled", false);
                    }
                    $("#scanned-QR").val("");
                }
            },
        });
    });
});
