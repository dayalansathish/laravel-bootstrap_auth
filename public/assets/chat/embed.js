function loadHTML(myDivId) {
    (htmlText = replaceHtmlDynamicProps(htmlText)),
        (document.getElementById(myDivId).innerHTML = htmlText);
    for (
        var allScripts = document
                .getElementById(myDivId)
                .getElementsByTagName("script"),
            n = 0;
        n < allScripts.length;
        n++
    )
        eval(allScripts[n].innerHTML);
}
function getPath() {
    let path = location.host;
    return path;
}
function getFPath() {
    let path = location.href;
    return path;
}
function removeIframe() {
    document.getElementById("embed-ab").remove();
    return;
}
function replaceHtmlDynamicProps(t) {
    return (
        (t = t.replace(
            "{{iframeSrc}}",
            abUrl +
                "/fe/" +
                abId +
                "?domain-url=" +
                getPath() +
                "&fpath=" +
                getFPath()
        )),
        (t = replaceAll(t, "{{buttonImg}}", buttonImg)),
        (t = replaceAll(t, "{{avtrImg}}", avtrImg)),
        (t = replaceAll(t, "{{bubbleAni}}", bubbleAni)),
        (t = replaceAll(t, "{{widPosi}}", widPosi)),
        (t = t.replace("{{buttonBackground}}", buttonBg))
    );
}

function replaceAll(t, e, n) {
    return t.replace(new RegExp(e, "g"), n);
}

function setInitPopupStatus() {
    "true" == popUpOpen.toLowerCase() && openPopup();
}

function closePopup() {
    var t = document.getElementById(conversationDiv),
        b = document.getElementById("fo-toggle-button"),
        e = document.getElementById("fo-toggle-button-icon");
    removeClass(e, "animate"),
        removeClass(b, "d-nn"),
        addClass(e, "no-animate"),
        removeClass(t, "open"),
        (isPopupOpen = !1),
        localStorage.setItem("ab-pop-up-open", "false");
}

function openPopup() {
    var t = document.getElementById(conversationDiv),
        b = document.getElementById("fo-toggle-button"),
        e = document.getElementById("fo-toggle-button-icon");
    addClass(e, "animate"),
        addClass(b, "d-nn"),
        removeClass(e, "no-animate"),
        addClass(t, "open"),
        (isPopupOpen = !0),
        localStorage.setItem("ab-pop-up-open", "true");
}

function alterPopupStatus() {
    isPopupOpen ? closePopup() : openPopup();
}

function hasClass(t, e) {
    return t.classList
        ? t.classList.contains(e)
        : !!t.className.match(new RegExp("(\\s|^)" + e + "(\\s|$)"));
}

function addClass(t, e) {
    t.classList
        ? t.classList.add(e)
        : hasClass(t, e) || (t.className += " " + e);
}

function removeClass(t, e) {
    if (t.classList) t.classList.remove(e);
    else if (hasClass(t, e)) {
        var n = new RegExp("(\\s|^)" + e + "(\\s|$)");
        t.className = t.className.replace(n, " ");
    }
}

var width = document.body.clientWidth;
var deviceClass = "";

if (width <= 560) {
    var deviceClass = "fo-mob-screen";
}

