$('#mode_toggle').change(function () {
    if(this.value == "dark"){
        KTApp.setThemeMode("dark", function() {
            $("#dark_mode").hide();
            $("#light_mode").show();
        }); // set dark mode
        $("#mode_toggle").val('light');
    }else{
        KTApp.setThemeMode("light", function() {
            $("#light_mode").hide();
            $("#dark_mode").show();
        }); // set light mode
        $("#mode_toggle").val('dark');
    }
});
$("#light_mode").hide();
function mode(type)
{
    if(type == "dark"){
        $('#mode_toggle').prop('checked', true);
        KTApp.setThemeMode("dark", function() {
            $("#dark_mode").hide();
            $("#light_mode").show();
        }); // set dark mode
        $("#mode_toggle").val('light');
    }else{
        $('#mode_toggle').prop('checked', false);
        KTApp.setThemeMode("light", function() {
            $("#light_mode").hide();
            $("#dark_mode").show();
        }); // set light mode
        $("#mode_toggle").val('dark');
    }
}