function reloadCaptcha() {
    document.getElementById("captcha_img").src = "imgGen.php?rand=" + Math.random()
}