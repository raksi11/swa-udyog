<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => '1',
                'title' => 'user_management_access',
            ],
            [
                'id'    => '2',
                'title' => 'permission_create',
            ],
            [
                'id'    => '3',
                'title' => 'permission_edit',
            ],
            [
                'id'    => '4',
                'title' => 'permission_show',
            ],
            [
                'id'    => '5',
                'title' => 'permission_delete',
            ],
            [
                'id'    => '6',
                'title' => 'permission_access',
            ],
            [
                'id'    => '7',
                'title' => 'role_create',
            ],
            [
                'id'    => '8',
                'title' => 'role_edit',
            ],
            [
                'id'    => '9',
                'title' => 'role_show',
            ],
            [
                'id'    => '10',
                'title' => 'role_delete',
            ],
            [
                'id'    => '11',
                'title' => 'role_access',
            ],
            [
                'id'    => '12',
                'title' => 'user_create',
            ],
            [
                'id'    => '13',
                'title' => 'user_edit',
            ],
            [
                'id'    => '14',
                'title' => 'user_show',
            ],
            [
                'id'    => '15',
                'title' => 'user_delete',
            ],
            [
                'id'    => '16',
                'title' => 'user_access',
            ],
            [
                'id'    => '17',
                'title' => 'country_create',
            ],
            [
                'id'    => '18',
                'title' => 'country_edit',
            ],
            [
                'id'    => '19',
                'title' => 'country_show',
            ],
            [
                'id'    => '20',
                'title' => 'country_delete',
            ],
            [
                'id'    => '21',
                'title' => 'country_access',
            ],
            [
                'id'    => '22',
                'title' => 'job_create',
            ],
            [
                'id'    => '23',
                'title' => 'job_edit',
            ],
            [
                'id'    => '24',
                'title' => 'job_show',
            ],
            [
                'id'    => '25',
                'title' => 'job_delete',
            ],
            [
                'id'    => '26',
                'title' => 'job_access',
            ],
            [
                'id'    => '27',
                'title' => 'proposal_create',
            ],
            [
                'id'    => '28',
                'title' => 'proposal_edit',
            ],
            [
                'id'    => '29',
                'title' => 'proposal_show',
            ],
            [
                'id'    => '30',
                'title' => 'proposal_delete',
            ],
            [
                'id'    => '31',
                'title' => 'proposal_access',
            ],
            [
                'id'    => '32',
                'title' => 'payment_create',
            ],
            [
                'id'    => '33',
                'title' => 'payment_edit',
            ],
            [
                'id'    => '34',
                'title' => 'payment_show',
            ],
            [
                'id'    => '35',
                'title' => 'payment_delete',
            ],
            [
                'id'    => '36',
                'title' => 'payment_access',
            ],
            [
                'id'    => '37',
                'title' => 'user_alert_create',
            ],
            [
                'id'    => '38',
                'title' => 'user_alert_show',
            ],
            [
                'id'    => '39',
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => '40',
                'title' => 'user_alert_access',
            ],
            [
                'id'    => '41',
                'title' => 'faq_management_access',
            ],
            [
                'id'    => '42',
                'title' => 'faq_category_create',
            ],
            [
                'id'    => '43',
                'title' => 'faq_category_edit',
            ],
            [
                'id'    => '44',
                'title' => 'faq_category_show',
            ],
            [
                'id'    => '45',
                'title' => 'faq_category_delete',
            ],
            [
                'id'    => '46',
                'title' => 'faq_category_access',
            ],
            [
                'id'    => '47',
                'title' => 'faq_question_create',
            ],
            [
                'id'    => '48',
                'title' => 'faq_question_edit',
            ],
            [
                'id'    => '49',
                'title' => 'faq_question_show',
            ],
            [
                'id'    => '50',
                'title' => 'faq_question_delete',
            ],
            [
                'id'    => '51',
                'title' => 'faq_question_access',
            ],
            [
                'id'    => '52',
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);

    }
}
