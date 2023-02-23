function trimText(str) {
    return str.trim().length;
}

document.getElementById("username").addEventListener("input", function() {
    if(trimText(this.value)) {
        document.getElementById("userlabel").classList.remove("label-large");
        document.getElementById("userlabel").classList.add("label-tiny");
    } else {
        document.getElementById("userlabel").classList.remove("label-tiny");
        document.getElementById("userlabel").classList.add("label-large");
    }
});

document.getElementById("password").addEventListener("input", function() {
    if(trimText(this.value)) {
        document.getElementById("pwlabel").classList.remove("label-large");
        document.getElementById("pwlabel").classList.add("label-tiny");
    } else {
        document.getElementById("pwlabel").classList.remove("label-tiny");
        document.getElementById("pwlabel").classList.add("label-large");
    }
});

try {
    document.getElementById("email").addEventListener("input", function() {
        if(trimText(this.value)) {
            document.getElementById("elabel").classList.remove("label-large");
            document.getElementById("elabel").classList.add("label-tiny");
        } else {
            document.getElementById("elabel").classList.remove("label-tiny");
            document.getElementById("elabel").classList.add("label-large");
        }
    });
} catch(err) {
    console.log("Failed");
}