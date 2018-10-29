<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = [
            [
                'name' => 'apartment-list',
                'display_name' => 'Display Apartment List',
                'description' => 'See only Listing Of Apartment'
            ],
            [
                'name' => 'apartment-create',
                'display_name' => 'Create Apartment',
                'description' => 'Create New Apartment'
            ],
            [
                'name' => 'apartment-edit',
                'display_name' => 'Edit Apartment',
                'description' => 'Edit Apartment'
            ],
            [
                'name' => 'apartment-delete',
                'display_name' => 'Delete Apartment',
                'description' => 'Delete Apartment'
            ],
            [
                'name' => 'category-list',
                'display_name' => 'Display Category List',
                'description' => 'See only Listing Of Category'
            ],
            [
                'name' => 'category-create',
                'display_name' => 'Create Category',
                'description' => 'Create New Category'
            ],
            [
                'name' => 'category-edit',
                'display_name' => 'Edit Category',
                'description' => 'Edit Category'
            ],
            [
                'name' => 'category-delete',
                'display_name' => 'Delete Category',
                'description' => 'Delete Category'
            ],
            [
                'name' => 'post-list',
                'display_name' => 'Display Post List',
                'description' => 'See only Listing Of Post'
            ],
            [
                'name' => 'post-create',
                'display_name' => 'Create Post',
                'description' => 'Create New Post'
            ],
            [
                'name' => 'post-edit',
                'display_name' => 'Edit Post',
                'description' => 'Edit Post'
            ],
            [
                'name' => 'post-show',
                'display_name' => 'Show Post',
                'description' => 'Show Item Post'
            ],
            [
                'name' => 'post-delete',
                'display_name' => 'Delete Post',
                'description' => 'Delete Post'
            ],
            [
                'name' => 'page-list',
                'display_name' => 'Display Page List',
                'description' => 'See only Listing of Page'
            ],
            [
                'name' => 'page-create',
                'display_name' => 'Create Page',
                'description' => 'Create New Page'
            ],
            [
                'name' => 'page-edit',
                'display_name' => 'Edit Page',
                'description' => 'Edit Page'
            ],
            [
                'name' => 'page-show',
                'display_name' => 'Show Page',
                'description' => 'Show Item Page'
            ],
            [
                'name' => 'page-delete',
                'display_name' => 'Delete Page',
                'description' => 'Delete Page'
            ],
            [
                'name' => 'slide-list',
                'display_name' => 'Display Slide List',
                'description' => 'See only Listing Of Slide'
            ],
            [
                'name' => 'slide-create',
                'display_name' => 'Create Slide',
                'description' => 'Create New Slide'
            ],
            [
                'name' => 'slide-edit',
                'display_name' => 'Edit Slide',
                'description' => 'Edit Slide'
            ],
            [
                'name' => 'slide-delete',
                'display_name' => 'Delete Slide',
                'description' => 'Delete Slide'
            ],
            [
                'name' => 'about-list',
                'display_name' => 'Display About us List',
                'description' => 'See only Listing of About us'
            ],
            [
                'name' => 'about-create',
                'display_name' => 'Create About us',
                'description' => 'Create About us'
            ],
            [
                'name' => 'about-edit',
                'display_name' => 'Edit About us',
                'description' => 'Edit About us'
            ],
            [
                'name' => 'about-show',
                'display_name' => 'Show About us',
                'description' => 'Show About us'
            ],
            [
                'name' => 'about-delete',
                'display_name' => 'Delete About us',
                'description' => 'Delete About us'
            ],
            [
                'name' => 'permission-list',
                'display_name' => 'Display Permission List',
                'description' => 'See only Listing of Permission'
            ],
            [
                'name' => 'permission-create',
                'display_name' => 'Create Permission',
                'description' => 'Create New Permission'
            ],
            [
                'name' => 'permission-edit',
                'display_name' => 'Edit Permission',
                'description' => 'Edit Permission'
            ],
            [
                'name' => 'permission-delete',
                'display_name' => 'Delete Permission',
                'description' => 'Delete Permission'
            ],
            [
                'name' => 'role-list',
                'display_name' => 'Display Role List',
                'description' => 'See only Listing of Role'
            ],
            [
                'name' => 'role-create',
                'display_name' => 'Create Role',
                'description' => 'Create New Role'
            ],
            [
                'name' => 'role-edit',
                'display_name' => 'Edit Role',
                'description' => 'Edit Role'
            ],
            [
                'name' => 'role-delete',
                'display_name' => 'Delete Role',
                'description' => 'Delete Role'
            ],
        ];


        foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}
