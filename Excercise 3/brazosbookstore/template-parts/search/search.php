<div class="form-group search w-50 mb-0 d-flex justify-content-end">
    <span class="fas fa-search form-control-feedback"></span>
    <input id="input-search" type="text" class="input-rounded form-control w-100" placeholder="Tìm kiếm sản phẩm...">
</div>

<script>


$(document).ready(function() {
    var options = {
        url: function(phrase) {
            return "http://localhost/brazosbookstore/template-parts/search/search-data.php";
        },

        getValue: function(element) {
            return element.name +' '+element.title;
        },

        ajaxSettings: {
            dataType: "json",
            method: "POST",
            data: {
                dataType: "json"
            }
        },

        preparePostData: function(data) {
            data.phrase = $("#input-search").val();
            return data;
        },

        requestDelay: 500,

        list: {
            maxNumberOfElements: 5,
            match: {
                enabled: true
            }
        },

        highlightPhrase: false,

        template: {
            type: "custom",
            method: function(value, item) {
                return "<table class='m-0 table table-hover'><tbody><tr class='row pl-2'><td class='d-flex col-2 m-0 p-0 align-items-center justify-content-center'>" +
                    "<img src='../admin-site/upload/image/book-poster/" + item.icon + "'>" +
                    "</td><td class='col-md-8 col-7 d-flex align-items-center text-left m-0 p-0'>" +
                    item.title +
                    "</td><td class='col-3 col-md-2 align-items-center text-center pl-0 pr-0'><small class='text-success'>$" +
                    item.price + "</small></td></tr></tbody></table>";
            }
        }
    };

    $("#input-search").easyAutocomplete(options);
});
</script>