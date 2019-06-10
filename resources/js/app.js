/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('./sb-admin');
require('../../node_modules/bootstrap-select/js/bootstrap-select');
require('datatables.net-bs4');
// require('datatables.net-colreorder-bs4')();

// window.Vue = require('vue');
$(document).ready(function () {
    let table = $('#data_table').DataTable({
        "columnDefs": [
            {
                "searchable": false,
                "orderable": false,
                "targets": 0
            },
            {
                "searchable": false,
                "targets": [6, 7]
            },
            {
                "visible": false,
                "searchable": false,
                "orderable": false,
                "targets": [1, 2, 3, 4]
            }
        ],
        colReorder: true,
        dom:
            "<'row'<'col'l><'col'i><'col'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
        // columns: [
        //     {
        //         data: 'id',
        //         name: 'analyses.id',
        //         searchable: true,
        //         bSortable: true
        //     },
        // ],
        bAutoWidth: true,
        scrollX: true,
        "order": [[1, 'asc']],
        responsive: true
    });

    $("#filters select").on('change', function (ev) {
        console.log(ev.target.id === 'game-platform');
        console.log(ev.target.id);
        let searchTags = '';
        for (let i = 0; i < ev.target.options.length; i++) {
            let option = ev.target.options[i];
            // console.log(option);
            if (option.selected) {
                searchTags += ':' + option.value + ', '
            }
        }

        console.log(searchTags);

        switch (ev.target.id) {
            case 'game-franchise':
                table.column(1).search(searchTags).draw();
                break;
            case 'game-platform':
                table.column(2).search(searchTags).draw();
                break;
            case 'game-tag':
                table.column(3).search(searchTags).draw();
                break;
            case 'game-edition':
            default:
                table.column(4).search(searchTags).draw();
                break;
        }
        // table.column(2).search(searchTags).draw()

        // table
        //     .column($(this).parent().index() + ':visible')
        //     .search(this.value)
        //     .draw();
    });
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });
$(document).on("keydown", ":input:not(textarea)", function (event) {
    return event.key !== "Enter";
});


function confirmer(ev) {
    if (window.confirm('Are u sure?')) {
        return
    }
    ev.preventDefault()
}
