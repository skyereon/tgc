
function DropDown(el) {
    this.dd = el;
    this.placeholder = this.dd.children('span');
    this.opts = this.dd.find('ul.drop li');
    this.val = '';
    this.index = -1;
    this.initEvents();
}

DropDown.prototype = {
    initEvents: function () {
        var obj = this;
        obj.dd.on('click', function (e) {
            e.preventDefault();
            e.stopPropagation();
            $(this).toggleClass('active');

        });
        obj.opts.on('click', function () {
            var opt = $(this);
            // alert(opt.text());

            if (opt.text() == 'Dota 2'){
                document.location.href = "http://www.thegameclub.club/dota";
            }
            else if (opt.text() == 'LoL'){
                document.location.href = "http://www.thegameclub.club/lol";
            }
            else if (opt.text() == 'Hearthstone'){
                document.location.href = "http://www.thegameclub.club/hearthstone";
            }
            else if (opt.text() == 'csgo'){
                document.location.href = "http://www.thegameclub.club/csgo";
            }
            obj.val = opt.text();
            obj.index = opt.index();
            obj.placeholder.text(obj.val);
            opt.siblings().removeClass('selected');
            opt.filter(':contains("' + obj.val + '")').addClass('selected');
        }).change();
    },
    getValue: function () {
        return this.val;
    },
    getIndex: function () {
        return this.index;
    }
};

$(function () {
    // create new variable for each menu
    var dd1 = new DropDown($('#noble-gases'));
    // var dd2 = new DropDown($('#other-gases'));
    $(document).click(function () {
        // close menu on document click
        $('.wrap-drop').removeClass('active');
    });
});