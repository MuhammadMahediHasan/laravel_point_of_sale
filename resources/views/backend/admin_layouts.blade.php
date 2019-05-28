@include('backend.admin_html_header');
@include('backend.admin_header');
@include('backend.admin_sidebar');


@yield('main_content');

@include('backend.admin_right-sidebar');
@include('backend.admin_chat_panel');
@include('backend.admin_footer');
@include('backend.admin_modal_menu');        
@include('backend.admin_js');

