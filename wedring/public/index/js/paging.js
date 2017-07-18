function Paging(objId) {
        this.CurrentPageNum = 1;
        this.PageNum = 0;
        this.PageControl;
        this.objId = objId;
    }
    Paging.prototype.Create = function (pagenum, currentPageNum) {
        var _self = this;
        this.CurrentPageNum = parseInt(currentPageNum);
        this.PageNum = pagenum;
        var array = initArray(pagenum, this.CurrentPageNum);
        var pageDiv = $("#"+_self.objId);
        var ulPaging = $("#" + _self.objId).find("ul");

        for (var i = 0; i < array.length; i++) {
            ulPaging.append(array[i]);
        }
        var infoSpan = $("#" + _self.objId).find("p span");

        infoSpan.text("共" + pagenum + "页，到第");

        this.PageControl = pageDiv;
        $(ulPaging).find("li").click(function () {
            var cssString = $(this).attr("class");
            if(cssString!=undefined)
            {
                if(cssString.indexOf("pag_gray") != -1)
                {
                    return;
                }
            }

            if ($(this).text() == "<<上一页") {
                if (_self.CurrentPageNum - 1 >= 1) {
                    _self.PageIndexChaned(_self.CurrentPageNum - 1);
                    return;
                }
                else {
                    return;
                }
            }
            if ($(this).text() == "下一页>>") {
                if (_self.CurrentPageNum + 1 <= _self.PageNum) {
                    _self.PageIndexChaned(_self.CurrentPageNum + 1);
                    return;
                }
                else {
                    return;
                }
            }
            _self.PageIndexChaned(parseInt($(this).text()));
        });
        $(ulPaging).find("li").mouseover(function(){
            var cssString = $(this).attr("class");
            if(cssString!=undefined)
            {
                if(cssString.indexOf("pag_gray") != -1)
                {
                    return;
                }
            }
            $(this).addClass("mouseover");
        });
        $(ulPaging).find("li").mouseout(function(){
            $(this).removeClass("mouseover");
        });
    };

    Paging.prototype.Clear = function () {
        $(this.PageControl).find("ul li").remove();
    }

    //提供给用户自定义的
    Paging.prototype.CustomChanged = function (changedNum) { };

    function initArray(pagenum, currentpagenum) {
        var array = new Array();
        //区域固定显示页数
        var spacecount = 5;
        var rightcount = (spacecount - 1) / 2;
        var leftcount = (spacecount - 1) / 2;

        //是否显示上一页(大小为SpaceCount区域)
        if (currentpagenum > 1) {
            array.push("<li class=\"pli\"><<上一页</li>");
        }
        else
        {
            array.push("<li class=\"pli pag_gray\"><<上一页</li>");
        }

        for (var i = rightcount; i > 0; i--) {
            if (currentpagenum - i > 0) {
                array.push("<li>" + (currentpagenum - i) + "</li>");
            }
            else {
                leftcount++;
            }
        }

        //显示当前页
        array.push("<li class=\"pag_gray\">" + currentpagenum + "</li>");

        var tempcount = rightcount;

        for (var i = 1; i <= leftcount; i++) {
            if (currentpagenum + i <= pagenum) {
                array.push("<li>" + (currentpagenum + i) + "</li>");
            }
            else {
                tempcount++;
            }
        }

        //补前区域
        for (var i = rightcount + 1; i <= tempcount; i++) {
            if (currentpagenum - i > 0) {
                array.splice(1, 0, "<li>" + (currentpagenum - i) + "</li>");
            }
        }

        //是否显示下一页(大小为SpaceCount区域)
        if (currentpagenum < pagenum) {
            array.push("<li class=\"pli2\">下一页>></li>");
        }
        else
        {
            array.push("<li class=\"pli2 pag_gray\">下一页>></li>");
        }
        return array;
    }
    Paging.prototype.PageIndexChaned = function (num) {
        if (num == "") {
            return;
        }
        if (isNaN(num)) {
            alert("请输入合法数字。");
            return;
        }
        if (parseInt(num) <= 0 || parseInt(num) > this.PageNum) {
            alert("超出了页码范围。");
            return;
        }
        this.Clear();
        this.Create(this.PageNum, num);
        this.CustomChanged(num);
    }

    Paging.prototype.ReCreate = function (pagecount,currentnum) {
        this.Clear();
        this.Create(pagecount, currentnum);
    }
    Paging.prototype.Next = function () {
        $("#" + this.objId + " .pli2").click();
    }
    Paging.prototype.Previous = function () {
        $("#" + this.objId + " .pli").click();
    }