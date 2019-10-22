

var divNew = document.createElement('div');
divNew.setAttribute("id", 'modal');
var divNew2 = document.createElement('div');

(function ($) {
    $.modal = function (options) {
        var setting = {
            modal: {
                size: 'modal-dialog',
                class: '',
                title: '',
                link: '',
                link2: '',
            }
        }

        $.extend(setting, options);
        document.body.appendChild(divNew);

        divNew.setAttribute('class', 'modal fade ');
        divNew.setAttribute('data-keyboard', 'false');
        divNew.setAttribute('tabindex', '-1');
        divNew.setAttribute('role', 'dialog');
        divNew.setAttribute('aria-labelledby', 'exampleModalLabel');
        divNew.setAttribute('aria-hidden', 'true');

        divNew2.setAttribute('class', setting.modal.size);
        divNew2.setAttribute('role', 'document');


        var divNew3 = document.createElement('div');
        divNew3.setAttribute('class', 'modal-content d-flex justify-content-center');
        divNew3.setAttribute('id', 'modal01')

        var divNew4 = document.createElement('div');
        divNew4.setAttribute('class', 'modal-header');


        var h1 = document.createElement('h1');
        divNew4.appendChild(h1);
        h1.append(setting.modal.title);
        h1.setAttribute("class", 'modal-title');
        h1.setAttribute("id", 'exampleModalLabel');


        var button = document.createElement('button')
        divNew4.appendChild(button);
        button.append('x')
        button.setAttribute("class", 'close');
        button.setAttribute('data-dismiss', 'modal');
        button.setAttribute('aria-label', 'close');
        button.setAttribute('aria-hidden', 'true');
        button.setAttribute('onclick', 'Quitar()');

        var divNew5 = document.createElement('div');
        divNew5.setAttribute('class', 'modal-body');
        divNew5.setAttribute('style', 'text-align:center');

        //formulario
        var divform = document.createElement('div');
        divNew5.appendChild(divform);
        divform.setAttribute('class', 'content');
        

        var nav = document.createElement('nav');
        divform.appendChild(nav);
        nav.setAttribute('nav', 'navbar navbar-expand-lg navbar-light d-flex justify-content-center');

        var form = document.createElement('form');
        nav.appendChild(form);
        form.setAttribute('class', 'form-inline my-2 my-lg-0');
        form.setAttribute('action', 'graficos copy.php');
        form.setAttribute('method', 'get');

        var divef = document.createElement('div');
        form.appendChild(divef);
        divef.setAttribute('class', 'input-group-prepend');
        divef.setAttribute('style', 'text-align:center');

        var label = document.createElement('label');
        divef.appendChild(label);
        label.setAttribute('class', 'input-group-text');
        label.setAttribute('for', 'inputGroupSelect01');
        label.append('limite');

        var select = document.createElement('select');
        label.appendChild(select);
        select.setAttribute('class', 'custom-select');
        select.setAttribute('id', 'txt');
        select.setAttribute('name', 'limite');
        select.setAttribute('style', 'width:200px');

        var option0 = document.createElement('option');
        select.appendChild(option0);
        option0.setAttribute('value', '0');
        option0.append('seleccione');

        var option4 = document.createElement('option');
        select.appendChild(option4);
        option4.setAttribute('value', '4');
        option4.append('4');

        var option8 = document.createElement('option');
        select.appendChild(option8);
        option8.setAttribute('value', '8');
        option8.append('8');


        var option12 = document.createElement('option');
        select.appendChild(option12);
        option12.setAttribute('value', '12');
        option12.append('12');

        var option15 = document.createElement('option');
        select.appendChild(option15);
        option15.setAttribute('value', '15');
        option15.append('--');

        var buttonf = document.createElement('button');
        divef.appendChild(buttonf);
        buttonf.setAttribute('type', 'submit');
        buttonf.setAttribute('value', 'Send');
        buttonf.setAttribute('class', 'btn btn-success');
        buttonf.setAttribute('id', 'submit');
        buttonf.append('enviar');

        //divs de las imagenes
        var image = document.createElement('div');
        divNew5.appendChild(image);
        image.setAttribute('class', 'row');
        image.setAttribute('id','jjj')

        for (var i = 0; i <= 3; i++) {
            var image1 = document.createElement('div');
            image.appendChild(image1);
            image1.setAttribute('id', 'div' + [i]);
            image1.setAttribute('class', '.col-md-6 d-flex justify-content-center');
            image1.setAttribute('style', 'height: 500px;width:500px;text-align: center');
        }


        var divNew6 = document.createElement('div');
        divNew6.setAttribute('class', 'modal-footer')


        var Save = document.createElement('button')
        divNew6.appendChild(Save);
        Save.append('Save changes')
        Save.setAttribute("class", 'btn btn-primary');

        var download = document.createElement('button')
        divNew6.appendChild(download);
        download.append('exportar')
        download.setAttribute("class", 'btn btn-success');
        download.setAttribute("id", 'download');
        download.setAttribute("onclick", 'demo1()');

        var close = document.createElement('button')
        divNew6.appendChild(close);
        close.append('Close')
        close.setAttribute("class", 'btn btn-secondary');
        close.setAttribute("data-dismiss", 'modal');

        divNew.appendChild(divNew2);
        divNew2.appendChild(divNew3);
        divNew3.appendChild(divNew4);
        divNew3.appendChild(divNew5);
        divNew3.appendChild(divNew6);
    };
})(jQuery);

function Quitar() {
    var ultimo = document.getElementById('modal');
    document.body.removeChild(ultimo);
}


/*function demo1() {
        var doc = new jsPDF('p', 'pt', 'a4', true);
        doc.fromHTML($('#modal').get(0), 15, 15, {
            'width': 500
        }, function (dispose) {
            doc.save('thisMotion.pdf');
    });
}*/

function demo1() {
    html2canvas(document.querySelector("#jjj")).then(canvas => {
        var doc = new jsPDF();
        var imgData = canvas;
        doc.setFontSize(40);
        doc.text(20, 25, 'reporte de llamadas entrantes')
        doc.addImage(imgData, 'JPEG', 10, 50, 200, 200);
        doc.save('export.pdf')
    });
}

