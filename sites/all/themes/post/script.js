function setTabs(tab){
    var t = "";
    if (tab == "contests"){
        t = document.getElementById('contestLink');
        t.className = "select";
    } else if (tab == "events"){
        t = document.getElementById('eventLink');
        t.className = "select";
    } else if (tab == "faqs"){
        t = document.getElementById('faqLink');
        t.className = "select";
    } else {
        t = "";
    }
}

function setHelp(){
    $(".help-topic").click(function(){
        $(".postfun-help").hide();
        var topic = "#postfun-help-" + $(this).attr("name");
        $(topic).show();
        return false;
    });
}