// console.log(window.location.hostname);
// console.log("sdfsd");
var hostName = window.location.hostname;
var injectDiv = "embed-ab",
    htmlDiv1 = '<div id="fo-inner-wrap" class=\'' + deviceClass + "'>\r\n ",
    conversationDiv = "fo-conversation-popup-wrapper",
    injectDivElement,
    abId,
    buttonImg,
    buttonBg,
    avtrImg,
    bubbleAni,
    widPosi,
    htmlText =
        htmlDiv1 +
        "    <style>\r\n        #fo-conversation-popup-wrapper {\r\n            position: fixed;\r\n            bottom: 20px;\r\n            right: 20px;\r\n            width: calc(100% - 40px);\r\n            max-width: 400px;\r\n            height: calc(85vh - 30px);\r\n            max-height: 705px;\r\n            border-radius: 15px;\r\n            opacity: 0;\r\n            pointer-events: none;\r\n            transform-origin: right bottom;\r\n            transform: scale(0);\r\n            transition: width 200ms ease 0s, height 200ms ease 0s, max-height 200ms ease 0s, transform 300ms cubic-bezier(0, 1.2, 1, 1) 0s, opacity 83ms ease-out 0s;\r\n        }\r\n    \r\n        #fo-conversation-popup-wrapper.open {\r\n            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15);\r\n            opacity: 1;\r\n            transform: scale(1);\r\n            pointer-events: all;\r\n            z-index: 2147483500;\r\n        }\r\n    \r\n     #fo-conversation-popup-wrapper.fcpw-left {\r\n            transform-origin: left bottom !important;\r\n        }\r\n    \r\n        #fo-iframe-wrapper {\r\n            height: 100%;\r\n            position: relative;\r\n        }\r\n    \r\n        #fo-avtr-abs {\r\n            position: absolute;\r\n            bottom: 15px;\r\n            right: 415px;\r\n            z-index: 5;\r\n            width: 200px;\r\n            height: 400px;\r\n            background-repeat: no-repeat;\r\n            background-attachment: scroll;\r\n            background-color: transparent;\r\n            background-position: bottom right;\r\n            background-size: contain;\r\n        }\r\n    \r\n     #fo-avtr-abs.fcpw-left {\r\n            right: auto !important;\r\n            left: 415px !important;\r\n            background-position: bottom left !important;\r\n        }\r\n    \r\n        #fo-iframe {\r\n            border-radius: 0.625rem;\r\n            width: 100%;\r\n            height: 100%;\r\n            margin-bottom: 0;\r\n        }\r\n    \r\n        #fo-toggle-button {\r\n            position: fixed;\r\n            bottom: 20px;\r\n            right: 20px;\r\n            animation: shake 1.5s;\r\n            animation-iteration-count: infinite;\r\n            border-radius: 50%;\r\n            height: 70px;\r\n            width: 70px;\r\n            cursor: pointer;\r\n            -webkit-box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);\r\n            box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14), 0 1px 5px 0 rgba(0,0,0,0.12), 0 3px 1px -2px rgba(0,0,0,0.2);\r\n            z-index: 2147483500;\r\n            transition: 0.3s;\r\n        }\r\n    \r\n        #fo-toggle-button:hover {\r\n            -webkit-box-shadow: 0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)!important;\r\n            box-shadow: 0 2px 8px rgba(0,0,0,.09),0 4px 40px rgba(0,0,0,.24)!important;\r\n            opacity: 1;\r\n        }\r\n    \r\n        #fo-toggle-button .fo-icon {\r\n            height: 70px;\r\n            width: 70px;\r\n            background-size: 75% 75%;\r\n            background-position: 50% 50%;\r\n            background-repeat: no-repeat;\r\n        }\r\n    \r\n        #fo-toggle-button .fo-icon.animate {\r\n            animation: iconTurnIn 0.3s;\r\n            animation-fill-mode: forwards;\r\n            background-size: 50% 50%;\r\n        }\r\n    \r\n        #fo-toggle-button .fo-icon.no-animate {\r\n            animation: iconTurnOut 0.3s;\r\n            animation-fill-mode: forwards;\r\n        }\r\n    \r\n     #fo-toggle-button.fcpw-left, #fo-conversation-popup-wrapper.fcpw-left {\r\n            right: auto !important;\r\n            left: 20px !important;\r\n        }\r\n    \r\n        @keyframes iconTurnIn {\r\n            0%   { background-image: url('{{buttonImg}}'); transform: rotate(0) scale(1); opacity: 1  }\r\n            15%  { background-image: url('{{buttonImg}}'); transform: rotate(15deg) scale(0.8); opacity: 0.9 }\r\n            50%  { background-image: url('{{buttonImg}}'); transform: rotate(45deg) scale(0.3); opacity: 0.7  }\r\n            51%  { background-image: url('https://" +
        hostName +
        "/assets/chat/close.png'); transform: rotate(45deg) scale(0.1); opacity: 0.7  }\r\n            70%  { background-image: url('https://" +
        hostName +
        "/assets/chat/close.png'); transform: rotate(75deg) scale(0.2); opacity: 0.9 }\r\n            100% { background-image: url('https://" +
        hostName +
        "/assets/chat/close.png'); transform: rotate(90deg) scale(0.5); opacity: 1  }\r\n        }\r\n    \r\n        @keyframes iconTurnOut {\r\n            0%   { background-image: url('https://" +
        hostName +
        "/assets/chat/close.png'); transform: rotate(90deg) scale(0.5); opacity: 1  }\r\n            15%  { background-image: url('https://" +
        hostName +
        "/assets/chat/close.png'); transform: rotate(75deg) scale(0.2); opacity: 0.9 }\r\n            50%  { background-image: url('https://" +
        hostName +
        '/assets/chat/close.png\'); transform: rotate(45deg) scale(0.1); opacity: 0.7  }\r\n            51%  { background-image: url(\'{{buttonImg}}\'); transform: rotate(45deg) scale(0.3); opacity: 0.7  }\r\n            70%  { background-image: url(\'{{buttonImg}}\'); transform: rotate(15deg) scale(0.8); opacity: 0.9 }\r\n            100% { background-image: url(\'{{buttonImg}}\'); transform: rotate(0) scale(1); opacity: 1  }\r\n        }\r\n    \r\n        @keyframes shake {\r\n            0% { transform: translate(1px, 1px) rotate(0deg) }\r\n            10% { transform: translate(-1px, -2px) rotate(-1deg) }\r\n            20% { transform: translate(-3px) rotate(1deg) }\r\n            30% { transform: translate(3px, 2px) rotate(0deg) }\r\n            40% { transform: translate(1px, -1px) rotate(1deg) }\r\n            50% { transform: translate(-1px, 2px) rotate(-1deg) }\r\n            60% { transform: translate(-3px, 1px) rotate(0deg) }\r\n            70% { transform: translate(3px, 1px) rotate(-1deg) }\r\n            80% { transform: translate(-1px, -1px) rotate(1deg) }\r\n            90% { transform: translate(1px, 2px) rotate(0deg) }\r\n            to { transform: translate(1px, 1px) rotate(-1deg) }       }\r\n     .fo-mob-screen #fo-conversation-popup-wrapper {\r\n            bottom: 0;\r\n            right: 0;\r\n            width: 100%;\r\n            height:100%;\r\n            max-width: 100%;\r\n            max-height: 100%;\r\n        }\r\n     .d-nn {\r\n            display: none;\r\n        }\r\n     .anim-none {\r\n            animation: none !important;\r\n        }\r\n     @media (max-width: 991.98px) {#fo-avtr-abs {\r\n            display: none;\r\n        }}</style>\r\n    \r\n    <div id="fo-toggle-button" style="background-color: {{buttonBackground}}" onclick=" alterPopupStatus()" class="{{bubbleAni}} {{widPosi}}">\r\n        <div id="fo-toggle-button-icon" class="fo-icon" style="background-image: url(\'{{buttonImg}}\');"></div>\r\n    </div>\r\n    \r\n    <div id="fo-conversation-popup-wrapper" class="{{widPosi}}">\r\n        <div id="fo-iframe-wrapper">\r\n        <div id="fo-avtr-abs" class="{{widPosi}}" style="background-image: url(\'{{avtrImg}}\');"></div>\r\n            <iframe id=\'fo-iframe\' frameBorder="0" src="{{iframeSrc}}" referrerpolicy="origin-when-cross-origin" ></iframe>\r\n        </div>\r\n    \r\n    </div>\r\n    \r\n    </div>',
    isPopupOpen = !1;
