//select 2
$("select.select2").select2();
$(".nosearch").select2({
    minimumResultsForSearch: Infinity,
});

//datatables
$(document).ready(function () {
    $("#table_floors").DataTable({
        lengthChange: false,
        searching: false,
        ordering: false,
        serverSide: true,
        processing: true,
        ajax: {
            url: "/admin/floors/table",
        },
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                width: "10px",
                orderable: false,
                searchable: false,
            },
            { data: "building.name", name: "building.name" },
            { data: "code", name: "code" },
            { data: "name", name: "name" },
            { data: "monthly_price", name: "monthly_price" },
            { data: "service_charge", name: "service_charge" },
            { data: "own_electricity", name: "own_electricity" },
            {
                data: "action",
                name: "action",
                orderable: false,
                searchable: false,
            },
        ],
        columnDefs: [],
    });
});
