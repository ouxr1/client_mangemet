$(document).ready(function () {
    var sidebarCollapsed = localStorage.getItem('sidebarCollapsed');

    if (sidebarCollapsed === null) {
        sidebarCollapsed = false;
    } else {
        sidebarCollapsed = JSON.parse(sidebarCollapsed);
    }

    setSidebarState(sidebarCollapsed);

    $('[data-toggle="sidebar-collapse"]').click(function () {
        sidebarCollapsed = !sidebarCollapsed;
        setSidebarState(sidebarCollapsed);
        localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
    });

    function setSidebarState(collapsed) {
        if (collapsed) {
            $('.sidebar').addClass('collapsed');
            $('#content').addClass('collapsed');
        } else {
            $('.sidebar').removeClass('collapsed');
            $('#content').removeClass('collapsed');
        }
    }
});
