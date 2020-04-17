<?php

namespace Ci4adminrbac\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
        public function run()
        {

                $modules = <<<EOD
        INSERT INTO `tbl_modules` (`id`, `module_name`, `module_description`, `module_url`, `module_type`, `parent_module_id`, `module_order`, `module_icon`, `need_privilege`, `super_admin`, `is_active`, `show_on_privilege`, `need_view`, `need_add`, `need_delete`, `need_edit`) VALUES
        (1, 'Pengguna', 'Halaman Pengguna', '#', 1, NULL, 6, 'fa fa-users-cog', 1, 1, 1, 0, 0, 0, 0, 0),
        (2, 'Administrator', 'Halmaan Administrator', 'admin/user/user', 1, 1, 1, 'fa fa-sign-out-alt', 1, 1, 1, 1, 1, 1, 1, 1),
        (3, 'Grup Pengguna', 'Halaman Grup Pengguna', 'admin/user/usergroup', 1, 1, 2, 'fa fa-sign-out-alt', 1, 1, 1, 1, 1, 1, 1, 1),
        (4, 'Dashboard', 'Halaman Dashboard', 'admin/dashboard', 1, NULL, 1, 'fas fa-tachometer-alt', 0, 1, 0, 1, 0, 0, 0, 0),
        (5, 'Profil', 'Halaman Profil Pengguna', 'admin/user/profile', 1, 1, 3, 'fa fa-sign-out-alt', 1, 0, 1, 1, 1, 1, 1, 1),
        (6, 'Blogs', 'Blogs', '#', 1, NULL, 2, 'fa fa-edit', 1, 1, 0, 1, 1, 1, 1, 1),
        (7, 'Produk', 'Produk', '#', 1, NULL, 3, 'fa fa-cart-plus', 1, 1, 0, 1, 1, 1, 1, 1),
        (8, 'Media', 'Media', '#', 1, NULL, 4, 'fa fa-upload', 1, 1, 0, 1, 1, 1, 1, 1),
        (9, 'Tampilan', 'Tampilan', '#', 1, NULL, 5, 'fa fa-paint-brush', 1, 1, 0, 1, 1, 1, 1, 1);    
EOD;
                $users = <<<EOD
        INSERT INTO `tbl_users` (`id`, `username`, `password`, `fullname`, `email`, `url`, `user_group_id`, `type`, `biography`, `forgot_password_key`, `forgot_password_request_date`, `last_logged_in`, `last_logged_out`, `ip_address`, `home_module_id`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`, `is_active`) VALUES
        (1, 'root', 'JpbIwzCddCxTGUgvacTo2cxCA/EjteOnUS8g5Px+cJ2gVPXyL0Mx1cOT3NKuylmLgc3xZ4jRCLWysX+U7PpbQwWfquXEmmnnJOn2URFAAvOJDN7B', 'Super Admin', 'admin@gmail.com', NULL, -1, -1, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1),
        (2, 'zahid', '3vnp2+QPXmYOKrfjOTwX0CZzvoQVYlyn7+bhBn+aRrKTCZnGUSQfAvB+agugDi3P/VIxsiBCgUjt4Q6PNo1mVFXLQSTSQdtvl0LAqd/9xvExqcsOFA==', 'Zahid Al Haris', 'zahid@gmail.com', NULL, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1),
        (3, 'rika', 'AnCEY7xjUyP10zpj0J6b/h0qYbhRFk2pjKIMzzUnVNWrCZwrhaX8vh67j8jAKsEYFqAq1yosEdA3N0SXF8H/yxXUoXOs4Up/gvlDCUbSM9HtPPPM', 'Rika', 'rika@gmail.com', NULL, 2, 1, NULL, NULL, NULL, NULL, NULL, NULL, 4, NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, 1);
EOD;

                $user_groups = <<<EOD
        INSERT INTO `tbl_user_groups` (`id`, `group_name`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
        (1, 'Administrator', '2020-02-13 08:32:29', '2020-02-20 00:58:20', NULL, NULL, 0, 0, 1, 0, 0),
        (2, 'Operator', '2020-02-05 01:30:53', '2020-03-04 11:42:44', NULL, NULL, 0, 0, 4, 0, 0);
EOD;

                $user_privileges = <<<EOD
        INSERT INTO `tbl_user_privileges` (`id`, `user_group_id`, `module_id`, `can_add`, `can_edit`, `can_delete`, `created_at`, `updated_at`, `deleted_at`, `restored_at`, `created_by`, `updated_by`, `deleted_by`, `restored_by`, `is_deleted`) VALUES
        (1, 2, 2, 0, 0, 0, '2020-03-04 11:42:56', '2020-03-04 11:42:56', NULL, NULL, 0, 0, 0, 0, NULL),
        (2, 2, 3, 0, 0, 0, '2020-03-04 11:42:56', '2020-03-04 11:42:56', NULL, NULL, 0, 0, 0, 0, NULL),
        (3, 2, 5, 0, 0, 0, '2020-03-04 11:42:56', '2020-03-04 11:42:56', NULL, NULL, 0, 0, 0, 0, NULL),
        (10, 1, 2, 0, 0, 0, '2020-04-12 02:30:44', '2020-04-12 02:30:44', NULL, NULL, 0, 0, 0, 0, NULL),
        (11, 1, 3, 0, 0, 0, '2020-04-12 02:30:44', '2020-04-12 02:30:44', NULL, NULL, 0, 0, 0, 0, NULL),
        (12, 1, 5, 0, 0, 0, '2020-04-12 02:30:44', '2020-04-12 02:30:44', NULL, NULL, 0, 0, 0, 0, NULL);
EOD;

                $this->db->table('tbl_modules')->emptyTable();
                $this->db->table('tbl_users')->emptyTable();
                $this->db->table('tbl_user_groups')->emptyTable();
                $this->db->table('tbl_user_privileges')->emptyTable();

                $this->db->query($users);
                $this->db->query($user_groups);
                $this->db->query($user_privileges);
                $this->db->query($modules);
        }
}
