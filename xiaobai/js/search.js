function search() {
    var keyword = document.getElementById('keyword');
    if (keyword == "") {
        alert("关键词不能为空！");
    } else {
        if ( !keyword.test(/^[\S\u4E00-\u9FA5]{1,20}/) ) {
            return false;
        } else {
            return true;
        }
    }
}