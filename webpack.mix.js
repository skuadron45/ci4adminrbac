let mix = require("laravel-mix");
mix.setPublicPath("resources/dist");

const publicAssetsAdminPath = "resources/dist/assets/admin/";
const resourceRootPath = "node_modules/";
const rootPluginPath = resourceRootPath + "admin-lte/plugins/";

mix.sass("resources/build/sass/app.scss", "resources/dist/assets/admin/css");
//mix.js('resources/build/js/app.js', 'resources/dist/assets/admin/js');

let appJsFiles = [];
appJsFiles.push(resourceRootPath + "js-cookie/src/js.cookie.js");
appJsFiles.push(rootPluginPath + "jquery/jquery.js");
appJsFiles.push(rootPluginPath + "jquery-ui/jquery-ui.js");
appJsFiles.push(rootPluginPath + "bootstrap/js/bootstrap.js");
appJsFiles.push(rootPluginPath + "sweetalert2/sweetalert2.js");
appJsFiles.push(rootPluginPath + "toastr/toastr.min.js");

appJsFiles.push(rootPluginPath + "select2/js/select2.full.js");
appJsFiles.push(rootPluginPath + "chart.js/Chart.js");
appJsFiles.push(rootPluginPath + "moment/moment.min.js");
appJsFiles.push(rootPluginPath + "daterangepicker/daterangepicker.js");
appJsFiles.push(rootPluginPath + "tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.js");
appJsFiles.push(rootPluginPath + "summernote/summernote-bs4.js");
appJsFiles.push(rootPluginPath + "overlayscrollbars/js/jquery.overlayScrollbars.js");
appJsFiles.push(rootPluginPath + "datatables/jquery.dataTables.js");
appJsFiles.push(rootPluginPath + "datatables-bs4/js/dataTables.bootstrap4.js");

appJsFiles.push(resourceRootPath + "jstree/dist/jstree.js");
appJsFiles.push(resourceRootPath + "jstree/src/misc.js");

appJsFiles.push(resourceRootPath + "admin-lte/dist/js/adminlte.js");

appJsFiles.push(rootPluginPath + "pace-progress/pace.js");
appJsFiles.push("resources/build/custom/js/*.js");

mix.combine(appJsFiles, publicAssetsAdminPath + "js/app.js");

mix.copy(
  resourceRootPath + "admin-lte/dist/img/",
  publicAssetsAdminPath + "dist/img/"
);
mix.copy("resources/build/img/", publicAssetsAdminPath + "dist/img/");
