baseUrl = window.origin;
var table = $(".table").DataTable({
    processing: true,
    serverSide: true,
    ajax: baseUrl+"/appList",
    columns: [
        { data: "id", name: "id" },
        { data: "name", name: "name" },
        { data: "bundle_id", name: "bundle_id" },
        { data: "action", name: "action", orderable: false, searchable: false },
    ],
});