(d_buttonImg = "https://" + hostName + "/assets/media/logos/favicon.png"),
    (d_buttonBg = "#239789"),
    (d_bubbleAni = "anim-ok"),
    (d_widPosi = "fcpw-right");

// window.addEventListener("load", function () {
(function () {
    (injectDivElement = document.getElementById(injectDiv)),
        (abId = injectDivElement.getAttribute("data-ab-id")),
        (abUrl = injectDivElement.getAttribute("data-ab-url")),
        (popUpOpen = ""),
        (buttonImg = injectDivElement.getAttribute("data-btn-img")
            ? injectDivElement.getAttribute("data-btn-img")
            : d_buttonImg),
        (buttonBg = injectDivElement.getAttribute("data-btn-bg")
            ? injectDivElement.getAttribute("data-btn-bg")
            : d_buttonBg),
        (bubbleAni = injectDivElement.getAttribute("data-bub-ani")
            ? injectDivElement.getAttribute("data-bub-ani")
            : d_bubbleAni),
        (widPosi = injectDivElement.getAttribute("data-wid-pos")
            ? injectDivElement.getAttribute("data-wid-pos")
            : d_widPosi),
        (avtrImg =
            injectDivElement.getAttribute("data-avtr-img") &&
            injectDivElement.getAttribute("data-avtr-img")),
        // setCookie("opMode" + abId, 0, 1),
        loadHTML(injectDiv),
        setInitPopupStatus();
})();
// });

window.addEventListener(
    "message",
    function (event) {
        if (
            event.origin !== "https://aicoaches.live" &&
            event.origin !== "https://myagencycoach.agency" &&
            event.origin !== "http://aicoach.local.com" &&
            event.origin !== "https://" + hostName
        ) {
            return;
        }
        if (event.data === "removeIframe") {
            removeIframe();
        }
        if (event.data === "openPopup") {
            openPopup();
        }
        if (event.data === "closePopup") {
            closePopup();
        }
        // console.log("Received message:", event.data);
    },
    false
);
