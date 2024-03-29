$(document).ready(function() {
    /* Back To Top */
    $(window).scroll(function() {
        if ($(this).scrollTop() > 200) {
            $("#back-to-top").fadeIn();
        } else {
            $("#back-to-top").fadeOut();
        }
    });
    $("#back-to-top").hide().click(function() {
        $("html, body").animate({
            scrollTop: 0
        }, 1000);
        return false;
    });
    /* Lazy Load Image */
    ! function(window) {
        var $q = function(q, res) {
                if (document.querySelectorAll) {
                    res = document.querySelectorAll(q);
                } else {
                    var d = document,
                        a = d.styleSheets[0] || d.createStyleSheet();
                    a.addRule(q, 'f:b');
                    for (var l = d.all, b = 0, c = [], f = l.length; b < f; b++)
                        l[b].currentStyle.f && c.push(l[b]);

                    a.removeRule(0);
                    res = c;
                }
                return res;
            },
            addEventListener = function(evt, fn) {
                window.addEventListener ?
                    this.addEventListener(evt, fn, false) :
                    (window.attachEvent) ?
                    this.attachEvent('on' + evt, fn) :
                    this['on' + evt] = fn;
            },
            _has = function(obj, key) {
                return Object.prototype.hasOwnProperty.call(obj, key);
            };

        function loadImage(el, fn) {
            var img = new Image(),
                src = el.getAttribute('src');
            img.onload = function() {
                if (!!el.parent)
                    el.parent.replaceChild(img, el)
                else
                    el.src = src;

                fn ? fn() : null;
            }
            img.src = src;
        }

        function elementInViewport(el) {
            var rect = el.getBoundingClientRect()

            return (
                rect.top >= 0 &&
                rect.left >= 0 &&
                rect.top <= (window.innerHeight || document.documentElement.clientHeight)
            )
        }

        var images = new Array(),
            query = $q('img'),
            processScroll = function() {
                for (var i = 0; i < images.length; i++) {
                    if (elementInViewport(images[i])) {
                        loadImage(images[i], function() {
                            images.splice(i, i);
                        });
                    }
                };
            };
        // Array.prototype.slice.call is not callable under our lovely IE8 
        for (var i = 0; i < query.length; i++) {
            images.push(query[i]);
        };
        processScroll();
        addEventListener('scroll', processScroll);
    }(this);

    /* Pre Code <pre><code> */
    $('i[rel="pre"]').replaceWith(function() {
        return $('<pre><code>' + $(this).html() + '</code></pre>');
    });
    var pres = document.querySelectorAll('pre,kbd,blockquote');
    for (var i = 0; i < pres.length; i++) {
        pres[i].addEventListener("dblclick", function() {
            var selection = getSelection();
            var range = document.createRange();
            range.selectNodeContents(this);
            selection.removeAllRanges();
            selection.addRange(range);
        }, false);
    }

});