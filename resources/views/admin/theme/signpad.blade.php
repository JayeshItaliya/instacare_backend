@extends('admin.theme.default')
@section('style')
    <style>
        canvas {
            border: 2px dotted #CCCCCC;
            border-radius: 15px;
            cursor: crosshair;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 sign-box">
            <canvas id="signaturecanvas" width="400" height="200">
                Get a better browser, bro.
            </canvas>
            <button class="btn btn-primary sig-submitBtn">Submit Signature</button>
            <button class="btn btn-default sig-clearBtn">Clear Signature</button>
        </div>
    </div>
@endsection
@section('script')
    <script>
        (function($) {
            $('.sign-box').each(function() {
                window.requestAnimFrame = (function(callback) {
                    return window.requestAnimationFrame ||
                        window.webkitRequestAnimationFrame ||
                        window.mozRequestAnimationFrame ||
                        window.oRequestAnimationFrame ||
                        window.msRequestAnimaitonFrame ||
                        function(callback) {
                            window.setTimeout(callback, 1000 / 60);
                        };
                })();
                var canvas = document.getElementById('signaturecanvas');
                var ctx = canvas.getContext("2d");
                ctx.strokeStyle = "#222222";
                ctx.lineWidth = 4;
                var drawing = false;
                var mousePos = {
                    x: 0,
                    y: 0
                };
                var lastPos = mousePos;
                canvas.addEventListener("mousedown", function(e) {
                    drawing = true;
                    lastPos = getMousePos(canvas, e);
                }, false);
                canvas.addEventListener("mouseup", function(e) {
                    drawing = false;
                }, false);
                canvas.addEventListener("mousemove", function(e) {
                    mousePos = getMousePos(canvas, e);
                }, false);
                canvas.addEventListener("touchstart", function(e) {
                    // Touch event support for mobile
                }, false);
                canvas.addEventListener("touchmove", function(e) {
                    var touch = e.touches[0];
                    var me = new MouseEvent("mousemove", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(me);
                }, false);
                canvas.addEventListener("touchstart", function(e) {
                    mousePos = getTouchPos(canvas, e);
                    var touch = e.touches[0];
                    var me = new MouseEvent("mousedown", {
                        clientX: touch.clientX,
                        clientY: touch.clientY
                    });
                    canvas.dispatchEvent(me);
                }, false);
                canvas.addEventListener("touchend", function(e) {
                    var me = new MouseEvent("mouseup", {});
                    canvas.dispatchEvent(me);
                }, false);
                function getMousePos(canvasDom, mouseEvent) {
                    var rect = canvasDom.getBoundingClientRect();
                    return {
                        x: mouseEvent.clientX - rect.left,
                        y: mouseEvent.clientY - rect.top
                    }
                }

                function getTouchPos(canvasDom, touchEvent) {
                    var rect = canvasDom.getBoundingClientRect();
                    return {
                        x: touchEvent.touches[0].clientX - rect.left,
                        y: touchEvent.touches[0].clientY - rect.top
                    }
                }

                function renderCanvas() {
                    if (drawing) {
                        ctx.moveTo(lastPos.x, lastPos.y);
                        ctx.lineTo(mousePos.x, mousePos.y);
                        ctx.stroke();
                        lastPos = mousePos;
                    }
                }

                // Prevent scrolling when touching the canvas
                $(document.body).on('touchstart touchend touchmove', function(e) {
                    if (e.target == canvas) {
                        e.preventDefault();
                    }
                });
                (function drawLoop() {
                    requestAnimFrame(drawLoop);
                    renderCanvas();
                })();
                function clearCanvas() {
                    canvas.width = canvas.width;
                    ctx.strokeStyle = "#222222";
                    ctx.lineWidth = 4;
                }
                $('.sig-clearBtn').click(function() {
                    clearCanvas();
                });
                $('.sig-submitBtn').click(function() {
                    console.log(canvas.toDataURL());
                });
            });

        })(jQuery);
    </script>
@endsection
